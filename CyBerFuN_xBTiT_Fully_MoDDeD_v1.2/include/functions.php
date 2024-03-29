<?php

// CyBerFuN.ro & xList.ro

// CyBerFuN .::. Functions
// http://tracker.cyberfun.ro/
// http://www.cyberfun.ro/
// http://xList.ro/
// http://xDnS.ro/
// http://yDnS.ro/
// Modified By cybernet2u

// CyBerFuN xBTiT Fully MoDDeD v1.2


// https://cyberfun-xbtit.svn.sourceforge.net/svnroot/cyberfun-xbtit

error_reporting(E_ALL ^ E_NOTICE);

#
// Emulate register_globals off
#


// Check for safe mode
if (ini_get('safe_mode')) {
// Do it the safe mode way
}
else
{
ini_set("memory_limit", "-1");
set_time_limit(0);
}
$tpl = new bTemplate();
if (@ini_get('register_globals')) {
  $superglobals = array($_SERVER, $_ENV, $_FILES, $_COOKIE, $_POST, $_GET);
  if (isset($_SESSION))
    array_unshift($superglobals, $_SESSION);
  foreach ($superglobals as $superglobal)
    foreach ($superglobal as $global => $value)
      unset($GLOBALS[$global]);
  @ini_set('register_globals', false);
}

// control if magic_quote_gpc = on
if(get_magic_quotes_gpc()){
  // function which remove unwanted slashes
  function remove_magic_quotes(&$array) {
    foreach($array as $key => $val)
      if(is_array($val))
        remove_magic_quotes($array[$key]);
      elseif (is_string($val))
        $array[$key] = str_replace(array('\\\\', '\\\"', "\'"), array('\\', '\"', "'"),$val);
  }

  remove_magic_quotes($_POST);
  remove_magic_quotes($_GET);
  remove_magic_quotes($_REQUEST);
  remove_magic_quotes($_SERVER);
  remove_magic_quotes($_FILES);
  remove_magic_quotes($_COOKIE);
}

@date_default_timezone_set(@date_default_timezone_get());

$CURRENTPATH = dirname(__FILE__);

include $CURRENTPATH.'/xbtit_version.php';
include($CURRENTPATH.'/CyBerFuN_xBTiT_version.php');
require_once $CURRENTPATH.'/config.php';
require_once $CURRENTPATH.'/common.php';
require_once $CURRENTPATH.'/smilies.php';
# protection against sql injection, xss attack
require_once $CURRENTPATH.'/crk_protection.php';
# including various classes
require_once $CURRENTPATH.'/class.bbcode.php';
require_once $CURRENTPATH.'/class.captcha.php';
require_once $CURRENTPATH.'/class.ajaxpoll.php';

if (!isset($TRACKER_ANNOUNCEURLS)) {
  $TRACKER_ANNOUNCEURLS = array();
  $TRACKER_ANNOUNCEURLS[] = $BASEURL.'/announce.php';
}
/*Mod by losmi - sticky mod*/
function getLevel($cur_level)
{
    global $TABLE_PREFIX;
    $query = "SELECT id, id_level FROM {$TABLE_PREFIX}users_level";
    $rez = do_sqlquery($query, true);
    
    while($row = mysql_fetch_assoc($rez))
    {
        if($row['id'] == $cur_level)
        {
            return $row['id_level'];
        }
    }
    return 0;
}
/*End mod by losmi - sticky mod*/
/*Mod by losmi - sticky mod
Operation #3*/
function updateSticky($hash, $sticky)
{
    global $TABLE_PREFIX;
    $query = "UPDATE {$TABLE_PREFIX}files 
                   SET sticky='$sticky'
                   WHERE info_hash ='$hash'";
    do_sqlquery($query, true);
   
}
/*End mod by losmi - sticky mod
End Operation #3*/
/*Mod by losmi - faq mod */
function genrelistfaq($append = '',$table = 'faq')
     {

     global $TABLE_PREFIX;

    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}$table WHERE active != '-1' ".$append." ORDER BY id");

    while ($row = mysql_fetch_assoc($res))
        $ret[] = $row;

    unset($row);
    mysql_free_result($res);

    return $ret;
}
/*End mod by losmi - faq mod*/
// gold mod
function getStatus($gold = 0)
{
    if($gold == 0)
    {
        return 'Classic';
    }
    if($gold == 1)
    {
        return 'Silver';
    }if($gold == 2)
    {
        return 'Gold';
    }
    return 'none';
}
function createUsersLevelCombo($selected = 0)
     {

     global $TABLE_PREFIX;

    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}users_level ORDER BY id");

    while ($row = mysql_fetch_assoc($res))
        $ret[] = $row;

    unset($row);
    mysql_free_result($res);

    $gold_select_box = "
      <select name='level' >";
      foreach ($ret as $key=>$value)
      {
        $s = '';
        if($value['id_level'] == $selected)
        {
            $s = 'selected';
        }
        $gold_select_box .= "<option value='".$value['id_level']."' ".$s.">".$value['level']."</option>";
        
      }
      $gold_select_box .= '</select><div id="description"></div>';
      
      return $gold_select_box;
}

function createGoldCategories($selected = '')
{
        global $TABLE_PREFIX;
      $gold_categories = array(
                0=>'Classic (0% free leach)',
                1=>'Silver (50% free leach)',
                2=>'Gold (100% free leach)'
      );
      $g_desc = '';
      $s_desc = '';
      $c_desc = '';
        $res = get_result("SELECT * FROM {$TABLE_PREFIX}gold  WHERE id='1'", true);
            foreach ($res as $key=>$value)
            {
                $g_desc = $value["gold_description"];
                $s_desc = $value["silver_description"];
                $c_desc = $value["classic_description"];
            }
      $gold_select_box = "
      <select name='gold' onchange=\"function ajde(val,c_desc,s_desc,g_desc)
      {
            var div = document.getElementById('description');
            if(val==0)
            {
            div.innerHTML = 'Note: $c_desc';
            }
            if(val==1)
            {
            div.innerHTML = 'Note: $s_desc';
            }
            if(val==2)
            {
            div.innerHTML = 'Note: $g_desc';
            }
      }
      ajde(this.value)\">";
      foreach ($gold_categories as $key=>$value)
      {
        $s = '';
        if($key == $selected)
        {
            $s = 'selected';
        }
        $gold_select_box .= "<option value='".$key."' ".$s.">".$value."</option>";
        
      }
      $gold_select_box .= '</select><div id="description"></div>';
      return $gold_select_box;
}
// end gold

