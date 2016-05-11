<?php
require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$header = array(
    'siteTitle' => 'Manage Colors',
    'loginName' => $_SESSION['admin']['name'],
    'cMenuCat' => 'e-cards',
    'cMenu' => 'manage-ecards-colors',
    'breadcrumb' => array(
        array('url' => '', 'text' => 'Manage Colors')
        )
    );


$formPostUrl = 'manage-ecards-colors-post.php';
?>

<? require_once('includes/header.php'); ?>

<!-- Modal -->
<div class="popupWrapper" id="addCWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Add E-Cards</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" enctype="multipart/form-data" method="post" data-numbering="cRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>

                    <input type="hidden" name="a" value="add_color" />
                        <input type="hidden" name="fa" value="Add" data-tableid="cardColors" />

                   <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <label>Background Color:</label>
                                <input type="text" name="bgcolor" class="cpikr form-control" value="#b7e543">
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <label>Font Color:</label>
                                <input type="text" name="fontcolor" class="cpikr form-control" value="#ff0000">
                            </div>
                        </div>

                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Colors" />

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
                        <button class="btn btn-info addPopup" data-w="addCWindow">Add new colors</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="padding-top:0px;">
                <div class="table-responsive">
                    <table class="table table-striped" id="cardColors">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 39%">Colors Preview</th>
                                <th style="width: 25%">Background Colors</th>
                                <th style="width: 25%">Font Colors</th>
                                <th style="width: 10%">
                                    <div class="pull-right">Actions</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT * FROM ecards_colors ORDER BY c_id DESC';
                            $res = mysql_query($sql);
                            $sNo = 1;
                            ?>
                            <? if (mysql_num_rows($res) > 0): ?>
                            <? while ($row = mysql_fetch_object($res)): ?>
                            <tr class="cRow" id="cRow_<?php echo $row->c_id; ?>">
                                <td><?php echo $sNo++; ?></td>
                                <td><div style="background: <?php echo $row->c_bg_color; ?>; color: <?php echo $row->c_fg_color; ?>; padding: 2px 5px;`">The quick brown fox jumps over the lazy dog</div></td>
                                <td><?php echo $row->c_bg_color; ?></td>
                                <td><?php echo $row->c_fg_color; ?></td>
                                <td>
                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?= $row->c_id ?>" data-a="delC" data-u="<?= $formPostUrl ?>" data-at="E Card" data-numbering="cRow" data-column="1" >
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <? endwhile; ?>
                    <? else: ?>
                    <tr class="errorRow">
                        <td colspan="5" align="center"><span class="text-red">No Records Found</span></td>
                    </tr>
                <? endif; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</div>

<? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>