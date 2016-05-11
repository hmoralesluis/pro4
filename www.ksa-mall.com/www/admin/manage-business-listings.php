<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage Business Listings', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'users-&-listings',
		'cMenu'		=> 'manage-business-listings', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Business Listings')
		)
	);
	$date  = date('Y-m-d');
   	$nexty = date('d-m-Y', strtotime("+12 months $date"));
	
	$formPostUrl = 'manage-business-listings-post.php';
	$filterArr = array('businessName' => 'Business Name', 'email' => 'User Email', 'location' => 'Location');
	
	if(isset($_REQUEST['scatID']) || isset($_REQUEST['sbusinessName']) || isset($_REQUEST['sfeatured'])){
		$scatID			= (int) $_REQUEST['scatID'];
		$sbusinessName	= trim($_REQUEST['sbusinessName']);
		$sexpiryOn		= trim($_REQUEST['sexpiryOn']);
	    $sfeatured		= trim($_REQUEST['sfeatured']);
	}else {

		$scatID			= '';
		$sbusinessName	= '';
		$sexpiryOn		= '';
		$sfeatured		= '';
	}
	
	if(isset($_REQUEST['subCatID'])){
		$scatID = (int) $_REQUEST['subCatID'];
	}
	
	$userArr = array();
	$userRes = mysql_query('SELECT * FROM users WHERE status = "A" ORDER BY email ASC');
	if(mysql_num_rows($userRes) > 0){
		while($userRow = mysql_fetch_object($userRes)){
			$userArr[$userRow->userID] = stripslashes($userRow->email.' ('.$userRow->fullname.')');
		}
	}
	
	$catArr = array();
	$catRes = mysql_query('SELECT * FROM category WHERE parentID = 0 ORDER BY sOrder ASC');
	if(mysql_num_rows($catRes) > 0){
		while($catRow = mysql_fetch_object($catRes)){
			$catArr[$catRow->catID] = stripslashes($catRow->catName);
		}
	}
	
	$subCatArr = array();
	if($catID > 0 && isset($catArr[$catID])){
		$subCatSql = 'SELECT * FROM category WHERE parentID = '.$catID.' ORDER BY sOrder ASC';
		$subCatRes = mysql_query($subCatSql);
		if(mysql_num_rows($subCatRes) > 0){
			while($subCatRow = mysql_fetch_object($subCatRes)){
				$subCatArr[$subCatRow->catID] = stripslashes($subCatRow->catName);
			}
		}
	}
	
	$fcatList = '';
	$catList = '';
	$clcount = 1;
	foreach($catArr as $clcatID => $clcatName){
		$fcatList .= '<optgroup label="'.$clcatName.'">';
		$catList .= '<option value="" data-sort="'.$clcount.'">'.$clcatName.'</option>';
		$clscRes = mysql_query('SELECT * FROM category WHERE parentID = '.$clcatID.' ORDER BY sOrder ASC');
		if(mysql_num_rows($clscRes) > 0){
			while($clscRow = mysql_fetch_object($clscRes)){
				$clcount++;
				$catList .= '<option value="'.$clscRow->catID.'" data-sort="'.$clcount.'">&nbsp;&nbsp;- '.stripslashes($clscRow->catName).'</option>';
				
				if($scatID == $clscRow->catID){
					$fclSelected = ' selected="selected"';
				}else {
					$fclSelected = '';
				}
				$fcatList .= '<option value="'.$clscRow->catID.'" data-sort="'.$clcount.'"'.$fclSelected.'>'.stripslashes($clscRow->catName).'</option>';
			}
		}
		$fcatList .= '</optgroup>';
		$clcount++;
	}
