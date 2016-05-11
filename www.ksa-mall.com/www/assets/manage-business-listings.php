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
	
	$formPostUrl = 'manage-business-listings-post.php';
	$filterArr = array('businessName' => 'Business Name', 'email' => 'User Email');
	
	if(isset($_REQUEST['filter'])){
		$catID		= (int) $_REQUEST['catID'];
		$subCatID	= (int) $_REQUEST['subCatID'];
		$filter		= trim($_REQUEST['filter']);
		$value		= trim($_REQUEST['value']);
		$status		= trim($_REQUEST['status']);
		$expiryOn	= $_REQUEST['expiryOn'];
	}else {
		$catID		= '';
		$subCatID	= '';
		$filter		= '';
		$value		= '';
		$status		= '';
		$expiryOn	= '';
	}
	
	if(isset($_REQUEST['catID'])){
		$catID = (int) $_REQUEST['catID'];
	}
	if(isset($_REQUEST['subCatID'])){
		$subCatID = (int) $_REQUEST['subCatID'];
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
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addListingWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Business Listing</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner stopBgScroll">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="listingRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addListing" />
                    <input type="hidden" name="fa" value="Add" data-tableid="listingTable" />
                	
                    <label for="auserID">User *</label>
                    <select class="select2" name="auserID" id="auserID" required="required" autofocus="autofocus" style="display:block">
						<option value="">Select a User</option>
                        <? if(count($userArr) > 0): ?>
                        <? foreach($userArr as $key => $uDetail): ?>
                            <option value="<?=$key?>"><?=$uDetail?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="acatID">Category *</label>
                    <select class="form-control loadSelectOptions" name="acatID" id="acatID" data-a="loadPopupSubCats" data-url="<?=$formPostUrl?>" data-targetid="asubCatIDs" required="required">
                        <option value="">Select Category</option>
                        <? if(count($catArr) > 0): ?>
                        <? foreach($catArr as $key => $val): ?>
                            <? if($catID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                            <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="asubCatIDs">Sub Categories *</label>
                    <select class="form-control removesoptions" name="asubCatIDs[]" id="asubCatIDs" multiple="multiple" required="required">
						<? if(count($subCatArr) > 0): ?>
                        <? foreach($subCatArr as $key => $val): ?>
                            <? if($subCatIDs == $key){$selected = 'selected="selected"';}else{$selected = '';} ?>
                            <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="abusinessName">Business Name *</label>
                    <input type="text" class="form-control" name="abusinessName" id="abusinessName" value="" required="required" />
                    
                    <label for="aaddress">Address *</label>
                    <textarea class="form-control" name="aaddress" id="aaddress" required="required"></textarea>
                    
                    <label for="atelephone">Telephone (Optional)</label>
                    <input type="text" class="form-control" name="atelephone" id="atelephone" value="" />
                    
                    <label for="amobile">Mobile Number (Optional)</label>
                    <input type="text" class="form-control" name="amobile" id="amobile" value="" />
                    
                    <label for="awebsite">Website (Optional)</label>
                    <input type="text" class="form-control" name="awebsite" id="awebsite" value="" />
                    
                    <label for="adescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="adescription" id="adescription"></textarea>
                    <br />
                    
                    <label for="aoffer">Offer (Optional)</label>
                    <textarea class="form-control" name="aoffer" id="aoffer"></textarea>
                    
                    <label for="atags">Tags *</label>
                    <textarea class="form-control" name="atags" id="atags" placeholder="tag1, tag2, tag3" required="required"></textarea>
                    
                    <label for="aseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aseoUrl" id="aseoUrl" value="" required="required" />
                    
                    <label for="aseoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="aseoTitle" id="aseoTitle" value="" required="required" />
                    
                    <label for="aseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="aseoKeywords" id="aseoKeywords"></textarea>
                    
                    <label for="aseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="seoDesc" id="aseoDesc"></textarea>
                    
                    <label for="aexpiryOn">Expiry On *</label>
                    <input type="text" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" name="aexpiryOn" id="aexpiryOn" required="required" />
                    
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
            <div class="inner stopBgScroll">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveListing" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="listingID" id="listingID" />
                    
                    <label for="euserID">User *</label>
                    <select class="select2" name="euserID" id="euserID" required="required" autofocus="autofocus" style="display:block">
						<option value="">Select a User</option>
                        <? if(count($userArr) > 0): ?>
                        <? foreach($userArr as $key => $uDetail): ?>
                            <option value="<?=$key?>"><?=$uDetail?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="ecatID">Category *</label>
                    <select class="form-control loadSelectOptions" name="ecatID" id="ecatID" data-a="loadPopupSubCats" data-url="<?=$formPostUrl?>" data-targetid="esubCatIDs" required="required">
                        <option value="">Select Category</option>
                        <? if(count($catArr) > 0): ?>
                        <? foreach($catArr as $key => $val): ?>
                            <? if($catID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                            <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="esubCatIDs">Sub Categories *</label>
                    <select class="form-control removesoptions" name="esubCatIDs[]" id="esubCatIDs" multiple="multiple" required="required">
						<? if(count($subCatArr) > 0): ?>
                        <? foreach($subCatArr as $key => $val): ?>
                            <? if($subCatIDs == $key){$selected = 'selected="selected"';}else{$selected = '';} ?>
                            <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="ebusinessName">Business Name *</label>
                    <input type="text" class="form-control" name="ebusinessName" id="ebusinessName" value="" required="required" />
                    
                    <label for="eaddress">Address *</label>
                    <textarea class="form-control" name="eaddress" id="eaddress" required="required"></textarea>
                    
                    <label for="etelephone">Telephone (Optional)</label>
                    <input type="text" class="form-control" name="etelephone" id="etelephone" value="" />
                    
                    <label for="emobile">Mobile Number (Optional)</label>
                    <input type="text" class="form-control" name="emobile" id="emobile" value="" />
                    
                    <label for="ewebsite">Website (Optional)</label>
                    <input type="text" class="form-control" name="ewebsite" id="ewebsite" value="" />
                    
                    <label for="edescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="edescription" id="edescription"></textarea>
                    <br />
                    
                    <label for="eoffer">Offer (Optional)</label>
                    <textarea class="form-control" name="eoffer" id="eoffer"></textarea>
                    
                    <label for="etags">Tags *</label>
                    <textarea class="form-control" name="etags" id="etags" placeholder="tag1, tag2, tag3" required="required"></textarea>
                    
                    <label for="eseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="" required="required" />
                    
                    <label for="eseoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="" required="required" />
                    
                    <label for="eseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="eseoKeywords" id="eseoKeywords"></textarea>
                    
                    <label for="eseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="eseoDesc" id="eseoDesc"></textarea>
                    
                    <label for="eexpiryOn">Expiry On *</label>
                    <input type="text" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" name="eexpiryOn" id="eexpiryOn" value="" required="required" />
                    
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">Deactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Business Listing" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editListingImageWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Business Listing Images</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner stopBgScroll">
                <div style="padding:15px;">
                	<div class="pull-left" style="width:60%">
                    	<div class="sMsg"></div>
                    </div>
                    <div class="pull-right" style="width:30%; text-align:right;">
                    	<button class="btn btn-success browseFile" data-f="aSI" data-m="true" title="Browse File">Add Images</button>
                    </div>
                    
                	<form action="<?=$formPostUrl?>" method="post" data-numbering="ChannelRow" data-column="1" class="multipleRowAction" data-check="imgcheck">
                        <input type="hidden" name="a" value="deleteSelectedImages" />
                        <input type="hidden" name="ilistingID" id="ilistingID" value="" />
                        <table class="table table-striped" id="imageTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image Image</th>
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
                                <td colspan="4" align="right">
                                	<button type="submit" class="btn btn-sm btn-danger">Delete All</button>
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
                                    <select class="form-control loadSelectOptions" name="catID" data-a="loadSubCats" data-url="<?=$formPostUrl?>" data-targetid="subCatID">
                                    	<option value="">All Categories</option>
										<? if(count($catArr) > 0): ?>
                                        <? foreach($catArr as $key => $val): ?>
                                        	<? if($catID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                                        	<option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                                        <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <select class="form-control" name="subCatID" id="subCatID">
                                    	<? if(count($subCatArr) > 0): ?>
                                        <option value="">All Sublisting</option>
                                        <? foreach($subCatArr as $key => $val): ?>
                                        	<? if($subCatID == $key){$selected = 'selected="selected"';}else{$selected = '';} ?>
                                        	<option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                                        <? endforeach; ?>
                                        <? else: ?>
                                        <option value="">No Subcategories Found</option>
                                        <? endif; ?>
                                    </select>
                                </div>
                                
                                <div class="col-lg-2">
                                	<div class="input-group" style="margin-bottom:10px;">
                                        <div class="input-group-addon">
                                        	<i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" name="expiryOn" id="expiryOn" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" placeholder="Listed On" value="<?=$expiryOn?>" />
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                	<select class="form-control" name="status" id="status">
                                        <option value="">All Status</option>
                                        <? if(count($statusArr) > 0): ?>
                                        <? foreach($statusArr as $key => $statusText): ?>
                                            <? if(isset($status) && $status == $key): ?>
                                                <option value="<?=$key?>" selected="selected"><?=strip_tags($statusText)?></option>
                                            <? else: ?>
                                                <option value="<?=$key?>"><?=strip_tags($statusText)?></option>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                	
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div class="col-lg-3">
                                    <select class="form-control" name="filter" id="filter">
                                        <option value="">Select a Filter</option>
                                        <? if(count($filterArr) > 0): ?>
                                        <? foreach($filterArr as $key => $filterText): ?>
                                            <? if(isset($filter) && $filter == $key): ?>
                                                <option value="<?=$key?>" selected="selected"><?=$filterText?></option>
                                            <? else: ?>
                                                <option value="<?=$key?>"><?=$filterText?></option>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="value" id="value" class="form-control" placeholder="Enter Search Term" value="<?=$value?>" />
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
                            <button class="btn btn-info addPopup" data-w="addListingWindow">Add New Business Listing</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                    	<form action="<?=$formPostUrl?>" method="post" data-numbering="ChannelRow" data-column="1" class="multipleRowAction" data-check="check">
                        <input type="hidden" name="a" value="deleteSelectedListings" />
                        <table class="table table-striped" id="listingTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>User Email</th>
                                <th>Business Name</th>
                                <th>Expiry Date</th>
                                <th>Liked</th>
                                <th style="text-align:center;">Status</th>
                                <th style="width: 140px">Actions</th>
                                <th style="width: 50px">
                                	<label><input type="checkbox" class="checkUncheck" data-class="check" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT bl.*, c1.catName, 
								';
								
								if($subCatID > 0 && isset($subCatArr[$subCatID])){
									$sql .= '
										(
											SELECT c2.catName FROM category AS c2 WHERE c2.parentID = bl.catID AND c2.catID = '.$subCatID.' 
										) AS subCatNames
									';
								}else {
									$sql .= '
										(
											SELECT GROUP_CONCAT(c2.catName) FROM category AS c2 WHERE c2.parentID = bl.catID 
											AND FIND_IN_SET(c2.catID, bl.subCatIDs) 
										) AS subCatNames
									';
								}
								
								$sql .= '
									FROM businesslistings AS bl 
									LEFT JOIN category AS c1 ON c1.catID = bl.catID 
									WHERE bl.listingID = listingID
								';
								
								if($catID > 0 && isset($catArr[$catID])){
									$sql .= 'AND bl.catID = '.$catID.' ';
								}
								
								if($subCatID > 0 && isset($subCatArr[$subCatID])){
									$sql .= 'AND FIND_IN_SET('.$subCatID.', bl.subCatIDs) ';
								}
								
								if($expiryOn != ''){
									$sql .= 'AND bl.expiryOn BETWEEN "'.date('Y-m-d 00:00:00', strtotime($expiryOn)).'" AND "'.date('Y-m-d 23:59:59', strtotime($expiryOn)).'" ';
								}
								
								if($filter != '' && $value != ''){
									$sql .= 'AND `bl`.`'.mysql_real_escape_string($filter).'` LIKE "%'.mysql_real_escape_string($value).'%" ';
								}
								
								if($status != '' && ($status == 'P' || $status == 'A' || $status == 'D')){
									$sql .= 'AND `bl`.`status` = "'.mysql_real_escape_string($status).'" ';
								}
								
								$sql .= 'ORDER BY bl.expiryOn DESC';
								
								//echo $sql;
								
								$totalRows = mysql_num_rows(mysql_query($sql));
								$limit = 20;
								
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
                            <tr class="listingRow" id="listingRow_<?=$row->listingID?>">
                                <td><?=$sNo?></td>
                                <td id="td_cN_<?=$row->listingID?>"><?=stripslashes($row->catName)?></td>
                                <td id="td_sC_<?=$row->listingID?>"><?=stripslashes($row->subCatNames)?></td>
                                <td id="td_uE_<?=$row->listingID?>"><?=stripslashes($row->email)?></td>
                                <td id="td_bN_<?=$row->listingID?>"><?=stripslashes($row->businessName)?></td>
                                <td id="td_eO_<?=$row->listingID?>"><?=date('d-m-Y', strtotime($row->expiryOn))?></td>
                                <td><?=$row->liked?></td>
                                
                                <td id="td_s_<?=$row->listingID?>" align="center"><?=$statusArr[$row->status]?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-success editBtn" data-id="<?=$row->listingID?>" title="Manage Business Listing Images" data-a="getListingImages" data-u="<?=$formPostUrl?>" data-w="editListingImageWindow">
                                <i class="glyphicon glyphicon-picture"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$row->listingID?>" data-a="getListing" data-u="<?=$formPostUrl?>" data-w="editListingWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->listingID?>" data-a="delListing" data-u="<?=$formPostUrl?>" data-at="Listing" data-numbering="listingRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                                <td>
                                	<label>
                                    <input type="checkbox" class="check" name="listings[]" value="<?=$row->listingID?>" />
                                    </label>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="10" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="10" align="right">
                                	<button type="submit" class="btn btn-sm btn-danger">
                                    Delete All
                                    </button>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        </form>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
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