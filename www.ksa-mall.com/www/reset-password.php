<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');

if (array_key_exists('userID', $_SESSION)){
   header('Location:profile.php');
   exit;
}

$frmResponse = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit']=="resetpassword"){
        
        if($_POST['cuid'] != ""){
            if($_POST['form-password'] == $_POST['form-password2']){
                $insertSql = '
                    UPDATE users SET 
                     password      = "'.mysql_real_escape_string(encrypt($_POST['form-password'])).'"
                    WHERE md5(userID) = "'.$_POST['cuid'].'"';

                mysql_query($insertSql);
                header('Location: sign-in.php?password=reset');
            }else{
                $frmResponse = "<div class='alert-box error'><span>error: </span>New Passwords don't match .</div>";                
            }
        }else{
            $frmResponse = '<div class="alert-box error"><span>error: </span>Invalid Request</div>';
        }
    }
}

$isError = false;

$breadcrumb = array(
    array('url' => 'reset-password.php', 'text' => "Reset Password")
);

$header = array(
    'siteTitle' => "Reset Password with Lebanon", 
    'pageTitle' => "Reset Password", 
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

    <form role="form" id="form-register" method="post" action="reset-password.php?uid=<?php echo $_GET['uid']; ?>">
        <?php echo $frmResponse; ?>
        <div class="form-group">
            <label for="form-register-password">Password:</label>
            <input type="password" class="form-control" id="form-password" name="form-password" onchange="validatePass(this, document.getElementById('form-password2'));" pattern=".{6,}" required title="minimum 6 characters">
        </div><!-- /.form-group -->
        <div class="form-group">
            <label for="form-register-confirm-password">Confirm Password:</label>
            <input type="password" class="form-control" id="form-password2" name="form-password2" onchange="validatePass(document.getElementById('form-password'), this);" pattern=".{6,}" required title="minimum 6 characters">
        </div><!-- /.form-group -->
        <div class="form-group clearfix">
            <input type="hidden" name="frmsubmit" value="resetpassword" />
            <input type="hidden" name="cuid" value="<?php echo $_GET['uid']; ?>" />
            <button type="submit" class="btn pull-right btn-default" id="resetpassword">Reset Password</button>
        </div><!-- /.form-group -->
    </form>
</div>




<?php require_once('includes/site-footer.php'); ?>