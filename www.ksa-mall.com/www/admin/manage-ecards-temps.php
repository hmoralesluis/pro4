<?php
require_once('../includes/db_con.php');
require_once('../includes/general_functions.php');
require_once('../includes/db_functions.php');

$header = array(
    'siteTitle' => 'Manage Templates',
    'loginName' => $_SESSION['admin']['name'],
    'cMenuCat' => 'e-cards',
    'cMenu' => 'manage-ecards-temps',
    'breadcrumb' => array(
        array('url' => '', 'text' => 'Manage Templates')
        )
    );


$formPostUrl = 'manage-ecards-temps-post.php';
?>

<? require_once('includes/header.php'); ?>

<!-- Modal -->
<div class="popupWrapper" id="addTWindow">
    <div class="popupWindow" style="min-width:70%">
        <div class="titleBar"><span>Add E-Cards</span></div>
        <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
        <div class="inner">
            <div style="padding:15px;">
                <form action="<?= $formPostUrl ?>" enctype="multipart/form-data" method="post" data-numbering="tRow" data-column="1" class="form-horizontal afs">
                    <div class="sMsg"></div>

                    <input type="hidden" name="a" value="add_temp" />
                        <input type="hidden" name="fa" value="Add" data-tableid="cardTemps" />

                                <label>E-Card Suggesting Template</label>
                                
                                <textarea class="form-control htmlEditor" name="temp" id="temp"></textarea>
 				<br />
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add Template" />

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
                        <button class="btn btn-info addPopup" data-w="addTWindow">Add New Template</button>
                    </div>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body no-padding" style="padding-top:0px;">
                <div class="table-responsive">
                    <table class="table table-striped" id="cardTemps">
                        <thead>
                            <tr>
                                <th style="width: 1%">#</th>
                                <th style="width: 89%">Templates</th>
                                <th style="width: 10%">
                                    <div class="pull-right">Actions</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = 'SELECT * FROM ecards_temps ORDER BY t_id DESC';
                            $res = mysql_query($sql);
                            $sNo = 1;
                            ?>
                            <? if (mysql_num_rows($res) > 0): ?>
                            <? while ($row = mysql_fetch_object($res)): ?>
                            <tr class="tRow" id="tRow_<?php echo $row->t_id; ?>">
                                <td><?php echo $sNo++; ?></td>
                                <td><?php echo $row->t_temp; ?></td>
                                <td>
                                    <div class="pull-right">
                                        <button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?= $row->t_id ?>" data-a="delT" data-u="<?= $formPostUrl ?>" data-at="E Card Template" data-numbering="tRow" data-column="1" >
                                            <i class="glyphicon glyphicon-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <? endwhile; ?>
                    <? else: ?>
                    <tr class="errorRow">
                        <td colspan="3" align="center"><span class="text-red">No Records Found</span></td>
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