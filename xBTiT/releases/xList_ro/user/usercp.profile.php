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

               $updateset = implode(",",$set);

               // Reverify Mail Hack by Petr1fied - Start --->
               // If they've tried to change their e-mail, give them a message telling them as much
               if (($email != "") && ($VALIDATION == "user") && ($email != $CURUSER["email"]))
                  {
                  success_msg($language["EMAIL_VERIFY_BLOCK"], "".$language["EMAIL_VERIFY_SENT1"]." ".$email." ".$language["EMAIL_VERIFY_SENT2"]."<a href=\"".$BASEURL."\">".$language["MNU_INDEX"]."</a>");
                  stdfoot(true, false);
                  exit;
                  }
               elseif ($updateset = implode(",",$set));
               // <--- Reverify Mail Hack by Petr1fied - End
               
                $park = $_POST['park'];
                if(!is_numeric($park)) {        err_msg(ERROR,"What are you trying to do?");
                       stdfoot();
                       exit;
                }
               if ($updateset != "")
                  {
                  mysql_query("UPDATE {$TABLE_PREFIX}users SET $updateset WHERE id=$uid") or die(mysql_error());
                  if($park == 0) { 
                        
                        $r = mysql_query("SELECT parked from {$TABLE_PREFIX}users where id = $uid");
                        $p = mysql_result($r, 0, "parked");
                        if ($p != 0) {
                            mysql_query("UPDATE {$TABLE_PREFIX}users SET id_level=$p WHERE id=$uid") or die(mysql_error()); 
                            mysql_query("UPDATE {$TABLE_PREFIX}users SET parked='0' WHERE id=$uid") or die(mysql_error()); 
                        }
                  } else {
                        $r = mysql_query("SELECT id_level from {$TABLE_PREFIX}users where id = $uid");
                        $cc = mysql_result($r,0,"id_level");
                        $r = mysql_query("UPDATE {$TABLE_PREFIX}users SET parked = $cc where id = $uid");
                        $r = mysql_query("UPDATE {$TABLE_PREFIX}users SET id_level = 13 where id = $uid");
                  }
                  
                  
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
      $tres = timezone_list();
      $tztpl = array();
        foreach($tres as $timezone)
          {
        $tztpl["tz_combo"] .= "\n<option ";
          if ($timezone["difference"] == $CURUSER["time_offset"])
        $tztpl["tz_combo"] .= "selected=\"selected\" ";
        $tztpl["tz_combo"] .= "value=\"".$timezone["difference"]."\">".unesc($timezone["timezone"])."</option>";
        $tztpl["tz_combo"] .= ($option);
          }
        unset($tres);
      $usercptpl->set("tz", $tztpl);

      if ($FORUMLINK == "" || $FORUMLINK == "internal")
        {
          $usercptpl->set("INTERNAL_FORUM", true, true);
          $profiletpl["topicsperpage"] = $CURUSER["topicsperpage"];
          $profiletpl["postsperpage"] = $CURUSER["postsperpage"];
        }

      $profiletpl["torrentsperpage"] = $CURUSER["torrentsperpage"];
      $profiletpl["frm_cancel"] = "index.php?page=usercp&amp;uid=".$uid."";


        $uid = $CURUSER['uid'];
                        $r = mysql_query("SELECT parked from {$TABLE_PREFIX}users where id = $uid");
                        $p = mysql_result($r,0,"parked");
            
                      if($p != 0) {
                                  $profiletpl["parked"] .= "<input name=\"park\" id=\"park\" type=\"radio\" value=\"0\" />
            ".$language["NO"]."" ;      
                      $profiletpl["parked"] .= "<input name=\"park\" id=\"park\" type=\"radio\" value=\"1\" checked=\"checked\"  />
              ".$language["YES"].""  ;
                  
              } else { 
                      $profiletpl["parked"] .= "<input name=\"park\" id=\"park\" type=\"radio\" value=\"0\" checked=\"checked\"  />
              ".$language["NO"].""  ;
              $profiletpl["parked"] .= "<input name=\"park\" id=\"park\" type=\"radio\" value=\"1\" />
            ".$language["YES"]."" ; 
            $profiletpl["parked"] .= ($option);
                            }
      $usercptpl->set("profile", $profiletpl);
    break;
}
?>