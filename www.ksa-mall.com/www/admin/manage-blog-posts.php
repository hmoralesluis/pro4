<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	$header = array(
		'siteTitle' => 'Manage Blog Posts', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'blog-posts-&-comments',
		'cMenu'		=> 'manage-blog-posts', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Blog Posts')
		)
	);
	
	$formPostUrl = 'manage-blog-posts-post.php';
	
	$userArr = array();
	$userRes = mysql_query('SELECT * FROM users ORDER BY email ASC');
	if(mysql_num_rows($userRes) > 0){
		while($userRow = mysql_fetch_object($userRes)){
			$userArr[$userRow->userID] = stripslashes($userRow->email.' ('.$userRow->fullname.')');
		}
	}
	
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addBpWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Blog Post</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="bpRow" data-column="1" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addBp" />
                    <input type="hidden" name="fa" value="Add" data-tableid="bpTable" />
                	
                    <label for="aBpTitle">Blog Title </label>
                    <input type="text" class="form-control" name="aBpTitle" id="aBpTitle" value="" />
                    
                    <label for="aBpImg" style="display:block;">Blog Image *</label>
                    <input type="text" class="form-control" name="aBpImg" id="aBpImg" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aBpImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="aBpShortDesc">Blog  Short Description *</label>
                    <textarea class="form-control" name="aBpShortDesc" id="aBpShortDesc" required="required"></textarea>
                    
                    <label for="aBpDescription">Blog Description </label>
                    <textarea class="form-control htmlEditor" name="aBpDescription" id="aBpDescription" ></textarea>
                    <br />
                    <label for="aBpTag">Blog Tag</label>
                    <textarea class="form-control" name="aBpTag" id="aBpTag" ></textarea>
                    
                    <label for="aSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aSeoUrl" id="aSeoUrl" value="" required />
                    
                    <label for="aSeoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="aSeoTitle" id="aSeoTitle" value="" />
                    
                    <label for="aSeoKeywords">SEO Keywords </label>
                    <textarea class="form-control" name="aSeoKeywords" id="aSeoKeywords"></textarea>
                    
                    <label for="aSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="aSeoDesc" id="aSeoDesc"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Blog Post" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editBpWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Blog Post</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveBp" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="bpID" id="bpID" />
                    
                	<label for="eUserID">User *</label>
                    <select class="select2" name="eUserID" id="eUserID" autofocus style="display:block">
      					<option value="0">Admin</option>
                        <? if(count($userArr) > 0): ?>
							<? foreach($userArr as $key => $uDetail): ?>
                                <option value="<?=$key?>"><?=$uDetail?></option>
                            <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    <label for="eBpTitle">Blog Title </label>
                    <input type="text" class="form-control" name="eBpTitle" id="eBpTitle" value="" />
                    
                    <label for="eBpImg" style="display:block;">Blog Image *</label>
                    <input type="text" class="form-control" name="eBpImg" id="eBpImg" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eBpImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="eBpShortDesc">Blog  Short Description *</label>
                    <textarea class="form-control" name="eBpShortDesc" id="eBpShortDesc" required="required"></textarea>
                    
                    <label for="eBpDescription">Blog Description </label>
                    <textarea class="form-control htmlEditor" name="eBpDescription" id="eBpDescription" ></textarea>
                    <br />
                    <label for="eBpTag">Blog Tag</label>
                    <textarea class="form-control" name="eBpTag" id="eBpTag" ></textarea>
                    
                    <label for="eSeoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eSeoUrl" id="eSeoUrl" value="" required />
                    
                    <label for="eSeoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="eSeoTitle" id="eSeoTitle" value="" />
                    
                    <label for="eSeoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="eSeoKeywords" id="eSeoKeywords"></textarea>
                    
                    <label for="eSeoDesc">SEO Description (Optional)</label>
                    <textarea class="form-control" name="eSeoDesc" id="eSeoDesc"></textarea>
                    
                    <label for="eIsApproved">Approved *</label>
                    <select class="form-control" name="eIsApproved" id="eIsApproved" required="required">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Blog Post" />
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
                            <button class="btn btn-info addPopup" data-w="addBpWindow">Add New Blog Post</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="bpTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>User</th>
                                <th>Blog Title</th>
                                <th>Added On</th>
                                <th>Approved</th>
                                <th>Seo Url</th>
                                <th style="width: 120px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT * FROM blog_posts 
								';
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $userID = $row->userID;?>
                            <tr class="bpRow" id="bpRow_<?=$row->bpID?>">
                                <td><?=$sNo?></td>
                                <? if($userID == 0):?>
                                <td id="td_u_<?=$row->bpID?>">Admin</td>
                                <? else:?>
                                <td id="td_u_<?=$row->bpID?>"><?=stripslashes($userArr[$userID])?></td>
                                <? endif;?>
                                <td id="td_bT_<?=$row->bpID?>"><?=stripslashes($row->bpTitle)?></td>
                                 <td id="td_aO_<?=$row->bpID?>"><?=stripslashes($row->addedOn)?></td>
                                <td id="td_iA_<?=$row->bpID?>"><?=stripslashes($yesNoArr[$row->isApproved])?></td>
                                <td id="td_sU_<?=$row->bpID?>"><?=stripslashes($row->seoUrl)?></td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$row->bpID?>" data-a="getBp" data-u="<?=$formPostUrl?>" data-w="editBpWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->bpID?>" data-a="delBp" data-u="<?=$formPostUrl?>" data-at="Blog Post" data-numbering="bpRow" data-column="1" >
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
    <? $footerscript = ''?>
<? require_once('includes/footer.php'); ?>