<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/post-validate-user.php');
	
	$formPostUrl = 'profile-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if(!$isUserLogged){
		$returnData['msg'] = 'Please Login to Access this Page.';
	}else {
		
		if($action == 'saveUser'){
			$fullName		= trim($_POST['efullName']);
			
			$mobile 		= trim($_POST['emobile']);
			$telephone 		= trim($_POST['etelephone']);
			$address 		= trim($_POST['eaddress']);
			$countryName 	= trim($_POST['ecountryName']);
			$aboutme 		= trim($_POST['eaboutme']);
			$profileImg		= trim($_POST['eprofileImg']);
			
			
			$oldpassword	= trim($_POST['eoldpassword']);
			$newpassword	= trim($_POST['enewpassword']);
			$confirmpassword= trim($_POST['econfirmpassword']);
			
			$userRow = mysql_fetch_object(mysql_query(
				'SELECT * FROM users WHERE userID = '.$_SESSION['user']['userID']
			));
			
			if($fullName == ''){
				$returnData['err']['efullName'] = '<span class="bg-red tip">Please Enter your Full Name.</span>';
			}else if($mobile == ''){
				$returnData['err']['emobile'] = '<span class="bg-red tip">Please Enter your Mobile Nummber.</span>';
			}else if($address == ''){
				$returnData['err']['eaddress'] = '<span class="bg-red tip">Please Enter your Address.</span>';
			}else if($countryName == ''){
				$returnData['err']['ecountryName'] = '<span class="bg-red tip">Please Enter your Country.</span>';
			}
			
			$updateSql = '
				UPDATE users SET 
				fullName	= "'.mysql_real_escape_string($fullName).'", 
				mobile		= "'.mysql_real_escape_string($mobile).'", 
				address		= "'.mysql_real_escape_string($address).'", 
				countryName	= "'.mysql_real_escape_string($countryName).'", 
			';
			
			if($telephone != ''){
				$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';
			}else {
				$updateSql .= 'telephone = NULL, ';
			}
			
			if($aboutme != ''){
				$updateSql .= 'aboutme = "'.mysql_real_escape_string($aboutme).'", ';
			}else {
				$updateSql .= 'aboutme = NULL, ';
			}
			
			if($profileImg != ''){
				$updateSql .= 'profileImg = "'.mysql_real_escape_string($profileImg).'" ';
			}else {
				$updateSql .= 'profileImg = NULL ';
			}
			
			if($oldpassword != '' && strlen($oldpassword) < 6){
				$returnData['err']['eoldpassword'] = '<span class="bg-red tip">Old Password cannot be Less than 6 Charecters.</span>';
			}else if($oldpassword != '' && $newpassword == ''){
				$returnData['err']['enewpassword'] = '<span class="bg-red tip">Please Enter New Password.</span>';
			}else if($newpassword != '' && strlen($newpassword) < 6){
				$returnData['err']['enewpassword'] = '<span class="bg-red tip">New Password cannot be Less than 6 Charecters.</span>';
			}else if($oldpassword != '' && $newpassword != $confirmpassword){
				$returnData['err']['econfirmpassword'] = '<span class="bg-red tip">Confirm Password Doesn\'t Match.</span>';
			}else if($oldpassword != '' && !validateRecord('users', array('password' => encrypt($oldpassword)))){
				$returnData['err']['eoldpassword'] = '<span class="bg-red tip">Invalid Old Password.</span>';
			}else if($oldpassword != ''){
				$updateSql .= ', password = "'.mysql_real_escape_string(encrypt($newpassword)).'" ';
			}
			
			$updateSql .= 'WHERE userID = '.$_SESSION['user']['userID'];
			
			//$returnData['sql'] = $updateSql;
			
			if(!isset($returnData['err'])){
				
				if(mysql_query($updateSql)){
					$returnData['msg'] = '<span class="bg-green tip">Profile Saved Successfully.</span>';
					
					$returnData['field']['eoldpassword']	= '';
					$returnData['field']['enewpassword']	= '';
					$returnData['field']['econfirmpassword']= '';
					
					$_SESSION['user']['name'] = $fullName;
					
					$returnData['status'] = 0;
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Saving Profile Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fill all Required Details.</span>';
			}
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>