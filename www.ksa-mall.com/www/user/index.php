<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Chanels')
	$header = array(
		'siteTitle' => 'Welcome '.$_SESSION['user']['name'],  
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			
		)
	);
	
	$userID = $_SESSION['user']['userID'];
	
	$formPostUrl = 'ajax-post.php';
?>
<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="contactUsWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Contact Us Form</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="bannerRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="sendEnquiry" />
                    <input type="hidden" name="fa" value="Add" />
                    
                    <label for="item-detail-name">Name</label>
                    <input type="text" class="form-control" value="<?=$_SESSION['user']['name']?>" disabled="disabled" />
                    
                    <label for="item-detail-email">Email</label>
                    <input type="email" class="form-control" value="<?=$_SESSION['user']['email']?>" disabled="disabled" />
                    
                    <label for="item-detail-email">Contact No *</label>
                    <input type="text" class="form-control" name="telephone" id="telephone" value="<?=$_SESSION['user']['telephone']?>" required="required" />
                    
                    <label for="item-detail-message">Message *</label>
                    <textarea class="form-control framed" id="eMessage" name="eMessage"  rows="3" required="required"></textarea>
                    
                    <div id="grc_div"></div>
                    <br />
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Send Enquiry" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
	<?
		$pArr = array();
		$eArr = array();
		
		$plSql = 'SELECT * FROM `businesslistings` WHERE userID = '.$userID.' AND status = "P"';
		//echo $plSql;
		$plRes = mysql_query($plSql);
		if(mysql_num_rows($plRes) > 0){
			while($plRow = mysql_fetch_object($plRes)){
				$pArr[] = array(
					'title'		=> stripslashes($plRow->businessName),
					'listedOn'	=> date('d-m-Y H:i:s', strtotime($plRow->listedOn)),
					'link'		=> ''
				);
			}
		}
		
		$elSql = 'SELECT * FROM `businesslistings` WHERE userID = '.$userID.' AND status = "A" AND expiryOn < "'.date('Y-m-d').'"';
		//echo $elSql;
		$elRes = mysql_query($elSql);
		if(mysql_num_rows($elRes) > 0){
			while($elRow = mysql_fetch_object($elRes)){
				$eArr[] = array(
					'title' 	=> stripslashes($elRow->businessName),
					'expiryOn'	=> date('d-m-Y', strtotime($elRow->expiryOn)),
					'link'		=> ''
				);
			}
		}
	?>
	<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
        	
        	<div class="row" style="margin-bottom:15px;">
            	<div class="col-xs-3">
                	<a href="/user/my-business-listings.php" title="My Business Lisgings">
                    	<img alt="My Business Lisgings Icon" src="images/1.png" />
                    </a>
                </div>
                <div class="col-xs-3">
                	<a href="/user/profile.php" title="Manage My Profile">
                    	<img alt="My Profile Icon" src="images/2.png" />
                    </a>
                </div>
                <div class="col-xs-3">
                	<a href="/user/add-business-listing.php" title="Add New Business Listing">
                    	<img alt="Add New Business Listing Icon" src="images/3.png" />
                    </a>
                </div>
                <div class="col-xs-3">
                	<a href="/user/manage-advertise.php" title="Manage Advertise">
                    	<img alt="Manage Advertise" src="images/4.png" />
                    </a>
                </div>
            </div>
            
            <div class="row" style="margin-bottom:15px;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="box box-solid bg-yellow-gradient">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Pending Items</h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-footer text-black">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="listingTable">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Title</th>
                                                <th style="width:150px;">Added On</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <? if(isset($pArr) && count($pArr) > 0): ?>
												<? $sNo = 1; ?>
                                                <? foreach($pArr as $key => $arr): ?>
                                                <tr>
                                                    <td><?=$sNo?></td>
                                                    <td><?=$arr['title']?></td>
                                                    <td style="width:150px;"><?=$arr['listedOn']?></td>
                                                </tr>
                                                <? $sNo++; ?>
                                                <? endforeach; ?>
                                            <? else: ?>
                                                <tr class="errorRow">
                                                    <td colspan="3" align="center"><span class="text-red">No Pending Items Found.</span></td>
                                                </tr>
                                            <? endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.box-footer -->
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="box box-solid bg-red">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Expired Items</h3>
                                    <div class="box-tools pull-right">
                                        
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-footer text-black">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="listingTable">
                                            <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Title</th>
                                                <th style="width:150px;">Expired On</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <? if(isset($eArr) && count($eArr) > 0): ?>
                                            <? $sNo = 1; ?>
                                            <? foreach($eArr as $key => $arr): ?>
                                                <tr>
                                                    <td><?=$sNo?></td>
                                                    <td><?=$arr['title']?></td>
                                                    <td style="width:150px;"><?=$arr['expiryOn']?></td>
                                                </tr>
												<? $sNo++; ?>
                                            <? endforeach; ?>
                                            <? else: ?>
                                            <tr class="errorRow">
                                                <td colspan="3" align="center"><span class="text-red">No Expired Items Found.</span></td>
                                            </tr>
                                            <? endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div><!-- /.box-footer -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row" style="margin-bottom:15px;">
            	<div class="col-xs-3">
                	<a href="javascript:void(0)" title="Contact Us" class="addPopup" data-w="contactUsWindow">
                    	<img alt="Contact Us Icon" src="images/7.png" />
                    </a>
                </div>
                <div class="col-xs-3">
                	<?php /*?><a href="javascript:void(0)" title="Manage Comments"><!--/user/manage-comments.php -->
                    	<img alt="Manage Comments Icon" src="images/5.png" />
                    </a><?php */?>
                </div>
                <div class="col-xs-3">
                	<?php /*?><a href="javascript:void(0)" title="Manage Reviews"><!--/user/manage-reviews.php -->
                    	<img alt="Manage Reviews Icon" src="images/6.png" />
                    </a><?php */?>
                </div>
                <div class="col-xs-3">
                	<?php /*?><a href="/user/index.php?closeAccount=y" title="Close Account" onClick="return confirm('Are you sure to Close the Account?')">
                    	<img alt="Close Account Icon" src="images/8.png" />
                    </a><?php */?>
                </div>
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="box box-solid bg-green-gradient">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest News</h3>
                    <div class="box-tools pull-right">
                        
                    </div>
                </div><!-- /.box-header -->
                <div class="box-footer text-black" style="min-height:270px;">
                    <ul class="todo-list">
                    	<? $lnRes = mysql_query('SELECT newsID, title, shortDescription  FROM user_latestnews ORDER BY addedOn DESC LIMIT 4'); ?>
                        <? if($lnRes && mysql_num_rows($lnRes) > 0): ?>
                        <? while($lnRow = mysql_fetch_object($lnRes)): ?>
                        <li>
                        	<a href="/user/view-news.php?id=<?=$lnRow->newsID?>" title="Read <?=stripslashes($lnRow->title)?>">
                            <span class="text">
                            <?=substr(stripslashes($lnRow->shortDescription), 0, 53)?>
                            <small class="label label-info"><i class="fa fa-clock-o"></i> <?=date('d-m-Y', strtotime($lnRow->addedOn))?></small>
                            </span>
                            </a>
                        </li>
                        <? endwhile; ?>
                        <li>
                        	<a href="/user/news.php" title="Read <?=stripslashes($lnRow->title)?>">
                            <span class="text">Read All News</span>
                            </a>
                        </li>
                        <? else: ?>
                        <li style="text-align:right;">
                            <span class="text">No News Found!</span>
                        </li>
                        <? endif; ?>
                    </ul>
                </div><!-- /.box-footer -->
            </div>
        </div>
    </div>
    <? $footerscript = '';?>
<? require_once('includes/footer.php'); ?>