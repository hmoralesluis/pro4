<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$isError = false;
	
	$siteTitle	= $settings[17];
	$pageTitle	= 'E Store';
	$seoKeyword = $settings[18];
	$seoDesc	= $settings[19];
	$breadcrumb = array(
		array('url' => '', 'text' => 'E-Store')
	);
	
	if(isset($_REQUEST['seoUrl'])){
		$seoUrl = $_REQUEST['seoUrl'];
	}else {
		$seoUrl = '';
	}
	
	if($seoUrl != ''){
		$pageRes = mysql_query('SELECT * FROM pages WHERE seoUrl = "'.mysql_real_escape_string($seoUrl).'"');
		
		if(mysql_num_rows($pageRes) > 0){
			$espageRow = mysql_fetch_object($pageRes);
			
			$siteTitle	= stripslashes($espageRow->seoTitle);
			$pageTitle	= stripslashes($espageRow->pageName);
			$seoKeyword = stripslashes($espageRow->seoKeyword);
			$seoDesc	= stripslashes($espageRow->seoDesc);
			
			$breadcrumb = array(
				array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
				array('url' => '', 'text' => $pageTitle)
			);
			
			$tagArr = explode(',', stripslashes($espageRow->tags));
		}else {
			$isError = true;
			
			$siteTitle	= '404 ERROR!';
			$pageTitle	= '404 ERROR!';
			$seoKeyword = '';
			$seoDesc	= '';
			$breadcrumb = array(
				array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
				array('url' => '', 'text' => '404 ERROR!')
			);
			
			$includeFile = 'php-includes/404.php';
		}
	}
	
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent'	=> 'ES',
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
	
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<? if(!$isError): ?>
		<!--Listing Grid-->
        <section class="block equal-height" style="padding-top:0px !important;" id="e-store">
            <div class="row">
                <!--Detail Sidebar-->
                <aside class="col-md-3 col-sm-3" id="detail-sidebar">
                    <? require_once('php-includes/e-store-left-sidebar.php'); ?>
                </aside>
                <!--end Detail Sidebar-->
                <div class="col-md-9 col-sm-9">
					<?=stripslashes($espageRow->pageDesc)?>
                </div>
            </div>
            <!--/.row-->
        </section>
        <!--end Listing Grid-->
	<? else: ?>
		<? require_once($includeFile); ?>
	<? endif; ?>
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>