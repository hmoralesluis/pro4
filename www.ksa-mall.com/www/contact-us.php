<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_POST['frmsubmit'])){
		$eCaptcha = trim($_POST['g-recaptcha-response']);
		
		$eFullname	= trim($_POST['eFullname']);
		$eEmail		= trim($_POST['eEmail']);
		$eContactNo	= trim($_POST['eContactNo']);
		$eMessage	= trim($_POST['eMessage']);
	
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=6Lf8gxsTAAAAAFnEnyDlk1oUnkk8D0hUcmnSEnUs&response='.$eCaptcha);
		$responseData = json_decode($verifyResponse);
		
		if($eFullname == ''){
			$sMsg = '<div class="alert-box error"><span>error: </span>Please Enter Full Name.</div>';
		}else if($eEmail == ''){
			$sMsg = '<div class="alert-box error"><span>error: </span>Please Enter Email.</div>';
		}else if(!isEmail($eEmail)){
			$sMsg = '<div class="alert-box error"><span>error: </span>Entered Email is not a Valid Email.</div>';
		}else if($eContactNo == ''){
			$sMsg = '<div class="alert-box error"><span>error: </span>Please Enter Contact Number.</div>';
		}else if($eMessage == ''){
			$sMsg = '<div class="alert-box error"><span>error: </span>Please Enter Your Message.</div>';
		}else if($responseData->success){
			#Send Email to Info Regard the Registration
			$infoMsg = '<table width="50" border="0" cellspacing="0" cellpadding="0">';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">Full Name</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.$eFullname.'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">Email</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.$eEmail.'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">Contact Number</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.$eContactNo.'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">Message</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.$eMessage.'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">Enquiry On</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.date('d-m-Y H:i:s').'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '<tr>';
			$infoMsg .= '<td width="80">IP Address</td>';
			$infoMsg .= '<td width="10">:</td>';
			$infoMsg .= '<td>'.$_SERVER['REMOTE_ADDR'].'</td>';
			$infoMsg .= '</tr>';
			$infoMsg .= '</table>';
			
			if(sendEmail($eEmail, $settings[1], "Enquiry from ".$domainOnly, $infoMsg)){
				$sMsg = '<div class="alert-box success"><span>success: </span>Thanks for your Enquiry, Our Support Team will Contact you.</div>';
			}else {
				$sMsg = '<div class="alert-box error"><span>error: </span>Error on Sending your Enquiry, Please try after sometimes.</div>';
			}
			#End
		}else {
			$sMsg = '<div class="alert-box error"><span>error: </span>Robot verification failed, please try again.</div>';
		}
	
	}else {
		$eFullname	= "";
		$eEmail		= "";
		$eContactNo	= "";
		$eMessage	= "";
	}
	
	$isError = false;
	
	$breadcrumb = array(
		array('url' => 'contact-us.html', 'text' => "Contact Us")
	);
	
	$header = array(
		'siteTitle' => "Contact Us", 
		'pageTitle' => "Contact Us", 
		'keywords'  => "", 
		'desc'      => "", 
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
    <form role="form" id="form-register" method="post" action="contact-us.html">
        <? if(isset($sMsg)){echo $sMsg;} ?>
        <div class="form-group">
            <label for="eFullname">Full Name *</label>
            <input type="text" class="form-control" id="eFullname" name="eFullname" value="<?=$eFullname?>" required="required" />
        </div>
        
        <div class="form-group">
            <label for="eEmail">Email *</label>
            <input type="email" class="form-control" id="eEmail" name="eEmail" value="<?=$eEmail?>" required="required" />
        </div>
        
        <div class="form-group">
            <label for="eContactNo">Contact Number *</label>
            <input type="text" class="form-control" id="eContactNo" name="eContactNo" value="<?=$eContactNo?>" required="required" />
        </div>
        
        <div class="form-group">
            <label for="item-detail-message">Message *</label>
            <textarea class="form-control framed" id="eMessage" name="eMessage"  rows="3" required="required"><?=$eMessage?></textarea>
        </div>
        
        <div class="form-group inputcaptcha-group">
            <div id="grc_div"></div>
        </div>
        <br />
        <div class="form-group clearfix" style="text-align:left;">
            <input type="hidden" name="frmsubmit" value="1" /> 
            <button type="submit" class="btn btn-default" id="account-submit">Send Enquiry</button>
        </div>
    </form>
</div>
<?php require_once('includes/site-footer.php'); ?>