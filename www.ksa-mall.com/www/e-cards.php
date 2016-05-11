<?
require_once('includes/db_con.php');
require_once('includes/general_functions.php');
require_once('includes/db_functions.php');

$setTitle = mysql_fetch_array(mysql_query("SELECT * FROM settings WHERE sID = 28"));
$setKey = mysql_fetch_array(mysql_query("SELECT * FROM settings WHERE sID = 29"));
$setDesc = mysql_fetch_array(mysql_query("SELECT * FROM settings WHERE sID = 30"));


$header = array(
    'siteTitle' => $setTitle['sValue'],
    'pageTitle' => $setTitle['sValue'],
    'keywords' => $setKey['sValue'],
    'desc' => $setDesc['sValue'],
    'pageClass' => 'e-cards', //page-subpage
    'hmcurrent' => 'EC',
    'breadcrumb' => array(
        array('url' => '', 'text' => $setTitle['sValue'])
    )
);
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">

    <div class="row">

        <?php
        $cardsSql = "SELECT * FROM ecards ORDER BY ec_id DESC";
        $res = mysql_query($cardsSql);

        while ($row = mysql_fetch_object($res)) {
            ?>
            <div class="col-md-3 col-sm-4">
                <div class="item">
                    <div class="image">
                        <a href="/e-cards/<?php echo $row->ec_seo_url; ?>.html" title="<?php echo $row->ec_alt_tag; ?>">
                            <img src="../upload/e-cards/<?php echo $row->ec_filename; ?>" alt="<?php echo $row->ec_alt_tag; ?>">
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</section>
<!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>