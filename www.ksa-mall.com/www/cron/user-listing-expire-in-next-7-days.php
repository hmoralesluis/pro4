<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	require_once('../phpmailer/class.phpmailer.php');
	
	$emailMsg = '';
	
	$uRes = mysql_query('SELECT * FROM users WHERE status = "A"');
	
	if($uRes && mysql_num_rows($uRes) > 0){
		while($uRow = mysql_fetch_object($uRes)){
			$sql = '
				SELECT businessName, location, address, telephone, mobile, seoUrl, expiryOn 
				FROM `businesslistings` 
				WHERE userID = '.$uRow->userID.' AND status = "A" 
				AND expiryOn BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) 
				ORDER BY expiryOn ASC
			';
			$res = mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				$emailMsg .= '<h3>Listings Expire in Next 6 Days</h3><br />';
				$expiryOn = '';
				
				$count = 1;
				
				$emailMsg .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">';
				$emailMsg .= '<tr>';
				$emailMsg .= '<td width="50">S No</td>';
				$emailMsg .= '<td>Business Name</td>';
				$emailMsg .= '<td width="300">Contact</td>';
				$emailMsg .= '</tr>';
				while($row = mysql_fetch_object($res)){
					if($expiryOn == ''){
						$expiryOn = date('Y-m-d', strtotime($row->expiryOn));
						
						$emailMsg .= '<tr>';
						$emailMsg .= '<td colspan="3">'.date('d-m-Y', strtotime($row->expiryOn)).'</td>';
						$emailMsg .= '</tr>';
					}else if(date('Y-m-d', strtotime($expiryOn)) != date('Y-m-d', strtotime($row->expiryOn))){
						$expiryOn = date('Y-m-d', strtotime($row->expiryOn));
						
						$emailMsg .= '<tr>';
						$emailMsg .= '<td colspan="3">'.date('d-m-Y', strtotime($row->expiryOn)).'</td>';
						$emailMsg .= '</tr>';
					}
					
					$link = 'http://'.$domain.'/listing/'.stripslashes($row->seoUrl).'.html';
					
					$emailMsg .= '<tr>';
					$emailMsg .= '<td width="100">'.$count.'</td>';
					$emailMsg .= '<td>'.stripslashes($row->businessName).' - <a href="'.$link.'" target="_blank">'.$link.'</a></td>';
					$emailMsg .= '<td width="400">';
					
					$emailMsg .= stripslashes($row->location).'<br />';
					$emailMsg .= stripslashes($row->address).'<br />';
					$emailMsg .= stripslashes($row->telephone).'<br />';
					$emailMsg .= stripslashes($row->mobile).'<br />';
					
					$emailMsg .= '</td>';
					$emailMsg .= '</tr>';
					
					$count++;
				}
				
				$emailMsg .= '</table>';
			}
			
			$sql = '
				SELECT businessName, location, address, telephone, mobile, seoUrl, expiryOn 
				FROM `businesslistings` 
				WHERE userID = '.$uRow->userID.' AND status = "A" 
				AND expiryOn < CURDATE() 
				ORDER BY expiryOn ASC 
			';
			$res = mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				
				$emailMsg .= '<br /><br /><h3>Listings Already Expired</h3><br />';
				$expiryOn = '';
				
				$count = 1;
				
				$emailMsg .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">';
				$emailMsg .= '<tr>';
				$emailMsg .= '<td width="50">S No</td>';
				$emailMsg .= '<td>Business Name</td>';
				$emailMsg .= '<td width="300">Contact</td>';
				$emailMsg .= '</tr>';
				while($row = mysql_fetch_object($res)){
					if($expiryOn == ''){
						$expiryOn = date('Y-m-d', strtotime($row->expiryOn));
						
						$emailMsg .= '<tr>';
						$emailMsg .= '<td colspan="3">'.date('d-m-Y', strtotime($row->expiryOn)).'</td>';
						$emailMsg .= '</tr>';
						
					}else if(date('Y-m-d', strtotime($expiryOn)) != date('Y-m-d', strtotime($row->expiryOn))){
						$expiryOn = date('Y-m-d', strtotime($row->expiryOn));
						
						$emailMsg .= '<tr>';
						$emailMsg .= '<td colspan="3">'.date('d-m-Y', strtotime($row->expiryOn)).'</td>';
						$emailMsg .= '</tr>';
						
					}
					
					$link = 'http://'.$domain.'/listing/'.stripslashes($row->seoUrl).'.html';
					
					$emailMsg .= '<tr>';
					$emailMsg .= '<td width="100">'.$count.'</td>';
					$emailMsg .= '<td>'.stripslashes($row->businessName).' - <a href="'.$link.'" target="_blank">'.$link.'</a></td>';
					$emailMsg .= '<td width="400">';
					
					$emailMsg .= stripslashes($row->location).'<br />';
					$emailMsg .= stripslashes($row->address).'<br />';
					$emailMsg .= stripslashes($row->telephone).'<br />';
					$emailMsg .= stripslashes($row->mobile).'<br />';
					
					$emailMsg .= '</td>';
					$emailMsg .= '</tr>';
					
					$count++;
				}
				
				$emailMsg .= '</table>';
			}
			
			//echo $emailMsg;
			
			if($emailMsg != ''){
				$smtpHost		= $settings[24];
				$smtpPort		= $settings[25];
				$smtpUser		= $settings[20];
				$smtpPass		= $settings[21];
				$smtpFromName	= 'Info';
				
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
					
					$mail->SetFrom('no-reply@'.$domain, $smtpFromName);
					$mail->Subject	= 'Your Listings on '.$domain.' is about to expire';
					$mail->MsgHTML($emailMsg);
					
					$mail->AddAddress(stripslashes($uaRow->email), stripslashes($uaRow->fullName));
					//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
					
					if(!$mail->Send()) {
						#echo '<span class="error">Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
					} else {
						#echo 'Email Sent Successfully';
					}
					#Send Email to Info End
				}else {
					#Send Email to Info Start
					$mail = new PHPMailer();
					$mail->CharSet = "UTF-8";
					$mail->SetFrom('no-reply@'.$domain, $smtpFromName);
					$mail->Subject	= 'Your Listings on '.$domain.' is about to expire';
					$mail->MsgHTML($emailMsg);
					
					$mail->AddAddress(stripslashes($uaRow->email), stripslashes($uaRow->fullName));
					//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
					
					if(!$mail->Send()) {
						#echo '<span class="error">Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
					} else {
						#echo 'Email Sent Successfully';
					}
					#Send Email to Info End
				}
				#Email End
			}
		}
	}
?>