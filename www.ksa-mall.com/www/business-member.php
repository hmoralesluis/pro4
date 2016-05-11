<?
require_once('includes/db_con.php');
require_once('includes/general_functions.php');
require_once('includes/db_functions.php');

$cat = str_replace('-', ' ', $_GET['catname']);
$member = $_GET['member'];

$dir_mermbers = mysql_query("SELECT * FROM dir_members WHERE slug = '$member'");
$row = mysql_fetch_object($dir_mermbers);

$dir_subcat = mysql_query("SELECT * FROM dir_category WHERE t_catname = '$cat'");
$child_row = mysql_fetch_object($dir_subcat);

$parent_cat = mysql_query("SELECT * FROM dir_category WHERE pa_catid = $child_row->i_parent AND i_parent = 2");
$parent_row = mysql_fetch_object($parent_cat);


$header = array(
    'siteTitle' => $row->t_membername,
    'pageTitle' => $row->t_membername,
    'keywords' => '',
    'desc' => '',
    'pageClass' => 'business-member', //page-subpage
    'hmcurrent' => 'DR',
    'breadcrumb' => array(
        array('url' => '/directory/index.html', 'text' => 'Business Directory'),
        array('url' => '/directory/index.html', 'text' => $parent_row->t_catname . ' - ' . $child_row->t_catname),
        array('url' => '', 'text' => $row->t_membername)
    )
);
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
        <div class="col-md-12">
            <!--Contact info-->
            <section>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <section>
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                            <address>
                                <div><?php echo $row->t_address; ?></div>
                            </address>
                        </section>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3><i class="fa fa-envelope"></i> Contact</h3>
                        <figure>
                            <div class="info">
                                <strong>Phone</strong><br>
                                <span><?php echo $row->t_phone; ?></span>
                            </div>
                            <br>
                            <div class="info">
                                <strong>Number of Views</strong><br>
                                <span><?php echo $row->i_visits; ?></span>
                            </div>
                        </figure>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <h3><i class="fa fa-file-text"></i> About Us</h3>
                        <p>
                            <?php echo $row->m_description; ?>
                        </p>
                    </div>
                </div>
            </section>
        </div>

    </div>
    <!--/.row-->
</section>
<!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>