<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
    CheckUserSession();

$frmResponse = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit']=="profile"){
        
        $insertSql = '
            UPDATE users SET 
            email         = "'.mysql_real_escape_string($_POST['email']).'",  
            fullname      = "'.mysql_real_escape_string($_POST['name']).'",
            address         = "'.mysql_real_escape_string($_POST['address']).'",  
            countryName      = "'.mysql_real_escape_string($_POST['country']).'",
            telephone      = "'.mysql_real_escape_string($_POST['phone']).'",
            mobile         = "'.mysql_real_escape_string($_POST['mobile']).'",  
            aboutme      = "'.mysql_real_escape_string($_POST['about-me']).'"
            WHERE userID = '.$_SESSION['userID'];

        mysql_query($insertSql);
        $frmResponse = '<div class="alert-box success"><span>success: </span>Information updated.</div>';
        
    }

    if(array_key_exists('frmsubmit', $_POST) && $_POST['frmsubmit']=="password"){
        
        if($_POST['old_pass'] == encrypt($_POST['current-password'])){
            if($_POST['new-password'] == $_POST['confirm-new-password']){
                $insertSql = '
                    UPDATE users SET 
                     password      = "'.mysql_real_escape_string(encrypt($_POST['new-password'])).'"
                    WHERE userID = '.$_SESSION['userID'];

                mysql_query($insertSql);
                $frmResponse = '<div class="alert-box success"><span>success: </span>Password updated successfully.</div>';
            }else{
                $frmResponse = "<div class='alert-box error'><span>error: </span>New Passwords don't match .</div>";                
            }
        }else{
            $frmResponse = '<div class="alert-box error"><span>error: </span>your have entered wrong current password. .</div>';
        }
    }
}


$Sql = 'SELECT userID, password, email, fullname, address, countryName, telephone, mobile, aboutme, status, createdOn, lastLoggedIn, log FROM users WHERE userID = '.$_SESSION['userID'];
$Res = mysql_query($Sql) or die(mysql_error());
$Row = mysql_fetch_object($Res);

$isError = false;

$breadcrumb = array(
    array('url' => 'profile.php', 'text' => "Profile")
);

$header = array(
    'siteTitle' => "Profile with Lebanon", 
    'pageTitle' => "Profile", 
    'keywords'  => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
    'desc'      => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
    'pageClass' => 'map-fullscreen page-item-detail', //page-subpage
    'hmcurrent' => "", 
    'breadcrumb'=> $breadcrumb
);
?>
<?php require_once('includes/site-header.php'); ?>
<section class="container">
    <header>
        <ul class="nav nav-pills">
            <li class="active"><a href="profile.html"><h1 class="page-title"><?php echo $Row->fullname; ?></h1></a></li>
            <!--<li><a href="my-items.html"><h1 class="page-title">My Items</h1></a></li>-->
        </ul>
    </header>
    <div class="row">
        <div class="col-md-9">
            <form id="form-profile" role="form" method="post" action="profile.php" enctype="multipart/form-data">
                <?php echo $frmResponse; ?>
                <div class="row">
                    <!--Profile Picture-->
                    <!--
                    <div class="col-md-3 col-sm-3">
                        
                        <section>
                            <h3><i class="fa fa-image"></i>Profile Picture</h3>
                            <div id="profile-picture" class="profile-picture dropzone">
                                <input name="file" type="file">
                                <div class="dz-default dz-message"><span>Click or drop picture here</span></div>
                                <img src="assets/img/member-2.jpg" alt="">
                            </div>
                        </section>
                    </div>
                     -->
                    <!--/.col-md-3-->

                    <!--Contact Info-->
                    <div class="col-md-9 col-sm-9">
                        <section>
                            <h3><i class="fa fa-user"></i>Personal Info</h3>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $Row->fullname; ?>">
                                    </div>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-md-3-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $Row->email; ?>">
                                    </div>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-md-3-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile" pattern="\d*" value="<?php echo $Row->mobile; ?>">
                                    </div>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-md-3-->
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" pattern="\d*" value="<?php echo $Row->telephone; ?>">
                                    </div>
                                    <!--/.form-group-->
                                </div>
                                <!--/.col-md-3-->
                            </div>
                        </section>
                        <section>
                            <h3><i class="fa fa-map-marker"></i>Address</h3>
                            <div class="form-group">
                                <label for="state">Country</label>
                                <input type="text" class="form-control" id="country" name="country" value="<?php echo $Row->countryName; ?>">
                            </div>
                            <!--
                            <div class="form-group">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" value="Ohio">
                            </div>
                            
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" value="Georgetown">
                            </div>
                            
                            <div class="row">
                                <div class="col-md-8 col-sm-8">
                                    <div class="form-group">
                                        <label for="street">Street</label>
                                        <input type="text" class="form-control" id="street" name="street" value="2050 Sampson Street">
                                    </div>
                                </div>
                                
                                <div class="col-md-4 col-sm-4">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip" name="zip" pattern="\d*" value="80444">
                                    </div>
                                </div>
                            </div>
                            -->
                            <!--/.col-md-3-->
                            <div class="form-group">
                                <label for="additional-address">Address Line</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $Row->address; ?>">
                            </div>
                            <!--/.form-group-->
                        </section>
                        <section>
                            <h3><i class="fa fa-info-circle"></i>About Me</h3>
                            <div class="form-group">
                                <label for="about-me">Some Words About Me</label>
                                <div class="form-group">
                                    <textarea class="form-control" id="about-me" rows="3" name="about-me" required><?php echo $Row->aboutme; ?></textarea>
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.form-group-->
                        </section>
                        <div class="form-group">                            
                            <input type="hidden" name="frmsubmit" value="profile" />
                            <button type="submit" class="btn btn-large btn-default" id="submit">Save Changes</button>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!--/.col-md-6-->
                </div>
            </form>
        </div>
        <!--Password-->
        <div class="col-md-3 col-sm-9">
            <h3><i class="fa fa-asterisk"></i>Password Change</h3>
            <form class="framed" id="form-password" role="form" method="post" action="profile.php" >
                <div class="form-group">
                    <label for="current-password">Current Password</label>
                    <input type="password" class="form-control" pattern=".{6,}" required title="minimum 6 characters" id="current-password" name="current-password">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <label for="new-password">New Password</label>
                    <input type="password" class="form-control" id="new-password" name="new-password" onchange="validatePass(this, document.getElementById('confirm-new-password'));" pattern=".{6,}" required title="minimum 6 characters">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <label for="confirm-new-password">Confirm New Password</label>
                    <input type="password" class="form-control" id="confirm-new-password" name="confirm-new-password" onchange="validatePass(document.getElementById('confirm-password'), this);" pattern=".{6,}" required title="minimum 6 characters">
                </div>
                <!--/.form-group-->
                <div class="form-group">
                    <input type="hidden" name="old_pass" value="<?php echo $Row->password; ?>" />
                    <input type="hidden" name="frmsubmit" value="password" />
                    <button type="submit" class="btn btn-default">Change Password</button>
                </div>
                <!-- /.form-group -->
            </form>
        </div>
        <!-- /.col-md-3-->
    </div>
</section>

<?php require_once('includes/site-footer.php'); ?>