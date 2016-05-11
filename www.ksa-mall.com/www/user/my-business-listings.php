<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	$header = array(
		'siteTitle' => 'My Business Listings', 
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'My Business Listings')
		)
	);
	
	$userID = $_SESSION['user']['userID'];
	
	$formPostUrl = 'my-business-listings-post.php';
	
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
				$fcatList .= '<option value="'.$clscRow->catID.'" data-sort="'.$clcount.'">'.stripslashes($clscRow->catName).'</option>';
			}
		}
		$fcatList .= '</optgroup>';
		$clcount++;
	}
?>

<? require_once('includes/header.php'); ?>
	<?
		if(isset($_REQUEST['scatID']) || isset($_REQUEST['sbusinessName'])){
			$scatID			= (int) $_REQUEST['scatID'];
			$sbusinessName	= trim($_REQUEST['sbusinessName']);
			$sexpiryOn		= trim($_REQUEST['sexpiryOn']);
		}else {
			$scatID			= '';
			$sbusinessName	= '';
			$sexpiryOn		= '';
		}
		
		if(isset($_REQUEST['subCatID'])){
			$scatID = (int) $_REQUEST['subCatID'];
		}
	?>
	<!-- Modal -->
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
                                <th>Image Path</th>
                                <th>Alt Tag</th>
                                <th class="hidden-sm hidden-md" width="170">Sort Order</th>
                                <th style="width: 50px">
                                	<label><input type="checkbox" class="checkUncheck" data-class="imgcheck" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="left">
                                	<input type="text" class="form-control" id="aimgurl" style="display:inline-block; width:90%;" />
                    				<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgurl" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                                </td>
                                <td colspan="1" align="left">
                                	<button type="button" class="btn btn-sm btn-success nonFormPost" data-f="aimgurl" data-a="addImageUrl" data-u="<?=$formPostUrl?>" data-at="Please Enter Image Url" data-wf="ilistingID" data-numbering="imageRow" data-column="1">Add Image Url</button>
                                </td>
                                <td colspan="2" align="right">
                                	<button type="submit" name="saveAll" class="btn btn-sm btn-success">Save</button>
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
                    <form action="my-business-listings.php" method="get">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div class="col-lg-3">
                                    <select class="form-control" name="scatID">
                                    	<option value="">All Categories</option>
										<?=$fcatList?>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" name="sbusinessName" id="sbusinessName" class="form-control" placeholder="Enter Business Name" value="<?=$sbusinessName?>" />
                                </div>
                                <div class="col-lg-2">
                                	<input type="text" name="sexpiryOn" id="sexpiryOn" class="form-control datePicker"  data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" placeholder="Expiry" value="<?=$sexpiryOn?>" style="text-align:center;" />
                                </div>
                                <div class="col-lg-3">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="my-business-listings.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
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
                            <?php /*?>
							<button class="btn btn-info addPopup" data-w="addListingWindow">Add New</button>
							<?php */?>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="listingTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sub Category</th>
                                <th>Name</th>
                                <th width="80">Visits</th>
                                <th width="80">Likes</th>
                                <th width="150">Expiry Date</th>
                                <th width="150">Status</th>
                                <th style="width: 250px">Actions</th>
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
									WHERE bl.userID = '.$userID.' 
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
								
								$sql .= 'ORDER BY bl.expiryOn ASC';
								
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
                                <td width="80"><?=$row->visited?></td>
                                <td width="80"><?=$row->liked?></td>
                                <td width="150">
								<div class="pull-left" style="width:70%">
                                <?=date('d-m-Y', strtotime($row->expiryOn))?>
                                </div>
                                <div class="pull-right" style="width:25%;" id="expiryDiv_<?=$listingID?>"></div>
                                </td>
                                <td width="150">
								<div class="pull-left" style="width:70%">
                                	<?=$statusArr[$row->status]?>
                                </div>
                                <div class="pull-right" style="width:25%;" id="sTatus_<?=$listingID?>"></div>
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-warning editBtn" data-id="<?=$listingID?>" title="Videos" data-a="getListingVideos" data-u="<?=$formPostUrl?>" data-w="editListingVideoWindow">
                                <i class="glyphicon glyphicon-expand"></i> Video
                                </button>
                                <button type="button" class="btn btn-sm btn-success editBtn" data-id="<?=$listingID?>" title="Images" data-a="getListingImages" data-u="<?=$formPostUrl?>" data-w="editListingImageWindow">
                                <i class="glyphicon glyphicon-picture"></i> Images
                                </button>
                                <a href="edit-business-listings.php?listingID=<?=$listingID?>" class="btn btn-sm btn-primary" title="Edit Business Listing">
                                <i class="glyphicon glyphicon-edit"></i> Edit
                                </a>
                                <?php /*?>
                                <? if($row->status == 'P'): ?>
                                <a href="pay-listing.php?listingID=<?=$listingID?>" class="btn btn-sm btn-danger" title="Pay Business Listing">
                                <i class="fa fa-credit-card"></i> Pay Now
                                </a>
                                <? elseif($row->status == 'A'): ?>
                                <a href="renew-listing.php?listingID=<?=$listingID?>" class="btn btn-sm btn-info" title="Pay Business Listing">
                                <i class="glyphicon glyphicon-refresh"></i> Renew
                                </a>
                                <? endif; ?>
                                <?php */?>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="8" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="5" align="right">
                                	
                                </td>
                                <td colspan="1" align="right">
                                
                                </td>
                            </tr>
                            </tfoot>
                        </table>
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