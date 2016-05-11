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
	<? $slideRes = mysql_query('SELECT * FROM slides ORDER BY sOrder ASC'); ?>
    <? if($slideRes && mysql_num_rows($slideRes) > 0): ?>
    <div class="row">
        <div class="fullwidthbanner-container" style="margin-bottom:30px;">
            <div class="fullwidthbanner">
                <ul>
                	<?
                    	$slideEffects = array(
							array('3dcurtain-vertical', 10, 300), 
							array('papercut', 15, 300, 9400), 
							array('9400', 1, 300), 
							array('papercut', 15, 300, 9400), 
							array('3dcurtain-vertical', 10, 300), 
							array('9400', 1, 300)
						);
					?>
                	<? while($slideRow = mysql_fetch_object($slideRes)): ?>
						<?
                            $se = $slideEffects[rand(0, 5)];
							
							$animAttr = 'data-transition="'.$se[0].'" data-slotamount="'.$se[1].'" data-masterspeed="'.$se[2].'"';
							
							if(isset($se[3])){
								$animAttr .= ' data-delay="9400"';
							}
                        ?>
                    <li <?=$animAttr?> data-thumb="">
                        <img src="<?=stripslashes($slideRow->imgPath)?>" alt="<?=stripslashes($slideRow->imgAlt)?>" />
                    </li>
                    <? endwhile; ?>
                </ul>
            
                <div class="tp-bannertimer"></div>
            </div>
        </div>
    </div>
    <? endif; ?>
    
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <p style="margin-bottom:30px;">Lebanesemall is Lebanon's first and only pictured Guide. Browse through the different categories to find Lebanese companies for doing business, where to shop in Lebanon by category, find Lebanese products, Lebanon Fashion and Beauty, Catering, Lebanese Wedding Planners, Photographers, wedding dresses, boutiques, fashion designers, hair stylists, make up artists, flower shops, cosmetics, gift shops, zaffe, activities, everything you need to make your stay in Lebanon fun and productive.</p>
        </div>
	</div>
   .................................
     <?
		$flRes = mysql_query('
			SELECT bl1.* 
			FROM businesslistings AS bl1 
			WHERE bl1.listingID >= (
				(SELECT MAX(bl2.listingID) FROM businesslistings AS bl2) - 20
			) 
			AND bl1.featured = "1" 
			ORDER BY rand() LIMIT 8
		'); 
	?>
    <? if($flRes && mysql_num_rows($flRes) > 0): ?>
        <header><h2>Featured</h2></header>
        Featured Businesses:<br/><br/>
        
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
                        
                        $CatHref = '/listing/'.$seoUrl.".html";
                    ?>
                    <div class="item ">
                        <div class="image">
                            <a href="<?=$CatHref?>" title="<?=stripslashes($flRow->seoKeywords)?>">
                                <img src="/thumb/263-196-<?=$logo?>" alt="<?=stripslashes($flRow->seoKeywords)?>">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                        </div>
                    </div>
                </div>
            <? endwhile; ?>
        </div>
    <? endif; ?>
   ................................. 
    
    <?
		$blRes = mysql_query('
			SELECT bl1.* 
			FROM businesslistings AS bl1 
			WHERE bl1.listingID >= (
				(SELECT MAX(bl2.listingID) FROM businesslistings AS bl2) - 20
			) 
			AND bl1.expiryOn >= "'.date('Y-m-d').'" 
			ORDER BY rand() LIMIT 8
		'); 
	?>
    <? if($blRes && mysql_num_rows($blRes) > 0): ?>
        <header><h2>Latest Additions</h2></header>
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
                    ?>
                    <div class="item ">
                        <div class="image">
                            <a href="<?=$CatHref?>" title="<?=stripslashes($blRow->seoKeywords)?>">
                                <img src="/thumb/263-196-<?=$logo?>" alt="<?=stripslashes($blRow->seoKeywords)?>">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                        </div>
                    </div>
                </div>
            <? endwhile; ?>
        </div>
    <? endif; ?>
      <? $ecRes = mysql_query('SELECT * FROM ecards ORDER BY rand() LIMIT 3'); ?>
    <? if($ecRes && mysql_num_rows($ecRes) > 0): ?>
	<header><h2>Send an E-card</h2></header>
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
                        <img src="/thumb/361-251-<?=$ec_filename?>" alt="<?=$ecRow->ec_alt_tag?>">
                    </a>
                </div>
            </div>
        </div>
        <? endwhile; ?>
	</div>
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