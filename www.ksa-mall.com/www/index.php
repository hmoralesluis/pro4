<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Welcome', 
		'pageTitle'	=> '&nbsp;', 
		'keywords'	=> 'Welcome', 
		'desc'		=> 'Welcome', 
		'pageClass'	=> '', //page-subpage
		'hmcurrent'	=> 'HP',
		'breadcrumb'=> array(
		
		)
	);
	
	$mainSlider = true;
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<section class="block equal-height" style="padding-top:0px !important;">
	<?
		$sEffectArray = array(
			array('3dcurtain-vertical', 10, 300), 
			array('papercut', 15, 300, 9400), 
			array('9400', 1, 300), 
			array('papercut', 15, 300, 9400), 
			array('3dcurtain-vertical', 10, 300), 
			array('9400', 1, 300)
		);
		
		$effectCount = 0;
		
		$slideArr = array();
		
		$asRes = mysql_query('SELECT * FROM user_advertisements WHERE atType = "HS" AND status = "A" AND expiryOn >= '.date('Y-d-m').' ORDER BY rand()');
		if($asRes && mysql_num_rows($asRes) > 0){
			while($asRow = mysql_fetch_object($asRes)){
				$slideArr[] = array(
					'src'	=> '/images/advertisements/'.stripslashes($asRow->uaDetails),
					'alt'	=> stripslashes($asRow->uaTitle),
					'title'	=> stripslashes($asRow->uaName),
					'effect'=> $sEffectArray[$effectCount]
				);
				
				if($effectCount == 5){$effectCount = 0;}else{$effectCount++;}
			}
		}
		
		#Main Sliders From Admin
		$slideRes = mysql_query('SELECT * FROM slides ORDER BY sOrder ASC');
		if($slideRes && mysql_num_rows($slideRes) > 0){
			while($slideRow = mysql_fetch_object($slideRes)){
				$slideArr[] = array(
					'src'	=> stripslashes($slideRow->imgPath),
					'alt'	=> stripslashes($slideRow->imgAlt),
					'title'	=> stripslashes($slideRow->imgAlt),
					'effect'=> $sEffectArray[$effectCount]
				);
				
				if($effectCount == 5){$effectCount = 0;}else{$effectCount++;}
			}
		}
		#End
	?>
	
    <? if(count($slideArr) > 0): ?>
    <div class="row">
        <div class="fullwidthbanner-container" style="margin-bottom:30px;">
            <div class="fullwidthbanner">
                <ul>
                	<? foreach($slideArr as $key => $sArr): ?>
						<?
                            $animAttr = 'data-transition="'.$sArr['effect'][0].'" data-slotamount="'.$sArr['effect'][1].'" data-masterspeed="'.$sArr['effect'][2].'"';
                            
                            if(isset($sArr['effect'][3])){
                                $animAttr .= ' data-delay="9400"';
                            }
                        ?>
                        <li <?=$animAttr?> data-thumb="">
                            <img src="<?=$sArr['src']?>" alt="<?=$sArr['alt']?>" title="<?=$sArr['title']?>" />
                        </li>
                    <? endforeach; ?>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <? endif; ?>
	
    <style type="text/css">
		header h1 {font-weight:300; font-size:21px;}
	</style>
    
	<?
		$flSql = '
			SELECT bl.* 
			FROM businesslistings AS bl 
			WHERE 
			bl.listingID IN (
				SELECT CAST(ua.uaDetails AS UNSIGNED) 
				FROM user_advertisements AS ua 
				WHERE ua.atID = 6 
				AND ua.status = "A" 
				AND ua.expiryOn >= "'.date('Y-m-d').'" 
			) 
			AND bl.expiryOn >= "'.date('Y-m-d').'" 
			AND bl.status = "A" 
			ORDER BY rand() LIMIT 8 
		';
		$flRes = mysql_query($flSql);
	?>
    <? if($flRes && mysql_num_rows($flRes) > 0): ?>
    <style type="text/css">
		#featuredListings.background-color-grey-dark .item a{color: #474747 !important;}
	</style>
    <section id="featuredListings" class="block background-color-grey-dark" style="padding:40px 20px;">
        <div class="row" style="margin-bottom:20px;">
            <div class="col-xs-12 text-left">
                <header><h1>Featured Businesses (<a href="/featured/index.html" title="See All Featured Business" style="color:#F00;">See All</a>)</h1></header>
            </div>
        </div>
        
        <div class="row">
            <? while($flRow = mysql_fetch_object($flRes)): ?>
                <div class="col-md-3 col-sm-3">
                    <?
                        $businessName	= stripslashes($flRow->businessName);
                        $seoUrl			= stripslashes($flRow->seoUrl);
                        
                        if($flRow->imgPath != ''){
                            $logo = stripslashes($flRow->imgPath);
                        }else { 
                            $logo = stripslashes($settings[4]);
                        }
                        
                        //echo $logo;
                        if(strpos($logo, "http") === false){
                            $logo = 'http://'.$domain.'/'.$logo;
                        }
                        
                        $CatHref = '/featured/'.$seoUrl.".html";
						
						if($flRow->offer != ''){
							$offerLabel = '<div class="ribbon-wrapper"><div class="ribbon-green"></div></div>';
						}else {
							$offerLabel = '';
						}
                    ?>
                    <?=$offerLabel?>
                    <div class="item">
                        <div class="image">
                            <a href="<?=$CatHref?>" title="<?=stripslashes($flRow->seoKeywords)?>">
                                <img src="/thumb/263-196-<?=$logo?>" alt="<?=stripslashes($flRow->seoKeywords)?>" title="<?=stripslashes($flRow->seoKeywords)?>">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                        </div>
                    </div>
                </div>
            <? endwhile; ?>
        </div>
        
        <div class="row" style="margin-bottom:20px;">
            <div class="col-xs-12 text-right">
                <h1><a href="/featured/index.html" title="See All Featured Business" style="color:#F00;">See All Featured Business</a></h1>
            </div>
        </div>
	</section>
    <? endif; ?>
    
    <?
		$offerRes = mysql_query('
			SELECT bl.* 
			FROM businesslistings AS bl 
			WHERE bl.offer != "" 
			AND bl.expiryOn >= "'.date('Y-m-d').'" AND bl.status = "A" 
			ORDER BY rand() LIMIT 3 
		'); 
	?>
    <? if($offerRes && mysql_num_rows($offerRes) > 0): ?>
    	<section id="price-drop" class="block equal-height" style="padding:40px 0px;">
            <div class="row" style="margin-bottom:20px;">
                <div class="col-xs-12 text-left">
                    <header><h1>Offers of the Week (<a href="/offers/index.html" title="See All Featured Business" style="color:#F00;">See All</a>)</h1></header>
                </div>
            </div>
            
            <div class="row">
                <? while($offerRow = mysql_fetch_object($offerRes)): ?>
                    <?
                        $businessName = ucwords(strtolower(stripslashes($offerRow->businessName)));
                        
                        $offer = stripslashes($offerRow->offer);
                        
                        //preg_match_all('/<img[^>]+>/i', $offer, $imgTagsArr); 
                        
                        #Get Offer Image Start
                        $offerImg = '';
                        
                        $doc = new DOMDocument();
                        @$doc->loadHTML($offer);
                        
                        $imgTagObj = $doc->getElementsByTagName('img');
                        
                        foreach($imgTagObj as $img) {
                            $offerImg = $img->getAttribute('src');
                            break;
                        }
                        #End
                        
                        $offer = preg_replace("/<img[^>]+\>/i", "", $offer); 
                        $offer = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $offer);
						
						$offerUrl = '/offers/'.stripslashes($offerRow->seoUrl).'.html';
                    ?>
                    <div class="col-sm-6 col-md-4">
                        <div class="offer-col">
                            <h1><?=$businessName?></h1>
                            <?php /*?>
                            <? if($offerRow->logo != ''): ?>
                            <div class="offer-logo"><img alt="<?=$businessName?> Logo" src="<?=stripslashes($offerRow->logo)?>" height="50px" /></div>
                            <? endif; ?>
                            <?php */?>
                            <? if($offerImg != ''): ?>
                            <div class="offer-image" style="background-image:url('<?=$offerImg?>');"></div>
                            <? endif; ?>
                            
                            <div class="offer-details"><?=$offer?></div>
                            
                            <a href="<?=$offerUrl?>" title="<?=$businessName?>">View Offer</a>
                        </div>
                    </div>
                <? endwhile; ?>
            </div>
            
            <div class="row" style="margin-bottom:20px; padding-top:20px;">
                <div class="col-xs-12 text-right">
                    <h1><a href="/offers/index.html" title="See All Business Offers" style="color:#F00;">See All Offers</a></h1>
                </div>
            </div>
        </section>
	<? endif; ?>
    
    <?
		$blRes = mysql_query('
			SELECT bl1.* 
			FROM businesslistings AS bl1 
			WHERE bl1.listingID >= (
				(SELECT MAX(bl2.listingID) FROM businesslistings AS bl2) - 100
			) 
			AND bl1.expiryOn >= "'.date('Y-m-d').'"
                        AND bl1.status = "A" 
			ORDER BY rand() LIMIT 8
		'); 
	?>
    <? if($blRes && mysql_num_rows($blRes) > 0): ?>
    	<section id="categories" class="block background-color-white" style="padding:40px 20px; background-color:#bdbdbb;">
            <header><h1>Latest Additions</h1></header>
            Latest Businesses Joining LibanMall:<br/><br/>
            
            <div class="row">
                <? while($blRow = mysql_fetch_object($blRes)): ?>
                    <div class="col-md-3 col-sm-3">
                        <?
                            $businessName	= stripslashes($blRow->businessName);
                            $seoUrl			= stripslashes($blRow->seoUrl);
                            
                            if($blRow->imgPath != ''){
                                $logo = stripslashes($blRow->imgPath);
                            }else { 
                                $logo = stripslashes($settings[4]);
                            }
                            
                            //echo $logo;
                            if(strpos($logo, "http") === false){
                                $logo = 'http://'.$domain.'/'.$logo;
                            }
                            
                            $CatHref = '/listing/'.$seoUrl.".html";
							
							if($blRow->offer != ''){
								$offerLabel = '<div class="ribbon-wrapper"><div class="ribbon-green"></div></div>';
							}else {
								$offerLabel = '';
							}
                        ?>
                        <?=$offerLabel?>
                        <div class="item ">
                            <div class="image">
                                <a href="<?=$CatHref?>" title="<?=stripslashes($blRow->seoKeywords)?>">
                                    <img src="/thumb/263-196-<?=$logo?>" alt="<?=stripslashes($blRow->seoKeywords)?>" title="<?=stripslashes($blRow->seoKeywords)?>">
                                </a>
                            </div>
                            <div class="wrapper">
                                <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                            </div>
                        </div>
                    </div>
                <? endwhile; ?>
            </div>
		</section>
    <? endif; ?>
    
	<? $ecRes = mysql_query('SELECT * FROM ecards ORDER BY rand() LIMIT 3'); ?>
    <? if($ecRes && mysql_num_rows($ecRes) > 0): ?>
        <section id="price-drop" class="block equal-height" style="padding:40px 0px;">
        	<header><h1>Send an E-card</h1></header>
            Send a FREE E-card to your friends and loved ones,from our beautiful selection of e-cards for all occasions:<br/><br/>
            
            <div class="row">
                <? while($ecRow = mysql_fetch_object($ecRes)): ?>
                <?
                    if(strpos($ecRow->ec_filename, "http") === false){
                        $ec_filename = 'http://'.$domain.'/upload/e-cards/'.stripslashes($ecRow->ec_filename);
                    }
                ?>
                <div class="col-md-4 col-sm-4">
                    <div class="item">
                        <div class="image">
                            <a href="/e-cards/<?=$ecRow->ec_seo_url?>.html" title="<?=$ecRow->ec_alt_tag?>">
                                <img src="/thumb/361-251-<?=$ec_filename?>" alt="<?=$ecRow->ec_alt_tag?>" title="<?=$ecRow->ec_alt_tag?>">
                            </a>
                        </div>
                    </div>
                </div>
                <? endwhile; ?>
            </div>
        </section>
    <? endif; ?>
    
    <!--
    <div class="row">
        <div class="col-md-6 col-sm-6">
            part 1
        </div>
        <div class="col-md-6 col-sm-6">
            part 2
        </div>
    </div>
     -->
     
</section>
<!--Page Content End -->
<? include('includes/site-footer.php'); ?>