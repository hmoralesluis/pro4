<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['catSeoUrl'])){ $catSeoUrl = trim($_REQUEST['catSeoUrl']); }else { $catSeoUrl = ''; }
	if(isset($_REQUEST['seoUrl'])){ $seoUrl = trim($_REQUEST['seoUrl']); }else { $seoUrl = ''; }
	
	/*echo '<pre>';
	print_r($_REQUEST);
	echo '</pre>';*/
	
	$isError = true;
	if($catSeoUrl != '' && $seoUrl != ''){
		$gSql = '
			SELECT g.*, gc.gCatname 
			FROM gallery AS g 
			LEFT JOIN gallery_cat AS gc ON gc.gCatID = g.gCatID 
			WHERE g.seoUrl = "'.mysql_real_escape_string($seoUrl).'" 
		';
		//echo $gSql;
		$gRes = mysql_query($gSql);
		
		if(mysql_num_rows($gRes) > 0){
			$gRow = mysql_fetch_object($gRes);
			
			$giSql = 'SELECT * FROM gallery_images WHERE gID = '.$gRow->gID;
			//echo $giSql;
			$giRes = mysql_query($giSql);
			
			$siteTitle	= stripslashes($gRow->seoTitle);
			$pageTitle	= stripslashes($gRow->gName);
			$seoKeyword = stripslashes($gRow->seoKeyword);
			$seoDesc	= stripslashes($gRow->seoDescription);
			
			if(isset($_REQUEST['isSpecial']) && $catSeoUrl == 'lebanon-nightlife-photos'){
				$hmcurrent	= 'NL';
			}else {
				$hmcurrent	= 'PA';
			}
			
			$breadcrumb = array(
				array('url' => '/photos/index.html', 'text' => 'Photos'), 
				array('url' => '/photos/'.$catSeoUrl.'/index.html', 'text' => stripslashes($gRow->gCatname)), 
				array('url' => '', 'text' => stripslashes($gRow->gName)), 
			);
			
			$isError = false;
		}
	}
	
	#Listing Details SQL End
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		
		if(isset($_REQUEST['isSpecial']) && $seoUrl == 'lebanon-nightlife-photos'){
			$hmcurrent	= 'NL';
		}else {
			$hmcurrent	= 'PA';
		}
		
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
	
	$photoswipe = true;
