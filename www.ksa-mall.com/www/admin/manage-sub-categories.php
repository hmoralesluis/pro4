<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	$parentID = (int) $_REQUEST['parentID'];
	
	$parentRes = mysql_query('SELECT * FROM category WHERE catID = '.$parentID);
	
	if(mysql_num_rows($parentRes) > 0){
		$parentRow = mysql_fetch_object($parentRes);
		$catName = stripslashes($parentRow->catName);
		
		$header = array(
			'siteTitle' => 'Manage "'.$catName.'" Sub Categories', 
			'loginName' => $_SESSION['admin']['name'], 
			'cMenuCat'	=> 'users-&-listings',
			'cMenu'		=> 'manage-categories', 
			'breadcrumb'=> array(
				array('url' => 'manage-categories.php', 'text' => 'Manage Categories'),
				array('url' => '', 'text' => 'Manage "'.$catName.'" Sub Categories')
			)
		);
		
		$formPostUrl = 'manage-sub-categories-post.php';
	}else {
		$header = array(
			'siteTitle' => 'Error Manage Sub Categories', 
			'loginName' => $_SESSION['admin']['name'], 
			'cMenuCat'	=> 'users-&-listings',
			'cMenu'		=> 'manage-categories', 
			'breadcrumb'=> array(
				array('url' => 'manage-categories.php', 'text' => 'Manage Categories'),
				array('url' => '', 'text' => 'Error Manage Sub Categories')
			)
		);
	}
?>

<? require_once('includes/header.php'); ?>
	<? if(isset($parentRow)): ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addCategoryWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Sub Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="categoryRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addCategory" />
                    <input type="hidden" name="fa" value="Add" data-tableid="categoryTable" />
                    <input type="hidden" name="parentID" value="<?=$parentID?>" />
                    
                    <label for="acatName">Sub Category Name *</label>
                    <input type="text" class="form-control" name="acatName" id="acatName" value="" required="required" autofocus="autofocus" />
                    
                    <label for="aimgPath" style="display:block;">Image *</label>
                    <input type="text" class="form-control" name="aimgPath" id="aimgPath" style="display:inline-block; width:90%;" required="required" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    
                    <label for="acatDesc">Description *</label>
                    <textarea class="form-control htmlEditor" name="acatDesc" id="acatDesc"></textarea>
                    <br />
                    
                    <label for="acatSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="acatSeoUrl" id="acatSeoUrl" value="" required="required" />
                    
                    <label for="acatSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="acatSeoTitle" id="acatSeoTitle" value="" required="required" />
                    
                    <label for="acatSeoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="acatSeoKeywords" id="acatSeoKeywords"></textarea>
                    
                    <label for="acatSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="acatSeoDesc" id="acatSeoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Sub Category" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editCategoryWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Sub Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveCategory" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="catID" id="catID" />
                    
                    <label for="ecatName">Sub Category Name *</label>
                    <input type="text" class="form-control" name="ecatName" id="ecatName" value="" required="required" autofocus="autofocus" />
                    
                    <label for="eimgPath" style="display:block;">Image *</label>
                    <input type="text" class="form-control" name="eimgPath" id="eimgPath" style="display:inline-block; width:90%;" required="required" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    
                    <label for="ecatDesc">Description *</label>
                    <textarea class="form-control htmlEditor" name="ecatDesc" id="ecatDesc"></textarea>
                    <br />
                    
                    <label for="ecatSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="ecatSeoUrl" id="ecatSeoUrl" value="" required="required" />
                    
                    <label for="ecatSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="ecatSeoTitle" id="ecatSeoTitle" value="" required="required" />
                    
                    <label for="ecatSeoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="ecatSeoKeywords" id="ecatSeoKeywords"></textarea>
                    
                    <label for="ecatSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="ecatSeoDesc" id="ecatSeoDesc"></textarea>
                    
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">Deactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Sub Category" />
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
                            <button class="btn btn-info addPopup" data-w="addCategoryWindow">Add New Sub Category</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="categoryTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Sub Category Name</th>
                                <th>SEO Url</th>
                                <th class="hidden-sm hidden-md">Manage Listings</th>
                                <th class="hidden-sm hidden-md">Sort</th>
                                <th class="hidden-sm hidden-md" style="text-align:center;">Status</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT c.*, 
									(
										SELECT COUNT(*) FROM businesslistings AS ls WHERE 1 = 1 
										AND FIND_IN_SET(c.catID, ls.subCatIDs) 
									) AS totalListings 
									FROM category AS c 
									WHERE c.parentID = '.$parentID.' 
									ORDER BY c.sOrder ASC
								';
								//echo $sql;
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <tr class="categoryRow" id="categoryRow_<?=$row->catID?>">
                                <td><?=$sNo?></td>
                                <td id="td_cN_<?=$row->catID?>"><?=$row->catName?></td>
                                <td id="td_sU_<?=$row->catID?>"><?=$row->catSeoUrl?></td>
                                <td>
                                <a href="manage-business-listings.php?catID=<?=$parentID?>&subCatID=<?=$row->catID?>" title="Manage Listings">
                                Manage Listings (<?=$row->totalListings?>)
                                </a>
                                </td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->catID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->catID?>"></div>
                                </td>
                                <td id="td_s_<?=$row->catID?>" align="center"><?=$statusArr[$row->status]?></td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->catID?>" data-a="getCategory" data-u="<?=$formPostUrl?>" data-w="editCategoryWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->catID?>" data-a="delCategory" data-u="<?=$formPostUrl?>" data-at="Category" data-numbering="categoryRow" data-column="1" >
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
                    <span class="red">ERROR! Root Category not Found, Or Category Deleted.</span>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>
    <? endif; ?>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>