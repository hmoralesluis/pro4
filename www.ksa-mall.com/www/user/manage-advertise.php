<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	$header = array(
		'siteTitle' => 'Manage Advertisements', 
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Advertisements')
		)
	);
	
	$userID = $_SESSION['user']['userID'];
	
	function getFields($atID, $post, $fileRequired = 'Y'){
		global $userID;
		
		$advTypeRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		if(mysql_num_rows($advTypeRes) > 0){
			$returnArr = array();
			
			$advTypeRow = mysql_fetch_object($advTypeRes);
			
			$atDescription = '<div style="border:solid 2px #F4F4F4; padding:15px; margin-bottom:20px;">';
			$atDescription .= stripslashes($advTypeRow->atDescription);
			$atDescription .= '</div>';
			
			$returnArr['atDescription'] = $atDescription;
			
			$returnArr['atType'] = stripslashes($advTypeRow->atType);
			$returnArr['atName'] = stripslashes($advTypeRow->atName);
			
			#Fields Manipulating Start
			$uaFields = '';
			if($advTypeRow->atType == 'RSI' || $advTypeRow->atType == 'FI' || $advTypeRow->atType == 'PII' || $advTypeRow->atType == 'HS'){
				$uaFields = '<label for="uaDetails">Select File ('.$advTypeRow->imgWidth.' x '.$advTypeRow->imgHeight.') *</label>';
				
				if($fileRequired == 'Y'){$required = ' required="required"';}else{$required = '';}
				$uaFields .= '<input type="file" class="form-control" name="uaDetails" id="uaDetails"'.$required.' />';
				
				$uaFields .= '<label for="uaTitle">Image Alt *</label>';
				$uaFields .= '<textarea class="form-control" name="uaTitle" id="uaTitle" required="required">'.$post['uaTitle'].'</textarea>';
				
				$uaFields .= '<label for="uaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="uaLink" id="uaLink" value="'.$post['uaLink'].'" />';
				
				$returnArr['imgWidth']	= stripslashes($advTypeRow->imgWidth);
				$returnArr['imgHeight']	= stripslashes($advTypeRow->imgHeight);
			}else if($advTypeRow->atType == 'BL'){
				$uaFields = '<label for="uaDetails">Select a Business Listing *</label>';
				
				$uaFields .= '<select class="form-control" name="uaDetails" id="uaDetails" required="required">';
				$uaFields .= '<option value="">Select a Business Listing</option>';
				$blRes = mysql_query('SELECT * FROM businesslistings WHERE userID = '.$userID.' AND status = "A" ');
				if($blRes && mysql_num_rows($blRes) > 0){
					while($blRow = mysql_fetch_object($blRes)){
						if($post['uaDetails'] == $blRow->listingID){$selected = ' selected="selected"';}else{$selected = '';}
						$uaFields .= '<option value="'.$blRow->listingID.'"'.$selected.'>'.stripslashes($blRow->businessName).'</option>';
					}
				}
				$uaFields .= '</select>';
			}else {
				$uaFields = '<label for="uaTitle">Title *</label>';
				$uaFields .= '<input type="text" class="form-control" name="uaTitle" id="uaTitle" value="'.$post['uaTitle'].'" required="required" />';
				
				$uaFields .= '<label for="uaDetails">Short Description *</label>';
				$uaFields .= '<textarea class="form-control" name="uaDetails" id="uaDetails" required="required">'.$post['uaDetails'].'</textarea>';
				
				$uaFields .= '<label for="uaLink">Link (Optional)</label>';
				$uaFields .= '<input type="text" class="form-control" name="uaLink" id="uaLink" value="'.$post['uaLink'].'" />';
			}
			$returnArr['uaFields'] = $uaFields;
			
			return($returnArr);
			#Fields Manipulating End
		}
	}
	
	$formPostUrl = 'manage-advertise-post.php';
?>