function updatemoder($prefix, $moder, $id)
  {
    do_sqlquery("UPDATE {$prefix}files SET moder = '$moder' WHERE info_hash = '".$id."'");
  }
  
  function getmoderdetails($mod,$hash)
  {
    global $CURUSER;
    if ($CURUSER["edit_torrents"]=="yes" && $CURUSER['moderate_trusted']=='yes') {
                        $link="<a title=\"".$mod."\" href=\"index.php?page=edit&info_hash=".$hash."\"><img alt=\"".$mod."\" src=\"images/mod/".$mod.".png\"></a>";
                        }
                        else {
                        $link="<img alt=\"".$mod."\" src=\"images/mod/".$mod.".png\">";
                        }
                        $resend='';
                    if($mod=='bad')
                    {
                        $resend = '<br/>(Edit your torret to resend torrent for validation)';
                    }

                    return $link.$resend;
  }
  function genrelistreasons()
     {

     global $TABLE_PREFIX;

    $ret = array();
    $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}warn_reasons ORDER BY id");

    while ($row = mysql_fetch_assoc($res))
        $ret[] = $row;

    unset($row);
    mysql_free_result($res);

    return $ret;
}
  function updatemoderbyhash($moder,$torhash)
  {
    global $TABLE_PREFIX;
    do_sqlquery("UPDATE {$TABLE_PREFIX}files SET moder = '$moder' WHERE info_hash = '" . $torhash . "'",true);
  }
  function getmoderstatusbyhash($hash)
  {
    global $TABLE_PREFIX;
    $query ="SELECT moder FROM {$TABLE_PREFIX}files  WHERE info_hash ='" . $hash . "'";


    $res = do_sqlquery($query,true);
    $results = mysql_fetch_assoc($res);

    return $results['moder'];
  }

function load_css($css_name) {
// control if input template name exist in current user's stylepath, else return default
  global $BASEURL, $STYLEPATH, $STYLEURL;

  if (@file_exists($STYLEPATH.'/'.$css_name))
    return $STYLEURL.'/'.$css_name;
  return $BASEURL.'/style/CyBerFuN/'.$css_name;
}

/*Mod by losmi - visible mod
Operation #3*/
function updateVisible($hash, $visible)
{
    global $TABLE_PREFIX;
    $query = "UPDATE {$TABLE_PREFIX}files 
                   SET visible=".(int)$visible."
                   WHERE info_hash ='$hash'";
    do_sqlquery($query, true);
   
}
/*End mod by losmi - visible mod
End Operation #3*/


/*Mod by losmi - visible mod*/
function getLevelVisible($cur_level)
{
    global $TABLE_PREFIX;
    $query = "SELECT id, id_level FROM {$TABLE_PREFIX}users_level";
    $rez = do_sqlquery($query, true);
    
    while($row = mysql_fetch_assoc($rez))
    {
        if($row['id'] == $cur_level)
        {
            return $row['id_level'];
        }
    }
    return 0;
}
/*End mod by losmi - visible mod*/

function load_template($tpl_name) {
  // control if input template name exist in current user's stylepath, else return default
  global $THIS_BASEPATH, $STYLEPATH;

  if (@file_exists($STYLEPATH.'/'.$tpl_name))
    return $STYLEPATH.'/'.$tpl_name;
  return $THIS_BASEPATH.'/style/xbtit_default/'.$tpl_name;
}

function load_language($mod_language_name) {
  // control if input language exist in current user's language path, else return default
  global $THIS_BASEPATH, $USERLANG, $language;

  if (@file_exists($USERLANG.'/'.$mod_language_name)) {
    if ($USERLANG != $THIS_BASEPATH.'/language/english')
      include $THIS_BASEPATH.'/language/english/'.$mod_language_name;
    return $USERLANG.'/'.$mod_language_name;
  }
  return $THIS_BASEPATH.'/language/english/'.$mod_language_name;
}

function get_combo($select, $opts = array()) {
  $name = (isset($opts['name']))?' name="'.$opts['name'].'"':'';
  $complete = (isset($opts['complete']))?(bool)$opts['complete']:false;
  $default = (isset($opts['default']))?$opts['default']:NULL;
  $id = (isset($opts['id']))?$opts['id']:'id';
  $value = (isset($opts['value']))?$opts['value']:'value';
  $combo = '';

  if ($complete)
    $combo .= '<select'.$name.'>';

  foreach ($select as $option) {
    $combo .= "\n".'<option ';
    if ( (!is_null($default)) && ($option[$id] == $default) )
      $combo .= 'selected="selected" ';
    $combo .= 'value="'.$option[$id].'">'.unesc($option[$value]).'</option>';
  }

  if ($complete)
    $combo .= '</select>';

  return $combo;
}

function get_microtime() {
  return strtok(microtime(), ' ') + strtok('');
}

function cut_string($ori_string, $cut_after) {
  $rchars = array('_', '.', '-');
  $ori_string = str_replace($rchars, ' ', $ori_string);
  if (strlen($ori_string) > $cut_after && $cut_after > 0)
    return substr($ori_string, 0, $cut_after).'...';
  return $ori_string;
}

