<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$siteTitle	= 'Search Results - Real Estate';
	$pageTitle	= 'Search Results - Real Estate';
	$seoKeyword = $settings[9];
	$seoDesc	= $settings[10];
	$hmcurrent	= 'RE';
	$breadcrumb = array(
		array('url' => '/real-estate/index.html', 'text' => 'Real Estate'), 
		array('url' => '', 'text' => 'Search Results - Real Estate')
	);
	
	$includeFile = 'php-includes/404.php';
	
	if(isset($isError)) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$hmcurrent	= '';
		$breadcrumb = array(
			array('url' => '/real-estate/index.html', 'text' => 'Real Estate'), 
			array('url' => '', 'text' => '404 ERROR!')
		);
		
		$includeFile = 'php-includes/404.php';
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
	
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<!--Listing Grid-->
    <section class="block equal-height" style="padding-top:0px !important;" id="realty">
        <div class="row">
        	<?
				error_reporting(-1);
				$postData = $_GET;
				$postData['a'] = 'getProperties';
				
				$curlRet = curlPost($settings[7], $postData);
				if($curlRet['status'] == 0){
					$jsonData = json_decode($curlRet['json']);
					
					$propertiesArr = $jsonData->properties;
					
					/*echo '<pre>';
					print_r($jsonData);
					echo '</pre>';*/
					
					$totalRows = count($propertiesArr);
					$limit = 100;
					
					if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
						$offset = ($_REQUEST['pageNo'] - 1) * $limit;
					}else {
						$offset = 0 * $limit;
					}
					
					$propertiesArr = array_slice($propertiesArr, $offset, $limit);
				}
			?>
            <?php /*?><div class="item-specific">
                <span title="Bedrooms"><img src="/assets/img/bedrooms.png" alt=""><?=$arr->beds?></span>
                <span title="Bathrooms"><img src="/assets/img/bathrooms.png" alt=""><?=$arr->baths?></span>
                <span title="Area"><img src="/assets/img/area.png" alt=""><?=$arr->squareft?>m<sup>2</sup></span>
                <span title="Parking"><img src="/assets/img/garages.png" alt=""><?=$arr->parking?></span>
            </div><?php */?>
        	<? if(count($propertiesArr) > 0): ?>
				<? foreach($propertiesArr as $key => $arr): ?>
                    <? $title = (strlen($arr->title) > 45) ? substr($arr->title, 0, 45).'...' : $arr->title; ?>
                    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="item">
                            <div class="image">
                                <a href="/real-estate/<?=$arr->pid.'-'.$arr->seourl?>.html" title="<?=$arr->imgalt?>">
                                    <? if($arr->imgpath != ''): ?>
                                    <img src="<?=$arr->imgpath?>" alt="<?=$arr->seokey?>">
                                    <? else: ?>
                                    <img src="<?=$settings[8]?>" alt="<?=$arr->seokey?>">
                                    <? endif; ?>
                                </a>
                            </div>
                            <div class="title">
                                <a href="/real-estate/<?=$arr->pid.'-'.$arr->seourl?>.html" title="<?=$arr->imgalt?>"><?=$title?></a>
                            </div>
                            <div class="item-specific">
                                <span title="Bedrooms"><img src="/assets/img/bedrooms.png" alt=""><?=$arr->beds?></span>
                                <span title="Bathrooms"><img src="/assets/img/bathrooms.png" alt=""><?=$arr->baths?></span>
                                <span title="Area"><img src="/assets/img/area.png" alt=""><?=$arr->squareft?>m<sup>2</sup></span>
                            </div>
                            <div class="tools">
                                <span><?=$arr->price?></span>
                                <a href="/real-estate/<?=$arr->pid.'-'.$arr->seourl?>.html" class="button" title="<?=$arr->imgalt?>">See more</a>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <!-- /.item-->
                    </div>
                <? endforeach; ?>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="pagination">
                        <? createPaginationLink($totalRows, $limit)?>
                    </div>
                </div>
            <? else: ?>
            	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            		<div class="member" style="text-align:left;"><figure>No Properties Found.</figure></div>
                </div>
            <? endif; ?>
        </div>
    </section>
    <!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>