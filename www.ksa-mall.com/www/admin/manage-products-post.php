<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-products-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addProduct'){
		
		$subCatIDs		= $_POST['asubCatIDs'];
		$productName	= trim($_POST['aproductName']);
		$bannerImg		= trim($_POST['abannerImg']);
		$bannerPosition= trim($_POST['abannerPosition']);
		$description	= trim($_POST['adescription']);
		$price			= trim($_POST['aprice']);
		$ccPayment		= trim($_POST['accPayment']);
		$ccPaymentLink	= trim($_POST['accPaymentLink']);
		$cod			= trim($_POST['acod']);
		$codCountries	= trim($_POST['acodCountries']);
		$invoice		= trim($_POST['ainvoice']);
		$codTemplate	= trim($_POST['acodTemplate']);
		$wiTemplate		= trim($_POST['awiTemplate']);
		$eiTemplate		= trim($_POST['aeiTemplate']);
		$tags			= trim($_POST['atags']);
		$seoUrl			= makePermaLink(trim($_POST['aseoUrl']));
		$seoTitle		= trim($_POST['aseoTitle']);
		$seoKeywords	= trim($_POST['aseoKeywords']);
		$seoDesc		= trim($_POST['aseoDesc']);
		$addedOn		= date('Y-m-d H:i:s');
		
		if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
			$returnData['err']['asubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
		}
		if($productName == ''){
			$returnData['err']['aproductName'] = '<span class="bg-red tip">Please Enter Product Name.</span>';
		}
		if($bannerImg != '' && $bannerPosition == ''){
			$returnData['err']['abannerPosition'] = '<span class="bg-red tip">Please Select a Banner Position.</span>';
		}
		if($description == ''){
			$returnData['err']['adescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
		}
		if($ccPayment == 'Y' && $ccPaymentLink == ''){
			$returnData['err']['accPaymentLink'] = '<span class="bg-red tip">Please Enter URL.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
		}
		if(validateRecord('products', array('seoUrl' => $seoUrl))){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		if(!isset($returnData['err'])){
			
			$insertSql = '
				INSERT INTO products SET 
				subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
				productName		= "'.mysql_real_escape_string($productName).'", 
			';
			
			if($bannerImg != ''){
				$insertSql .= '
					bannerImg		= "'.mysql_real_escape_string($bannerImg).'", 
					bannerPosition	= "'.mysql_real_escape_string($bannerPosition).'", 
				';
			}else {
				$insertSql .= '
					bannerImg		= NULL, 
					bannerPosition	= NULL, 
				';
			}
			
			if($ccPaymentLink != ''){
				if($ccPaymentLink != 'http://' && $ccPaymentLink != 'https://'){
					$insertSql .= 'ccPaymentLink = "'.mysql_real_escape_string($ccPaymentLink).'", ccPayment = "Y", ';
				}else {
					$insertSql .= 'ccPaymentLink = NULL, ccPayment = "N", ';
				}
			}else{
				$insertSql .= 'ccPaymentLink = NULL, ccPayment = "N", ';
			}
			
			$insertSql .= '
				cod				= "'.mysql_real_escape_string($cod).'", 
				invoice			= "'.mysql_real_escape_string($invoice).'", 
			';
			
			$insertSql .= 'description = "'.mysql_real_escape_string($description).'", ';
			
			if($price != ''){$insertSql .= 'price = "'.mysql_real_escape_string($price).'", ';}else{$insertSql .= 'price = NULL, ';}
			if($codCountries != ''){$insertSql .= 'codCountries = "'.mysql_real_escape_string($codCountries).'", ';}else{$insertSql .= 'codCountries = NULL, ';}
			if($codTemplate != ''){$insertSql .= 'codTemplate = "'.mysql_real_escape_string($codTemplate).'", ';}else{$insertSql .= 'codTemplate = NULL, ';}
			if($wiTemplate != ''){$insertSql .= 'wiTemplate = "'.mysql_real_escape_string($wiTemplate).'", ';}else{$insertSql .= 'wiTemplate = NULL, ';}
			if($eiTemplate != ''){$insertSql .= 'eiTemplate = "'.mysql_real_escape_string($eiTemplate).'", ';}else{$insertSql .= 'eiTemplate = NULL, ';}
			if($tags != ''){$insertSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$insertSql .= 'tags = NULL, ';}
			
			$insertSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
			
			if($seoTitle != ''){$insertSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$insertSql .= 'seoTitle = NULL, ';}
			if($seoKeywords != ''){$insertSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$insertSql .= 'seoKeywords = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$insertSql .= 'seoDesc = NULL, ';}
			
			$insertSql .= '
				status	 = "A", 
				addedOn = "'.date('Y-m-d', strtotime($addedOn)).'", 
				log		 = "<pre>Product Added From Admin</pre>" 
			';
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Product Added Successfully.</span>';
				
				$scNameRow = mysql_fetch_object(mysql_query('
					SELECT GROUP_CONCAT(c2.pCatName) AS subCatNames FROM product_cat AS c2 WHERE 1 = 1
					AND FIND_IN_SET(c2.pCatID, "'.implode(',', $subCatIDs).'") 
				'));
				
				$tr = '<tr class="productRow" id="Row'.$insertedID.'">';
				$tr .= '<td>0</td>';
				//$tr .= '<td id="td_cN_'.$insertedID.'">'.$catNameRow->catNames.'</td>';
				$tr .= '<td id="td_sC_'.$insertedID.'">'.$scNameRow->subCatNames.'</td>';
				$tr .= '<td id="td_bN_'.$insertedID.'">'.$productName.'</td>';
				$tr .= '<td id="td_eO_'.$insertedID.'">'.$addedOn.'</td>';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_s_'.$insertedID.'" align="center">'.$statusArr['A'].'</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-success editBtn" data-id="'.$insertedID.'" title="Manage Product  Images" data-a="getProductImages" data-u="'.$formPostUrl.'" data-w="editProductImageWindow">';
				$tr .= '<i class="glyphicon glyphicon-picture"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getProduct" data-u="'.$formPostUrl.'" data-w="editProductWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delProduct" data-u="'.$formPostUrl.'" data-at="Product" data-numbering="productRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '<td>';
                $tr .= '<label><input type="checkbox" class="check" name="products[]" value="'.$insertedID.'" /></label>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
				
				#Create Folder
				if(!file_exists('../images/userfiles/products/'.$insertedID)){
					$returnData['debug'] = 'Folder not Found!';
					
					if(!mkdir('../images/userfiles/products/'.$insertedID)){
						$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
					}
				}
				#End
				
				$returnData['icheck'] = 'yes';
				
				#Reset Category & Sub Category
				$returnData['resetswapoption']['asubCatIDs'] = 'catLists';
				#End
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
		}
	}else if($action == 'getProduct'){
		$productID = (int) $_POST['id'];
		
		$pRes = mysql_query('SELECT * FROM products WHERE productID = '.$productID);
		if(mysql_num_rows($pRes) > 0){
			$returnData['status'] = 0;
			
			#Create Folder
			if(!file_exists('../images/userfiles/')){
				$returnData['debug'] = 'Folder not Found!';
				
				if(!mkdir('../images/userfiles/')){
					$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
				}
			}
			#End
			
			$pRow = mysql_fetch_object($pRes);
			
			$returnData['field']['productID']	= $productID;
			
			#Manipulate and Return the Sub Cats
			$pCatArr = array();
			$pCatRes = mysql_query('SELECT * FROM product_cat WHERE parentID = 0 ORDER BY sOrder ASC');
			if(mysql_num_rows($pCatRes) > 0){
				while($pCatRow = mysql_fetch_object($pCatRes)){
					$pCatArr[$pCatRow->pCatID] = stripslashes($pCatRow->pCatName);
				}
			}
			
			$subCatIDs = explode(',', $pRow->subCatIDs);
			$subCatIdsArr = array();
			foreach($subCatIDs as $key => $val){
				$subCatIdsArr[$val] = $val;
			}
			
			$ecatLists	= '';
			$esubCatIDs	= '';
			$clcount = 1;
			foreach($pCatArr as $clcatID => $clcatName){
				$ecatLists .= '<option value="" data-sort="'.$clcount.'">'.$clcatName.'</option>';
				$clscRes = mysql_query('SELECT * FROM product_cat WHERE parentID = '.$clcatID.' ORDER BY sOrder ASC');
				if(mysql_num_rows($clscRes) > 0){
					while($clscRow = mysql_fetch_object($clscRes)){
						$clcount++;
						
						$clsCatID	= $clscRow->pCatID;
						$clsCatName	= stripslashes($clscRow->pCatName);
						if(isset($subCatIdsArr[$clscRow->pCatID])){
							$esubCatIDs .= '<option value="'.$clsCatID.'" data-sort="'.$clcount.'" selected="selected">&nbsp;&nbsp;- '.$clsCatName.'</option>';
						}else {
							$ecatLists .= '<option value="'.$clsCatID.'" data-sort="'.$clcount.'">&nbsp;&nbsp;- '.$clsCatName.'</option>';
						}
					}
				}
				$clcount++;
			}
			
			$returnData['soptions']['ecatLists']	= $ecatLists;
			$returnData['soptions']['esubCatIDs']	= $esubCatIDs;
			#End
			
			$returnData['field']['eproductName']	= stripslashes($pRow->productName);
			$returnData['field']['ebannerImg']		= stripslashes($pRow->bannerImg);
			$returnData['field']['ebannerPosition']	= stripslashes($pRow->bannerPosition);
			$returnData['tinymce']['edescription']	= stripslashes($pRow->description);
			$returnData['field']['eprice']			= stripslashes($pRow->price);
			$returnData['field']['eccPayment']		= stripslashes($pRow->ccPayment);
			
			if($pRow->ccPaymentLink != ''){
				$returnData['field']['eccPaymentLink']	= stripslashes($pRow->ccPaymentLink);
			}else {
				$returnData['field']['eccPaymentLink']	= 'http://';
			}
			
			$returnData['field']['ecod']			= stripslashes($pRow->cod);
			$returnData['field']['ecodCountries']	= stripslashes($pRow->codCountries);
			$returnData['field']['einvoice']		= stripslashes($pRow->invoice);
			$returnData['tinymce']['ecodTemplate']	= stripslashes($pRow->codTemplate);
			$returnData['tinymce']['ewiTemplate']	= stripslashes($pRow->wiTemplate);
			$returnData['tinymce']['eeiTemplate']	= stripslashes($pRow->eiTemplate);
			$returnData['field']['etags']			= stripslashes($pRow->tags);
			$returnData['field']['eseoUrl']			= stripslashes($pRow->seoUrl);
			$returnData['field']['eseoTitle']		= stripslashes($pRow->seoTitle);
			$returnData['field']['eseoKeywords']	= stripslashes($pRow->seoKeywords);
			$returnData['field']['eseoDesc']		= stripslashes($pRow->seoDesc);
			
			$returnData['field']['estatus']			= stripslashes($pRow->status);
			
			$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/products/'.$productID.'/';
			$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/products/'.$productID.'/';
			$_SESSION['imgManageruploadMaxSize'] = '5MB';
			$returnData['session'] = $_SESSION;
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveProduct'){
		$productID = (int) $_POST['productID'];
		
		$pRes = mysql_query('SELECT * FROM products WHERE productID = '.$productID);
		
		if(mysql_num_rows($pRes) > 0){
			$pRow = mysql_fetch_object($pRes);
		
			$subCatIDs		= $_POST['esubCatIDs'];
			$productName	= trim($_POST['eproductName']);
			$bannerImg		= trim($_POST['ebannerImg']);
			$bannerPosition= trim($_POST['ebannerPosition']);
			$description	= trim($_POST['edescription']);
			$price			= trim($_POST['eprice']);
			$ccPayment		= trim($_POST['eccPayment']);
			$ccPaymentLink	= trim($_POST['eccPaymentLink']);
			$cod			= trim($_POST['ecod']);
			$codCountries	= trim($_POST['ecodCountries']);
			$invoice		= trim($_POST['einvoice']);
			$codTemplate	= trim($_POST['ecodTemplate']);
			$wiTemplate		= trim($_POST['ewiTemplate']);
			$eiTemplate		= trim($_POST['eeiTemplate']);
			$tags			= trim($_POST['etags']);
			$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
			$seoTitle		= trim($_POST['eseoTitle']);
			$seoKeywords	= trim($_POST['eseoKeywords']);
			$seoDesc		= trim($_POST['eseoDesc']);
			$status			= trim($_POST['estatus']);
			
			if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
				$returnData['err']['esubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
			}
			if($productName == ''){
				$returnData['err']['eproductName'] = '<span class="bg-red tip">Please Enter Product Name.</span>';
			}
			if($bannerImg != '' && $bannerPosition == ''){
				$returnData['err']['ebannerPosition'] = '<span class="bg-red tip">Please Select a Banner Position.</span>';
			}
			if($description == ''){
				$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
			}
			if($ccPayment == 'Y' && $ccPaymentLink == ''){
				$returnData['err']['eccPaymentLink'] = '<span class="bg-red tip">Please Enter URL.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
			}
			if($seoUrl != $pRow->seoUrl && validateRecord('products', array('seoUrl' => $seoUrl))){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if(!isset($returnData['err'])){
				
				$updateSql = '
					UPDATE products SET 
					subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
					productName		= "'.mysql_real_escape_string($productName).'", 
					ccPayment		= "'.mysql_real_escape_string($ccPayment).'", 
				';
				
				if($bannerImg != ''){
					$updateSql .= '
						bannerImg		= "'.mysql_real_escape_string($bannerImg).'", 
						bannerPosition	= "'.mysql_real_escape_string($bannerPosition).'", 
					';
				}else {
					$updateSql .= '
						bannerImg		= NULL, 
						bannerPosition	= NULL, 
					';
				}
				
				if($ccPaymentLink != ''){
					if($ccPaymentLink != 'http://' && $ccPaymentLink != 'https://'){
						$updateSql .= 'ccPaymentLink = "'.mysql_real_escape_string($ccPaymentLink).'", ';
					}else {
						$updateSql .= 'ccPaymentLink = NULL, ';
					}
				}else{
					$updateSql .= 'ccPaymentLink = NULL, ';
				}
				
				$updateSql .= '
					cod				= "'.mysql_real_escape_string($cod).'",
					invoice			= "'.mysql_real_escape_string($invoice).'",  
				';
				
				$updateSql .= 'description = "'.mysql_real_escape_string($description).'", ';
				
				if($price != ''){$updateSql .= 'price = "'.mysql_real_escape_string($price).'", ';}else{$updateSql .= 'price = NULL, ';}
				if($codCountries != ''){$updateSql .= 'codCountries = "'.mysql_real_escape_string($codCountries).'", ';}else{$updateSql .= 'codCountries = NULL, ';}
				if($codTemplate != ''){$updateSql .= 'codTemplate = "'.mysql_real_escape_string($codTemplate).'", ';}else{$updateSql .= 'codTemplate = NULL, ';}
				if($wiTemplate != ''){$updateSql .= 'wiTemplate = "'.mysql_real_escape_string($wiTemplate).'", ';}else{$updateSql .= 'wiTemplate = NULL, ';}
				if($eiTemplate != ''){$updateSql .= 'eiTemplate = "'.mysql_real_escape_string($eiTemplate).'", ';}else{$updateSql .= 'eiTemplate = NULL, ';}
				if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$updateSql .= 'tags = NULL, ';}
				
				$updateSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
				
				if($seoTitle != ''){$updateSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$updateSql .= 'seoTitle = NULL, ';}
				if($seoKeywords != ''){$updateSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeywords = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$updateSql .= 'seoDesc = NULL, ';}
				
				$updateSql .= '
					status	 = "'.mysql_real_escape_string($status).'", 
					log		 = CONCAT(log, "<pre>Product Updated From Admin on '.date('d-m-Y H:i:s').'</pre>") 
					WHERE productID = '.$productID.' 
				';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Product Updated Successfully.</span>';
					
					$scNameSql = '
						SELECT GROUP_CONCAT(c2.pCatName) AS subCatNames FROM product_cat AS c2 WHERE 1 = 1
						AND FIND_IN_SET(c2.pCatID, "'.implode(',', $subCatIDs).'") 
					';
					$returnData['sql'] = $catNameSql;
					$scNameRow = mysql_fetch_object(mysql_query($scNameSql));
					
					$returnData['html']['td_sC_'.$productID] = $scNameRow->subCatNames;
					$returnData['html']['td_pN_'.$productID] = $productName;
					$returnData['html']['td_s_'.$productID]	 = $statusArr[$status];
					
					$returnData['field']['eseoUrl'] = $seoUrl;
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'delProduct'){
		$productID = (int) $_POST['id'];
		
		$productRes = mysql_query('
			SELECT * FROM products WHERE productID = '.$productID.' 
		');
		
		if(mysql_num_rows($productRes) > 0){
			
				$delSql = 'DELETE FROM products WHERE productID = '.$productID.'';
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Product Deleted Successfully.</span>';
					$delSql = mysql_query('DELETE FROM product_imgs WHERE productID = '.$productID);
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Product, Please Contact Support.</span>';
				}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Product or Product may Deleted, Please Contact Support.</span>';
		}
	}else if($action == 'loadSubCats'){
		$parentID = (int) $_POST['wValue'];
		$optionlist = '';
		
		$pCatRes = mysql_query('SELECT * FROM product_cat WHERE parentID = '.$parentID.' ORDER BY sOrder ASC');
		if(mysql_num_rows($pCatRes) > 0){
			$optionlist .= '<option value="">All SubProduct</option>';
			while($pCatRow = mysql_fetch_object($pCatRes)){
				$optionlist .= '<option value="'.$pCatRow->pCatID.'">'.stripslashes($pCatRow->pCatName).'</option>';
			}
		}else {
			$optionlist .= '<option value="">No SubProduct</option>';
		}
		
		$returnData['optionlist'] = $optionlist;
	}else if($action == 'loadPopupSubCats'){
		$parentID = trim($_POST['wValue']);
		$optionlist = '';
		
		$pCatSql = 'SELECT * FROM product_cat WHERE parentID IN ('.$parentID.') ORDER BY sOrder ASC';
		$returnData['sql'] = $pCatSql;
		$pCatRes = mysql_query($pCatSql);
		if(mysql_num_rows($pCatRes) > 0){
			while($pCatRow = mysql_fetch_object($pCatRes)){
				$optionlist .= '<option value="'.$pCatRow->pCatID.'">'.stripslashes($pCatRow->pCatName).'</option>';
			}
		}else {
			//$optionlist .= '<option value="">No Sublisting</option>';
		}
		
		$returnData['optionlist'] = $optionlist;
	}else if($action == 'getProductImages'){
		$productID = (int) $_POST['id'];
		
		$pRes = mysql_query('SELECT * FROM products WHERE productID = '.$productID);
		
		if(mysql_num_rows($pRes) > 0){
			$returnData['status'] = 0;
			
			$imgRes = mysql_query('SELECT * FROM product_imgs WHERE productID = '.$productID);
			
			$tr = '';
			if(mysql_num_rows($imgRes) > 0){
				$sNo = 1;
				while($imgRow = mysql_fetch_object($imgRes)){
					$imgID	 = $imgRow->imgID;
					$imgPath = stripslashes($imgRow->imgPath);
					$caption = stripslashes($imgRow->caption);
					$alt	 = stripslashes($imgRow->alt);
					$sOrder	 = $imgRow->sOrder;
					
					$tr .= '<tr class="imageRow" id="imageRow_'.$imgID.'">';
					$tr .= '<td>'.$sNo.'</td>';
					$tr .= '<td id="td_iP_'.$imgID.'">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
					$tr .= '</td>';
					
					$tr .= '<td>';
					$tr .= '<input type="text" class="form-control" name="captions['.$imgID.']" value="'.$caption.'" style="margin-bottom:0px;" />';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<input type="text" class="form-control" name="alts['.$imgID.']" value="'.$alt.'" style="margin-bottom:0px;" />';
					$tr .= '</td>';
					
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text" class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$imgID.'" data-resultprefix="iSort_" style="margin-bottom:0px;" />';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$imgID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$imgID.'" /></label>';
					$tr .= '</td>';
					$tr .= '</tr>';
					
					$sNo++;
				}
				$returnData['icheck'] = 'yes';
			}else {
				$tr .= '<tr class="errorRow">';
				$tr .= '<td colspan="6" align="center"><span class="text-red">No Records Found</span></td>';
				$tr .= '</tr>';
			}
			$returnData['table']['imageTable'] = $tr;
			
			$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/products/'.$productID.'/';
			$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/products/'.$productID.'/';
			$_SESSION['imgManageruploadMaxSize'] = '5MB';
			
			$returnData['field']['iproductID'] = $productID;
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Product may Deleted, Please Contact Support.';
		}
	}else if($action == 'addImageUrl'){
		$imgPath	= trim($_POST['val']);
		$productID	= (int) $_POST['where'];
		
		if($imgPath != '' && $productID > 0){
			$insertSql = 'INSERT INTO product_imgs (productID, imgPath) VALUES ('.$productID.', "'.mysql_real_escape_string($imgPath).'")';
			
			if(mysql_query($insertSql)){
				$insertedID = mysql_insert_id();
				
				$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-green tip">Image Url Added Successfully.</span>';
				
				$returnData['status']	= 0;
				
				$tr = '<tr class="imageRow" id="imageRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_iP_'.$insertedID.'">';
				$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
				$tr .= '</td>';
				
				$tr .= '<td>';
				$tr .= '<input type="text" class="form-control" name="captions['.$insertedID.']" value="" style="margin-bottom:0px;" />';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<input type="text" class="form-control" name="alts['.$insertedID.']" value="" style="margin-bottom:0px;" />';
				$tr .= '</td>';
				
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$insertedID.'" data-resultprefix="iSort_" style="margin-bottom:0px;" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$insertedID.'" /></label>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['icheck']				  = 'yes';
				$returnData['appendtr']['imageTable'] = $tr;
				$returnData['field']['aimgurl']		  = '';
			}else {
				$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}else {
			$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-red tip">Required Details are not Found.</span>';
		}
		
	}else if($action == 'addImages'){
		$productID	= (int) $_POST['productID'];
		$files		= $_POST['files'];
		$files		= explode(',', $files);
		
		if(!is_array($files) || count($files) == 0 || count($files) > 0 && $files[0] == ''){
			$returnData['msg'] = '<span class="bg-red tip">Please Select atleast one Image File.</span>';
		}else {
			$insertSql = 'INSERT INTO product_imgs (productID, imgPath) VALUES ';
			
			$totalFiles = count($files);
			$n = 1;
			foreach($files as $key => $imgPath){
				
				$insertSql .= '('.$productID.', "'.$imgPath.'")';
				if($n != $totalFiles){
					$insertSql .= ',';
				}
				
				$n++;
			}
			
			if(mysql_query($insertSql)){
				$lastInsertID = mysql_insert_id();
				
				$returnData['msg'] = '<span class="bg-green tip">Image(s) Added Successfully.</span>';
				
				$returnData['status']	= 0;
				
				$tr ='';
				
				foreach($files as $key => $imgPath){
					
					$tr .= '<tr class="imageRow" id="imageRow_'.$lastInsertID.'">';
					$tr .= '<td>0</td>';
					$tr .= '<td id="td_iP_'.$lastInsertID.'">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
					$tr .= '</td>';
					
					$tr .= '<td>';
					$tr .= '<input type="text" class="form-control" name="captions['.$lastInsertID.']" value="" style="margin-bottom:0px;" />';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<input type="text" class="form-control" name="alts['.$lastInsertID.']" value="" style="margin-bottom:0px;" />';
					$tr .= '</td>';
					
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text" class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$lastInsertID.'" data-resultprefix="iSort_" style="margin-bottom:0px;" />';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:30%;" id="iSort_'.$lastInsertID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<label><input type="checkbox" class="imgcheck" name="images[]" value="'.$lastInsertID.'" /></label>';
					$tr .= '</td>';
					$tr .= '</tr>';
                    
					$lastInsertID++;
				}
				
				$returnData['icheck'] = 'yes';
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}
	}else if($action == 'updateIsFeatured'){
		$productID	= (int) $_POST['wid'];
		$isFeatured	= trim($_POST['val']);
		
		if($productID != '' && ($isFeatured == 'Y' || $isFeatured == 'N')){
			$updateSql = '
				UPDATE products SET 
				isFeatured = "'.mysql_real_escape_string($isFeatured).'" 
				WHERE productID = '.$productID.'
			';
			
			if(mysql_query($updateSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<button class="closeButton btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
			}else {
				$returnData['msg'] = '<button class="closeButton btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
			}
		}else {
			$returnData['msg'] = '<button class="closeButton btn btn-danger btn-xs" title="Invalid Request"><i class="fa fa-thumbs-down"></i></button>';
		}
	}else if($action == 'sortImage'){
		$imgID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($imgID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE product_imgs SET 
				sOrder = '.$sOrder.'
				WHERE imgID = '.$imgID.'
			';
			
			if(mysql_query($updateSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<button class="btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
			}else {
				$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
			}
		}else {
			$returnData['msg'] = '<button class="btn btn-danger btn-xs" title="Invalid Request"><i class="fa fa-thumbs-down"></i></button>';
		}
	}else if($action == 'actionForMultipleImages'){
		$productID	= (int) $_POST['iproductID'];
		
		if(isset($_POST['deleteAll'])){
			$ids		= $_POST['images'];
			$idsStr = implode(',', $ids);
			$deletedIdsArr = array();
			
			$imgRes = mysql_query('SELECT * FROM product_imgs WHERE imgID IN ('.$idsStr.')');
			
			if(mysql_num_rows($imgRes) > 0){
				$delSql = 'DELETE FROM product_imgs WHERE imgID IN ('.$idsStr.')';
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					while($imgRow = mysql_fetch_object($imgRes)){
						$returnData['anim']['imageRow_'.$imgRow->imgID] = 'remove';
					}
					$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
				}
			}else {
				$returnData['msg'] = 'Selected Images not Found, or Deleted Already, Please Contact Support.';
			}
		}else if(isset($_POST['saveAll'])){
			$captions	= $_POST['captions'];
			$alts		= $_POST['alts'];
			
			$returnData['debug'] = json_encode($captions);
			
			$updatedRecords = 0;
			
			foreach($captions as $imgID => $caption){
				$updateImgSql = '
					UPDATE product_imgs SET 
					caption	= "'.mysql_real_escape_string($caption).'", 
					alt		= "'.mysql_real_escape_string($alts[$imgID]).'" 
					WHERE imgID = '.$imgID.' 
				';
				
				if(mysql_query($updateImgSql)){
					$updatedRecords++;
				}
			}
			
			if($updatedRecords > 0){
				$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Updated Successfully.</span>';
			}else {
				$returnData['html']['editProductImageWindow .sMsg'] = '<span class="bg-red tip">Error on Updating Records, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = 'Invalid Action.';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>