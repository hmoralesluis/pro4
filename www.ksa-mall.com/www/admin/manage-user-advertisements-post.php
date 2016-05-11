<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-user-advertisements-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	//$returnData['post'] = $_POST;
	
	$action	= $_POST['a'];
	
	if($action == 'loadAdvertDetails'){
		$atID = (int) $_POST['id'];
		
		$advTypeRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		if(mysql_num_rows($advTypeRes) > 0){
			$returnData['status'] = 0;
			
			$advTypeRow = mysql_fetch_object($advTypeRes);
			
			$returnData['html']['aatDescription'] = '<div style="border:solid 2px #F4F4F4; padding:15px; margin-bottom:20px;">';
			$returnData['html']['aatDescription'] .= stripslashes($advTypeRow->atDescription);
			$returnData['html']['aatDescription'] .= '</div>';
			
			#Fields Manipulating Start
			$uaFields = '';
			if($advTypeRow->atType == 'RSI' || $advTypeRow->atType == 'FI' || $advTypeRow->atType == 'PII' || $advTypeRow->atType == 'HS'){
				$uaFields = '<label for="auaDetails">Select File ('.$advTypeRow->imgWidth.' x '.$advTypeRow->imgHeight.') *</label>';
				
				$uaFields .= '<input type="text" class="form-control" name="auaDetails" id="auaDetails" value="'.stripslashes($uaRow->uaDetails).'" style="display:inline-block; width:90%;" required="required" />'."\n";
				$uaFields .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="auaDetails" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>'."\n";
				$uaFields .= '<br />'."\n";
				
				$returnData['browseFile'] = true;
				
				$uaFields .= '<label for="auaTitle">Image Alt *</label>';
				$uaFields .= '<textarea class="form-control" name="auaTitle" id="auaTitle" required="required"></textarea>';
				
				$uaFields .= '<label for="auaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="auaLink" id="auaLink" value="" />';
			}else if($advTypeRow->atType == 'BL'){
				$uaFields = '<label for="auaDetails">Select a Business Listing *</label>';
			
				$uaFields .= '<select class="form-control" name="auaDetails" id="auaDetails" required="required">';
				$uaFields .= '<option value="">Select a Business Listing</option>';
				$blRes = mysql_query('SELECT * FROM businesslistings WHERE status = "A" ORDER BY businessName ASC');
				if($blRes && mysql_num_rows($blRes) > 0){
					while($blRow = mysql_fetch_object($blRes)){
						$uaFields .= '<option value="'.$blRow->listingID.'"'.$selected.'>'.stripslashes($blRow->businessName).'</option>';
					}
				}
				$uaFields .= '</select>';
			}else {
				$uaFields = '<label for="auaTitle">Title *</label>';
				$uaFields .= '<input type="text" class="form-control" name="auaTitle" id="auaTitle" value="" required="required" />';
				
				$uaFields .= '<label for="auaDetails">Short Description *</label>';
				$uaFields .= '<textarea class="form-control" name="auaDetails" id="auaDetails" required="required"></textarea>';
				
				$uaFields .= '<label for="auaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="auaLink" id="auaLink" value="" />';
			}
			
			$returnData['html']['auaFields'] = $uaFields;
			#Fields Manipulating End
			
		}else {
			$returnData['msg'] = '<span class="bg-red">Invalid Request, or Record not Found.</span>';
		}
	}else if($action == 'addAdvertisement'){
		$uaName		= trim($_POST['auaName']);
		$atID		= (int) $_POST['aatID'];
		$expiryOn	= trim($_POST['aexpiryOn']);
		$uaDetails	= trim($_POST['auaDetails']);
		
		if($uaName == ''){
			$returnData['err']['auaName'] = '<span class="bg-red tip">Please Enter Advertisement Name.</span>';
		}
		
		if($atID == ''){
			$returnData['err']['aatID'] = '<span class="bg-red tip">Please Enter Advertisement Type.</span>';
		}
		
		$atRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		
		if($atRes && mysql_num_rows($atRes) > 0){
			$atRow = mysql_fetch_object($atRes);
			
			$insertSql = '
				INSERT INTO user_advertisements SET 
				userID		= 0, 
				atID		= '.$atID.', 
				atType		= "'.mysql_real_escape_string(stripslashes($atRow->atType)).'", 
				atName		= "'.mysql_real_escape_string(stripslashes($atRow->atName)).'", 
				uaName		= "'.mysql_real_escape_string($uaName).'", 
				expiryOn	= "'.date('Y-m-d', strtotime($expiryOn)).'", 
				createdOn	= "'.date('Y-m-d H:i:s').'", 
				log			= "<pre>'.date('d-m-Y H:i:s').': Advertisement Added by Admin.</pre>", 
				status		= "A", 
			';
			
			$atType = $atRow->atType;
			if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
				$uaDetails	= str_replace('/images/advertisements/', '', $uaDetails);
				$uaTitle	= trim($_POST['auaTitle']);
				$uaLink		= trim($_POST['auaLink']);
				
				if($uaDetails == ''){
					$returnData['err']['auaDetails'] = '<span class="bg-red tip">Please Select a Image.</span>';
				}
				
				if($uaTitle == ''){
					$returnData['err']['auaTitle'] = '<span class="bg-red tip">Please Enter Alt Tag.</span>';
				}
				
				$insertSql .= '
					imgWidth	= '.$uaRow->imgWidth.', 
					imgHeight	= '.$uaRow->imgHeight.', 
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
					uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
					uaLink		= "'.mysql_real_escape_string($uaLink).'" 
				';
			}else if($atType == 'BL'){
				if($uaDetails == ''){
					$returnData['err']['auaDetails'] = '<span class="bg-red tip">Please Select a Business Listing.</span>';
				}
				
				$insertSql .= '
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'" 
				';
			}else {
				$uaTitle	= trim($_POST['auaTitle']);
				$uaLink		= trim($_POST['auaLink']);
				
				if($uaTitle == ''){
					$returnData['err']['auaTitle'] = '<span class="bg-red tip">Please Enter Title.</span>';
				}
				
				if($uaDetails == ''){
					$returnData['err']['auaDetails'] = '<span class="bg-red tip">Please Enter Advertisement Details.</span>';
				}
				
				$insertSql .= '
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
					uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
					uaLink		= "'.mysql_real_escape_string($uaLink).'" 
				';
			}
			
			if(!isset($returnData['err'])){
				
				if(mysql_query($insertSql)){
					$insertedID = mysql_insert_id();
					
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green">Advertisement Inserted Successfully.</span>';
					
					$advertDetails	= 'Position: <b>'.stripslashes($uaRow->atName).'</b><br />';
					$advertDetails	.= 'Name: '.stripslashes($uaName).'<br />';
					
					if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
						$imgPath = '../images/advertisements/'.$uaDetails;
						$imgTag = '<img src="'.$imgPath.'" alt="" />';
						
						$advertDetails	.= 'Image Size: <b>'.stripslashes($uaRow->imgWidth.' x '.$uaRow->imgHeight).'</b><br />';
						$advertDetails	.= 'Alt: '.stripslashes($uaTitle).'<br />';
						$advertDetails	.= 'Link: '.stripslashes($uaLink);
					}else if($atType == 'BL'){
						$businessName = getRecord('businesslistings', 'businessName', array('uaID' => (int) $uaDetails));
						$advertDetails	.= 'Listing Name: <b>'.$businessName.'</b>';
					}else {
						$advertDetails	.= 'Title: '.stripslashes($uaTitle).'<br />';
						$advertDetails	.= 'Desc: '.stripslashes($uaDetails).'<br />';
						$advertDetails	.= 'Link: '.stripslashes($uaLink);
					}
					
					$tr = '<tr class="advertisementRow" id="advertisementRow_'.$insertedID.'">';
					$tr .= '<td>&nbsp;</td>';
					$tr .= '<td id="td_uD_'.$insertedID.'" width="250">Admin</td>';
					
					if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
						$tr .= '<td id="td_aI_'.$insertedID.'" width="75"><img src="'.$imgPath.'" alt="" /></td>';
						$tr .= '<td id="td_aD_'.$insertedID.'" width="225">'.$advertDetails.'</td>';
					}else {
						$tr .= '<td id="td_aD_'.$insertedID.'" width="300" colspan="2">'.$advertDetails.'</td>';
					}
					
					$tr .= '<td width="150">';
					$tr .= '<div class="pull-left" style="width:70%">';
					$tr .= '<input type="text" class="form-control datePicker onblurUpdate" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-date-format="dd-mm-yyyy" value="'.date('d-m-Y', strtotime($expiryOn)).'" data-a="updateExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" style="text-align:center;" id="expiryInput_'.$insertedID.'" />';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:25%;" id="expiryDiv_'.$insertedID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td width="150">';
					$tr .= '<div class="pull-left" style="width:70%">';
					$tr .= '<select class="form-control updateSelect" id="uStatusSelect_'.$insertedID.'" data-url="'.$formPostUrl.'" data-a="updateStatus" data-wid="'.$insertedID.'" data-resultprefix="sTatus_">';
					
					foreach($advertStatusArr as $key => $val){
						if($key == 'A'){$selected=' selected="selected"';}else{$selected='';}
						$tr .= '<option value="'.$key.'"'.$selected.'>'.strip_tags($val).'</option>';
					}
					$tr .= '</select>';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:25%;" id="sTatus_'.$insertedID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getAdvertisement" data-u="'.$formPostUrl.'" data-w="editAdvertisementWindow">';
					$tr .= '<i class="glyphicon glyphicon-edit"></i>';
					$tr .= '</button>'."\n";
					$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delAdvertisement" data-u="'.$formPostUrl.'" data-at="Advertisement" data-numbering="advertisementRow" data-column="1" >';
					$tr .= '<i class="glyphicon glyphicon-trash"></i>';
					$tr .= '</button>';
					$tr .= '</td>';
					$tr .= '</tr>';
					
					$returnData['tbody'] = $tr;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Please Fill all Required Details.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red">Advertisement Type is not Found, Please Contact Support.</span>';
		}
	}else if($action == 'getAdvertisement'){
		$uaID = (int) $_POST['id'];
		
		$uaRes = mysql_query('SELECT * FROM user_advertisements WHERE uaID = '.$uaID);
		if($uaRes && mysql_num_rows($uaRes) > 0){
			$returnData['status'] = 0;
			
			$uaRow = mysql_fetch_object($uaRes);
			
			#Fields Manipulating Start
			$uaFields = '';
			if($uaRow->atType == 'RSI' || $uaRow->atType == 'FI' || $uaRow->atType == 'PII' || $uaRow->atType == 'HS'){
				$uaFields = '<label for="euaDetails">Select File ('.$uaRow->imgWidth.' x '.$uaRow->imgHeight.') *</label>';
				
				$uaFields .= '<input type="text" class="form-control" name="euaDetails" id="euaDetails" value="'.stripslashes($uaRow->uaDetails).'" style="display:inline-block; width:90%;" required="required" />'."\n";
				$uaFields .= '<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="euaDetails" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>'."\n";
				$uaFields .= '<br />'."\n";
				
				$returnData['browseFile'] = true;
				
				$uaFields .= '<label for="euaTitle">Image Alt *</label>';
				$uaFields .= '<textarea class="form-control" name="euaTitle" id="euaTitle" required="required">'.stripslashes($uaRow->uaTitle).'</textarea>';
				
				$uaFields .= '<label for="euaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="euaLink" id="euaLink" value="'.stripslashes($uaRow->uaLink).'" />';
			}else if($uaRow->atType == 'BL'){
				$uaFields = '<label for="euaDetails">Select a Business Listing *</label>';
			
				$uaFields .= '<select class="form-control" name="euaDetails" id="euaDetails" required="required">';
				
				$blRes = mysql_query('SELECT * FROM businesslistings WHERE status = "A" ORDER BY businessName ASC');
				if($blRes && mysql_num_rows($blRes) > 0){
					while($blRow = mysql_fetch_object($blRes)){
						if($uaRow->uaDetails == $blRow->uaID){$selected = ' selected="selected"';}else{$selected = '';}
						$uaFields .= '<option value="'.$blRow->uaID.'"'.$selected.'>'.stripslashes($blRow->businessName).'</option>';
					}
				}
				
				$uaFields .= '</select>';
			}else {
				$uaFields = '<label for="euaTitle">Title *</label>';
				$uaFields .= '<input type="text" class="form-control" name="euaTitle" id="euaTitle" value="'.stripslashes($uaRow->uaTitle).'" required="required" />';
				
				$uaFields .= '<label for="euaDetails">Short Description *</label>';
				$uaFields .= '<textarea class="form-control" name="euaDetails" id="euaDetails" required="required">'.stripslashes($uaRow->uaDetails).'</textarea>';
				
				$uaFields .= '<label for="euaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="euaLink" id="euaLink" value='.stripslashes($uaRow->uaLink).'"" />';
			}
			
			$returnData['html']['euaFields'] = $uaFields;
			#Fields Manipulating End
			$returnData['field']['uaID']	= stripslashes($uaRow->uaID);
			$returnData['field']['euaName'] = stripslashes($uaRow->uaName);
			$returnData['field']['eatName'] = stripslashes($uaRow->atName);
			
		}else {
			$returnData['msg'] = '<span class="bg-red">Invalid Request, or Record not Found.</span>';
		}
	}else if($action == 'saveAdvertisement'){
		$uaID = (int) $_REQUEST['uaID'];
		
		$uaRes = mysql_query('
			SELECT ua.* 
			FROM user_advertisements AS ua 
			WHERE ua.uaID = '.$uaID.' AND ua.isDeleted = "N" 
		');
		
		if(mysql_num_rows($uaRes) > 0){
			$uaRow = mysql_fetch_object($uaRes);
			
			$uaName		= trim($_POST['euaName']);
			$uaDetails	= trim($_POST['euaDetails']);
			
			if($uaName == ''){
				$returnData['err']['euaName'] = '<span class="bg-red tip">Please Enter Advertisement Name.</span>';
			}
			
			$updateSql = '
				UPDATE user_advertisements SET 
				uaName		= "'.mysql_real_escape_string($uaName).'", 
				updatedOn	= "'.date('Y-m-d H:i:s').'", 
				log			= CONCAT(log, "<pre>'.date('d-m-Y H:i:s').': Advertisement Updated by Admin.</pre>"), 
			';
			
			$atType = $uaRow->atType;
			if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
				$uaDetails	= str_replace('/images/advertisements/', '', $uaDetails);
				$uaTitle	= trim($_POST['euaTitle']);
				$uaLink		= trim($_POST['euaLink']);
				
				if($uaDetails == ''){
					$returnData['err']['euaDetails'] = '<span class="bg-red tip">Please Select a Image.</span>';
				}
				
				if($uaTitle == ''){
					$returnData['err']['euaTitle'] = '<span class="bg-red tip">Please Enter Alt Tag.</span>';
				}
				
				$updateSql .= '
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
					uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
					uaLink		= "'.mysql_real_escape_string($uaLink).'" 
				';
			}else if($atType == 'BL'){
				if($uaDetails == ''){
					$returnData['err']['euaDetails'] = '<span class="bg-red tip">Please Select a Business Listing.</span>';
				}
				
				$updateSql .= '
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'" 
				';
			}else {
				$uaTitle	= trim($_POST['euaTitle']);
				$uaLink		= trim($_POST['euaLink']);
				
				if($uaTitle == ''){
					$returnData['err']['euaTitle'] = '<span class="bg-red tip">Please Enter Title.</span>';
				}
				
				if($uaDetails == ''){
					$returnData['err']['euaDetails'] = '<span class="bg-red tip">Please Enter Advertisement Details.</span>';
				}
				
				$updateSql .= '
					uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
					uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
					uaLink		= "'.mysql_real_escape_string($uaLink).'" 
				';
			}
			
			if(!isset($returnData['err'])){
				$updateSql .= 'WHERE uaID = '.$uaID;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green">Advertisement Updated Successfully.</span>';
					
					
					$advertDetails	= 'Position: <b>'.stripslashes($uaRow->atName).'</b><br />';
					$advertDetails	.= 'Name: '.stripslashes($uaName).'<br />';
					
					if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
						$imgPath = '../images/advertisements/'.$uaDetails;
						$returnData['html']['td_aI_'.$uaID] = '<img src="'.$imgPath.'" alt="" />';
						
						
						$advertDetails	.= 'Image Size: <b>'.stripslashes($uaRow->imgWidth.' x '.$uaRow->imgHeight).'</b><br />';
						$advertDetails	.= 'Alt: '.stripslashes($uaTitle).'<br />';
						$advertDetails	.= 'Link: '.stripslashes($uaLink);
					}else if($atType == 'BL'){
						
						$businessName = getRecord('businesslistings', 'businessName', array('uaID' => (int) $uaDetails));
						$advertDetails	.= 'Listing Name: <b>'.$businessName.'</b>';
					}else {
						$advertDetails	.= 'Title: '.stripslashes($uaTitle).'<br />';
						$advertDetails	.= 'Desc: '.stripslashes($uaDetails).'<br />';
						$advertDetails	.= 'Link: '.stripslashes($uaLink);
					}
					
					$returnData['html']['td_aD_'.$uaID] = $advertDetails;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Please Fill all Required Details.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red">Requested Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'updateExpiry'){
		$uaID	= (int) $_POST['ids'];
		$expiryOn	= trim($_POST['val']);
		
		$uaRes = mysql_query('SELECT expiryOn FROM user_advertisements WHERE uaID = '.$uaID);
		
		if(mysql_num_rows($uaRes) > 0){
			$returnData['status'] = 0;
			
			$uaRow = mysql_fetch_object($uaRes);
			
			if(date('Y-m-d', strtotime($expiryOn)) == date('Y-m-d', strtotime($uaRow->expiryOn))){
				$html = '<button class="closeButton btn btn-success btn-xs" title="Same Expiry Date"><i class="fa fa-thumbs-up"></i></button>';
			}else {
				$updateSql = 'UPDATE user_advertisements SET expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'" WHERE uaID = '.$uaID;
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$html = '<button class="closeButton btn btn-success btn-xs" title="Updated Successfully"><i class="fa fa-thumbs-up"></i></button>';
				}else {
					$html = '<button class="closeButton btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
				}
			}
		}else {
			$html = '<button class="closeButton btn btn-danger btn-xs" title="Record Not Found"><i class="fa fa-thumbs-down"></i></button>';
		}
		
		$returnData['html']['expiryDiv_'.$uaID] = $html;
	}else if($action == 'updateStatus'){
		$uaID	= (int) $_POST['wid'];
		$status	= trim($_POST['val']);
		
		$uaRes = mysql_query('
			SELECT ua.*, u.email, u.fullName 
			FROM user_advertisements AS ua 
			LEFT JOIN users AS u ON u.userID = ua.userID 
			WHERE ua.uaID = '.$uaID.' 
		');
		
		if($uaRes && mysql_num_rows($uaRes) > 0){
			$uaRow = mysql_fetch_object($uaRes);
			
			if($uaID != '' && ($status == 'PE' || $status == 'PA' || $status == 'A' || $status == 'I')){
				$updateSql = '
					UPDATE user_advertisements SET 
					status = "'.mysql_real_escape_string($status).'" 
					WHERE uaID = '.$uaID.'
				';
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<button class="closeButton btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
					
					if($uaRow->userID > 0 && $uaRow->email != '' && $status == 'A'){
						#Send Email to User if Status is Active
						require_once('../phpmailer/class.phpmailer.php');
								
						#$adminLink = $domain.'/admin/manage-user-advertisements.php?sFilter=uaName&sKeywords='.#.'&sexpiryOn=&sStatus=&submitBtn=Filter+Result';
						$fullDomain = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['SERVER_NAME'];
						$emailMsg = '
							Dear username,<br />
							<br />
							Your <strong>'.$uaRow->uaName.' ['.$uaRow->atName.']</strong> Advert is now live.<br />
							<br />
							Please go to <a href="'.$fullDomain.'">'.$domain.'</a> to see your advert.<br />
							<br />
							If you have any questions, do not hesitate to contact us at any time.<br />
							<br />
							Have a great day<br />
							<br />
							Kind Regards<br />
							<a href="'.$fullDomain.'">'.$domain.'</a><br />
							<br />
							Support Team
						';
						
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
							
							$mail->SetFrom('no-reply@'.$domainOnly, $smtpFromName);
							$mail->Subject = 'Your Advert is Live on '.$fullDomain;
							$mail->MsgHTML($emailMsg);
							
							$mail->AddAddress(stripslashes($uaRow->email), stripslashes($uaRow->fullName));
							//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
							
							if(!$mail->Send()) {
								//echo '<span class="error">Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
							} else {
								//echo 'Email Sent Successfully';
							}
						}else {
							#Send Email to Info Start
							$mail = new PHPMailer();
							$mail->CharSet = "UTF-8";
							$mail->SetFrom('no-reply@'.$domainOnly, $smtpFromName);
							$mail->Subject	= 'Your Advert is Live on '.$fullDomain;
							$mail->MsgHTML($emailMsg);
							
							$mail->AddAddress(stripslashes($uaRow->email), stripslashes($uaRow->fullName));
							//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
							
							if(!$mail->Send()){
								//echo '<span class="error">Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
							}else{
								//echo 'Email Sent Successfully';
							}
						}
						#End
					}
				}else {
					$returnData['msg'] = '<button class="closeButton btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
				}
			}else {
				$returnData['msg'] = '<button class="closeButton btn btn-danger btn-xs" title="Invalid Request"><i class="fa fa-thumbs-down"></i></button>';
			}
		}else {
			$returnData['msg'] = '<button class="closeButton btn btn-danger btn-xs" title="Requested Record not Found"><i class="fa fa-thumbs-down"></i></button>';
		}
	}else if($action == 'delAdvertisement'){
		$uaID = (int) $_POST['id'];
		
		$delRes = mysql_query('SELECT * FROM user_advertisements WHERE uaID = '.$uaID);
		
		if(mysql_num_rows($delRes) > 0){
			$delSql = 'DELETE FROM user_advertisements WHERE uaID = '.$uaID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green">Advertisements Deleted Successfully.</span>';
				
				$atType = stripslashes($delRow->atType);
				if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
					$delRow = mysql_fetch_object($delRes);
					
					#Delete File
					$delFile = stripslashes($delRow->uaDetails);
					if(file_exists('../images/advertisements/'.$delFile)){
						unlink('../images/advertisements/'.$delFile);
					}
					#End
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Error on Deleting Advertisements, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red">Invalid Advertisements or Advertisements may Deleted, Please Contact Support.</span>';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>