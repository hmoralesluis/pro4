<?
require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$parentID = $_REQUEST['parentID'];

if ($parentID) {
    $header = array(
        'siteTitle' => 'Manage Sub Categories',
        'loginName' => $_SESSION['admin']['name'],
        'cMenuCat' => 'business-directory',
        'cMenu' => 'manage-directory-category',
        'breadcrumb' => array(
            array('url' => 'manage-directory-category.php', 'text' => 'Manage Categories'),
            array('url' => '', 'text' => 'Manage Sub Categories')
        )
    );
} else {
    $header = array(
        'siteTitle' => 'Manage Categories',
        'loginName' => $_SESSION['admin']['name'],
        'cMenuCat' => 'business-directory',
        'cMenu' => 'manage-directory-category',
        'breadcrumb' => array(
            array('url' => '', 'text' => 'Manage Categories')
        )
    );
}

$formPostUrl = 'manage-directory-category-post.php';
?>

<? require_once('includes/header.php'); ?>
<!-- Modal -->
<div class="popupWrapper" id="addGcWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span><?php echo ($parentID) ? 'Add Sub Category' : 'Add Category'; ?></span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" method="post" data-numbering="dcRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="<?php echo ($parentID) ? 'addSubCategory' : 'addCategory'; ?>" />
                    <input type="hidden" name="parentID" value="<?php echo $parentID; ?>">
                    <input type="hidden" name="fa" value="Add" data-tableid="directoryCategoryTable" />

                    <label for="aDCatName">Category Name *</label>
                    <input type="text" class="form-control" name="aDCatName" id="aDCatName" value="" required="required" autofocus />

                    <input type="submit" name="submitBtn" class="btn btn-info" value="<?php echo ($parentID) ? 'Add Sub Category' : 'Add Category'; ?>" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="popupWrapper" id="editDcWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Edit Category</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveDc" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="dCatID" id="dCatID" />

                    <label for="aEditDCatName">Category Name *</label>
                    <input type="text" class="form-control" name="aEditDCatName" id="aEditDCatName" value="" required="required" autofocus />

                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Category" />
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
                        <button class="btn btn-info addPopup" data-w="addGcWindow">Add New Category</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="padding-top:0px;">
                <div class="table-responsive">
                    <table class="table table-striped" id="directoryCategoryTable">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <?php if ($parentID) { ?>
                                <th style="width: 89%">Category Name</th>
                                <?php } else { ?>
                                <th style="width: 49%">Category Name</th>
                                <th style="width: 40%">Manage Sub Category</th>
                                <?php } ?>
                                <th style="width: 10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($parentID) {
                                $sql = "SELECT cat.* FROM dir_category AS cat WHERE cat.i_parent = $parentID ORDER BY cat.pa_catid DESC";
                            } else {
                                $sql = 'SELECT cat.*, (SELECT COUNT(*) FROM dir_category AS subcat WHERE subcat.i_parent = cat.pa_catid) AS totalSubCat FROM dir_category AS cat WHERE cat.i_parent = 2 ORDER BY cat.pa_catid DESC';
                            }
                            $res = mysql_query($sql);
                            $sNo = 1;
                            ?>
                            <? if (mysql_num_rows($res) > 0): ?>
                                <? while ($row = mysql_fetch_object($res)): ?>
                                    <tr class="dcRow" id="dcRow_<?= $row->pa_catid ?>">
                                        <td><?= $sNo ?></td>
                                        <td id="DcName_<?= $row->pa_catid ?>"><?= $row->t_catname ?></td>
                                        <?php if (!$parentID) { ?>
                                        <td><a href="manage-directory-category.php?parentID=<?= $row->pa_catid ?>" title="Manage Sub Categories">Sub Category (<?= $row->totalSubCat ?>)</a></td>
                                        <?php } ?>
                                        <td>
                                            <button class="btn btn-sm btn-primary editBtn" data-id="<?= $row->pa_catid ?>" data-a="getDc" data-u="<?= $formPostUrl ?>" data-w="editDcWindow">
                                                <i class="glyphicon glyphicon-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?= $row->pa_catid ?>" data-a="<?php echo ($parentID) ? 'delDcSub' : 'delDc'; ?>" data-u="<?= $formPostUrl ?>" data-at="Directory Category" data-numbering="dcRow" data-column="1" >
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <? $sNo++; ?>
                                <? endwhile; ?>
                            <? else: ?>
                                <tr class="errorRow">
                                    <td colspan="<?php echo ($parentID) ? '3' : '4'; ?>" align="center"><span class="text-red">No Records Found</span></td>
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