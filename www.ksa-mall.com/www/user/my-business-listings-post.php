<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/post-validate-user.php');
	
	$formPostUrl = 'my-business-listings-post.php';
	
	$userID	= $_SESSION['user']['userID'];
	$email	= $_SESSION['user']['email'];
	$name	= $_SESSION['user']['name'];
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if(!$isUserLogged){
		$returnData['msg'] = 'Please Login to Access this Page.';
	}else {
		if($action == 'addListing'){
			$listingID = (int) $_POST['listingID'];
			
			$returnData['post'] = $_POST;
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				$listingRow = mysql_fetch_object($listingRes);
			
				
				$subCatIDs		= $_POST['esubCatIDs'];
				$businessName	= trim($_POST['ebusinessName']);
				$logo			= trim($_POST['elogo']);
				$image			= trim($_POST['eimgPath']);
				$address		= trim($_POST['eaddress']);
				$location		= trim($_POST['elocation']);
				$telephone		= trim($_POST['etelephone']);
				$mobile			= trim($_POST['emobile']);
				$businessEmail	= trim($_POST['ebusinessEmail']);
				$website		= trim($_POST['ewebsite']);
				$facebook		= trim($_POST['efacebook']);
				$description	= trim($_POST['edescription']);
				$offer			= trim($_POST['eoffer']);
				$events			= trim($_POST['eevents']);
				$tags			= trim($_POST['etags']);
				$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
				$seoTitle		= trim($_POST['eseoTitle']);
				$seoKeywords	= $tags;
				$seoDesc		= $tags;
				
				$lat			= trim($_POST['elat']);
				$lng			= trim($_POST['elng']);
				
				if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
					$returnData['err']['esubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
				}
				if($businessName == ''){
					$returnData['err']['ebusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
				}
				if($description == ''){
					$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
				}
				if($seoUrl == ''){
					$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
				}
				if($seoUrl != $listingRow->seoUrl && validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
					$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
				}
				
				if(!isset($returnData['err'])){
					
					$updateSql = '
						UPDATE businesslistings SET 
						subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
						businessName	= "'.mysql_real_escape_string($businessName).'", 
						logo			= "'.mysql_real_escape_string($logo).'", 
						imgPath			= "'.mysql_real_escape_string($image).'", 
						address			= "'.mysql_real_escape_string($address).'", 
						location		= "'.mysql_real_escape_string($location).'", 
					';
					
					if($telephone != ''){$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$updateSql .= 'telephone = NULL, ';}
					if($mobile != ''){$updateSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$updateSql .= 'mobile = NULL, ';}
					
					$updateSql .= 'businessEmail = "'.mysql_real_escape_string($businessEmail).'", ';
					
					if($website != '' && $website != 'http://' && $website != 'https://'){
						$updateSql .= 'website = "'.mysql_real_escape_string($website).'", ';
					}else{
						$updateSql .= 'website = NULL, ';
					}
					
					if($facebook != '' && $facebook != 'http://' && $facebook != 'https://'){
						$updateSql .= 'facebookPage = "'.mysql_real_escape_string($facebook).'", ';
					}else{
						$updateSql .= 'facebookPage = NULL, ';
					}
					
					$updateSql .= 'description = "'.mysql_real_escape_string($description).'", ';
					
					if($offer != ''){$updateSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$updateSql .= 'offer = NULL, ';}
					if($events != ''){$updateSql .= 'events = "'.mysql_real_escape_string($events).'", ';}else{$updateSql .= 'events = NULL, ';}
					if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$updateSql .= 'tags = NULL, ';}
					
					$updateSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
					
					if($seoTitle != ''){$updateSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$updateSql .= 'seoTitle = NULL, ';}
					if($seoKeywords != ''){$updateSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeywords = NULL, ';}
					if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$updateSql .= 'seoDesc = NULL, ';}
					if($lat != ''){$updateSql .= 'lat = '.$lat.', ';}else{$updateSql .= 'lat = NULL, ';}
					if($lng != ''){$updateSql .= 'lng = '.$lng.', ';}else{$updateSql .= 'lng = NULL, ';}
					
					$updateSql .= '
						log = CONCAT(log, "<pre>Business Listing Added by User on '.date('d-m-Y H:i:s').'</pre>") 
						WHERE listingID = '.$listingID.' AND userID = '.$userID.' 
					';
					
					//$returnData['sql'] = 'Update SQL: '.$updateSql;
					
					if(mysql_query($updateSql)){
						$returnData['status'] = 0;
						
						$_SESSION['msg'] = '<span class="bg-green tip">Listing Updated Successfully.</span>';
						
						#Send Email to Admin
						if($listingRow->isNotifyEmailSent == 'N'){
							require_once('../phpmailer/class.phpmailer.php');
							
							$adminLink = $domain.'/admin/manage-business-listings.php?scatID=&sbusinessName='.$businessName.'&sexpiryOn=&submitBtn=Filter+Result';
							$emailMsg = '
								<strong>'.$name.'</strong> added a New Listing,<br />
								<br />
								Please Approved it by <a href="'.$adminLink.'">Clicking Here.</a><br />
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
								$mail->Subject = 'New Listing Added From '.$domainOnly.' User Area';
								$mail->MsgHTML($emailMsg);
								
								$mail->AddAddress($settings[1], 'info');
								//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
								
								if(!$mail->Send()) {
									//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
									$isNotifyEmailSent == 'Y';
								} else {
									//echo 'Email Sent Successfully';
								}
							}else {
								#Send Email to Info Start
								$mail = new PHPMailer();
								$mail->CharSet = "UTF-8";
								$mail->SetFrom('no-reply@'.$domainOnly, $smtpFromName);
								$mail->Subject	= 'New Listing Added From '.$domainOnly.' User Area';
								$mail->MsgHTML($emailMsg);
								
								$mail->AddAddress($settings[1], 'info');
								//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
								
								if(!$mail->Send()){
									//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
									$isNotifyEmailSent == 'Y';
								}else{
									//echo 'Email Sent Successfully';
								}
							}
							
							if(isset($isNotifyEmailSent)){
								mysqli_query('UPDATE businesslistings SET isNotifyEmailSent = "Y" WHERE listingID = '.$listingID.' AND userID = '.$userID.' ');
							}
						}
						#Email Send End
						
						$returnData['redirect'] = '/user/my-business-listings.php';
					}else {
						$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
					}
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
			}
		}else if($action == 'saveListing'){
			$listingID = (int) $_POST['listingID'];
			
			$returnData['post'] = $_POST;
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				$listingRow = mysql_fetch_object($listingRes);
			
				
				$subCatIDs		= $_POST['esubCatIDs'];
				$businessName	= trim($_POST['ebusinessName']);
				$logo			= trim($_POST['elogo']);
				$image			= trim($_POST['eimgPath']);
				$address		= trim($_POST['eaddress']);
				$location		= trim($_POST['elocation']);
				$telephone		= trim($_POST['etelephone']);
				$mobile			= trim($_POST['emobile']);
				$businessEmail	= trim($_POST['ebusinessEmail']);
				$website		= trim($_POST['ewebsite']);
				$facebook		= trim($_POST['efacebook']);
				$description	= trim($_POST['edescription']);
				$offer			= trim($_POST['eoffer']);
				$events			= trim($_POST['eevents']);
				$tags			= trim($_POST['etags']);
				$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
				$seoTitle		= trim($_POST['eseoTitle']);
				$seoKeywords	= $tags;
				$seoDesc		= $tags;
				
				$lat			= trim($_POST['elat']);
				$lng			= trim($_POST['elng']);
				
				if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
					$returnData['err']['esubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
				}
				if($businessName == ''){
					$returnData['err']['ebusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
				}
				if($description == ''){
					$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
				}
				if($seoUrl == ''){
					$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
				}
				if($seoUrl != $listingRow->seoUrl && validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
					$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
				}
				
				if(!isset($returnData['err'])){
					
					$updateSql = '
						UPDATE businesslistings SET 
						subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
						businessName	= "'.mysql_real_escape_string($businessName).'", 
						logo			= "'.mysql_real_escape_string($logo).'", 
						imgPath			= "'.mysql_real_escape_string($image).'", 
						address			= "'.mysql_real_escape_string($address).'", 
						location		= "'.mysql_real_escape_string($location).'", 
					';
					
					if($telephone != ''){$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$updateSql .= 'telephone = NULL, ';}
					if($mobile != ''){$updateSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$updateSql .= 'mobile = NULL, ';}
					
					$updateSql .= 'businessEmail = "'.mysql_real_escape_string($businessEmail).'", ';
					
					if($website != ''){
						if($website != 'http://' && $website != 'https://'){
							$updateSql .= 'website = "'.mysql_real_escape_string($website).'", ';
						}else {
							$updateSql .= 'website = NULL, ';
						}
					}else{
						$updateSql .= 'website = NULL, ';
					}
					/* Facebook url added by kavitha on 12-6-2015 */
					if($facebook != ''){
						if($facebook != 'http://' && $facebook != 'https://'){
							$updateSql .= 'facebookPage = "'.mysql_real_escape_string($facebook).'", ';
						}else {
							$updateSql .= 'facebookPage = NULL, ';
						}
					}else{
						$updateSql .= 'facebookPage = NULL, ';
					}
					
					$updateSql .= 'description = "'.mysql_real_escape_string($description).'", ';
					
					if($offer != ''){$updateSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$updateSql .= 'offer = NULL, ';}
					if($events != ''){$updateSql .= 'events = "'.mysql_real_escape_string($events).'", ';}else{$updateSql .= 'events = NULL, ';}
					if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$updateSql .= 'tags = NULL, ';}
					
					$updateSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
					
					if($seoTitle != ''){$updateSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$updateSql .= 'seoTitle = NULL, ';}
					if($seoKeywords != ''){$updateSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeywords = NULL, ';}
					if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$updateSql .= 'seoDesc = NULL, ';}
					if($lat != ''){$updateSql .= 'lat = '.$lat.', ';}else{$updateSql .= 'lat = NULL, ';}
					if($lng != ''){$updateSql .= 'lng = '.$lng.', ';}else{$updateSql .= 'lng = NULL, ';}
					
					$updateSql .= '
						log		 = CONCAT(log, "<pre>Business Listing Updated by User on '.date('d-m-Y H:i:s').'</pre>") 
						WHERE listingID = '.$listingID.' AND userID = '.$userID.' 
					';
					
					//$returnData['sql'] = 'Update SQL: '.$updateSql;
					
					if(mysql_query($updateSql)){
						$returnData['status'] = 0;
						$returnData['msg'] = '<span class="bg-green tip">Listing Updated Successfully.</span>';
						
						$returnData['field']['eseoUrl'] = $seoUrl;
						
					}else {
						$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
					}
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
			}
		}else if($action == 'getListingImages'){
			$listingID = (int) $_POST['id'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				$returnData['status'] = 0;
				//Image sorting Added by Kavitha on 11/06/2015
				$imgRes = mysql_query('SELECT * FROM businesslistings_imgs WHERE listingID = '.$listingID.' ORDER BY sOrder ASC');
				
				$tr = '';
				if(mysql_num_rows($imgRes) > 0){
					$sNo = 1;
					while($imgRow = mysql_fetch_object($imgRes)){
						$imgID	 = $imgRow->imgID;
						$imgPath = stripslashes($imgRow->imgPath);
						$alt	 = stripslashes($imgRow->alt);
						$sOrder	 = $imgRow->sOrder;
						//Add Thumbs for images by Kavitha on 11/06/2015
						if(strpos($imgPath, "http") === false){
							$imgPath = $domain.''.$imgPath;
						}
						
						//Caption removed by Kavitha on 10/06/2015
						$tr .= '<tr class="imageRow" id="imageRow_'.$imgID.'">';
						$tr .= '<td>'.$sNo.'</td>';
						$tr .= '<td id="td_iP_'.$imgID.'" align="center">';
						$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title=""><img src="/thumb/100-100-'.$imgPath.'" alt=""></a>';
						$tr .= '</td>';
						
						$tr .= '<td>';
						$tr .= '<input type="text"class="form-control" name="alts['.$imgID.']" value="'.$alt.'" />';
						$tr .= '</td>';
						
						$tr .= '<td width="120">';
						$tr .= '<div class="pull-left" style="width:60%">';
						$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$imgID.'" data-resultprefix="iSort_" />';
						$tr .= '</div>';
						$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$imgID.'"></div>';
						$tr .= '</td>';
						$tr .= '<td>';
						$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$imgID.'" /></label>';
						$tr .= '</td>';
						$tr .= '</tr>';
						
						$sNo++;
					}
					$returnData['icheck'] = 'yes';
				}else {
					$tr .= '<tr class="errorRow">';
					$tr .= '<td colspan="6" align="center"><span class="text-red">No Records Found</span></td>';
					$tr .= '</tr>';
				}
				$returnData['table']['imageTable'] = $tr;
				
				$_SESSION['uimgManagerFilePath'] = '../../../images/userfiles/business/'.$listingID;
				$_SESSION['uimgManagerFileSelectPath'] = '/images/userfiles/business/'.$listingID.'/';
				$_SESSION['uimgManageruploadMaxSize'] = '500K';
				
				$returnData['field']['ilistingID'] = $listingID;
			}else {
				$returnData['msg'] = 'Requested Record not Found, or Business Listing may Deleted, Please Contact Support.';
			}
		}else if($action == 'addImageUrl'){
			$imgPath	= trim($_POST['val']);
			$listingID	= (int) $_POST['where'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				if($imgPath != '' && $listingID > 0){
					$listingRow = mysql_fetch_object($listingRes);
					$insertSql = '
						INSERT INTO businesslistings_imgs (listingID, imgPath, alt) 
						VALUES ('.$listingID.', "'.mysql_real_escape_string($imgPath).'", "'.$listingRow->tags.'") 
					';
					
					if(mysql_query($insertSql)){
						$insertedID = mysql_insert_id($listingRes);
						
						$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Image Url Added Successfully.</span>';
						
						$returnData['status']	= 0;
						
						$tr = '<tr class="imageRow" id="imageRow_'.$insertedID.'">';
						$tr .= '<td>0</td>';
						$tr .= '<td id="td_iP_'.$insertedID.'">';
						$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
						$tr .= '</td>';
						
						$tr .= '<td>';
						$tr .= '<input type="text"class="form-control" name="alts['.$insertedID.']" value="'.stripslashes($listingRow->tags).'" />';
						$tr .= '</td>';
						
						$tr .= '<td width="120">';
						$tr .= '<div class="pull-left" style="width:60%">';
						$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$insertedID.'" data-resultprefix="iSort_" />';
						$tr .= '</div>';
						$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$insertedID.'"></div>';
						$tr .= '</td>';
						$tr .= '<td>';
						$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$insertedID.'" /></label>';
						$tr .= '</td>';
						$tr .= '</tr>';
						
						$returnData['icheck']				  = 'yes';
						$returnData['appendtr']['imageTable'] = $tr;
						$returnData['field']['aimgurl']		  = '';
					}else {
						$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
					}
				}else {
					$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Required Details are not Found.</span>'.$listingID;
				}
			}
			
		}else if($action == 'addImages'){
			$listingID	= (int) $_POST['listingID'];
			$files		= $_POST['files'];
			$files		= explode(',', $files);
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				$listingRow = mysql_fetch_object($listingRes);
				
				if(!is_array($files) || count($files) == 0 || count($files) > 0 && $files[0] == ''){
					$returnData['msg'] = '<span class="bg-red tip">Please Select atleast one Image File.</span>';
				}else {
					$insertSql = 'INSERT INTO businesslistings_imgs (listingID, imgPath, alt) VALUES ';
					
					$totalFiles = count($files);
					$n = 1;
					foreach($files as $key => $imgPath){
						
						$insertSql .= '('.$listingID.', "'.$imgPath.'", "'.$listingRow->tags.'")';
						if($n != $totalFiles){
							$insertSql .= ',';
						}
						
						$n++;
					}
					
					if(mysql_query($insertSql)){
						$lastInsertID = mysql_insert_id();
						
						$returnData['msg'] = '<span class="bg-green tip">Image(s) Added Successfully.</span>';
						
						$returnData['status']	= 0;
						
						$tr ='';
						
						foreach($files as $key => $imgPath){
							
							$tr .= '<tr class="imageRow" id="imageRow_'.$lastInsertID.'">';
							$tr .= '<td>0</td>';
							$tr .= '<td id="td_iP_'.$lastInsertID.'">';
							$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
							$tr .= '</td>';
							
							$tr .= '<td>';
							$tr .= '<input type="text"class="form-control" name="alts['.$lastInsertID.']" value="'.stripslashes($listingRow->tags).'" />';
							$tr .= '</td>';
							
							$tr .= '<td width="120">';
							$tr .= '<div class="pull-left" style="width:60%">';
							$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$lastInsertID.'" data-resultprefix="iSort_" />';
							$tr .= '</div>';
							$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$lastInsertID.'"></div>';
							$tr .= '</td>';
							$tr .= '<td>';
							$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$lastInsertID.'" /></label>';
							$tr .= '</td>';
							$tr .= '</tr>';
							
							$lastInsertID++;
						}
						
						$returnData['icheck'] = 'yes';
						$returnData['tbody'] = $tr;
					}else {
						$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
					}
				}
			}
		}else if($action == 'sortImage'){
			$imgID	= (int) $_POST['wid'];
			$sOrder	= (int) $_POST['val'];
			
			if($imgID != '' && $sOrder != ''){
				$updateSql = '
					UPDATE businesslistings_imgs SET 
					sOrder = '.$sOrder.'
					WHERE imgID = '.$imgID.'
				';
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<button class="btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
				}else {
					$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
				}
			}else {
				$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Invalid Request"><i class="fa fa-thumbs-down"></i></button>';
			}
		}else if($action == 'actionForMultipleImages'){
			$listingID	= (int) $_POST['ilistingID'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				if(isset($_POST['deleteAll'])){
					$ids		= $_POST['images'];
					$idsStr = implode(',', $ids);
					$deletedIdsArr = array();
					
					$imgRes = mysql_query('SELECT * FROM businesslistings_imgs WHERE imgID IN ('.$idsStr.')');
					
					if(mysql_num_rows($imgRes) > 0){
						$delSql = 'DELETE FROM businesslistings_imgs WHERE imgID IN ('.$idsStr.')';
						
						if(mysql_query($delSql)){
							$returnData['status'] = 0;
							while($imgRow = mysql_fetch_object($imgRes)){
								$returnData['anim']['imageRow_'.$imgRow->imgID] = 'remove';
							}
							$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Deleted Successfully.</span>';
						}else {
							$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
						}
					}else {
						$returnData['msg'] = 'Selected Images not Found, or Deleted Already, Please Contact Support.';
					}
				}else if(isset($_POST['saveAll'])){
				
					$alts		= $_POST['alts'];			
					$updatedRecords = 0;
					
					foreach($alts as $imgID => $alts){
						$updateImgSql = '
							UPDATE businesslistings_imgs SET 
							alt		= "'.mysql_real_escape_string($alts).'" 
							WHERE imgID = '.$imgID.' 
						';
						
						if(mysql_query($updateImgSql)){
							$updatedRecords++;
						}
					}
					
					if($updatedRecords > 0){
						$returnData['status'] = 0;
						$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Updated Successfully.</span>';
					}else {
						$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Error on Updating Records, Please Contact Support.</span>';
					}
				}else {
					$returnData['msg'] = 'Invalid Action.';
				}
			}
		}else if($action == 'getListingVideos'){
			$listingID = (int) $_POST['id'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
			
			if(mysql_num_rows($listingRes) > 0){
				$returnData['status'] = 0;
				
				$videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE listingID = '.$listingID);
				
				$tr = '';
				if(mysql_num_rows($videoRes) > 0){
					$sNo = 1;
					while($videoRow = mysql_fetch_object($videoRes)){
						$videoID	= $videoRow->videoID;
						$videoUrl	= stripslashes($videoRow->videoUrl);
						$sOrder		= $videoRow->sOrder;
						
						$tr .= '<tr class="videoRow" id="videoRow_'.$videoID.'">';
						$tr .= '<td>'.$sNo.'</td>';
						$tr .= '<td id="td_vU_'.$videoID.'">';
						$tr .= '<a href="'.$videoUrl.'"  target="_new">'.$videoUrl.'</a>';
						$tr .= '</td>';
						
						$tr .= '<td width="120">';
						$tr .= '<div class="pull-left" style="width:60%">';
						$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortVideo" data-wid="'.$videoID.'" data-resultprefix="vSort_" />';
						$tr .= '</div>';
						$tr .= '<div class="pull-right" style="width:30%;" id="vSort_'.$videoID.'"></div>';
						$tr .= '</td>';
						$tr .= '<td>';
						$tr .= '<label><input type="checkbox" class="videocheck" name="videos[]" value="'.$videoID.'" /></label>';
						$tr .= '</td>';
						$tr .= '</tr>';
						
						$sNo++;
					}
					$returnData['icheck'] = 'yes';
				}else {
					$tr .= '<tr class="errorRow">';
					$tr .= '<td colspan="4" align="center"><span class="text-red">No Records Found</span></td>';
					$tr .= '</tr>';
				}
				$returnData['table']['videoTable'] = $tr;
				$returnData['field']['vlistingID'] = $listingID;
			}else {
				$returnData['msg'] = 'Requested Record not Found, or Business Listing may Deleted, Please Contact Support.';
			}
		}else if($action == 'addVideoUrl'){
			$videoUrl	= trim($_POST['val']);
			$listingID	= (int) $_POST['where'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				if($videoUrl != '' && $listingID > 0){
					$insertSql = 'INSERT INTO businesslistings_videos (listingID, videoUrl) VALUES ('.$listingID.', "'.mysql_real_escape_string($videoUrl).'")';
					
					if(mysql_query($insertSql)){
						$insertedID = mysql_insert_id();
						
						$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-green tip">Video Url Added Successfully.</span>';
						
						$returnData['status']	= 0;
						
						$tr .= '<tr class="videoRow" id="videoRow_'.$insertedID.'">';
						$tr .= '<td>'.$sNo.'</td>';
						$tr .= '<td id="td_vU_'.$insertedID.'">';
						$tr .= '<a href="'.$videoUrl.'" target="_new">'.$videoUrl.'</a>';
						$tr .= '</td>';
						
						$tr .= '<td width="120">';
						$tr .= '<div class="pull-left" style="width:60%">';
						$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortVideo" data-wid="'.$insertedID.'" data-resultprefix="vSort_" />';
						$tr .= '</div>';
						$tr .= '<div class="pull-right" style="width:30%;" id="vSort_'.$insertedID.'"></div>';
						$tr .= '</td>';
						$tr .= '<td>';
						$tr .= '<label><input type="checkbox" class="videocheck" name="videos[]" value="'.$insertedID.'" /></label>';
						$tr .= '</td>';
						$tr .= '</tr>';
						
						$returnData['icheck']				  = 'yes';
						$returnData['appendtr']['videoTable'] = $tr;
						$returnData['field']['avideo']		  = '';
					}else {
						$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
					}
				}else {
					$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-red tip">Required Details are not Found.</span>'.$listingID;
				}
			}
		}else if($action == 'sortVideo'){
			$videoID= (int) $_POST['wid'];
			$sOrder	= (int) $_POST['val'];
			
			if($videoID != '' && $sOrder != ''){
				$updateSql = '
					UPDATE businesslistings_videos SET 
					sOrder = '.$sOrder.'
					WHERE videoID = '.$videoID.'
				';
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<button class="btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
				}else {
					$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
				}
			}else {
				$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Invalid Request"><i class="fa fa-thumbs-down"></i></button>';
			}
		}else if($action == 'actionForMultipleVideos'){
			$listingID = (int) $_POST['vlistingID'];
			
			$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
			
			if(mysql_num_rows($listingRes) > 0){
				$ids			= $_POST['videos'];
				$idsStr 		= implode(',', $ids);
				$deletedIdsArr	= array();
				
				$videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE videoID IN ('.$idsStr.')');
				
				if(mysql_num_rows($videoRes) > 0){
					$delSql = 'DELETE FROM businesslistings_videos WHERE videoID IN ('.$idsStr.')';
					
					if(mysql_query($delSql)){
						$returnData['status'] = 0;
						while($videoRow = mysql_fetch_object($videoRes)){
							$returnData['anim']['videoRow_'.$videoRow->videoID] = 'remove';
						}
						$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-green tip">Selected Records Deleted Successfully.</span>';
					}else {
						$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
					}
				}else {
					$returnData['msg'] = 'Selected Videos not Found, or Deleted Already, Please Contact Support.';
				}
			}
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>