function print_debug($level = 3, $key = ' - ') {
    global $time_start, $gzip, $num_queries, $cached_querys;
    $time_end = get_microtime();
    switch ($level) {
        case '4':
            if (function_exists('memory_get_usage')) {
                $memory = '[ Memory: '.makesize(memory_get_usage());
                if (function_exists('memory_get_peak_usage'))
                    $memory .= '|'.makesize(memory_get_peak_usage());
                $return[] = $memory.' ]';
            }
        case '3':
            $return[] = '[ GZIP: '.$gzip.' ]';
        case '2':
            $return[] = '[ Script Execution: '.number_format(($time_end - $time_start), 4).' sec. ]';
        case '1':
            $return[] = '[ Queries: '.$num_queries.'|'.$cached_querys.' ]';
            break;
        default:
            return '';
    }
    return implode($key, array_reverse($return));
}

function print_version() {
$CURRENTPATH = dirname(__FILE__);

include($CURRENTPATH.'/cyberfun_footer.php');
  global $tracker_version;
  return '';
  return $cyberfun_footer;
}

function print_designer() {
  global $STYLEPATH, $tracker_version, $CyBerFuN_xBTiT_version, $google_tracking_code;

  if (file_exists($STYLEPATH.'/style_copyright.php')) {
     include($STYLEPATH.'/style_copyright.php');
     $CyBerFuN_xBTiT_version = '' . $CyBerFuN_xBTiT_version . '';
     $design_copyright = '' . $design_copyright . '';
  } else
     $CyBerFuN_xBTiT_version = 'v1.2 ( rev 570 )';
     $design_copyright = "[&nbsp;&nbsp;<u>CyBerFuN xBTiT " . $CyBerFuN_xBTiT_version . " By cybernet</u>: <a href=\"http://xList.ro/\" target=\"_blank\">xList Tracker</a>&nbsp;]<br /> [&nbsp;&nbsp;<u>xbtit " . $tracker_version . " By <a href=\"http://www.btiteam.org/\" target=\"_blank\">BTiTeam.org</a></u>&nbsp;]<br />";
  return $design_copyright;
}
function print_top()
{
  global $TABLE_PREFIX;
  return '<a href=\'#\'>Back To Top</a>';
}

// check online passed session and user's location
// this function will update the information into
// online table (session ID, ip, user id and location
function check_online($session_id, $location) {
  global $TABLE_PREFIX, $CURUSER;

  $location = sqlesc($location);
  $ip = getip();
  $uid = max(1,(int)$CURUSER['uid']);
  $suffix = sqlesc($CURUSER['suffixcolor']);
  $prefix = sqlesc($CURUSER['prefixcolor']);
  $uname = sqlesc($CURUSER['username']);
  $ugroup = sqlesc($CURUSER['level']);
  $warn = sqlesc($CURUSER['warn']);
  if ($uid == 1)
    $where = "WHERE session_id='$session_id'";
  else
    $where = "WHERE user_id='$uid' OR session_id='$session_id'";

  @quickQuery("UPDATE {$TABLE_PREFIX}online SET session_id='$session_id', user_name=$uname, user_group=$ugroup, prefixcolor=$prefix, suffixcolor=$suffix, location=$location, user_id=$uid, warn=$warn, lastaction=UNIX_TIMESTAMP() $where");
  // record don't already exist, then insert it
  if (mysql_affected_rows() == 0) { 
    @quickQuery("UPDATE {$TABLE_PREFIX}users SET lastconnect=NOW() WHERE id=$uid AND id>1");
    @quickQuery("INSERT INTO {$TABLE_PREFIX}online SET session_id='$session_id', user_name=$uname, user_group=$ugroup, prefixcolor=$prefix, suffixcolor=$suffix, user_id=$uid, user_ip='$ip', location=$location, warn=$warn, lastaction=UNIX_TIMESTAMP()");
  }

  $timeout = time() - 900; // 15 minutes
//  @quickQuery("UPDATE {$TABLE_PREFIX}users SET lastconnect=NOW() WHERE id IN (SELECT user_id FROM {$TABLE_PREFIX}online ol WHERE ol.lastaction<$timeout AND ol.user_id>1)");
    @quickQuery("UPDATE {$TABLE_PREFIX}users u INNER JOIN {$TABLE_PREFIX}online ol ON ol.user_id = u.id SET u.lastconnect=NOW(), u.cip=ol.user_ip, u.lip=INET_ATON(ol.user_ip) WHERE ol.lastaction<$timeout AND ol.user_id>1");
  @quickQuery("DELETE FROM {$TABLE_PREFIX}online WHERE lastaction<$timeout");
}

//Disallow special characters in username

function straipos($haystack, $array, $offset = 0) {
  $occ = array();
  for ($i = 0, $len = count($array); $i < $len; $i++) {
    $pos = strpos($haystack, $array[$i], $offset);
    if (is_bool($pos))
          continue;
    $occ[$pos] = $i;
  }
  if (empty($occ))
      return false;
  ksort($occ);
  reset($occ);
  list($key, $value) = each($occ);
  return array($key, $value);
}

// Even if you're missing PHP 4.3.0, the MHASH extension might be of use.
// Someone was kind enought to email this code snippit in.
if (function_exists('mhash') && (!function_exists('sha1')) && defined('MHASH_SHA1')) {
  function sha1($str) {
    return bin2hex(mhash(MHASH_SHA1, $str));
  }
}

// begin of function added from original
function unesc($x) {
  return stripslashes($x);
}

function mksecret($len = 20) {
  $ret = '';
  for ($i = 0; $i < $len; $i++)
    $ret .= chr(mt_rand(0, 255));
  return $ret;
}

function logincookie($id, $passhash, $expires = 0x7fffffff) {
  setcookie('uid', $id, $expires, '/');
  setcookie('pass', $passhash, $expires, '/');
}

function logoutcookie() {
  setcookie('uid', '', 0x7fffffff, '/');
  setcookie('pass', '', 0x7fffffff, '/');
}

function hash_pad($hash) {
  return str_pad($hash, 20);
}


      
function warn($arr, $big = false)
{
  if ($big)
    {
     $warnpic = "warn.gif";
     $style = "style=\"margin-left: 4pt\"";
  }
  else
    {
     $warnpic = "warn.gif";
     $style = "style=\"margin-left: 2pt\"";
  }

  $pics = $arr["warn"] == "yes" ? "<img src=\"images/$warnpic\" alt=\"WARNED USER !\" border=\"0\" $style />" : "";

  return $pics;
}

      

