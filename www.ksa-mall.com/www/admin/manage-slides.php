<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage Slides', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'manage-contents',
		'cMenu'		=> 'manage-slides', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Slides')
		)
	);
	
	$formPostUrl = 'manage-slides-post.php';
?>

<? require_once('includes/header.php'); ?>
	<?
		$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/slides/';
		$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/slides/';
		$_SESSION['imgManageruploadMaxSize'] = '500K';
	?>
	<!-- Modal -->
    <div class="popupWrapper" id="editSlideWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit Slide</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveSlide" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="slideID" id="slideID" />
                    
                    <label for="eimgPath" style="display:block;">Slide Image *</label>
                    <input type="text" class="form-control" name="eimgPath" id="eimgPath" style="display:inline-block; width:90%;" autofocus="autofocus" required="required" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="esValue" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    
                    <label for="eimgAlt">Image Alt Tag (Optional)</label>
                    <input type="text" class="form-control" name="eimgAlt" id="eimgAlt" value="" />
                    
                    <label for="elink">Link (Optional)</label>
                    <input type="text" class="form-control" name="elink" id="elink" value="" />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Slide" />
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
                            <button class="btn btn-success browseFile" data-f="aSI" data-m="true" title="Browse File">Add Slides</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="slideTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Slide Image</th>
                                <th class="hidden-sm hidden-md">Image Alt</th>
                                <th class="hidden-sm hidden-md">Link</th>
                                <th class="hidden-sm hidden-md" width="170">Sort Order</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT * 
									FROM slides 
									ORDER BY sOrder ASC 
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $imgPath = stripslashes($row->imgPath); ?>
                            <tr class="slideRow" id="slideRow_<?=$row->slideID?>">
                                <td><?=$sNo?></td>
                                <td id="td_iP_<?=$row->slideID?>">
								<a href="<?=$imgPath?>" data-lightbox="image-1" title=""><?=$imgPath?></a>
                                </td>
                                <td id="td_sC_<?=$row->slideID?>"><?=stripslashes($row->imgAlt)?></td>
                                <td id="td_sL_<?=$row->slideID?>"><?=stripslashes($row->link)?></td>
                                <td width="120">
                                	<div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->slideID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->slideID?>"></div>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->slideID?>" data-a="getSlide" data-u="<?=$formPostUrl?>" data-w="editSlideWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->slideID?>" data-a="delSlide" data-u="<?=$formPostUrl?>" data-at="Slide" data-numbering="slideRow" data-column="1" >
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
    <?
	$footerscript = '
    <script type="text/javascript">
		function receiveFiles_aSI(files){
			console.log(files);
			
			$.ajax({
				type: "POST",
				data: "a=addSlides&files="+files,
				url : "'.$formPostUrl.'",
				success: function(jSonData){
					var data = jSonData;
					console.log(data);
					
					if(data.status == 0){
						$("#slideTable .errorRow").remove();
						$(data.tbody).appendTo("#slideTable tbody");
					}
					
					scrollToDiv("section.content");
					numberingRows("slideRow", 1);
					$("#sMsg").html(data.msg);
				}
			});
		}
	</script>
	';
	?>
<? require_once('includes/footer.php'); ?>