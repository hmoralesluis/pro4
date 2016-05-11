<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['catSeoUrl'])){ $catSeoUrl = trim($_REQUEST['catSeoUrl']); }else { $catSeoUrl = ''; }
	if(isset($_REQUEST['subCatSeoUrl'])){ $subCatSeoUrl = trim($_REQUEST['subCatSeoUrl']); }else { $subCatSeoUrl = ''; }
	
	$isError = true;
	if($catSeoUrl != '' && $subCatSeoUrl == ''){
		$catSql = '
			SELECT catID, catName, catSeoTitle, catSeoKeywords, catSeoDesc FROM category 
			WHERE parentID = 0 
			AND catSeoUrl = "'.mysql_real_escape_string($catSeoUrl).'"
		';
		$catRes = mysql_query($catSql);
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			$hmcurrent	= $hmCatArr[$catSeoUrl]['count'];
			$breadcrumb = array(
				array('url' => '', 'text' => stripslashes($catRow->catName))
			);
			
			$isError = false;
		}
	}else if($catSeoUrl != '' && $subCatSeoUrl != ''){
		$catSql = '
			SELECT sc.catID, 
			sc.catName AS subCatName, 
			sc.catSeoUrl AS subCatSeoUrl, 
			sc.catSeoTitle AS subCatSeoTitle, 
			sc.catSeoKeywords AS subCatSeoKeywords, 
			sc.catSeoDesc AS subCatSeoDesc, 
			c.catName, c.catSeoUrl 
			FROM category AS sc 
			LEFT JOIN category AS c ON c.catID = sc.parentID 
			WHERE sc.parentID > 0 
			AND sc.catSeoUrl = "'.mysql_real_escape_string($subCatSeoUrl).'"
		';
		
		$catRes = mysql_query($catSql);
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			$hmcurrent	= $hmCatArr[$catSeoUrl]['count'];
			$breadcrumb = array(
				array('url' => '/'.stripslashes($catRow->catSeoUrl).'/index.html', 'text' => stripslashes($catRow->catName)), 
				array('url' => '/'.stripslashes($catRow->catSeoUrl).'/'.stripslashes($catRow->subCatSeoUrl).'/index.html', 'text' => stripslashes($catRow->subCatName))
			);
			
			$isError = false;
		}
	}
	
	#Listing Details SQL Start
	$seoUrl = trim($_REQUEST['seoUrl']);
	$listingSql = '
		SELECT * FROM businesslistings 
		WHERE status = "A" 
		AND expiryOn >= "'.date('Y-m-d').'" 
		AND seoUrl = "'.mysql_real_escape_string($seoUrl).'"
	';
	$listingRes = mysql_query($listingSql);
	
	if(mysql_num_rows($listingRes) > 0){
		
		$listingRow = mysql_fetch_object($listingRes);
		$listingID		= $listingRow->listingID;
		$pageTitle		= stripslashes($listingRow->businessName);
		$logo			= stripslashes($listingRow->logo);
		$address		= stripslashes($listingRow->address);
		$telephone		= $listingRow->telephone;
		$mobile			= $listingRow->mobile;
		$website		= stripslashes($listingRow->website);
		$facebookPage	= stripslashes($listingRow->facebookPage);
		$events			= stripslashes($listingRow->events);
		$offer			= stripslashes($listingRow->offer);
		$description	= stripslashes($listingRow->description);
		$siteTitle 		= stripslashes($listingRow->seoTitle);
		$seoKeyword 	= stripslashes($listingRow->seoKeyword);
		$seoDesc 		= stripslashes($listingRow->seoDesc);
		$tags			= stripslashes($listingRow->tags);
		$tagArr			= explode(',', $tags);
		$catids		    = $listingRow->subCatIDs;
		$subcatidsarr   = explode(',', $catids);
		$subcat         = $subcatidsarr[0];

		$mapJson 		= '{"latitude":'.$listingRow->lat.',"longitude":'.$listingRow->lng.', "type_icon":"/assets/icons/media/downloadicon.png"}';
		
		array_push($breadcrumb, array('url' => '', 'text' => $pageTitle));
		
		$isError = false;
		
		if(!isset($_REQUEST['action'])){
			mysql_query('UPDATE businesslistings SET visited = (visited + 1) WHERE listingID = '.$listingID);
		}else if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'like'){
			mysql_query('UPDATE businesslistings SET liked = (liked + 1) WHERE listingID = '.$listingID);
		}
		
		$vlRow = mysql_fetch_object(mysql_query('SELECT visited,liked FROM businesslistings WHERE listingID = '.$listingID));
		$visited 	= $vlRow->visited;
		$liked 		= $vlRow->liked;
		
		#Images Array Start
		$listingImgArr = array();
		
		$listingImgSql = '
			SELECT * FROM businesslistings_imgs WHERE listingID = '.$listingID.' ORDER BY sOrder ASC
		';
		$listingImgRes = mysql_query($listingImgSql);
		
		if(mysql_num_rows($listingImgRes) > 0){
			while($row = mysql_fetch_object($listingImgRes)){
				
				$listingImgArr[] = 	$row;					
			}
		}
		#Images Array End
		
		if(isset($listingImgArr[0]->imgPath)){
			$smImgPath = $listingImgArr[0]->imgPath;
		}else if($logo != ''){
			$smImgPath = $logo;
		}else {
			$smImgPath = '';
		}
		$socialMeta = array(
			'type'			=> 'website', //blog, website, article
			'title'			=> $pageTitle, 
			'description'	=> $seoDesc, 
			'image'			=> $smImgPath, 
			'url'			=> 'http'.(($_SERVER['SERVER_PORT'] == 443) ? 's://' : '://').$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] 
		);
		
	}else{
		$isError = true;
	}
	
	
	#Listing Details SQL End
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$hmcurrent	= '';
		$breadcrumb = array(
			array('url' => '', 'text' => '404 ERROR!')
		);
	}
	$header = array(
		'siteTitle' => 'Offer - '.ucwords(strtolower(stripslashes($siteTitle))), 
		'pageTitle'	=> 'Offer - '.ucwords(strtolower(stripslashes($pageTitle))), 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent'	=> $hmcurrent, 
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<? if($isError == false):?>
    <div class="row">
        <!--Detail Sidebar-->
        <aside class="col-md-4 col-sm-4" id="detail-sidebar">
            <!--Contact-->
            <section>
            	<? if($logo != ''):?>
            	<div class="info" style="text-align:center;">
                	<img src="<?=$logo?>" alt="<?=$pageTitle?> logo" title="<?=$pageTitle?> logo" />
                </div>
                <? endif;?>
                <header><h3>Contact</h3></header>
                <address style="margin-bottom:0px;">
                   <?=$address?>
                    <figure>
                    	<? if($mobile != ''):?>
                        <div class="info">
                            <i class="fa fa-mobile"></i>
                            <span><?=$mobile?></span>
                        </div>
                        <? endif;?>
                        <? if($telephone != ''):?>
                        <div class="info">
                            <i class="fa fa-phone"></i>
                            <span><?=$telephone?></span>
                        </div>
                        <? endif;?>
                        <? if($website != ''):?>
                        <div class="info">
                            <i class="fa fa-globe"></i>
                            <? if(strpos($website, 'http') !== 0){$website = 'http://'.$website;} ?>
                            <a href="<?=$website?>" target="_new"><?=$website?></a>
                        </div>
                        <? endif;?>
                    </figure>
                    <figure>
                    	<div class="row">
                            <div class="col-md-4" style="height:55px;line-height:55px;">
                            	<?=$visited?> views
                            </div>
                            <div class="col-md-4" style="height:55px;line-height:55px;">
                            	<?=$liked?> likes
                            </div>
                            <div class="col-md-4" style="text-align:right;">
                               	<a href="?action=like" title="Like Us"><img src="<?=$siteBaseUrl?>images/like-us.png"/></a>
                            </div>
                    	</div>
                    </figure>
                    
                    <? if(isset($facebookPage) && $facebookPage != ''): ?>
                    <figure style="margin-top:15px;">
                        <div class="row">
                        	<div class="col-md-12">
                            	<div class="fb-like" data-href="<?=$facebookPage?>" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                            </div>
                        </div>
                    </figure>
                    <div id="fb-root"></div>
					<script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=<?=$settings[27]?>";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    <? endif; ?>
                </address>
            </section>
            <? if($events != ''):?>
            <section>
                <header><h3>Events</h3></header>
                <figure>
                    <div class="expandable-content collapsed show-60" id="detail-sidebar-event">
                        <div class="content">
                            <p><?=$events?></p>
                        </div>
                    </div>
                    <a href="#" class="show-more expand-content" data-expand="#detail-sidebar-event" >Show More</a>
                </figure>
            </section>
            <? endif;?>
            
            <section>
            	<header><h3>Tags</h3></header>
                <figure id="tags">
                	<? foreach($tagArr as $key => $value):?>
                    <span class="btn"><?=$value?></span>
                    <? endforeach;?>
                </figure>
            </section>
            <? if($settings[2] != ''):?>
            <section>
            	<figure>
                	<div class="row">
                    	<div class="col-md-12">
                        	<?=$settings[2]?>
                        </div>
                    </div>
                </figure>
            </section>
            <? endif;?>
        </aside>
        <!--end Detail Sidebar-->
        
        <!--Content-->
        <div class="col-md-8 col-sm-8">
            <section>
                <figure>
                	<? if($offer != ''):?>
                    <div class="content">
                        <p><?=$offer?></p>
                    </div>
                    <? else:?>
                     <div class="content">
                        <p>No Offer Available, Please Check Later</p>
                    </div>
                    <? endif;?>
                </figure>
            </section>
            
            <?
				$offerRes = mysql_query('
					SELECT bl.* 
					FROM businesslistings AS bl 
					WHERE bl.offer != "" 
					AND bl.expiryOn >= "'.date('Y-m-d').'" 
					AND bl.status = "A" 
					AND bl.listingID != '.$listingRow->listingID.' 
					ORDER BY rand() LIMIT 8
				'); 
			?>
			<? if($offerRes && mysql_num_rows($offerRes) > 0): ?>
				<section id="price-drop" class="block equal-height" style="padding:40px 0px;">
					<div class="row" style="margin-bottom:20px;">
						<div class="col-xs-12 text-left">
							<header><h1>Other Offers</h1></header>
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
							<div class="col-md-6 col-lg-6">
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
        </div>
        <!-- /.col-md-8-->
    </div>
<? else:?>
	<? require_once('php-includes/404.php');?>
<? endif;?>
<? require_once('includes/site-footer.php'); ?>