function userlogin() {
  global $CURUSER, $TABLE_PREFIX, $err_msg_install, $btit_settings;
  unset($GLOBALS['CURUSER']);

  $ip = getip(); //$_SERVER["REMOTE_ADDR"];
  $nip = ip2long($ip);
  $res = get_result("SELECT * FROM {$TABLE_PREFIX}bannedip WHERE INET_ATON('".$ip."') >= first AND INET_ATON('".$ip."') <= last LIMIT 1;", true, $btit_settings['cache_duration']);
  if (count($res) > 0) {
    header('HTTP/1.0 403 Forbidden');
?>
<html><body><h1>403 Forbidden</h1>Unauthorized IP address.</body></html>
<?php
die();
}

if ($btit_settings['xbtt_use'])
  {
    $udownloaded = "u.downloaded+IFNULL(x.downloaded,0)";
    $uuploaded = "u.uploaded+IFNULL(x.uploaded,0)";
    $utables = "{$TABLE_PREFIX}users u LEFT JOIN xbt_users x ON x.uid=u.id";
  }
  else
  {
    $udownloaded = "u.downloaded";
    $uuploaded = "u.uploaded";
    $utables = "{$TABLE_PREFIX}users u";
  }
// guest

$id = (!isset($_COOKIE['uid'])) ? 1 : max(1, (int)$_COOKIE['uid']);

    $res = do_sqlquery("SELECT u.warn, u.lip, u.cip, seedbonus, $udownloaded as downloaded, $uuploaded as uploaded, u.smf_fid, u.topicsperpage, u.postsperpage,u.torrentsperpage, u.flag, u.avatar, UNIX_TIMESTAMP(u.lastconnect) AS lastconnect, UNIX_TIMESTAMP(u.joined) AS joined, u.id as uid, u.username, u.password, u.random, u.email, u.language, u.style, u.time_offset, ul.* FROM $utables INNER JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE u.id = $id LIMIT 1;", true, $btit_settings['cache_duration']);
	$row = $res[0];
  if (!$row) {
    $id = 1;
    $res = do_sqlquery("SELECT u.warn, u.lip, u.cip, seedbonus, $udownloaded as downloaded, $uuploaded as uploaded, u.smf_fid, u.topicsperpage, u.postsperpage,u.torrentsperpage, u.flag, u.avatar, UNIX_TIMESTAMP(u.lastconnect) AS lastconnect, UNIX_TIMESTAMP(u.joined) AS joined, u.id as uid, u.username, u.password, u.random, u.email, u.language, u.style, u.time_offset, ul.* FROM {$TABLE_PREFIX}users u INNER JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE u.id = 1 LIMIT 1;", true, $btit_settings['cache_duration']);
    $row = $res[0];
  }
  if (!isset($_COOKIE['pass'])) $_COOKIE['pass'] = '';
  if (($_COOKIE['pass'] != md5($row['random'].$row['password'].$row['random'])) && $id != 1) {
    $id = 1;
    $res = do_sqlquery("SELECT u.warn, u.lip, u.cip, seedbonus, $udownloaded as downloaded, $uuploaded as uploaded, u.smf_fid, u.topicsperpage, u.postsperpage,u.torrentsperpage, u.flag, u.avatar, UNIX_TIMESTAMP(u.lastconnect) AS lastconnect, UNIX_TIMESTAMP(u.joined) AS joined, u.id as uid, u.username, u.password, u.random, u.email, u.language, u.style, u.time_offset, ul.* FROM {$TABLE_PREFIX}users u INNER JOIN {$TABLE_PREFIX}users_level ul ON u.id_level=ul.id WHERE u.id = 1 LIMIT 1;", true, $btit_settings['cache_duration']);
    $row = $res[0];
  }

  // CHECK FOR INSTALLATION FOLDER WITHOUT INSTALL.ME
  if ($row['id_level'] == 8 && (file_exists('install.php') || file_exists('upgrade.php'))) // only owner level
    $err_msg_install = '<div align="center" style="color:red; font-size:12pt; font-weight: bold;">SECURITY WARNING: Delete install.php & upgrade.php!</div>';
  else
    $err_msg_install = '';

  $GLOBALS['CURUSER'] = $row;
  foreach ($row as $key => $value)
    {
      if ($key != 'password')
         $_SESSION['user'][$key] = $value;

	}
  unset($row);
}

function dbconn($do_clean = false) {
  global $dbhost, $dbuser, $dbpass, $database, $language;

  if ($GLOBALS['persist'])
    $conres = mysql_pconnect($dbhost, $dbuser, $dbpass);
  else
    $conres = mysql_connect($dbhost, $dbuser, $dbpass);

  if (!$conres) {
    switch (mysql_errno()) {
      case 1040:
      case 2002:
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
          die('<html><head><meta http-equiv=refresh content="20;'.$_SERVER['REQUEST_URI'].'"></head><body><table border="0" width="100%" height="100%"><tr><td><h3 align="center">'.$language['ERR_SERVER_LOAD'].'</h3></td></tr></table></body></html>');
        die($language['ERR_CANT_CONNECT']);
      default:
        die('['.mysql_errno().'] dbconn: mysql_connect: '.mysql_error());
    }
  }

if($GLOBALS["charset"] == "UTF-8")
      do_sqlquery("SET NAMES utf8");

  mysql_select_db($database) or die($language['ERR_CANT_OPEN_DB'].' '.$database.' - '.mysql_error());

  userlogin();

  if ($do_clean)
    register_shutdown_function('cleandata');
}

