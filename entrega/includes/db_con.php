<?
 ob_start();
error_reporting(1);

$parseDomain= parse_url($_SERVER['HTTP_HOST']);
$domainOnly	= str_replace('www.', '', $parseDomain['path']);
preg_match('/(.*?)((\.co)?.[a-z]{2,4})$/i', $domainOnly, $domainArr);

session_name($domainArr[1]);
ini_set('session.cookie_domain', '.'.$domainOnly);
session_set_cookie_params(0, '/', '.'.$domainOnly);

session_start();
date_default_timezone_set('Asia/Beirut'); 

$server = "localhost";			//Enter Server Name
$user 	= "root";	//Enter MySql DB Username
$pass 	= "root";		//Enter MySql DB User Password
$db 	= "ksa01_db";		//Enter Mysql DB Name

$domain = $domainOnly;
$siteBaseUrl = '/';
$adminBaseUrl = '/hala/admin/';
$systemEmailAddress = "noreply@aswakdubai.com";
/*$_SESSION['imgManagerFilePath'] = 'images/userfiles/';
$_SESSION['imgManagerFileSelectPath'] = 'images/userfiles/';
$_SESSION['imgManageruploadMaxSize'] = '30M';*/

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

$settingsRes = mysql_query('SELECT * FROM settings');

if($settingsRes && mysql_num_rows($settingsRes) > 0){
	$settings = array();
	while($settingsRow = mysql_fetch_object($settingsRes)){
		$settings[$settingsRow->sID] = stripslashes(trim($settingsRow->sValue));
	}
}

$hmCCount = 3;
$hmCatArr = array();
$hmCatRes = mysql_query('
	SELECT c.catID, c.catName, c.catSeoUrl 
	FROM category AS c
	WHERE c.parentID = 0 ORDER BY c.sOrder ASC
');
if(mysql_num_rows($hmCatRes) > 0){
	while($hmCatRow = mysql_fetch_object($hmCatRes)){
		$hmCatID	= $hmCatRow->catID;
		$hmCatName	= stripslashes($hmCatRow->catName);
		$hmCatSeoUrl= stripslashes($hmCatRow->catSeoUrl);
		
		$hmCatArr[$hmCatSeoUrl] = array(
			'count'		=> $hmCCount, 
			'catID'		=> $hmCatID, 
			'catName'	=> $hmCatName, 
			'catSeoUrl'	=> $hmCatSeoUrl  
		);
		
		$hmCCount++;
	}
}

$current_page_link = $_SERVER["SCRIPT_NAME"]; 
$currentPage = array_pop(explode("/", $current_page_link));

//echo $_SESSION['imgManagerFilePath'];

$yesNoArr = array('Y' => 'Yes', 'N' => 'No');
$statusArr = array('P' => '<span class="text-yellow">Pending</span>', 'A' => '<span class="text-green">Active</span>', 'D' => '<span class="text-red">Inactive</span>');

$advertStatusArr = array(
	'PE'=> '<span class="text-yellow">Pending</span>',
	'A' => '<span class="text-green">Active</span>', 
	'I' => '<span class="text-red">Inactive</span>'
);

$advertType = array(
    '2'=> '<span class="text-yellow">Side Banner</span>',
    '3' => '<span class="text-green">Bottom</span>',
    '4' => '<span class="text-red">Inner Banner 1000 px</span>',
    '5' => '<span class="text-red">inner banner 500x500</span>',
    '6' => '<span class="text-red">Feature Business Listing</span>'
);

$catTypesArr = array('S' => 'Sub Category', 'L' => 'Listings');
$bPositionArr = array('R' => 'Right Side', 'F' => 'Footer');
$linkTargetArr = array('_parent' => 'Parent Page', '_new' => 'New Window');
include_once('check_session.php');
?>