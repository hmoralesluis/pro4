<?php
require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$header = array(
    'siteTitle' => 'Manage Companies',
    'loginName' => $_SESSION['admin']['name'],
    'cMenuCat' => 'business-directory',
    'cMenu' => 'manage-directory-company',
    'breadcrumb' => array(
        array('url' => '', 'text' => 'Manage Companies')
    )
);


$formPostUrl = 'manage-directory-company-post.php';

$catSql = "SELECT * FROM dir_category WHERE i_parent = 2";
$catRes = mysql_query($catSql);

$catSql2 = "SELECT * FROM dir_category WHERE i_parent = 2";
$catRes2 = mysql_query($catSql2);
?>

<? require_once('includes/header.php'); ?>
<!-- Modal -->
<div class="popupWrapper" id="addGcWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Add Company</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" method="post" data-numbering="cRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addCompany" />
                    <input type="hidden" name="fa" value="Add" data-tableid="directoryCompanyTable" />

                    <label for="cName">Company Name *</label>
                    <input type="text" class="form-control" name="cName" id="cName" value="" required="required" autofocus />

                    <label for="cAdd">Company Address</label>
                    <textarea class="form-control" name="cAdd" id="cAdd"></textarea>

                    <label for="cPhone">Company Phone</label>
                    <input type="text" class="form-control" name="cPhone" id="cPhone" value="" autofocus />

                    <label for="cAbout">About Company</label>
                    <textarea class="form-control" name="cAbout" id="cAbout"></textarea>

                    <label for="cCat">Company Category</label>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="catLists">Categories</label>
                            <select class="form-control swapesoption" data-swapid="asubCatIDs2" id="catLists2" data-sort="N" data-targetselect="Y" data-selectremaining="N" multiple="multiple" style="height:170px;">
                                <?php
                                $count = 0;
                                while ($catRow2 = mysql_fetch_object($catRes2)) {
                                    ?>
                                <option value="" data-sort="<?php echo $count; ?>"><?php echo $catRow2->t_catname; ?></option>

                                    <?php
                                    $subCat2 = "SELECT * FROM dir_category WHERE i_parent = $catRow2->pa_catid";
                                    $subCatRes2 = mysql_query($subCat2);
                                    while ($subCatRow2 = mysql_fetch_object($subCatRes2)) {
                                        $count++;
                                        ?>
                                    <option value="<?php echo $subCatRow2->pa_catid; ?>" data-sort="<?php echo $count; ?>">&nbsp;&nbsp; - <?php echo $subCatRow2->t_catname; ?></option>
                                    <?php } ?>

                                    <?php $count++;
                                } ?>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="asubCatIDs">Sub Categories *</label>
                            <select class="form-control swapesoption removesoptions" data-swapid="catLists2" name="asubCatIDs2[]" id="asubCatIDs2" data-sort="Y" data-targetselect="N" data-selectremaining="Y" multiple="multiple" required="required" style="height:170px;">
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Company" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="popupWrapper" id="editDcWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Edit Company</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveC" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="ecID" id="ecID" />

                    <label for="cName">Company Name *</label>
                    <input type="text" class="form-control" name="ecName" id="ecName" value="" required="required" autofocus />

                    <label for="cAdd">Company Address</label>
                    <textarea class="form-control" name="eecAdd" id="ecAdd"></textarea>

                    <label for="cPhone">Company Phone</label>
                    <input type="text" class="form-control" name="ecPhone" id="ecPhone" value="" autofocus />

                    <label for="cAbout">About Company</label>
                    <textarea class="form-control" name="ecAbout" id="ecAbout"></textarea>

                    <label for="cCat">Company Category</label>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="catLists">Categories</label>
                            <select class="form-control swapesoption" data-swapid="asubCatIDs" id="catLists" data-sort="N" data-targetselect="Y" data-selectremaining="N" multiple="multiple" style="height:170px;">
                                
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="asubCatIDs">Sub Categories *</label>
                            <select class="form-control swapesoption removesoptions" data-swapid="catLists" name="asubCatIDs[]" id="asubCatIDs" data-sort="Y" data-targetselect="N" data-selectremaining="Y" multiple="multiple" required="required" style="height:170px;">

                            </select>
                        </div>
                    </div>



                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Company" />
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
                        <button class="btn btn-info addPopup" data-w="addGcWindow">Add New Company</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="padding-top:0px;">
                <div class="table-responsive">
                    <table class="table table-striped" id="directoryCompanyTable">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 89%">Company Name</th>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT * FROM dir_members ORDER BY pa_memberid DESC';
                            $res = mysql_query($sql);
                            $sNo = 1;
                            ?>
                            <? if (mysql_num_rows($res) > 0): ?>
    <? while ($row = mysql_fetch_object($res)): ?>
                                    <tr class="cRow" id="cRow_<?= $row->pa_memberid ?>">
                                        <td><?= $sNo ?></td>
                                        <td id="cName_<?= $row->pa_memberid ?>"><?= $row->t_membername ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary editBtn" data-id="<?= $row->pa_memberid ?>" data-a="getC" data-u="<?= $formPostUrl ?>" data-w="editDcWindow">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?= $row->pa_memberid ?>" data-a="delC" data-u="<?= $formPostUrl ?>" data-at="Directory Category" data-numbering="cRow" data-column="1" >
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
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