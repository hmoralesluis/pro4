<?php
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');




$isError = false;

$breadcrumb = array(
    array('url' => 'test.php', 'text' => "Store Front")
);

$header = array(
    'siteTitle' => "Store Front", 
    'pageTitle' => "Store Front", 
    'keywords'  => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
    'desc'      => "Lebanon information, info about Lebanese companies, weddings and events in Lebanon, Beauty, Shopping,Tourism, real estate.", 
    'pageClass' => 'map-fullscreen page-item-detail', //page-subpage
    'hmcurrent' => "", 
    'breadcrumb'=> $breadcrumb
);
?>
<?php require_once('includes/site-header.php'); ?>


<div class="center">
    <hr>
<iframe src="http://astore.amazon.com/libanmall-20" width="90%" height="4000" frameborder="0" scrolling="no"></iframe>



</div>




<?php require_once('includes/site-footer.php'); ?>