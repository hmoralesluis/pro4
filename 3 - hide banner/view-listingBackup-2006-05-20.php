<?php 	require_once('includes/db_con.php');
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
<?php require_once('includes/site-header.php'); ?>
<?php if($isError == false):?>
    <div class="row">
        <!--Detail Sidebar-->
        <aside class="col-md-4 col-sm-4" id="detail-sidebar">
            <!--Contact-->
            <section>
            	<?php if($logo != ''):?>
            	<div class="info" style="text-align:center;">
                	<img src="<?=$logo?>" alt="<?=$pageTitle?> logo" title="<?=$pageTitle?> logo" />
                </div>
                <?php endif;?>
                <header><h3>Contact</h3></header>
                <address style="margin-bottom:0px;">
                   <?=$address?>
                    <figure>
                    	<?php if($mobile != ''):?>
                        <div class="info">
                            <i class="fa fa-mobile"></i>
                            <span><?=$mobile?></span>
                        </div>
                        <?php endif;?>
                        <?php if($telephone != ''):?>
                        <div class="info">
                            <i class="fa fa-phone"></i>
                            <span><?=$telephone?></span>
                        </div>
                        <?php endif;?>
                        <?php if($website != ''):?>
                        <div class="info">
                            <i class="fa fa-globe"></i>
                            <?php if(strpos($website, 'http') !== 0){$website = 'http://'.$website;} ?>
                            <a href="<?=$website?>" target="_new"><?=$website?></a>
                        </div>
                        <?php endif;?>
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
                    
                    <?php if(isset($facebookPage) && $facebookPage != ''): ?>
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
                    <?php endif; ?>
                </address>
            </section>
            <?php if($events != ''):?>
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
            <?php endif;?>
            <section>
            	<header><h3>Offer</h3></header>
                <figure>
                	<?php if($offer != ''):?>
                    <div class="content">
                        <p><?=$offer?></p>
                    </div>
                    <?php else:?>
                     <div class="content">
                        <p>No Offer Available, Please Check Later</p>
                    </div>
                    <?php endif;?>
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
							<div id="grc_div"></div>
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
                	<?php foreach($tagArr as $key => $value):?>
                    <span class="btn"><?=$value?></span>
                    <?php endforeach;?>
                </figure>
            </section>
            <?php if($settings[2] != ''):?>
            <section>
            	<figure>
                	<div class="row">
                    	<div class="col-md-12">
                        	<?=$settings[2]?>
                        </div>
                    </div>
                </figure>
            </section>
            <?php endif;?>
        </aside>
        <!--end Detail Sidebar-->
        <!--Content-->
        <div class="col-md-8 col-sm-8">
            <section style="margin-bottom:0px;">
            	<?php if(count($listingImgArr) > 0):?>
                <div class="galleria" style="width:100%; height:450px;">
					<?php foreach($listingImgArr as $kay => $arr):?>
                    <img src="<?=stripslashes($arr->imgPath)?>" alt="<?=$arr->alt?>" title="<?=$arr->alt?>">
                    <?php endforeach;?>
                </div>
                <small>Click on image(s) to enlarge (<?=count($listingImgArr)?> Images)</small>
                <?php endif; ?>
                
                <article class="block">
                    <header><h2>Description</h2></header>
                    <p>
                        <?=$description?>
                    </p>
                    <?php if(isset($itemMapData)): ?>
                    <div id="map-detail"></div>
                    <?php endif; ?>
                </article>
                
				<?php $videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE listingID = '.$listingID.' ORDER BY sOrder ASC'); ?>
                <?php if($videoRes && mysql_num_rows($videoRes) > 0): ?>
                    <article class="block" style="padding-top:0px;">
                        <header><h2>videos</h2></header>
                        <?php while($videoRow = mysql_fetch_object($videoRes)): ?>
                        <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?=getYoutubeID(stripslashes($videoRow->videoUrl))?>" frameborder="0" allowfullscreen></iframe>
                        <?php endwhile; ?>
                    </article>
				<?php endif; ?>
                
			</section>
            
            <?php 				$featuredRes = mysql_query('
					SELECT bl.* 
					FROM businesslistings AS bl 
					WHERE bl.listingID != '.$listingID.' 
					AND bl.listingID IN (
						SELECT CAST(ua.uaDetails AS UNSIGNED) 
						FROM user_advertisements AS ua 
						WHERE ua.atID = 6 
						AND ua.status = "A" 
						AND ua.expiryOn >= "'.date('Y-m-d').'" 
					) 
					AND bl.expiryOn >= "'.date('Y-m-d').'" 
					AND bl.status = "A" 
					ORDER BY rand() LIMIT 6
				');
			?>
            <?php if($featuredRes && mysql_num_rows($featuredRes) > 0): ?>
            	<style type="text/css">
					#featuredListings.background-color-grey-dark .item a{color: #474747 !important;}
					#featuredListings .item .wrapper {height:80px;}
				</style>
            	<section id="featuredListings" class="block background-color-grey-dark" style="padding:40px 20px;">
                    <h1 class="heading">FEATURED</h1>
                    
                    <div class="row">
                        <?php while($featuredRow = mysql_fetch_object($featuredRes)): ?>
                            <?php                                 $imgPath = stripslashes($featuredRow->imgPath);
                                
                                if(strpos($imgPath, "http") === false){
                                    $imgPath = 'http://'.$domain.'/'.$imgPath;
                                }
                                
                                if($imgPath != ''){
                                    $imgSrc = $imgPath;
                                }else {
                                    $imgSrc = '/images/userfiles/logos/LM-noimage.png';
                                }
                                
                                $seoUrl			= '/featured/'.stripslashes($featuredRow->seoUrl);
                                $seoKeywords	= stripslashes($featuredRow->seoKeywords);
                                $businessName	= stripslashes($featuredRow->businessName);
								
								if($blRow->offer != ''){
									$offerLabel = '<div class="ribbon-wrapper"><div class="ribbon-green"></div></div>';
								}else {
									$offerLabel = '';
								}
                            ?>
                            <div class=" col-sm-4">
                            	<?=$offerLabel?>
                                <div class="item">
                                    <div class="image">
                                        <a href="<?=$seoUrl?>.html" title="<?=$businessName?>">
                                            <img src="/thumb/263-196-<?=$imgSrc?>" alt="<?=$seoKeywords?>" />
                                        </a>
                                    </div>
                                    <div class="wrapper"><a href="<?=$seoUrl?>.html" title="<?=$businessName?>"><h3><?=$businessName?></h3></a></div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php 				$bsize1Arr = array();
				$bsize1Res = mysql_query('
					SELECT ua.* 
					FROM user_advertisements AS ua 
					WHERE ua.atID IN (4) 
					AND ua.expiryOn >= "'.date('Y-m-d').'" 
					ORDER BY rand() LIMIT 2 
				');
				if($bsize1Res && mysql_num_rows($bsize1Res) > 0){
					while($bsize1Row = mysql_fetch_object($bsize1Res)){
						$bsize1Arr[] = array(
							'ad'		=> stripslashes($bsize1Row->ad), 
							'link'		=> stripslashes($bsize1Row->uaLink), 
							'imgPath'	=> '/images/advertisements/'.stripslashes($bsize1Row->uaDetails), 
							'imgAlt'	=> stripslashes($bsize1Row->uaTitle) 
						);
					}
				}
			?>
            <?php if(isset($bsize1Arr[0])): ?>
            	<section class="block equal-height" style="padding:40px 0px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?=$bsize1Arr[0]['link']?>" target='_blank'>
                            <img src="<?=$bsize1Arr[0]['imgPath']?>" alt="<?=$bsize1Arr[0]['imgAlt']?>" title="<?=$bsize1Arr[0]['imgAlt']?>">
                            </a>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php 				$ymalRes = mysql_query('
					SELECT * FROM businesslistings 
					WHERE subCatIDs = '.$subcat.' 
					AND listingID <> '.$listingID.' 
					AND expiryOn >= "'.date('Y-m-d').'" 
					ORDER BY rand() LIMIT 4'
				); 
			?>
            <?php if($ymalRes && mysql_num_rows($ymalRes) > 0): ?>
                <section id="categories" class="block background-color-white" style="padding:40px 20px; background-color:#bdbdbb;">
                    <h1 class="heading">YOU MAY ALSO LIKE</h1>
                    
                    <div class="row">
                        <?php while($ymalRow = mysql_fetch_object($ymalRes)): ?>
                            <?php
                                $imgPath = stripslashes($ymalRow->imgPath);
                                
                                if(strpos($imgPath, "http") === false){
                                    $imgPath = 'http://'.$domain.'/'.$imgPath;
                                }
                                
                                if($imgPath != ''){
                                    $imgSrc = $imgPath;
                                }else {
                                    $imgSrc = '/images/userfiles/logos/LM-noimage.png';
                                }
                                
                                $seoUrl			= '/listing/'.stripslashes($ymalRow->seoUrl);
                                $seoKeywords	= stripslashes($ymalRow->seoKeywords);
                                $businessName	= stripslashes($ymalRow->businessName);
                            ?>
                            <div class=" col-sm-3">
                                <div class="item " style="height: 200px;">
                                    <div class="image">
                                    <a href="<?=$seoUrl?>.html" title="<?=$businessName?>">
                                        <img src="/thumb/157-105-<?=$imgSrc?>" alt="<?=$seoKeywords?>" />
                                    </a>
                                    </div>
                                    <div class="wrapper wrapper2">
                                        <a href="<?=$seoUrl?>.html" title="<?=$businessName?>"><h4><?=$businessName?></h4></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php if(isset($bsize1Arr[1])): ?>
            	<section class="block equal-height" style="padding:40px 0px;">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="<?=$bsize1Arr[1]['link']?>" target='_blank'>
                            <img src="<?=$bsize1Arr[1]['imgPath']?>" alt="<?=$bsize1Arr[1]['imgAlt']?>" title="<?=$bsize1Arr[1]['imgAlt']?>">
                            </a>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
            
            <?php 				$bsize4Res = mysql_query('
					SELECT ua.* 
					FROM user_advertisements AS ua 
					WHERE ua.atID IN (5) 
					AND ua.expiryOn >= "'.date('Y-m-d').'" 
					ORDER BY rand() 
					LIMIT 2
				');
			?>
            <?php if($bsize4Res && mysql_num_rows($bsize4Res) > 0): ?>
            	<section class="block equal-height" style="padding:40px 0px;">
                    <div class="row">
                        <?php while($bsize4Row = mysql_fetch_object($bsize4Res)): ?>
                            <div class="col-sm-6">
                            	<a href="<?=stripslashes($bsize4Row->uaLink)?>" target='_blank'>
                                <img src="/images/advertisements/<?=stripslashes($bsize4Row->uaDetails)?>" alt="<?=stripslashes($bsize4Row->uaTitle)?>" title="<?=stripslashes($bsize4Row->uaTitle)?>">
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </section>
			<?php endif; ?>

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
<?php else:?>
	<?php require_once('php-includes/404.php');?>
<?php endif;?>
<?php require_once('includes/site-footer.php'); ?>