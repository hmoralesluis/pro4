<?
	#Validate Login Start
	if(isset($_SESSION['user']) && isset($_SESSION['user']['userID']) && $_SESSION['user']['userID'] != ''){
		$isUserLogged = true;
	}else {
		$isUserLogged = false;
	}
	#Validate Login End
?>