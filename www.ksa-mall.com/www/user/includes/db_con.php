<?
ob_start();
error_reporting(0);

$parseDomain= parse_url($_SERVER['HTTP_HOST']);
$domainOnly	= str_replace('www.', '', $parseDomain['path']);
preg_match('/(.*?)((\.co)?.[a-z]{2,4})$/i', $domainOnly, $domainArr);

session_name($domainArr[1]);
ini_set('session.cookie_domain', '.'.$domainOnly);
session_set_cookie_params(0, '/', '.'.$domainOnly);

session_start();
date_default_timezone_set('Asia/Beirut');

$server = "localhost";			//Enter Server Name
$user 	= "ksa01_adm";	//Enter MySql DB Username
$pass 	= ")cTQ9DuS_DPR";		//Enter MySql DB User Password
$db 	= "ksa01_db";		//Enter Mysql DB Name

$domain = $url = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['SERVER_NAME'];

/*
$_SESSION['imgManagerFilePath'] = '../../images/userfiles/';
$_SESSION['imgManagerFileSelectPath'] = $domain.'images/userfiles/';
*/

if (!mysql_connect($server, $user, $pass)){
	die('Could not connect: ' . mysql_error());
}

mysql_select_db($db);

mysql_query('SET character_set_results=utf8');
mysql_query('SET names=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('SET collation_connection=utf8_general_ci');

$settings = array();
$settingsRes = mysql_query('SELECT * FROM settings');
if($settingsRes && mysql_num_rows($settingsRes) > 0){
	while($settingsRow = mysql_fetch_object($settingsRes)){
		$settings[$settingsRow->sID] = trim($settingsRow->sValue);
	}
}

$current_page_link = $_SERVER["SCRIPT_NAME"]; 
$currentPage = array_pop(explode("/", $current_page_link));

//echo $_SESSION['imgManagerFilePath'];

$yesNoArr = array('Y' => 'Yes', 'N' => 'No');
$statusArr = array(
	'A' => '<span class="btn btn-xs btn-success">Active</span>', 
	'I' => '<span class="btn btn-xs btn-danger">Inactive</span>', 
	'PE' => '<span class="btn btn-xs btn-warning">Pending</span>', 
	'P' => '<span class="text-yellow">Pending</span>',
	'D' => '<span class="text-red">Inactive</span>'
);
?>