<?
	#Validate Login Start
	if(
	!isset($_SESSION['user']) || 
	isset($_SESSION['user']) && !isset($_SESSION['user']['userID']) || 
	isset($_SESSION['user']) && isset($_SESSION['user']['userID']) && $_SESSION['user']['userID'] == ''
	){
		header('Location: login.php');
		exit;
	}
	#Validate Login End
?>