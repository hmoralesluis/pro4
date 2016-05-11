<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$returnData = array();
	$returnData['status'] = 1;
	
	//$returnData['post'] = $_POST;
	
	if((trim($_POST['captcha']) == $_SESSION['vercode'])){
		$msg	= $_POST['msgBox'];
		$sName	= preg_replace("/\r|\n/", "", $_POST['sender-name']);
		$sEmail	= preg_replace("/\r|\n/", "", $_POST['sender-email']);
		$rName	= preg_replace("/\r|\n/", "", $_POST['rec-name']);
		$rEmail	= preg_replace("/\r|\n/", "", $_POST['rec-email']);
		
		if($msg != '' && $sName != '' && $sEmail != '' && $rName != '' && $rEmail != ''){
			if(mysql_query('INSERT INTO ecards_view SET c_card = "'.mysql_real_escape_string($msg).'"')){
			
				$last_id = mysql_insert_id();

				$link = '<a href="http://www.aswakdubai.com/e-cards-view/card-' . $last_id . '.html">http://www.aswakdubai.com/e-cards-view/card-' . $last_id . '.html</a>';
				
				$emailMsg = "<p>Dear $rName,</p>";
				$emailMsg .= "<p>$sName has just sent you a greeting card  courtesy of <a href='http://aswakdubai.com'>aswakdubai.com</a>. You can view your card online and resend $rName a Free card from <a href='http://www.aswakdubai.com/e-cards/index.html'>aswakdubai.com</a></p>";
				$emailMsg .= $msg;
				$emailMsg .= "<p>To view your card online, click on the following link<br>";
				$emailMsg .= "$link</p>";
				$emailMsg .= "<p>If the link in the email does not work, try to copy the link and paste it into your browser to see the greeting card.<p>";
				$emailMsg .= "<p>Thank You</p>";
				
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= "From: $sEmail";
				
				// Notify me and the submitter by email
				$send = @mail($rEmail, "Greeting Card From $sName", $emailMsg, $headers);
				
				if($send) {
					$returnData['msg'] = '<span class="msg-bg green">Your card has been sent successfully.</span>';
					$returnData['msg'] .= '<a href="/e-cards/index.html">Click here to send another E-Card.</a>';
					
					$returnData['status'] = 0;
					
					$_POST['captcha'] = getRandomString(5);
				} else {
					$returnData['msg'] = '<span class="msg-bg red">Your card has not been sent.</span>';
				}
				
				$send = @mail("hala@ddilb.com", "Greeting Card From $sName", $emailMsg, $headers);
			}else {
				$returnData['msg'] = '<span class="msg-bg red">Unable to Insert Record, Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="msg-bg red">Required Data not Found, Contact Support.</span>';
		}
	}else {
		$returnData['msg'] = '<span class="msg-bg red">Invalid Captcha Code, Captcha Code is Case Sensitive.</span>';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>