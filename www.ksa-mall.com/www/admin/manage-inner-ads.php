<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	 #Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Categories')
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
	
	$header = array(
		'siteTitle' => 'Manage Inner Ads', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'advertisement-&-banners',
		'cMenu'		=> 'manage-inner-ads', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Inner Ads')
		)
	);
	$formPostUrl = 'manage-inner-ads-post.php';
	
	$date		= date('Y-m-d');
   	$expiryy	= date('d-m-Y', strtotime("+12 months $date"));
?>
<? require_once('includes/header.php'); ?>
<!-- Modal -->
    <div class="popupWrapper" id="addBannerWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Add Banner</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="bannerRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addBanner" />
                    <input type="hidden" name="fa" value="Add" data-tableid="bannerTable" />
                
                    <label for="aBSize">Banner Size *</label>
                    <select class="form-control" name="aBSize" id="aBSize" required="required">
                        <option value="1">1000px</option>
                        <option value="4">490px</option>
                    </select>
                    
                    <label for="aBTitle">Banner Title *</label>
                    <input type="text" class="form-control" name="aBTitle" id="aBTitle" value="" required />
                    
                    <label for="aimgPath" style="display:block;">Image </label>
                    <input type="text" class="form-control" name="aimgPath" id="aimgPath" style="display:inline-block; width:90%;" />
                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="aimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                    <br />
                    <label for="aImgAlt">Image Alt (Optional)</label>
                    <input type="text" class="form-control" name="aImgAlt" id="aImgAlt" value="" />
                    
                    <label for="aLink">Link *</label>
                    <input type="text" class="form-control" name="aLink" id="aLink" value="" required />

                    <label for="aAd">Advert Text </label>
                    <textarea class="form-control" name="aAd" id="aAd" value=""></textarea> 
                    
                    <label for="aExpiry">Expiry On *</label>
                    <input type="text" name="aExpiry" id="aExpiry" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" placeholder="Expiry On" value="<?=$expiryy?>" />
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Banner" />
                </form>
                </div>
            </div>
        </div>
    </div>

    <div class="popupWrapper" id="editBannerWindow">
        <div class="popupWindow" style="min-width:70%">
            <div class="titleBar"><span>Edit Banner</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveBanner" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="bannerID" id="bannerID" />
                    
                    <label for="eBSize">Banner Size *</label>
                    <select class="form-control" name="eBSize" id="eBSize" required="required">
                        <option value="1">1000px</option>
                        <option value="4">490px</option>
                    </select>
                    
                    <label for="eBTitle">Banner Title *</label>
                    <input type="text" class="form-control" name="eBTitle" id="eBTitle" value="" required />
                    
                    <label for="eImgPath" style="display:block;">Image </label>
                    <input type="hidden" class="form-control" name="eImgPath" id="eImgPath" style="display:inline-block; width:90%;"  />
                    <a href="javascript:void(0)" class="browseFile browserFileThumb" title="Browse File" data-f="eImgPath" data-m="false"  data-p ="eImgPathPreview" style="display:inline-block;"><img src=""  alt="" id="eImgPathPreview"/></a>

                    <br/>
                    <label for="eImgAlt">Image Alt (Optional)</label>
                    <input type="text" class="form-control" name="eImgAlt" id="eImgAlt" value="" />
                    
                    <label for="eLink">Link *</label>

                    <input type="text" class="form-control" name="eLink" id="eLink" value="" required/>
                    <label for="aAd">Advert Text </label>
                    <textarea class="form-control" name="eAd" id="eAd" value=""></textarea> 
                    
                    <label for="eExpiry">Expiry On *</label>
                    <input type="text" name="eExpiry" id="eExpiry" class="form-control datePicker" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-date-format="dd-mm-yyyy" style="width:120px;" placeholder="Expiry On" value="<?=$expiryy?>" />
                    
                    <label for="eStatus">Status *</label>
                    <select class="form-control" name="eStatus" id="eStatus" required="required">
                        <option value="A">Active</option>
                        <option value="D">Deactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Banner" />
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
                            <button class="btn btn-info addPopup" data-w="addBannerWindow">Add New Banner</button>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <table class="table table-striped" id="bannerTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Size</th>
                                <th></th>
                                <th class="hidden-sm hidden-md">Name</th>
                                <th class="hidden-sm hidden-md" style="width: 120px;">Expiry</th>
                                <th style="width: 100px;">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$res = mysql_query('
									SELECT * FROM ad_banners
								');
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <tr class="bannerRow" id="bannerRow_<?=$row->bannerID?>">
                                <td><?=$sNo?></td>
                                <td id="td_bP_<?=$row->bannerID?>"><?= ($row->bSize == '1') ? '1000px' : '490px' ?></td>
                                <td><img src="<?php echo $row->imgPath; ?>" alt="" width="100"></td>
                                <td id="td_bT_<?=$row->bannerID?>"><?=$row->bTitle?></td>
                                <td id="td_e_<?=$row->bannerID?>">
                                <input type="text" class="form-control tAlignC onblurUpdate" placeholder="dd-mm-yyyy" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask="" data-a="saveExpiry" data-ids="<?=$row->bannerID?>" data-url="<?=$formPostUrl?>" value="<?=date('d-m-Y', strtotime($row->expiry))?>" />
								</td>
                                <td>
                                <button class="btn btn-sm btn-primary editBtn" data-id="<?=$row->bannerID?>" data-a="getBanner" data-u="<?=$formPostUrl?>" data-w="editBannerWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$row->bannerID?>" data-a="delBanner" data-u="<?=$formPostUrl?>" data-at="Banner" data-numbering="bannerRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="5" align="center"><span class="text-red">No Records Found</span></td>
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