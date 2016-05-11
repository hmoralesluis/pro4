<?php
function isLoggedIn()
{		
   if (array_key_exists('userID', $_SESSION)){
   	 	return 1;
   }else{
   		return 0;
   }
}

function CheckUserSession()
{	
   if (!array_key_exists('userID', $_SESSION)){
   	 header('Location:sign-in.php');
   }  
}
?>