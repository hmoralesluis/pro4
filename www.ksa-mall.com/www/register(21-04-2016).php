<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');

	$frmResponse	= '';
	$email			= "";
	$password		= "";
	$fullname		= "";
	$countryName	= "";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(array_key_exists('frmsubmit', $_POST)){
			if(($_POST['captcha'] == $_SESSION['vercode'])){
				$email		= trim($_POST['form-register-email']);
				$password	= trim($_POST['form-register-password']);
				$cpassword	= trim($_POST['form-register-confirm-password']);
				$fullname	= trim($_POST['form-register-full-name']);
				$countryName= trim($_POST['countryName']);
				
				if($email == ''){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Please Enter Email.</div>';
				}else if(!isEmail($email)){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Entered Email is not a Valid Email.</div>';
				}else if(validateRecord('users', array('email' => $email))){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Entered Email is Registered with us Already.</div>';
				}else if(!validatePassword($password)){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Password should be Alphanumeric with Special Char and min 6 Char.</div>';
				}else if($password != $cpassword){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Confirmed Password does not match.</div>';
				}else if($fullname == ''){
					$frmResponse = '<div class="alert-box error"><span>error: </span>Please Enter Full Name.</div>';
				}else {
				
					$insertSql = '
						INSERT INTO users SET 
						email         = "'.mysql_real_escape_string($email).'", 
						password      = "'.encrypt($password).'", 
						fullname      = "'.mysql_real_escape_string($fullname).'", 
						createdOn     = "'.date('Y-m-d H:i:s').'", 
						countryName	  = "'.mysql_real_escape_string($countryName).'", 
						registeredIP  = "'.$_SERVER['REMOTE_ADDR'].'", 
						log           = "<pre>User Registered From Website.</pre>"
					';
					
					if(isset($_POST['newsletter'])){
						$insertSql .= ', isNewsletterSignup = "Y" ';
					}
					
					if(mysql_query($insertSql)){
						$userID = mysql_insert_id();
						if(isset($_POST['newsletter'])){
							sendEmail($_POST['form-register-email'], "users-subscribe@".$domain, "Subscribe", "");
						} 
						
						$link = "http://".$domain."/user/"."login.php?a=v&uid=".encrypt($userID);
						$message = "
						<div style='width:450px'>
							Dear ".$_POST['form-register-full-name'].",<br /><br />
							Please click on link to verify your email address.<br />
							<a href='".$link."' target='_blank'>Click here to verify email address »</a><br /><br />
		
							If your email program does not support html, please copy and paste the link below into your browser.<br /><br />
							".$link." <br /><br />
		
							If you have questions, please don’t hesitate to give us a call. We’re here to help
							</div>
						";
						sendEmail($systemEmailAddress, $_POST['form-register-email'], "Verify your Email Address", $message);
						
						#Send Email to Info Regard the Registration
						$infoMsg = '<table width="50" border="0" cellspacing="0" cellpadding="0">';
						$infoMsg .= '<tr>';
						$infoMsg .= '<td width="80">Name</td>';
						$infoMsg .= '<td width="10">:</td>';
						$infoMsg .= '<td>'.$fullname.'</td>';
						$infoMsg .= '</tr>';
						$infoMsg .= '<tr>';
						$infoMsg .= '<td width="80">Email</td>';
						$infoMsg .= '<td width="10">:</td>';
						$infoMsg .= '<td>'.$email.'</td>';
						$infoMsg .= '</tr>';
						$infoMsg .= '<tr>';
						$infoMsg .= '<td width="80">Registered On</td>';
						$infoMsg .= '<td width="10">:</td>';
						$infoMsg .= '<td>'.date('d-m-Y H:i:s').'</td>';
						$infoMsg .= '</tr>';
						$infoMsg .= '<tr>';
						$infoMsg .= '<td width="80">Domain</td>';
						$infoMsg .= '<td width="10">:</td>';
						$infoMsg .= '<td>'.$domain.'</td>';
						$infoMsg .= '</tr>';
						$infoMsg .= '<tr>';
						$infoMsg .= '<td width="80">IP Address</td>';
						$infoMsg .= '<td width="10">:</td>';
						$infoMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
						$infoMsg .= '</tr>';
						$infoMsg .= '</table>';
						
						sendEmail($email, $settings[1], "New User Registration from ".$domain, $infoMsg);
						#End
						
						$frmResponse = '<div class="alert-box success"><span>success: </span>Please check your mail to verify email address.</div>';
						
						#Create User Directory
						if(!file_exists('user/images/userfiles/'.$userID)){
							$returnData['debug'] = 'Folder not Found!';
							
							if(!mkdir('user/images/userfiles/'.$userID)){
								//echo 'Error on Creating Folder!'.json_encode(error_get_last());
							}
						}
						#End
						
						$email			= "";
						$password		= "";
						$cpassword		= "";
						$fullname		= "";
						$countryName	= "";
					}else{
						die(mysql_error());
						$frmResponse = '<div class="alert-box error"><span>error: </span>Sorry! something went wrong, please try again later.</div>';
					}
				}
			}else{
				$email			= $_POST['form-register-email'];
				$password		= $_POST['form-register-password'];
				$cpassword		= trim($_POST['form-register-confirm-password']);
				$fullname		= $_POST['form-register-full-name'];
				$countryName	= $_POST['countryName'];
				$frmResponse	= '<div class="alert-box error"><span>error: </span>Invalid captcha entered.</div>';
			}
		}
	}
	
	$isError = false;
	
	$breadcrumb = array(
		array('url' => 'register.php', 'text' => "Register")
	);
	
	$header = array(
		'siteTitle' => "Register with Lebanon", 
		'pageTitle' => "Register", 
		'keywords'  => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
		'desc'      => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
		'pageClass' => 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent' => "", 
		'breadcrumb'=> $breadcrumb
	);
	
	$countries = array();
	$countryRes = mysql_query('SELECT countryID, countryName FROM countries ORDER BY countryName ASC');
	if(mysql_num_rows($countryRes) > 0){
		while($countryRow = mysql_fetch_object($countryRes)){
			$countries[] = $countryRow;
		}
	}