<? require_once('includes/header.php'); ?>
	<?
		#Delete Advertisement Start
		if(isset($_REQUEST['delete']) && (int) $_REQUEST['id'] > 0){
			$deleteID = (int) $_REQUEST['id'];
			
			$delRes = mysql_query('
				SELECT ua.* 
				FROM user_advertisements AS ua 
				WHERE ua.uaID = '.$deleteID.' AND ua.isDeleted = "N" AND ua.userID = '.$userID.'
			');
			
			if($delRes && mysql_num_rows($delRes) > 0){
				$delSql = '
					DELETE FROM user_advertisements 
					WHERE uaID = '.$deleteID.' AND userID = '.$userID.'
				';
				
				if(mysql_query($delSql)){
					$delsMsg = '<span class="bg-green">Advertisement Deleted Successfully.</span>';
					
					#Delete File
					$delRow = mysql_fetch_object($delRes);
					
					$delFile = stripslashes($delRow->uaDetails);
					if(file_exists('../images/advertisements/'.$delFile)){
						unlink('../images/advertisements/'.$delFile);
					}
					#End
					
				}else {
					$delsMsg = '<span class="bg-red">Error on Deleting Record, Please Contact Support.</span>';
				}
			}
		}
		#Delete Advertisement End
		
		#Edit Advertisement Start
		if(isset($_REQUEST['edit'])){
			$whereID	= (int) $_REQUEST['id'];
			
			$validateRes = mysql_query('
				SELECT ua.* 
				FROM user_advertisements AS ua 
				WHERE ua.uaID = '.$whereID.' AND ua.isDeleted = "N" AND ua.userID = '.$userID.'
			');
			
			if(mysql_num_rows($validateRes) > 0){
				$showEdit = true;
				$validateRow = mysql_fetch_object($validateRes);
						
				if($uaRow->status == 'I'){
					$sMsg = '<span class="bg-red">Your Advertisement is Inactive, Please Contact Support.</span>';
				}else {
					$showEdit = true;
				}
				
				if(isset($_POST['uaName']) && $_POST['uaName'] != ''){
					#Save Record Start
					$uaName		= trim($_POST['uaName']);
					$uaTitle	= trim($_POST['uaTitle']);
					$uaLink		= trim($_POST['uaLink']);
					
					$editFieldArr = getFields($validateRow->atID, $_POST, 'N');
					
					$atType		= $editFieldArr['atType'];
					$atName		= $editFieldArr['atName'];
					
					$updateSql = '
						UPDATE user_advertisements SET 
						uaName		= "'.mysql_real_escape_string($uaName).'", 
						updatedOn	= "'.date('Y-m-d H:i:s').'", 
						log			= CONCAT(log, "<pre>'.date('d-m-Y H:i:s').': Advertisement Updated by User.</pre>"), 
					';
					if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
						$uaDetails	= $_FILES['uaDetails'];
						$imgWidth	= $desFieldArr['imgWidth'];
						$imgHeight	= $desFieldArr['imgHeight'];
						
						if($uaDetails['tmp_name'] != ''){
							list($width, $height, $type, $attr) = getimagesize($uaDetails['tmp_name']);
							
							if($type != 1 && $type != 2 && $type != 3){
								$sMsg = '<span class="bg-red">Allowed File Types are JPG | PNG | GIF.</span>';
							}else {
								$fileTypeArr = array(1 => 'gif', 2 => 'jpg', 3 => 'png');
								$newFileName = 'advertisement-'.makePermaLink($uaName).'-'.time().'.'.$fileTypeArr[$type];
								
								if(move_uploaded_file($uaDetails['tmp_name'], '../images/advertisements/'.$newFileName)){
									$updateSql .= '
										uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
										uaDetails	= "'.mysql_real_escape_string($newFileName).'", 
										uaLink		= "'.mysql_real_escape_string($uaLink).'" 
									';
								}else {
									$sMsg = '<span class="bg-red">Error on Uploading File, Please Contact Support.</span>';
								}
							}
						}else {
							$updateSql .= '
								uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
								uaLink		= "'.mysql_real_escape_string($uaLink).'" 
							';
						}
					}else if($atType == 'BL') {
						$uaDetails	= (int) $_POST['uaDetails'];
						
						$updateSql .= '
							uaDetails	= "'.$uaDetails.'" 
						';
					}else {
						$uaDetails	= trim($_POST['uaDetails']);
						
						$updateSql .= '
							uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
							uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
							uaLink		= "'.mysql_real_escape_string($uaLink).'" 
						';
					}
					
					$updateSql .= 'WHERE uaID = '.$whereID.' AND isDeleted = "N" AND userID = '.$userID.' ';
					
					if(!isset($sMsg)){
						if(mysql_query($updateSql)){
							
							$sMsg = '<span class="bg-green">Advertisement Updated Successfully.</span>';
							
							if(isset($newFile)){
								$oldFile = stripslashes($validateRow->uaDetails);
								#Deleted Old File
								if(file_exists('../images/advertisements/'.$oldFile)){
									unlink('../images/advertisements/'.$oldFile);
								}
								#End
							}
						}else {
							$sMsg = '<span class="bg-red">Error on UPDATING Record, Please Contact Support.</span>';
							
							#Deleted Uploaded File
							if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
								if(file_exists('../images/advertisements/'.$newFileName)){
									unlink('../images/advertisements/'.$newFileName);
								}
							}
							#End
						}
					}
					#Save Record End
				}else {
					#Show Old Records 
					$postArrForEdit = array(
						'uaTitle'	=> stripslashes($validateRow->uaTitle), 
						'uaDetails'	=> stripslashes($validateRow->uaDetails), 
						'uaLink'	=> stripslashes($validateRow->uaLink)
					);
					
					$editFieldArr = getFields($validateRow->atID, $postArrForEdit, 'N');
					#End
				}
			}else {
				$sMsg = '<span class="bg-red">You Cannot Pay for this Advertisement, Invalid Advertisement</span>';
			}
		}
		#Edit Advertisement End
	?>
    
    <div class="row">
        <div class="col-md-7">
        	<div class="box box-solid bg-red">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
						Subscribed Advertisements
                    </div>
                </div>
                <div class="box-body text-black no-padding" style="padding-top:0px; background-color:#fff;">
                	<div id="sMsg"></div>
					<div class="table-responsive">
                    	<? if(isset($delsMsg)){echo '<div class="sMsg">'.$delsMsg.'</div>';}?>
                        <table class="table table-striped" id="listingTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th width="200" colspan="2">Name</th>
                                <th width="200">Expiry On</th>
                                <th width="100">Status</th>
                                <th style="width: 250px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                                $sql = '
                                    SELECT ua.* 
                                    FROM user_advertisements AS ua
                                    WHERE ua.userID = '.$userID.' 
                                ';
								
								if((isset($_REQUEST['paynow']) || isset($_REQUEST['edit']) || isset($_REQUEST['renew'])) && (int) $_REQUEST['id'] > 0){
									$sql .= 'AND ua.uaID = '.(int) $_REQUEST['id'].' ';
								}
                                
								$sql .= 'ORDER BY ua.expiryOn DESC';
								
                                $totalRows = mysql_num_rows(mysql_query($sql));
                                $limit = 20;
                                
                                if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
                                    $offset = ($_REQUEST['pageNo'] - 1);
                                }else {
                                    $offset = 0;
                                }
                                
                                if(!isset($_REQUEST['viewall'])){
                                    $sql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
                                }
                                
								#echo $sql;
								
                                $res = mysql_query($sql);
                                $sNo = 1;
                            ?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
								<?
                                    $uaID = $row->uaID;
                                    if($row->atType == 'RSI' || $row->atType == 'FI' || $row->atType == 'PII' || $row->atType == 'HS'){
                                        $uaDetails = '<img src="../images/advertisements/'.stripslashes($row->uaDetails).'" alt="" />';
									}else if($row->atType == 'BL'){
										 $uaDetails = getRecord('businesslistings', 'businessName', array('listingID' => (int) $row->uaDetails));
                                    }else {
                                        $uaDetails = stripslashes($row->uaDetails);
                                    }
                                ?>
                                <tr class="listingRow" id="listingRow_<?=$uaID?>">
                                    <td><?=$sNo?></td>
                                    <td width="200"><?=stripslashes($row->uaName)?></td>
                                    <td width="150"><?=$uaDetails?></td>
                                    <td><?=date('d-m-Y', strtotime($row->expiryOn))?></td>
                                    <td><?=$statusArr[$row->status]?></td>
                                    <td>
                                    	<? if(!isset($_REQUEST['edit']) || $row->status == 'I'): ?>
                                        <a href="manage-advertise.php?edit=Y&id=<?=$uaID?>" class="btn btn-sm btn-primary" title="Edit Advertisement">
                                        <i class="glyphicon glyphicon-edit"></i> Edit
                                        </a>
                                        <? endif; ?>
                                        
                                        <? if(!isset($_REQUEST['paynow']) && !isset($_REQUEST['renew']) && $row->status == 'PE'): ?>
                                        <a href="manage-advertise.php?paynow=Y&id=<?=$uaID?>" class="btn btn-sm btn-success" title="Pay Advertisement">
                                        <i class="glyphicon glyphicon-shopping-cart"></i> Pay
                                        </a>
                                        <? endif; ?>
                                        
                                        <a href="manage-advertise.php?delete=Y&id=<?=$uaID?>" class="btn btn-sm btn-danger" title="Delete Advertisement">
                                        <i class="glyphicon glyphicon-trash"></i> Del
                                        </a>
                                    </td>
                                </tr>
                            	<? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="6" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="6" align="right">
                                	<a href="manage-advertise.php" class="btn btn-md btn-success" title="Add Advertisement">
                                    	Subscribe New Advertisement
                                    </a>
                                </td>
                            </tr>
                            </tfoot>
                        </table> 
					</div>
                </div>
                <div class="box-footer clearfix">
                    <div class="pagination">
					<? createPaginationLink($totalRows, $limit, 'Y')?>
                    </div>
                </div>
            </div>
		</div>
        
        
        <? if(isset($_REQUEST['paynow']) && isset($_REQUEST['id']) && (int) $_REQUEST['id'] > 0): ?>
        	<?
				$uaID = (int) $_REQUEST['id'];
				
				$uaRes = mysql_query('
					SELECT ua.*, at.payButtonDaily 
					FROM user_advertisements AS ua 
					LEFT JOIN advertisement_types AS at ON at.atID = ua.atID 
					WHERE ua.uaID = '.$uaID.' 
					AND ua.isDeleted = "N" 
					AND ua.userID = '.$userID.'
				');
				if($uaRes && mysql_num_rows($uaRes) > 0){
					$uaRow = mysql_fetch_object($uaRes);
						
					if($uaRow->status == 'I'){
						$description = '<span class="bg-red">Your Advertisement is Inactive, Please Contact Support.</span>';
					}else if($uaRow->status == 'PA' || $uaRow->status == 'A'){
						$description = '<span class="bg-red">Your Advertisement is Paid and Activated Already.</span>';
					}else if($uaRow->status == 'PE'){
						$description = stripslashes($uaRow->payButtonDaily);
					}
				}else {
					$description = '<span class="bg-red">You Cannot Pay for this Advertisement, Invalid Advertisement</span>';
				}
			?>
        	<div class="col-md-5">
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <div class="box-title clearfix" style="float:none; display:block;">
                            Pay "<?=stripslashes($uaRow->uaName)?>"
                        </div>
                    </div>
                    <div class="box-body text-black" style="background-color:#fff; padding:20px;">
                        <div style="border:solid 2px #F4F4F4; padding:15px; margin-bottom:20px;">
							<?=$description?>
                        </div>
                        
                        <a href="manage-advertise.php" class="btn btn-md btn-danger" title="Back To Manage Advertisements">
                             Back To Manage Advertisements
                        </a>
                    </div>
                </div>
            </div>
		<? elseif(isset($_REQUEST['edit']) && isset($_REQUEST['id']) && (int) $_REQUEST['id'] > 0): ?>
        	<div class="col-md-5">
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <div class="box-title clearfix" style="float:none; display:block;">
                            <? if(isset($showEdit) && isset($validateRow)): ?>
                            	Edit "<?=stripslashes($validateRow->uaName)?>"
                            <? else: ?>
                            	Edit Advertisement
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="box-body text-black" style="background-color:#fff; padding:20px;">
						<? if(isset($showEdit) && isset($validateRow)): ?>
                            <form action="" method="post" id="subscribeNewAdvert" enctype="multipart/form-data">
                                <? if(isset($sMsg)): ?><div class="sMsg"><?=$sMsg?></div><? endif; ?>
                                
                                <label for="uaName">Name Your Advertisement *</label>
                                <input type="text" class="form-control" name="uaName" id="uaName" value="<?=stripslashes($validateRow->uaName)?>" required="required" />
                                
                                <label for="atID">Select Advertisement Type *</label>
                                <input type="text" class="form-control" value="<?=stripslashes($validateRow->atName)?>" disabled="disabled" />
                                
                                <div id="uaFields"><?=$editFieldArr['uaFields']?></div>
                                
                                <button type="submit" name="submitBtn" class="btn btn-success">Save Advertisement</button>
                                <a href="manage-advertise.php" class="btn btn-danger" title="Back To Manage Advertisements">
                                     Back To Manage Advertisements
                                </a>
                            </form>
                        <? endif; ?>
                    </div>
                </div>
            </div>
        <? else: ?>
            <div class="col-md-5">
                <div class="box box-solid bg-green-gradient">
                    <div class="box-header">
                        <div class="box-title clearfix" style="float:none; display:block;">
                            Subscribe New Advertisement
                        </div>
                    </div>
                    <div class="box-body text-black" style="background-color:#fff; padding:20px;">
                        <?
                            $advertTypeArr = array();
                            
                            $advertRes = mysql_query('SELECT * FROM advertisement_types WHERE isDeleted = "N" ORDER BY sOrder ASC');
                            if($advertRes && mysql_num_rows($advertRes) > 0){
                                while($advertRow = mysql_fetch_object($advertRes)){
                                    $advertTypeArr[$advertRow->atID] = stripslashes($advertRow->atName);
                                }
                            }
							
							if(isset($_POST['atID']) && (int) $_POST['atID'] > 0){
								$uaName	= trim($_POST['uaName']);
								$atID	= (int) $_POST['atID'];
								
								$uaTitle	= trim($_POST['uaTitle']);
								$uaLink		= trim($_POST['uaLink']);
								
								$desFieldArr= getFields($atID, $_POST);
								$atType		= $desFieldArr['atType'];
								$atName		= $desFieldArr['atName'];
								
								$insertSql = '
									INSERT INTO user_advertisements SET 
									userID		= '.$userID.', 
									atID		= '.$atID.', 
									atType		= "'.mysql_real_escape_string($atType).'", 
									atName		= "'.mysql_real_escape_string($atName).'", 
									uaName		= "'.mysql_real_escape_string($uaName).'", 
									expiryOn	= "'.date('Y-m-d', strtotime("-1 days")).'", 
									createdOn	= "'.date('Y-m-d H:i:s').'", 
									log			= "<pre>'.date('d-m-Y H:i:s').': Advertisement Submited by User.</pre>", 
								';
								if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
									$uaDetails	= $_FILES['uaDetails'];
									$imgWidth	= $desFieldArr['imgWidth'];
									$imgHeight	= $desFieldArr['imgHeight'];
									
									if($uaDetails['tmp_name'] == ''){
										$sMsg = '<span class="bg-red">Please Select Advertisement Image.</span>';
									}else {
										list($width, $height, $type, $attr) = getimagesize($uaDetails['tmp_name']);
										
										if($type != 1 && $type != 2 && $type != 3){
											$sMsg = '<span class="bg-red">Allowed File Types are JPG | PNG | GIF.</span>';
										}else {
											$fileTypeArr = array(1 => 'gif', 2 => 'jpg', 3 => 'png');
											$newFileName = 'advertisement-'.makePermaLink($uaName).'-'.time().'.'.$fileTypeArr[$type];
											
											if(move_uploaded_file($uaDetails['tmp_name'], '../images/advertisements/'.$newFileName)){
												$insertSql .= '
													imgWidth	= '.$imgWidth.', 
													imgHeight	= '.$imgHeight.', 
													uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
													uaDetails	= "'.mysql_real_escape_string($newFileName).'", 
													uaLink		= "'.mysql_real_escape_string($uaLink).'" 
												';
											}else {
												$sMsg = '<span class="bg-red">Error on Uploading File, Please Contact Support.</span>';
											}
										}
									}
								}else if($atType == 'BL') {
									$uaDetails	= (int) $_POST['uaDetails'];
									
									$insertSql .= '
										uaDetails	= "'.$uaDetails.'" 
									';
								}else {
									$uaDetails	= trim($_POST['uaDetails']);
									
									$insertSql .= '
										uaTitle		= "'.mysql_real_escape_string($uaTitle).'", 
										uaDetails	= "'.mysql_real_escape_string($uaDetails).'", 
										uaLink		= "'.mysql_real_escape_string($uaLink).'" 
									';
								}
								
								if(!isset($sMsg)){
									if(mysql_query($insertSql)){
										$insertedID = mysql_insert_id();
										
										#Send Email to Admin
										$fullDomain = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://').$_SERVER['SERVER_NAME'];
										$adminLink = $fullDomain.'/admin/manage-user-advertisements.php?sFilter=uaName&sKeywords='.$uaName.'&sexpiryOn=&sStatus=&submitBtn=Filter+Result';
										
										require_once('../phpmailer/class.phpmailer.php');
										
										$emailMsg = '
											Domain: <strong>'.$domainOnly.'</strong><br />
											User: <strong>'.$_SESSION['user']['name'].'</strong><br />
											Advert: <strong>'.$uaName.' ['.$atName.']</strong><br />
											<br />
											<a href="'.$adminLink.'">Login to admin to approve</a>.<br />
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
											$mail->SMTPAuth	= true;
											$mail->Host		= $smtpHost;
											$mail->Port		= $smtpPort;
											$mail->Username	= $smtpUser;
											$mail->Password	= $smtpPass;
											
											$mail->SetFrom('no-reply@'.$domainOnly, $smtpFromName);
											$mail->Subject = 'User Submitted an Advert on '.$domainOnly;
											$mail->MsgHTML($emailMsg);
											
											$mail->AddAddress($settings[1], 'info');
											//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
											
											if(!$mail->Send()) {
												//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
											} else {
												//echo 'Email Sent Successfully';
											}
										}else {
											#Send Email to Info Start
											$mail = new PHPMailer();
											$mail->CharSet = "UTF-8";
											$mail->SetFrom('no-reply@'.$domainOnly, $smtpFromName);
											$mail->Subject	= 'User Submitted an Advert on '.$domainOnly;
											$mail->MsgHTML($emailMsg);
											
											$mail->AddAddress($settings[1], 'info');
											//$mail->AddAddress('rkaartikeyan@gmail.com', 'Karthikeyan Raju');
											
											if(!$mail->Send()){
												//echo '<span class="error">Business Listing Expire in Next 30 Days: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
											}else{
												//echo 'Email Sent Successfully';
											}
										}
										#End
										
										header('Location: /user/manage-advertise.php?paynow=y&id='.$insertedID);
									}else {
										$sMsg = '<span class="bg-red">Error on Inserting Record, Please Contact Support.</span>';
										
										#Deleted Uploaded File
										if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
											if(file_exists('../images/advertisements/'.$newFileName)){
												unlink('../images/advertisements/'.$newFileName);
											}
										}
										#End
									}
								}
								
							}else {
								$uaName		= '';
								$atID		= '';
								$desFieldArr= array(
									'atDescription' => '',
									'uaFields'		=> ''
								);
							}
                        ?>
                        <form action="" method="post" id="subscribeNewAdvert" enctype="multipart/form-data">
                            <? if(isset($sMsg)): ?><div class="sMsg"><?=$sMsg?></div><? endif; ?>
                            
                            <label for="uaName">Name Your Advertisement *</label>
                    		<input type="text" class="form-control" name="uaName" id="uaName" value="<?=$uaName?>" required="required" />
                            
                            <label for="atID">Select Advertisement Type *</label>
                            <select class="form-control showAdvertDescriptions" name="atID" id="atID" data-a="loadAdvertDetails" data-url="<?=$formPostUrl?>" required="required">
                                <option value="">Select a Type</option>
                                <? foreach($advertTypeArr as $key => $val): ?>
                                <? if($atID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                                <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                                <? endforeach; ?>
                            </select>
                            
                            <div id="atDescription"><?=$desFieldArr['atDescription']?></div>
                            
                            <div id="uaFields"><?=$desFieldArr['uaFields']?></div>
                            
                            <button type="submit" name="submitBtn" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        <? endif; ?>
    </div>
    
    <?
	$footerscript = '
    <script type="text/javascript">
		$(document).on("change", ".showAdvertDescriptions", function(event){
			var thisE	= $(this);
			var action	= $(this).data("a");
			var url		= $(this).data("url");
			var id		= $(this).val();
			
			if(id != ""){
				$.ajax({
					url: url,
					type: "POST",
					data: "a="+action+"&id="+id, 
					success:function(jSonData, textStatus, jqXHR){
						console.log(jSonData);
						var data = jSonData;
						
						if(typeof data.msg != "undefined"){
							showAlert(data.msg);
						}
						
						if(typeof data.html != "undefined"){
							$.each(data.html, function(id, content){
								$("#"+id).html(content);
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						showAlert("Error on Submitting Form.");
					}
				});
			}else {
				$("atDescription").html("");
			}
		});
	</script>
	';
	?>
<? require_once('includes/footer.php'); ?>