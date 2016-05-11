<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	$header = array(
		'siteTitle' => 'Manage Country Posts', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'manage-contents',
		'cMenu'		=> 'manage-country-posts', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage CountryPosts')
		)
	);
	
	$formPostUrl = 'manage-country-posts-post.php';
	
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
    <div class="popupWrapper" id="addLbpWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Country Post</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="lbpRow" data-column="1" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addLbp" />
                    <input type="hidden" name="fa" value="Add" data-tableid="lbpTable" />
                	
                    <label for="albpTitle">Country Title </label>
                    <input type="text" class="form-control" name="albpTitle" id="albpTitle" value="" />
                    
                    <label for="albpImg" style="display:block;">Country Image *</label>
                    <input type="text" class="form-control" name="albpImg" id="albpImg" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="albpImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="albpShortDesc">Country Short Description *</label>
                    <textarea class="form-control" name="albpShortDesc" id="albpShortDesc" required="required"></textarea>
                    
                    <label for="albpDescription">Country Description </label>
                    <textarea class="form-control htmlEditor" name="albpDescription" id="albpDescription" ></textarea>
                    <br />
                    <label for="albpTag">Country Tag</label>
                    <textarea class="form-control" name="albpTag" id="albpTag" ></textarea>
                    
                    <label for="aseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="aseoUrl" id="aseoUrl" value="" required />
                    
                    <label for="aseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="aseoTitle" id="aseoTitle" value="" />
                    
                    <label for="aseoKeywords">SEO Keywords </label>
                    <textarea class="form-control" name="aseoKeywords" id="aseoKeywords"></textarea>
                    
                    <label for="aseoDescription">SEO Description (Optional)</label>
                    <textarea class="form-control" name="aseoDescription" id="aseoDescription"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Country Post" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editBpWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Country Post</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveLbp" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="lbpID" id="lbpID" />
                    
                	<label for="euserID">User *</label>
                    <select class="select2" name="euserID" id="euserID" autofocus style="display:block">
      					<option value="0">Admin</option>
                        <? if(count($userArr) > 0): ?>
							<? foreach($userArr as $key => $uDetail): ?>
                                <option value="<?=$key?>"><?=$uDetail?></option>
                            <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    <label for="eBpTitle">Country Title </label>
                    <input type="text" class="form-control" name="eBpTitle" id="eBpTitle" value="" />
                    
                    <label for="elbpImg" style="display:block;">Country Image *</label>
                    <input type="text" class="form-control" name="elbpImg" id="elbpImg" style="display:inline-block; width:90%;" required/>
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="elbpImg" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="elbpShortDesc">Country Short Description *</label>
                    <textarea class="form-control" name="elbpShortDesc" id="elbpShortDesc" required="required"></textarea>
                    
                    <label for="elbpDescription">Country Description </label>
                    <textarea class="form-control htmlEditor" name="elbpDescription" id="elbpDescription" ></textarea>
                    <br />
                    <label for="elbpTag">Country Tag</label>
                    <textarea class="form-control" name="elbpTag" id="elbpTag" ></textarea>
                    
                    <label for="eseoUrl">SEO URL *</label>
                    <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="" required />
                    
                    <label for="eseoTitle">SEO Title (Optional)</label>
                    <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="" />
                    
                    <label for="eseoKeywords">SEO Keywords (Optional)</label>
                    <textarea class="form-control" name="eseoKeywords" id="eseoKeywords"></textarea>
                    
                    <label for="eseoDescription">SEO Description (Optional)</label>
                    <textarea class="form-control" name="eseoDescription" id="eseoDescription"></textarea>
                    
                    <label for="eIsApproved">Approved *</label>
                    <select class="form-control" name="eIsApproved" id="eIsApproved" required="required">
                        <option value="Y">Yes</option>
                        <option value="N">No</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Country Post" />
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
                            <button class="btn btn-info addPopup" data-w="addLbpWindow">Add New Country Post</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="lbpTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>User</th>
                                <th>Country Title</th>
                                <th>Added On</th>
                                <th>Approved</th>
                                <th>Seo Url</th>
                                <th width="120">Sort</th>
                                <th style="width: 120px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = '
									SELECT * FROM lebanon_posts 
								';
								
								$sql .= 'ORDER BY sOrder ASC';
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $userID = $row->userID;?>
                            <tr class="lbpRow" id="lbpRow_<?=$row->lbpID?>">
                                <td><?=$sNo?></td>
                                <? if($userID == 0):?>
                                <td id="td_u_<?=$row->lbpID?>">Admin</td>
                                <? else:?>
                                <td id="td_u_<?=$row->lbpID?>"><?=stripslashes($userArr[$userID])?></td>
                                <? endif;?>
                                <td id="td_bT_<?=$row->lbpID?>"><?=stripslashes($row->lbpTitle)?></td>
                                <td id="td_aO_<?=$row->lbpID?>"><?=stripslashes($row->addedOn)?></td>
                                <td id="td_iA_<?=$row->lbpID?>"><?=stripslashes($yesNoArr[$row->isApproved])?></td>
                                <td id="td_sU_<?=$row->lbpID?>"><?=stripslashes($row->seoUrl)?></td>
                                <td width="120">
                                    <div class="pull-left" style="width:60%">
                                    <input type="text"class="form-control sortThis" value="<?=$row->sOrder?>" data-url="<?=$formPostUrl?>" data-a="sortThis" data-wid="<?=$row->lbpID?>" data-resultprefix="sSort_" />
                                    </div>
                                    <div class="pull-right" style="width:30%;" id="sSort_<?=$row->lbpID?>"></div>
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$row->lbpID?>" data-a="getLbp" data-u="<?=$formPostUrl?>" data-w="editBpWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->lbpID?>" data-a="delLbp" data-u="<?=$formPostUrl?>" data-at="Country Post" data-numbering="lbpRow" data-column="1" >
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
                            <tfoot>
                            <tr class="errorRow">
                            	<td colspan="6" align="center"></td>
                                <td align="center">
                                <a href="" title="Update Sort Order" class="btn btn-info">Update</a>
                                </td>
                                <td align="center">&nbsp;</td>
                            </tr>
                            </tfoot>
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