function cleandata() {
  global $CURRENTPATH, $TABLE_PREFIX, $btit_settings;

  global $clean_interval;

  if ($clean_interval == 0)
    return;

  $now = time();
  $res = get_result("SELECT last_time as lt FROM {$TABLE_PREFIX}tasks WHERE task='sanity'", true, $btit_settings['cache_duration']);
  $row = $res[0];
  if (!$row) {
    do_sqlquery("INSERT INTO {$TABLE_PREFIX}tasks (task, last_time) VALUES ('sanity', $now)");
    return;
  }
  $ts = $row['lt'];
  if ($ts + $clean_interval > $now)
    return;
  do_sqlquery("UPDATE {$TABLE_PREFIX}tasks SET last_time=$now WHERE task='sanity' AND last_time = $ts");
  if (!mysql_affected_rows())
    return;

  require_once $CURRENTPATH.'/sanity.php';
  do_sanity();
}

function updatedata() {
  global $CURRENTPATH, $TABLE_PREFIX, $btit_settings;

  require_once $CURRENTPATH.'/getscrape.php';
  global $update_interval;

  if ($update_interval == 0)
    return;

  $now = time();

  $res = get_result("SELECT last_time as lt FROM {$TABLE_PREFIX}tasks WHERE task='update'", true, $btit_settings['cache_duration']);
  $row = $res[0];
  if (!$row) {
    do_sqlquery("INSERT INTO {$TABLE_PREFIX}tasks (task, last_time) VALUES ('update', $now)");
    return;
  }
  $ts = $row['lt'];
  if ($ts + $update_interval > $now)
    return;

  do_sqlquery("UPDATE {$TABLE_PREFIX}tasks SET last_time=$now WHERE task='update' AND last_time = $ts");
  if (!mysql_affected_rows())
    return;

  $res = get_result("SELECT announce_url FROM {$TABLE_PREFIX}files WHERE external='yes' ORDER BY lastupdate ASC LIMIT 1", true, $btit_settings['cache_duration']);
  if (!$res || count($res) == 0)
    return;

  // get the url to scrape, take 5 torrent at a time (try to getting multiscrape)
  $row = $res[0];
  $resurl = get_result("SELECT info_hash FROM {$TABLE_PREFIX}files WHERE external='yes' AND announce_url='".$row['announce_url']."' ORDER BY lastupdate ASC LIMIT 5", true, $btit_settings['cache_duration']);
  if (!$resurl || count($resurl) == 0)
    return

  $combinedinfohash = array();
  foreach ($resurl as $id=> $rhash)
    $combinedinfohash[] = $rhash['info_hash'];

  //scrape($row["announce_url"],$row["info_hash"]);
  scrape($row[0], implode("','", $combinedinfohash));
}

function pager($rpp, $count, $href, $opts = array()) {
  global $language;

  $pages = ($rpp == 0) ? 1:ceil($count / $rpp);

  if (!isset($opts['lastpagedefault']))
    $pagedefault = 1;
  else {
    $pagedefault = floor(($count - 1) / $rpp);
    if ($pagedefault < 1)
      $pagedefault = 1;
  }

  $pagename='pages';

  if (isset($opts['pagename'])) {
    $pagename = $opts['pagename'];
    if (isset($_GET[$opts['pagename']]))
      $page = max(1, intval($_GET[$opts['pagename']]));
    else
      $page = $pagedefault;
  } elseif (isset($_GET['pages'])) {
    $page = max(1, intval(0 + $_GET['pages']));
    if ($page < 0)
      $page = $pagedefault;
  } else
    $page = $pagedefault;

  $pager = '';

  if ($pages > 1) {
    $pager .= "\n".'<form name="change_page'.$pagename.'" method="post" action="index.php">'."\n".'<select class="drop_pager" name="pages" onchange="location=document.change_page'.$pagename.'.pages.options[document.change_page'.$pagename.'.pages.selectedIndex].value" size="1">';
    for ($i = 1; $i <= $pages; $i++) 
        $pager .= "\n<option ".($i == $page ? 'selected="selected"':'')."value=\"$href$pagename=$i\">$i</option>";
    $pager.="\n</select>";
  }

  $mp = $pages;// - 1;
  $begin = ($page > 3 ? ($page < $pages - 2 ? $page - 2:$pages - 2):1);
  $end = ($pages > $begin + 2 ? ($begin + 2 < $pages ? $begin + 2:$pages):$pages);
  if ($page > 1) {
    $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=1\">&nbsp;&laquo;</a></span>";
    $pager .= "\n<span class=\"pager\"><a href=\"{$href}$pagename=".($page-1)."\">&lt;&nbsp;</a></span>";
  }

  if ($count) {
    for ($i = $begin; $i <= $end; $i++) {
      if ($i != $page)
        $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=$i\">$i</a></span>";
      else
        $pager .= "\n&nbsp;<span class=\"pagercurrent\"><b>$i</b></span>";
    }

    if ($page < $mp && $mp >= 1) {
      $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=".($page + 1)."\">&nbsp;&gt;</a></span>";
      $pager .= "\n&nbsp;<span class=\"pager\"><a href=\"{$href}$pagename=$pages\">&nbsp;&raquo;</a></span>";
    }

    $pagertop = "$pager\n</form>";
    $pagerbottom = str_replace("change_page","change_page1", $pagertop)."\n";
  } else {
    $pagertop = "$pager\n</form>";
    $pagerbottom = str_replace("change_page","change_page1", $pagertop)."\n";
  }

  $start = ($page - 1) * $rpp;
  if ($pages < 2) {
    // only 1 page??? don't need pager ;)
    $pagertop = '';
    $pagerbottom = '';
  }

  return array($pagertop, $pagerbottom, "LIMIT $start, $rpp");
}

// give back categories recorset
function genrelist() {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'categories ORDER BY sort_index, id', true, $CACHE_DURATION);
}

