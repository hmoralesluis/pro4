<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$isError = false;
	$seoUrl = trim($_REQUEST['seoUrl']);
	
	$pRes = mysql_query('
		SELECT p.*, 
		(SELECT pi.imgPath FROM product_imgs AS pi WHERE pi.productID = p.productID ORDER BY rand() LIMIT 1) AS imgPath 
		FROM products AS p 
		WHERE p.seoUrl = "'.mysql_real_escape_string($seoUrl).'" AND p.invoice = "Y" 
	');
	if(mysql_num_rows($pRes) > 0){
		$pRow = mysql_fetch_object($pRes);
		
		$productID = $pRow->productID;
		$imgPath	= stripslashes($pRow->imgPath);
		$siteTitle	= stripslashes($pRow->seoTitle);
		$pageTitle	= 'LES-'.$pRow->productID.' '.stripslashes($pRow->productName);
		$seoKeyword = stripslashes($pRow->seoKeywords);
		$seoDesc	= stripslashes($pRow->seoDesc);
		$breadcrumb = array(
			array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
			array('url' => '', 'text' => $pageTitle)
		);
		
		$tagArr = explode(',', stripslashes($pRow->tags));
		
		$pcArr = explode(',', stripslashes($pRow->subCatIDs));
		
		$pcRes = mysql_query('SELECT * FROM product_cat WHERE pCatID = '.$pcArr[0].' AND parentID > 0 AND status = "A"');
		if(mysql_num_rows($pcRes) > 0){
			$pcRow = mysql_fetch_object($pcRes);
		}
		
		if(strpos($imgPath, "http") === false){
			$img = 'http://'.$domain.$imgPath;
		}else {
			$img = $imgPath;
		}
		
		$itemGallery = true;
	}else {
		$isError = true;
		
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$breadcrumb = array(
			array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
			array('url' => '', 'text' => '404 ERROR!')
		);
	}
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent'	=> 'ES', 
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
	
	$openSearch = true;
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit'] == "password"){        
			$Sql = '
				SELECT userID, fullname, email, profileImg FROM users WHERE 
				email         = "'.mysql_real_escape_string($_POST['form-password-email']).'"
			';
	
			$Res = mysql_query($Sql);
		
			if(mysql_num_rows($Res) > 0){
				$Row = mysql_fetch_object($Res);
	
				$link = "http://".$domain.$siteBaseUrl."reset-password.php?uid=".md5($Row->userID);
				$message = "
					<div style='width:450px'>
					Dear ".$Row->fullname.",<br /><br />
					We have received a request to change your password.<br />
					<a href='".$link."' target='_blank'>Click here to change your password »</a><br /><br />
	
					If your email program does not support html, please copy and paste the link below into your browser. The link will take you to back on webpage allowing you to change your password.<br /><br />
					".$link." <br /><br />
	
					If you have questions, please don't hesitate to give us a call. We're here to help
					</div>
				";
				sendEmail($systemEmailAddress, $Row->email, "Password Recovery Email", $message);
				
				$sMsg = '<div class="alert-box success">Password reset email sent to your email address.</div>';
				
			}else{
				$sMsg = '<div class="alert-box error"><span>error: </span>Sorry! No such email address found.</div>';
			}        
		}
	
		if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit'] == "signin"){        
			$Sql = '
				SELECT userID, fullname, email, profileImg FROM users WHERE 
				email         = "'.mysql_real_escape_string($_POST['form-sign-in-email']).'" AND 
				password      = "'.mysql_real_escape_string(encrypt($_POST['form-sign-in-password'])).'" AND status = "A";
			';
	
			$Res = mysql_query($Sql);
		
			if(mysql_num_rows($Res) > 0){
				$Row = mysql_fetch_object($Res);
				
				if($Row == encrypt($_POST['form-sign-in-password'])){
					$_SESSION['userID'] = $Row->userID;
					
					$_SESSION['user']['userID']		= $Row->userID;
					$_SESSION['user']['name']		= $Row->fullname;
					$_SESSION['user']['email']		= $Row->email;
					$_SESSION['user']['profileImg']	= $row->profileImg;
					
					$updSql = 'UPDATE users SET lastLoggedIn = "'.date('Y-m-d H:i:s').'" WHERE userID = '.$Row->userID;
					mysql_query($updSql) or die(mysql_error());
				}else {
					$sMsg = '<div class="alert-box error"><span>error: </span>Invalid Password, Please Enter right Password.</div>';
				}
			}else{
				$sMsg = '<div class="alert-box error"><span>error: </span>Sorry! Entered Email is not Registered with Us.</div>';
			}
		}
	}
