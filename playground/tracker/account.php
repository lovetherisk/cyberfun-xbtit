<?php

// CyBerFuN.ro & xList.ro

// CyBerFuN .::. News
// http://tracker.cyberfun.ro/
// http://www.cyberfun.ro/
// http://xList.ro/
// Modified By cybernet2u

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

require_once(load_language("lang_account.php"));

if (!isset($_POST["language"])) $_POST["language"] = max(1, $btit_settings["default_language"]);
$idlang = intval($_POST["language"]);


if (isset($_GET["uid"])) $id = intval($_GET["uid"]);
 else $id = "";
if (isset($_GET["returnto"])) $link = urldecode($_GET["returnto"]);
 else $link = "";
if (isset($_GET["act"])) $act = $_GET["act"];
 else $act = "signup";
if (isset($_GET["language"])) $idlangue = intval($_GET["language"]);
 else $idlangue = max(1,$btit_settings["default_language"]);
if (isset($_GET["style"])) $idstyle = intval($_GET["style"]);
 else $idstyle = max(1,$btit_settings["default_style"]);
if (isset($_GET["flag"])) $idflag = intval($_GET["flag"]);
 else $idflag = "";

if (isset($_POST["uid"]) && isset($_POST["act"]))
  {
if (isset($_POST["uid"])) $id = intval($_POST["uid"]);
 else $id = "";
if (isset($_POST["returnto"])) $link = urldecode($_POST["returnto"]);
 else $link = "";
if (isset($_POST["act"])) $act = $_POST["act"];
 else $act = "";
  }

//start Invitation System by dodge
if(!$_POST["conferma"] && $INVITATIONSON)
{
    if ($act == "invite")
    {

        $code = mysql_real_escape_string($_GET["invitationnumber"]);
        $res = do_sqlquery("SELECT inviter, confirmed FROM {$TABLE_PREFIX}invitations WHERE hash = '" .
            $code . "'", true);
        @$inv = mysql_fetch_assoc($res);
        $inviter = $inv["inviter"];
        $confirmed = $inv["confirmed"];
        if (!$inv || $confirmed == "true")
            stderr($language["ERROR"], $code . "<br>" . $language["INVALID_INVITATION"] .
                "<br>" . $language["ERR_INVITATION"]);
    }
    else
        stderr($language["ERROR"], $language["INVITATION_ONLY"]);
}   
//end Invitation System

// already logged?
if ($act == "signup" && isset($CURUSER["uid"]) && $CURUSER["uid"] != 1) {
        $url = "index.php";
        redirect($url);
}


$res = do_sqlquery("SELECT count(*) FROM {$TABLE_PREFIX}users WHERE id>1", true);
$nusers = mysql_fetch_row($res);
$numusers = $nusers[0];

if ($act == "signup" && $MAX_USERS != 0 && $numusers >= $MAX_USERS && !$INVITATIONSON)
   {
   stderr($language["ERROR"], $language["REACHED_MAX_USERS"]);
}

if ($act == "confirm") {

      global $FORUMLINK, $db_prefix;

      $random = intval($_GET["confirm"]);
      $random2 = rand(10000, 60000);
      $res = do_sqlquery("UPDATE {$TABLE_PREFIX}users SET id_level=3".(($FORUMLINK == "smf") ? ", random=$random2" : "")." WHERE id_level=2 AND random=$random", true);
      if (!$res)
         die("ERROR: " . mysql_error() . "\n");
      else {
          if($FORUMLINK == "smf")
          {
              $get = mysql_fetch_assoc(mysql_query("SELECT smf_fid FROM {$TABLE_PREFIX}users WHERE id_level=3 AND random=$random2"));
              do_sqlquery("UPDATE {$db_prefix}members SET ID_GROUP=13 WHERE ID_MEMBER=".$get["smf_fid"]);  
          }
          success_msg($language["ACCOUNT_CREATED"], $language["ACCOUNT_CONGRATULATIONS"]);
          stdfoot();
          exit;
          }
}

