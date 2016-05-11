<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$isError = true;
	
	$gcRes = mysql_query('
		SELECT gc.*, 
		(
			SELECT COUNT(*) FROM gallery AS g 
			WHERE g.gCatID = gc.gCatID 
		) AS totalGalleries 
		FROM gallery_cat AS gc 
		WHERE gc.seoUrl != "lebanon-nightlife-photos" 
		ORDER BY gc.sOrder ASC 
	');
	if(mysql_num_rows($gcRes) > 0){
		$isError = false;
		
		$siteTitle	= 'Photos';
		$pageTitle	= 'Photos';
		$seoKeyword = $settings[11];
		$seoDesc	= $settings[12];
		$hmcurrent	= 'PA';
		$breadcrumb = array(
			array('url' => '', 'text' => 'Photos')
		);
	}
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$hmcurrent	= 'PA';
		$breadcrumb = array(
			array('url' => '', 'text' => '404 ERROR!')
		);
	}
	
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen', //page-subpage
		'hmcurrent'	=> $hmcurrent,
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<? if(!$isError): ?>
	<!--Listing Grid-->
    <section id="photo-album" class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
        <? while($gcRow = mysql_fetch_object($gcRes)): ?>
            <? if($gcRow->totalGalleries > 0): ?>
            <?
                $gCatName	= stripslashes($gcRow->gCatName);
                $seoUrl		= stripslashes($gcRow->seoUrl);
                $catHref	= '/photos/'.$seoUrl.'/index.html';
                if($gcRow->gCatImg != ''){
                    $catImgPath	= stripslashes($gcRow->gCatImg);
                }else{
                    $catImgPath = stripslashes($settings[4]);
                }
                
                if(strpos($catImgPath, "http") === false){
                    $catImgPath	= 'http://'.$domain.'/'.$catImgPath;
                }
                
            ?>
            <div class="col-md-3 col-sm-4">
                <div class="item ">
                    <div class="image">
                        <a href="<?=$catHref?>" title="<?=$gCatName?>">
                            <img src="/thumb/263-196-<?=$catImgPath?>" alt="<?=$gCatName?>">
                        </a>
                    </div>
                    <div class="wrapper">
                        <a href="<?=$catHref?>" title="<?=$gCatName?>"><h3 style="min-height:34px;"><?=$gCatName?></h3></a>
                    </div>
                </div>
            </div>
            <? endif; ?>
        <? endwhile; ?>
    </div>
    <!--/.row-->
    </section>
    <!--end Listing Grid-->
<? else: ?>
	<? require_once('php-includes/404.php');?>
<? endif; ?>
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>