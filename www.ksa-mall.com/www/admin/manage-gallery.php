<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';

	$header = array(
		'siteTitle' => 'Manage  Gallery', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'gallery',
		'cMenu'		=> 'manage-gallery', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Gallery ')
		)
	);
	
	$formPostUrl = 'manage-gallery-post.php';
	
	$userArr = array();
		$userRes = mysql_query('SELECT * FROM users ORDER BY email ASC');
		if(mysql_num_rows($userRes) > 0){
			while($userRow = mysql_fetch_object($userRes)){
				$userArr[$userRow->userID] = stripslashes($userRow->email.' ('.$userRow->fullname.')');
			}
		}
		
	
	$gCatArr = array();
	$gCatRes = mysql_query('SELECT * FROM gallery_cat');
	if(mysql_num_rows($gCatRes) > 0){
		while($gCatRow = mysql_fetch_object($gCatRes)){
			$gCatArr[$gCatRow->gCatID] = stripslashes($gCatRow->gCatName);
		}
	}
	
?>

<? require_once('includes/header.php'); ?>
	<?
		if(isset($_REQUEST['fgCatID'])){
			$fgCatID		= (int) $_REQUEST['fgCatID'];
			$fvalue			= trim($_REQUEST['fvalue']);
			$fisApproved	= trim($_REQUEST['fisApproved']);
		}else {
			$fgCatID		= '';
			$fvalue			= '';
			$fisApproved	= '';
		}
	?>
	<!-- Modal -->
    <div class="popupWrapper" id="addGalleryWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Gallery</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="galleryRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addGallery" />
                    <input type="hidden" name="fa" value="Add" data-tableid="galleryTable" />
                    
                    <label for="aGCatID">Gallery Category *</label>
                    <select class="form-control" name="aGCatID" id="aGCatID" required="required" >
                    	<option value="">Select Gallery Category</option>
                        <? if(count($gCatArr) > 0): ?>
                        <? foreach($gCatArr as $key => $value): ?>
                        <option value="<?=$key?>"><?=$value?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    <label for="aGName">Gallery Name *</label>
                    <input type="text" class="form-control" name="aGName" id="aGName" value="" required />
                    
                    <label for="aGDescription">Gallery Description *</label>
                    <textarea class="form-control htmlEditor" name="aGDescription" id="aGDescription"></textarea>
                    <br />
                    <label for="aSeoTitle">SEO URL *</label>
                    <input type="text" class="form-control" name="aSeoUrl" id="aSeoUrl" value="" required/>
                    
                    <label for="aSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="aSeoTitle" id="aSeoTitle" value=""  required="required" />
                    
                    <label for="aSeoKeyword">SEO Keywords</label>
                    <textarea class="form-control" name="aSeoKeyword" id="aSeoKeyword" ></textarea>
                    
                    <label for="aSeoDesc">SEO Description</label>
                    <textarea class="form-control" name="aSeoDesc" id="aSeoDesc" ></textarea>
                    
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Gallery" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editGalleryWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Gallery </span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveGallery" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="gID" id="gID" />
                    
                    <label for="eUserID">User *</label>
                    <select class="select2" name="eUserID" id="eUserID" autofocus style="display:block">
      					<option value="0">Admin</option>
                        <? if(count($userArr) > 0): ?>
							<? foreach($userArr as $key => $uDetail): ?>
                                <option value="<?=$key?>"><?=$uDetail?></option>
                            <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="eGCatID">Gallery Category *</label>
                    <select class="form-control" name="eGCatID" id="eGCatID" required="required" >
                    	<option value="">Select Gallery Category</option>
                        <? if(count($gCatArr) > 0): ?>
							<? foreach($gCatArr as $key => $value): ?>
                            	<option value="<?=$key?>"><?=$value?></option>
                            <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    <label for="eGName">Gallery Name *</label>
                    <input type="text" class="form-control" name="eGName" id="eGName" value="" required autofocus />
                    
                    <label for="eGDescription">Gallery Description *</label>
                    <textarea class="form-control htmlEditor" name="eGDescription" id="eGDescription" ></textarea>
                    <br />
                    <label for="eSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eSeoUrl" id="eSeoUrl" value="" required/>
                    
                    <label for="eSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="eSeoTitle" id="eSeoTitle" value=""  required="required" />
                    
                    <label for="eSeoKeyword">SEO Keywords</label>
                    <textarea class="form-control" name="eSeoKeyword" id="eSeoKeyword"></textarea>
                    
                    <label for="eSeoDesc">SEO Description</label>
                    <textarea class="form-control" name="eSeoDesc" id="eSeoDesc" ></textarea>
                    
                    <label for="eIsApproved">Is Approved *</label>
                    <select class="form-control" name="eIsApproved" id="eIsApproved" required="required">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Gallery" />
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
                	
                    <form action="manage-gallery.php" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="col-lg-4">
                                    <select class="form-control" name="fgCatID" id="fgCatID">
                                        <option value="">Select a Category</option>
                                        <? if(count($gCatArr) > 0): ?>
											<? foreach($gCatArr as $key => $filterText): ?>
                                                <? if(isset($fgCatID) && $fgCatID == $key): ?>
                                                    <option value="<?=$key?>" selected="selected"><?=$filterText?></option>
                                                <? else: ?>
                                                    <option value="<?=$key?>"><?=$filterText?></option>
                                                <? endif; ?>
                                            <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="fvalue" id="fvalue" class="form-control" placeholder="Enter Search Term" value="<?=$fvalue?>" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="col-lg-3" style="line-height:34px;">Status</div>
                                <div class="col-lg-9">
                                   <select class="form-control" name="fisApproved" id="fisApproved">
                                   	<option value="">All Approved Status</option>
                                    <? if(count($yesNoArr) > 0): ?>
										<? foreach($yesNoArr as $key => $statusText): ?>
                                            <? if(isset($fisApproved) && $fisApproved == $key): ?>
                                                <option value="<?=$key?>" selected="selected"><?=strip_tags($statusText)?></option>
                                            <? else: ?>
                                                <option value="<?=$key?>"><?=strip_tags($statusText)?></option>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                    <? endif; ?>
                                </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="manage-gallery.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
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
                            <button class="btn btn-info addPopup" data-w="addGalleryWindow">Add New Gallery </button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="galleryTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Gallery Category </th>
                                <th>Gallery Name</th>
                                <th>SEO Url</th>
                                <th>Manage Gallery Image</th>
                                <th class="hidden-sm hidden-md">Sort</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT g.*, 
									(
										SELECT COUNT(*) FROM gallery_images AS gi WHERE gi.gID = g.gID 
									) AS totalImg 
									FROM gallery AS g WHERE  1 = 1
								';
								if($fgCatID > 0 && isset($gCatArr[$fgCatID])){
									$sql .= 'AND g.gCatID = "'.mysql_real_escape_string($fgCatID).'" ';
								}
								
								if($fvalue != ''){
									$sql .= 'AND g.gName LIKE "%'.mysql_real_escape_string($fvalue).'%" ';
								}
								
								if($fisApproved != '' && ($fisApproved == 'Y' || $fisApproved == 'N')){
									$sql .= 'AND g.isApproved = "'.mysql_real_escape_string($fisApproved).'" ';
								}
								
								$sql .= 'ORDER BY g.sOrder ASC';
								
								//echo $sql;
								
								$totalRows = mysql_num_rows(mysql_query($sql));
								$limit = 20;
								
								if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
									$offset = ($_REQUEST['pageNo'] - 1);
								}else {
									$offset = 0;
								}
								
								$sql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <tr class="galleryRow" id="galleryRow<?=$row->gID?>">
                                <td><?=$sNo?></td>
                                <td id="td_gC_<?=$row->gID?>"><?=stripslashes($gCatArr[$row->gCatID])?></td>
                                <td id="td_gN_<?=$row->gID?>"><?=stripslashes($row->gName)?></td>
                                <td id="td_sU_<?=$row->gID?>"><?=stripslashes($row->seoUrl)?></td>
                                <td id="td_mG_<?=$row->gID?>"><a href="manage-gallery-images.php?gID=<?=$row->gID?>">Manage Gallery Image (<?=$row->totalImg?>)</a></td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->gID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->gID?>"></div>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->gID?>" data-a="getGallery" data-u="<?=$formPostUrl?>" data-w="editGalleryWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->gID?>" data-a="delGallery" data-u="<?=$formPostUrl?>" data-at="Gallery" data-numbering="galleryRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
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
                        </table>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                	<div class="pagination">
                    	<?=createPaginationLink($totalRows, $limit)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>