if ($_POST["conferma"]) {
    if ($act == "signup" || $act == "invite") {
       $ret = aggiungiutente();
       if ($ret == 0)
          {
            if ($INVITATIONSON == "true")
            {
                if ($VALID_INV == "true")
                {
                    success_msg($language["ACCOUNT_CREATED"], $language["INVITE_EMAIL_SENT1"] . " (" .
                        htmlspecialchars($email) . "). " . $language["INVITE_EMAIL_SENT2"]);
                    stdfoot();
                    exit();
                }
                else
                {
                    success_msg($language["ACCOUNT_CREATED"], $language["INVITE_EMAIL_SENT3"] . " (" .
                        htmlspecialchars($email) . "). " . $language["INVITE_EMAIL_SENT4"]);
                    stdfoot();
                    exit();
                }
            }
            else
          if ($VALIDATION == "user")
             {
               success_msg($language["ACCOUNT_CREATED"], $language["EMAIL_SENT"]);
               stdfoot();
               exit();
             }
          else if ($VALIDATION == "none")
               {
               success_msg($language["ACCOUNT_CREATED"], $language["ACCOUNT_CONGRATULATIONS"]);
               stdfoot();
               exit();
               }
          else
              {
               success_msg($language["ACCOUNT_CREATED"], $language["WAIT_ADMIN_VALID"]);
               stdfoot();
               exit();
              }
          }
       elseif ($ret ==- 1)
         stderr($language["ERROR"], $language["ERR_MISSING_DATA"]);
       elseif ($ret ==- 3)
         stderr($language["ERROR"], $language["ERR_NO_EMAIL"]);
       elseif ($ret ==- 7)
         stderr($language["ERROR"], "<font color=\"black\">".$language["ERR_NO_SPACE"]."<strong><font color=\"red\">".preg_replace('/\ /', '_', mysql_real_escape_string($_POST["user"]))."</strong></font></font><br />");
       elseif ($ret ==- 8)
         stderr($language["ERROR"], $language["ERR_SPECIAL_CHAR"]);
       elseif ($ret ==- 9)
         stderr($language["ERROR"], $language["ERR_PASS_LENGTH"]);
       else
        stderr($language["ERROR"], $language["ERR_USER_ALREADY_EXISTS"]);
       }
}
else {
    $tpl_account = new bTemplate();
    tabella($act);
}



