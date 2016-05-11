<?
	if(isset($_REQUEST['keyword'])){$keyword = $_REQUEST['keyword'];}else{$keyword = '';}
	if(isset($_REQUEST['location'])){$location = $_REQUEST['location'];}else{$location = '';}
	if(isset($_REQUEST['category'])){$category = $_REQUEST['category'];}else{$category = '';}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title><?=$header['siteTitle']?> - QatariMall</title>
    <meta name="description" content="<?=$header['desc']?>">
	<meta name="keywords" content="<?=$header['keywords']?>">
	<meta name="robot" content="index,follow">
	<meta name="author" content="<?=$domain?>">
    <meta name="language" content="english"> 
    
    <link href="<?=$siteBaseUrl?>assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?=$siteBaseUrl?>assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="<?=$siteBaseUrl?>assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="<?=$siteBaseUrl?>assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="<?=$siteBaseUrl?>assets/css/style.css?v=1.1.6" type="text/css">
    <link rel="stylesheet" href="<?=$siteBaseUrl?>assets/css/user.style.css" type="text/css">
    
    <? if(isset($mainSlider)): ?>
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?=$siteBaseUrl?>css/fullwidth.css" media="screen" />
	<link rel="stylesheet" type="text/css" href="<?=$siteBaseUrl?>rs-plugin/css/settings.css" media="screen" />
    <? endif; ?>
    
    <meta name="google-site-verification" content="vnso_NKQyDCDBbQMcTaQfZTylFTikOLZTW7KuRBLNrM" />
    <style type="text/css">
		.sMsg {
			margin-bottom:15px;
		}
		.sMsg span, .sMsg strong {
			display:block;
			padding:5px 10px;
		}
		#mainSearchForm li.selected a {
			color:#ff513f;
		}
		.owl-controls .owl-prev, .owl-controls .owl-next {
			background-color:#fff;
		}
		#tags .btn{
			font-size:11px !important;
			margin-bottom:5px;
			padding:3px 6px;
			font-weight:normal;
		}
		.btn.btn-green {
			background-color: #64b737;
			color: #fff;
		}
		.btn.btn-green:hover {
			background-color: #53a128;
		}
		#iframeDIV {
			width:100% !important;
		}
		#FJ_TF_Cont,#FJ_TF_Cont iframe {
			width:100% !important;
		}
		#sidebar a {
			display:inline-block;
			width:100% !important;
			margin-bottom:5px;
		}
		.header .wrapper .brand {
			float:none !important;
			min-width:200px !important;
			max-width:300px !important;
		}
		.mainMenu {
			display:block;
		}
		.mainMenu li {
			line-height:30px;
		}
		.item .image a:after, .item .image > .inner:after {
			background:none !important;
		}
		
		@media (min-width: 1200px) {
			#realty .col-lg-3, #photo-album .col-lg-3 {
				width: 20%;
			}
		}
		#realty .item, #photo-album .item {
			margin-bottom:30px;
		}
		#realty .item .image {
			height:152px;
		}
		#realty .item .title {
			padding:10px 15px;
			text-align:center;
			height:56px;
		}
		#realty .item .item-specific {
			position:static !important;
		}
		#realty .item .item-specific span {
			color:#666 !important;
		}
		.pagination {
			width:100%;
		}
		.pagination .l {
			float:left;
		}
		.pagination .r {
			float:right;
		}
		#realty .tools, #e-store .tools {
			background: #f3f3f3; 
			overflow: hidden; 
			border:0; 
			font-size: 14px;
			text-align: center; 
			border-top: 1px solid #ededed;
		}
		#realty .tools span, #e-store  .tools span {
			display:block;
			width:50%;
			float:left;
			background-color:#ff513f;
			color:#fff;
			height:32px;
			line-height:32px;
		}
		#realty .tools a, #e-store  .tools a {
			display:block;
			width:50%;
			float:right;
			height:32px;
			line-height:32px;
			background-color:#CCC;
		}
		.clear {
			clear:both;
		}
		#reDetails {
			background-color:#fff;
			padding:20px;
		}
		#tags .btn.current {
			background-color:#ff513f;
			color:#fff;
		}
		#sidebar section header {
			margin-bottom: 25px !important;
			padding:10px 0px 10px !important;
		}
		.aligh-center {
			text-align:center;
		}
		#e-store .item .title {
			padding:10px 15px;
			text-align:center;
		}
		#e-store .item .title h3 {
			min-height:34px;
		}
		#p-category-menu .panel-group {
			margin-bottom:0px !important;
		}
		#p-category-menu .panel-group .panel {
			margin-top:0px !important;
		}
		#p-category-menu .panel-body {
			padding:0px !important;
		}
		#p-category-menu .panel-group .panel {
			border-radius: 0px !important;
		}
		#p-category-menu .panel-heading a {
			display:block;
		}
		#p-category-menu .panel-body a {
			display:block;
			padding:10px 15px;
		}
		#p-category-menu .panel-body a:hover, #p-category-menu .panel-body a.current {
			background-color:#eee;
			color:#ff513f;
		}
		.sidebar-link-menu a {
			display:block;
			margin-bottom:1px;
		}
		.page-item-detail #map-detail {
			height:350px;
		}
		@media (max-width: 480px) {
			.header .wrapper .navigation-items .wrapper .submit-item {
				display:none !important;
			}
		}
		.text-left {text-align:left;}
        .text-right {text-align:right;}
		
		.ribbon-wrapper {
			width: 111px;
			height: 38px;
			overflow: hidden;
			position: absolute;
			top: 0px;
			right: 15px;
		}
		
		.ribbon-green {
			background:url('/images/offer-label-2.png?v=0.0.1') no-repeat;
			position: relative;
			top: 0px;
			width: 111px;
			height: 38px;
			z-index:100;
		}
		.offer-col { background-color:#fff; padding:0px; margin-bottom:20px;}
		.offer-col h1 {font-weight:300; margin:0px; padding:10px 15px; background-color:#333; color:#fff; font-size:17px; text-align:center;}
		.offer-logo {margin:0px 15px; text-align:center;}
		.offer-image {border:solid 5px #f4f4f4; height:250px; background-size:cover; background-position:50% 50%; background-repeat:no-repeat; margin:15px;}
		.offer-details {margin:10px 15px; text-align:center; height:50px; overflow:hidden;}
		.offer-col a {display:block; font-weight:300; margin:0px; padding:10px 15px; background-color:#393; color:#fff; font-size:17px; text-align:center;}
	</style>
    
    <script type="text/javascript" src="<?=$siteBaseUrl?>assets/js/jquery-2.1.0.min.js"></script>
    
    <? if(isset($photoswipe) && isset($giRes) && mysql_num_rows($giRes) > 0): ?>
    <!-- Core CSS file -->
    <link rel="stylesheet" href="<?=$siteBaseUrl?>photoswipe/photoswipe.css"> 
    <link rel="stylesheet" href="<?=$siteBaseUrl?>photoswipe/default-skin/default-skin.css">
    
    <!-- Core JS file -->
    <script src="<?=$siteBaseUrl?>photoswipe/photoswipe.min.js"></script>
    <script src="<?=$siteBaseUrl?>photoswipe/photoswipe-ui-default.min.js"></script>
    <style type="text/css">
        .my-simple-gallery figure .inner {
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            -moz-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.05);
            background-color: #fff;
            display: inline-block;
            padding:5px;
            position: relative;
            height: auto;
            /*width:23.4%;
            margin-left:.5%;
            margin-right:.5%;*/
            margin-bottom: 30px;
        }
        .my-simple-gallery figure .kthumb {
              -moz-border-radius-topleft: 1px;
            -webkit-border-top-left-radius: 1px;
            border-top-left-radius: 1px;
            -moz-border-radius-topright: 1px;
            -webkit-border-top-right-radius: 1px;
            border-top-right-radius: 1px;
            width: 100%;
        }
        .my-simple-gallery figcaption {
            display:none;
        }
    </style>
    <? endif; ?>
    
    <? if(isset($socialMeta)): ?>
    <meta property="og:site_name" content="<?=$socialMeta['title']?>"/>
    <meta property="og:type" content="<?=$socialMeta['type']?>"/> <!--blog, website, article -->
    <meta property="og:description" content="<?=$socialMeta['description']?>"/>
    <meta property="og:image" content="<?=$socialMeta['image']?>"/>
    <meta property="og:url" content="<?=$socialMeta['url']?>"/>
	
    <meta name="twitter:card" content="<?=$socialMeta['description']?>">
    <meta name="twitter:url" content="<?=$socialMeta['url']?>">
    <meta name="twitter:title" content="<?=$socialMeta['title']?>">
    <meta name="twitter:description" content="<?=$socialMeta['description']?>">
    <meta name="twitter:image" content="<?=$socialMeta['image']?>">
    <!--itemprop="image" -->
    <!--itemprop="description" -->
    <? endif; ?>
    
    <link type="text/css" rel="stylesheet" href="/galleria/themes/classic/galleria.classic.css">
    <style type="text/css">
		.galleria-theme-classic {
			background:#fff !important;
		}
	</style>
    
    <? if($currentPage == 'register.php' || $currentPage == 'view-listing.php' || $currentPage == 'contact-us.php'): ?>
		<script type="text/javascript">
            var onloadCallback = function() {
                grecaptcha.render('grc_div', {
                    'sitekey' : '6Lf8gxsTAAAAADIqh8C1cYQqgyvIpLU56lEkzpmO'
                });
            };
        </script>
    <? endif; ?>
</head>

<body onunload="" class="<?=$header['pageClass']?>" id="page-top" itemscope itemtype="http://schema.org/WebSite">
<? if($settings[26] !=''){echo $settings[26];} ?>
<? if(isset($photoswipe) && isset($giRes) && mysql_num_rows($giRes) > 0): ?>
<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="pswp__bg"></div>
    <div class="pswp__scroll-wrap">
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>
        <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
                <div class="pswp__counter"></div>
                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
                <button class="pswp__button pswp__button--share" title="Share"></button>
                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>
            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>
            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>
            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>
        </div>
    </div>
</div>
<? endif; ?>
<!-- Outer Wrapper-->
<div id="outer-wrapper">
    <!-- Inner Wrapper -->
    <div id="inner-wrapper">
        <!-- Navigation-->
        <div class="header">
            <div class="wrapper">
                <div class="brand">
                    <a href="/index.html"><img src="<?=$settings[6]?>" alt="logo"></a>
                </div>
                <nav class="navigation-items">
                    <div class="wrapper" style="display:table;">
                        <ul class="main-navigation navigation-top-header" style="display:table-cell">
                        	<ul class="mainMenu">
                                <? if($header['hmcurrent'] == 'HP'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>"<?=$hmcurrent?>>Home</a></li>
                                <? if($header['hmcurrent'] == 'LB'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>/qatar/index.html" title="Qatar"<?=$hmcurrent?>>Qatar</a></li>
                                <? foreach($hmCatArr as $key => $hmfearr): ?>
                                    <li>
                                    	<? if($hmfearr['count'] == $header['hmcurrent']){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                    	<a href="<?='http://www.'.$domain?>/<?=$hmfearr['catSeoUrl']?>/index.html" title="<?=$hmfearr['catName'] ?>"<?=$hmcurrent?>>
										<?=$hmfearr['catName']?>
                                    	</a>
                                    </li>
								<? endforeach; ?>
                            </ul>
                            <ul class="mainMenu">
                            	<? if($header['hmcurrent'] == 'RE'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>/real-estate/index.html" title="Real Estate"<?=$hmcurrent?>>Real Estate</a></li>
                                <? if($header['hmcurrent'] == 'BL'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <? if($header['hmcurrent'] == 'DR'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <? if($header['hmcurrent'] == 'ES'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>/e-store/index.html" title="E Stores"<?=$hmcurrent?>>E Stores</a></li>
                                <? if($header['hmcurrent'] == 'EC'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>/e-cards/index.html" title="E Cards"<?=$hmcurrent?>>E Cards</a></li>
                                <? if($header['hmcurrent'] == 'PA'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                                <li><a href="http://www.<?=$domain?>/photos/index.html" title="Photo Albums"<?=$hmcurrent?>>Photos</a></li>
                                <? if($header['hmcurrent'] == 'NL'){$hmcurrent = ' class="current"';}else{$hmcurrent = '';} ?>
                            </ul>
                        </ul>
                        
                        <ul class="user-area" style="display:table-cell">
                            <? if(isLoggedIn()):?>
                            <li><a href="javascript:void(0)" title="Sign Out" class="signOut">Sign Out</a></li>
                            <li><a href="/user/profile.php"><strong>Profile</strong></a></li>
                            <? else: ?>
                            <li><a href="http://<?=$domain?>/user/login.php">Sign In</a></li>
                            <li><a href="http://<?=$domain.$siteBaseUrl?>register.php"><strong>Register</strong></a></li>
                            <? endif; ?>
                        </ul>
                        <?
							if(isLoggedIn()){
								$href	= 'http://'.$domain.$siteBaseUrl.'user/add-business-listing.php';
								$alert	= '';
							}else {
								$href	= 'javascript:void(0)';
								$alert	= ' onClick="alert(\'Please Login to Submit Your Business\')"';
							}
						?>
                        <a href="<?=$href?>" class="submit-item" style="display:table-cell"<?=$alert?>>
                            <div class="content"><span>Submit Your Item</span></div>
                            <div class="icon">
                                <i class="fa fa-plus"></i>
                            </div>
                        </a>
                        <div style="display:table-cell">
                            <div class="toggle-navigation">
                                <div class="icon">
                                    <div class="line"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- end Navigation-->
        <!-- Page Canvas-->
        <div id="page-canvas">
            <!--Off Canvas Navigation-->
            <nav class="off-canvas-navigation">
                <header>Navigation</header>
                <div class="main-navigation navigation-off-canvas">
                	<ul>
                        <li><a href="http://www.<?=$domain?>">Home</a></li>
                        <li><a href="http://www.<?=$domain?>/lebanon/index.html" title="Lebanon">Lebanon</a></li>
                        <? foreach($hmCatArr as $key => $hmfearr): ?>
                            <li>
                                <? if($hmfearr->count == $header['hmcurrent']){$hmcurrent = 'class="current"';}else{$hmcurrent = '';} ?>
                                <a href="<?='http://www.'.$domain.'/'.$hmfearr['catSeoUrl'].'/index.html'?>" title="<?=$hmfearr['catName']?>"<?=$hmcurrent?>>
                                <?=$hmfearr['catName']?>
                                </a>
                            </li>
                        <? endforeach; ?>
                        <li><a href="http://www.<?=$domain?>/real-estate/index.html" title="Real Estate">Real Estate</a></li>
                        <li><a href="http://www.<?=$domain?>/blog/index.html" title="Blog">Blog</a></li>
                        <li><a href="http://www.<?=$domain?>/directory/index.html" title="Directory">Directory</a></li>
                        <li><a href="http://www.<?=$domain?>/e-store/index.html" title="E Stores">E Stores</a></li>
                        <li><a href="http://www.<?=$domain?>/e-cards/index.html" title="E Cards">E Cards</a></li>
                    </ul>
                </div>
            </nav>
            <!--end Off Canvas Navigation-->

            <!--Sub Header-->
            <section class="sub-header">
            	<? if(isset($openSearch)): ?>
                <div class="search-bar horizontal collapse in" id="redefine-search-form" style="height:auto">
                <? else: ?>
                <div class="search-bar horizontal collapse" id="redefine-search-form">
                <? endif; ?>
                	<div class="content">
                        <div class="container">
                        	<? if($header['hmcurrent'] == 'RE'): ?>
                            	<? require_once('php-includes/real-estate-search-form.php'); ?>
							<? elseif($header['hmcurrent'] == 'ES'): ?>
                            	<? require_once('php-includes/e-store-search-form.php'); ?>
                            <? else: ?>
                                <form class="main-search" role="form" method="get" action="/search/index.html" id="mainSearchForm">
                                    <div class="input-row">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="keyword" id="keyword" value="<?=$keyword?>" placeholder="Enter Keyword">
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="location" id="location" value="<?=$location?>" placeholder="Enter Location">
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <?
                                                $hscatArr = array();
                                                $hscatRes = mysql_query('SELECT * FROM category WHERE parentID = 0 ORDER BY sOrder ASC');
                                                if(mysql_num_rows($hscatRes) > 0){
                                                    while($hscatRow = mysql_fetch_object($hscatRes)){
                                                        $hscatArr[$hscatRow->catID] = stripslashes($hscatRow->catName);
                                                    }
                                                }
                                                
                                                $hscatList = '<option value="">All Category</option>';
                                                foreach($hscatArr as $hsclcatID => $hsclcatName){
                                                    $hscatList .= '<option value="" disabled="disabled">'.$hsclcatName.'</option>';
                                                    $hsclscRes = mysql_query('
                                                        SELECT * FROM category WHERE parentID = '.$hsclcatID.' ORDER BY sOrder ASC
                                                    ');
                                                    if(mysql_num_rows($hsclscRes) > 0){
                                                        while($hsclscRow = mysql_fetch_object($hsclscRes)){
															if(isset($_REQUEST['category']) && $_REQUEST['category'] == $hsclscRow->catID){
																$selected = ' selected="selected"';
															}else {
																$selected = '';
															}
                                                            $hscatList .= '<option value="'.$hsclscRow->catID.'" class="sub-category"'.$selected.'>'.stripslashes($hsclscRow->catName).'</option>';
                                                        }
                                                    }
                                                }
                                            ?>
                                            <select name="category" title="Select Category" data-live-search="true">
                                                <?=$hscatList?>
                                            </select>
                                        </div>
                                        <!-- /.form-group -->
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                        <!-- /.form-group -->
                                    </div>
                                </form>
                            <? endif; ?>
                            <!-- /.main-search -->
                        </div>
                        <!-- /.container -->
                    </div>
                </div>
                <!-- /.search-bar -->
                
            </section>
            <!--end Sub Header-->

            <!--Page Content-->
            <div id="page-content">
            	<? if(curPageURL() != "profile.php"): ?>
                <section style="padding:0px 15px; position:relative; overflow:hidden;"><!--container -->
                    <div class="row">
                        <!--Content-->
                        <div class="col-md-10 col-sm-9">
                            <header>
                                <h1 class="page-title" itemprop="name"><?=$header['pageTitle']?></h1>
							</header>
				<? endif; ?>