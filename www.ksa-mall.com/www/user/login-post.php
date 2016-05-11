<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	$formPostUrl = '';
	
	if($action == 'login'){
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		
		if($email == ''){
			$returnData['msg'] = '<span class="bg-red">Please Enter Email.</span>';
		}else if(!isEmail($email)){
			$returnData['msg'] = '<span class="bg-red">Please Enter a Valid Email.</span>';
		}else if($password == ''){
			$returnData['msg'] = '<span class="bg-red">Please Enter Password.</span>';
		}else {
			$sql = '
				SELECT * FROM users 
				WHERE email = "'.mysql_real_escape_string($email).'" 
			';
			
			$res = mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				$row = mysql_fetch_object($res);
				
				if($row->status == 'D'){
					$returnData['msg'] = '<span class="red">Account Deactivated, Contact Admin.</span>';
				}else if($row->password == encrypt($password)){
					
					if($saveLog['status'] == 0){
						$returnData['status'] = 0;
						
						$_SESSION['userID']				= $row->userID;
						$_SESSION['user']['userID']		= $row->userID;
						
						$_SESSION['user']['name']		= $row->fullname;
						$_SESSION['user']['email']		= $row->email;
						$_SESSION['user']['telephone']	= $row->telephone;
						$_SESSION['user']['profileImg']	= $row->profileImg;
						
						$returnData['redirect'] = 'index.php';
						$returnData['msg'] = '<span class="bg-green">Redirecting Please Wait...</span>';
						
						mysql_query('
							UPDATE users SET
							lastLoggedIn = "'.date('Y-m-d H:i:s').'", 
							lastLoginIP	 = "'.$_SERVER['REMOTE_ADDR'].'" 
							WHERE userID = '.$_SESSION['user']['userID'].'
						');
					}else {
						$returnData['msg'] = json_encode($saveLog['msg']);
					}
				}else {
					$returnData['msg'] = '<span class="bg-red">Invalid Password.</span>';
				}
				
			}else {
				$returnData['msg'] = '<span class="bg-red">Invalid User Email.</span>';
			}
		}
	}else if($action == 'resetPassword'){
		$email = trim($_POST['email']);
		
		if($email == ''){
			$returnData['msg'] = '<span class="bg-red">Please Enter Email.</span>';
		}else if(!isEmail($email)){
			$returnData['msg'] = '<span class="bg-red">Please Enter a Valid Email.</span>';
		}else {
			$sql = '
				SELECT * FROM users 
				WHERE email = "'.mysql_real_escape_string($email).'" 
			';
			
			$res = mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				$row = mysql_fetch_object($res);
				
				$link = $domain."/user/reset-password.php?id=".encrypt($row->userID.'|'.date('hY'));
				$message = "
					<div style='width:450px'>
					Dear ".$row->fullname.",<br /><br />
					We have received a request to change your password.<br />
					<a href='".$link."' target='_blank'>Click here to change your password »</a><br /><br />
	
					If your email program does not support html, please copy and paste the link below into your browser. The link will take you to back on webpage allowing you to change your password.<br /><br />
					".$link." <br /><br />
	
					If you have questions, please don't hesitate to give us a call. We're here to help
					</div>
				";
				
				sendEmail("noreply@lebanesemall.com", $row->email, "Password Recovery Email", $message);
				
				$returnData['msg'] = '<div class="bg-green">Password reset email sent to your email address.</div>';
				$returnData['field']['email'] = '';
				
			}else {
				$returnData['msg'] = '<span class="bg-red">Invalid User Email.</span>';
			}
		}
	}else if($action == 'updatePassword'){
		$id			= trim($_POST['id']);
		$password	= trim($_POST['password']);
		$cpassword	= trim($_POST['cpassword']);
		
		$idArr = explode('|', decrypt($id));
		$userID = (int) $idArr[0];
		
		$returnData['debug'] = $idArr;
		
		if($id = ''){
			$returnData['msg'] = '<span class="bg-red">Requested Data not Found.</span>';
		}else if($password == ''){
			$returnData['msg'] = '<span class="bg-red">Please Enter Password.</span>';
		}else if(strlen($password) <= 6){
			$returnData['msg'] = '<span class="bg-red">Password Length should be greater than 6 char.</span>';
		}else if($cpassword == ''){
			$returnData['msg'] = '<span class="bg-red">Please Enter Confirm Password.</span>';
		}else if($password != $cpassword){
			$returnData['msg'] = '<span class="bg-red">Password and Confirm Password not matching.</span>';
		}else {
			if(date('hY') == $idArr[1] || ((date('h')+1).date('Y')) == $idArr[1]){
				$sql = '
					SELECT * FROM users 
					WHERE userID = '.$userID.' 
				';
				
				$res = mysql_query($sql);
				
				if(mysql_num_rows($res) > 0){
					$row = mysql_fetch_object($res);
					
					$updateSql = 'UPDATE users SET password = "'.encrypt($password).'", log = CONCAT(log, "<pre>'.date('d-m-Y H:i:s').': Password Reseted by User.</pre>") WHERE userID = '.$userID;
					
					if(mysql_query($updateSql)){
						$returnData['msg'] = '<div class="bg-green">Password reseted Successfully. Redirecting...</div>';
						
						$returnData['field']['password']	= '';
						$returnData['field']['cpassword']	= '';
						
						$returnData['redirect'] = 'login.php';
					}else {
						$returnData['msg'] = '<span class="bg-red">Unable to Update New Password, Please Try again.</span>';
					}
				}else {
					$returnData['msg'] = '<span class="bg-red">You are not Registered with us, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Reset Link Expired, Pls try Again.</span>';
			}
		}
	}else if($action == 'logout'){
		session_destroy();
		$returnData['redirect'] = '../';
	}else if($action == 'logoutFromSite'){
		session_destroy();
		$returnData['reload'] = 'true';
	}else {
		$returnData['msg'] = '<span class="bg-red">No Request Found.</span>';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>