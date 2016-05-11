<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$returnData = array();
	$returnData['status'] = 1;
	
	if(isset($_REQUEST['key']) && trim($_REQUEST['key']) == 'lmma' && isset($_REQUEST['a']) && trim($_REQUEST['a']) != ''){
		$action	= trim($_REQUEST['a']);
		
		if($action == 'mainCategories'){
			
			$catRes = mysql_query('
				SELECT c.catID, c.catName, c.catSeoUrl 
				FROM category AS c
				WHERE c.parentID = 0 ORDER BY c.sOrder ASC
			');
			
			if(mysql_num_rows($catRes) > 0){
				$returnData['status']	= 0;
				$returnData['type']		= 'L';
				
				$list = array();
				while($catRow = mysql_fetch_object($catRes)){
					$catID		= $catRow->catID;
					$catName	= stripslashes($catRow->catName);
					$catSeoDesc	= stripslashes($catRow->catSeoDesc);
					
					$list[] = array(
						'title'		=> $catName,
						'thumb'		=> '',
						'shortInfo'	=> $catSeoDesc, 
						'query'		=> 'key=lmma&a=getSubCategories&id='.$catID
					);
					
					$hmCCount++;
				}
				
				$returnData['list'] = $list;
				
				$returnData['seoTitle']		= '';
				$returnData['seoKeyword']	= '';
				$returnData['seoDesc']		= '';
			}
		}else if($action == 'getSubCategories'){
			$catID = (int) $_REQUEST['id'];
			
			$sql = '
				SELECT c.*, 
				(
					SELECT COUNT(*) FROM businesslistings AS ls WHERE ls.status = "A" 
					AND ls.expiryOn >= "'.date('Y-m-d').'"
					AND FIND_IN_SET(c.catID, ls.subCatIDs) 
				) AS totalListings 
				FROM category AS c 
				WHERE c.parentID = '.$catID.' 
				ORDER BY c.sOrder ASC
			';
			//echo $sql;
			$res = mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				$returnData['status']	= 0;
				$returnData['type']		= 'L';
				
				$list = array();
				while($row = mysql_fetch_object($res)){
					$catID			= stripslashes($row->catID);
					$subcatName		= stripslashes($row->catName);
					$catSeoDesc		= stripslashes($row->catSeoDesc);
					$subCatHref		= '/'.$catSeoUrl.'/'.$subcatSeoUrl.'/index.html';
					
					if($row->imgPath != ''){
						$subCatImgPath	= stripslashes($row->imgPath);
					}else{
						$subCatImgPath = stripslashes($settings[4]);
					}
					
					if(strpos($subCatImgPath, "http") === false){
						$subCatImgPath	= 'http://'.$domain.'/'.$subCatImgPath;
					}
					
					$list[] = array(
						'title'		=> $subcatName,
						'thumb'		=> $subCatImgPath,
						'shortInfo'	=> $catSeoDesc, 
						'query'		=> 'key=lmma&a=getListings&id='.$catID
					);
				}
				
				$returnData['list'] = $list;
				
				$returnData['seoTitle']		= '';
				$returnData['seoKeyword']	= '';
				$returnData['seoDesc']		= '';
			}
		}else if($action == 'getListings'){
			$catID = (int) $_REQUEST['id'];
			$sql = '
				SELECT * FROM businesslistings  WHERE status = "A" 
				AND expiryOn >= "'.date('Y-m-d').'"
				AND (subCatIDs = "'.$catID.'" OR FIND_IN_SET('.$catID.', subCatIDs)) 
				ORDER BY sOrder ASC 
			';
			//echo $sql;
			$res	= mysql_query($sql);
			
			if(mysql_num_rows($res) > 0){
				$returnData['status']	= 0;
				$returnData['type']		= 'LD';
				
				while($row = mysql_fetch_object($res)){
					$listingID		= $row->listingID;
					$businessName	= stripslashes($row->businessName);
					$seoDesc		= stripslashes($row->seoDesc);
					if($row->imgPath != ''){
						$imgPath = stripslashes($row->imgPath);
					}else { 
						$imgPath = stripslashes($settings[4]);
					}
					//echo $logo;
					if(strpos($imgPath, "http") === false){
						$imgPath = 'http://'.$domain.'/'.$imgPath;
					}
					$CatHref = $seoUrl.".html";
					
					$list[] = array(
						'title'		=> $businessName,
						'thumb'		=> $imgPath,
						'shortInfo'	=> $seoDesc, 
						'query'		=> 'key=lmma&a=getListing&id='.$listingID
					);
				}
				
				$returnData['list'] = $list;
				
				$returnData['seoTitle']		= '';
				$returnData['seoKeyword']	= '';
				$returnData['seoDesc']		= '';
			}
		}else if($action == 'getListing'){
			$listingID = (int) $_REQUEST['id'];
			
			$listingSql = '
				SELECT * FROM businesslistings 
				WHERE status = "A" 
				AND expiryOn >= "'.date('Y-m-d').'" 
				AND listingID = '.$listingID.' 
			';
			$listingRes = mysql_query($listingSql);
			
			if(mysql_num_rows($listingRes) > 0){
				$returnData['status'] = 0;
				
				$listingRow = mysql_fetch_object($listingRes);
				$listingID		= $listingRow->listingID;
				$businessName	= stripslashes($listingRow->businessName);
				$logo			= stripslashes($listingRow->logo);
				$address		= stripslashes($listingRow->address);
				$telephone		= $listingRow->telephone;
				$mobile			= $listingRow->mobile;
				$website		= stripslashes($listingRow->website);
				$facebookPage	= stripslashes($listingRow->facebookPage);
				$events			= stripslashes($listingRow->events);
				$offer			= stripslashes($listingRow->offer);
				$description	= stripslashes($listingRow->description);
				$seoUrl 		= stripslashes($listingRow->seoUrl);
				$siteTitle 		= stripslashes($listingRow->seoTitle);
				$seoKeyword 	= stripslashes($listingRow->seoKeyword);
				$seoDesc 		= stripslashes($listingRow->seoDesc);
				$tags			= stripslashes($listingRow->tags);
				$tagArr			= explode(',', $tags);
				$lat			= $listingRow->lat;
				$lng			= $listingRow->lng;
				
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
				
				$html = '<style type="text/css">';
				$html .= '.lm-column1 {float: left;width: 250px;}';
				$html .= '.lm-column2 {margin-left:280px;}';
				$html .= '@media screen and (max-width: 720px) {.lm-column1 {float: none;width: auto;}.lm-column2 {margin:0px;}}';
				$html .= '.lm-bg{background-color:#fff; padding:10px; margin-bottom:20px; color:#000;}';
				$html .= '</style>';
				
				$html .= '<div style="padding:20px 0px;">';
				
				$html .= '<div class="lm-column1">';
				
				$html .= '<div class="lm-bg">';
				$html .= '<div style="text-align:center;">';
				
				if($logo != ''){
					if(strpos($logo, "http") === false){
						$logo = 'http://'.$domain.'/'.$logo;
					}
					$html .= '<img src="'.$logo.'" alt="'.$businessName.' logo" />';
				}
				
				$html .= '<header><h3>Contact</h3></header>';
				$html .= $address;
				
				if($mobile != ''){
					$html .= '<div class="info">';
					$html .= '<i class="fa fa-mobile"></i>';
					$html .= '<span><a href="tel:'.$mobile.'">'.$mobile.'</a></span>';
					$html .= '</div>';
				}
				if($telephone != ''){
					$html .= '<div class="info">';
					$html .= '<i class="fa fa-phone"></i>';
					$html .= '<span><a href="tel:'.$telephone.'">'.$telephone.'</a></span>';
					$html .= '</div>';
				}
				if($website != ''){
					$html .= '<div class="info">';
					$html .= '<i class="fa fa-globe"></i>';
					if(strpos($website, 'http') !== 0){$website = 'http://'.$website;}
					$html .= '<a href="'.$website.'" target="_new">'.$website.'</a>';
					$html .= '</div>';
				}
				
				$html .= '</div>';
				$html .= '</div>';
				
				#Visited & Likes
				mysql_query('UPDATE businesslistings SET visited = (visited + 1) WHERE listingID = '.$listingID);
				
				$html .= '<div class="lm-bg">';
				$html .= '<table><tr>';
				
				$html .= '<td width="45%;" align="left">';
				$html .= ($visited+1).' views';
				$html .= '</td>';
				
				$html .= '<td width="45%;" align="right">';
				$html .= $liked.' likes';
				$html .= '</td>';
				
				$html .= '<td width="10%;" align="right">';
				$html .= '<a href="http://'.$domain.'/listing/'.$seoUrl.'.html?action=like" target="_blank" title="Like Us"><img src="http://'.$domain.$siteBaseUrl.'images/like-us.png" width="30" /></a>';
				$html .= '</td>';
				
				$html .= '</tr></table>';
				$html .= '</div>';
				#Visited & Likes End
				
				$html .= '</div>';
				
				$html .= '<div class="lm-column2">';
				
				#Gallery
				if(count($listingImgArr) > 0){
					$html .= '<div class="lm-bg">';
					$html .= '<header><h2>Gallery</h2></header>';
					
					$html .= '<ul id="img-gallery" class="gallery mosaicflow" data-item-height-calculation="attribute">';
					foreach($listingImgArr as $key => $arr){
						
						$alt = $arr->alt;
						
						if(strpos($arr->imgPath, "http") === false){
							$fullImgPath = 'http://'.$domain.stripslashes($arr->imgPath);
						}else {
							$fullImgPath = stripslashes($arr->imgPath);
						}
						
						$html .= '<li class="mosaicflow__item"><a href="'.$fullImgPath.'" title="'.$alt.'">';
						$html .= '<img src="'.$fullImgPath.'" alt="'.$businessName.'" /></a>';
						$html .= '</li>';
						
						
					}
					$html .= '</ul>';
					$html .= '</div>';
				}
				#Gallery End
				
				$html .= '<div class="lm-bg">';
				$html .= $description;
				$html .= '</div>';
				
				#Videos
				$videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE listingID = '.$listingID.' ORDER BY sOrder ASC');
				if(mysql_num_rows($videoRes) > 0){
					$html .= '<div class="lm-bg">';
					$html .= '<header><h2>videos</h2></header>';
					
					while($videoRow = mysql_fetch_object($videoRes)){
						$html .= '<iframe width="100%" height="315" src="https://www.youtube.com/embed/'.getYoutubeID(stripslashes($videoRow->videoUrl)).'" frameborder="0" allowfullscreen></iframe>';
					}
					$html .= '</div>';
				}
				#Videos End
				
				if($lat != '' && $lng != ''){
					$html .= '<div class="lm-bg">';
					$html .= '<iframe width="100%" height="170" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q='.$lat.','.$lng.'&hl=es;z=14&amp;output=embed"></iframe>';
					$html .= '</div>';
				}
				
				$html .= '</div>';
				
				$html .= '<div style="clear:both;"></div>';
				
				$html .= '</div>';
				 
				$seoTitle	= $businessName;
			}else {
				$html = '';
				$seoTitle	= 'Error - Invalid Listing';
				$seoKeyword	= 'Error - Invalid Listing';
				$seoDesc	= 'Error - Invalid Listing';
				$returnData['msg'] = 'Error - Invalid Listing';
			}
			
			$returnData['html'] 		= $html;
			$returnData['seoTitle']		= $seoTitle;
			$returnData['seoKeyword']	= $seoKeyword;
			$returnData['seoDesc']		= $seoDesc;
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>