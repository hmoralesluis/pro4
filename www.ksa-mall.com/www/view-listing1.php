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
		$itemMapData = true;
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
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
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
                            <p>
                            	<?=$events?>
                            </p>
                        </div>
                    </div>
                    <a href="#" class="show-more expand-content" data-expand="#detail-sidebar-event" >Show More</a>
                </figure>
            </section>
            <? endif;?>
            <section>
            	<header><h3>Offer</h3></header>
                <figure>
                	<? if($offer != ''):?>
                    <div class="content">
                        <p>
                        	<?=$offer?>
                        </p>
                    </div>
                    <? else:?>
                     <div class="content">
                        <p>
                        	No Offer Available, Please Check Later
                        </p>
                    </div>
                    <? endif;?>
                </figure>
            </section>
            <!--Contact Form-->
            <section>
                <header><h3>Contact Form</h3></header>
                <figure>
                    <form id="item-detail-form" role="form" method="post" action="<?=$siteBaseUrl?>ajax.php" class="afs">
                    	<input type="hidden" name="a" value="sendListingEnquiry" />
                        <input type="hidden" name="id" value="<?=encrypt($listingID)?>" />
                        <div class="form-group">
                            <label for="item-detail-name">Name *</label>
                            <input type="text" class="form-control framed" id="eName" name="eName" required="required" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="item-detail-email">Email *</label>
                            <input type="email" class="form-control framed" id="eEmail" name="eEmail" required="required" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="item-detail-message">Message *</label>
                            <textarea class="form-control framed" id="eMessage" name="eMessage"  rows="3" required="required"></textarea>
                        </div>
                        
                        <div class="form-group inputcaptcha-group">
                            <label for="captcha">Captcha:</label>
                            <input type="text" id="captcha" name="captcha" class="inputcaptcha" placeholder="Captcha Code is Case Sensitive" required="required">
                            <img src="<?=$siteBaseUrl?>php-includes/captcha.php" class="imgcaptcha" alt="enter code"  />
                            <img src="<?=$siteBaseUrl?>assets/img/refresh.png" alt="reload" class="refresh" />
                        </div>
                        
                        <!-- /.form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn framed icon">Send<i class="fa fa-angle-right"></i></button>
                        </div>
                        <!-- /.form-group -->
                    </form>
                    <script type="text/javascript">
						$('form.afs').submit(function(event){
							event.preventDefault();
							var thisF = $(this);
							
							var postUrl	= $(this).attr('action');
							var postData= $(this).serializeArray();
							var formData = new FormData(this);
							
							console.log(postUrl);
							console.log(postData);
							
							$.ajax({
								url: postUrl,
								type: 'POST',
								data: formData,
								processData: false,
								contentType: false, 
								success:function(jSonData, textStatus, jqXHR){
									console.log(jSonData);
									var data = jSonData;
									
									if(typeof data.img != 'undefined'){
										$.each(data.img, function(id, src){
											if(src != ''){
												$('#'+id).attr('src', src);
											}
										});
									}
									
									if(data.status == 0){
										thisF.trigger("reset");
										$(".imgcaptcha").attr("src","<?=$siteBaseUrl?>php-includes/captcha.php?_="+((new Date()).getTime()));
									}
									
									if(typeof data.msg != 'undefined'){
										alert(data.msg);
									}
								},
								error: function(jqXHR, textStatus, errorThrown){
									alert('Error on Submitting Form.');
								}
							});
						});
					</script>
                </figure>
            </section>
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
            <section style="margin-bottom:0px;">
            	<? if(count($listingImgArr) > 0):?>
                <div class="galleria" style="width:100%; height:450px;">
					<? foreach($listingImgArr as $kay => $arr):?>
                    <img src="<?=stripslashes($arr->imgPath)?>" alt="<?=$arr->alt?>" title="<?=$arr->alt?>">
                    <? endforeach;?>
                </div>
                <small>Click on image(s) to enlarge (<?=count($listingImgArr)?> Images)</small>
                <? endif; ?>
                
                <?php /*?>
               	<? if(count($listingImgArr) > 0):?>
                <article class="item-gallery">
                    <div class="owl-carousel item-slider" id="itemSlier">
                    	<? foreach($listingImgArr as $kay => $arr):?>
                        <div class="slide"><img src="<?=stripslashes($arr->imgPath)?>" data-hash="<?=$arr->imgID?>" alt="<?=$arr->alt?>" title="<?=$arr->alt?>"></div>
                        <? endforeach;?>
                    </div>
                   
                    <!-- /.item-slider -->
                    <div class="thumbnails">
                        <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                        <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                            <div class="content">
                            	<? foreach($listingImgArr as $kay => $arr):?>
                                <?
									if(strpos($arr->imgPath, "http") === false){
										$fullImgPath	= 'http://'.$domain.stripslashes($arr->imgPath);
									}else {
										$fullImgPath	= stripslashes($arr->imgPath);
									}
								?>
                                <a href="#<?=$arr->imgID?>" id="thumbnail-1" class="active">
                                <img src="/thumb/85-85-<?=$fullImgPath?>" alt="<?=$arr->alt?>" width="85" height="85" title="<?=$arr->alt?>" />
                                </a>
                                <? endforeach;?>
                            </div>
                           
                        </div>
                    </div>
                </article>
                <? endif;?>
				<?php */?>
                
                <article class="block">
                    <header><h2>Description</h2></header>
                    <p>
                        <?=$description?>
                    </p>
                    <? if(isset($itemMapData)): ?>
                    <div id="map-detail"></div>
                    <? endif; ?>
                </article>
                <? $videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE listingID = '.$listingID.' ORDER BY sOrder ASC'); ?>
				<? 
					$videoArr = array();
					if(mysql_num_rows($videoRes) > 0){
						while($videoRow = mysql_fetch_object($videoRes)){
							$videoArr[] = $videoRow;
						}
					}
				?>
                <? if(count($videoArr) > 0):?>
                <article class="block" style="padding-top:0px;">
                   <header><h2>videos</h2></header>
                   	<? foreach($videoArr as $kay => $arr):?>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=getYoutubeID(stripslashes($arr->videoUrl))?>" frameborder="0" allowfullscreen></iframe>
                    <? endforeach;?>
                </article>
                <? endif;?>
                </section>
                <h1 class="heading">FEATURED</h1>
            <section id="feauter_post">

                <? $featuredlists = mysql_query('SELECT * FROM businesslistings WHERE featured = 1 AND listingID <> '.$listingID.' AND expiryOn >= "'.date('Y-m-d').'" ORDER BY rand() LIMIT 6');
                 ?>
               <? 
					$featuredArr = array();
					if(mysql_num_rows($featuredlists) > 0){
						while($featuredlist = mysql_fetch_object($featuredlists)){
							$featuredArr[] = $featuredlist;
						}
					}
				?>
                <? if(count($featuredArr) > 0):?>
                <? foreach($featuredArr as $kay => $arr):?>
               
                 
               <? 

               $img = stripslashes($arr->imgPath);

				if(strpos($img, "http") === false){
                    $img = 'http://'.$domain.'/'.$img;
                }

               ?>
				
				<div class=" col-sm-4">
					<div class="item " style="height: 320px;">
						<div class="image">

							<a href="<?=$arr->seoUrl?>.html">

                            <? if($arr->imgPath != ''){ ?>
								<img src="/thumb/263-196-<?=$img?>" alt="<?= $arr->seoKeywords; ?>" title="<?= $arr->seoKeywords; ?>">
								
								<? } else { ?>
                                <img src="/images/userfiles/logos/LM-noimage.png" alt="<?= $arr->seoKeywords; ?>" title="<?= $arr->seoKeywords; ?>">
								<? } ?>
							</a>
						</div>
						<div class="wrapper">
							<a href="<?=$arr->seoUrl?>.html"><h3><?=$arr->businessName?></h3></a>
						</div>
					</div>
				</div>
				
		
				<? endforeach;?>
                <? endif;?>
                </section>

			<section id="ads">
			<div class="col-sm-12">
			<? $ads = mysql_query('SELECT * FROM ad_banners WHERE bSize = 1 AND expiry >= "'.date('Y-m-d').'" ORDER BY rand()  LIMIT 1 '); ?>
			<? $ad = mysql_fetch_object($ads); ?>
			
			 <? if($ad->ad != ""){ ?>
                
                <a href="<?=$ad->link?>" target='_blank'>
                <?=$ad->ad?>
                </a>
                
			 	<? }else{ ?>
				
				<a href="<?=$ad->link?>" target='_blank'>
				<img src="<?=$ad->imgPath?>" alt="<?=$ad->imgAlt?>" title="<?=$ad->imgAlt?>">
				</a>	
				
				<? } ?>
				</div>
                <div>&nbsp;</div>
			</section>
            <div>&nbsp;</div>
			<h1 class="heading">YOU MAY ALSO LIKE</h1>
			<section id="like_post">
               <? $qry = mysql_query('SELECT * FROM businesslistings WHERE subCatIDs = '.$subcat.' AND listingID <> '.$listingID.' AND expiryOn >= "'.date('Y-m-d').'" ORDER BY rand() LIMIT 4'); ?>
                <? 
					$relArr = array();
					if(mysql_num_rows($qry) > 0){
						while($row = mysql_fetch_object($qry)){
							$relArr[] = $row;
						}
					}
				?>
               <? foreach($relArr as $key => $val):?>
               <? 
               $img = stripslashes($val->imgPath);

				if(strpos($img, "http") === false){
                    $img = 'http://'.$domain.'/'.$img;
                }
               ?>
				<div class=" col-sm-3">
					<div class="item " style="height: 200px;">
						<div class="image">
							<a href="<?=$val->seoUrl?>.html">
							<? if($val->imgPath != ''){ ?>
								<img src="/thumb/157-105-<?=$img?>" alt="<?= $val->seoKeywords; ?>" title="<?= $val->seoKeywords; ?>">
								<? }else { ?>
                                <img src="/images/userfiles/logos/LM-noimage.png" alt="<?= $val->seoKeywords; ?>" title="<?= $val->seoKeywords; ?>">
								<? } ?>
							</a>
						</div>
						<div class="wrapper wrapper2">
								<a href="<?=$val->seoUrl?>.html"><h4><?= $val->businessName ?></h4></a>
						</div>
					</div>
				</div>
          <? endforeach;?>
			</section>
			<section id="ads">
			<div class="col-sm-12">
			<? $ads = mysql_query('SELECT * FROM ad_banners WHERE bSize = 1 AND bannerID <> '.$ad->bannerID.' AND expiry >= "'.date('Y-m-d').'" ORDER BY rand()  LIMIT 1 '); ?>
			<? $ad = mysql_fetch_object($ads); ?>
			  <? if($ad->ad != ""){ ?>
                <a href="<?=$ad->link?>" target='_blank'>
                <?=$ad->ad?>
                </a>
			 	<? }else{ ?>
				<a href="<?=$ad->link?>" target='_blank'>
				<img src="<?=$ad->imgPath?>" alt="<?=$ad->imgAlt?>" title="<?=$ad->imgAlt?>">
				</a>	
				<? } ?>
				</div>
                <div>&nbsp;</div>
			</section>
         <div>&nbsp;</div>
			<h1 class="heading">RELATED</h1>
			<section id="related_post">
			<? $cats = mysql_query('SELECT * FROM category WHERE catID = '.$subcat.' '); ?>
			<? $cat = mysql_fetch_object($cats); ?>
			<? $parentid = $cat->parentID;  ?>
			<? $subcats = mysql_query('SELECT * FROM category WHERE parentID = '.$parentid.' AND catID <> '.$subcat.' ORDER BY rand() LIMIT 4 '); ?>
                <? 
					$subcatArr = array();
					if(mysql_num_rows($subcats) > 0){
						while($subcat = mysql_fetch_object($subcats)){
							$subcatArr[] = $subcat;
						}
					}
				?>

               <? if(count($subcatArr) > 0):?>
               <? foreach($subcatArr as $key => $catarr):?>
               <? $img = stripslashes($catarr->imgPath);

               if(strpos($img, "http") === false){
                    $img = 'http://'.$domain.'/'.$img;
                }
               ?>
               
				<div class=" col-sm-3">
					<div class="item " style="height: 200px;">
						<div class="image">

							<a href="<?=$catarr->catSeoUrl?>" style="height: 120px; overflow:hidden;">
							<? if($catarr->imgPath != ''){ ?>
								<img src="/thumb/157-105-<?=$img?>" alt="<?= $catarr->catSeoKeywords; ?>" title="<?= $catarr->catSeoKeywords; ?>">
								<? }else { ?>
                                <img src="/images/userfiles/logos/LM-noimage.png" alt="<?= $catarr->catSeoKeywords; ?>" title="<?= $catarr->catSeoKeywords; ?>">
								<? } ?> 
							</a>
						</div>
						<div class="wrapper wrapper2">
							<a href="<?=$catarr->catSeoUrl?>"><h4><?=$catarr->catName?></h4></a>
						</div>
					</div>
				</div>
				<? endforeach;?>  
               <? endif;?>
			   </section>
			   <section id="ads">
			  <? $ads = mysql_query('SELECT * FROM ad_banners WHERE bSize = 4 AND expiry >= "'.date('Y-m-d').'" ORDER BY rand()  LIMIT 2 '); ?>
	
                <? 
					$adArr = array();
					if(mysql_num_rows($ads) > 0){
						while($ad = mysql_fetch_object($ads)){
							$adArr[] = $ad;
						}
					}
					
				?>

               <? if(count($adArr) > 0):?>
               <? foreach($adArr as $key => $arr):?>
               <div class="col-sm-6">
                <?if($arr->ad != ""){ ?>
                
				<a href="<?=$arr->link?>" target='_blank'>
   
				<?=$arr->ad?>
				</a>
                <? }else{ ?>
		
				<a href="<?=$arr->link?>" target='_blank'>
				<img src="<?=$arr->imgPath?>" alt="<?=$arr->imgAlt?>" title="<?=$arr->imgAlt?>">
				</a>	
				
				<? } ?>
				</div>
				
				<? endforeach;?>  
               <? endif;?>
			</section>


            <?php /*?><section class="block" id="reviews">
                <header class="clearfix">
                    <h2 class="pull-left">Reviews</h2>
                    <a href="#write-review" class="btn framed icon pull-right roll">Write a review <i class="fa fa-pencil"></i></a>
                </header>
                <section class="reviews">
                    <?php /*?><article class="review">
                        <div class="wrapper">
                            <h5>Catherine Brown</h5>
                            <div>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Nulla vestibulum, sem ut sollicitudin consectetur, augue diam ornare massa,
                                ac vehicula leo turpis eget purus. Nunc pellentesque vestibulum mauris,
                                eget suscipit mauris imperdiet vel. Nulla et massa metus.
                            </div>
                        </div>
                        <!-- /.wrapper-->
                    </article>
                    <!-- /.review -->
                </section>
                <!-- /.reviews-->
            </section><?php */?>
            <!-- /#reviews -->
            <!--end Reviews-->
            <!--Review Form-->
            <?php /*?><section id="write-review">
                <header>
                    <h2>Write a Review</h2>
                </header>
                <form id="form-review" role="form" method="post" action="?" class="background-color-white">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form-review-name">Name</label>
                                <input type="text" class="form-control" id="form-review-name" name="form-review-name" required="">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-review-email">Email</label>
                                <input type="email" class="form-control" id="form-review-email" name="form-review-email" required="">
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <label for="form-review-message">Message</label>
                                <textarea class="form-control" id="form-review-message" name="form-review-message"  rows="3" required=""></textarea>
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Submit Review</button>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>
                </form>
                <!-- /.main-search -->
            </section><?php */?>
            <!--end Review Form-->
        </div>
        <!-- /.col-md-8-->
    </div>
<? else:?>
	<? require_once('php-includes/404.php');?>
<? endif;?>
<? require_once('includes/site-footer.php'); ?>