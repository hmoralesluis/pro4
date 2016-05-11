<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/post-validate-user.php');
	
	$formPostUrl = 'news-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if(!$isUserLogged){
		$returnData['msg'] = 'Please Login to Access this Page.';
	}else {
		if($action == 'action'){
			
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>