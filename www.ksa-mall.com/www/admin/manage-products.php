<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage Products', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'e-store',
		'cMenu'		=> 'manage-products', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Products')
		)
	);
	
	$date   = date('Y-m-d');
	$formPostUrl = 'manage-products-post.php';
	
	$filterArr = array('productName' => 'Product Name');
	
	if(isset($_REQUEST['scatID']) || isset($_REQUEST['sproductName'])){
		$scatID			= (int) $_REQUEST['scatID'];
		$sproductName	= trim($_REQUEST['sproductName']);
	}else {
		$scatID			= '';
		$sbusinessName	= '';
	}
	
	if(isset($_REQUEST['subCatID'])){
		$scatID = (int) $_REQUEST['subCatID'];
	}
	
	$pCatArr = array();
	$pCatRes = mysql_query('SELECT * FROM  product_cat WHERE parentID = 0 ORDER BY sOrder ASC');
	if(mysql_num_rows($pCatRes) > 0){
		while($pCatRow = mysql_fetch_object($pCatRes)){
			$pCatArr[$pCatRow->pCatID] = stripslashes($pCatRow->pCatName);
		}
	}
	
	$subCatArr = array();
	if($pCatID > 0 && isset($catArr[$pCatID])){
		$subCatSql = 'SELECT * FROM product_cat WHERE parentID = '.$pCatID.' ORDER BY sOrder ASC';
		$subCatRes = mysql_query($subCatSql);
		if(mysql_num_rows($subCatRes) > 0){
			while($subCatRow = mysql_fetch_object($subCatRes)){
				$subCatArr[$subCatRow->pCatID] = stripslashes($subCatRow->pCatName);
			}
		}
	}
	
	$fcatList = '';
	$catList = '';
	$clcount = 1;
	
	foreach($pCatArr as $clcatID => $clcatName){
		$fcatList .= '<optgroup label="'.$clcatName.'">';
		$catList  .= '<option value="" data-sort="'.$clcount.'">'.$clcatName.'</option>';
		$clscRes   = mysql_query('SELECT * FROM product_cat WHERE parentID = '.$clcatID.' ORDER BY sOrder ASC');
		if(mysql_num_rows($clscRes) > 0){
			while($clscRow = mysql_fetch_object($clscRes)){
				$clcount++;
				$catList  .= '<option value="'.$clscRow->pCatID.'" data-sort="'.$clcount.'" >&nbsp;&nbsp;- '.stripslashes($clscRow->pCatName).'</option>';
				if(isset($clscRow->pCatID) && $clscRow->pCatID == $scatID){
					$fcatList .= '<option value="'.$clscRow->pCatID.'" data-sort="'.$clcount.'" selected="selected">'.stripslashes($clscRow->pCatName).'</option>';
				}
				else{
					$fcatList .= '<option value="'.$clscRow->pCatID.'" data-sort="'.$clcount.'">'.stripslashes($clscRow->pCatName).'</option>';
				}
			}
		}
		$fcatList .= '</optgroup>';
		$clcount++;
	}
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addProductWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Product</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="productRow" data-column="1" class="afs" id="addProductForm">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addProduct" />
                    <input type="hidden" name="fa" value="Add" data-tableid="productTable" />
                	
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
                    
                    <label for="aproductName">Product Name *</label>
                    <input type="text" class="form-control" name="aproductName" id="aproductName" value="" required />
                    
                    <div class="row">
                    	<div class="col-md-12">
                            <label for="abannerImg" style="display:block;">Banner Image (Optional)</label>
                            <input type="text" class="form-control" name="abannerImg" id="abannerImg" style="display:inline-block; width:90%;" />
                            <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="abannerImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                         </div>
                    </div>
                    
                    <label for="abannerPosition">Banner Posistion </label>
                    <select class="form-control" name="abannerPosition" id="abannerPosition">
                        <option value="">Select a Position</option>
                        <option value="B">Bottom</option>
                        <option value="S">Sidebar</option>
                    </select>
                    
                    <label for="adescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="adescription" id="adescription"></textarea>
                    <br />
                    <label for="aprice">Price</label>
                    <input type="text" class="form-control" name="aprice" id="aprice" value="" />
                  
                    <label for="accPayment">Credit Card Payment </label>
                    <select class="form-control" name="ccPayment" id="ccPayment">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <label for="accPaymentLink">Buy Url</label>
                    <input type="text" class="form-control forceUrl" name="accPaymentLink" id="accPaymentLink" value="http://" />
                    
                    <label for="acod">Cash on Delivery </label>
                    <select class="form-control" name="acod" id="acod">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    <label for="acodCountries">Cash on Delivery Countries</label>
                    <textarea class="form-control" name="acodCountries" id="acodCountries"></textarea>
                    
                    <label for="ainvoice">Invoice </label>
                    <select class="form-control" name="ainvoice" id="ainvoice">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <label for="acodTemplate">COD Template</label>
                    <textarea class="form-control htmlEditor" name="acodTemplate" id="acodTemplate"></textarea>
                    <br />
                    <label for="awiTemplate">Web Invoice Template</label>
                    <textarea class="form-control htmlEditor" name="awiTemplate" id="awiTemplate"></textarea>
                    <br />
                    <label for="aeiTemplate">E-mail Invoice Template</label>
                    <textarea class="form-control htmlEditor" name="aeiTemplate" id="aeiTemplate"></textarea>
                    <br />
                    <label for="atags">Tags (Optional)</label>
                    <textarea class="form-control" name="atags" id="atags" placeholder="tag1, tag2, tag3"></textarea>
                    
                    <label for="aseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aseoUrl" id="aseoUrl" value="" required />
                    
                    <label for="aseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="aseoTitle" id="aseoTitle" value="" />
                    
                    <label for="aseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="aseoKeywords" id="aseoKeywords"></textarea>
                    
                    <label for="aseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="aseoDesc" id="aseoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Product" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editProductWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Product</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs" id="editProductForm">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveProduct" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="productID" id="productID" />
                    
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
                    
                    <label for="eproductName">Product Name *</label>
                    <input type="text" class="form-control" name="eproductName" id="eproductName" value="" required />
                    
					<div class="row">
						<div class="col-md-12">
							<label for="ebannerImg" style="display:block;">Banner Image (Optional)</label>
							<input type="text" class="form-control" name="ebannerImg" id="ebannerImg" style="display:inline-block; width:90%;" />
							<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="ebannerImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
						</div>
					</div>
					
					<label for="ebannerPosition">Banner Posistion *</label>
					<select class="form-control" name="ebannerPosition" id="ebannerPosition">
						<option value="">Select a Position</option>
						<option value="B">Bottom</option>
						<option value="S">Sidebar</option>
					</select>
					
					<label for="edescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="edescription" id="edescription"></textarea>
                    <br />
                    
                    <label for="eprice">Price</label>
                    <input type="text" class="form-control" name="eprice" id="eprice" value="" />
                    
                    <label for="eccPayment">Credit Card Payment </label>
                    <select class="form-control" name="eccPayment" id="eccPayment">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <label for="eccPaymentLink">Buy Url</label>
                    <input type="text" class="form-control forceUrl" name="eccPaymentLink" id="eccPaymentLink" value="" />
                    
                    <label for="ecod">Cash on Delivery </label>
                    <select class="form-control" name="ecod" id="ecod">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    <label for="ecodCountries">Cash on Delivery Countries</label>
                    <textarea class="form-control" name="ecodCountries" id="ecodCountries"></textarea>
                    
                    <label for="einvoice">Invoice </label>
                    <select class="form-control" name="einvoice" id="einvoice">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <label for="ecodTemplate">COD Template</label>
                    <textarea class="form-control htmlEditor" name="ecodTemplate" id="ecodTemplate"></textarea>
                    <br />
                    <label for="ewiTemplate">Web Invoice Template</label>
                    <textarea class="form-control htmlEditor" name="ewiTemplate" id="ewiTemplate"></textarea>
                    <br />
                    <label for="eeiTemplate">E-mail Invoice Template</label>
                    <textarea class="form-control htmlEditor" name="eeiTemplate" id="eeiTemplate"></textarea>
                    <br />
                    <label for="etags">Tags (Optional)</label>
                    <textarea class="form-control" name="etags" id="etags" placeholder="tag1, tag2, tag3"></textarea>
                    
                    <label for="eseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="" required />
                    
                    <label for="eseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="" />
                    
                    <label for="eseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="eseoKeywords" id="eseoKeywords"></textarea>
                    
                    <label for="eseoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="eseoDesc" id="eseoDesc"></textarea>
                   
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">Deactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Product" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editProductImageWindow">
        <div class="popupWindow" style="min-width:90%">
            <div class="titleBar"><span>Product Images</span></div>
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
                        <input type="hidden" name="iproductID" id="iproductID" value="" />
                        <table class="table table-striped" id="imageTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image Path</th>
                                <th>Caption</th>
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
                                <td colspan="3" align="left">
                                	<input type="text" class="form-control" id="aimgurl" style="display:inline-block; width:90%;" />
                    				<a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgurl" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                                </td>
                                <td colspan="1" align="left">
                                	<button type="button" class="btn btn-sm btn-success nonFormPost" data-f="aimgurl" data-a="addImageUrl" data-u="<?=$formPostUrl?>" data-at="Please Enter Image Url" data-wf="iproductID" data-numbering="imageRow" data-column="1">Add Image Url</button>
                                </td>
                                <td colspan="2" align="right">
                                	<button type="submit" name="saveAll" class="btn btn-sm btn-success">Save All</button>
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
                    <form action="manage-products.php" method="get">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div class="col-lg-3">
                                    <select class="form-control" name="scatID">
                                    	<option value="">All Product Categories</option>
										<?=$fcatList?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" name="sproductName" id="sproductName" class="form-control" placeholder="Enter Product Name" value="<?=$sproductName?>" />
                                </div>
                                <div class="col-lg-3">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="manage-products.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix" style="padding-bottom:15px;"></div>
            </div>
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg" ></h5>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-info addPopup" data-w="addProductWindow">Add New Product</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                    	<form action="<?=$formPostUrl?>" method="post" data-numbering="ChannelRow" data-column="1" class="multipleRowAction" data-check="check">
                        <input type="hidden" name="a" value="deleteSelectedProducts" />
                        <table class="table table-striped" id="productTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sub Category</th>
                                <th>Product Name</th>
                                <th>AddedOn</th>
                                <th>Featured</th>
                                <th style="text-align:center;">Status</th>
                                <th style="width: 130px">Actions</th>
                                <th style="width: 50px">
                                	<label><input type="checkbox" class="checkUncheck" data-class="check" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT p.*, 
								';
								
								if($subCatID > 0 && isset($subCatArr[$subCatID])){
									$sql .= '
										(
											SELECT c2.pCatName FROM product_cat AS c2 WHERE c2.pCatID = '.$subCatID.' 
										) AS subCatNames
									';
								}else {
									$sql .= '
										(
											SELECT GROUP_CONCAT(c2.pCatName) FROM product_cat AS c2 WHERE 1 = 1  
											AND FIND_IN_SET(c2.pCatID, p.subCatIDs) 
										) AS subCatNames
									';
								}
								
								$sql .= '
									FROM products AS p 
									WHERE p.productID = productID
								'; 
								if($scatID > 0){
									$sql .= 'AND FIND_IN_SET('.$scatID.', p.subCatIDs) ';
									$isFilter = true;
								}
								
								if($sbusinessName != ''){
									$sql .= 'AND `p`.`productName` LIKE "%'.mysql_real_escape_string($sbusinessName).'%" ';
									$isFilter = true;
								}
								
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
                            <tr class="productRow" id="product_<?=$row->listingID?>">
                                <td><?=$sNo?></td>
                                <td id="td_sC_<?=$row->productID?>"><?=stripslashes($row->subCatNames)?></td>
                                <td id="td_pN_<?=$row->productID?>"><?=stripslashes($row->productName)?></td>
                                <td id="td_aO_<?=$row->productID?>"><?=date('d-m-Y', strtotime($row->addedOn))?></td>
                                <td width="150">
								<div class="pull-left" style="width:70%">
                                <select class="form-control updateSelect" id="uIsFeaturedSelect_<?=$row->productID?>" data-url="<?=$formPostUrl?>" data-a="updateIsFeatured" data-wid="<?=$row->productID?>" data-resultprefix="isFeatured_">
                                	<? if($row->isFeatured == 'Y'){$selected='selected="selected"';}else{$selected='';} ?>
                                    <option value="Y" <?=$selected?>>Yes</option>
                                    <? if($row->isFeatured == 'N'){$selected='selected="selected"';}else{$selected='';} ?>
                                    <option value="N" <?=$selected?>>No</option>
                                </select>
                                </div>
                                <div class="pull-right" style="width:25%;" id="isFeatured_<?=$row->productID?>"></div>
                                </td>
                                <td id="td_s_<?=$row->productID?>" align="center"><?=$statusArr[$row->status]?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-success editBtn" data-id="<?=$row->productID?>" title="Manage Product  Images" data-a="getProductImages" data-u="<?=$formPostUrl?>" data-w="editProductImageWindow">
                                <i class="glyphicon glyphicon-picture"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$row->productID?>" data-a="getProduct" data-u="<?=$formPostUrl?>" data-w="editProductWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->productID?>" data-a="delProduct" data-u="<?=$formPostUrl?>" data-at="Product" data-numbering="productRow" data-column="1" >
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
                                <td colspan="9" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="9" align="right">
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
			var iproductID = $("#iproductID").val();
			//alert(iProductID);
			if(iproductID != ""){
				$.ajax({
					type: "POST",
					data: "a=addImages&productID="+iproductID+"&files="+files,
					url : "'.$formPostUrl.'",
					success: function(jSonData){
						var data = jSonData;
						console.log(data);
						
						if(data.status == 0){
							$("#imageTable .errorRow").remove();
							$("#imageTable tbody").prepend(data.tbody);
						}
						
						scrollInnerDivToTop("#editProductImageWindow .inner");
						numberingRows("imageRow", 1);
						
						if(typeof data.msg != "undefined"){
							$("#editProductImageWindow .sMsg").html(data.msg);
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