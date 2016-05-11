<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-sub-categories-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addGc'){
		$gCatName		= trim($_POST['aGCatName']);
		$gCatImg		= trim($_POST['aGCatImg']);
		$seoUrl			= makePermaLink(trim($_POST['aSeoUrl']));
		$seoTitle		= trim($_POST['aSeoTitle']);
		$seoKeyword		= trim($_POST['aSeoKeyword']);
		$seoDesc		= trim($_POST['aSeoDesc']);
		
		if($gCatName == ''){
			$returnData['err']['aGCatName'] = '<span class="bg-red tip">Please Enter Gallery Category Name.</span>';
		}
		if($gCatImg == ''){
			$returnData['err']['aGCatImg'] = '<span class="bg-red tip">Please Gallery Category Image.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Please Select Gallery Category SEO URL.</span>';
		}
		$validateSeoUrl = mysql_query('SELECT * FROM gallery_cat WHERE seoUrl = "'.mysql_real_escape_string($seoUrl).'"');
		if(mysql_num_rows($validateSeoUrl) > 0){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO gallery_cat SET 
				gCatName		= "'.mysql_real_escape_string($gCatName).'", 
				gCatImg			= "'.mysql_real_escape_string($gCatImg).'", 
				seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
				seoTitle		="'.mysql_real_escape_string($seoTitle).'", 
			';
			if($seoKeyword != ''){$insertSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else{$insertSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$insertSql .= 'seoDescription = NULL ';}
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Gallery Category Added Successfully.</span>';
				
				$tr = '<tr class="gcRow" id="gcRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_cN_'.$insertedID.'">'.$gCatName.'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">'.$seoUrl.'</td>';
				$tr .= '</td>';
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text" class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getGc" data-u="'.$formPostUrl.'" data-w="editGcWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delGc" data-u="'.$formPostUrl.'" data-at="Gallery Category" data-numbering="gcRow" data-column="1" >';
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
	}else if($action == 'getGc'){
		$gCatID = (int) $_POST['id'];
		
		$gCatRes = mysql_query('SELECT * FROM gallery_cat WHERE gCatID = '.$gCatID.'');
		if(mysql_num_rows($gCatRes) > 0){
			$returnData['status'] = 0;
			
			$gCatRow = mysql_fetch_object($gCatRes);
			
			$returnData['field']['gCatID']		= $gCatID;
			$returnData['field']['eGCatName']	= stripslashes($gCatRow->gCatName);
			$returnData['field']['eGCatImg']	= stripslashes($gCatRow->gCatImg);
			$returnData['field']['eSeoUrl'] 	= stripslashes($gCatRow->seoUrl);
			$returnData['field']['eSeoTitle']	= stripslashes($gCatRow->seoTitle);
			$returnData['field']['eSeoKeyword']	= stripslashes($gCatRow->seoKeyword);
			$returnData['field']['eSeoDesc']	= stripslashes($gCatRow->seoDescription);
			
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveGc'){
		$gCatID = (int) $_POST['gCatID'];
		
		$gCatRes = mysql_query('SELECT * FROM  gallery_cat WHERE gCatID = '.$gCatID);
		
		if(mysql_num_rows($gCatRes) > 0){
			$gCatRow = mysql_fetch_object($gCatRes);
		
			$gCatName		= trim($_POST['eGCatName']);
			$gCatImg		= trim($_POST['eGCatImg']);
			$seoUrl			= makePermaLink(trim($_POST['eSeoUrl']));
			$seoTitle		= trim($_POST['eSeoTitle']);
			$seoKeyword		= trim($_POST['eSeoKeyword']);
			$seoDesc		= trim($_POST['eSeoDesc']);
			
			if($gCatName == ''){
				$returnData['err']['eGCatName'] = '<span class="bg-red tip">Please Enter Gallery Category Name.</span>';
			}
			if($gCatImg == ''){
				$returnData['err']['eGCatImg'] = '<span class="bg-red tip">Please Gallery Category Image.</span>';
			}
			if($seoUrl == ''){
			$returnData['err']['eSeoUrl'] = '<span class="bg-red tip">Please Select Gallery Category SEO URL.</span>';
			}
			$validateSeoUrl = mysql_query('SELECT * FROM category WHERE seoUrl = "'.mysql_real_escape_string($seoUrl).'"');
			if($gCatRow->seoUrl != $seoUrl && mysql_num_rows($validateSeoUrl) > 0){
				$returnData['err']['eSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE gallery_cat SET 
					gCatName		= "'.mysql_real_escape_string($gCatName).'", 
					gCatImg			= "'.mysql_real_escape_string($gCatImg).'", 
					seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
					seoTitle		="'.mysql_real_escape_string($seoTitle).'", 
				';
				if($seoKeyword != ''){$updateSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else{$updateSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$updateSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$updateSql .= 'seoDescription = NULL ';}
				$updateSql .= 'WHERE gCatID = '.$gCatID.'' ;
				
				$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Gallery Category Updated Successfully.</span>';
					
					$returnData['html']['td_cN_'.$gCatID] = $gCatName;
					$returnData['html']['td_sU_'.$gCatID] = $seoUrl;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$gCatID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($gCatID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE gallery_cat SET 
				sOrder = '.$sOrder.'
				WHERE gCatID = '.$gCatID.'
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
	}else if($action == 'delGc'){
		$gCatID = (int) $_POST['id'];
		
		$gCatRes = mysql_query('
			SELECT * FROM gallery_cat WHERE gCatID = '.$gCatID.' 
		');
		
		if(mysql_num_rows($gCatRes) > 0){
			
				$delSql = 'DELETE FROM gallery_cat WHERE gCatID = '.$gCatID.'';
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Gallery Category Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
				}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Category or Category may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>