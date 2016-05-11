<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Chanels')
	$header = array(
		'siteTitle' => 'Welcome',  
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			
		)
	);
	
	$formPostUrl = 'empty-page-post.php';
?>

<? require_once('includes/header.php'); ?>
	
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>