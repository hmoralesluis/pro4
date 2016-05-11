<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Categories')
	$header = array(
		'siteTitle' => 'Manage Product Categories', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'e-store',
		'cMenu'		=> 'manage-product-categories', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Product Categories')
		)
	);
	
	$formPostUrl = 'manage-product-categories-post.php';
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addPcWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Product Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="pcRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addPc" />
                    <input type="hidden" name="fa" value="Add" data-tableid="pcTable" />
                
                    <label for="apCatName">Product Category Name *</label>
                    <input type="text" class="form-control" name="apCatName" id="apCatName" value="" required autofocus />
                    
                    <label for="acatDesc">Description *</label>
                    <textarea class="form-control htmlEditor" name="acatDesc" id="acatDesc"></textarea>
                    <br />
                    
                    <label for="acatSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="acatSeoUrl" id="acatSeoUrl" value="" required />
                    
                    <label for="acatSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="acatSeoTitle" id="acatSeoTitle" value="" required />
                    
                    <label for="acatSeoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="acatSeoKeywords" id="acatSeoKeywords"></textarea>
                    
                    <label for="acatSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="acatSeoDesc" id="acatSeoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Product Category" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editPcWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Product Category</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="savePc" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="pCatID" id="pCatID" />
                    
                    <label for="epCatName">Product Category Name *</label>
                    <input type="text" class="form-control" name="epCatName" id="epCatName" value="" required autofocus />
                    
                    <label for="ecatDesc">Description *</label>
                    <textarea class="form-control htmlEditor" name="ecatDesc" id="ecatDesc"></textarea>
                    <br />
                    
                    <label for="ecatSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="ecatSeoUrl" id="ecatSeoUrl" value="" required />
                    
                    <label for="ecatSeoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="ecatSeoTitle" id="ecatSeoTitle" value="" required />
                    
                    <label for="ecatSeoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="ecatSeoKeywords" id="ecatSeoKeywords"></textarea>
                    
                    <label for="ecatSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="ecatSeoDesc" id="ecatSeoDesc"></textarea>
                    
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">Deactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Product Category" />
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
                            <button class="btn btn-info addPopup" data-w="addPcWindow">Add New Product Category</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="pcTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Product Category Name</th>
                                <th>SEO Url</th>
                                <th>Manage Sub Product Categories</th>
                                <th class="hidden-sm hidden-md">Sort</th>
                                <th class="hidden-sm hidden-md" style="text-align:center;">Status</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT pc.*, 
									(
										SELECT COUNT(*) FROM product_cat AS sc WHERE sc.parentID = pc.pCatID 
									) AS totalSCs 
									FROM product_cat AS pc 
									WHERE pc.parentID = 0 
									ORDER BY pc.sOrder ASC
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $pCategoryUrl = 'http://'.$row->catSeoUrl.'.'.$domain; ?>
                            <tr class="pcRow" id="pcRow<?=$row->pCatID?>">
                                <td><?=$sNo?></td>
                                <td id="td_cN_<?=$row->pCatID?>"><?=$row->pCatName?></td>
                                <td id="td_sU_<?=$row->pCatID?>">
								<a href="<?=$categoryUrl?>" title="View Category in Website" target="_blank"><?=$pCategoryUrl?></a>
                                </td>
                                <td>
                                <a href="manage-product-sub-categories.php?parentID=<?=$row->pCatID?>" title="Manage Sub Product Categories">
                                Sub Product Category (<?=$row->totalSCs?>)
                                </a>
                                </td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->pCatID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->pCatID?>"></div>
                                </td>
                                <td id="td_s_<?=$row->pCatID?>" align="center"><?=$statusArr[$row->status]?></td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->pCatID?>" data-a="getPc" data-u="<?=$formPostUrl?>" data-w="editPcWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->pCatID?>" data-a="delPc" data-u="<?=$formPostUrl?>" data-at="Product Category" data-numbering="pcRow" data-column="1" >
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
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>