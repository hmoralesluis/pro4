<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	$header = array(
		'siteTitle' => 'Manage Settings', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'settings',
		'cMenu'		=> 'manage-settings', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Settings')
		)
	);
	
	$formPostUrl = 'manage-settings-post.php';
	
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
    <div class="popupWrapper" id="addSettingWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Add Setting</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="settingRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addSetting" />
                    <input type="hidden" name="fa" value="Add" data-tableid="settingTable" />
                
                    <label for="asName">Setting Name *</label>
                    <input type="text" class="form-control" name="asName" id="asName" value="" required autofocus />
                    
                    <label for="asValue" style="display:block;">Value (Optional)</label>
                    <input type="text" class="form-control" name="asValue" id="asValue" style="display:inline-block; width:90%;" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="asValue" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Setting" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editSettingWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit Setting</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveSetting" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="sID" id="sID" />
                    
                    <label for="esName">Setting Name *</label>
                    <input type="text" class="form-control" name="esName" id="esName" value="" required autofocus />
                    
                    <label for="esValue" style="display:block;">Value (Optional)</label>
                    <input type="text" class="form-control" name="esValue" id="esValue" style="display:inline-block; width:90%;" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="esValue" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Setting" />
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
                            <button class="btn btn-info addPopup" data-w="addSettingWindow">Add New Setting</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="settingTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th width="300">Setting Name</th>
                                <th class="hidden-sm hidden-md">Value</th>
                                <th style="width: 100px">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT * 
									FROM settings 
									ORDER BY sID ASC 
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $value = stripslashes($row->sValue); ?>
                            <tr class="settingRow" id="settingRow_<?=$row->sID?>">
                                <td><?=$sNo?></td>
                                <td id="td_sN_<?=$row->sID?>"><?=stripslashes($row->sName).' ['.$row->sID.']'?></td>
                                <td id="td_sV_<?=$row->sID?>">
								<? if(preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $value)): ?>
                                	<a href="<?=$value?>" data-lightbox="image-<?=$row->sID?>" title=""><?=$value?></a>
								<? elseif(substr($row->sValue, 0, 4) == 'http'): ?>
                                	<a href="<?=$value?>" target="_blank" title=""><?=$value?></a>
                                <? else: ?>
									<?=htmlentities($value)?>
                                <? endif; ?>
                                </td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->sID?>" data-a="getSetting" data-u="<?=$formPostUrl?>" data-w="editSettingWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <?php /*?><button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->sID?>" data-a="delSetting" data-u="<?=$formPostUrl?>" data-at="Setting" data-numbering="settingRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button><?php */?>
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
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>