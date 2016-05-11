<?php
require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$header = array(
    'siteTitle' => 'Manage E-Cards',
    'loginName' => $_SESSION['admin']['name'],
    'cMenuCat' => 'e-cards',
    'cMenu' => 'manage-ecards',
    'breadcrumb' => array(
        array('url' => '', 'text' => 'Manage E-Cards')
    )
);


$formPostUrl = 'manage-ecards-post.php';
?>

<? require_once('includes/header.php'); ?>
<!-- Modal -->
<div class="popupWrapper" id="addGcWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Add E-Cards</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" enctype="multipart/form-data" method="post" data-numbering="ecRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>

                    <input type="hidden" name="a" value="add_ecard" />

                    <input type="hidden" name="fa" value="Add" data-tableid="eCardList" />

                    <p>
                        <label>Select Images (one or multiple):</label><input type="file" name="ecard[]" multiple/>
                        <small><strong>Note:</strong> Supported image format: .jpg, .png, .gif</small>
                    </p>

                    <input type="submit" name="submitBtn" class="btn btn-info" value="Upload E-Cards" />

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
                    <input type="hidden" name="a" value="saveEc" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="ecID" id="ecID" />

                    <label for="ecURL">SEO URL</label>
                    <input type="text" class="form-control" name="ecURL" id="ecURL" value="" autofocus />

                    <label for="cAlt">Alt Tag</label>
                    <input type="text" class="form-control" name="cAlt" id="cAlt" value="" autofocus >

                    <label for="cDesc">Description</label>
                    <textarea class="form-control" name="cDesc" id="cDesc"></textarea>

                    <label for="cKey">Keywords</label>
                    <textarea class="form-control" name="cKey" id="cKey"></textarea>



                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save Card" />
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
                        <button class="btn btn-info addPopup" data-w="addGcWindow">Add new E-Cards</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="padding-top:0px;">
                <div class="table-responsive">
                    <form action="<?= $formPostUrl ?>" method="post" data-numbering="ecRow" data-column="1" data-placement="top" data-original-title="Delete" class="multipleRowAction" data-check="check">
                        <input type="hidden" name="a" value="deleteSelectedProducts" />
                        <table class="table table-striped" id="eCardList">
                            <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 87%">Thumbnail</th>
                                    <th style="width: 10%">Actions</th>
                                    <th style="width: 2%">
                                        <label><input type="checkbox" class="checkUncheck" data-class="check" /></label>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM ecards ORDER BY ec_id DESC';
                                $res = mysql_query($sql);
                                $sNo = 1;
                                ?>
                                <? if (mysql_num_rows($res) > 0): ?>
                                    <? while ($row = mysql_fetch_object($res)): ?>
                                        <tr class="ecRow" id="ecRow_<?php echo $row->ec_id; ?>">
                                            <td><?php echo $sNo++; ?></td>
                                            <td><img src="../upload/e-cards/<?php echo $row->ec_filename; ?>" alt="" width="100"></td>
                                            <td>
                                                <button class="btn btn-sm btn-primary editBtn" data-id="<?= $row->ec_id ?>" data-a="getEc" data-u="<?= $formPostUrl ?>" data-w="editDcWindow">
                                                    <i class="glyphicon glyphicon-edit"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?= $row->ec_id ?>" data-a="delEc" data-u="<?= $formPostUrl ?>" data-at="E Card" data-numbering="ecRow" data-column="1" >
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </button>
                                            </td>
                                            <td>
                                                <label>
                                                    <input type="checkbox" class="check" name="listings[]" value="<?= $row->ec_id ?>" />
                                                </label>
                                            </td>
                                        </tr>
                                    <? endwhile; ?>
                                <? else: ?>
                                    <tr class="errorRow">
                                        <td colspan="4" align="center"><span class="text-red">No Records Found</span></td>
                                    </tr>
                                <? endif; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="4" align="right">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete Selected
                                        </button>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                </div>
            </div><!-- /.box-body -->
            <div class="box-footer clearfix">
            </div>
        </div>
    </div>
</div>
<? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>