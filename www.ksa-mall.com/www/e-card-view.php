<?
require_once('includes/db_con.php');
require_once('includes/general_functions.php');
require_once('includes/db_functions.php');

$cid = $_GET['cid'];

$cardSql = "SELECT * FROM ecards_view WHERE c_id = $cid";
$res = mysql_query($cardSql);
$row = mysql_fetch_object($res);



$header = array(
    'siteTitle' => 'Your Free E-Card',
    'pageTitle' => 'Your Free E-Card',
    'keywords' => '',
    'desc' => '',
        'pageClass' => 'e-cards', //page-subpage
        'hmcurrent' => 'EC',
        'breadcrumb' => array(
            array(
                'url' => '/e-cards/index.html', 'text' => 'E-Cards',
                'url' => '', 'text' => 'Your Free E-Card'
                )
            )
        );
        ?>
        <? require_once('includes/site-header.php'); ?>
        <!--Page Content Start -->
        <!--Listing Grid-->
        <section class="block equal-height" style="padding-top:0px !important;">

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="item">
                        <div class="image">
                            <div class="wrapper" style="overflow: hidden;">
                                <p><a href="http://www.aswakdubai.com/e-cards/index.html">Send A Free Card</a></p>
                            
                                <?=stripslashes($row->c_card)?>


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>

        <!--end Listing Grid-->
        <!--Page Content End -->
        <?php
        require_once('includes/site-footer.php');

        ?>