// this returns all the categories with subs into a select
function categories($val = '') {
  global $TABLE_PREFIX, $CACHE_DURATION;

  $return = "\n".'<select name="category"><option value="0">----</option>';

  $c_q = get_result("SELECT c.id, c.name, sc.id as sid, sc.name as sname FROM {$TABLE_PREFIX}categories c LEFT JOIN {$TABLE_PREFIX}categories sc on c.id=sc.sub where c.sub='0' ORDER BY c.sort_index, sc.sort_index, c.id, sc.id", true, $CACHE_DURATION);
  $b_sub = 0;
  foreach ($c_q as $c) {
    $cid = $c['id'];
    $name = unesc($c['name']);

    if ($b_sub != $cid && $b_sub != 0)
      $return .= "\n</optgroup>";

    // lets see if it has sub-categories.
    if (empty($c['sid'])) {
      $b_sub = 0;
      $return .= "\n<option".(($cid == $val) ? ' selected="selected"':'').' value="'.$cid.'">'.$name.'</option>';
    } else {
      if ($b_sub != $cid) {
        $return .= "\n<optgroup label='$name'>";
        $b_sub = $cid;
      }
      $sub = $c['sid'];
      $return .= "\n<option".(($sub == $val) ? ' selected="selected"':'').' value="'.$sub.'">'.unesc($c['sname']).'</option>';
    }
  }

  return $return.'</select>';
}

// this returns all the subcategories
function sub_categories($val = '') {
  global $TABLE_PREFIX, $CACHE_DURATION;

  $return = "\n<select name='sub_category'><option value='0'>---</option>";
  $c_q = get_result("SELECT id, name FROM {$TABLE_PREFIX}categories WHERE sub='0' ORDER BY sort_index, id", true, $CACHE_DURATION);
  foreach($c_q as $c) {
    $cid = $c['id'];
    $name = unesc($c['name']);
    $selected = ($cid == $val)?'selected="selected"':'';
    $return.= "\n<option $selected value='$cid'>$name</option>";
  }

  return $return."\n</select>";
}

// this returns the category of a sub-category
function sub_cat($sub) {
  global $TABLE_PREFIX, $CACHE_DURATION;

  $c_q = get_result('SELECT name FROM '.$TABLE_PREFIX.'categories WHERE id='.$sub.' LIMIT 1;', true, $CACHE_DURATION);
  return unesc($c_q[0]['name']);
}

function style_list() {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'style ORDER BY id;', true, $CACHE_DURATION);
}

function cat_list()
         {

         global $TABLE_PREFIX;

         $ret = array();
         $res = do_sqlquery("SELECT * FROM {$TABLE_PREFIX}categories ORDER BY sort_index");

         while ($row = mysql_fetch_assoc($res))
             $ret[] = $row;

         unset($row);
         mysql_free_result($res);

         return $ret;
}

function language_list() {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'language ORDER BY language;', true, $CACHE_DURATION);
}

function flag_list($with_unknown = false) {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'countries '.(!$with_unknown?'WHERE id<>100':'').' ORDER BY name;', true, $CACHE_DURATION);
}

function timezone_list() {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'timezone;', true, $CACHE_DURATION);
}

function rank_list() {
  global $TABLE_PREFIX, $CACHE_DURATION;

  return get_result('SELECT * FROM '.$TABLE_PREFIX.'users_level ORDER BY id_level;', true, $CACHE_DURATION);
}

# This will show your site name & your url, where you place your tags! 
# <tag:site_name /> and <tag:tracker_url /> . 
function print_sitename()
{
  global $SITENAME;

return $SITENAME;
}
function print_trackerurl()
{
  global $BASEURL;	

return $BASEURL;
}
# this will show the users name where you place the <tag:user_name />
function print_username()
{
   global $CURUSER;
  $username = ($CURUSER['username']); 
  return $username;
}
# End
# Begin standard foot tags!
 
function stdfoot($normalpage = true, $update = true, $adminpage = false, $torrentspage = false, $forumpage = false) {
  global $STYLEPATH, $tpl, $no_columns;

  $tpl->set('to_top',print_top());
  $tpl->set('tracker_url',print_trackerurl());
  $tpl->set('site_name',print_sitename());
  $tpl->set('user_name',print_username());
  $tpl->set('main_footer',bottom_menu()."<br />\n");
  $tpl->set('xbtit_version',print_version());
  $tpl->set('style_copyright',print_designer());
  $tpl->set('xbtit_debug',print_debug());

  if ($normalpage && !$no_columns)
    echo $tpl->fetch(load_template('main.tpl'));
  elseif ($adminpage)
    echo $tpl->fetch(load_template('main.left_column.tpl'));
  elseif ($torrentspage || $forumpage || $no_columns == 1)
    echo $tpl->fetch(load_template('main.no_columns.tpl'));
  else
    echo $tpl->fetch(load_template('main.no_header_1_column.tpl')); 
  ob_end_flush();

  if ($update)
    register_shutdown_function('updatedata');
}

function linkcolor($num) {
  if (!$num)
    return '#FF0000';
    return '#FFFF00';
}

function format_comment($text, $strip_html = true, $smilies = true ) {
  global $smilies, $privatesmilies, $BASEURL;

  if ($strip_html)
    $text = htmlspecialchars($text);
  $text = unesc($text);
  $f = @fopen('badwords.txt','r');
  if ($f && filesize ('badwords.txt') != 0) {
    $bw = fread($f,filesize('badwords.txt'));
    $badwords = explode("\n", $bw);
    for ($i = 0, $total = count($badwords); $i < $total;++$i)
      $badwords[$i] = trim($badwords[$i]);
    $text = str_replace($badwords, '*censored*', $text);
  }
  @fclose($f);

  $text = bbcode($text);

  if($smilies) {
    $smilies = array_merge($smilies, $privatesmilies);
    reset($smilies);
    while (list($code, $url) = each($smilies))
      $text = str_replace($code, '<img border="0" src="'.$BASEURL.'/images/smilies/'.$url.'" alt="'.$url.'" />', $text);
  }

  return $text;
}

function image_or_link($image, $pers_style = '',$link = '') {
  global $STYLEURL, $STYLEPATH;

  if ($image == '')
    return $link;
  if (!file_exists($image))
      return $link;
  // replace realpath with url
  return '<img src="'.str_replace($STYLEPATH, $STYLEURL, $image).'" border="0" '.$pers_style.' alt="'.$link.'"/>';
}

