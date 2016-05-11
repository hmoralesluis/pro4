<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'User News', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'users-&-listings',
		'cMenu'		=> 'user-latest-news', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage User News')
		)
	);
	
	$formPostUrl = 'user-latest-news-post.php';
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addNewsWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Add User News</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="userNewsRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addNews" />
                    <input type="hidden" name="fa" value="Add" data-tableid="newsTable" />
                
                    <label for="atitle">Title *</label>
                    <input type="text" class="form-control" name="atitle" id="atitle" value="" required="required" autofocus="autofocus" />
                    
                    <label for="ashortDescription">Short Description *</label>
                    <textarea class="form-control" name="ashortDescription" id="ashortDescription"></textarea>
                    
                    <label for="adescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="adescription" id="adescription"></textarea>
                    <br />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add News" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editNewsWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit User News</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveNews" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="newsID" id="newsID" />
                    
                    <label for="etitle">Title *</label>
                    <input type="text" class="form-control" name="etitle" id="etitle" value="" required="required" autofocus="autofocus" />
                    
                    <label for="eshortDescription">Short Description *</label>
                    <textarea class="form-control" name="eshortDescription" id="eshortDescription"></textarea>
                    
                    <label for="edescription">Description *</label>
                    <textarea class="form-control htmlEditor" name="edescription" id="edescription"></textarea>
                    <br />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save News" />
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
                            <button class="btn btn-info addPopup" data-w="addNewsWindow">Add News</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="newsTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th width="400">News Title</th>
                                <th>Short Description</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT * 
									FROM user_latestnews 
									ORDER BY addedOn DESC 
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $value = stripslashes($row->sValue); ?>
                            <tr class="userNewsRow" id="newsRow_<?=$row->newsID?>">
                                <td><?=$sNo?></td>
                                <td id="td_nT_<?=$row->newsID?>" width="400"><?=stripslashes($row->title)?></td>
                                <td id="td_sD_<?=$row->newsID?>"><?=stripslashes($row->shortDescription)?></td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->newsID?>" data-a="getNews" data-u="<?=$formPostUrl?>" data-w="editNewsWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->newsID?>" data-a="delNews" data-u="<?=$formPostUrl?>" data-at="User News" data-numbering="userNewsRow" data-column="1" >
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