function tabella($action, $dati = array()) {

   global $SITENAME, $INVITATIONSON, $code, $inviter, $idflag, $link, $idlangue, $idstyle, $CURUSER, $USE_IMAGECODE, $TABLE_PREFIX, $language, $tpl_account, $THIS_BASEPATH;


   if ($action=="signup" || $action == "invite")
     {
          $tpl_account->set("BY_INVITATION", false, true);
          $dati["username"] = "";
          $dati["email"] = "";
          $dati["language"] = $idlangue;
          $dati["style"] = $idstyle;
     }

   // avoid error with js
   $language["DIF_PASSWORDS"] = AddSlashes($language["DIF_PASSWORDS"]);
   $language["INSERT_PASSWORD"] = AddSlashes($language["INSERT_PASSWORD"]);
   $language["USER_PWD_AGAIN"] = AddSlashes($language["USER_PWD_AGAIN"]);
   $language["INSERT_USERNAME"] = AddSlashes($language["INSERT_USERNAME"]);
   $language["ERR_NO_EMAIL"] = AddSlashes($language["ERR_NO_EMAIL"]);
   $language["ERR_NO_EMAIL_AGAIN"] = AddSlashes($language["ERR_NO_EMAIL_AGAIN"]);
   $language["DIF_EMAIL"] = AddSlashes($language["DIF_EMAIL"]);

   $tpl_account->set("language", $language);
   $tpl_account->set("account_action", $action);
   $tpl_account->set("account_form_actionlink", htmlspecialchars("index.php?page=signup&act=$action&returnto=$link"));
   $tpl_account->set("account_uid", $dati["id"]);
   $tpl_account->set("account_returnto", urlencode($link));
   $tpl_account->set("account_IDlanguage", $idlang);
   $tpl_account->set("account_IDstyle", $idstyle);
   $tpl_account->set("account_IDcountry", $idflag);
   $tpl_account->set("account_username", $dati["username"]);
   $tpl_account->set("dati",$dati);
   $tpl_account->set("DEL", $action == "delete", true);
   $tpl_account->set("DISPLAY_FULL", $action == "signup" || $action == "invite", true);

    //begin invitation system by dodge
    if ($INVITATIONSON)
    {
        $tpl_account->set("BY_INVITATION", true, true);
        $tpl_account->set("account_IDcode", $code);
        $tpl_account->set("account_IDinviter", $inviter);
    }
    //end invitation system

   if ($action == "del")
      $tpl_account->set("account_from_delete_confirm","<input type=\"submit\" name=\"elimina\" value=\"".$language["FRM_DELETE"]."\" />&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"elimina\" value=\"".$language["FRM_CANCEL"]."\" />");
   else
      $tpl_account->set("account_from_delete_confirm","<input type=\"submit\" name=\"conferma\" value=\"".$language["FRM_CONFIRM"]."\" />&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"reset\" name=\"annulla\" value=\"".$language["FRM_CANCEL"]."\" />");
   
  $lres = language_list();

   $option = "\n<select name=\"language\" size=\"1\">";
   foreach($lres as $langue)
     {
       $option .= "\n<option ";
       if ($langue["id"] == $dati["language"])
          $option .= "\"selected\" ";
       $option .= "value=\"".$langue["id"]."\">".$langue["language"]."</option>";
     }
   $option .= "\n</select>";

   $tpl_account->set("account_combo_language", $option);

   $sres = style_list();
   $option = "\n<select name=\"style\" size=\"1\">";
   foreach($sres as $style)
     {
       $option .= "\n<option ";
       if ($style["id"] == $dati["style"])
          $option .= "\"selected\" ";
       $option .= "value=\"".$style["id"]."\">".$style["style"]."</option>";
     }
   $option .= "\n</select>";

   $tpl_account->set("account_combo_style", $option);

   $fres = flag_list();
   $option = "\n<select name=\"flag\" size=\"1\">\n<option value='0'>---</option>";

   $thisip = $_SERVER["REMOTE_ADDR"];
   $remotedns = gethostbyaddr($thisip);

   if ($remotedns != $thisip)
       {
       $remotedns = strtoupper($remotedns);
       preg_match('/^(.+)\.([A-Z]{2,3})$/', $remotedns, $tldm);
       if (isset($tldm[2]))
              $remotedns = mysql_real_escape_string($tldm[2]);
     }

   foreach($fres as $flag)
    {
        $option .= "\n<option ";
            if ($flag["id"] == $dati["flag"] || ($flag["domain"] == $remotedns && $action == "signup"))
              $option .= "\"selected\" ";
            $option .= "value=\"".$flag["id"]."\">".$flag["name"]."</option>";
    }
   $option .= "\n</select>";

   $tpl_account->set("account_combo_country", $option);

   $zone = date('Z', time());
   $daylight = date('I', time()) * 3600;
   $os = $zone - $daylight;
   if($os != 0){ $timeoff = $os / 3600; } else { $timeoff = 0; }

   if(!$CURUSER || $CURUSER["uid"] == 1)
      $dati["time_offset"] = $timeoff;

   $tres = timezone_list();
   $option = "<select name=\"timezone\">";
   foreach($tres as $timezone)
     {
       $option .= "\n<option ";
       if ($timezone["difference"] == $dati["time_offset"])
          $option .= "selected=\"selected\" ";
       $option .= "value=\"".$timezone["difference"]."\">".unesc($timezone["timezone"])."</option>";
     }
   $option .= "\n</select>";

   $tpl_account->set("account_combo_timezone", $option);

// -----------------------------
// Captcha hack
// -----------------------------
// if set to use secure code: try to display imagecode
if ($USE_IMAGECODE && $action != "mod")
  {
   if (extension_loaded('gd'))
     {
       $arr = gd_info();
       if ($arr['FreeType Support'] == 1)
        {
         $p = new ocr_captcha();

         $tpl_account->set("CAPTCHA", true, true);

         $tpl_account->set("account_captcha", $p->display_captcha(true));

         $private = $p->generate_private();
      }
     else
       {
         include("$THIS_BASEPATH/include/security_code.php");
         $scode_index = rand(0, count($security_code) - 1);
         $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
         $scode .= $security_code[$scode_index]["question"];
         $tpl_account->set("scode_question", $scode);
         $tpl_account->set("CAPTCHA", false, true);
       }
     }
     else
       {
         include("$THIS_BASEPATH/include/security_code.php");
         $scode_index = rand(0, count($security_code) - 1);
         $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
         $scode .= $security_code[$scode_index]["question"];
         $tpl_account->set("scode_question", $scode);
         $tpl_account->set("CAPTCHA", false, true);
       }
   }
elseif ($action!="mod")
   {
       include("$THIS_BASEPATH/include/security_code.php");
       $scode_index = rand(0, count($security_code) - 1);
       $scode = "<input type=\"hidden\" name=\"security_index\" value=\"$scode_index\" />\n";
       $scode .= $security_code[$scode_index]["question"];
       $tpl_account->set("scode_question", $scode);
       // we will request simple operation to user
       $tpl_account->set("CAPTCHA", false, true);
  }
// -----------------------------
// Captcha hack
// -----------------------------
}