function success_msg($heading = 'Success!', $string, $close = false) {
  global $language, $STYLEPATH, $tpl, $page, $STYLEURL;

  $suc_tpl = new bTemplate();
  $suc_tpl->set('success_title', $heading);
  $suc_tpl->set('success_message', $string);
  $suc_tpl->set('success_image', $STYLEURL.'/images/success.gif');
  $tpl->set('main_content', set_block($heading,'center', $suc_tpl->fetch(load_template('success.tpl'))));
}

function err_msg($heading = 'Error!', $string, $close = false) {
  global $language, $STYLEPATH, $tpl, $page, $STYLEURL;

  // just in case not found the language
  if (!$language['BACK'])
    $language['BACK'] = 'Back';

  $err_tpl = new bTemplate();
  $err_tpl->set('error_title', $heading);
  $err_tpl->set('error_message', $string);
  $err_tpl->set('error_image', $STYLEURL.'/images/error.gif');
  $err_tpl->set('language', $language);
  if ($close)
    $err_tpl->set('error_footer','<a href="javascript: window.close();">'.$language['CLOSE'].'</a>');
  else
    $err_tpl->set('error_footer','<a href="javascript: history.go(-1);">'.$language['BACK'].'</a>');

  $tpl->set('main_content', set_block($heading, 'center', $err_tpl->fetch(load_template('error.tpl'))));
}

function information_msg($heading = 'Error!', $string, $close = false) {
  global $language, $STYLEPATH, $tpl, $page, $STYLEURL;
  // just in case not found the language
  if (!$language['BACK'])
    $language['BACK'] = 'Back';

  $err_tpl = new bTemplate();
  $err_tpl->set('information_title', $heading);
  $err_tpl->set('information_message', $string);
  $err_tpl->set('information_image', $STYLEURL.'/images/error.gif');
  $err_tpl->set('language', $language);

  if ($close)
    $err_tpl->set('information_footer','<a href="javascript: window.close();">'.$language['CLOSE'].'</a>');
  else
    $err_tpl->set('information_footer','<a href="javascript: history.go(-1);">'.$language['BACK'].'</a>');


  $tpl->set('main_content', set_block($heading, 'center', $err_tpl->fetch(load_template('information.tpl'))));

  stdfoot(true, false);
  die();
}

function sqlesc($x) {
  return '\''.mysql_real_escape_string($x).'\'';
}

function get_content($file) {
  global $STYLEPATH, $TABLE_PREFIX, $language;

  ob_start();
  include($file);
  $content = ob_get_contents();
  ob_end_clean();

  return $content;
}

function set_block($block_title, $alignement, $block_content, $width100 = true) {
  global $STYLEPATH, $TABLE_PREFIX, $language;

  $blocktpl = new bTemplate();
  $blocktpl->set('block_width', ($width100 ? 'width="100%"':''));
  $blocktpl->set('block_title', $block_title);
  $blocktpl->set('block_align', $alignement);
  $blocktpl->set('block_content', $block_content);
  return $blocktpl->fetch(load_template('block.tpl'));
}

function get_block($block_title, $alignement, $block, $use_cache = true, $width100 = true) {
  global $STYLEPATH, $TABLE_PREFIX, $language, $CACHE_DURATION, $CURUSER;

  $blocktpl = new bTemplate();
  $blocktpl->set('block_width',($width100?'width="100%"':''));
  $blocktpl->set('block_title',$block_title);
  $blocktpl->set('block_align',$alignement);

  $cache_file = realpath(dirname(__FILE__).'/..').'/cache/'.md5($block.$CURUSER['id_level']).'.txt';
  $use_cache = ($use_cache) ? $CACHE_DURATION > 0 : false;
    
  if ($use_cache) {

    // read cache
    if (file_exists($cache_file) && (time()-$CACHE_DURATION) < filemtime($cache_file)) {
      $blocktpl->set('block_content', file_get_contents($cache_file));
      return $blocktpl->fetch(load_template('block.tpl'));
        }
  }

  ob_start();
  include(realpath(dirname(__FILE__).'/..').'/blocks/'.$block.'_block.php');
  $block_content = ob_get_contents();
  ob_end_clean();

  if ($use_cache) {
    // write cache file
    $fp = fopen($cache_file, 'w');
    fputs($fp, $block_content);
    fclose($fp);
  }

  $blocktpl->set('block_content', $block_content);
  return $blocktpl->fetch(load_template('block.tpl'));
}

function block_begin($title = '-', $colspan = 1, $calign = 'justify') {
}

function block_end($colspan = 1) {
}

function makesize($bytes) {
  if (abs($bytes) < 1024000)
    return number_format($bytes / 1024, 2).' KB';
  if (abs($bytes) < 1048576000)
    return number_format($bytes / 1048576, 2).' MB';
  if (abs($bytes) < 1073741824000)
    return number_format($bytes / 1073741824, 2).' GB';
  return number_format($bytes / 1099511627776, 2).' TB';
}

function makesize1($bytes) {
  if (abs($bytes) < 1000 * 1024)
    return number_format($bytes / 1024, 2) . "";
  if (abs($bytes) < 1000 * 1048576)
    return number_format($bytes / 1048576, 2) . "";
  if (abs($bytes) < 1000 * 1073741824)
    return number_format($bytes / 1073741824, 2) . "";
  return number_format($bytes / 1099511627776, 2) . "";
}

function redirect($redirecturl) {
    global $language;

  if (headers_sent()) {
?>
<script language="javascript">
  window.location.href='<?php echo $redirecturl; ?>';
</script>
<meta http-equiv="refresh" content="2;<?php echo $redirecturl; ?>">
<?php
        echo sprintf($language['REDIRECT2'], $redirecturl);
    } else
    header('Location: '.$redirecturl);
    die();
}