?>
<? require_once('includes/site-header.php'); ?>
<? if($isError == false):?>
    <? if(mysql_num_rows($giRes) > 0): ?>
        <div id="photo-album" class="row my-simple-gallery" itemscope itemtype="http://schema.org/ImageGallery">
            <? while($giRow = mysql_fetch_object($giRes)): ?>
            <?
				$imgPath = stripslashes($giRow->imgPath);
				if(strpos($imgPath, "http") === false){
                    $imgPath = 'http://'.$domain.'/'.$imgPath;
                }
				$imgAlt = stripslashes($giRow->imgAlt);
				$imgSize = stripslashes($giRow->imgSize);
				
				if($imgSize == '' || $imgSize == 'NULL'){
					list($imgWidth, $imgHeight) = getimagesize($imgPath);
					$imgSize = $imgWidth.'x'.$imgHeight;
					mysql_query('UPDATE gallery_images SET imgSize = "'.mysql_real_escape_string($imgSize).'" WHERE gImgID = '.$giRow->gImgID);
				}
			?>
            <figure class="col-xs-6 col-sm-6 col-md-3 col-lg-3" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                <a href="<?=$imgPath?>" itemprop="contentUrl" data-size="<?=$imgSize?>" class="inner">
                <img src="/thumb/263-196-<?=$imgPath?>" class="kthumb" itemprop="thumbnail" alt="<?=$imgAlt?>" />
                </a>
                <figcaption itemprop="caption description"><?=$imgAlt?></figcaption>
            </figure>
            <? endwhile; ?>
        </div>
        
        <script type="text/javascript">
            var initPhotoSwipeFromDOM = function(gallerySelector) {
                var parseThumbnailElements = function(el) {
                    var thumbElements = el.childNodes,
                        numNodes = thumbElements.length,
                        items = [],
                        figureEl,
                        childElements,
                        linkEl,
                        size,
                        item;
                    for(var i = 0; i < numNodes; i++) {
                        figureEl = thumbElements[i];
                        if(figureEl.nodeType !== 1) {
                            continue;
                        }
                        linkEl = figureEl.children[0]; // <a> element
                        size = linkEl.getAttribute('data-size').split('x');
                        item = {
                            src: linkEl.getAttribute('href'),
                            w: parseInt(size[0], 10),
                            h: parseInt(size[1], 10)
                        };
                        if(figureEl.children.length > 1) {
                            item.title = figureEl.children[1].innerHTML; 
                        }
                        if(linkEl.children.length > 0) {
                            item.msrc = linkEl.getAttribute('href'); //linkEl.children[0].getAttribute('src');
                        }
                        item.el = figureEl; // save link to element for getThumbBoundsFn
                        console.log(item);
                        items.push(item);
                    }	
                    return items;
                };
                
                var closest = function closest(el, fn) {
                    return el && ( fn(el) ? el : closest(el.parentNode, fn) );
                };
                
                var onThumbnailsClick = function(e) {
                    e = e || window.event;
                    e.preventDefault ? e.preventDefault() : e.returnValue = false;
                    var eTarget = e.target || e.srcElement;
                    var clickedListItem = closest(eTarget, function(el) {
                        return (el.tagName && el.tagName.toUpperCase() === 'FIGURE');
                    });
                    if(!clickedListItem) {
                        return;
                    }
                    var clickedGallery = clickedListItem.parentNode,
                        childNodes = clickedListItem.parentNode.childNodes,
                        numChildNodes = childNodes.length,
                        nodeIndex = 0,
                        index;
            
                    for (var i = 0; i < numChildNodes; i++) {
                        if(childNodes[i].nodeType !== 1) { 
                            continue; 
                        }
            
                        if(childNodes[i] === clickedListItem) {
                            index = nodeIndex;
                            break;
                        }
                        nodeIndex++;
                    }
                    if(index >= 0) {
                        openPhotoSwipe( index, clickedGallery );
                    }
                    return false;
                };
                
                var photoswipeParseHash = function() {
                    var hash = window.location.hash.substring(1),
                    params = {};
                    
                    if(hash.length < 5) {
                        return params;
                    }
                    
                    var vars = hash.split('&');
                    for (var i = 0; i < vars.length; i++) {
                        if(!vars[i]) {
                            continue;
                        }
                        var pair = vars[i].split('=');  
                        if(pair.length < 2) {
                            continue;
                        }           
                        params[pair[0]] = pair[1];
                    }
                    
                    if(params.gid) {
                        params.gid = parseInt(params.gid, 10);
                    }
            
                    if(!params.hasOwnProperty('pid')) {
                        return params;
                    }
                    params.pid = parseInt(params.pid, 10);
                    return params;
                };
            
                var openPhotoSwipe = function(index, galleryElement, disableAnimation) {
                    var pswpElement = document.querySelectorAll('.pswp')[0],
                        gallery,
                        options,
                        items;
            
                    items = parseThumbnailElements(galleryElement);
                    options = {
                        index: index,
                        galleryUID: galleryElement.getAttribute('data-pswp-uid'),
                        getThumbBoundsFn: function(index) {
                            var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
                                pageYScroll = window.pageYOffset || document.documentElement.scrollTop,
                                rect = thumbnail.getBoundingClientRect();
                            return {x:rect.left, y:rect.top + pageYScroll, w:rect.width};
                        },
                       history: false,
                       focus: false, 
                       shareButtons: [
                            {id:'facebook', label:'Share on Facebook', url:'https://www.facebook.com/sharer/sharer.php?u={{url}}'},
                            {id:'twitter', label:'Tweet', url:'https://twitter.com/intent/tweet?text={{text}}&url={{url}}'},
                            {id:'pinterest', label:'Pin it', url:'http://www.pinterest.com/pin/create/button/?url={{url}}&media={{image_url}}&description={{text}}'} 
                        ],
                    };
                    if(disableAnimation) {
                        options.showAnimationDuration = 0;
                    }
                    gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
                    gallery.init();
                };
                var galleryElements = document.querySelectorAll( gallerySelector );
            
                for(var i = 0, l = galleryElements.length; i < l; i++) {
                    galleryElements[i].setAttribute('data-pswp-uid', i+1);
                    galleryElements[i].onclick = onThumbnailsClick;
                }
                var hashData = photoswipeParseHash();
                if(hashData.pid > 0 && hashData.gid > 0) {
                    openPhotoSwipe( hashData.pid - 1 ,  galleryElements[ hashData.gid - 1 ], true );
                }
            };
            
            initPhotoSwipeFromDOM('.my-simple-gallery');
        </script>
    <? endif; ?>
<? else:?>
	<? require_once('php-includes/404.php');?>
<? endif;?>
<? require_once('includes/site-footer.php'); ?>