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
	
	if(isset($_REQUEST['subCatSeoUrl'])){
		$subCatSeoUrl = $_REQUEST['subCatSeoUrl'];
	}else {
		$subCatSeoUrl = '';
	}
	
	if($subCatSeoUrl != ''){
		$pcRes = mysql_query('SELECT * FROM product_cat WHERE catSeoUrl = "'.mysql_real_escape_string($subCatSeoUrl).'" AND parentID > 0 AND status = "A"');
		
		if(mysql_num_rows($pcRes) > 0){
			$pcRow = mysql_fetch_object($pcRes);
			
			$siteTitle	= stripslashes($pcRow->catSeoTitle);
			$pageTitle	= stripslashes($pcRow->pCatName);
			$seoKeyword = stripslashes($pcRow->catSeoKeywords);
			$seoDesc	= stripslashes($pcRow->catSeoDesc);
			
			$breadcrumb = array(
				array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
				array('url' => '', 'text' => $pageTitle)
			);
			
			if($pcRow->tags != ''){
				$tagArr = explode(',', stripslashes($pcRow->tags));
			}
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
					<?
						/*echo '<pre>';
						print_r($_REQUEST);
						echo '</pre>';*/
						$pSql = '
							SELECT p.*, 
							(SELECT pi.imgPath FROM product_imgs AS pi WHERE pi.productID = p.productID ORDER BY rand() LIMIT 1) AS imgPath 
							FROM products AS p 
							WHERE p.status = "A" 
						';
						
						if(isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != ''){
							$pSql .= 'AND p.productName LIKE "%'.mysql_real_escape_string($_REQUEST['keyword']).'%"';
						}
						
						if(isset($_REQUEST['esSubCatID']) && (int) $_REQUEST['esSubCatID'] > 0){
							$subCatIDs = (int) $_REQUEST['esSubCatID'];
						}else if(isset($pcRow)){
							$subCatIDs = $pcRow->pCatID;
						}
						
						if($subCatIDs > 0){
							$pSql .= 'AND (p.subCatIDs = '.$subCatIDs.' OR FIND_IN_SET('.$subCatIDs.', p.subCatIDs)) ';
						}else if(isset($_REQUEST['esCatID']) && $_REQUEST['esCatID'] != ''){
							$esCatID = (int) $_REQUEST['esCatID'];
							
							if($esCatID > 0){
								$subCatRes = mysql_query('SELECT * FROM product_cat WHERE parentID = '.$esCatID);
								$totSubCats = mysql_num_rows($subCatRes);
								if($totSubCats > 0){
									
									$pSql .= 'AND (';
									$count = 1;
									while($subCatRow = mysql_fetch_object($subCatRes)){
										$pSql .= '(p.subCatIDs = '.$subCatRow->pCatID.' OR FIND_IN_SET('.$subCatRow->pCatID.', p.subCatIDs)) ';
										
										if($totSubCats != $count){
											$pSql .= ' OR ';
										}
										$count++;
									}
									$pSql .= ') ';
								}
							}
						}
						
						$pSql .= 'ORDER BY p.addedOn DESC';
						
						$totalRows = mysql_num_rows(mysql_query($pSql));
						$limit = 30;
						
						if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
						    $offset = ($_REQUEST['pageNo'] - 1);
						}else {
						    $offset = 0;
						}
						
						$pSql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
						
						$pRes = mysql_query($pSql);
					?>
					<? if(mysql_num_rows($pRes) > 0):?>
						<? while($pRow = mysql_fetch_object($pRes)):?>
							<?
								$productID  = stripslashes($pRow->productID);
								$productName= stripslashes($pRow->productName);
								$price		= '$ '.number_format($pRow->price);
								$imgPath 	= stripslashes($pRow->imgPath);
								$seoUrl		= stripslashes($pRow->seoUrl);
								$seoKeywords= stripslashes($pRow->seoKeywords);
								$aHref = '/e-store/';
								if(isset($pcRow)){
									$aHref .= stripslashes($pcRow->catSeoUrl).'/';
								}
								$aHref .= $seoUrl.'.html';
								
								if($imgPath == ''){
									$img = $settings[4];
								}
								
								if(strpos($imgPath, "http") === false){
									$img = 'http://'.$domain.$imgPath;
								}else {
									$img = $imgPath;
								}
							?>
                            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                                <div class="item">
                                    <div class="image">
                                        <a href="<?=$aHref?>" title="<?=$productName?>">
                                            <? if($imgPath != ''): ?>
                                            <img src="/thumb/263-196-<?=$img?>" alt="<?=$seoKeywords?>">
                                            <? else: ?>
                                            <img src="<?=$settings[8]?>" alt="no-image">
                                            <? endif; ?>
                                        </a>
                                    </div>
                                    <div class="title">
                                        <a href="<?=$aHref?>" title="<?=$productName?>">
                                        <h3><?=$productName?></h3>
                                        </a>
                                    </div>
                                    <div class="tools">
                                        <span><?=$price?></span>
                                        <a href="<?=$aHref?>" class="button" title="<?=$productName?>">See more</a>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                                <!-- /.item-->
                            </div>
                        <? endwhile;?>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="pagination">
                                    <? createPaginationLink($totalRows, $limit)?>
                                </div>
                            </div>
                        </div>
                    <? else: ?>
                    	<? //echo 'SQL: '.$pSql; ?>
                    	<span class="red">No Records Found!</span>
                    <? endif;?>
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