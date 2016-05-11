<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$emailMsg = '';
	
	$sql = '
		SELECT bannerID, bTitle, imgPath, expiry 
		FROM `add_banners` 
		WHERE status = "A" 
		AND expiry BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 30 DAY) 
		ORDER BY expiry ASC 
	';
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0){
		require_once('../phpmailer/class.phpmailer.php');
		
		$emailMsg .= '<h3>Banners Expire in Next 30 Days</h3><br />';
		$expiry = '';
		
		$count = 1;
		while($row = mysql_fetch_object($res)){
			if($expiry == ''){
				$expiry = date('Y-m-d', strtotime($row->expiry));
				$emailMsg .= date('d-m-Y', strtotime($row->expiry)).':<br />';
			}else if(date('Y-m-d', strtotime($expiry)) != date('Y-m-d', strtotime($row->expiry))){
				$expiry = date('Y-m-d', strtotime($row->expiry));
				$emailMsg .= '<br /><br />'.date('d-m-Y', strtotime($row->expiry)).':<br />';
			}
			
			$imgPath = stripslashes($row->imgPath);
			if(strpos($imgPath, "http") === false){
				$imgPath	= 'http://'.$domain.'/'.$imgPath;
			}
			
			$emailMsg .= $count.'- '.stripslashes($row->bTitle).' (ID: '.$row->bannerID.') - <a href="'.$imgPath.'" target="_blank">'.$imgPath.'</a><br />';
			
			$count++;
		}
	}
	
	$sql = '
		SELECT bannerID, bTitle, imgPath, expiry 
		FROM `add_banners` 
		WHERE status = "A" 
		AND expiry < CURDATE() 
		ORDER BY expiry ASC 
	';
	$res = mysql_query($sql);
	
	if(mysql_num_rows($res) > 0){
		require_once('../phpmailer/class.phpmailer.php');
		
		$emailMsg .= '<br /><br /><h3>Banners Alredy Expired</h3><br />';
		$expiry = '';
		
		$count = 1;
		while($row = mysql_fetch_object($res)){
			if($expiry == ''){
				$expiry = date('Y-m-d', strtotime($row->expiry));
				$emailMsg .= date('d-m-Y', strtotime($row->expiry)).':<br />';
			}else if(date('Y-m-d', strtotime($expiry)) != date('Y-m-d', strtotime($row->expiry))){
				$expiry = date('Y-m-d', strtotime($row->expiry));
				$emailMsg .= '<br /><br />'.date('d-m-Y', strtotime($row->expiry)).':<br />';
			}
			
			$imgPath = stripslashes($row->imgPath);
			if(strpos($imgPath, "http") === false){
				$imgPath	= 'http://'.$domain.'/'.$imgPath;
			}
			
			$emailMsg .= $count.'- '.stripslashes($row->bTitle).' (ID: '.$row->bannerID.') - <a href="'.$imgPath.'" target="_blank">'.$imgPath.'</a><br />';
			
			$count++;
		}
	}
	
	//echo $emailMsg;
	
	if($emailMsg != ''){
		$smtpHost		= $settings[24];
		$smtpPort		= $settings[25];
		$smtpUser		= $settings[20];
		$smtpPass		= $settings[21];
		$smtpFromName	= 'Cron Lebanesemall';
		
		if($smtpHost != '' && $smtpPort != '' && $smtpUser != '' && $smtpPass != ''){
			#Send Email to Info Start
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";
			
			$mail->IsSMTP();				// telling the class to use SMTP
			$mail->Host		= $smtpHost;	// SMTP server
			//$mail->SMTPDebug= 2;			// enables SMTP debug information (for testing)
											// 1 = errors and messages 2 = messages only
			$mail->SMTPAuth	= true;			// enable SMTP authentication
			$mail->Host		= $smtpHost;	// sets the SMTP server
			$mail->Port		= $smtpPort;	// set the SMTP port for the GMAIL server
			$mail->Username	= $smtpUser;	// SMTP account username
			$mail->Password	= $smtpPass;	// SMTP account password
			
			$mail->SetFrom('cron@'.$domain, $smtpFromName);
			$mail->Subject	= 'Banners Expire in Next 30 Days';
			$mail->MsgHTML($emailMsg);
			
			$mail->AddAddress($settings[1], 'info');
			//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
			
			if(!$mail->Send()) {
				echo '<span class="error">Banners Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
			} else {
				echo 'Email Sent Successfully';
			}
			#Send Email to Info End
		}else {
			#Send Email to Info Start
			$mail = new PHPMailer();
			$mail->CharSet = "UTF-8";
			$mail->SetFrom('cron@'.$domain, $smtpFromName);
			$mail->Subject	= 'Banners Expire in Next 30 Days';
			$mail->MsgHTML($emailMsg);
			
			$mail->AddAddress($settings[1], 'info');
			//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
			
			if(!$mail->Send()) {
				echo '<span class="error">Banners Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
			} else {
				echo 'Email Sent Successfully';
			}
			#Send Email to Info End
		}
		#Email End
	}
?>