?>
<? require_once('includes/site-header.php'); ?>
	<? if($isError == false):?>
        <!--Listing Grid-->
        <section class="block equal-height" style="padding-top:0px !important;" id="e-store">
            <div class="row">
                <!--Detail Sidebar-->
                <aside class="col-md-3 col-sm-3" id="detail-sidebar">
                    <? require_once('php-includes/e-store-left-sidebar.php'); ?>
                </aside>
                <!--end Detail Sidebar-->
                <div class="col-md-9 col-sm-9">
                    <section style="margin-bottom:0px;">
                        <article class="block" style="padding-top:0px;">
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
									<section id="items">
                                        <div class="item list admin-view">
                                            <div class="image">
                                            	<? if($imgPath != ''): ?>
                                                <img src="/thumb/263-196-<?=$img?>" alt="<?=$seoKeywords?>">
                                                <? else: ?>
                                                <img src="<?=$settings[8]?>" alt="no-image">
                                                <? endif; ?>
                                            </div>
                                            <div class="wrapper">
                                                <h3><?=$pageTitle?></h3>
                                                <figure><?=stripslashes($pRow->seoDesc)?></figure>
                                            </div>
                                        </div>
                                    </section>
                                    <div class="background-color-white" style="padding:30px; margin-bottom:30px;">
                                    	<?=stripslashes($pRow->wiTemplate)?>
                                    </div>
									<section>
                                    	<? if(isset($_SESSION['userID']) && $_SESSION['userID'] > 0): ?>
                                        	<?
												$userRow = mysql_fetch_object(mysql_query('
													SELECT * FROM users WHERE userID = '.(int) $_SESSION['userID'].'
												'));
												
												if(isset($_POST['bName'])){
													$bName			= trim($_POST['bName']);
													$bEmail			= stripslashes($userRow->email);
													$bTelephone		= trim($_POST['bTelephone']);
													$bMobile		= trim($_POST['bMobile']);
													$bAddress		= trim($_POST['bAddress']);
													
													if(isset($_POST['sameAsBilling']) && $_POST['sameAsBilling'] = 'Y'){
														$sameAsBilling	= trim($_POST['sameAsBilling']);
														$sName			= $bName;
														$sEmail			= $bEmail;
														$sTelephone		= $bTelephone;
														$sMobile		= $bMobile;
														$sAddress		= $bAddress;
													}else {
														$sameAsBilling	= '';
														$sName			= trim($_POST['sName']);
														$sEmail			= trim($_POST['sEmail']);
														$sTelephone		= trim($_POST['sTelephone']);
														$sMobile		= trim($_POST['sMobile']);
														$sAddress		= trim($_POST['sAddress']);
													}
													
													mysql_query('UPDATE users SET telephone = "'.$bTelephone.'", mobile = "'.$bMobile.'" WHERE userID = '.(int) $_SESSION['userID']);
													
													if($bName == '' || $bEmail == '' || $bTelephone == '' || $bAddress == ''){
														$sMsg = '<span class="error">Please Fill Required Billing Details.</span>';
													}else if($sName == '' || $sEmail == '' || $sTelephone == '' || $sAddress == ''){
														$sMsg = '<span class="error">Please Fill Required Shipping Details.</span>';
													}else {
														$insertSql = '
															INSERT INTO product_orders SET 
															userID			= '.$userRow->userID.', 
															productID		= '.$pRow->productID.', 
															bName			= "'.mysql_real_escape_string($bName).'", 
															bEmail			= "'.mysql_real_escape_string($bEmail).'", 
															bTelephone		= "'.mysql_real_escape_string($bTelephone).'", 
															bMobile			= "'.mysql_real_escape_string($bMobile).'", 
															bAddress		= "'.mysql_real_escape_string($bAddress).'", 
															sName			= "'.mysql_real_escape_string($sName).'", 
															sEmail			= "'.mysql_real_escape_string($sEmail).'", 
															sTelephone		= "'.mysql_real_escape_string($sTelephone).'", 
															sMobile			= "'.mysql_real_escape_string($sMobile).'", 
															sAddress		= "'.mysql_real_escape_string($sAddress).'", 
															orderedOn		= "'.date('d-m-Y H:i:s').'", 
															codDetails		= "'.mysql_real_escape_string($pRow->codTemplate).'", 
															invoiceDetails	= "'.mysql_real_escape_string($pRow->eiTemplate).'", 
															log				= "<pre>Order Placed on '.date('d-m-Y H:i:s').'</pre>"
														';
														
														if(mysql_query($insertSql)){
															$orderID = mysql_insert_id();
															
															$sMsg = '<span class="success">Your Order Generated Successfully Order No: <b>'.$orderID.'</b>, Please Check your Email.</span>';
															
															#Email Start
															require_once('phpmailer/class.phpmailer.php');
															
															$infoEMsg = '<table width="500" border="1" cellspacing="2" cellpadding="5">';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Mode</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>Email Invoice</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Product ID & Url</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>LES-'.$pRow->productID.' (<a href="http://'.$domain.'/e-store/'.stripslashes($pRow->seoUrl).'.html" title="View Product">View</a>)</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Product Name</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.stripslashes($pRow->productName).'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Price</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>$ '.number_format($pRow->price, 2).'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td colspan="3">Billing Details</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Name</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.$bName.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Email</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.$bEmail.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Telephone</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.$bTelephone.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Mobile</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.$bMobile.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td width="100">Address</td>';
															$infoEMsg .= '<td width="5">:</td>';
															$infoEMsg .= '<td>'.$bAddress.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td colspan="3">Shipping Details</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>Name</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$sName.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>Email</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$sEmail.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>Telephone</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$sTelephone.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>Mobile</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$sMobile.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>Address</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$sAddress.'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '<tr>';
															$infoEMsg .= '<td>IP Address</td>';
															$infoEMsg .= '<td>:</td>';
															$infoEMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
															$infoEMsg .= '</tr>';
															$infoEMsg .= '</table>';
															
															$smtpHost		= $settings[24];
															$smtpPort		= $settings[25];
															$smtpUser		= $settings[20];
															$smtpPass		= $settings[21];
															$smtpFromName	= 'E-Store Lebanesemall';
															
															if($smtpHost != '' && $smtpPort != '' && $smtpUser != '' && $smtpPass != ''){
																#Send Email to User Start
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
																
																$mail->SetFrom('e-store@'.$domain, $smtpFromName);
																$mail->Subject	= 'Order No: '.$orderID.' '.$domain;
																$mail->MsgHTML(stripslashes($pRow->eiTemplate));
																
																$mail->AddAddress($bEmail, $bName);
																
																if(!$mail->Send()) {
																	$sMsg = '<span class="error">Send Email to User: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
																} else {
																	//$sMsg = stripslashes($pageRow->responseText);
																}
																#Send Email to User End
																
																#Send Email to Admins Start
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
																
																$mail->SetFrom($bEmail, $bName);
																$mail->Subject	= 'E-Store Order No: '.$orderID.' '.$domain;
																
																$mail->MsgHTML($infoEMsg);
																
																$mail->AddAddress($settings[1], 'Info');
																
																if(!$mail->Send()) {
																	$sMsg = '<span class="error">Send Email to Admin: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
																} else {
																	//$sMsg = stripslashes($pageRow->responseText);
																}
																#Send Email to Admins End
															}else {
																#Send Email to User Start
																$mail = new PHPMailer();
																$mail->CharSet = "UTF-8";
																$mail->SetFrom('e-store@'.$domain, $smtpFromName);
																$mail->Subject = 'Order No: '.$orderID.' '.$domain;
																$mail->MsgHTML(stripslashes($pRow->eiTemplate));
																
																$mail->AddAddress($bEmail, $bName);
																
																if(!$mail->Send()) {
																	$sMsg = '<span class="error">Send Email to User: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
																} else {
																	//$sMsg = stripslashes($pageRow->responseText);
																}
																#Send Email to User End
																
																#Send Email to Admins Start
																$mail = new PHPMailer();
																$mail->CharSet = "UTF-8";
																$mail->SetFrom($bEmail, $bName);
																$mail->Subject = 'E-Store Order No: '.$orderID.' '.$domain;
																$mail->MsgHTML($infoEMsg);
																
																$mail->AddAddress($settings[1], 'Info');
																
																if(!$mail->Send()) {
																	$sMsg = '<span class="error">Send Email to Admin: Error on Sending Request with SMTP, '.$mail->ErrorInfo.'</span>';
																} else {
																	//$sMsg = stripslashes($pageRow->responseText);
																}
																#Send Email to Admins End
															}
															#Email End
														}else {
															$sMsg = '<span class="error">Error on Generating your Order, Please Contact Support.</span>';
														}
													}
													
												}else {
													$bName			= stripslashes($userRow->fullname);
													$bEmail			= stripslashes($userRow->email);
													$bTelephone		= stripslashes($userRow->telephone);
													$bMobile		= stripslashes($userRow->mobile);
													$bAddress		= stripslashes($userRow->address.', '.$userRow->countryName);
													
													$sameAsBilling	= 'Y';
													$sName			= stripslashes($userRow->fullname);
													$sEmail			= stripslashes($userRow->email);
													$sTelephone		= stripslashes($userRow->telephone);
													$sMobile		= stripslashes($userRow->mobile);
													$sAddress		= stripslashes($userRow->address.',\n'.$userRow->countryName);
													
													$sMsg = '<span class="success">Fill Required Details...</span>';
												}
												//'<span class="success">Fill Required Details...</span>'
											?>
                                            <div class="sMsg">
											<?=$sMsg?>
                                            </div>
                                            
                                            <? if(!isset($orderID)): ?>
                                        	<form role="form" id="form-sign-in-account" method="post" action="" style="max-width:none;">
                                                <input type="hidden" name="a" value="login" />
                                                
                                                <h3>Billing Details</h3>
                                                <div class="form-group">
                                                    <label for="bName">Name *</label>
                                                    <input type="text" class="form-control" name="bName" id="bName" value="<?=$bName?>" required="required" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="bEmail">Email *</label>
                                                    <input type="email" class="form-control" name="bEmail" id="bEmail" value="<?=$bEmail?>" disabled="disabled" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="bTelephone">Telephone *</label>
                                                    <input type="text" class="form-control" name="bTelephone" id="bTelephone" value="<?=$bTelephone?>" required="required" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="bMobile">Mobile (Optional)</label>
                                                    <input type="text" class="form-control" name="bMobile" id="bMobile" value="<?=$bMobile?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                	<label for="bAddress">Address (*)</label>
                                                    <textarea class="form-control" rows="3" name="bAddress" id="bAddress" required="required"><?=$bAddress?></textarea>
                                                </div><!-- /.form-group -->
                                                <hr />
                                                
                                                <h3>
                                                	Shipping Details 
                                                    <? if($sameAsBilling == 'Y'){$checked = ' checked="checked" ';}else{$checked = '';} ?>
                                                	<small><input type="checkbox" class="sameAsBilling" name="sameAsBilling" value="Y"<?=$checked?>/> Same as Billing Address</small>
                                                </h3>
                                                <div class="form-group">
                                                    <label for="sName">Name *</label>
                                                    <input type="text" class="form-control" name="sName" id="sName" disabled="disabled" value="<?=$sName?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="sEmail">Email *</label>
                                                    <input type="email" class="form-control" name="sEmail" id="sEmail" disabled="disabled" value="<?=$sEmail?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="sTelephone">Telephone *</label>
                                                    <input type="text" class="form-control" name="sTelephone" id="sTelephone" disabled="disabled" value="<?=$sTelephone?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                    <label for="sMobile">Mobile (Optional)</label>
                                                    <input type="text" class="form-control" name="sMobile" id="sMobile" disabled="disabled" value="<?=$sMobile?>" />
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group">
                                                	<label for="sAddress">Address *</label>
                                                    <textarea class="form-control" rows="3" name="sAddress" id="sAddress" disabled="disabled"><?=$sAddress?></textarea>
                                                </div><!-- /.form-group -->
                                                
                                                <div class="form-group clearfix">
                                                    <button type="submit" class="btn pull-right btn-default">Submit</button>
                                                </div><!-- /.form-group -->
                                            </form>
                                            
                                            <script type="text/javascript">
												$(document).on('click', '.sameAsBilling', function(event){
													console.log('Function Triggered.'+$(this).is(":checked"));
													
													if($(this).is(":checked")){
														$('#sName').val($('#bName').val());
														$("#sName").prop('disabled', true);
														$("#sName").prop("required", false);
														
														$('#sEmail').val($('#bEmail').val());
														$("#sEmail").prop('disabled', true);
														$("#sEmail").prop("required", false);
														
														$('#sTelephone').val($('#bTelephone').val());
														$("#sTelephone").prop('disabled', true);
														$("#sTelephone").prop("required", false);
														
														$('#sMobile').val($('#bMobile').val());
														$("#sMobile").prop('disabled', true);
														
														$('#sAddress').val($('#bAddress').val());
														$("#sAddress").prop('disabled', true);
														$("#sAddress").prop("required", false);
													}else {
														$('#sName').val('');
														$("#sName").prop('disabled', false);
														$("#sName").prop("required", true);
														
														$('#sEmail').val('');
														$("#sEmail").prop('disabled', false);
														$("#sEmail").prop("required", true);
														
														$('#sTelephone').val('');
														$("#sTelephone").prop('disabled', false);
														$("#sTelephone").prop("required", true);
														
														$('#sMobile').val('');
														$("#sMobile").prop('disabled', false);
														
														$('#sAddress').val('');
														$("#sAddress").prop('disabled', false);
														$("#sAddress").prop("required", true);
													}
												});
											</script>
                                            <? endif; ?>
                                        <? else: ?>
                                            <form role="form" id="form-password" method="post" action="" style="display:none; max-width:none;">
                                                <div class="sMsg">
                                                <? if(isset($sMsg)){echo $sMsg;}?>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="form-sign-in-email">Please enter your email address:</label>
                                                    <input type="email" class="form-control" id="form-password-email" name="form-password-email" required>
                                                </div><!-- /.form-group -->       
                                                <div class="form-group clearfix">
                                                    <input type="hidden" name="frmsubmit" value="password" />
                                                    <button type="button" class="btn pull-left btn-default" id="sign-btn">Sign-In</button>
                                                    <button type="submit" class="btn pull-right btn-default" id="send-password">Send Password?</button>
                                                </div><!-- /.form-group -->
                                            </form>
                                        
                                            <form role="form" id="form-sign-in-account" method="post" action="" style="max-width:none;">
                                                <div class="sMsg">
                                                <? if(isset($sMsg)){echo $sMsg;}else{echo '<span class="alert-box error">Please Login...</span>';}?>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label for="form-sign-in-email">Email:</label>
                                                    <input type="email" class="form-control" id="form-sign-in-email" name="form-sign-in-email" required>
                                                </div><!-- /.form-group -->
                                                <div class="form-group">
                                                    <label for="form-sign-in-password">Password:</label>
                                                    <input type="password" class="form-control" id="form-sign-in-password" name="form-sign-in-password" required>
                                                </div><!-- /.form-group -->
                                                <div class="form-group clearfix">
                                                    <input type="hidden" name="frmsubmit" value="signin" />
                                                    <a href="javascript:void(0)" id="forgot-password">Forgot Password?</a>
                                                    <button type="submit" class="btn pull-right btn-default" id="account-submit">Sign In</button>
                                                </div><!-- /.form-group -->
                                            </form>
                                        <? endif; ?>
									</section>
									
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="list-group">
                                        <a href="javascript:void(0)" class="list-group-item list-group-item-danger aligh-center">Price: $ <?=number_format($pRow->price, 2)?></a>
                                        <a href="javascript:void(0)" class="list-group-item list-group-item-warning aligh-center">Send me Invoice</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                </div>
            </div>
            <!--/.row-->
        </section>
        <!--end Listing Grid-->
    <? else:?>
        <? require_once('php-includes/404.php');?>
    <? endif;?>
<? require_once('includes/site-footer.php'); ?>