function aggiungiutente() {

global $INVITATIONSON, $VALID_INV, $SITENAME, $SITEEMAIL, $BASEURL, $VALIDATION, $USERLANG, $USE_IMAGECODE, $TABLE_PREFIX, $XBTT_USE, $language, $THIS_BASEPATH, $FORUMLINK, $db_prefix;

$utente = mysql_real_escape_string($_POST["user"]);
$pwd = mysql_real_escape_string($_POST["pwd"]);
$pwd1 = mysql_real_escape_string($_POST["pwd1"]);
$email = mysql_real_escape_string($_POST["email"]);
$pm_mail_notify = sqlesc($_POST["pm_mail_notification"]);
$idlangue = intval($_POST["language"]);
$idstyle = intval($_POST["style"]);
$idflag = intval($_POST["flag"]);
$timezone = intval($_POST["timezone"]);

if (strtoupper($utente) == strtoupper("Guest")) {
        err_msg($language["ERROR"], $language["ERR_GUEST_EXISTS"]);
        stdfoot();
        exit;
        }

if ($pwd != $pwd1) {
    err_msg($language["ERROR"], $language["DIF_PASSWORDS"]);
    stdfoot();
    exit;
    }

if ($VALIDATION == "none")
   $idlevel = 3;
else
   $idlevel = 2;
//begin invitation system by dodge
    if ($INVITATIONSON == "true")
    {
        if ($VALID_INV == "true")
            $idlevel = 2;
        else
            $idlevel = 3;
    }
//end invitation system
# Create Random number
$floor = 100000;
$ceiling = 999999;
srand((double)microtime()*1000000);
$random = rand($floor, $ceiling);

if ($utente == "" || $pwd == "" || $email == "") {
   return -1;
   exit;
}

$res = do_sqlquery("SELECT email FROM {$TABLE_PREFIX}users WHERE email='$email'");
if (mysql_num_rows($res) > 0)
   {
   return -2;
   exit;
}

// valid email check - by vibes
/*
$regex = "^[_+a-z0-9-]+(\.[_+a-z0-9-]+)*"
                ."@[a-z0-9-]+(\.[a-z0-9-]{1,})*"
                ."\.([a-z]{2,}){1}$";
*/

$regex = '/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/i';
if(!preg_match($regex,$email))
   {
   return -3;
   exit;
}
// valid email check end

// duplicate username
$res = do_sqlquery("SELECT username FROM {$TABLE_PREFIX}users WHERE username='$utente'");
if (mysql_num_rows($res) > 0)
   {
   return -4;
   exit;
}
// duplicate username

if (strpos(mysql_real_escape_string($utente), " ") == true)
   {
   return -7;
   exit;
}
if ($USE_IMAGECODE)
{
  if (extension_loaded('gd'))
    {
     $arr = gd_info();
     if ($arr['FreeType Support'] == 1)
      {
        $public = $_POST['public_key'];
        $private = $_POST['private_key'];

          $p = new ocr_captcha();

          if ($p->check_captcha($public, $private) != true)
              {
              err_msg($language["ERROR"],$language["ERR_IMAGE_CODE"]);
              stdfoot();
              exit;
          }
       }
       else
         {
           include("$THIS_BASEPATH/include/security_code.php");
           $scode_index = intval($_POST["security_index"]);
           if ($security_code[$scode_index]["answer"] != $_POST["scode_answer"])
              {
              err_msg($language["ERROR"],$language["ERR_IMAGE_CODE"]);
              stdfoot();
              exit;
            }
         }
    }
     else
       {
         include("$THIS_BASEPATH/include/security_code.php");
         $scode_index = intval($_POST["security_index"]);
         if ($security_code[$scode_index]["answer"] != $_POST["scode_answer"])
            {
            err_msg($language["ERROR"],$language["ERR_IMAGE_CODE"]);
            stdfoot();
            exit;
          }
       }
}
else
  {
    include("$THIS_BASEPATH/include/security_code.php");
    $scode_index = intval($_POST["security_index"]);
    if ($security_code[$scode_index]["answer"] != $_POST["scode_answer"])
       {
       err_msg($language["ERROR"],$language["ERR_IMAGE_CODE"]);
       stdfoot();
       exit;
     }
  }

$bannedchar = array("\\", "/", ":", "*", "?", "\"", "@", "$", "'", "`", ",", ";", ".", "<", ">", "!", "�", "%", "^", "&", "(", ")", "+", "=", "#", "~");
if (straipos(mysql_real_escape_string($utente), $bannedchar) == true)
   {
   return -8;
   exit;
}

if(strlen(mysql_real_escape_string($pwd)) < 4)
   {
   return -9;
   exit;
}

$pid = md5(uniqid(rand(), true));

// start hack phpbb3 integration

	// info phpbb3
	$phpbb3_res = get_fresh_config("SELECT `key`,`value` FROM {$TABLE_PREFIX}settings");
	$phpbb_integration = $phpbb3_res["phpbb3"];
	$phpbb_db_prefix = $phpbb3_res["phpbb3_prefix"];

	// default setting from phpbb3
	$ricavo_default_phpbb = mysql_query("SELECT `config_name`, `config_value` FROM `{$phpbb_db_prefix}config`") or die(mysql_error());

	while ($row_config = mysql_fetch_array($ricavo_default_phpbb, MYSQL_ASSOC))
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
	
	mysql_free_result($ricavo_default_phpbb);
	
	$get_group_info = mysql_query("SELECT `group_colour`, `group_id` FROM `{$phpbb_db_prefix}groups`WHERE `group_name` = 'REGISTERED' ") or die(mysql_error());
	$get_REGISTERED_info = mysql_fetch_assoc($get_group_info);
	$REGISTERED_colour = $get_REGISTERED_info["group_colour"];
	$REGISTERED_id = $get_REGISTERED_info["group_id"];
	// phpBB3 database info

	// estrapolo utenti gi* presenti in phpbb3
	// get users already registered in phpBB
	$query_info_users = "SELECT user_id, username FROM `{$phpbb_db_prefix}users`";
	$phpbb3_info_users = mysql_query($query_info_users);

	//	creo array con utenti gi* presenti in phpbb3
	// make an array with users already registered in phpBB
	while( $phpbb3_users_table = mysql_fetch_row($phpbb3_info_users) )
	{
	$phpbb3_username[] =  $phpbb3_users_table[1];
	}
	mysql_free_result( $phpbb3_info_users );
	
	// estrapolo email gi* presenti in phpbb3
	// get email already registered in phpBB
	$query_info_email = "SELECT user_id, user_email FROM `{$phpbb_db_prefix}users`";
	$phpbb3_info_email = mysql_query($query_info_email);

	// creo array con email gi* presenti in phpbb3
	// make an array with emails already registered in phpBB
	while( $phpbb3_email_table = mysql_fetch_row($phpbb3_info_email) )
	{
	$phpbb3_user_email[] = $phpbb3_email_table[1];
	}
	mysql_free_result( $phpbb3_info_email );

		if (in_array("$utente", $phpbb3_username))
		{	
			// new user on xbtit
			do_sqlquery("INSERT INTO {$TABLE_PREFIX}users (username, password, random, id_level, email, status_comment_notify, pm_mail_notify, style, language, flag, joined, lastconnect, pid, time_offset) VALUES ('$utente', '" . md5($pwd) . "', $random, $idlevel, '$email', $status_comment_notify, $pm_mail_notify, $idstyle, $idlangue, $idflag, NOW(), NOW(),'$pid', '".$timezone."')", true);
		}
		elseif (in_array("$email", $phpbb3_user_email))
		{	
			// new user on xbtit
			do_sqlquery("INSERT INTO {$TABLE_PREFIX}users (username, password, random, id_level, email, status_comment_notify, pm_mail_notify, style, language, flag, joined, lastconnect, pid, time_offset) VALUES ('$utente', '" . md5($pwd) . "', $random, $idlevel, '$email', $status_comment_notify, $pm_mail_notify, $idstyle, $idlangue, $idflag, NOW(), NOW(),'$pid', '".$timezone."')", true);
		}
		else
		{
			$pid_phpbb = $_SERVER['REMOTE_ADDR'];
			$phpbb_user_email_hash	= crc32(strtolower($email)) . strlen($email);

			// new user on xbtit
			do_sqlquery("INSERT INTO {$TABLE_PREFIX}users (username, password, random, id_level, email, status_comment_notify, pm_mail_notify, style, language, flag, joined, lastconnect, pid, time_offset) VALUES ('$utente', '" . md5($pwd) . "', $random, $idlevel, '$email', $status_comment_notify, $pm_mail_notify, $idstyle, $idlangue, $idflag, NOW(), NOW(),'$pid', '".$timezone."')", true);
	
			// new user on phpBB3
			$ricavo_info_users = mysql_fetch_assoc(mysql_query("SELECT language, time_offset FROM `{$TABLE_PREFIX}users` WHERE username = '$utente'"));
			$id_language = $ricavo_info_users["language"];
			$xbtit_timezone = $ricavo_info_users["time_offset"];

			// languages from xbtit 2.0.547 to phpbb
	switch ($id_language) {
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
			switch ($xbtit_timezone) {
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
	
			// add user on phpbb users
			do_sqlquery("INSERT INTO `{$phpbb_db_prefix}users` (`user_id`, `user_type`, `group_id`, `user_permissions`, `user_perm_from`, `user_ip`, `user_regdate`, `username`, `username_clean`, `user_password`, `user_passchg`, `user_pass_convert`, `user_email`, `user_email_hash`, `user_birthday`, `user_lastvisit`, `user_lastmark`, `user_lastpost_time`, `user_lastpage`, `user_last_confirm_key`, `user_last_search`, `user_warnings`, `user_last_warning`, `user_login_attempts`, `user_inactive_reason`, `user_inactive_time`, `user_posts`, `user_lang`, `user_timezone`, `user_dst`, `user_dateformat`, `user_style`, `user_rank`, `user_colour`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `user_message_rules`, `user_full_folder`, `user_emailtime`, `user_topic_show_days`, `user_topic_sortby_type`, `user_topic_sortby_dir`, `user_post_show_days`, `user_post_sortby_type`, `user_post_sortby_dir`, `user_notify`, `user_notify_pm`, `user_notify_type`, `user_allow_pm`, `user_allow_viewonline`, `user_allow_viewemail`, `user_allow_massemail`, `user_options`, `user_avatar`, `user_avatar_type`, `user_avatar_width`, `user_avatar_height`, `user_sig`, `user_sig_bbcode_uid`, `user_sig_bbcode_bitfield`, `user_from`, `user_icq`, `user_aim`, `user_yim`, `user_msnm`, `user_jabber`, `user_website`, `user_occ`, `user_interests`, `user_actkey`, `user_newpasswd`, `user_form_salt`)  VALUES (NULL, '0', '$REGISTERED_id', '', '0', '$pid_phpbb', UNIX_TIMESTAMP(), '$utente', '".strtolower($utente)."', '".md5($pwd)."', UNIX_TIMESTAMP(), '0', '$email', '$phpbb_user_email_hash', '', '0', UNIX_TIMESTAMP(), '0', '', '', '0', '0', '0', '0', '0', '0', '0', '$user_lang', '$user_timezone', '0', '$default_dateformat', '$default_style', '0', '$REGISTERED_colour', '0', '0', '0', '0', '-3', '0', '0', 't', 'd', '0', 't', 'a', '0', '1', '0', '1', '1', '1', '1', '895', '', '0', '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");
	
			// add user on phpbb user_group
			$ricavo_user_id = mysql_fetch_assoc(mysql_query("SELECT user_id FROM `{$phpbb_db_prefix}users` WHERE username = '$utente'"));
			$phpbb3_user_id = $ricavo_user_id["user_id"];
			do_sqlquery("INSERT INTO `{$phpbb_db_prefix}user_group` (`group_id`, `user_id`, `group_leader`, `user_pending`) VALUES ('$REGISTERED_id', '$phpbb3_user_id', '0', '0')");
	
			// update newest_user_id,newest_username, num_users
			do_sqlquery("UPDATE `{$phpbb_db_prefix}config` SET `config_value` = '$REGISTERED_colour' WHERE `config_name` = 'newest_user_colour' LIMIT 1 ");
			do_sqlquery("UPDATE `{$phpbb_db_prefix}config` SET `config_value` = '$phpbb3_user_id' WHERE CONVERT( `{$phpbb_db_prefix}config`.`config_name` USING utf8 ) = 'newest_user_id' LIMIT 1");
			do_sqlquery("UPDATE `{$phpbb_db_prefix}config` SET `config_value` = '$utente' WHERE CONVERT( `{$phpbb_db_prefix}config`.`config_name` USING utf8 ) = 'newest_username' LIMIT 1 ");
			do_sqlquery("UPDATE `{$phpbb_db_prefix}config` SET `config_value` = config_value+1 WHERE `config_name` = 'num_users' LIMIT 1 ");
		}

// end hack phpbb3 integration

$newuid = mysql_insert_id();

//begin invitation system by dodge
if ($INVITATIONSON == "true")
{
    $inviter = 0 + $_POST["inviter"];
    $code = unesc($_POST["code"]);
    $res = do_sqlquery("SELECT username FROM {$TABLE_PREFIX}users WHERE id = $inviter", true);
    $arr = mysql_fetch_assoc($res);
    $invusername = $arr["username"];
    do_sqlquery("UPDATE {$TABLE_PREFIX}users SET invited_by='" . $inviter .
        "' WHERE id='" . $newuid . "'", true);
    do_sqlquery("UPDATE {$TABLE_PREFIX}invitations SET confirmed='true' WHERE hash='$code'", true);
    $msg = sqlesc($language["WELCOME MESSAGE"]);
}
//end invitation system

// Continue to create smf members if they disable smf mode
// $test=do_sqlquery("SELECT COUNT(*) FROM {$db_prefix}members");
$test = do_sqlquery("SHOW TABLES LIKE '{$db_prefix}members'");

if ($FORUMLINK == "smf" || mysql_num_rows($test))
{
    $smfpass = smf_passgen($utente, $pwd);
    $flevel = $idlevel + 10;

    do_sqlquery("INSERT INTO {$db_prefix}members (memberName, dateRegistered, ID_GROUP, realName, passwd, emailAddress, memberIP, memberIP2, is_activated, passwordSalt) VALUES ('$utente', UNIX_TIMESTAMP(), $flevel, '$utente', '$smfpass[0]', '$email', '".getip()."', '".getip()."', 1, '$smfpass[1]')");
    $fid = mysql_insert_id();
    do_sqlquery("UPDATE `{$db_prefix}settings` SET `value` = $fid WHERE `variable` = 'latestMember'");
    do_sqlquery("UPDATE `{$db_prefix}settings` SET `value` = '$utente' WHERE `variable` = 'latestRealName'");
    do_sqlquery("UPDATE `{$db_prefix}settings` SET `value` = UNIX_TIMESTAMP() WHERE `variable` = 'memberlist_updated'");
    do_sqlquery("UPDATE {$TABLE_PREFIX}users SET smf_fid=$fid WHERE id=$newuid");
}

// xbt
if ($XBTT_USE)
   {
   $resin = do_sqlquery("INSERT INTO xbt_users (uid, torrent_pass) VALUES ($newuid, '$pid')");
   }

    if ($INVITATIONSON == "true")
    {
        send_pm('2', $newuid, '" . $language["WELCOME"] . "', $msg);
        if ($VALID_INV == "true")
        {
            send_mail($email, "$SITENAME " . $language["REG_CONFIRM"] . "", $language["INVIT_MSGINFO"] .
                "$email" . $language["INVIT_MSGINFO1"] . " $utente\n" . $language["INVIT_MSGINFO2"] .
                " $pwd\n\n" . $language["INVIT_MSGINFO3"], "From: $SITENAME <$SITEEMAIL>");
        }
        else
            send_mail($email, "$SITENAME " . $language["REG_CONFIRM"] . "", $language["INVIT_MSGINFO"] .
                "$email" . $language["INVIT_MSGINFO1"] . " $utente\n" . $language["INVIT_MSGINFO2"] .
                " $pwd\n\n\n" . $language["INVIT_MSG_AUTOCONFIRM3"], "From: $SITENAME <$SITEEMAIL>");

        write_log("Signup new user $utente ($email)", "add");
    }
    else
if ($VALIDATION == "user")
   {
   ini_set("sendmail_from", "");
   if (mysql_errno() == 0)
     {
      send_mail($email, $language["ACCOUNT_CONFIRM"], $language["ACCOUNT_MSG"]."\n\n".$BASEURL."/index.php?page=account&act=confirm&confirm=$random&language=$idlangue");
      write_log("Signup new user $utente ($email)", "add");
      }
   else
       die(mysql_error());
   }

return mysql_errno();
}

?>