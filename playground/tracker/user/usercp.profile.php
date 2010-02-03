<?php
/////////////////////////////////////////////////////////////////////////////////////
// xbtit - Bittorrent tracker/frontend
//
// Copyright (C) 2004 - 2007  Btiteam
//
//    This file is part of xbtit.
//
// Redistribution and use in source and binary forms, with or without modification,
// are permitted provided that the following conditions are met:
//
//   1. Redistributions of source code must retain the above copyright notice,
//      this list of conditions and the following disclaimer.
//   2. Redistributions in binary form must reproduce the above copyright notice,
//      this list of conditions and the following disclaimer in the documentation
//      and/or other materials provided with the distribution.
//   3. The name of the author may not be used to endorse or promote products
//      derived from this software without specific prior written permission.
//
// THIS SOFTWARE IS PROVIDED BY THE AUTHOR ``AS IS'' AND ANY EXPRESS OR IMPLIED
// WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
// MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED.
// IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
// SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED
// TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
// PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
// LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
// NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE,
// EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
//
////////////////////////////////////////////////////////////////////////////////////

if (!defined("IN_BTIT"))
      die("non direct access!");


switch ($action)
{
    case 'post':
           $idlangue=intval(0+$_POST["language"]);
           $idstyle=intval(0+$_POST["style"]);
           $email=AddSlashes($_POST["email"]);
           $avatar=htmlspecialchars(AddSlashes($_POST["avatar"]));
           $idflag=intval(0+$_POST["flag"]);
           $timezone=intval($_POST["timezone"]);

           // Password confirmation required to update user record
           (isset($_POST["passconf"])) ? $password=md5($_POST["passconf"]) : $password="";
                      
           $res=mysql_query("SELECT password FROM {$TABLE_PREFIX}users WHERE id=".$CURUSER["uid"]);
           if(mysql_num_rows($res)>0)
               $user=mysql_fetch_assoc($res);           

           if(!isset($user) || $password=="" || $user["password"]!=$password)
           {
               stderr($language["ERROR"], $language["ERR_PASS_WRONG"]);
               stdfoot();
               exit();
           }
           // Password confirmation required to update user record


           // check avatar image extension if someone have better idea ;)
           if ($avatar && $avatar!="" && !in_array(substr($avatar,strlen($avatar)-4),array(".gif",".jpg",".bmp",".png")))
              {
                stderr($language["ERROR"], $language["ERR_AVATAR_EXT"]);
                stdfoot();
                exit;
              }

           if ($email=="")
          {
            err_msg($language["ERROR"],$language["ERR_NO_EMAIL"]);
            stdfoot();
            exit;
          }
           else
               {
               // Reverify Mail Hack by Petr1fied - Start --->
               if ($VALIDATION=="user") {
                   // Send a verification e-mail to the e-mail address they want to change it to
                   if (($email!="")&&($email!=$CURUSER["email"])) {
                       $id=$CURUSER["uid"];
                       // Generate a random number between 10000 and 99999
                       $floor = 100000;
                       $ceiling = 999999;
                       srand((double)microtime()*1000000);
                       $random = rand($floor, $ceiling);

                       // Update the members record with the random number and store the email they want to change to
                       do_sqlquery("UPDATE {$TABLE_PREFIX}users SET random='".$random."', temp_email='".$email."' WHERE id='".$id."'");

                       // Send the verification email
                       @ini_set("sendmail_from","");
                       if (mysql_errno()==0)
                          send_mail($email,$language["EMAIL_VERIFY"],$language["EMAIL_VERIFY_MSG"]."\n\n".$BASEURL."/index.php?page=usercp&do=verify&action=changemail&newmail=".$email."&uid=".$id."&random=".$random."","From: ".$SITENAME." <".$SITEEMAIL.">") OR stderr($language["ERROR"],$language["EMAIL_FAILED"]);
                       }
               }
               $set=array();

               if ($VALIDATION!="user") {
                   if ($email!="")
                   $set[]="email='$email'";
                }
                // <--- Reverify Mail Hack by Petr1fied - End
               if ($idlangue>0)
                  $set[]="language=$idlangue";
               if ($idstyle>0)
                  $set[]="style=$idstyle";
               if ($idflag>0)
                  $set[]="flag=$idflag";

               $set[]="time_offset='$timezone'";
               $set[]="avatar='$avatar'";
               $set[]="topicsperpage=".intval(0+$_POST["topicsperpage"]);
               $set[]="postsperpage=".intval(0+$_POST["postsperpage"]);
               $set[]="torrentsperpage=".intval(0+$_POST["torrentsperpage"]);
          $set[]="pm_mail_notify=".sqlesc($_POST["pm_mail_notification"]);
	  $set[]="status_comment_notify=".sqlesc($_POST["status_comment_notify"]);

               $updateset=implode(",",$set);

               // Reverify Mail Hack by Petr1fied - Start --->
               // If they've tried to change their e-mail, give them a message telling them as much
               if (($email!="")&&($VALIDATION=="user")&&($email!=$CURUSER["email"]))
                  {
                  success_msg($language["EMAIL_VERIFY_BLOCK"], "".$language["EMAIL_VERIFY_SENT1"]." ".$email." ".$language["EMAIL_VERIFY_SENT2"]."<a href=\"".$BASEURL."\">".$language["MNU_INDEX"]."</a>");
                  stdfoot(true,false);
                  exit;
                  }
               elseif ($updateset!="")
               // <--- Reverify Mail Hack by Petr1fied - End
                  {
                  do_sqlquery("UPDATE {$TABLE_PREFIX}users SET $updateset WHERE id='".$uid."'") or die(mysql_error());
// start hack phpbb3 integration

	// info phpbb3
	$phpbb3_res = get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}settings");
	$phpbb_db_prefix = $phpbb3_res["phpbb3_prefix"];
	$phpbb3_username = $CURUSER["username"];
	
	// default setting from phpbb3
	$get_default_phpbb = mysql_query("SELECT `config_name`, `config_value` FROM `{$phpbb_db_prefix}config`") or die(mysql_error());

	while ($row_config = mysql_fetch_assoc($get_default_phpbb))
	{
		if ($row_config["config_name"] == "default_timezone")
		{
			$default_timezone = $row_config["config_value"];
		}
		if ($row_config["config_name"] == "default_dateformat")
		{
			$default_dateformat = $row_config["config_value"];
		}
		if ($row_config["config_name"] == "default_style")
		{
			$default_style = $row_config["config_value"];
		}
		if ($row_config["config_name"] == "default_lang")
		{
			$default_lang = $row_config["config_value"];
		}
	}
	
	mysql_free_result($get_default_phpbb);
	
	// languages from xbtit 2.0.547 to phpbb
	switch ($idlangue) {
	  case 1:
      $user_lang = 'en';
      break;
      case 2:
      $user_lang = 'ro';
      break;
      case 3:
      $user_lang = 'pl';
      break;
	  case 5:
      $user_lang = 'nl';
      break;
	  case 6:
      $user_lang = 'it';
      break;
	  case 7:
      $user_lang = 'ru';
      break;
	  case 8:
      $user_lang = 'de';
      break;
	  case 9:
      $user_lang = 'hu';
      break;
	  case 10:
      $user_lang = 'fr';
      break;
	  case 11:
      $user_lang = 'fi';
      break;
	  case 12:
      $user_lang = 'vi';
      break;
	  case 13:
      $user_lang = 'gr';
      break;
	  case 14:
      $user_lang = 'bg';
      break;
	  case 15:
      $user_lang = 'es';
      break;
	  case 16:
      $user_lang = 'br';
      break;
	  case 17:
      $user_lang = 'pt';
      break;
      default:
      $user_lang = "$default_lang"; // default
	}
	// timezone from xbtit 2.0.547 to phpb
			switch ($timezone) {
			case -12:
			$user_timezone = '-12.00';
			break;
			case -11:
			$user_timezone = '-11.00';
			break;
			case -10:
			$user_timezone = '-10.00';
			break;
			case -9:
			$user_timezone = '-9.00';
			break;
			case -8:
			$user_timezone = '-8.00';
			break;
			case -7:
			$user_timezone = '-7.00';
			break;
			case -6:
			$user_timezone = '-6.00';
			break;
			case -5:
			$user_timezone = '-5.00';
			break;
			case -4:
			$user_timezone = '-4.00';
			break;
			case -3:
			$user_timezone = '-3.00';
			break;
			case '-3.5':
			$user_timezone = '-3.50';
			break;
			case -2:
			$user_timezone = '-2.00';
			break;
			case -1:
			$user_timezone = '-1.00';
			break;
			case 0:
			$user_timezone = '0.00';
			break;
			case 1:
			$user_timezone = '1.00';
			break;
			case 2:
			$user_timezone = '2.00';
			break;
			case 3:
			$user_timezone = '3.00';
			break;
			case '3.5':
			$user_timezone = '3.50';
			break;
			case 4:
			$user_timezone = '4.00';
			break;
			case '4.5':
			$user_timezone = '4.50';
			break;
			case 5:
			$user_timezone = '5.00';
			break;
			case '5.5':
			$user_timezone = '5.50';
			break;
			case 6:
			$user_timezone = '6.00';
			break;
			case 7:
			$user_timezone = '7.00';
			break;
			case 8:
			$user_timezone = '8.00';
			break;
			case 9:
			$user_timezone = '9.00';
			break;
			case '9.5':
			$user_timezone = '9.50';
			break;
			case 10:
			$user_timezone = '10.00';
			break;
			case 11:
			$user_timezone = '11.00';
			break;
			case 12:
			$user_timezone = '12.00';
			break;
			default:
			$user_timezone = "$default_timezone"; // default timezone
			}
	
	// change email in phpbb3 _users
	do_sqlquery("UPDATE {$phpbb_db_prefix}users SET user_email='$email' WHERE username='".$CURUSER["username"]."'") or die(mysql_error());
	do_sqlquery("UPDATE {$phpbb_db_prefix}users SET user_lang='$user_lang' WHERE username='".$CURUSER["username"]."'") or die(mysql_error());
	do_sqlquery("UPDATE {$phpbb_db_prefix}users SET user_timezone='$user_timezone' WHERE username='".$CURUSER["username"]."'") or die(mysql_error());
	//
	// change email, user_lang, user_timezone in phpbb3 _users
//	do_sqlquery("REPLACE `{$phpbb_db_prefix}users` (`user_email`,`user_lang`,`user_timezone`) VALUES ('$email', '$user_lang', '$user_timezone') WHERE username=$phpbb3_username") or die(mysql_error());
// end hack phpbb3 integration

                  success_msg($language["SUCCESS"], $language["INF_CHANGED"]."<br /><a href=\"index.php?page=usercp&amp;uid=".$uid."\">".$language["BCK_USERCP"]."</a>");
                  stdfoot(true,false);
                  exit;
                  }
              }
    break;

    case '':
    case 'change':
    default:
      $usercptpl->set("AVATAR",false,true);
      $usercptpl->set("USER_VALIDATION",false,true);
      $usercptpl->set("INTERNAL_FORUM",false,true);
      $profiletpl=array();
      $profiletpl["frm_action"]="index.php?page=usercp&amp;do=user&amp;action=post&amp;uid=".$uid."";
      $profiletpl["username"]=$CURUSER["username"];

      //avatar
      if ($CURUSER["avatar"] && $CURUSER["avatar"]!="")
        {
          $usercptpl->set("AVATAR",true,true);
          $profiletpl["avatar"]="<img border=\"0\" onload=\"resize_avatar(this);\" src=\"".htmlspecialchars(unesc($CURUSER["avatar"]))."\" alt=\"\" />";
        }
      // email_notification
	  // pm notify
	  $pm_mail_notify = mysql_query("SELECT pm_mail_notify FROM {$TABLE_PREFIX}users WHERE id=".$CURUSER["uid"]);
	  $pmnotify = mysql_result($pm_mail_notify, 0);
      if ($pmnotify == "true")
        {
          $profiletpl["PM_MAIL_NOTIFY_TRUE"]= "checked=\"checked\"";
          $profiletpl["PM_MAIL_NOTIFY_FALSE"]= "";
        }
		else
		{
			$profiletpl["PM_MAIL_NOTIFY_TRUE"]= "";
			$profiletpl["PM_MAIL_NOTIFY_FALSE"]= "checked=\"checked\"";
		}
	  // comment notify
	  $status_comment_notify = mysql_query("SELECT status_comment_notify FROM {$TABLE_PREFIX}users WHERE id=".$CURUSER["uid"]);
	  $status_comment = mysql_result($status_comment_notify, 0);
      if ($status_comment == "true")
        {
          $profiletpl["COMMENT_NOTIFY_TRUE"]= "checked=\"checked\"";
          $profiletpl["COMMENT_NOTIFY_FALSE"]= "";
        }
		else
		{
			$profiletpl["COMMENT_NOTIFY_TRUE"]= "";
			$profiletpl["COMMENT_NOTIFY_FALSE"]= "checked=\"checked\"";
		}

      $profiletpl["avatar_field"]=unesc($CURUSER["avatar"]);
      $profiletpl["email"]=unesc($CURUSER["email"]);

      //Reverify Mail Hack by Petr1fied - Start
      if ($VALIDATION=="user")
        {
          //Display a message informing users that they will have
          //to verify their e-mail address if they attempt to change it
          $usercptpl->set("USER_VALIDATION",true,true);
        }
      //Reverify Mail Hack by Petr1fied - End

      //language list
      $lres=language_list();
      $langtpl=array();
        foreach($lres as $langue)
          {
             $langtpl["language_combo"].="\n<option ";
         if ($langue["id"]==$CURUSER["language"])
        $langtpl["language_combo"].="selected=\"selected\" ";
         $langtpl["language_combo"].="value=\"".$langue["id"]."\">".unesc($langue["language"])."</option>";
         $langtpl["language_combo"].=($option);
           }
        unset($lres);
      $usercptpl->set("lang",$langtpl);

      //style list
      $sres=style_list();
      $styletpl=array();
        foreach($sres as $style)
          {
        $styletpl["style_combo"].="\n<option ";
          if ($style["id"]==$CURUSER["style"])
        $styletpl["style_combo"].="selected=\"selected\" ";
        $styletpl["style_combo"].="value=\"".$style["id"]."\">".unesc($style["style"])."</option>";
        $styletpl["style_combo"].=($option);
          }
        unset($sres);
      $usercptpl->set("style",$styletpl);

      //flag list
      $fres=flag_list();
      $flagtpl=array();
        foreach($fres as $flag)
          {
        $flagtpl["flag_combo"].="\n<option ";
          if ($flag["id"]==$CURUSER["flag"])
        $flagtpl["flag_combo"].="selected=\"selected\" ";
        $flagtpl["flag_combo"].="value=\"".$flag["id"]."\">".unesc($flag["name"])."</option>";
        $flagtpl["flag_combo"].=($option);
          }
        unset($fres);
      $usercptpl->set("flag",$flagtpl);

      //timezone list
      $tres=timezone_list();
      $tztpl=array();
        foreach($tres as $timezone)
          {
        $tztpl["tz_combo"].="\n<option ";
          if ($timezone["difference"]==$CURUSER["time_offset"])
        $tztpl["tz_combo"].="selected=\"selected\" ";
        $tztpl["tz_combo"].="value=\"".$timezone["difference"]."\">".unesc($timezone["timezone"])."</option>";
        $tztpl["tz_combo"].=($option);
          }
        unset($tres);
      $usercptpl->set("tz",$tztpl);

      if ($FORUMLINK=="" || $FORUMLINK=="internal")
        {
          $usercptpl->set("INTERNAL_FORUM",true,true);
          $profiletpl["topicsperpage"]=$CURUSER["topicsperpage"];
          $profiletpl["postsperpage"]=$CURUSER["postsperpage"];
        }

      $profiletpl["torrentsperpage"]=$CURUSER["torrentsperpage"];
      $profiletpl["frm_cancel"]="index.php?page=usercp&amp;uid=".$uid."";
      $usercptpl->set("profile",$profiletpl);
    break;
}
?>
