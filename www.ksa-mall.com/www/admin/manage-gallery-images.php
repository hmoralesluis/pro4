<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	
	$gID = (int) $_REQUEST['gID'];

	$gRes = mysql_query('SELECT * FROM gallery WHERE gID = '.$gID.'');
	
	if(mysql_num_rows($gRes) > 0){
		
		$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/gallery/'.$gID.'/';
		$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/gallery/'.$gID.'/';
		$_SESSION['imgManageruploadMaxSize'] = '30M';
		
		$gRow = mysql_fetch_object($gRes);
		
		$header = array(
			'siteTitle' => 'Manage "'.stripslashes($gRow->gName).'" Images', 
			'loginName' => $_SESSION['admin']['name'], 
			'cMenuCat'	=> 'gallery',
			'cMenu'		=> 'manage-gallery', 
			'breadcrumb'=> array(
				array('url' => '', 'text' => 'Manage Gallery Image')
				
			)
		);
	}else{
		$header = array(
			'siteTitle' => 'ERROR! Invalid Gallery.', 
			'loginName' => $_SESSION['admin']['name'], 
			'cMenuCat'	=> 'gallery',
			'cMenu'		=> 'manage-gallery', 
			'breadcrumb'=> array(
				array('url' => '', 'text' => 'Manage Gallery Image')
				
			)
		);
	}
	$formPostUrl = 'manage-gallery-images-post.php';
?>

<? require_once('includes/header.php'); ?>
	<? if($gRow > 0): ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addGiWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Image</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="giRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addGi" />
                    <input type="hidden" name="fa" value="Add" data-tableid="giTable" />
                    <input type="hidden" name="gID" value="<?=$gID?>" />
                    
                    <label for="aImgPath" style="display:block;">Image *</label>
                    <input type="text" class="form-control" name="aImgPath" id="aImgPath" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aImgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Image Url" />
                    <div class="pull-right" style="width:30%; text-align:center;">
                    	<button class="btn btn-primary browseFile" data-f="aSI" data-m="true" title="Browse File">Add Images</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editGiWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Image</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveGi" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="gImgID" id="gImgID" />
                    
                     <label for="eImgPath" style="display:block;">Image *</label>
                    <input type="text" class="form-control" name="eImgPath" id="eImgPath" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eImgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="eImgAlt">Image Alt (optional)</label>
                    <input type="text" class="form-control" name="eImgAlt" id="eImgAlt" value="" />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Gallery Image" />
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
                            <button class="btn btn-info addPopup" data-w="addGiWindow">Add Images</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="giTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Image Path</th>
                                <th style="width: 120px">sOrder</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT * FROM gallery_images WHERE gID ='.$gID.' ORDER BY sOrder 
								';
								//echo $sql;
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <tr class="giRow" id="giRow_<?=$row->gImgID?>">
                                <td><?=$sNo?></td>
                                <td id="td_iP_<?=$gImgID?>">
								<a href="<?=$row->imgPath?>" data-lightbox="image-<?=$gImgID?>" title=""><?=$row->imgPath?></a>
								</td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->gImgID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->gImgID?>"></div>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->gImgID?>" data-a="getGi" data-u="<?=$formPostUrl?>" data-w="editGiWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->gImgID?>" data-a="delGi" data-u="<?=$formPostUrl?>" data-at="Gallery Image" data-numbering="giRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="4" align="center"><span class="text-red">No Records Found</span></td>
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
    <? else: ?>
    <div class="row">
        <div class="col-md-12">
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
                    <div class="table-responsive">
                    <span class="red">Invalid Gallery, or Gallery may be Deleted.</span>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>
    <? endif;?>
    <? 
		$footerscript = '
			<script type="text/javascript">
			function receiveFiles_aSI(files){
				console.log(files);
				
				$.ajax({
					type: "POST",
					data: "a=addImages&gID='.$gID.'.&files="+files,
					url : "'.$formPostUrl.'",
					success: function(jSonData){
						var data = jSonData;
						console.log(data);
						
						if(data.status == 0){
							$("#giTable .errorRow").remove();
							$(data.tbody).appendTo("#giTable tbody");
						}
						
						scrollToDiv("section.content");
						numberingRows("giRow_", 1);
						$("#sMsg").html(data.msg);
					}
				});
			}
		</script>
		';
	?>
<? require_once('includes/footer.php'); ?>