?>
<?php require_once('includes/site-header.php'); ?>


<div class="center">
    <hr>
    <form role="form" id="form-register" method="post" action="register.php">
        <?php echo $frmResponse; ?>
        <div class="form-group">
            <label for="form-register-full-name">Full Name:</label>
            <input type="text" class="form-control" id="form-register-full-name" name="form-register-full-name" value="<?php echo $fullname; ?>" required>
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="form-register-email">Email:</label>
            <input type="email" class="form-control" id="form-register-email" name="form-register-email" value="<?php echo $email; ?>" required>
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="form-register-password">Password:</label>
            <input type="password" class="form-control" id="form-register-password" name="form-register-password"  value="<?php echo $password; ?>" required title="minimum 6 characters">
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="form-register-confirm-password">Confirm Password:</label>
            <input type="password" class="form-control" id="form-register-confirm-password" name="form-register-confirm-password"  value="<?php echo $cpassword; ?>" required title="minimum 6 characters">
        </div><!-- /.form-group -->
        
        <div class="form-group">
        <label for="acountryName">Country *</label>
        <select class="form-control" name="countryName" id="countryName" required="required">
            <option value="">Select a Country</option>
            <? if(count($countries) > 0): ?>
            <? foreach($countries as $key => $row): ?>
            <? if($countryName == stripslashes($row->countryName)){$selected = ' selected="selected"';}else{$selected = '';} ?>
            <option value="<?=stripslashes($row->countryName)?>"<?=$selected?>><?=stripslashes($row->countryName)?></option>
            <? endforeach; ?>
            <? endif; ?>
        </select>
        </div>
        
        <div class="form-group inputcaptcha-group">
            <label for="captcha">Captcha:</label>
            <input type="text" id="captcha" name="captcha" class="inputcaptcha" required="required">
            <img src="<?=$siteBaseUrl?>php-includes/captcha.php" class="imgcaptcha" alt="captcha"  />
            <img src="<?=$siteBaseUrl?>assets/img/refresh.png" alt="reload" class="refresh" />
        </div>
        
        <div class="checkbox pull-left">
            <label>
                <input type="checkbox" checked name="newsletter">Receive Newsletter
            </label>
        </div>
        <div class="form-group clearfix">
            <input type="hidden" name="frmsubmit" value="1" /> 
            <button type="submit" class="btn pull-right btn-default" id="account-submit">Create an Account</button>
        </div><!-- /.form-group -->
    </form>
    <hr>

    <div class="center">
        <figure class="note">By clicking the “Create an Account” button you agree with our <a href="http://lebanesemall.com/info/terms-and-condition.html" class="link" target="_blank">Terms and conditions</a></figure>
    </div>

</div>
<?php require_once('includes/site-footer.php'); ?>