function textbbcode($form, $name, $content = '') {
  $tpl_bbcode = new bTemplate();
  $tpl_bbcode->set('form_name', $form);
  $tpl_bbcode->set('object_name', $name);
  $tpl_bbcode->set('content', $content);
  $tbbcode = '<table width="100%" cellpadding="1" cellspacing="1">';

  global $smilies, $STYLEPATH, $language;
  $count = 0;
  reset($smilies);
  $tbbcode .= '<tr>';
  while ((list($code, $url) = each($smilies)) && $count < 16) {
    $tbbcode .= "\n<td><a href=\"javascript: SmileIT('".str_replace("'","\'",$code)."',document.forms.$form.$name);\"><img border=\"0\" src=\"images/smilies/$url\" alt=\"$url\" /></a></td>";
    $count++;
  }
  $tbbcode .= "\n</tr>\n</table>";
  $tpl_bbcode->set('smilies_table', $tbbcode);
  $tpl_bbcode->set('language', $language);
  return $tpl_bbcode->fetch(load_template('txtbbcode.tpl'));
}

// begin functions for the forum
function is_valid_id($id) {
  return is_numeric($id) && ($id > 0) && (floor($id) == $id);
}

function get_date_time($timestamp = 0) {
  if ($timestamp)
    return date('d/m/Y H:i:s', $timestamp - $offset);

  global $CURRENTPATH;
  include $CURRENTPATH.'/offset.php';
  return gmdate('d/m/Y H:i:s');
}

function stderr($heading, $text, $close = false) {
  err_msg($heading, $text, $close);
  stdfoot(true, false);
  die();
}

function encodehtml($s, $linebreaks = true) {
  $s = str_replace('<', '&lt;', str_replace('&', '&amp;', $s));
  if ($linebreaks)
    return nl2br($s);
  return $s;
}

function get_elapsed_time($ts) {
  $mins = floor((time() - $ts) / 60);
  $hours = floor($mins / 60);
  $mins -= $hours * 60;
  $days = floor($hours / 24);
  $hours -= $days * 24;
  $weeks = floor($days / 7);
  $days -= $weeks * 7;
  if ($weeks > 0)
    return $weeks.' week'.(($weeks == 1)?'':'s');
  if ($days > 0)
    return $days.' day'.(($days == 1)?'':'s');
  if ($hours > 0)
    return $hours.' hour'.(($hours == 1)?'':'s');
  if ($mins > 0)
    return $mins.' min'.(($mins == 1)?'':'s');
  return '< 1 min';
}

function sql_timestamp_to_unix_timestamp($s) {
  return mktime(substr($s, 11, 2), substr($s, 14, 2), substr($s, 17, 2), substr($s, 5, 2), substr($s, 8, 2), substr($s, 0, 4));
}

function gmtime() {
  return strtotime(get_date_time());
}

function sqlerr($file = '', $line = '') {
    $file = (($file != ''&& $line != '')? '<p>in '.$file.', line '.$line.'</p>' : '');
?>
  <table border="0" bgcolor="" align=left cellspacing=0 cellpadding=10 style="background: blue">
    <tr>
          <td class=embedded><font color="#FFFFFF"><h1><?php echo ERR_SQL_ERR; ?></h1>
            <b><?php echo mysql_error().$file;?></b></font></td>
        </tr>
    </table>
<?php
  die();
}

function peercolor($num) {
  if (!$num)
    return '#FF0000';
  elseif ($num == 1)
    return '#BEC635';
  return '#008000';
}

// v.1.3
function write_log($text, $reason = 'add') {
  global $CURUSER, $LOG_ACTIVE, $TABLE_PREFIX;

  if ($LOG_ACTIVE)
    do_sqlquery('INSERT INTO '.$TABLE_PREFIX.'logs (added, txt,type,user) VALUES(UNIX_TIMESTAMP(), '.sqlesc($text).', '.sqlesc($reason).',"'.$CURUSER['username'].'")');
}

function DateFormat($seconds) {
  while ($seconds > 31536000) {
    $years++;
    $seconds -= 31536000;
    }

  while ($seconds > 2419200) {
    $months++;
    $seconds -= 2419200;
    }

  while ($seconds > 604800) {
    $weeks++;
    $seconds -= 604800;
    }

  while ($seconds > 86400) {
    $days++; 
    $seconds -= 86400;
    }

  while ($seconds > 3600) {
    $hours++; 
    $seconds -= 3600;
    }

  while ($seconds > 60) {
    $minutes++; 
    $seconds -= 60;
    }

  $years = ($years == 0) ? '':($years.' '.(($years == 1)?YEAR:YEARS).', ');
    $months = ($months == 0) ? '':($months.' '.(($months == 1)?MONTH:MONTHS).', ');
    $weeks = ($weeks == 0) ? '':($weeks.' '.(($weeks == 1)?WEEK:WEEKS).', ');
    $days = ($days == 0) ? '':($days.' '.(($days == 1)?DAY:DAYS).', ');
    $hours = ($hours == 0) ? '':($hours.' '.(($hours == 1)?HOUR:HOURS).', ');
    $minutes = ($minutes == 0) ? '':($minutes.' '.(($minutes == 1)?MINUTE:MINUTES).' '.WORD_AND.' ');
    $seconds = ($seconds.' '.(($seconds == 1)?SECOND:SECONDS));
    return $years.$months.$weeks.$days.$hours.$minutes.$seconds;
}

function smf_passgen($username, $pwd) {
  $passhash = sha1(strtolower($username) . $pwd);
  $salt = substr(md5(rand()), 0, 4);

  return array($passhash, $salt);
}

function set_smf_cookie($id, $passhash, $salt) {
  global $THIS_BASEPATH;

    require $THIS_BASEPATH.'/smf/SSI.php';
  require $THIS_BASEPATH.'/smf/Sources/Subs-Auth.php';
  setLoginCookie(189216000, $id, sha1($passhash . $salt));
}

if ( !function_exists('htmlspecialchars_decode') ) {
  function htmlspecialchars_decode($text) {
    return strtr($text, array_flip(get_html_translation_table(HTML_SPECIALCHARS)));
  }
}

if (!function_exists("stripos")) {
  function stripos($str,$needle) {
   return strpos(strtolower($str),strtolower($needle));
  }
}
// EOF
?>
