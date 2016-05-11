<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Chanels')
	$header = array(
		'siteTitle' => 'Welcome', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> '',
		'cMenu'		=> '', 
		'breadcrumb'=> array(
			
		)
	);
	
	$formPostUrl = 'empty-page-post.php';
?>

<? require_once('includes/header.php'); ?>
	
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>