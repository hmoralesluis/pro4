<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$returnData['post'] = $_POST;
	
	$action	= $_POST['a'];
	
	if(1 == 1 || isset($_SESSION['userID']) && $_SESSION['userID'] > 0){
		if($action == 'sendRealEstateQuery'){
			$refNo		= trim($_POST['refNo']);
			$eqName		= trim($_POST['eqName']);
			$eqEmail	= trim($_POST['eqEmail']);
			$eqMessage	= trim($_POST['eqMessage']);
			$eCaptcha	= trim($_POST['g-recaptcha-response']);
			
			$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Lf8gxsTAAAAAFnEnyDlk1oUnkk8D0hUcmnSEnUs&response='.$eCaptcha);
			$responseData = json_decode($verifyResponse);
			
			if($eqName == '' || $eqEmail == '' || $eqMessage == '' || $captcha == ''){
				$returnData['msg'] = 'Please Enter Mandatory Details.';
			}else if(!isEmail($eqEmail)){
				$returnData['msg'] = 'Entered Email is not.';
			}else if(!$responseData->success){
				$returnData['msg'] = 'Invalid Captcha Code, Please Enter right code.';
			}else if($responseData->success){
				
				$from	= $eqEmail;
				$to		= $settings[1];
				$sub	= 'Enquiry From Lebanesemall for Property '.$refNo;
				$eMsg = 'You received this enquiry from www.'.$domain.'';
				$eMsg .= '<table width="500" border="0" cellspacing="1" cellpadding="5">';
				$eMsg .= '<tr>';
				$eMsg .= '<td width="120">Name</td>';
				$eMsg .= '<td width="10">:</td>';
				$eMsg .= '<td>'.$eqName.' (User ID: '.$_SESSION['userID'].')</td>';
				$eMsg .= '</tr>';
				$eMsg .= '<tr>';
				$eMsg .= '<td width="120">Email</td>';
				$eMsg .= '<td width="10">:</td>';
				$eMsg .= '<td>'.$eqEmail.'</td>';
				$eMsg .= '</tr>';
				$eMsg .= '<tr>';
				$eMsg .= '<td width="120">Message</td>';
				$eMsg .= '<td width="10">&nbsp;</td>';
				$eMsg .= '<td>'.$eqMessage.'</td>';
				$eMsg .= '</tr>';
				$eMsg .= '<tr>';
				$eMsg .= '<td width="120">IP</td>';
				$eMsg .= '<td width="10">&nbsp;</td>';
				$eMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
				$eMsg .= '</tr>';
				$eMsg .= '</table>';
				
				if(sendEmail($from, $to, $sub, $eMsg)){
					$returnData['status'] = 0;
					$returnData['msg'] = 'Thank you for your enquiry, we will get back to you soon.';
					
					$curlRet = curlPost($settings[7], array('a' => 'getInfoEmail'));
					$jsonData = json_decode($curlRet['json']);
					
					if(isset($jsonData->email) && $jsonData->email != ''){
						sendEmail($from, $jsonData->email, $sub, $eMsg);
					}
				}else {
					$returnData['msg'] = 'Error on Sending Email, Please Contact Support.';
				}
			}
		}else if($action == 'likeRealty'){
			$pID = (int) $_POST['id'];
			
			$pRes = mysql_query('SELECT * FROM realestate WHERE pID = '.$pID);
			if(mysql_num_rows($pRes) > 0){
				$pRow = mysql_fetch_object($pRes);
				
				$updateSql = 'UPDATE realestate SET likes = (likes + 1) WHERE pID = '.$pID;
				if(mysql_query($updateSql)){
					$returnData['html']['likesCount'] = $pRow->likes + 1;
				}else {
					$returnData['msg'] = 'Error on Updating Like, Please Contact Support.';
				}
			}else {
				$returnData['msg'] = 'Invalid Property or Property not Found.';
			}
		}else if($action == 'sendListingEnquiry'){
			$listingID	= (int) decrypt($_POST['id']);
			$eName		= trim($_POST['eName']);
			$eEmail		= trim($_POST['eEmail']);
			$eMessage	= trim($_POST['eMessage']);
			
			if((trim($_POST['captcha']) != $_SESSION['vercode'])){
				$returnData['msg'] = 'Invalid Captcha Code';
			}else if($listingID == '' || $listingID == 0){
				$returnData['msg'] = 'Required Detail not Found.';
			}else if($eName == ''){
				$returnData['msg'] = 'Please Enter Name.';
			}else if($eEmail == ''){
				$returnData['msg'] = 'Please Enter Email.';
			}else if(!isEmail($eEmail)){
				$returnData['msg'] = 'Entered Email is not a Valid Email Format.';
			}else if($eMessage == ''){
				$returnData['msg'] = 'Please Enter Message.';
			}else {
				
				$listingSql = '
					SELECT bl.* 
					FROM businesslistings AS bl 
					WHERE bl.status = "A" 
					AND bl.expiryOn >= "'.date('Y-m-d').'" 
					AND bl.listingID = '.$listingID.' 
				';
				$listingRes = mysql_query($listingSql);
				
				if(mysql_num_rows($listingRes) > 0){
					$listingRow		= mysql_fetch_object($listingRes);
					$businessName	= stripslashes($listingRow->businessName);
					$businessEmail	= stripslashes($listingRow->businessEmail);
					$listingUrl = '<a href="http://www.'.$domain.'/listing/'.stripslashes($listingRow->seoUrl).'.html" title="Click to View '.$businessName.'">'.$businessName.'</a>';
					
					$from	= $eEmail;
					$subject = 'Enquiry for "'.$businessName.'" from '.$domain.'';
					$eMsg = 'You received this enquiry from www.'.$domain.'';
					$eMsg .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">';
					$eMsg .= '<tr>';
					$eMsg .= '<th width="100" align="left" scope="row">Enquiry For</th>';
					$eMsg .= '<td width="10" align="center">:</td>';
					$eMsg .= '<td>'.$listingUrl.'</td>';
					$eMsg .= '</tr>';
					$eMsg .= '<tr>';
					$eMsg .= '<th width="100" align="left" scope="row">Name</th>';
					$eMsg .= '<td width="10" align="center">:</td>';
					$eMsg .= '<td>'.$eName.'</td>';
					$eMsg .= '</tr>';
					$eMsg .= '<tr>';
					$eMsg .= '<th width="100" align="left" scope="row">Email</th>';
					$eMsg .= '<td width="10" align="center">:</td>';
					$eMsg .= '<td>'.$eEmail.'</td>';
					$eMsg .= '</tr>';
					$eMsg .= '<tr>';
					$eMsg .= '<th width="100" align="left" scope="row">Message</th>';
					$eMsg .= '<td width="10" align="center">:</td>';
					$eMsg .= '<td>'.$eMessage.'</td>';
					$eMsg .= '</tr>';
					$eMsg .= '<tr>';
					$eMsg .= '<th width="100" align="left" scope="row">IP Address</th>';
					$eMsg .= '<td width="10" align="center">:</td>';
					$eMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
					$eMsg .= '</tr>';
					$eMsg .= '</table>';

					
					if(sendEmail($from, $settings[1], $subject, $eMsg)){
						$returnData['status'] = 0;
						
						$_POST['captcha'] = getRandomString(5);
						
						$returnData['msg'] = 'Your Enquiry Sent Successfully, we will get back to you soon.';
						
						if($businessEmail != ''){
							sendEmail($from, $businessEmail, $subject, $eMsg);
						}
						
						//sendEmail($from, 'rkaartikeyan@gmail.com', $subject, $eMsg);
					}else {
						$returnData['msg'] = 'Error on Sending Enquiry, Please Contact Support.';
					}
					
				}else {
					$returnData['msg'] = 'Invalid Access of the page, Please Contact Support.';
				}
			}
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}else {
		$returnData['msg'] = 'Please Login to Send Enquiry.'.json_encode($_SESSION);
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>