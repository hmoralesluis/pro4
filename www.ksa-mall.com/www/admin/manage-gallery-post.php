<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-gallery-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addGallery'){
		
		$gCatArr = array();
		$gCatRes = mysql_query('SELECT * FROM gallery_cat');
		if(mysql_num_rows($gCatRes) > 0){
			while($gCatRow = mysql_fetch_object($gCatRes)){
				$gCatArr[$gCatRow->gCatID] = stripslashes($gCatRow->gCatName);
			}
		}
		
		$gCatID			= (int) $_POST['aGCatID'];
		$gName			= trim($_POST['aGName']);
		$gDescription	= trim($_POST['aGDescription']);
		$seoUrl			= makePermaLink(trim($_POST['aSeoUrl']));
		$seoTitle		= trim($_POST['aSeoTitle']);
		$seoKeyword		= trim($_POST['aSeoKeyword']);
		$seoDesc		= trim($_POST['aSeoDesc']);
		
		if($gCatID == ''){
			$returnData['err']['aGCatID'] = '<span class="bg-red tip">Please Select Gallery Category.</span>';
		}
		if($gName == ''){
			$returnData['err']['aGName'] = '<span class="bg-red tip">Please Enter Gallery  Name.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Please Select Gallery Category SEO URL.</span>';
		}
		if(validateRecord('gallery', array('seoUrl' => $seoUrl))){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO gallery SET 
				gCatID			= "'.mysql_real_escape_string($gCatID).'", 
				gName			= "'.mysql_real_escape_string($gName).'",
				gDescription	= "'.mysql_real_escape_string($gDescription).'", 
				seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
				seoTitle		="'.mysql_real_escape_string($seoTitle).'", 
			';
			if($seoKeyword != ''){$insertSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else{$insertSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$insertSql .= 'seoDescription = NULL ';}
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				
				if(!file_exists('../images/userfiles/gallery/'.$insertedID)){
					$returnData['debug'] = 'Folder not Found!';
					if(!mkdir('../images/userfiles/gallery/'.$insertedID)){
						$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
					}
				}
				
				$returnData['msg'] = '<span class="bg-green tip">Gallery Category Added Successfully.</span>';
				
				$tr .= '<tr class="galleryRow" id="galleryRow'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_gC_'.$insertedID.'">'.$gCatArr[$gCatID].'</td>';
				$tr .= '<td id="td_gN_'.$insertedID.'">'.$gName.'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">'.$seoUrl.'></td>';
				$tr .= '<td id="td_mG_'.$insertedID.'"><a href="manage-gallery-images.php?gID='.$insertedID.'">Manage Gallery Image (0)</a></td>';
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getGallery" data-u="'.$formPostUrl.'" data-w="editGalleryWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delGallery" data-u="'.$formPostUrl.'" data-at="Gallery" data-numbering="galleryRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fix.</span>';
		}
	}else if($action == 'getGallery'){
		$gID = (int) $_POST['id'];
		
		$galleryRes = mysql_query('SELECT * FROM gallery WHERE gID = '.$gID.'');
		if(mysql_num_rows($galleryRes) > 0){
			$returnData['status'] = 0;
			
			$gCatArr = array();
			$gCatRes = mysql_query('SELECT * FROM gallery_cat');
			if(mysql_num_rows($gCatRes) > 0){
				while($gCatRow = mysql_fetch_object($gCatRes)){
					$gCatArr[$gCatRow->gCatID] = stripslashes($gCatRow->gCatName);
				}
			}
			
			$galleryRow = mysql_fetch_object($galleryRes);
			
			$returnData['field']['gID']				= $gID;
			
			$returnData['select2']['eUserID'] 		= stripslashes($galleryRow->userID);
			
			$returnData['field']['eGCatID']			= $galleryRow->gCatID;
			$returnData['field']['eGName']			= stripslashes($galleryRow->gName);
			$returnData['tinymce']['eGDescription']	= stripslashes($galleryRow->gDescription);
			$returnData['field']['eSeoUrl'] 		= stripslashes($galleryRow->seoUrl);
			$returnData['field']['eSeoTitle']		= stripslashes($galleryRow->seoTitle);
			$returnData['field']['eSeoKeyword']		= stripslashes($galleryRow->seoKeyword);
			$returnData['field']['eSeoDesc']		= stripslashes($galleryRow->seoDescription);
			$returnData['field']['eIsApproved']		= stripslashes($galleryRow->isApproved);
			
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveGallery'){
		$gID = (int) $_POST['gID'];
		
		$galleryRes = mysql_query('SELECT * FROM  gallery WHERE gID = '.$gID);
		
		if(mysql_num_rows($galleryRes) > 0){
			$gallerytRow = mysql_fetch_object($galleryRes);
			
			$gCatArr = array();
			$gCatRes = mysql_query('SELECT * FROM gallery_cat');
			if(mysql_num_rows($gCatRes) > 0){
				while($gCatRow = mysql_fetch_object($gCatRes)){
					$gCatArr[$gCatRow->gCatID] = stripslashes($gCatRow->gCatName);
				}
			}
			
			$userID			= (int) $_POST['eUserID'];
			if($userID > 0){
				$email		= getRecord('users', 'email', array('userID' => $userID));
			}else {
				$email		= 'Admin';
			}
		
			$gCatID			= (int) $_POST['eGCatID'];
			$gName			= trim($_POST['eGName']);
			$gDescription	= trim($_POST['eGDescription']);
			$seoUrl			= makePermaLink(trim($_POST['eSeoUrl']));
			$seoTitle		= trim($_POST['eSeoTitle']);
			$seoKeyword		= trim($_POST['eSeoKeyword']);
			$seoDesc		= trim($_POST['eSeoDesc']);
			$isApproved		= trim($_POST['eIsApproved']);	
			
			if($gCatID == ''){
				$returnData['err']['aGCatID'] = '<span class="bg-red tip">Please Select Gallery Category.</span>';
			}
			if($gName == ''){
				$returnData['err']['aGName'] = '<span class="bg-red tip">Please Enter Gallery  Name.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Please Select Gallery Category SEO URL.</span>';
			}
			if($seoUrl != $gallerytRow->seoUrl && validateRecord('gallery', array('seoUrl' => $seoUrl))){
				$returnData['err']['eSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE gallery SET 
					userID			= '.$userID.', 
					gCatID			= '.$gCatID.', 
					gName			= "'.mysql_real_escape_string($gName).'",
					gDescription	= "'.mysql_real_escape_string($gDescription).'", 
					seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
					seoTitle		= "'.mysql_real_escape_string($seoTitle).'",
					isApproved		= "'.mysql_real_escape_string($isApproved).'", 
				';
				if($seoKeyword != ''){$updateSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else{$updateSql .= 'seoKeyword = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$updateSql .= 'seoDescription = NULL ';}
				$updateSql .= 'WHERE gID = '.$gID.'' ;
				
				$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Gallery Updated Successfully.</span>';
					
					$returnData['html']['td_gC_'.$gID] = $gCatArr[$gCatID];
					$returnData['html']['td_gN_'.$gID] = $gName;
					$returnData['html']['td_sU_'.$gID] = $seoUrl;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$gID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($gID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE gallery SET 
				sOrder = '.$sOrder.'
				WHERE gID = '.$gID.'
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
	}else if($action == 'delGallery'){
		$gID = (int) $_POST['id'];
		
		$galleryRes = mysql_query('
			SELECT * FROM gallery WHERE gID = '.$gID.' 
		');
		
		if(mysql_num_rows($galleryRes) > 0){
			
				$delSql = 'DELETE FROM gallery WHERE gID = '.$gID.'';
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					#Delete Business Listing Directory
						deleteDir('../images/userfiles/gallery/'.$gID);
					#End
					$returnData['msg'] = '<span class="bg-green tip">Gallery Deleted Successfully.</span>';
					$delSql = mysql_query('DELETE FROM gallery_images WHERE gID = '.$gID);
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
				}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Gallery or Gallery may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>