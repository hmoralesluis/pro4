<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$isError = false;
	
	$seoUrl = trim($_REQUEST['seoUrl']);
	
	$pRes = mysql_query('
		SELECT * FROM products 
		WHERE seoUrl = "'.mysql_real_escape_string($seoUrl).'" 
	');
	if(mysql_num_rows($pRes) > 0){
		$pRow = mysql_fetch_object($pRes);
		
		$productID	= $pRow->productID;
		$visited	= $pRow->visited + 1;
		mysql_query('UPDATE products SET visited = (visited + 1) WHERE productID = '.$productID);
		
		$siteTitle	= stripslashes($pRow->seoTitle);
		$pageTitle	= stripslashes($pRow->productName);
		$seoKeyword = stripslashes($pRow->seoKeywords);
		$seoDesc	= stripslashes($pRow->seoDesc);
		$breadcrumb = array(
			array('url' => '/e-store/index.html', 'text' => 'E-Store'), 
			array('url' => '', 'text' => $pageTitle)
		);
		
		if($pRow->tags != ''){
			$tagArr = explode(',', stripslashes($pRow->tags));
		}
		
		$pcArr = explode(',', stripslashes($pRow->subCatIDs));
		
		$pcRes = mysql_query('SELECT * FROM product_cat WHERE pCatID = '.$pcArr[0].' AND parentID > 0 AND status = "A"');
		if(mysql_num_rows($pcRes) > 0){
			$pcRow = mysql_fetch_object($pcRes);
		}
		
		$itemGallery = true;
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
	<? if($isError == false):?>
        <!--Listing Grid-->
        <section class="block equal-height" style="padding-top:0px !important;" id="e-store">
            <div class="row">
                <!--Detail Sidebar-->
                <aside class="col-md-3 col-sm-3" id="detail-sidebar">
                    <? require_once('php-includes/e-store-left-sidebar.php'); ?>
                </aside>
                <!--end Detail Sidebar-->
                <div class="col-md-9 col-sm-9">
                    <section style="margin-bottom:0px;">
                        <? 
                            $pImgArr = array();
                            
                            $pImgSql = '
                                SELECT * FROM product_imgs WHERE productID = '.$productID.' ORDER BY sOrder ASC
                            ';
                            $pImgRes = mysql_query($pImgSql);
                            
                            if(mysql_num_rows($pImgRes) > 0){
                                while($row = mysql_fetch_object($pImgRes)){
                                    
                                    $pImgArr[] = 	$row;					
                                }
                            }
                        ?>
                        <? if(count($pImgArr) > 0):?>
                        <article class="item-gallery">
                            <div>
                                <? foreach($pImgArr as $kay => $arr):?>
                                <div class="slide"><img src="<?=stripslashes($arr->imgPath)?>" data-hash="<?=$arr->imgID?>" alt="<?=$arr->alt?>"></div>
                                <? endforeach;?>
                            </div>
                           
                            <!-- /.item-slider -->
                            <div class="thumbnails">
                                <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                                <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                                    <div class="content">
                                        <? foreach($pImgArr as $kay => $arr):?>
                                        <?
											if(strpos($arr->imgPath, "http") === false){
												$fullImgPath = 'http://'.$domain.stripslashes($arr->imgPath);
											}else {
												$fullImgPath = stripslashes($arr->imgPath);
											}
										?>
                                        <a href="#<?=$arr->imgID?>" id="thumbnail-1" class="active">
                                        <img src="/thumb/85-85-<?=$fullImgPath?>" alt="<?=$arr->alt?>">
                                        </a>
                                        <? endforeach;?>
                                    </div>
                                   
                                </div>
                            </div>
                        </article>
                        <? $imgGallery = true; ?>
                        <? endif;?>
                        <article class="block"<? if(!isset($imgGallery)): ?>style="padding-top:0px;"<? endif; ?>>
                            <header><h2>Description</h2></header>
                            <div class="row">
                                <div class="col-lg-9 col-md-8 col-sm-12">
                                    <p><?=stripslashes($pRow->description)?></p>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-12">
                                    <div class="list-group">
                                        <a href="javascript:void(0)" class="list-group-item list-group-item-danger aligh-center">Price: $ <?=number_format($pRow->price, 2)?></a>
                                        <? if($pRow->ccPayment == 'Y' && $pRow->ccPaymentLink != ''): ?>
                                        <a href="<?=stripslashes($pRow->ccPaymentLink)?>" class="list-group-item list-group-item-success aligh-center">Buy Item</a>
                                        <? endif; ?>
                                        
                                        <? if($pRow->cod == 'Y'): ?>
                                        <a href="/e-store/cash-on-delivery/<?=$seoUrl?>.html" class="list-group-item list-group-item-info aligh-center">Cash on Delivery</a>
                                        <? endif; ?>
                                        
                                        <? if($pRow->invoice == 'Y'): ?>
                                        <a href="/e-store/send-me-invoice/<?=$seoUrl?>.html" class="list-group-item list-group-item-warning aligh-center">Send me Invoice</a>
                                        <? endif; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    
                    <?
						$rpSql = '
							SELECT p.*, 
							(SELECT pi.imgPath FROM product_imgs AS pi WHERE pi.productID = p.productID ORDER BY rand() LIMIT 1) AS imgPath 
							FROM products AS p 
							WHERE p.status = "A" 
							AND p.productID != '.$productID.' 
						';
						
						$subCatIDsArr = explode(',', stripslashes($pRow->subCatIDs)); 
						if(count($subCatIDsArr) > 0 && $subCatIDsArr[0] > 0){
							if(count($subCatIDsArr) == 1){
								$rpSql .= 'AND (p.subCatIDs = '.$subCatIDsArr[0].' OR FIND_IN_SET('.$subCatIDsArr[0].', p.subCatIDs)) ';
							}else {
								$count = 1;
								$rpSql .= 'AND (';
								foreach($subCatIDsArr as $key => $subCatID){
									$rpSql .= '(p.subCatIDs = '.$subCatIDsArr[0].' OR FIND_IN_SET('.$subCatIDsArr[0].', p.subCatIDs))';
									
									if(count($subCatIDsArr) != $count){
										$rpSql .= ' OR ';
									}
									$count++;
								}
								
								$rpSql .= ')';
							}
						}
						$rpSql .= '
							ORDER BY rand() LIMIT 4 
						';
						
						//echo $rpSql;
						
						$rpRes = mysql_query($rpSql);
					?>
                    <? if(mysql_num_rows($rpRes) > 0):?>
                    <h1 class="page-title">Related Items</h1>
                    <div class="row" style="margin-bottom:0px;">
						<? while($rpRow = mysql_fetch_object($rpRes)):?>
							<?
								$productID  = stripslashes($rpRow->productID);
								$productName= stripslashes($rpRow->productName);
								$price		= '$ '.number_format($rpRow->price);
								$imgPath 	= stripslashes($rpRow->imgPath);
								$seoUrl		= stripslashes($rpRow->seoUrl);
								$seoKeywords= stripslashes($rpRow->seoKeywords);
								
								$aHref = '/e-store/';
								if(isset($pcRow)){
									$aHref .= stripslashes($rpRow->catSeoUrl).'/';
								}
								$aHref .= $seoUrl.'.html';
								
								if($imgPath == ''){
									$imgPath = $settings[4];
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
                    </div>
                    <? endif;?>
                </div>
            </div>
            <!--/.row-->
        </section>
        <!--end Listing Grid-->
    <? else:?>
        <? require_once('php-includes/404.php');?>
    <? endif;?>
<? require_once('includes/site-footer.php'); ?>