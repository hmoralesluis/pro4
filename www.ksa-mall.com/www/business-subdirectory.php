<?
require_once('includes/db_con.php');
require_once('includes/general_functions.php');
require_once('includes/db_functions.php');

$cat = str_replace('-', ' ', $_GET['cat']);

$dir_subcat = mysql_query("SELECT * FROM dir_category WHERE t_catname = '$cat'");
$row = mysql_fetch_object($dir_subcat);


$parent_cat = mysql_query("SELECT * FROM dir_category WHERE pa_catid = $row->i_parent AND i_parent = 2");
$parent_row = mysql_fetch_object($parent_cat);


$header = array(
    'siteTitle' => 'Business Directory - ' . $row->t_catname,
    'pageTitle' => '<a href="/directory/index.html">Business Directory - ' . $parent_row->t_catname . '</a> - ' . $row->t_catname,
    'keywords' => '',
    'desc' => '',
    'pageClass' => 'business-subdirectory', //page-subpage
    'hmcurrent' => 'DR',
    'breadcrumb' => array(
        array('url' => '/directory/index.html', 'text' => 'Business Directory - ' . $parent_row->t_catname),
        array('url' => '', 'text' => $row->t_catname)
    )
);
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
        <div class="col-md-12 col-sm-12 dir-listing">
            <div class="item">
                <div class="wrapper">
                    <?php
                    $dir_mermbers = mysql_query("SELECT * FROM dir_member_market JOIN dir_members ON dir_member_market.pi_memberid = dir_members.pa_memberid WHERE pi_catid = $row->pa_catid");
                    while ($dir_mermber = mysql_fetch_object($dir_mermbers)) {
						$catname = str_replace(' ', '-', strtolower($row->t_catname));
						$name = str_replace(' ', '-', strtolower($dir_mermber->t_membername));
                        ?>
                  
                     
                        <a href="/business-directory/<?php echo $catname; ?>/<?php echo preg_replace('/-+/', '-', preg_replace('/[^A-Za-z0-9\-]/', '', $name)); ?>.html"><?php echo $dir_mermber->t_membername; ?> | </a>
                   

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</section>
<!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>