?>
<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addListingWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Business Listing</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="listingRow" data-column="1" class="afs" id="addBusinessListingForm">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addListing" />
                    <input type="hidden" name="fa" value="Add" data-tableid="listingTable" />

                    <label for="afeatured">Mark this list item as featured: </label>
                    <input type="checkbox" class="simple" name="afeatured" id="afeatured" value="1">
                    </br>
                	
                    <label for="aemail">User Email (Optional)</label>
                    <input type="email" class="form-control" name="aemail" id="aemail" value="" />
                    
                    <label for="apassword">Password (Optional)</label>
                    <input type="text" class="form-control" name="apassword" id="apassword" value="" />

                    <div class="row">
                        <div class="col-md-6">
                        <label for="catLists">Categories</label>
                        <select class="form-control swapesoption" data-swapid="asubCatIDs" id="catLists" data-sort="N" data-targetselect="Y" data-selectremaining="N" multiple="multiple" style="height:170px;">
                            <?=$catList?>
                        </select>
                        </div>
                        
                        <div class="col-md-6">
                        <label for="asubCatIDs">Sub Categories *</label>
                        <select class="form-control swapesoption removesoptions" data-swapid="catLists" name="asubCatIDs[]" id="asubCatIDs" data-sort="Y" data-targetselect="N" data-selectremaining="Y" multiple="multiple" required="required" style="height:170px;">
                            
                        </select>
                        </div>
                    </div>
                    
                    <label for="abusinessName">Business Name *</label>
                    <input type="text" class="form-control" name="abusinessName" id="abusinessName" value="" required="required" />
                    <div class="row">
                    	<div class="col-md-12">
                            <label for="alogo" style="display:block;">Logo (Optional)</label>
                            <input type="text" class="form-control" name="alogo" id="alogo" style="display:inline-block; width:90%;"  />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="alogo" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                         </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                            <label for="aimgPath" style="display:block;">Image (Optional)</label>
                            <input type="text" class="form-control" name="aimgPath" id="aimgPath" style="display:inline-block; width:90%;" />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                         </div>
                    </div>
                    
                    <label for="aaddress">Address (Optional)</label>
                    <textarea class="form-control htmlEditor" name="aaddress" id="aaddress" ></textarea>
                    <br />
                    <label for="alocation">Location (Optional)</label>
                    <input type="text" class="form-control" name="alocation" id="alocation" value=""  />
                    
                    <label for="atelephone">Telephone (Optional)</label>
                    <input type="text" class="form-control" name="atelephone" id="atelephone" value="" />
                    
                    <label for="amobile">Mobile Number (Optional)</label>
                    <input type="text" class="form-control" name="amobile" id="amobile" value="" />
                    
                    <label for="abusinessEmail">Business Email (Optional)</label>
                    <input type="email" class="form-control" name="abusinessEmail" id="abusinessEmail" value=""  />
                    
                    <label for="awebsite">Website (Optional)</label>
                    <input type="text" class="form-control forceUrl" name="awebsite" id="awebsite" value="http://" />
                    <!-- Facebook url added by kavitha on 12-6-2015-->
					<label for="afacebook">Facebook (Optional)</label>
                    <input type="text" class="form-control forceUrl" name="afacebook" id="afacebook" value="http://" />
                    
                    <label>Business Location (Optional)</label>
                    <input id="aAddress" type="text" placeholder="Type Your Location Here And Find. Drag the Marker Where you want." class="form-control" />
                    <div id="aLmap" class="mapCanvas" data-form="addBusinessListingForm" data-search="aAddress"></div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                            <label for="aLmap_lat">Latitude (Optional)</label>
                            <input type="text" name="alat" id="aLmap_lat"  class="form-control" data-geo="lat" value="" />
                        </div>
                        <div class="col-md-6">
                            <label for="aLmap_lng">Lontitude (Optional)</label>
                            <input type="text" name="alng" id="aLmap_lng"  class="form-control" data-geo="lng" value="" />
                        </div>
                    </div>
                    <label for="adescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="adescription" id="adescription"></textarea>
                    <br />
                    
                    <label for="aoffer">Offer (Optional)</label>
                    <textarea class="form-control htmlEditor" name="aoffer" id="aoffer"></textarea>
                    <br />
                    <label for="aevents">Events (Optional)</label>
                    <textarea class="form-control htmlEditor" name="aevents" id="aevents"></textarea>
                    <br />
                    <label for="atags">Tags (Optional)</label>
                    <textarea class="form-control" name="atags" id="atags" placeholder="tag1, tag2, tag3"></textarea>
                    
                    <label for="aseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aseoUrl" id="aseoUrl" value="" required="required" />
                    
                    <label for="aseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="aseoTitle" id="aseoTitle" value="" />
                    
                    <label for="aseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="aseoKeywords" id="aseoKeywords"></textarea>
                    
                    <label for="aseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="aseoDesc" id="aseoDesc"></textarea>
                    
                    <label for="aexpiryOn">Expiry On *</label>
                    <input type="text" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" name="aexpiryOn" id="aexpiryOn" required  value="<?=$nexty?>"/>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Business Listing" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editListingWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Business Listing</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs" id="editBusinessListingForm">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveListing" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="listingID" id="listingID" />

                    <label for="efeatured">Mark this list item as featured: </label>

                    <input type="checkbox" class="simple" name="efeatured" id="efeatured" value="1">
                    </br>
                    
                    <label for="euserID">User *</label>
                    <select class="select2" name="euserID" id="euserID" autofocus style="display:block">
						<option value="0">Admin</option>
                        <? if(count($userArr) > 0): ?>
                        <? foreach($userArr as $key => $uDetail): ?>
                            <option value="<?=$key?>"><?=$uDetail?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <div class="row">
                        <div class="col-md-6">
                        <label for="ecatLists">Categories</label>
                        <select class="form-control swapesoption" data-swapid="esubCatIDs" id="ecatLists" data-sort="N" data-targetselect="Y" data-selectremaining="N" multiple="multiple" style="height:170px;">
                        	
                        </select>
                        </div>
                        
                        <div class="col-md-6">
                        <label for="esubCatIDs">Sub Categories *</label>
                        <select class="form-control swapesoption removesoptions" data-swapid="ecatLists" name="esubCatIDs[]" id="esubCatIDs" data-sort="Y" data-targetselect="N" data-selectremaining="Y" multiple="multiple" required="required" style="height:170px;">
                            
                        </select>
                        </div>
                    </div>
                    	
                    </select>
                    
                    <label for="ebusinessName">Business Name *</label>
                    <input type="text" class="form-control" name="ebusinessName" id="ebusinessName" value="" required="required" />
                    
                    <label for="ebusinessEmail">Business Email (Optional)</label>
                    <input type="email" class="form-control" name="ebusinessEmail" id="ebusinessEmail" value="" />
                    <div class="row">
                    	<div class="col-md-12">
                            <label for="elogo" style="display:block;">Logo (Optional)</label>
                            <input type="text" class="form-control" name="elogo" id="elogo" style="display:inline-block; width:90%;" />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="elogo" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                            <label for="eimgPath" style="display:block;">Image (Optional)</label>
                            <input type="text" class="form-control" name="eimgPath" id="eimgPath" style="display:inline-block; width:90%;" />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                         </div>
                    </div>
                    
                    <label for="eaddress">Address (Optional)</label>
                    <textarea class="form-control htmlEditor" name="eaddress" id="eaddress" ></textarea>
                    <br />
                    <label for="elocation">Location (Optional)</label>
                    <input type="text" class="form-control" name="elocation" id="elocation" value="" />
                    
                    <label for="etelephone">Telephone (Optional)</label>
                    <input type="text" class="form-control" name="etelephone" id="etelephone" value="" />
                    
                    <label for="emobile">Mobile Number (Optional)</label>
                    <input type="text" class="form-control" name="emobile" id="emobile" value="" />
                    
                    <label for="ewebsite">Website (Optional)</label>
                    <input type="text" class="form-control forceUrl" name="ewebsite" id="ewebsite" value="" />
                    <!-- Facebook url added by kavitha on 12-6-2015-->
					<label for="efacebook">Facebook (Optional)</label>
                    <input type="text" class="form-control forceUrl" name="efacebook" id="efacebook" value="" />
					
                    
                    <label>Business Location (Optional)</label>
                    <input id="eAddress" type="text" placeholder="Type Your Location Here And Find. Drag the Marker Where you want." class="form-control" />
                    <div id="eLmap" class="mapCanvas" data-form="editBusinessListingForm" data-search="eAddress"></div>
                    <br />
                    <div class="row">
                        <div class="col-md-6">
                        <label for="eLmap_lat">Latitude (Optional)</label>
                        <input type="text" name="elat" id="eLmap_lat"  class="form-control" data-geo="lat" value="" />
                        </div>
                        <div class="col-md-6">
                        <label for="eLmap_lng">Lontitude (Optional)</label>
                        <input type="text" name="elng" id="eLmap_lng" data-geo="lng" value="" class="form-control" />
                        </div>
                    </div>
                    
                    <label for="edescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="edescription" id="edescription"></textarea>
                    <br />
                    <label for="eoffer">Offer (Optional)</label>
                    <textarea class="form-control htmlEditor" name="eoffer" id="eoffer"></textarea>
                    <br />
                    <label for="eevents">Events (Optional)</label>
                    <textarea class="form-control htmlEditor" name="eevents" id="eevents"></textarea>
                    <br />
                    <label for="etags">Tags (Optional)</label>
                    <textarea class="form-control" name="etags" id="etags" placeholder="tag1, tag2, tag3"></textarea>
                    
                    <label for="eseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="" required="required" />
                    
                    <label for="eseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="" />
                    
                    <label for="eseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="eseoKeywords" id="eseoKeywords"></textarea>
                    
                    <label for="eseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="eseoDesc" id="eseoDesc"></textarea>
                    
                    <label for="eexpiryOn">Expiry On *</label>
                    <input type="text" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" name="eexpiryOn" id="eexpiryOn" value="" required="required" />
                    
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">inactive</option>
                        <option value="P">Pending</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Business Listing" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editListingImageWindow">
        <div class="popupWindow" style="min-width:90%">
            <div class="titleBar"><span>Business Listing Images</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                	<div class="pull-left" style="width:60%">
                    	<div class="sMsg"></div>
                    </div>
                    <div class="pull-right" style="width:30%; text-align:right;">
                    	<button class="btn btn-success browseFile" data-f="aSI" data-m="true" title="Browse File">Add Images</button>
                    </div>
                	<form action="<?=$formPostUrl?>" method="post" data-numbering="imageRow" data-column="1" class="multipleRowAction" data-check="imgcheck">
                        <input type="hidden" name="a" value="actionForMultipleImages" />
                        <input type="hidden" name="ilistingID" id="ilistingID" value="" />
                        <table class="table table-striped" id="imageTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th style="text-align:center">Image</th>
								<!-- caption removed by kavitha on 10/06/2015 -->
                                <th>Alt Tag</th>
                                <th class="hidden-sm hidden-md" width="200">Sort Order</th>
                                <th style="width: 50px">
                                	<label><input type="checkbox" class="checkUncheck" data-class="imgcheck" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tfoot>
                            <tr><!-- Alignment changes done by kavitha for add image thumbs on 11/06/15-->
                                <td colspan="3" align="left">
                                	<input type="text" class="form-control" id="aimgurl" style="display:inline-block; width:80%;" />
                    				<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgurl" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;
									<button type="button" class="btn btn-sm btn-success nonFormPost" data-f="aimgurl" data-a="addImageUrl" data-u="<?=$formPostUrl?>" data-at="Please Enter Image Url" data-wf="ilistingID" data-numbering="imageRow" data-column="1">Add Image Url</button>
                                </td>
                                <td colspan="1" align="left">
                                	<button type="submit" name="saveAll" class="btn btn-sm btn-success">Save</button>
								</td>	
								<td colspan="1" align="left">
                                    <button type="submit" name="deleteAll" class="btn btn-sm btn-danger">Delete Selected</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
					</form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editListingVideoWindow">
        <div class="popupWindow" style="min-width:90%">
            <div class="titleBar"><span>Business Listing Videos</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                	<div class="pull-left" style="width:60%">
                    	<div class="sMsg"></div>
                    </div>
                    <div class="pull-right" style="width:30%; text-align:right;">
                    	
                    </div>
                    
                	<form action="<?=$formPostUrl?>" method="post" data-numbering="videoRow" data-column="1" class="multipleRowAction" data-check="videocheck">
                        <input type="hidden" name="a" value="actionForMultipleVideos" />
                        <input type="hidden" name="vlistingID" id="vlistingID" value="" />
                        <table class="table table-striped" id="videoTable">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Youtube Video Url</th>
                                    <th class="hidden-sm hidden-md" width="170">Sort Order</th>
                                    <th style="width: 50px">
                                    	<label><input type="checkbox" class="checkUncheck" data-class="videocheck" /></label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="left">
                                        <input type="text" class="form-control" id="avideo" />
                                    </td>
                                    <td colspan="1" align="left">
                                        <button type="button" class="btn btn-sm btn-success nonFormPost" data-f="avideo" data-a="addVideoUrl" data-u="<?=$formPostUrl?>" data-at="Please Enter Video Url" data-wf="vlistingID" data-numbering="videoRow" data-column="1">Add Video</button>
                                    </td>
                                    <td colspan="1" align="right">
                                        <button type="submit" name="deleteAll" class="btn btn-sm btn-danger">Delete All</button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
					</form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
        	
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg">Search</h5>
                        </div>
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <form action="manage-business-listings.php" method="get">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div class="col-lg-3">
                                    <select class="form-control" name="scatID">
                                    	<option value="">All Categories</option>
										<?=$fcatList?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="sbusinessName" id="sbusinessName" class="form-control" placeholder="Enter Business Name" value="<?=$sbusinessName?>" />
                                </div>
                                <div class="col-lg-2">
                                	<input type="text" name="sexpiryOn" id="sexpiryOn" class="form-control datePicker"  data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" placeholder="Expiry" value="<?=$sexpiryOn?>" style="text-align:center;" />
                                </div>
                                <div class="col-lg-2">
                                <label for="sfeatured">Featured</label>
                             
                                    <input type="checkbox" name="sfeatured" id="sfeatured" class="form-control"  value="1"   />
                                </div>
                                <div class="col-lg-3">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="manage-business-listings.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix" style="padding-bottom:15px;"></div>
            </div>
            
            
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg" ></h5>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-info addPopup" data-w="addListingWindow">Add New</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                    	<form action="<?=$formPostUrl?>" method="post" data-numbering="ChannelRow" data-column="1" class="multipleRowAction" data-check="check">
                        <input type="hidden" name="a" value="multipleActionForListings" />
                        <input type="hidden" name="sexpiryOn" value="<?=$sexpiryOn?>" />
                        <table class="table table-striped" id="listingTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sub Category</th>
                                <th>Name</th>
                                <th width="150">Expiry Date</th>
                                <th width="100">Sort</th>
                                <th width="150">Status</th>
                                <th colspan="2">Featured</th>
                                <th style="width: 210px">Actions</th>
                                <th style="width: 50px">
                                	<label><input type="checkbox" class="checkUncheck" data-class="check" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT bl.*, 
								';
								
								/*if($catID > 0){
									$sql .= '
										(
											SELECT c1.catName FROM category AS c1 WHERE c1.catID = '.$catID.' 
										) AS catNames, 
									';
								}else {
									$sql .= '
										(
											SELECT GROUP_CONCAT(c1.catName) FROM category AS c1 WHERE 1 = 1  
											AND FIND_IN_SET(c1.catID, bl.catIDs) 
										) AS catNames, 
									';
								}*/
								
								if($subCatID > 0 && isset($subCatArr[$subCatID])){
									$sql .= '
										(
											SELECT c2.catName FROM category AS c2 WHERE c2.catID = '.$subCatID.' 
										) AS subCatNames
									';
								}else {
									$sql .= '
										(
											SELECT GROUP_CONCAT(c2.catName) FROM category AS c2 WHERE 1 = 1  
											AND FIND_IN_SET(c2.catID, bl.subCatIDs) 
										) AS subCatNames
									';
								}
								
								$sql .= '
									FROM businesslistings AS bl 
									WHERE bl.listingID = listingID
								'; 
								if($scatID > 0){
									$sql .= 'AND FIND_IN_SET('.$scatID.', bl.subCatIDs) ';
									$isFilter = true;
								}
								
								if($sbusinessName != ''){
									$sql .= 'AND `bl`.`businessName` LIKE "%'.mysql_real_escape_string($sbusinessName).'%" ';
									$isFilter = true;
								}
								
								if($sexpiryOn != ''){
									$sql .= 'AND `bl`.`expiryOn` <= "'.date('Y-m-d', strtotime($sexpiryOn)).'"';
									$isFilter = true;
								}
								if($sfeatured ==1){
									$sql .= 'AND `bl`.`featured`=1 ';
									$isFilter = true;
								}
								
								$sql .= 'ORDER BY bl.sOrder ASC';
								
								//echo $sql;
								
								$totalRows = mysql_num_rows(mysql_query($sql));
								$limit = 50;
								
								if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
									$offset = ($_REQUEST['pageNo'] - 1);
								}else {
									$offset = 0;
								}
								
								if(!isset($_REQUEST['viewall'])){
									$sql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
								}
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $listingID = $row->listingID; ?>
                            <tr class="listingRow" id="listingRow_<?=$listingID?>">
                                <td><?=$sNo?></td>
                                <td id="td_sC_<?=$listingID?>" width="300"><?=stripslashes($row->subCatNames)?></td>
                                <td id="td_bN_<?=$listingID?>"><?=stripslashes($row->businessName)?></td>
                                <td width="150">
								<div class="pull-left" style="width:70%">
                                <input type="text" class="form-control datePicker onblurUpdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" value="<?=date('d-m-Y', strtotime($row->expiryOn))?>" data-a="updateExpiry" data-ids="<?=$listingID?>" data-url="<?=$formPostUrl?>" style="text-align:center;" id="expiryInput_<?=$listingID?>" />
                                </div>
                                <div class="pull-right" style="width:25%;" id="expiryDiv_<?=$listingID?>"></div>
                                </td>
                                <td width="100">
                                	<div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$listingID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$listingID?>"></div>
                                </td>
                                <td width="150">
                                    <div class="pull-left" style="width:70%">
                                        <select class="form-control updateSelect" id="uStatusSelect_<?=$listingID?>" data-url="<?=$formPostUrl?>" data-a="updateStatus" data-wid="<?=$listingID?>" data-resultprefix="sTatus_">
                                            <? if($row->status == 'A'){$selected='selected="selected"';}else{$selected='';} ?>
                                            <option value="A" <?=$selected?>>Active</option>
                                            <? if($row->status == 'D'){$selected='selected="selected"';}else{$selected='';} ?>
                                            <option value="D" <?=$selected?>>inactive</option>
                                            <? if($row->status == 'P'){$selected='selected="selected"';}else{$selected='';} ?>
                                            <option value="P" <?=$selected?>>Pending</option>
                                        </select>
                                    </div>
                                    <div class="pull-right" style="width:25%;" id="sTatus_<?=$listingID?>"></div>
                                </td>
                                <td width="10">
									<div class="pull-left" style="width:10%">
										<? if($row->featured == '1'){$checked='checked="checked"';}else{$checked='';} ?>
										<input type="checkbox" class="make-featured simple" id="uFeatured_<?=$listingID?>" value="<?=$row->featured?>" <?=$checked?> data-url="<?=$formPostUrl?>" data-a="updatefeatured" data-id="<?=$listingID?>" data-resultprefix="sfeatured_" />
									</div>
									<div class="pull-right" style="width:79%;" id="sfeatured_<?=$listingID?>">
                                    	
                                    </div>
                                </td>
                                <td width="150">
                                	<div class="pull-left" style="width:80%">
										<? if($row->featuredExpiry != ''){$featuredExpiry = date('d-m-Y', strtotime($row->featuredExpiry));}else{$featuredExpiry = '';} ?>
                                        <input type="text" class="form-control datePicker onblurUpdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" value="<?=$featuredExpiry?>" data-a="updateFeatureExpiry" data-ids="<?=$listingID?>" data-url="<?=$formPostUrl?>" style="text-align:center;" id="featureExpiryInput_<?=$listingID?>" />
                                    </div>
                                    <div class="pull-right" style="width:20%;" id="featureExpiryDiv_<?=$listingID?>">&nbsp;</div>
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-warning editBtn" data-id="<?=$listingID?>" title="Videos" data-a="getListingVideos" data-u="<?=$formPostUrl?>" data-w="editListingVideoWindow">
                                <i class="glyphicon glyphicon-expand"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-success editBtn" data-id="<?=$listingID?>" title="Images" data-a="getListingImages" data-u="<?=$formPostUrl?>" data-w="editListingImageWindow">
                                <i class="glyphicon glyphicon-picture"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$listingID?>" data-a="getListing" data-u="<?=$formPostUrl?>" data-w="editListingWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$listingID?>" data-a="delListing" data-u="<?=$formPostUrl?>" data-at="Listing" data-numbering="listingRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                                <td><label><input type="checkbox" class="check" name="listings[]" value="<?=$listingID?>" /></label></td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="9" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3" align="right">&nbsp;</td>
                                <td align="center">
                                	<input type="text"class="form-control" name="days" id="days" placeholder="No of Days" style="width:120px; margin-bottom:0px; text-align:center;" />
                                </td>
                                <td colspan="2" align="left">
                                	<button type="submit" name="updateExpiry" class="btn btn-sm btn-danger">Update Expiry</button>
                                </td>
                                <td colspan="3" align="right">
                                	<button type="submit" name="deleteAll" class="btn btn-sm btn-danger">Delete Selected</button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="pagination">
					<? createPaginationLink($totalRows, $limit, 'Y')?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
	$footerscript = '
    <script type="text/javascript">
		function receiveFiles_aSI(files){
			console.log(files);
			var ilistingID = $("#ilistingID").val();
			//alert(ilistingID);
			if(ilistingID != ""){
				$.ajax({
					type: "POST",
					data: "a=addImages&listingID="+ilistingID+"&files="+files,
					url : "'.$formPostUrl.'",
					success: function(jSonData){
						var data = jSonData;
						console.log(data);
						
						if(data.status == 0){
							$("#imageTable .errorRow").remove();
							$("#imageTable tbody").prepend(data.tbody);
						}
						
						scrollInnerDivToTop("#editListingImageWindow .inner");
						numberingRows("imageRow", 1);
						
						if(typeof data.msg != "undefined"){
							$("#editListingImageWindow .sMsg").html(data.msg);
						}
						
						if(typeof data.icheck != "undefined"){
							 $("input[type=\'checkbox\']:not(.simple), input[type=\'radio\']:not(.simple)").iCheck({
								checkboxClass: "icheckbox_minimal",
								radioClass: "iradio_minimal"
							});
						}
					}
				});
			}else {
				showAlert("Required Data Not Found, Please Contact Support.");
			}
		}
	</script>
	';
	?>
<? require_once('includes/footer.php'); ?>