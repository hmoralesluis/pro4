<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';

	$header = array(
		'siteTitle' => 'Manage  Gallery Category', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'gallery',
		'cMenu'		=> 'manage-gallery-category', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage  Gallery Category')
		)
	);
	
	$formPostUrl = 'manage-gallery-category-post.php';
	
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addGcWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Gallery Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="gcRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addGc" />
                    <input type="hidden" name="fa" value="Add" data-tableid="gcTable" />
                    
                    <label for="aGCatName">Gallery Category Name *</label>
                    <input type="text" class="form-control" name="aGCatName" id="aGCatName" value="" required="required" autofocus />
                    
                    <label for="aGCatImg" style="display:block;">Gallery Category Image*</label>
                    <input type="text" class="form-control" name="aGCatImg" id="aGCatImg" style="display:inline-block; width:90%;" required="required" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aGCatImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="aSeoTitle">SEO URL *</label>
                    <input type="text" class="form-control" name="aSeoUrl" id="aSeoUrl" value="" required="required"/>
                    
                    <label for="aSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="aSeoTitle" id="aSeoTitle" value=""  required="required" />
                    
                    <label for="aSeoKeyword">SEO Keywords (optional)</label>
                    <textarea class="form-control" name="aSeoKeyword" id="aSeoKeyword" ></textarea>
                    
                    <label for="aSeoDesc">SEO Description (optional)</label>
                    <textarea class="form-control" name="aSeoDesc" id="aSeoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Gallery Category" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editGcWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Gallery Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveGc" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="gCatID" id="gCatID" />
                    
                    <label for="eGCatName">Gallery Category Name *</label>
                    <input type="text" class="form-control" name="eGCatName" id="eGCatName" value="" required="required" autofocus />
                    
                    <label for="eGCatImg" style="display:block;">Gallery Category Image*</label>
                    <input type="text" class="form-control" name="eGCatImg" id="eGCatImg" style="display:inline-block; width:90%;" required="required" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eGCatImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="eSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eSeoUrl" id="eSeoUrl" value="" required="required"/>
                    
                    <label for="eSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="eSeoTitle" id="eSeoTitle" value=""  required="required" />
                    
                    <label for="eSeoKeyword">SEO Keywords (optional)</label>
                    <textarea class="form-control" name="eSeoKeyword" id="eSeoKeyword"></textarea>
                    
                    <label for="eSeoDesc">SEO Description (optional)</label>
                    <textarea class="form-control" name="eSeoDesc" id="eSeoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Gallery Category" />
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
                            <button class="btn btn-info addPopup" data-w="addGcWindow">Add New Gallery Category</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="gcTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Gallery Category Name</th>
                                <th>SEO Url</th>
                                <th class="hidden-sm hidden-md">Sort</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT * FROM gallery_cat ORDER BY sOrder
								';
								//echo $sql;
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <tr class="gcRow" id="gcRow_<?=$row->gCatID?>">
                                <td><?=$sNo?></td>
                                <td id="td_cN_<?=$row->gCatID?>"><?=stripslashes($row->gCatName)?></td>
                                <td id="td_sU_<?=$row->gCatID?>"><?=stripslashes($row->seoUrl)?></td>
                                </td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->gCatID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->gCatID?>"></div>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->gCatID?>" data-a="getGc" data-u="<?=$formPostUrl?>" data-w="editGcWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->gCatID?>" data-a="delGc" data-u="<?=$formPostUrl?>" data-at="Gallery Category" data-numbering="gcRow" data-column="1" >
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
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>