<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-users-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addUser'){
		       
		$email		= trim($_POST['aemail']);
		$password	= trim($_POST['apassword']);
		$fullname	= trim($_POST['afullname']);
		$address	= trim($_POST['aaddress']);
		$countryName= trim($_POST['acountryName']);
		$telephone	= trim($_POST['atelephone']);
		$mobile		= trim($_POST['amobile']);
		$aboutme	= trim($_POST['aaboutme']);
		
		if($email == ''){
			$returnData['err']['aemail'] = '<span class="bg-red tip">Please Enter Email.</span>';
		}
		if(validateRecord('users', array('email' => $email))){
			$returnData['err']['aemail'] = '<span class="bg-red tip">Entered Email Already Exists.</span>';
		}
		if($password == ''){
			$returnData['err']['apassword'] = '<span class="bg-red tip">Please Enter Password.</span>';
		}
		if($fullname == ''){
			$returnData['err']['afullname'] = '<span class="bg-red tip">Please Enter Full Name.</span>';
		}
		if($address == ''){
			$returnData['err']['aaddress'] = '<span class="bg-red tip">Please Enter Address.</span>';
		}
		if($countryName == ''){
			$returnData['err']['acountryName'] = '<span class="bg-red tip">Please Select a Country.</span>';
		}
		
		if(!isset($returnData['err'])){
			
			$insertSql = '
				INSERT INTO users SET 
				email		= "'.mysql_real_escape_string($email).'", 
				password	= "'.mysql_real_escape_string(encrypt($password)).'", 
				fullname	= "'.mysql_real_escape_string($fullname).'", 
				address		= "'.mysql_real_escape_string($address).'", 
				countryName	= "'.mysql_real_escape_string($countryName).'", 
			';
			
			if($telephone != ''){$insertSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$insertSql .= 'telephone = NULL, ';}
			if($mobile != ''){$insertSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$insertSql .= 'mobile = NULL, ';}
			if($aboutme != ''){$insertSql .= 'aboutme = "'.mysql_real_escape_string($aboutme).'", ';}else{$insertSql .= 'aboutme = NULL, ';}
			
			$insertSql .= '
				status		= "A", 
				createdOn	= "'.date('Y-m-d H:i:s').'", 
				registeredIP= "'.$_SERVER['REMOTE_ADDR'].'", 
				log			= "<pre>User Created From Admin</pre>"
			';
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){	
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">User Added Successfully.</span>';
				
				$tr = '<tr class="userRow" id="userRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_fN_'.$insertedID.'">'.$email.'<br /><strong>'.$fullname.'</strong></td>';
                $tr .= '<td id="td_pW_'.$insertedID.'">'.$password.'</td>';
                $tr .= '<td id="td_uC_'.$insertedID.'">'.$countryName.'</td>';
                $tr .= '<td id="td_TM_'.$insertedID.'">';
				if($telephone != '' && $mobile != ''){
					$tr .= $telephone.'/ '.$mobile;
				}else if($telephone != ''){
					$tr .= $telephone;
				}else if($mobile != ''){
					$tr .= $mobile;
				}
				$tr .= '</td>';
                $tr .= '<td id="td_uS_'.$insertedID.'">'.$statusArr['A'].'</td>';
				$tr .= '<td width="120">'.$_SERVER['REMOTE_ADDR'].'<br />'.date('d-m-Y H:i').'</td>';
				$tr .= '<td width="120">&nbsp;</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getUser" data-u="'.$formPostUrl.'" data-w="editUserWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delUser" data-u="'.$formPostUrl.'" data-at="User" data-numbering="userRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '<td>';
                $tr .= '<label>';
                $tr .= '<input type="checkbox" class="check" name="users[]" value="'.$insertedID.'" />';
                $tr .= '</label>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
				$returnData['icheck'] = 'yes';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fix it.</span>';
		}
		
	}else if($action == 'getUser'){
		$userID = (int) $_POST['id'];
		
		$userRes = mysql_query('SELECT * FROM users WHERE userID = '.$userID);
		
		if(mysql_num_rows($userRes) > 0){
			$cRow = mysql_fetch_object($userRes);
			
			$returnData['status'] = 0;
			
			$returnData['field']['userID']	= $cRow->userID;
			
			$returnData['field']['eemail']		= stripslashes($cRow->email);
			$returnData['field']['epassword']	= decrypt(stripslashes($cRow->password));
			$returnData['field']['efullname']	= stripslashes($cRow->fullname);
			$returnData['field']['eaddress']	= stripslashes($cRow->address);
			
			$returnData['field']['ecountryName']= stripslashes($cRow->countryName);
			$returnData['field']['etelephone']	= stripslashes($cRow->telephone);
			$returnData['field']['emobile']		= stripslashes($cRow->mobile);
			$returnData['field']['eaboutme']	= stripslashes($cRow->aboutme);
			
			$returnData['field']['estatus']		= stripslashes($cRow->status);
			
		}else {
			$returnData['msg'] = 'Requested Record is not Found, the record may Deleted, please contact support.';
		}
		
	}else if($action == 'saveUser'){
		$userID		= (int) $_POST['userID'];
		
		$userRes = mysql_query('SELECT * FROM users WHERE userID = '.$userID);
		
		if(mysql_num_rows($userRes) > 0){
			$cRow = mysql_fetch_object($userRes);
			
			$email		= trim($_POST['eemail']);
			$password	= trim($_POST['epassword']);
			$fullname	= trim($_POST['efullname']);
			$address	= trim($_POST['eaddress']);
			$countryName= trim($_POST['ecountryName']);
			$telephone	= trim($_POST['etelephone']);
			$mobile		= trim($_POST['emobile']);
			$aboutme	= trim($_POST['eaboutme']);
			$status		= trim($_POST['estatus']);
			
			if($email == ''){
				$returnData['err']['eemail'] = '<span class="bg-red tip">Please Enter Email.</span>';
			}
			if($email != $cRow->email && validateRecord('users', array('email' => $email))){
				$returnData['err']['eemail'] = '<span class="bg-red tip">Entered Email Already Exists.</span>';
			}
			if($password == ''){
				$returnData['err']['epassword'] = '<span class="bg-red tip">Please Enter Password.</span>';
			}
			if($fullname == ''){
				$returnData['err']['efullname'] = '<span class="bg-red tip">Please Enter Full Name.</span>';
			}
			if($address == ''){
				$returnData['err']['eaddress'] = '<span class="bg-red tip">Please Enter Address.</span>';
			}
			if($countryName == ''){
				$returnData['err']['ecountryName'] = '<span class="bg-red tip">Please Select a Country.</span>';
			}
			
			if(!isset($returnData['err'])){
				
				$updateSql = '
					UPDATE users SET 
					email		= "'.mysql_real_escape_string($email).'", 
					password	= "'.mysql_real_escape_string(encrypt($password)).'", 
					fullname	= "'.mysql_real_escape_string($fullname).'", 
					address		= "'.mysql_real_escape_string($address).'", 
					countryName	= "'.mysql_real_escape_string($countryName).'", 
				';
				
				if($telephone != ''){$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$updateSql .= 'telephone = NULL, ';}
				if($mobile != ''){$updateSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$updateSql .= 'mobile = NULL, ';}
				if($aboutme != ''){$updateSql .= 'aboutme = "'.mysql_real_escape_string($aboutme).'", ';}else{$updateSql .= 'aboutme = NULL, ';}
				
				$updateSql .= '
					status = "'.mysql_real_escape_string($status).'" 
					WHERE userID = '.$userID.' 
				';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){	
					$insertedID = mysql_insert_id();
					
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">User Saved Successfully.</span>';
					
					$returnData['html']['td_fN_'.$userID]	= $email.'<br /><strong>'.$fullname.'</strong>';
					$returnData['html']['td_pW_'.$userID]	= $password;
					$returnData['html']['td_uC_'.$userID]	= $countryName;
					if($telephone != '' && $mobile != ''){
						$returnData['html']['td_TM_'.$userID] = $telephone.'/ '.$mobile;
					}else if($telephone != ''){
						$returnData['html']['td_TM_'.$userID] = $telephone;
					}else if($mobile != ''){
						$returnData['html']['td_TM_'.$userID] = $mobile;
					}
					$returnData['html']['td_uS_'.$userID]	= $statusArr[$status];
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fix it.</span>';
			}
		}else {
			$returnData['msg'] = 'Requested Record is not Found, the record may Deleted, please contact support.';
		}
	}else if($action == 'deleteSelectedUsers'){
		$users = $_POST['users'];
		$catID = (int) $_POST['catID'];
		
		$usersStr = implode(',', $users);
		$deletedUsersArr = array();
		
		$userRes = mysql_query('SELECT * FROM users WHERE userID IN ('.$usersStr.')');
		
		if(mysql_num_rows($userRes) > 0){
			$delSql = 'DELETE FROM users WHERE userID IN ('.$usersStr.')';
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				
				while($userRow = mysql_fetch_object($userRes)){
					$returnData['anim']['userRow_'.$userRow->userID] = 'remove';
				}
				
				$returnData['sMsg'] = '<span class="bg-green tip">Selected Users Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
			}
		}else {
			$returnData['msg'] = 'Selected Users not Found, or Deleted Already, Please Contact Support.';
		}
	}else if($action == 'delUser'){
		$userID = (int) $_POST['id'];
		
		$userRes = mysql_query('SELECT * FROM users WHERE userID = '.$userID);
		
		if(mysql_num_rows($userRes) > 0){
			
			$delSql = 'DELETE FROM users WHERE userID = '.$userID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">User Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Record, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Record may Deleted. Please Contact Support';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>