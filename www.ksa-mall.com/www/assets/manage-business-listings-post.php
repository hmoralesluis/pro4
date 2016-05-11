<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-business-listings-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addListing'){
		
		$userID			= (int) $_POST['auserID'];
		$email			= getRecord('users', 'email', array('userID' => $userID));
		$catID			= (int) $_POST['acatID'];
		$subCatIDs		= $_POST['asubCatIDs'];
		$businessName	= trim($_POST['abusinessName']);
		$address		= trim($_POST['aaddress']);
		$telephone		= trim($_POST['atelephone']);
		$mobile			= trim($_POST['amobile']);
		$website		= trim($_POST['awebsite']);
		$description	= trim($_POST['adescription']);
		$offer			= trim($_POST['aoffer']);
		$tags			= trim($_POST['atags']);
		$seoUrl			= makePermaLink(trim($_POST['aseoUrl']));
		$seoTitle		= trim($_POST['aseoTitle']);
		$seoKeywords	= trim($_POST['aseoKeywords']);
		$seoDesc		= trim($_POST['aseoDesc']);
		$expiryOn		= trim($_POST['aexpiryOn']);
		$listedOn		= date('d-m-Y H:i:s');
		
		if($userID == '' || $userID == 0){
			$returnData['err']['auserID'] = '<span class="bg-red tip">Please Select a User.</span>';
		}
		if($catID == '' || $catID == 0){
			$returnData['err']['acatID'] = '<span class="bg-red tip">Please Select a Category.</span>';
		}
		if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
			$returnData['err']['asubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
		}
		if($businessName == ''){
			$returnData['err']['abusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
		}
		if($address == ''){
			$returnData['err']['aaddress'] = '<span class="bg-red tip">Please Enter Address of the Business.</span>';
		}
		if($description == ''){
			$returnData['err']['adescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
		}
		if($tags == ''){
			$returnData['err']['atags'] = '<span class="bg-red tip">Please Enter Tags for your Business.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
		}
		if(validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		if($seoTitle == ''){
			$returnData['err']['aseoTitle'] = '<span class="bg-red tip">Please Enter Listing SEO Title.</span>';
		}
		if($expiryOn == ''){
			$returnData['err']['aexpiryOn'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
		}
		
		if(!isset($returnData['err'])){
			
			$insertSql = '
				INSERT INTO businesslistings SET 
				userID			= '.$userID.', 
				email			= "'.mysql_real_escape_string($email).'", 
				catID			= '.$catID.', 
				subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
				businessName	= "'.mysql_real_escape_string($businessName).'", 
				address			= "'.mysql_real_escape_string($address).'", 
			';
			
			if($telephone != ''){$insertSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$insertSql .= 'telephone = NULL, ';}
			if($mobile != ''){$insertSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$insertSql .= 'mobile = NULL, ';}
			if($website != ''){$insertSql .= 'website = "'.mysql_real_escape_string($website).'", ';}else{$insertSql .= 'website = NULL, ';}
			
			$insertSql .= 'description = "'.mysql_real_escape_string($description).'", ';
			
			if($offer != ''){$insertSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$insertSql .= 'offer = NULL, ';}
			if($tags != ''){$insertSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$insertSql .= 'tags = NULL, ';}
			
			$insertSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
			
			if($seoTitle != ''){$insertSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$insertSql .= 'seoTitle = NULL, ';}
			if($seoKeywords != ''){$insertSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$insertSql .= 'seoKeywords = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$insertSql .= 'seoDesc = NULL, ';}
			
			$insertSql .= '
				status	 = "A", 
				listedOn = "'.date('Y-m-d H:i:s', strtotime($listedOn)).'", 
				expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'", 
				log		 = "<pre>Business Listing Added From Admin</pre>" 
			';
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Business Listing Added Successfully.</span>';
				
				$tr = '<tr class="listingRow" id="listingRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_cN_'.$insertedID.'">'.$catName.'</td>';
				$tr .= '<td id="td_sC_'.$insertedID.'">'.$subCatNames.'</td>';
				$tr .= '<td id="td_uE_'.$insertedID.'">'.$email.'</td>';
				$tr .= '<td id="td_bN_'.$insertedID.'">'.$businessName.'</td>';
				$tr .= '<td id="td_eO_'.$insertedID.'">'.$expiryOn.'</td>';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_s_'.$insertedID.'" align="center">'.$statusArr['A'].'</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-success editBtn" data-id="'.$insertedID.'" title="Manage Business Listing Images" data-a="getListingImages" data-u="'.$formPostUrl.'" data-w="editListingImageWindow">';
				$tr .= '<i class="glyphicon glyphicon-picture"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getListing" data-u="'.$formPostUrl.'" data-w="editListingWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delListing" data-u="'.$formPostUrl.'" data-at="Listing" data-numbering="listingRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '<td>';
                $tr .= '<label><input type="checkbox" class="check" name="listings[]" value="'.$insertedID.'" /></label>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
				$returnData['soptions']['asubCatIDs'] = '';
				
				#Create Folder
				if (!file_exists('../images/userfiles/business/'.$insertedID)) {
					mkdir('../images/userfiles/business/'.$insertedID);
				}
				#End
				
				$returnData['icheck'] = 'yes';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fix.</span>';
		}
	}else if($action == 'getListing'){
		$listingID = (int) $_POST['id'];
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		if(mysql_num_rows($listingRes) > 0){
			$returnData['status'] = 0;
			
			$listingRow = mysql_fetch_object($listingRes);
			
			$returnData['field']['listingID']		= $listingID;
			$returnData['select2']['euserID']		= stripslashes($listingRow->userID);
			$returnData['field']['ecatID']			= stripslashes($listingRow->catID);
			
			#Manipulate and Return the Sub Cat
			$soptions = '';
			$sOptionRes = mysql_query('SELECT * FROM category WHERE parentID = '.$listingRow->catID);
			$subCatIDs = explode(',', $listingRow->subCatIDs);
			$subCatArr = array();
			foreach($subCatIDs as $key => $subCatID){
				$subCatArr[$subCatID] = $subCatID;
			}
			
			if(mysql_num_rows($sOptionRes) > 0){
				while($sOptionRow = mysql_fetch_object($sOptionRes)){
					if(isset($subCatArr[$sOptionRow->catID])){$selected=' selected="selected"';}else{$selected='';}
					$soptions .= '<option value="'.$sOptionRow->catID.'"'.$selected.'>'.stripslashes($sOptionRow->catName).'</option>';
				}
			}
			$returnData['soptions']['esubCatIDs'] = $soptions;
			#End
			
			$returnData['field']['ebusinessName']	= stripslashes($listingRow->businessName);
			$returnData['field']['eaddress']		= stripslashes($listingRow->address);
			$returnData['field']['etelephone']		= stripslashes($listingRow->telephone);
			$returnData['field']['emobile']			= stripslashes($listingRow->mobile);
			$returnData['field']['ewebsite']		= stripslashes($listingRow->website);
			
			$returnData['tinymce']['edescription']	= stripslashes($listingRow->description);
			
			$returnData['field']['eoffer']			= stripslashes($listingRow->offer);
			$returnData['field']['etags']			= stripslashes($listingRow->tags);
			$returnData['field']['eseoUrl']			= stripslashes($listingRow->seoUrl);
			$returnData['field']['eseoTitle']		= stripslashes($listingRow->seoTitle);
			$returnData['field']['eseoKeywords']	= stripslashes($listingRow->seoKeywords);
			$returnData['field']['eseoDesc']		= stripslashes($listingRow->seoDesc);
			if($listingRow->expiryOn != ''){
				$returnData['field']['eexpiryOn']	= date('d-m-Y', strtotime($listingRow->expiryOn));
			}else {
				$returnData['field']['eexpiryOn']	= '';
			}
			$returnData['field']['estatus']			= stripslashes($listingRow->status);
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveListing'){
		$listingID = (int) $_POST['listingID'];
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		
		if(mysql_num_rows($listingRes) > 0){
			$listingRow = mysql_fetch_object($listingRes);
		
			$userID			= (int) $_POST['euserID'];
			$email			= getRecord('users', 'email', array('userID' => $userID));
			$catID			= (int) $_POST['ecatID'];
			$subCatIDs		= $_POST['esubCatIDs'];
			$businessName	= trim($_POST['ebusinessName']);
			$address		= trim($_POST['eaddress']);
			$telephone		= trim($_POST['etelephone']);
			$mobile			= trim($_POST['emobile']);
			$website		= trim($_POST['ewebsite']);
			$description	= trim($_POST['edescription']);
			$offer			= trim($_POST['eoffer']);
			$tags			= trim($_POST['etags']);
			$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
			$seoTitle		= trim($_POST['eseoTitle']);
			$seoKeywords	= trim($_POST['eseoKeywords']);
			$seoDesc		= trim($_POST['eseoDesc']);
			$expiryOn		= trim($_POST['eexpiryOn']);
			$status			= trim($_POST['estatus']);
			
			if($userID == '' || $userID == 0){
				$returnData['err']['euserID'] = '<span class="bg-red tip">Please Select a User.</span>';
			}
			if($catID == '' || $catID == 0){
				$returnData['err']['ecatID'] = '<span class="bg-red tip">Please Select a Category.</span>';
			}
			if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
				$returnData['err']['esubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
			}
			if($businessName == ''){
				$returnData['err']['ebusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
			}
			if($address == ''){
				$returnData['err']['eaddress'] = '<span class="bg-red tip">Please Enter Address of the Business.</span>';
			}
			if($description == ''){
				$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
			}
			if($tags == ''){
				$returnData['err']['etags'] = '<span class="bg-red tip">Please Enter Tags for your Business.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
			}
			if($seoUrl != $listingRow->seoUrl && validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			if($seoTitle == ''){
				$returnData['err']['eseoTitle'] = '<span class="bg-red tip">Please Enter Listing SEO Title.</span>';
			}
			if($expiryOn == ''){
				$returnData['err']['eexpiryOn'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
			}
			
			if(!isset($returnData['err'])){
				
				$updateSql = '
					UPDATE businesslistings SET 
					userID			= '.$userID.', 
					email			= "'.mysql_real_escape_string($email).'", 
					catID			= '.$catID.', 
					subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
					businessName	= "'.mysql_real_escape_string($businessName).'", 
					address			= "'.mysql_real_escape_string($address).'", 
				';
				
				if($telephone != ''){$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$updateSql .= 'telephone = NULL, ';}
				if($mobile != ''){$updateSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$updateSql .= 'mobile = NULL, ';}
				if($website != ''){$updateSql .= 'website = "'.mysql_real_escape_string($website).'", ';}else{$updateSql .= 'website = NULL, ';}
				
				$updateSql .= 'description = "'.mysql_real_escape_string($description).'", ';
				
				if($offer != ''){$updateSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$updateSql .= 'offer = NULL, ';}
				if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$updateSql .= 'tags = NULL, ';}
				
				$updateSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
				
				if($seoTitle != ''){$updateSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$updateSql .= 'seoTitle = NULL, ';}
				if($seoKeywords != ''){$updateSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeywords = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$updateSql .= 'seoDesc = NULL, ';}
				
				$updateSql .= '
					status	 = "'.mysql_real_escape_string($status).'", 
					expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'", 
					log		 = CONCAT(log, "<pre>Business Listing Updated From Admin on '.date('d-m-Y H:i:s').'</pre>") 
					WHERE listingID = '.$listingID.' 
				';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Listing Updated Successfully.</span>';
					
					$catNameRow = mysql_fetch_object(mysql_query('
						SELECT c1.catName, 
						(
							SELECT GROUP_CONCAT(c2.catName) FROM category AS c2 WHERE 1 = 1
							AND FIND_IN_SET(c2.catID, "'.implode(',', $subCatIDs).'") 
						) AS subCatNames 
						FROM category AS c1 
						WHERE c1.catID = '.$catID.' 
					'));
					$returnData['html']['td_cN_'.$listingID] = $catNameRow->catName;
					$returnData['html']['td_sC_'.$listingID] = $catNameRow->subCatNames;
					
					$returnData['html']['td_uE_'.$listingID] = $email;
					$returnData['html']['td_bN_'.$listingID] = $businessName;
					$returnData['html']['td_eO_'.$listingID] = $expiryOn;
					$returnData['html']['td_s_'.$listingID]	 = $statusArr[$status];
					
					$returnData['field']['eseoUrl'] = $seoUrl;
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>'.$updateSql;
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'delListing'){
		$listingID = (int) $_POST['id'];
		$listingRes = mysql_query('
			SELECT * FROM businesslistings WHERE listingID = '.$listingID.' 
		');
		
		if(mysql_num_rows($listingRes) > 0){
			//$listingRow = mysql_fetch_object($listingRes);
			
			$delSql = 'DELETE FROM businesslistings WHERE listingID = '.$listingID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Listing Deleted Successfully.</span>';
				
				#Delete Business Listing Directory
				deleteDir('../images/userfiles/business/'.$listingID);
				#End
				
				#Delete Business Listing Images
				mysql_query('DELETE FROM businesslistings_imgs WHERE listingID = '.$listingID);
				#End
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Listing, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Listing or Listing may Deleted, Please Contact Support.</span>';
		}
	}else if($action == 'loadSubCats'){
		$parentID = (int) $_POST['wValue'];
		$optionlist = '';
		
		$catRes = mysql_query('SELECT * FROM category WHERE parentID = '.$parentID.' ORDER BY sOrder ASC');
		if(mysql_num_rows($catRes) > 0){
			$optionlist .= '<option value="">All Sublisting</option>';
			while($catRow = mysql_fetch_object($catRes)){
				$optionlist .= '<option value="'.$catRow->catID.'">'.stripslashes($catRow->catName).'</option>';
			}
		}else {
			$optionlist .= '<option value="">No Sublisting</option>';
		}
		
		$returnData['optionlist'] = $optionlist;
	}else if($action == 'loadPopupSubCats'){
		$parentID = (int) $_POST['wValue'];
		$optionlist = '';
		
		$catRes = mysql_query('SELECT * FROM category WHERE parentID = '.$parentID.' ORDER BY sOrder ASC');
		if(mysql_num_rows($catRes) > 0){
			while($catRow = mysql_fetch_object($catRes)){
				$optionlist .= '<option value="'.$catRow->catID.'">'.stripslashes($catRow->catName).'</option>';
			}
		}else {
			//$optionlist .= '<option value="">No Sublisting</option>';
		}
		
		$returnData['optionlist'] = $optionlist;
	}else if($action == 'getListingImages'){
		$listingID = (int) $_POST['id'];
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		
		if(mysql_num_rows($listingRes) > 0){
			$returnData['status'] = 0;
			
			$imgRes = mysql_query('SELECT * FROM businesslistings_imgs WHERE listingID = '.$listingID);
			
			$tr = '';
			if(mysql_num_rows($imgRes) > 0){
				$sNo = 1;
				while($imgRow = mysql_fetch_object($imgRes)){
					$imgID = $imgRow->imgID;
					$imgPath = stripslashes($imgRow->imgPath);
					$sOrder = $imgRow->sOrder;
					
					$tr .= '<tr class="imageRow" id="imageRow_'.$imgID.'">';
					$tr .= '<td>'.$sNo.'</td>';
					$tr .= '<td id="td_iP_'.$imgID.'">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
					$tr .= '</td>';
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$imgID.'" data-resultprefix="iSort_" />';
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
				$tr .= '<td colspan="4" align="center"><span class="text-red">No Records Found</span></td>';
				$tr .= '</tr>';
			}
			$returnData['table']['imageTable'] = $tr;
			
			$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/business/'.$listingID;
			$_SESSION['imgManagerFileSelectPath'] = '/new/images/userfiles/business/'.$listingID.'/';
			$_SESSION['imgManageruploadMaxSize'] = '500K';
			
			$returnData['field']['ilistingID'] = $listingID;
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Business Listing may Deleted, Please Contact Support.';
		}
	}else if($action == 'addImages'){
		$listingID	= (int) $_POST['listingID'];
		$files		= $_POST['files'];
		$files		= explode(',', $files);
		
		if(!is_array($files) || count($files) == 0 || count($files) > 0 && $files[0] == ''){
			$returnData['msg'] = '<span class="bg-red tip">Please Select atleast one Image File.</span>';
		}else {
			$insertSql = 'INSERT INTO businesslistings_imgs (listingID, imgPath) VALUES ';
			
			$totalFiles = count($files);
			$n = 1;
			foreach($files as $key => $imgPath){
				
				$insertSql .= '('.$listingID.', "'.$imgPath.'")';
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
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$lastInsertID.'" data-resultprefix="iSort_" />';
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
				$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>'.$insertSql;
			}
		}
	}else if($action == 'sortImage'){
		$imgID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($imgID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE businesslistings_imgs SET 
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
	}else if($action == 'deleteSelectedImages'){
		$ids		= $_POST['images'];
		$listingID	= (int) $_POST['ilistingID'];
		
		$idsStr = implode(',', $ids);
		$deletedIdsArr = array();
		
		$imgRes = mysql_query('SELECT * FROM businesslistings_imgs WHERE imgID IN ('.$idsStr.')');
		
		if(mysql_num_rows($imgRes) > 0){
			$delSql = 'DELETE FROM businesslistings_imgs WHERE imgID IN ('.$idsStr.')';
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				while($imgRow = mysql_fetch_object($imgRes)){
					$returnData['anim']['imageRow_'.$imgRow->imgID] = 'remove';
				}
				$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
			}
		}else {
			$returnData['msg'] = 'Selected Channels not Found, or Deleted Already, Please Contact Support.';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>