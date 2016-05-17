<? 	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage User Advertisements', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'advertisement-&-banners',
		'cMenu'		=> 'manage-user-advertisements', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage User Advertisements')
		)
	);
	
	$formPostUrl = 'manage-user-advertisements-post.php';
	
	   
	if(isset($_REQUEST['sFilter'])){
		$sFilter	= trim($_REQUEST['sFilter']);
		$sKeywords	= trim($_REQUEST['sKeywords']);
		$sexpiryOn	= trim($_REQUEST['sexpiryOn']);
	    $sStatus	= trim($_REQUEST['sStatus']);
        $sStatusType	= trim($_REQUEST['sStatusType']);
	}else {
		$sFilter	= '';
		$sKeywords	= '';
		$sexpiryOn	= '';
        $sStatusType = '';
	}
	
	$filterArr = array('email' => 'User Email', 'fullName' => 'User Name', 'uaName' => 'Banner Name');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/advertisements/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/advertisements/';
	$_SESSION['imgManageruploadMaxSize'] = '3M';
	
	$advertTypeArr = array();
                            
	$advertRes = mysql_query('SELECT * FROM advertisement_types WHERE isDeleted = "N" ORDER BY sOrder ASC');
	if($advertRes && mysql_num_rows($advertRes) > 0){
		while($advertRow = mysql_fetch_object($advertRes)){
			$advertTypeArr[$advertRow->atID] = stripslashes($advertRow->atName);
		}
	}
