<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	$userID = $_SESSION['user']['userID'];
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Chanels')
	$header = array(
		'siteTitle' => 'Profile', 
		'loginName' => $_SESSION['user']['name'], 
		'cMenuCat'	=> 'settings',
		'cMenu'		=> 'profile', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Profile')
		)
	);
	
	$formPostUrl = 'profile-post.php';
	
	$_SESSION['uimgManagerFilePath'] = '../../../user/images/userfiles/'.$userID;
	$_SESSION['uimgManagerFileSelectPath'] = '/user/images/userfiles/'.$userID.'/';
	$_SESSION['uimgManageruploadMaxSize'] = '500K';
	
	if(isset($_REQUEST['closeAccount'])){
		$closeUserSql = '
			UPDATE users SET 
			password = "'.encrypt(getRandomString(8)).'", 
			status = "D" 
			WHERE userID = '.$userID.' 
		';
		//echo $closeUserSql;
		
		if(mysql_query($closeUserSql)){
			$closeListingsSql = '
				UPDATE businesslistings SET 
				status = "D" 
				WHERE userID = '.$userID.' 
			';
			//echo $closeListingsSql;
			
			if(mysql_query($closeListingsSql)){
				session_destroy();
				header('Location: /login.php');
				exit;
			}else {
				$sMsg = 'Unable to Close your Listings, Please Contact Support.';
			}
		}else {
			$sMsg = 'Unable to Close your Account, Please Contact Support.';
		}
	}
?>
<? require_once('includes/header.php'); ?>
	<div class="row">
        <div class="col-md-7">
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg" ></h5>
                        </div>
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div><!-- /.box-header -->
                
                <div class="box-body no-padding" style="padding-top:0px;">
                	<div class="col-lg-12">
                    	<? $userRes = mysql_query('SELECT * FROM users WHERE userID = '.$_SESSION['user']['userID']); ?>
                        <? if(mysql_num_rows($userRes) > 0): ?>
                        <? $userRow = mysql_fetch_object($userRes); ?>
                        
                        <form action="<?=$formPostUrl?>" method="post" class="afs">
                            <div class="sMsg"></div>
                            <input type="hidden" name="a" value="saveUser" />
                            <input type="hidden" name="fa" value="Edit" />
                            
                            <label for="efullName">Full Name *</label>
                            <input type="text" class="form-control" name="efullName" id="efullName" value="<?=stripslashes($userRow->fullname)?>" required="required" />
                            
                            <label for="eemail">Email *</label>
                            <input type="email" class="form-control" name="eemail" id="eemail" value="<?=stripslashes($userRow->email)?>" disabled="disabled" />
                            
                            <label for="emobile">Mobile *</label>
                            <input type="text" class="form-control" name="emobile" id="emobile" value="<?=stripslashes($userRow->mobile)?>" required="required" />
                            
                            <label for="etelephone">Phone  (Optional)</label>
                            <input type="text" class="form-control" name="etelephone" id="etelephone" value="<?=stripslashes($userRow->telephone)?>" />
                            
                            <label for="eaddress">Address *</label>
                            <textarea name="eaddress" id="eaddress" class="form-control" required="required"><?=stripslashes($userRow->address)?></textarea>
                            
                            <label for="ecountryName">Country *</label>
                            <input type="text" class="form-control" name="ecountryName" id="ecountryName" value="<?=stripslashes($userRow->countryName)?>" required="required" />
                            
                            <label for="eaboutme">Some Words About You</label>
                            <textarea name="eaboutme" id="eaboutme" class="form-control"><?=stripslashes($userRow->aboutme)?></textarea>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="eprofileImg" style="display:block;">Image (Optional)</label>
                                    <input type="text" class="form-control" name="eprofileImg" id="eprofileImg" style="display:inline-block; width:90%;" value="<?=stripslashes($userRow->profileImg)?>" />
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eprofileImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                                 </div>
                            </div>
                            
                            <label for="eoldpassword">Old Password *</label>
                            <input type="password" class="form-control" name="eoldpassword" id="eoldpassword" value="" />
                            
                            <label for="enewpassword">New Password *</label>
                            <input type="password" class="form-control" name="enewpassword" id="enewpassword" value="" />
                            
                            <label for="econfirmpassword">Confirm Password *</label>
                            <input type="password" class="form-control" name="econfirmpassword" id="econfirmpassword" value="" />
                            
                            <input type="submit" name="submitBtn" class="btn btn-success" value="Save Profile" />
                            
                            <a href="/user/index.php?closeAccount=y" class="btn btn-danger" title="Close Account" onClick="return confirm('Are you sure to Close the Account?')">
                                Close Account
                            </a>
                        </form>
                        <? endif; ?>
                	</div>
                	<div class="clearfix" style="padding-bottom:15px;"></div>
            	</div>
                
            </div>
        </div>
    </div>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>