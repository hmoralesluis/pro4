<? 	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage Advertisement Types', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'advertisement-&-banners',
		'cMenu'		=> 'manage-advertisement-types', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Advertisement Types')
		)
	);
	
	$formPostUrl = 'manage-advertisement-types-post.php';
	$advTypeArr = array(
		'RSI'	=> 'Right Side Image',
		'RST'	=> 'Right Side Text',
		'FI'	=> 'Footer Image',
		'FT'	=> 'Footer Text',
		'PII'	=> 'Page Inner Image',
		'PIT'	=> 'Page Inner Text',
		'HS'	=> 'Home Slider', 
		'BL'	=> 'Business Listings' 
	);
	
	$expiryTypeArr = array(
		'D' => 'One Day',
		'W' => 'Weekly',
		'M' => 'Monthly',
		'Q' => 'Quarterly',
		'Y' => 'Yearly'
	);
?>
<? require_once('includes/header.php'); ?>
	<? 		$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
		$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
		$_SESSION['imgManageruploadMaxSize'] = '500K';
	?>
	<!-- Modal -->
    <div class="popupWrapper" id="addAdvertisementWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Advertisement Type</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="advertisementRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addAdvertisementType" />
                    <input type="hidden" name="fa" value="Add" data-tableid="advertisementTable" />
                	
                	<label for="aatName">Advertisement Name *</label>
                    <input type="text" class="form-control" name="aatName" id="aatName" value="" required="required" />
                	
                    <div class="row">
                    	<div class="col-xs-12 col-md-3">
                        	<label for="aatType">Type *</label>
                            <select class="form-control shoImgProperties" name="aatType" id="aatType" data-a="loadImgPropertiesForAdd" data-url="<?=$formPostUrl?>" required="required">
                                <option value="">Select a Type</option>
                                <? foreach($advTypeArr as $key => $val): ?>
                                <option value="<?=$key?>"><?=$val?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                        	<div id="aImgWidthDiv"></div>
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                        	<div id="aImgHeightDiv"></div>
                        </div>
                    </div>
                    
                    <label for="aatDescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="aatDescription" id="aatDescription"></textarea>
                    <br />
                    
                    <label for="apayButtonDaily">Payment Details *</label>
                    <textarea class="form-control htmlEditor" name="apayButtonDaily" id="apayButtonDaily"></textarea>
                    <br />
                    
                    <?/*?>
                    <label for="apayButtonWeekly">One Week Payment URL</label>
                    <input type="text" class="form-control" name="apayButtonWeekly" id="apayButtonWeekly" value="" />
                    
                    <label for="apayButtonMonthly">One Month Payment URL</label>
                    <input type="text" class="form-control" name="apayButtonMonthly" id="apayButtonMonthly" value="" />
                    
                    <label for="apayButtonQuarterly">Three Months Payment URL</label>
                    <input type="text" class="form-control" name="apayButtonQuarterly" id="apayButtonQuarterly" value="" />
                    
                    <label for="apayButtonYearly">One Year Payment URL</label>
                    <input type="text" class="form-control" name="apayButtonYearly" id="apayButtonYearly" value="" />
                    <? */?>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Advertisement Type" />
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="popupWrapper" id="editAdvertisementWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit Advertisement Type balbaro</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveAdvertisementType" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="atID" id="atID" />
                    
                    <label for="eatName">Advertisement Name *</label>
                    <input type="text" class="form-control" name="eatName" id="eatName" value="" required="required" />
                	
                    <div class="row">
                    	<div class="col-xs-12 col-md-3">
                        	<label for="eatType">Type *</label>
                            <select class="form-control shoImgProperties" name="eatType" id="eatType" data-a="loadImgPropertiesForEdit" data-url="<?=$formPostUrl?>" required="required">
                                <option value="">Select a Type</option>
                                <? foreach($advTypeArr as $key => $val): ?>
                                <option value="<?=$key?>"><?=$val?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                        	<div id="eImgWidthDiv"></div>
                        </div>
                        
                        <div class="col-xs-6 col-md-3">
                        	<div id="eImgHeightDiv"></div>
                        </div>
                    </div>
                    
                    <label for="eatDescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="eatDescription" id="eatDescription"></textarea>
                    <br />
                    
                    <label for="epayButtonDaily">Payment Details *</label>
                    <textarea class="form-control htmlEditor" name="epayButtonDaily" id="epayButtonDaily"></textarea>
                    <br />
                    
                    <? /*?>
                    <label for="epayButtonWeekly">One Week Payment URL</label>
                    <input type="text" class="form-control" name="epayButtonWeekly" id="epayButtonWeekly" value="" />
                    
                    <label for="epayButtonMonthly">One Month Payment URL</label>
                    <input type="text" class="form-control" name="epayButtonMonthly" id="epayButtonMonthly" value="" />
                    
                    <label for="epayButtonQuarterly">Three Months Payment URL</label>
                    <input type="text" class="form-control" name="epayButtonQuarterly" id="epayButtonQuarterly" value="" />
                    
                    <label for="epayButtonYearly">One Year Payment URL</label>
                    <input type="text" class="form-control" name="epayButtonYearly" id="epayButtonYearly" value="" />
                    <? */?>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Advertisement Type" />
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
                            <h5 id="sMsg" ></h5>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-success addPopup" data-w="addAdvertisementWindow" title="Browse File">Add Advertisement Type</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="advertisementTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th width="200">Advertisement Type Name</th>
                                <th width="200">Type</th>
                                <th width="150">Required Image Size</th>
                                <? /*?><th>Payment URLs</th><?p */?>
                                <th width="120">Sort Order</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <? 								$res = mysql_query('
									SELECT * FROM advertisement_types 
									WHERE isDeleted = "N"
									ORDER BY sOrder ASC 
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? 								$atID	= $row->atID;
								$atName = stripslashes($row->atName);
								$atType	= $advTypeArr[$row->atType];
								
								if(($row->atType == 'RSI' || $row->atType == 'FI' || $row->atType == 'PII' || $row->atType == 'HS')){
									$imgSize = $row->imgWidth.' x '.$row->imgHeight;
								}else {
									$imgSize = '';
								}
								
								/*
								$payButtonDaily		= stripslashes($row->payButtonDaily);
								$payButtonWeekly	= stripslashes($row->payButtonWeekly);
								$payButtonMonthly	= stripslashes($row->payButtonMonthly);
								$payButtonQuarterly	= stripslashes($row->payButtonQuarterly);
								$payButtonYearly	= stripslashes($row->payButtonYearly);
								
								$payBtnDetails = '<div class="payBtnUrls">';
								if($payButtonDaily != ''){
									$payBtnDetails .= '<a href="'.$payButtonDaily.'" target="_blank">One Day</a>';
								}
								if($payButtonWeekly != ''){
									$payBtnDetails .= '<a href="'.$payButtonWeekly.'" target="_blank">Weekly</a>';
								}
								if($payButtonMonthly != ''){
									$payBtnDetails .= '<a href="'.$payButtonMonthly.'" target="_blank">Monthly</a>';
								}
								if($payButtonQuarterly != ''){
									$payBtnDetails .= '<a href="'.$payButtonQuarterly.'" target="_blank">Quarterly</a>';
								}
								if($payButtonYearly != ''){
									$payBtnDetails .= '<a href="'.$payButtonYearly.'" target="_blank">Yearly<br /></a>';
								}
								$payBtnDetails .= '</div>';
								*/
							?>
                            <tr class="advertisementRow" id="advertisementRow_<?=$row->atID?>">
                                <td><?=$sNo?></td>
                                <th width="200" id="td_atN_<?=$atID?>"><?=$atName?></th>
                                <th width="200" id="td_at_<?=$atID?>"><?=$atType?></th>
                                <th width="150" id="td_iS_<?=$atID?>"><?=$imgSize?></th>
                                <? /*?><th id="td_atB_<?=$atID?>"><?=$payBtnDetails?></th><? */?>
                                <td width="120">
                                	<div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$atID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$atID?>"></div>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$atID?>" data-a="getAdvertisement" data-u="<?=$formPostUrl?>" data-w="editAdvertisementWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$atID?>" data-a="delAdvertisement" data-u="<?=$formPostUrl?>" data-at="Advertisement" data-numbering="advertisementRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="6" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>
    <? 	$footerscript = '
    <script type="text/javascript">
		$(document).on("change", ".shoImgProperties", function(event){
			var thisE	= $(this);
			var action	= $(this).data("a");
			var url		= $(this).data("url");
			var type	= $(this).val();
			
			$.ajax({
				url: url,
				type: "POST",
				data: "a="+action+"&type="+type, 
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
				},
				error: function(jqXHR, textStatus, errorThrown){
					showAlert("Error on Submitting Form.");
				}
			});
		});
	</script>
	';
	?>
<? require_once('includes/footer.php'); ?>