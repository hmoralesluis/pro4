<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/post-validate-user.php');
	
	$formPostUrl = 'my-business-listings-post.php';
	
	$userID		= $_SESSION['user']['userID'];
	$email		= $_SESSION['user']['email'];
	$name		= $_SESSION['user']['name'];
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if(!$isUserLogged){
		$returnData['msg'] = 'Please Login to Access this Page.';
	}else {
		if($action == 'sendEnquiry'){
			
			$telephone	= trim($_POST['telephone']);
			$eMessage	= trim($_POST['eMessage']);
			$eCaptcha	= trim($_POST['g-recaptcha-response']);
			
			if($telephone == ''){
				$returnData['err']['telephone'] = '<span class="bg-red tip">Please Enter Telephone.</span>';
			}
			if($eMessage == ''){
				$returnData['err']['eMessage'] = '<span class="bg-red tip">Please Enter Your Message.</span>';
			}
			if($eCaptcha == ''){
				$returnData['err']['grc_div'] = '<span class="bg-red tip">Please Validate that you are a Human.</span>';
			}
			
			if(!isset($returnData['err'])){
				#Send Enquiry Start
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Lf8gxsTAAAAAFnEnyDlk1oUnkk8D0hUcmnSEnUs&response='.$eCaptcha);
				$responseData = json_decode($verifyResponse);
				
				if($responseData->success){
					$returnData['status'] = 0;
					
					require_once('../phpmailer/class.phpmailer.php');
					
					$emailMsg = '<table width="100%" cellpadding="5" cellspacing="0" border="1">';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Enquired On</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.date('d-m-Y H:i:s').'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Full Name</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.$name.'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Email</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.$email.'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Contact No.</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.$telephone.'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Message</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.$eMessage.'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '<tr>';
					$emailMsg .= '<th scope="row" width="120">Request IP</th>';
					$emailMsg .= '<td width="5" align="center">:</td>';
					$emailMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
					$emailMsg .= '</tr>';
					$emailMsg .= '</table>';
					
					$smtpHost		= $settings[24];
					$smtpPort		= $settings[25];
					$smtpUser		= $settings[20];
					$smtpPass		= $settings[21];
					$smtpFromName	= 'No Reply';
					
					if($smtpHost != '' && $smtpPort != '' && $smtpUser != '' && $smtpPass != ''){
						$mail = new PHPMailer();
						$mail->CharSet = "UTF-8";
						
						$mail->IsSMTP();
						$mail->Host		= $smtpHost;
						//$mail->SMTPDebug= 2;
						$mail->SMTPAuth	= true;
						$mail->Host		= $smtpHost;
						$mail->Port		= $smtpPort;
						$mail->Username	= $smtpUser;
						$mail->Password	= $smtpPass;
						
						$mail->SetFrom($email, $name);
						$mail->Subject = 'Enquiry From '.$domainOnly.' User';
						$mail->MsgHTML($emailMsg);
						
						$mail->AddAddress($settings[1], 'Info');
						#$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
						
						if(!$mail->Send()) {
							//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
							$isNotifyEmailSent == 'Y';
						} else {
							$returnData['msg'] = '<span class="bg-green">Your Enquiry Sent Successfully.</span>';
						}
					}else {
						#Send Email to Info Start
						$mail = new PHPMailer();
						$mail->CharSet = "UTF-8";
						$mail->SetFrom($email, $smtpFromName);
						$mail->Subject	= 'Enquiry From '.$domainOnly.' User';
						$mail->MsgHTML($emailMsg);
						
						$mail->AddAddress($settings[1], 'Info');
						#$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
						
						if(!$mail->Send()){
							//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
							$isNotifyEmailSent == 'Y';
						}else{
							$returnData['msg'] = '<span class="bg-green">Your Enquiry Sent Successfully.</span>';
						}
					}
					
				}else {
					$returnData['msg'] = '<span class="bg-red">Robot verification failed, please try again.</span>';
				}
				#Send Enquiry End
			}else {
				$returnData['msg'] = '<span class="bg-red">Error on Form, Please Fix.</span>';
			}
			
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>