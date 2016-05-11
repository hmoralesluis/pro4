<?php
function CheckUserSession()
{
   if (array_key_exists('userID', $_SESSION)){
       
   }
   else{ 
   	 header('Location:sign-in.php');
   }  
}
CheckUserSession();
?>