<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	/*echo '<h1>Before Destroy</h1>';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';*/
	
	session_destroy();
	
	/*echo '<h1>After Destroy</h1>';
	echo '<pre>';
	print_r($_SESSION);
	echo '</pre>';*/
	
	header("Location:sign-in.php");
?>