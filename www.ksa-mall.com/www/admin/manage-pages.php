<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Manage Pages', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'manage-contents',
		'cMenu'		=> 'manage-pages', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Pages')
		)
	);
	
	$formPostUrl = 'manage-pages-post.php';
	
	$countries = array();
	$countryRes = mysql_query('SELECT countryID, countryName FROM countries ORDER BY countryName ASC');
	if(mysql_num_rows($countryRes) > 0){
		while($countryRow = mysql_fetch_object($countryRes)){
			$countries[] = $countryRow;
		}
	}
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addPageWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Add Page</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="pageRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addPage" />
                    <input type="hidden" name="fa" value="Add" data-tableid="pageTable" />
                
                    <label for="apageName">Page Name *</label>
                    <input type="text" class="form-control" name="apageName" id="apageName" value="" required="required" autofocus="autofocus" />
                    
                    <label for="apageDesc">Page Details *</label>
                    <textarea class="form-control htmlEditor" name="apageDesc" id="apageDesc"></textarea>
                    <br />
                    
                    <label for="atags">Tags (Optional)</label>
                    <textarea class="form-control" name="atags" id="atags"></textarea>
                    
                    <label for="aseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aseoUrl" id="aseoUrl" value="" required="required" />
                    
                    <label for="aseoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="aseoTitle" id="aseoTitle" value="" required="required" />
                    
                    <label for="aseoKeyword">SEO Keyword (optional)</label>
                    <textarea class="form-control" name="aseoKeyword" id="aseoKeyword"></textarea>
                    
                    <label for="aseoDesc">SEO Description (optional)</label>
                    <textarea class="form-control" name="aseoDesc" id="aseoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Page" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editPageWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit Page</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="savePage" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="pageID" id="pageID" />
                    
                    <label for="epageName">Page Name *</label>
                    <input type="text" class="form-control" name="epageName" id="epageName" value="" required="required" autofocus="autofocus" />
                    
                    <label for="epageDesc">Page Details *</label>
                    <textarea class="form-control htmlEditor" name="epageDesc" id="epageDesc"></textarea>
                    <br />
                    
                    <label for="etags">Tags (Optional)</label>
                    <textarea class="form-control" name="etags" id="etags"></textarea>
                    
                    <label for="eseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="" required="required" />
                    
                    <label for="eseoTitle">SEO Title *</label>
                    <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="" required="required" />
                    
                    <label for="eseoKeyword">SEO Keyword (optional)</label>
                    <textarea class="form-control" name="eseoKeyword" id="eseoKeyword"></textarea>
                    
                    <label for="eseoDesc">SEO Description (optional)</label>
                    <textarea class="form-control" name="eseoDesc" id="eseoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Page" />
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
                            <button class="btn btn-info addPopup" data-w="addPageWindow">Add New Page</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="pageTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Page Name</th>
                                <th class="hidden-sm hidden-md">Seo URL</th>
                                <th class="hidden-sm hidden-md">Seo Title</th>
                                <th class="hidden-sm hidden-md">Seo Keyword</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT * 
									FROM pages 
									ORDER BY pageID ASC 
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $value = stripslashes($row->sValue); ?>
                            <tr class="pageRow" id="pageRow_<?=$row->pageID?>">
                                <td><?=$sNo?></td>
                                <td id="td_pN_<?=$row->pageID?>"><?=stripslashes($row->pageName).' ['.$row->pageID.']'?></td>
                                <td id="td_sU_<?=$row->pageID?>"><?=stripslashes($row->seoUrl)?></td>
                                <td id="td_sT_<?=$row->pageID?>"><?=stripslashes($row->seoTitle)?></td>
                                <td id="td_sK_<?=$row->pageID?>"><?=stripslashes($row->seoKeyword)?></td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->pageID?>" data-a="getPage" data-u="<?=$formPostUrl?>" data-w="editPageWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->pageID?>" data-a="delPage" data-u="<?=$formPostUrl?>" data-at="Page" data-numbering="pageRow" data-column="1" >
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