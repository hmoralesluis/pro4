<?
require_once('includes/db_con.php');
require_once('includes/general_functions.php');
require_once('includes/db_functions.php');

$header = array(
    'siteTitle' => 'Business Directory',
    'pageTitle' => 'Business Directory',
    'keywords' => '',
    'desc' => '',
    'pageClass' => 'business-directory', //page-subpage
    'hmcurrent' => 'DR',
    'breadcrumb' => array(
        array('url' => '', 'text' => 'Business Directory')
    )
);
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 dir-listing">

            <?php
            $dir_cats = mysql_query("SELECT cat.*, (SELECT COUNT(*) FROM dir_category AS subcat WHERE subcat.i_parent = cat.pa_catid) AS subcatCount FROM dir_category AS cat WHERE cat.i_parent = 2");
            while ($dir_cat = mysql_fetch_object($dir_cats)) {
                if ($dir_cat->subcatCount != 0) {
                    ?>

                    <div class="item">
                        <div class="wrapper">
                            <h3>
                                <?php echo $dir_cat->t_catname; ?>
                            </h3>

                            <?php
                            $dir_subcats = mysql_query("SELECT * FROM dir_category WHERE i_parent = $dir_cat->pa_catid");
                            $sep = 0;
                            while ($dir_subcat = mysql_fetch_object($dir_subcats)) {
                                $sep++;
                                $cat = str_replace(' ', '-', strtolower($dir_subcat->t_catname));
                                echo (($sep == 1) ? '' : ' - ') . '<a href="/business-directory/' . $cat . '.html">' . $dir_subcat->t_catname . '</a>';
                            }
                            ?>

                        </div>
                    </div>

                <?php }
            }
            ?>


        </div>
    </div>
    <!--/.row-->
</section>
<!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>