?>
<? require_once('includes/header.php'); ?>
	<div class="popupWrapper" id="addAdvertisementWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Advertisement</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="advertisementRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addAdvertisement" />
                    <input type="hidden" name="fa" value="Add" data-tableid="advertisementTable" />
                    
                    <label for="auaName">Name Your Advertisement *</label>
                    <input type="text" class="form-control" name="auaName" id="auaName" required="required" />
                    
                    <label for="aatID">Select Advertisement Type *</label>
                    <select class="form-control showAdvertDescriptions" name="aatID" id="aatID" data-a="loadAdvertDetails" data-url="<?=$formPostUrl?>" required="required">
                        <option value="">Select a Type</option>
                        <? foreach($advertTypeArr as $key => $val): ?>
                        <? if($atID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                        <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                    </select>
                    
                    <div id="aatDescription" class="emptyHtml"><?=$desFieldArr['atDescription']?></div>
                    
                    <div id="auaFields" class="emptyHtml"><?=$desFieldArr['uaFields']?></div>
                    
                    <label for="aexpiryOn">Expiry On *</label>
                    <input type="text" name="aexpiryOn" id="aexpiryOn" value="<?=date('d-m-Y')?>" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" placeholder="Expiry On" />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Advertisement" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editAdvertisementWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Advertisement</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs" id="editAdvertisementForm">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveAdvertisement" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="uaID" id="uaID" />
                    
<!--                    <label for="euaName">Name Your Advertisement *</label>-->
<!--                    <input type="text" class="form-control" name="euaName" id="euaName" value="" required="required" />-->

                    <label for="eatName">Advertisement Type *</label>
                    <input type=text" class="form-control" name="eatName" id="eatName" value="" disabled="disabled" />

                    <label for="aatIDe">Advertisement Type *</label>
                    <select class="form-control showAdvertDescriptions" name="aatIDe" id="aatIDe"  required="required">
                        <option value="">Select a Type</option>
                        <? foreach($advertTypeArr as $key => $val): ?>
                            <? if($atID == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                            <option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                        <? endforeach; ?>
                    </select>
                    
                    <div id="euaFields"></div>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Advertisement" />
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
                            <h5>Search</h5>
                        </div>
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <form action="manage-user-advertisements.php" method="get">
                        <div class="row">
                        	<div class="col-lg-12">
                            	<div class="col-lg-2">
                                    <select class="form-control" name="sFilter" id="sFilter">
                                    	<option value="">Select a Filter</option>
                                        <? foreach($filterArr as $key => $val): ?>
                                        	<? if($sFilter == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                                        	<option value="<?=$key?>"<?=$selected?>><?=$val?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="text" name="sKeywords" id="sKeywords" class="form-control" placeholder="Enter Your Keyword" value="<?=$sKeywords?>" />
                                </div>
                                <div class="col-lg-2">
                                	<input type="text" name="sexpiryOn" id="sexpiryOn" class="form-control datePicker"  data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" placeholder="Expiry" value="<?=$sexpiryOn?>" style="text-align:center;" />
                                </div>
                                <div class="col-lg-2">
                                	<select class="form-control" name="sStatus" id="sStatus">
                                    	<option value="">All Status</option>
                                        <? foreach($advertStatusArr as $key => $val): ?>
                                        	<? if($sStatus == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                                        	<option value="<?=$key?>"<?=$selected?>><?=strip_tags($val)?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-control" name="sStatusType" id="sStatusType">
                                        <option value="">All Types</option>
                                        <? foreach($advertType as $key => $val): ?>
                                            <? if($sStatusType == $key){$selected = ' selected="selected"';}else{$selected = '';} ?>
                                            <option value="<?=$key?>"<?=$selected?>><?=strip_tags($val)?></option>
                                        <? endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="manage-user-advertisements.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
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
                            <h5 id="sMsg"></h5>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-info addPopup" data-w="addAdvertisementWindow">Add New Advertisement</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="advertisementTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>User Details</th>
                                <th colspan="2">Advertisement Details</th>
                                <th width="150">Expiry Date</th>
                                <th width="150">Status</th>
                                <th width="200">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? 								$sql .= '
									SELECT ua.*, u.fullName, u.email
									FROM user_advertisements AS ua
									LEFT JOIN users AS u ON u.userID = ua.userID
									WHERE isDeleted = "N"
								';

								if($sFilter != '' && ($sFilter == 'email' || $sFilter == 'fullName') && $sKeywords != ''){
									$sql .= 'AND u.'.mysql_real_escape_string($sFilter).' LIKE "%'.mysql_real_escape_string($sKeywords).'%" ';
								}else if($sFilter != '' && $sKeywords != ''){
									$sql .= 'AND ua.'.mysql_real_escape_string($sFilter).' LIKE "%'.mysql_real_escape_string($sKeywords).'%" ';
								}

								if($sexpiryOn != ''){
									$sql .= 'AND ua.expiryOn <= "'.date('Y-m-d', strtotime($sexpiryOn)).'"';
								}

								if($sStatus != '' && isset($advertStatusArr[$sStatus])){
									$sql .= 'AND ua.status = "'.mysql_real_escape_string($sStatus).'"';
								}



//                                if($sStatusType != '' && isset($advertType[$sStatusType])){
//                                    $sql .= 'AND ua.atName = "'.mysql_real_escape_string($advertType[$sStatusType]).'"';
//                                }




                                if($sStatusType != '' && isset($advertType[$sStatusType])){

                                    $valor = (int)$sStatusType;
                                    $sql .= 'AND ua.atID = "'.mysql_real_escape_string($valor).'"';
                                }

								$sql .= 'ORDER BY ua.uaID DESC';


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
                            <? 								$uaID	= $row->uaID;
								$atType	= stripslashes($row->atType);
								
								if($row->userID == 0){
									$userDetails = 'Admin';
								}else {
									$userDetails = stripslashes($row->fullName).'<br />';
									$userDetails .= stripslashes($row->email);
								}
								
								$advertDetails	= 'Position: <b>'.stripslashes($row->atName).'</b><br />';
								$advertDetails	.= 'Name: '.stripslashes($row->uaName).'<br />';
								
								if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
									$imgPath = '../images/advertisements/'.stripslashes($row->uaDetails);
									
									$advertDetails	.= 'Image Size: <b>'.stripslashes($row->imgWidth.' x '.$row->imgHeight).'</b><br />';
									$advertDetails	.= 'Alt: '.stripslashes($row->uaTitle).'<br />';
									$advertDetails	.= 'Link: '.stripslashes($row->uaLink);
								}else if($atType == 'BL'){
									
									$businessName = getRecord('businesslistings', 'businessName', array('listingID' => (int) $row->uaDetails));
									$advertDetails	.= 'Listing Name: <b>'.$businessName.'</b>';
								}else {
									$advertDetails	.= 'Title: '.stripslashes($row->uaTitle).'<br />';
									$advertDetails	.= 'Desc: '.stripslashes($row->uaDetails).'<br />';
									$advertDetails	.= 'Link: '.stripslashes($row->uaLink);
								}
							?>
                            <tr class="advertisementRow" id="advertisementRow_<?=$uaID?>">
                                <td><?=$sNo?></td>
                                <td id="td_uD_<?=$uaID?>" width="250"><?=$userDetails?></td>
                                
								<? if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'): ?>
                                <td id="td_aI_<?=$uaID?>" width="75"><img src="<?=$imgPath?>" alt="" /></td>
                                <td id="td_aD_<?=$uaID?>" width="225"><?=$advertDetails?></td>
                                <? else: ?>
                                <td id="td_aD_<?=$uaID?>" width="300" colspan="2"><?=$advertDetails?></td>
                                <? endif; ?>
                                
                                <td width="150">
                                    <div class="pull-left" style="width:70%">
                                    <input type="text" class="form-control datePicker onblurUpdate" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" value="<?=date('d-m-Y', strtotime($row->expiryOn))?>" data-a="updateExpiry" data-ids="<?=$uaID?>" data-url="<?=$formPostUrl?>" style="text-align:center;" id="expiryInput_<?=$uaID?>" />
                                    </div>
                                    <div class="pull-right" style="width:25%;" id="expiryDiv_<?=$uaID?>"></div>
                                </td>
                                <td width="150">
                                    <div class="pull-left" style="width:70%">
                                        <select class="form-control updateSelect" id="uStatusSelect_<?=$uaID?>" data-url="<?=$formPostUrl?>" data-a="updateStatus" data-wid="<?=$uaID?>" data-resultprefix="sTatus_">
                                            <? foreach($advertStatusArr as $key => $val): ?>
												<? if($row->status == $key){$selected=' selected="selected"';}else{$selected='';} ?>
                                            	<option value="<?=$key?>"<?=$selected?>><?=strip_tags($val)?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="pull-right" style="width:25%;" id="sTatus_<?=$uaID?>"></div>
                                </td>
                                <td width="150">
                                    <div class="pull-left" style="width:70%">
                                        <select class="form-control updateSelect" id="uStatusSelect_<?=$uaID?>" data-url="<?=$formPostUrl?>" data-a="updateStatus" data-wid="<?=$uaID?>" data-resultprefix="sTatus_">
                                            <? foreach($advertType as $key => $val): ?>
                                                <? if($row->status == $key){$selected=' selected="selected"';}else{$selected='';} ?>
                                                <option value="<?=$key?>"<?=$selected?>><?=strip_tags($val)?></option>
                                            <? endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="pull-right" style="width:25%;" id="sTatus_<?=$uaID?>"></div>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$uaID?>" data-a="getAdvertisement" data-u="<?=$formPostUrl?>" data-w="editAdvertisementWindow">
                                    <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$uaID?>" data-a="delAdvertisement" data-u="<?=$formPostUrl?>" data-at="Advertisement" data-numbering="advertisementRow" data-column="1" >
                                    <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="7" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                            <tfoot>
                            <tr>
                            	<td style="width: 10px">&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td width="150">&nbsp;</td>
                                <td width="150">&nbsp;</td>
                                <td width="200">&nbsp;</td>
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
    <? 	$footerscript = '
    <script type="text/javascript">
		$(document).on("change", ".showAdvertDescriptions", function(event){
			var thisE	= $(this);
			var action	= $(this).data("a");
			var url		= $(this).data("url");
			var id		= $(this).val();
			
			if(id != ""){
				$.ajax({
					url: url,
					type: "POST",
					data: "a="+action+"&id="+id, 
					success:function(jSonData, textStatus, jqXHR){
						console.log(jSonData);
						var data = jSonData;
						
						if(typeof data.msg != "undefined"){
							showAlert(data.msg);
						}
						
						if(typeof data.html != "undefined"){
							$.each(data.html, function(id, content){
								$("#"+id).html(content);
							});
						}
						
						if(typeof data.browseFile != "undefined"){
							console.log("BrowserFile Executed: "+$(".browseFile").length);
							
							$(".browseFile").popupWindow({ 
								windowURL:"file-manager/select.php", 
								windowName:"File Manager",
								height:490, 
								width:950, 
								centerScreen:1
							});
						}
					},
					error: function(jqXHR, textStatus, errorThrown){
						showAlert("Error on Submitting Form.");
					}
				});
			}else {
				$("atDescription").html("");
			}
		});
	</script>
	';
	?>
<? require_once('includes/footer.php'); ?>