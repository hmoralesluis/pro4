<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-business-listings-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	//$returnData['post'] = $_POST;
	
	$action	= $_POST['a'];
	
	if($action == 'addListing'){
		
		$email			= trim($_POST['aemail']);
		$password		= trim($_POST['apassword']);
		
		$subCatIDs		= $_POST['asubCatIDs'];
		$businessName	= trim($_POST['abusinessName']);
		$logo			= trim($_POST['alogo']);
		$image			= trim($_POST['aimgPath']);
		$address		= trim($_POST['aaddress']);
		$location		= trim($_POST['alocation']);
		$telephone		= trim($_POST['atelephone']);
		$mobile			= trim($_POST['amobile']);
		$businessEmail	= trim($_POST['abusinessEmail']);
		$website		= trim($_POST['awebsite']);
		$facebook		= trim($_POST['afacebook']);
		$description	= trim($_POST['adescription']);
		$offer			= trim($_POST['aoffer']);
		$events			= trim($_POST['aevents']);
		$tags			= trim($_POST['atags']);
		$seoUrl			= makePermaLink(trim($_POST['aseoUrl']));
		$seoTitle		= trim($_POST['aseoTitle']);
		$seoKeywords	= trim($_POST['aseoKeywords']);
		$seoDesc		= trim($_POST['aseoDesc']);
		
		$lat			= trim($_POST['alat']);
		$lng			= trim($_POST['alng']);
		
		$expiryOn		= trim($_POST['aexpiryOn']);
		$listedOn		= date('d-m-Y H:i:s');

		if (isset($_POST['afeatured'])) {
			$featured		= 1;
		} else {
			$featured		= 0;
		}


		$featured		= $_POST['afeatured'];
		
		if($email != '' && !isEmail($email)){
			$returnData['err']['aemail'] = '<span class="bg-red tip">Invalid Email Format, Please contact support.</span>';
		}
		if($email != '' && validateRecord('users', array('email' => $email))){
			$returnData['err']['aemail'] = '<span class="bg-red tip">Entered Email Already Registered with User.</span>';
		}
		if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
			$returnData['err']['asubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
		}
		if($businessName == ''){
			$returnData['err']['abusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
		}
		if($description == ''){
			$returnData['err']['adescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
		}
		if(validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		if($expiryOn == ''){
			$returnData['err']['aexpiryOn'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
		}
		
		if($email == ''){
			$userID	= 0;
			$email	= 'Admin';
		}else if($email != ''){
			#Insert User
			if($password != ''){
				$password = '"'.mysql_real_escape_string(encrypt($password)).'"';
			}else {
				$password = 'NULL';
			}
			$insertUserSql = '
				INSERT INTO users SET 
				email		= "'.mysql_real_escape_string($email).'", 
				password	= '.$password.', 
				fullname	= "'.mysql_real_escape_string($email).'", 
				countryName	= "Lebanon", 
				status		= "A", 
				createdOn	= "'.date('Y-m-d H:i:s').'", 
				log			= "<pre>User Created From Admin.</pre>" 
			';
			if(mysql_query($insertUserSql)){
				$userID	= mysql_insert_id();
			}else {
				$returnData['err']['aemail'] = '<span class="bg-red tip">Error on Inserting Record in User Table.</span>';
			}
			#End
		}
		
		if(!isset($returnData['err'])){
			
			$insertSql = '
				INSERT INTO businesslistings SET 
				userID			= '.$userID.', 
				email			= "'.mysql_real_escape_string($email).'", 
				subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
				businessName	= "'.mysql_real_escape_string($businessName).'", 
				logo			= "'.mysql_real_escape_string($logo).'",
				imgPath			= "'.mysql_real_escape_string($image).'", 
				address			= "'.mysql_real_escape_string($address).'", 
				location		= "'.mysql_real_escape_string($location).'", 
			';
			
			if($telephone != ''){$insertSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$insertSql .= 'telephone = NULL, ';}
			if($mobile != ''){$insertSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$insertSql .= 'mobile = NULL, ';}
			
			$insertSql .= 'businessEmail = "'.mysql_real_escape_string($businessEmail).'", ';
			
			if($website != ''){$insertSql .= 'website = "'.mysql_real_escape_string($website).'", ';}else{$insertSql .= 'website = NULL, ';}
			/* Facebook url added by kavitha on 12-6-2015*/
			if($facebook != ''){$insertSql .= 'facebookPage = "'.mysql_real_escape_string($facebook).'", ';}else{$insertSql .= 'facebookPage = NULL, ';}
			
			$insertSql .= 'description = "'.mysql_real_escape_string($description).'", ';
			
			if($offer != ''){$insertSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$insertSql .= 'offer = NULL, ';}
			if($events != ''){$insertSql .= 'events = "'.mysql_real_escape_string($events).'", ';}else{$insertSql .= 'events = NULL, ';}
			if($tags != ''){$insertSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$insertSql .= 'tags = NULL, ';}
			
			$insertSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
			
			if($seoTitle != ''){$insertSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$insertSql .= 'seoTitle = NULL, ';}
			if($seoKeywords != ''){$insertSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$insertSql .= 'seoKeywords = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$insertSql .= 'seoDesc = NULL, ';}
			if($lat != ''){$insertSql .= 'lat = '.$lat.', ';}else{$insertSql .= 'lat = NULL, ';}
			if($lng != ''){$insertSql .= 'lng = '.$lng.', ';}else{$insertSql .= 'lng = NULL, ';}

			
			$insertSql .= '
				status	 = "A", 
				listedOn = "'.date('Y-m-d H:i:s', strtotime($listedOn)).'", 
				expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'",
				featured = "'.mysql_real_escape_string($featured).'", 
				log		 = "<pre>Business Listing Added From Admin</pre>" 
			';
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Business Listing Added Successfully.</span>';
				
				$scNameRow = mysql_fetch_object(mysql_query('
					SELECT GROUP_CONCAT(c2.catName) AS subCatNames FROM category AS c2 WHERE 1 = 1
					AND FIND_IN_SET(c2.catID, "'.implode(',', $subCatIDs).'") 
				'));
				
				$tr = '<tr class="listingRow" id="listingRow_'.$insertedID.'">';
				$tr .= '<td>&nbsp;</td>';
				$tr .= '<td id="td_sC_'.$insertedID.'" width="300">'.stripslashes($scNameRow->subCatNames).'</td>';
				$tr .= '<td id="td_bN_'.$insertedID.'">'.$businessName.'</td>';
				$tr .= '<td width="150">';
				$tr .= '<div class="pull-left" style="width:70%">';
				$tr .= '<input type="text" class="form-control datePicker onblurUpdate" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-date-format="dd-mm-yyyy" value="'.date('d-m-Y', strtotime($expiryOn)).'" data-a="updateExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" style="text-align:center;" id="expiryInput_'.$insertedID.'" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:25%;" id="expiryDiv_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td width="100">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td width="150">';
				$tr .= '<div class="pull-left" style="width:70%">';
				$tr .= '<select class="form-control updateSelect" id="uStatusSelect_'.$insertedID.'" data-url="'.$formPostUrl.'" data-a="updateStatus" data-wid="'.$insertedID.'" data-resultprefix="sTatus_">';
				$tr .= '<option value="A" selected="selected">Active</option>';
				$tr .= '<option value="D">inactive</option>';
				$tr .= '<option value="P">Pending</option>';
				$tr .= '</select>';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:25%;" id="sTatus_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td width="10">';
				$tr .= '<div class="pull-left" style="width:10%">';
				$tr .= '<input type="checkbox" class="make-featured simple" id="uFeatured_'.$insertedID.'" value="" data-url="'.$formPostUrl.'" data-a="updatefeatured" data-id="'.$insertedID.'" data-resultprefix="sfeatured_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:79%;" id="sfeatured_'.$insertedID.'">';
				
				$tr .= '</div>';
				$tr .= '</td>';
				$tr .= '<td width="150">';
				$tr .= '<div class="pull-left" style="width:80%">';
				$tr .= '<input type="text" class="form-control datePicker onblurUpdate" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-date-format="dd-mm-yyyy" value="" data-a="updateFeatureExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" style="text-align:center;" id="featureExpiryInput_'.$insertedID.'" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:20%;" id="featureExpiryDiv_'.$insertedID.'">&nbsp;</div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-warning editBtn" data-id="'.$insertedID.'" title="Videos" data-a="getListingVideos" data-u="'.$formPostUrl.'" data-w="editListingVideoWindow">';
				$tr .= '<i class="glyphicon glyphicon-expand"></i>';
				$tr .= '</button>';
				$tr .= '<button type="button" class="btn btn-sm btn-success editBtn" data-id="'.$insertedID.'" title="Images" data-a="getListingImages" data-u="'.$formPostUrl.'" data-w="editListingImageWindow">';
				$tr .= '<i class="glyphicon glyphicon-picture"></i>';
				$tr .= '</button>';
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getListing" data-u="'.$formPostUrl.'" data-w="editListingWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>';
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delListing" data-u="'.$formPostUrl.'" data-at="Listing" data-numbering="listingRow" data-column="1">';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '<td><label><input type="checkbox" class="check" name="listings[]" value="'.$insertedID.'" /></label></td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
				$returnData['soptions']['asubCatIDs'] = '';
				
				#Create Folder
				if(!file_exists('../images/userfiles/business/'.$insertedID)){
					$returnData['debug'] = 'Folder not Found!';
					
					if(!mkdir('../images/userfiles/business/'.$insertedID)){
						$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
					}
				}
				#End
				
				$returnData['icheck'] = 'yes';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
		}
	}else if($action == 'getListing'){
		$listingID = (int) $_POST['id'];
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		if(mysql_num_rows($listingRes) > 0){
			$returnData['status'] = 0;
			
			#Create Folder
			if(!file_exists('../images/userfiles/business/'.$listingID)){
				$returnData['debug'] = 'Folder not Found!';
				
				if(!mkdir('../images/userfiles/business/'.$listingID)){
					$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
				}
			}
			#End
			
			$listingRow = mysql_fetch_object($listingRes);
			
			$returnData['field']['listingID']	= $listingID;
			$returnData['select2']['euserID']	= stripslashes($listingRow->userID);
			
			#Manipulate and Return the Sub Cats
			$catArr = array();
			$catRes = mysql_query('SELECT * FROM category WHERE parentID = 0 ORDER BY sOrder ASC');
			if(mysql_num_rows($catRes) > 0){
				while($catRow = mysql_fetch_object($catRes)){
					$catArr[$catRow->catID] = stripslashes($catRow->catName);
				}
			}
			
			$subCatIDs = explode(',', $listingRow->subCatIDs);
			$subCatIdsArr = array();
			foreach($subCatIDs as $key => $val){
				$subCatIdsArr[$val] = $val;
			}
			
			$ecatLists	= '';
			$esubCatIDs	= '';
			$clcount = 1;
			foreach($catArr as $clcatID => $clcatName){
				$ecatLists .= '<option value="" data-sort="'.$clcount.'">'.$clcatName.'</option>';
				$clscRes = mysql_query('SELECT * FROM category WHERE parentID = '.$clcatID.' ORDER BY sOrder ASC');
				if(mysql_num_rows($clscRes) > 0){
					while($clscRow = mysql_fetch_object($clscRes)){
						$clcount++;
						
						$clsCatID	= $clscRow->catID;
						$clsCatName	= stripslashes($clscRow->catName);
						if(isset($subCatIdsArr[$clscRow->catID])){
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
			
			$returnData['field']['ebusinessName']	= stripslashes($listingRow->businessName);
			$returnData['field']['elogo']			= stripslashes($listingRow->logo);
			$returnData['field']['eimgPath']		= stripslashes($listingRow->imgPath);
			$returnData['tinymce']['eaddress']		= stripslashes($listingRow->address);
			$returnData['field']['elocation']		= stripslashes($listingRow->location);
			$returnData['field']['etelephone']		= stripslashes($listingRow->telephone);
			$returnData['field']['emobile']			= stripslashes($listingRow->mobile);
			$returnData['field']['ebusinessEmail']	= stripslashes($listingRow->businessEmail);
			
			if($listingRow->website != ''){
				$returnData['field']['ewebsite']	= stripslashes($listingRow->website);
			}else {
				$returnData['field']['ewebsite']	= 'http://';
			}
			/* Facebook url added by kavitha on 12-6-2015*/
			if($listingRow->facebookPage != ''){
				$returnData['field']['efacebook']	= stripslashes($listingRow->facebookPage);
			}else {
				$returnData['field']['efacebook']	= 'http://';
			}
			
			$returnData['tinymce']['edescription']	= stripslashes($listingRow->description);
			$returnData['tinymce']['eoffer']		= stripslashes($listingRow->offer);
			$returnData['tinymce']['eevents']		= stripslashes($listingRow->events);
			$returnData['field']['etags']			= stripslashes($listingRow->tags);
			$returnData['field']['eseoUrl']			= stripslashes($listingRow->seoUrl);
			$returnData['field']['eseoTitle']		= stripslashes($listingRow->seoTitle);
			$returnData['field']['eseoKeywords']	= stripslashes($listingRow->seoKeywords);
			$returnData['field']['eseoDesc']		= stripslashes($listingRow->seoDesc);
			
			$returnData['field']['eLmap_lat']		= $listingRow->lat;
			$returnData['field']['eLmap_lng']		= $listingRow->lng;
			
			$returnData['map']	= 'eAddress';
			$returnData['lat']	= $listingRow->lat;
			$returnData['lng']	= $listingRow->lng;
			
			if($listingRow->expiryOn != ''){
				$returnData['field']['eexpiryOn']	= date('d-m-Y', strtotime($listingRow->expiryOn));
			}else {
				$returnData['field']['eexpiryOn']	= '';
			}

			if ($listingRow->featured == 1) {
				$returnData['check']['efeatured'] = 1;
			}

			$returnData['field']['estatus'] = stripslashes($listingRow->status);
			
			$returnData['reloadSelect2'] = 'true';
			
			$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/business/'.$listingID.'/';
			$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/business/'.$listingID.'/';
			$_SESSION['imgManageruploadMaxSize'] = '500K';
			//$returnData['session'] = $_SESSION;
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveListing'){
		$listingID = (int) $_POST['listingID'];
		
		$returnData['post'] = $_POST;
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		
		if(mysql_num_rows($listingRes) > 0){
			$listingRow = mysql_fetch_object($listingRes);
		
			$userID			= (int) $_POST['euserID'];
			if($userID > 0){
				$email		= getRecord('users', 'email', array('userID' => $userID));
			}else {
				$email		= 'Admin';
			}
			
			$subCatIDs		= $_POST['esubCatIDs'];
			$businessName	= trim($_POST['ebusinessName']);
			$logo			= trim($_POST['elogo']);
			$image			= trim($_POST['eimgPath']);
			$address		= trim($_POST['eaddress']);
			$location		= trim($_POST['elocation']);
			$telephone		= trim($_POST['etelephone']);
			$mobile			= trim($_POST['emobile']);
			$businessEmail	= trim($_POST['ebusinessEmail']);
			$website		= trim($_POST['ewebsite']);
			$facebook		= trim($_POST['efacebook']);
			$description	= trim($_POST['edescription']);
			$offer			= trim($_POST['eoffer']);
			$events			= trim($_POST['eevents']);
			$tags			= trim($_POST['etags']);
			$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
			$seoTitle		= trim($_POST['eseoTitle']);
			$seoKeywords	= trim($_POST['eseoKeywords']);
			$seoDesc		= trim($_POST['eseoDesc']);
			
			$lat			= trim($_POST['elat']);
			$lng			= trim($_POST['elng']);
			
			$expiryOn		= trim($_POST['eexpiryOn']);
			$status			= trim($_POST['estatus']);

			if (isset($_POST['efeatured'])) {
				$featured		= 1;
			} else {
				$featured		= 0;
			}
			
			if($userID < 0){
				$returnData['err']['euserID'] = '<span class="bg-red tip">Please Select a User.</span>';
			}
			
			if(count($subCatIDs) == 0 || count($subCatIDs) > 0 && $subCatIDs[0] == ''){
				$returnData['err']['esubCatIDs'] = '<span class="bg-red tip">Please Select atleast One Sub Category.</span>';
			}
			if($businessName == ''){
				$returnData['err']['ebusinessName'] = '<span class="bg-red tip">Please Enter Business Name.</span>';
			}
			if($description == ''){
				$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter Description of the Business.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Select Listing SEO URL.</span>';
			}
			if($seoUrl != $listingRow->seoUrl && validateRecord('businesslistings', array('seoUrl' => $seoUrl))){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			if($expiryOn == ''){
				$returnData['err']['eexpiryOn'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
			}
			
			if(!isset($returnData['err'])){
				
				$updateSql = '
					UPDATE businesslistings SET 
					userID			= '.$userID.', 
					email			= "'.mysql_real_escape_string($email).'",  
					subCatIDs		= "'.mysql_real_escape_string(implode(',', $subCatIDs)).'", 
					businessName	= "'.mysql_real_escape_string($businessName).'", 
					logo			= "'.mysql_real_escape_string($logo).'", 
					imgPath			= "'.mysql_real_escape_string($image).'", 
					address			= "'.mysql_real_escape_string($address).'", 
					location		= "'.mysql_real_escape_string($location).'", 
				';
				
				if($telephone != ''){$updateSql .= 'telephone = "'.mysql_real_escape_string($telephone).'", ';}else{$updateSql .= 'telephone = NULL, ';}
				if($mobile != ''){$updateSql .= 'mobile = "'.mysql_real_escape_string($mobile).'", ';}else{$updateSql .= 'mobile = NULL, ';}
				
				$updateSql .= 'businessEmail = "'.mysql_real_escape_string($businessEmail).'", ';
				
				if($website != ''){
					if($website != 'http://' && $website != 'https://'){
						$updateSql .= 'website = "'.mysql_real_escape_string($website).'", ';
					}else {
						$updateSql .= 'website = NULL, ';
					}
				}else{
					$updateSql .= 'website = NULL, ';
				}
				/* Facebook url added by kavitha on 12-6-2015 */
				if($facebook != ''){
					if($facebook != 'http://' && $facebook != 'https://'){
						$updateSql .= 'facebookPage = "'.mysql_real_escape_string($facebook).'", ';
					}else {
						$updateSql .= 'facebookPage = NULL, ';
					}
				}else{
					$updateSql .= 'facebookPage = NULL, ';
				}
				
				$updateSql .= 'description = "'.mysql_real_escape_string($description).'", ';
				
				if($offer != ''){$updateSql .= 'offer = "'.mysql_real_escape_string($offer).'", ';}else{$updateSql .= 'offer = NULL, ';}
				if($events != ''){$updateSql .= 'events = "'.mysql_real_escape_string($events).'", ';}else{$updateSql .= 'events = NULL, ';}
				if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else{$updateSql .= 'tags = NULL, ';}
				
				$updateSql .= 'seoUrl = "'.mysql_real_escape_string($seoUrl).'", ';
				
				if($seoTitle != ''){$updateSql .= 'seoTitle = "'.mysql_real_escape_string($seoTitle).'", ';}else{$updateSql .= 'seoTitle = NULL, ';}
				if($seoKeywords != ''){$updateSql .= 'seoKeywords = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeywords = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'", ';}else{$updateSql .= 'seoDesc = NULL, ';}
				if($lat != ''){$updateSql .= 'lat = '.$lat.', ';}else{$updateSql .= 'lat = NULL, ';}
				if($lng != ''){$updateSql .= 'lng = '.$lng.', ';}else{$updateSql .= 'lng = NULL, ';}
				
				$updateSql .= '
					status	 = "'.mysql_real_escape_string($status).'", 
					expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'",
					featured = '.$featured.',
					log		 = CONCAT(log, "<pre>Business Listing Updated From Admin on '.date('d-m-Y H:i:s').'</pre>") 
					WHERE listingID = '.$listingID.' 
				';
				
				$returnData['sql'] = 'Update SQL: '.$updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Listing Updated Successfully.</span>';
					
					$scNameSql = '
						SELECT GROUP_CONCAT(c2.catName) AS subCatNames FROM category AS c2 WHERE 1 = 1
						AND FIND_IN_SET(c2.catID, "'.implode(',', $subCatIDs).'") 
					';
					//$returnData['sql'] = $scNameSql;
					$scNameRow = mysql_fetch_object(mysql_query($scNameSql));
					$returnData['html']['td_sC_'.$listingID] = $scNameRow->subCatNames;
					
					$returnData['html']['td_uE_'.$listingID] = $email;
					$returnData['html']['td_bN_'.$listingID] = $businessName;
					//$returnData['html']['td_eO_'.$listingID] = $expiryOn;
					//$returnData['html']['td_s_'.$listingID]	 = $statusArr[$status];
					
					$returnData['field']['eseoUrl']					= $seoUrl;
					$returnData['field']['expiryInput_'.$listingID]	= $expiryOn;
					$returnData['field']['uStatusSelect_'.$listingID]= $status;
					$returnData['field']['uFeatured_'.$listingID]= $featured;
					$returnData['html']['sfeatured_'.$listingID]= $sfeatured;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Please Fill Required Fields.</span>';
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
				$returnData['msg'] = '<span class="bg-green">Listing Deleted Successfully.</span>';
				
				#Delete Business Listing Directory
				deleteDir('../images/userfiles/business/'.$listingID);
				#End
				
				#Delete Business Listing Images
				mysql_query('DELETE FROM businesslistings_imgs WHERE listingID = '.$listingID);
				mysql_query('DELETE FROM businesslistings_videos WHERE listingID = '.$listingID);
				#End
			}else {
				$returnData['msg'] = '<span class="bg-red">Error on Deleting Listing, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red">Invalid Listing or Listing may Deleted, Please Contact Support.</span>';
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
		$parentID = trim($_POST['wValue']);
		$optionlist = '';
		
		$catSql = 'SELECT * FROM category WHERE parentID IN ('.$parentID.') ORDER BY sOrder ASC';
		$returnData['sql'] = $catSql;
		$catRes = mysql_query($catSql);
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
			//Image sorting Added by Kavitha on 11/06/2015
			$imgRes = mysql_query('SELECT * FROM businesslistings_imgs WHERE listingID = '.$listingID.' ORDER BY sOrder ASC');
			
			$tr = '';
			if(mysql_num_rows($imgRes) > 0){
				$sNo = 1;
				while($imgRow = mysql_fetch_object($imgRes)){
					$imgID	 = $imgRow->imgID;
					$imgPath = stripslashes($imgRow->imgPath);
					$alt	 = stripslashes($imgRow->alt);
					$sOrder	 = $imgRow->sOrder;
					//Add Thumbs for images by Kavitha on 11/06/2015
					if(strpos($imgPath, "http") === false){
						$imgPath = 'http://'.$domain.''.$imgPath;
					}
					
					//Caption removed by Kavitha on 10/06/2015
					$tr .= '<tr class="imageRow" id="imageRow_'.$imgID.'">';
					$tr .= '<td>'.$sNo.'</td>';
					$tr .= '<td id="td_iP_'.$imgID.'" align="center">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title=""><img src="/thumb/100-100-'.$imgPath.'" alt=""></a>';
					$tr .= '</td>';
					
					$tr .= '<td>';
					$tr .= '<input type="text"class="form-control" name="alts['.$imgID.']" value="'.$alt.'" />';
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
				$tr .= '<td colspan="6" align="center"><span class="text-red">No Records Found</span></td>';
				$tr .= '</tr>';
			}
			$returnData['table']['imageTable'] = $tr;
			
			$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/business/'.$listingID;
			$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/business/'.$listingID.'/';
			$_SESSION['imgManageruploadMaxSize'] = '500K';
			
			$returnData['field']['ilistingID'] = $listingID;
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Business Listing may Deleted, Please Contact Support.';
		}
	}else if($action == 'addImageUrl'){
		$imgPath	= trim($_POST['val']);
		$listingID	= (int) $_POST['where'];
		
		if($imgPath != '' && $listingID > 0){
			$insertSql = 'INSERT INTO businesslistings_imgs (listingID, imgPath) VALUES ('.$listingID.', "'.mysql_real_escape_string($imgPath).'")';
			
			if(mysql_query($insertSql)){
				$insertedID = mysql_insert_id();
				
				$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Image Url Added Successfully.</span>';
				
				$returnData['status']	= 0;
				
				$tr = '<tr class="imageRow" id="imageRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_iP_'.$insertedID.'">';
				$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
				$tr .= '</td>';
				
				$tr .= '<td>';
				$tr .= '<input type="text"class="form-control" name="alts['.$insertedID.']" value="" />';
				$tr .= '</td>';
				
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortImage" data-wid="'.$insertedID.'" data-resultprefix="iSort_" />';
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
				$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}else {
			$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Required Details are not Found.</span>'.$listingID;
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
					
					$tr .= '<td>';
					$tr .= '<input type="text"class="form-control" name="alts['.$lastInsertID.']" value="" />';
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
				$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
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
	}else if($action == 'actionForMultipleImages'){
		$listingID	= (int) $_POST['ilistingID'];
		
		if(isset($_POST['deleteAll'])){
			$ids		= $_POST['images'];
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
				$returnData['msg'] = 'Selected Images not Found, or Deleted Already, Please Contact Support.';
			}
		}else if(isset($_POST['saveAll'])){
		
			$alts		= $_POST['alts'];			
			$updatedRecords = 0;
			
			foreach($alts as $imgID => $alts){
				$updateImgSql = '
					UPDATE businesslistings_imgs SET 
					alt		= "'.mysql_real_escape_string($alts).'" 
					WHERE imgID = '.$imgID.' 
				';
				
				if(mysql_query($updateImgSql)){
					$updatedRecords++;
				}
			}
			
			if($updatedRecords > 0){
				$returnData['status'] = 0;
				$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-green tip">Selected Records Updated Successfully.</span>';
			}else {
				$returnData['html']['editListingImageWindow .sMsg'] = '<span class="bg-red tip">Error on Updating Records, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = 'Invalid Action.';
		}
	}else if($action == 'getListingVideos'){
		$listingID = (int) $_POST['id'];
		
		$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID);
		
		if(mysql_num_rows($listingRes) > 0){
			$returnData['status'] = 0;
			
			$videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE listingID = '.$listingID);
			
			$tr = '';
			if(mysql_num_rows($videoRes) > 0){
				$sNo = 1;
				while($videoRow = mysql_fetch_object($videoRes)){
					$videoID	= $videoRow->videoID;
					$videoUrl	= stripslashes($videoRow->videoUrl);
					$sOrder		= $videoRow->sOrder;
					
					$tr .= '<tr class="videoRow" id="videoRow_'.$videoID.'">';
					$tr .= '<td>'.$sNo.'</td>';
					$tr .= '<td id="td_vU_'.$videoID.'">';
					$tr .= '<a href="'.$videoUrl.'"  target="_new">'.$videoUrl.'</a>';
					$tr .= '</td>';
					
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortVideo" data-wid="'.$videoID.'" data-resultprefix="vSort_" />';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:30%;" id="vSort_'.$videoID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<label><input type="checkbox" class="videocheck" name="videos[]" value="'.$videoID.'" /></label>';
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
			$returnData['table']['videoTable'] = $tr;
			$returnData['field']['vlistingID'] = $listingID;
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Business Listing may Deleted, Please Contact Support.';
		}
	}else if($action == 'addVideoUrl'){
		$videoUrl	= trim($_POST['val']);
		$listingID	= (int) $_POST['where'];
		
		if($videoUrl != '' && $listingID > 0){
			$insertSql = 'INSERT INTO businesslistings_videos (listingID, videoUrl) VALUES ('.$listingID.', "'.mysql_real_escape_string($videoUrl).'")';
			
			if(mysql_query($insertSql)){
				$insertedID = mysql_insert_id();
				
				$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-green tip">Video Url Added Successfully.</span>';
				
				$returnData['status']	= 0;
				
				$tr .= '<tr class="videoRow" id="videoRow_'.$insertedID.'">';
				$tr .= '<td>'.$sNo.'</td>';
				$tr .= '<td id="td_vU_'.$insertedID.'">';
				$tr .= '<a href="'.$videoUrl.'" target="_new">'.$videoUrl.'</a>';
				$tr .= '</td>';
				
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="'.$sOrder.'" data-url="'.$formPostUrl.'" data-a="sortVideo" data-wid="'.$insertedID.'" data-resultprefix="vSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="vSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<label><input type="checkbox" class="videocheck" name="videos[]" value="'.$insertedID.'" /></label>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['icheck']				  = 'yes';
				$returnData['appendtr']['videoTable'] = $tr;
				$returnData['field']['avideo']		  = '';
			}else {
				$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}else {
			$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-red tip">Required Details are not Found.</span>'.$listingID;
		}
	}else if($action == 'sortVideo'){
		$videoID= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($videoID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE businesslistings_videos SET 
				sOrder = '.$sOrder.'
				WHERE videoID = '.$videoID.'
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
	}else if($action == 'actionForMultipleVideos'){
		$listingID = (int) $_POST['vlistingID'];
		
		$ids			= $_POST['videos'];
		$idsStr 		= implode(',', $ids);
		$deletedIdsArr	= array();
		
		$videoRes = mysql_query('SELECT * FROM businesslistings_videos WHERE videoID IN ('.$idsStr.')');
		
		if(mysql_num_rows($videoRes) > 0){
			$delSql = 'DELETE FROM businesslistings_videos WHERE videoID IN ('.$idsStr.')';
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				while($videoRow = mysql_fetch_object($videoRes)){
					$returnData['anim']['videoRow_'.$videoRow->videoID] = 'remove';
				}
				$returnData['html']['editListingVideoWindow .sMsg'] = '<span class="bg-green tip">Selected Records Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = 'Error on Deleting Records, Please Contact Support.';
			}
		}else {
			$returnData['msg'] = 'Selected Videos not Found, or Deleted Already, Please Contact Support.';
		}
	}else if($action == 'updateExpiry'){
		$listingID	= (int) $_POST['ids'];
		$expiryOn	= trim($_POST['val']);
		
		$listingRes = mysql_query('SELECT expiryOn FROM businesslistings WHERE listingID = '.$listingID);
		
		if(mysql_num_rows($listingRes) > 0){
			$returnData['status'] = 0;
			
			$listingRow = mysql_fetch_object($listingRes);
			
			if(date('Y-m-d', strtotime($expiryOn)) == date('Y-m-d', strtotime($listingRow->expiryOn))){
				//$returnData['debug'] = date('Y-m-d', strtotime($expiryOn)).' | '.date('Y-m-d', strtotime($listingRow->expiryOn));
				
				$html = '<button class="closeButton btn btn-success btn-xs" title="Same Expiry Date"><i class="fa fa-thumbs-up"></i></button>';
			}else {
				$updateSql = 'UPDATE businesslistings SET expiryOn = "'.date('Y-m-d', strtotime($expiryOn)).'" WHERE listingID = '.$listingID;
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$html = '<button class="closeButton btn btn-success btn-xs" title="Updated Successfully"><i class="fa fa-thumbs-up"></i></button>';
				}else {
					$html = '<button class="closeButton btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
				}
			}
		}else {
			$html = '<button class="closeButton btn btn-danger btn-xs" title="Record Not Found"><i class="fa fa-thumbs-down"></i></button>';
		}
		
		$returnData['html']['expiryDiv_'.$listingID] = $html;
	}else if($action == 'sortThis'){
		$listingID	= (int) $_POST['wid'];
		$sOrder		= (int) $_POST['val'];
		
		if($listingID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE businesslistings SET 
				sOrder = '.$sOrder.'
				WHERE listingID = '.$listingID.'
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
	}else if($action == 'updatefeatured'){
		$listingID = $_POST['id'];
		$check_status = $_POST['check_status'];

		$updateSql = '
			UPDATE businesslistings SET 
			featured = '.$check_status.'
			WHERE listingID = '.$listingID.'
		';

		if(mysql_query($updateSql)){
			$returnData['status'] = 0;
			$returnData['msg'] = 'List item featured status updated!';
		}else {
			$returnData['msg'] = 'Something went wrong!';
		}
	}else if($action == 'updateFeatureExpiry'){
		$listingID		= (int) $_POST['ids'];
		$featuredExpiry	= trim($_POST['val']);

		$updateSql = '
			UPDATE businesslistings SET 
			featuredExpiry = "'.date('Y-m-d', strtotime($featuredExpiry)).'"
			WHERE listingID = '.$listingID.'
		';

		if(mysql_query($updateSql)){
			$returnData['status'] = 0;
			$html = '<button class="closeButton btn btn-success btn-xs" title="Successfully"><i class="fa fa-thumbs-up"></i></button>';
		}else {
			$html = '<button class="closeButton btn btn-danger btn-xs" title="Error on Updating Record"><i class="fa fa-thumbs-down"></i></button>';
		}
		
		$returnData['html']['featureExpiryDiv_'.$listingID] = $html;
	}else if($action == 'updateStatus'){
		$listingID	= (int) $_POST['wid'];
		$status	= trim($_POST['val']);
		
		if($listingID != '' && ($status == 'A' || $status == 'D')){
			$updateSql = '
				UPDATE businesslistings SET 
				status = "'.mysql_real_escape_string($status).'" 
				WHERE listingID = '.$listingID.'
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
	}else if($action == 'multipleActionForListings'){
		$listings = $_POST['listings'];
		
		if(isset($_POST['updateExpiry'])){
			$days = (int) $_POST['days'];
			
			if($days == ''){
				$returnData['msg'] = '<span class="red">Please Enter Number of Days.</span>.';
			}else if(!is_array($listings) || is_array($listings) && count($listings) == 0){
				$returnData['msg'] = '<span class="red">Please Select atleast one Business Listing.</span>.';
			}else {
				$updateSql = '
					UPDATE businesslistings SET 
					`expiryOn` = DATE_ADD(`expiryOn` , INTERVAL '.$days.' DAY) 
					WHERE `listingID` IN ('.implode(',', $listings).')
				';
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					
					$returnData['msg'] = '<span class="green">Records Updated Successfully.</span>.';
					
					if(isset($_POST['sexpiryOn']) && $_POST['sexpiryOn'] != ''){
						$res = mysql_query('
							SELECT listingID, expiryOn FROM businesslistings WHERE `listingID` IN ('.implode(',', $listings).') 
						');
						
						if(mysql_num_rows($res) > 0){
							while($row = mysql_fetch_object($res)){
								if(date('Y-m-d', strtotime($row->expiryOn)) > date('Y-m-d')){
									$returnData['anim']['listingRow_'.$row->listingID] = 'hide';
								}
							}
						}
					}
				}else {
					$returnData['msg'] = '<span class="red">Error on Updating Record, Please Contact Support.</span>.';
				}
			}
		}else if(isset($_POST['deleteAll'])){
			
			$listingRes = mysql_query('
				SELECT * FROM businesslistings WHERE listingID IN ('.implode(',', $listings).') 
			');
			
			$deletedListings = array();
			
			if(mysql_num_rows($listingRes) > 0){
				while($listingRow = mysql_fetch_object($listingRes)){
					$listingID = $listingRow->listingID;
					
					$delSql = 'DELETE FROM businesslistings WHERE listingID = '.$listingID;
					
					if(mysql_query($delSql)){
						$returnData['status'] = 0;
						$returnData['msg'] = '<span class="bg-green tip">Listing Deleted Successfully.</span>';
						
						#Delete Business Listing Directory
						deleteDir('../images/userfiles/business/'.$listingID);
						#End
						
						#Delete Business Listing Images
						mysql_query('DELETE FROM businesslistings_imgs WHERE listingID = '.$listingID);
						mysql_query('DELETE FROM businesslistings_videos WHERE listingID = '.$listingID);
						#End
						
						$deletedListings[] = $listingID;
					}
				}
				
				if(count($deletedListings) > 0){
					foreach($deletedListings as $key => $listingID){
						$returnData['anim']['listingRow_'.$listingID] = 'remove';
					}
					$returnData['msg'] = '<span class="bg-green">Listings Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = '<span class="bg-red">Unable to Delete Selected Records, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Selected Listings are Already Deleted.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="red">Invalid Multiple Action Request, Please Contact Support.</span>.';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>