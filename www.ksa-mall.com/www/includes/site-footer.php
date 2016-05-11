					<? if($currentPage != "profile.php"): ?>		
					</div>
                        <!--Sidebar-->
                        <div class="col-md-2 col-sm-3">
                            <aside id="sidebar">
                                <section style="text-align:right;">
                                	<header><h2>&nbsp;</h2></header>
                                	<?
										$rbSql = '
											SELECT ua.* 
											FROM user_advertisements AS ua 
											WHERE ua.atID IN (2) 
											AND ua.expiryOn >= "'.date('Y-m-d').'" 
											ORDER BY rand() 
											LIMIT 16 
										';
									?>
									<? $rbRes = mysql_query($rbSql);?>
									<? if(mysql_num_rows($rbRes) > 0):?>
										<? while($rbRow = mysql_fetch_object($rbRes)):?>
											<?
												$imgAlt  	= stripslashes($rbRow->uaTitle);
												$imgPath 	= '/images/advertisements/'.stripslashes($rbRow->uaDetails);
												$link 	 	= stripslashes($rbRow->uaLink);
												$bTitle 	= stripslashes($rbRow->uaName);
												$linkTarget = '_self';
                                            ?>
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 aligh-center">
                                            <a href="<?=$link?>" <? if($linkTarget != ''){echo 'target="'.$linkTarget.'"';} ?> class="" style="padding:0px;">
                                                <img src="<?=$imgPath?>" alt="<?=$imgAlt?>" title="<?=$bTitle?>">
                                            </a>
                                            </div>
                                     	<? endwhile;?>
                                	<? endif;?>
                                    <?
										$esbArr_s = array();
										$esbArr_b = array();
										
										$esbRes = mysql_query('
											SELECT bannerPosition, bannerImg, seoUrl, seoKeywords 
											FROM products 
											WHERE isFeatured = "Y" 
											AND bannerImg != "" 
											AND bannerImg IS NOT NULL 
											AND bannerPosition IS NOT NULL 
											AND status = "A" 
											ORDER BY rand() 
											LIMIT 16 
										');
										if(mysql_num_rows($esbRes) > 0){
											while($esbRow = mysql_fetch_object($esbRes)){
												$esbbannerImg = stripslashes($esbRow->bannerImg);
												if(strpos($esbbannerImg, "http") === false){
													$esbbannerImg	= 'http://'.$domain.'/'.$esbbannerImg;
												}
												
												$esbArr = array(
													'imgPath'		=> $esbbannerImg, 
													'productName'	=> stripslashes($esbRow->productName), 
													'seoUrl'		=> 'http://'.$domain.'/e-store/'.stripslashes($esbRow->seoUrl).'.html', 
													'seoKeywords'	=> stripslashes($esbRow->seoKeywords) 
												);
												
												if($esbRow->bannerPosition == 'S'){
													$esbArr_s[] = $esbArr;
												}else if($esbRow->bannerPosition == 'B'){
													$esbArr_b[] = $esbArr;
												}
											}
										}
									?>
                                    <? foreach($esbArr_s as $key => $arr): ?>
                                    	<div class="col-xs-4 col-sm-12 col-md-12 col-lg-12 aligh-center">
                                        <a href="<?=$arr['seoUrl']?>" class="" style="padding:0px;">
                                            <img src="<?=$arr['imgPath']?>" alt="<?=$arr['seoKeywords']?>" title="<?=$arr['productName']?>">
                                        </a>
                                        </div>
                                    <? endforeach; ?>
                                </section>
                            </aside>
                            <!-- /#sidebar-->
                        </div>
                        <!-- /.col-md-3-->
                        <!--end Sidebar-->
                    </div>
                </section>
                <? endif;?>
            </div>
            <!-- end Page Content-->
        </div>
        <!-- end Page Canvas-->
        
        <!--Page Footer-->
        <footer id="page-footer">
            <div class="inner" style="padding-top:20px;">
            	<div class="footer-top">
                    <div style="padding:0px 15px; position:relative; overflow:hidden;">
                    	<div class="col-md-12 col-sm-12">
                            <div class="row">
                                <? 
									$fbSql = '
										SELECT ua.* 
										FROM user_advertisements AS ua 
										WHERE ua.atID IN (3) 
										AND ua.expiryOn >= "'.date('Y-m-d').'" 
										ORDER BY rand() 
										LIMIT 6 
									';
								?>
								<?	$fbRes = mysql_query($fbSql);?>
                                <?	if(mysql_num_rows($fbRes) > 0):?>
									<?  while($fbRow = mysql_fetch_object($fbRes)):?>
										<?
											$imgAlt  	= stripslashes($fbRow->uaTitle);
											$imgPath 	= '/images/advertisements/'.stripslashes($fbRow->uaDetails);
											$link 	 	= stripslashes($fbRow->uaLink);
											$bTitle 	= stripslashes($fbRow->uaName);
											$linkTarget = '_self';
                                        ?>
                                        <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 aligh-center">
                                            <a href="<?=$link?>" <? if($linkTarget != ''){echo 'target="'.$linkTarget.'"';} ?> class="item-horizontal small" style="padding:0px; margin-bottom:20px;">
                                                <img src="<?=$imgPath?>"  title="<?=$bTitle?>" alt="<?=$imgAlt?>">
                                            </a>
                                        </div>
                                	<? endwhile; ?>
                                <? endif;?>
                                
                                <? foreach($esbArr_b as $key => $arr): ?>
                                    <div class="col-xs-6 col-sm-4 col-md-2 col-lg-2 aligh-center">
                                    <a href="<?=$arr['seoUrl']?>" class="item-horizontal small" style="padding:0px; margin-bottom:20px;">
                                        <img src="<?=$arr['imgPath']?>" alt="<?=$arr['seoKeywords']?>" title="<?=$arr['productName']?>">
                                    </a>
                                    </div>
                                <? endforeach; ?>
                            </div>
                            <!--/.row-->
                        </div>
                    </div>
                    <!--/.container-->
                </div>
                <div class="footer-bottom" style="margin-top:0px;">
                    <div style="padding:0px 15px; position:relative; overflow:hidden;">
                    	<div class="col-lg-12 col-md-12 col-sm-12">
                            <span class="left">Copyright Lebanesemall.com, 5th fl Lahoud Building, Sarba, Lebanon. <br/>
                             T: +961 9 63 83 61 M: +961 3 966601 / +961 3 676161 / +961 71 173017</span>
                            <span class="right">
                                <a href="/info/terms-and-condition.html">Terms & Conditions</a> | 
                                <a href="/info/privacy-policy.html">Privacy Statement</a> | 
                                <a href="/info/advertise-with-us.html">Advertise with us</a> | 
                                <a href="/contact-us.html">Contact us</a>
                                <!--<a href="#page-top" class="to-top roll"><i class="fa fa-angle-up"></i></a> -->
                            </span>
                        </div>
                    </div>
                </div>
                <!--/.footer-bottom-->
            </div>
        </footer>
        <!--end Page Footer-->
    </div>
    <!-- end Inner Wrapper -->
</div>
<!-- end Outer Wrapper-->

<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/before.load.js?v=1.1.3"></script>
<script type="text/javascript">
function validatePass(p1, p2) {
	    if (p2.value!="" && p1.value != p2.value) {
	        p2.setCustomValidity("Passwords don't match.");
	    } else {
	        p2.setCustomValidity('');
	    }
	}

	var $ = jQuery.noConflict();
	$(document).ready(function($) {
		"use strict";
	
		var $body = $('body');
	
		if($body.hasClass('navigation-top-header')){
			//$(".main-navigation.navigation-top-header").load("/assets/external/_navigation.php");
		}
		
		if($body.hasClass('navigation-off-canvas')){
			//$(".main-navigation.navigation-off-canvas").load("/assets/external/_navigation.php");
		}
		mobileNavigation();
		/* Code Block for Register Page */
		
		$(".refresh").click(function () {
			$(".imgcaptcha").attr("src","<?=$siteBaseUrl?>php-includes/captcha.php?_="+((new Date()).getTime()));
		});
			
		if ( $( "#form-register" ).length ) {
		    $( "#form-register" ).submit(function( event ) {		      
			  	// doing nothing here yet
			});
		}

		/* Code Block for Login Page */		
		if ( $( "#form-sign-in-account" ).length ) {
			$("#forgot-password").click(function () {
			    $( "#form-sign-in-account" ).hide();
			    $( "#form-password" ).show();
			});

			$("#sign-btn").click(function () {
			    $( "#form-sign-in-account" ).show();
			    $( "#form-password" ).hide();
			});
		}

	});
	
	$(window).resize(function(){
		if($('.owl-carousel').length > 0){
			$(".item-slider").each(function() {
				$(this).width($(this).parent().width());
				//alert($(this).width());
			});
			$(".item-slider").owlCarousel({
				rtl: false,
				items: 1,
				autoHeight: true,
				responsiveBaseWidth: ".slide",
				nav: false,
				callbacks: true,
				URLhashListener: true,
				navText: ["",""]
			});
		}
		mobileNavigation();
	});
	
	// Navigation on small screen ------------------------------------------------------------------------------------------
	
	function mobileNavigation(){
		if($(window).width() < 979){
			$(".main-navigation.navigation-top-header").hide();
			$(".toggle-navigation").css("display","inline-block");
			//$(".main-navigation.navigation-off-canvas").load("/assets/external/_navigation.php");
			$("body").removeClass("navigation-top-header");
			$("body").addClass("navigation-off-canvas");
			
			toggleNav();
		}else {
			$(".main-navigation.navigation-top-header").show();
			$(".toggle-navigation").css("display","none");
			//$(".main-navigation.navigation-off-canvas").load("/assets/external/_navigation.php");
			$("body").removeClass("navigation-off-canvas");
			$("body").addClass("navigation-top-header");
		}
	}
	
	// Toggle off canvas navigation ----------------------------------------------------------------------------------------
	
	function toggleNav() {
		console.log('Toogle Nav Triggered.');
		$('.header .toggle-navigation').click(function() {
			$('#outer-wrapper').toggleClass('show-nav');
		});
		$('#page-content').click(function() {
			$('#outer-wrapper').removeClass('show-nav');
		});
	}
</script>
<?php /*?><script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/custom.js?v=1.1.4"></script><?php */?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;libraries=places"></script>

<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/richmarker-compiled.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/icheck.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/custom.js?v=1.2.0"></script>

<? if(isset($itemMapData)): ?>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/maps.js?v=1.1.4"></script>
<? endif; ?>

<script>
	<? if(isset($itemMapData) || isset($itemGallery) && $itemGallery): ?>
	function initializeOwl(_rtl){
		$.getScript( "/assets/js/owl.carousel.min.js", function( data, textStatus, jqxhr ) {
			
			if ($('.owl-carousel').length > 0) {
				
				if ($('.carousel-full-width').length > 0) {
					setCarouselWidth();
				}
				$(".carousel.wide").owlCarousel({
					rtl: _rtl,
					items: 1,
					responsiveBaseWidth: ".slide",
					nav: true,
					navText: ["",""]
				});
				$(".item-slider").each(function() {
					$(this).width($(this).width());
					//alert($(this).width());
				});
				$(".item-slider").owlCarousel({
					rtl: _rtl,
					items: 1,
					autoplay: false, // Hide autoplay by kavitha on 12-6-2015
					autoplayTimeout: 3000,
					autoplayHoverPause: false,
					
					autoHeight: true,
					responsiveBaseWidth: ".slide",
					
					callbacks: true,
					URLhashListener: true,
					nav: true,
					navText: ["",""],
					autoplayHoverPause: true
				});
				$(".list-slider").owlCarousel({
					rtl: _rtl,
					items: 1,
					responsiveBaseWidth: ".slide",
					nav: true,
					navText: ["",""]
				});
				$(".testimonials").owlCarousel({
					rtl: _rtl,
					items: 1,
					responsiveBaseWidth: "blockquote",
					nav: true,
					navText: ["",""]
				});
	
				$('.item-gallery .thumbnails a').on('click', function(){
					$('.item-gallery .thumbnails a').each(function(){
						$(this).removeClass('active');
					});
					$(this).addClass('active');
				});
				$('.item-slider').on('translated.owl.carousel', function(event) {
					var thumbnailNumber = $('.item-slider .owl-item.active img').attr('data-hash');
					$( '.item-gallery .thumbnails #thumbnail-' + thumbnailNumber ).trigger('click');
				});
				return false;
			}
		});
	}
	
	$(window).load(function(){
        var rtl = false; // Use RTL
        initializeOwl(rtl);
    });
	<? endif; ?>
	
	<? if(isset($itemMapData)): ?>
    /*var itemID = 1;
    $.getJSON('<?=$siteBaseUrl?>assets/json/items.json.txt')
		.done(function(json) {
		$.each(json.data, function(a) {
			if(json.data[a].id == itemID ) {
				itemDetailMap(json.data[a]);
			}
		});
	}).fail(function( jqxhr, textStatus, error ) {
		console.log(error);
	});*/
	
	var mapJson = <?=$mapJson?>;
	itemDetailMap(mapJson);	
	<? endif; ?>
</script>

<script type="text/javascript">
	$(window).load(function(){
		if($('#FJ_TF_Cont iframe').length > 0){
			var $head = $("#FJ_TF_Cont iframe").contents().find("head");    
			$head.append("<style type='text/css'>#iframeDIV, #FJ_TListC, #adContainer {width:100% !important; padding:0px;} #fjEvents {width:99% !important; box-sizing:border-box; -moz-box-sizing:border-box; -webkit-box-sizing:border-box;}  #feedjiti-overlay3 a, .feedjitc-footer, #feedjiti-overlay2 {width:99% !important; padding:0px !important} .traffic {padding:2% !important; width:96% !important;}</style>");
			
			/*$('#FJ_TF_Cont iframe').contents().find('#iframeDIV').css({
				"width": "100% !important",
			});*/
		}
	});
</script>
<!--[if lte IE 9]>
<script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/ie-scripts.js"></script>
<![endif]-->

<script src="/galleria/galleria-1.4.2.min.js"></script>
<script>
	if($('div').hasClass('galleria')) {
		Galleria.loadTheme('/galleria/themes/classic/galleria.classic.min.js');
		
		Galleria.run('.galleria', {
			theme: 'classic', 
			lightbox: true
		});
	}
	
	$(document).on('click', '.signOut', function(e){
		e.preventDefault();
		
		//Logout Start
		var postUrl	= '/user/login-post.php';
		var postData= 'a=logoutFromSite';
		
		//console.log(postUrl);
		//console.log(postData);
		
		$.ajax({
			url: postUrl, 
			type: "POST",
			data : postData,
			success:function(jSonData, textStatus, jqXHR){
				console.log(jSonData);
				var data = jSonData;
				
				if(typeof data.msg != 'undefined'){
					showAlert(data.msg);
				}
				
				if(typeof data.redirect != 'undefined'){
					window.location.href = data.redirect;
				}
				
				if(typeof data.reload != 'undefined'){
					window.location.reload(true);
				}
			}
		});
		//Logout End
	});
</script>

<? if(isset($mainSlider)): ?>
<!-- get jQuery from the google apis -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>

<!-- jQuery KenBurn Slider  -->
<script type="text/javascript" src="<?=$siteBaseUrl?>rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script type="text/javascript" src="<?=$siteBaseUrl?>rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<!-- ACTIVATE THE BANNER HERE -->
<script type="text/javascript">
	var tpj = jQuery;
	tpj.noConflict();
				
    tpj(document).ready(function() {
		
    	if (tpj.fn.cssOriginal!=undefined){
        	tpj.fn.css = tpj.fn.cssOriginal;
		}

        tpj('.fullwidthbanner').revolution({
			delay:9000,
			startwidth:1600,
			startheight:950,

			onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

			thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
			thumbHeight:50,
			thumbAmount:3,

			hideThumbs:0,
			navigationType:"bullet",				// bullet, thumb, none
			navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

			navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom

			navigationHAlign:"left",				// Vertical Align top,center,bottom
			navigationVAlign:"bottom",					// Horizontal Align left,center,right
			navigationHOffset:30,
			navigationVOffset:30,

			soloArrowLeftHalign:"left",
			soloArrowLeftValign:"center",
			soloArrowLeftHOffset:20,
			soloArrowLeftVOffset:0,

			soloArrowRightHalign:"right",
			soloArrowRightValign:"center",
			soloArrowRightHOffset:20,
			soloArrowRightVOffset:0,

			touchenabled:"on",						// Enable Swipe Function : on/off


			stopAtSlide:-1,							// Stop Timer if Slide "x" has been Reached. If stopAfterLoops set to 0, then it stops already in the first Loop at slide X which defined. -1 means do not stop at any slide. stopAfterLoops has no sinn in this case.
			stopAfterLoops:-1,						// Stop Timer if All slides has been played "x" times. IT will stop at THe slide which is defined via stopAtSlide:x, if set to -1 slide never stop automatic

			hideCaptionAtLimit:0,					// It Defines if a caption should be shown under a Screen Resolution ( Basod on The Width of Browser)
			hideAllCaptionAtLilmit:0,				// Hide all The Captions if Width of Browser is less then this value
			hideSliderAtLimit:0,					// Hide the whole slider, and stop also functions if Width of Browser is less than this value


			fullWidth:"on",

			shadow:0								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows -  (No Shadow in Fullwidth Version !)

		});

	});
</script>
<? endif; ?>

<? if($currentPage == 'register.php' || $currentPage == 'view-listing.php' || $currentPage == 'contact-us.php'): ?>
	<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"async defer></script>
<? endif; ?>
</body>
</html>