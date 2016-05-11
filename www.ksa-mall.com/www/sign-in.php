<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');

	if(array_key_exists('userID', $_SESSION)){
	   header('Location: /user/profile.php');
	   exit;
	}
	
	if(array_key_exists('action', $_REQUEST) && $_REQUEST['action'] == "verify"){
		$insertSql = '
			UPDATE users SET 
			 status      = "A"
			WHERE md5(userID) = "'.$_GET['uid'].'"';
	
		mysql_query($insertSql);
		$frmResponse = "<div class='alert-box success'><span>Success: </span>Congratuations!! your email address is verified now.</div>";
	}else if(array_key_exists('password', $_REQUEST) && $_REQUEST['password'] == "reset"){
		$frmResponse = "<div class='alert-box success'><span>Success: </span>Passwords updated successfully.</div>";
	}else{
		$frmResponse = '';
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit'] == "password"){        
			$Sql = '
				SELECT userID, fullname, email FROM users WHERE 
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
	
					If you have questions, please don’t hesitate to give us a call. We’re here to help
					</div>
				";
				sendEmail($systemEmailAddress, $Row->email, "Password Recovery Email", $message);
				
				$frmResponse = '<div class="alert-box success">Password reset email sent to your email address.</div>';
				
			}else{
				$frmResponse = '<div class="alert-box error"><span>error: </span>Sorry! No such email address found.</div>';
			}        
		}
	
		if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit'] == "signin"){
			
			$Sql = '
				SELECT userID, fullname, email, password, profileImg FROM users WHERE 
				email         = "'.mysql_real_escape_string($_POST['form-sign-in-email']).'"  
				AND status = "A" 
			';
			
			//echo $Sql;
			
			$Res = mysql_query($Sql);
			if(mysql_num_rows($Res) > 0){
				$Row = mysql_fetch_object($Res);
				
				if($Row->password == encrypt($_POST['form-sign-in-password'])){
					$_SESSION['userID'] = $Row->userID;
					
					$_SESSION['user']['userID']		= $Row->userID;
					$_SESSION['user']['name']		= $Row->fullname;
					$_SESSION['user']['email']		= $Row->email;
					$_SESSION['user']['profileImg']	= $row->profileImg;
					
					$updSql = 'UPDATE users SET lastLoggedIn = "'.date('Y-m-d H:i:s').'" WHERE userID = '.$Row->userID;
					mysql_query($updSql) or die(mysql_error());
					header('Location: /user/index.php');
					exit;
				}else {
					$frmResponse = '<div class="alert-box error"><span>error: </span>Invalid Password, Please Enter right Password.</div>';
				}
			}else{
				$frmResponse = '<div class="alert-box error"><span>error: </span>Sorry! Entered Email is not Registered with Us.</div>';
			}
		}
	}
	
	$isError = false;
	
	$breadcrumb = array(
		array('url' => 'sign-in.php', 'text' => "Sign In")
	);
	
	$header = array(
		'siteTitle' => "Sign In with Lebanon", 
		'pageTitle' => "Sign In", 
		'keywords'  => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
		'desc'      => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
		'pageClass' => 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent' => "", 
		'breadcrumb'=> $breadcrumb
	);
?>
<?php require_once('includes/site-header.php'); ?>
<div class="center">
    <hr>
    <form style="display:none" role="form" id="form-password" method="post" action="sign-in.php">
        <?php echo $frmResponse; ?>
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

    <form role="form" id="form-sign-in-account" method="post" action="sign-in.php">
        <?php echo $frmResponse; ?>
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
            <button type="button" class="btn pull-left btn-default" id="forgot-password">Forgot Password?</button>
            <button type="submit" class="btn pull-right btn-default" id="account-submit">Sign In</button>
        </div><!-- /.form-group -->
    </form>
</div>
<?php require_once('includes/site-footer.php'); ?>