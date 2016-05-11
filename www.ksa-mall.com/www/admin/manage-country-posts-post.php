<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-country-posts-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addLbp'){
		$addedOn		= date('Y-m-d H:i:s');
		$lbpTitle		= trim($_POST['albpTitle']);
		$lbpImg			= trim($_POST['albpImg']);
		$lbpShortDesc	= trim($_POST['albpShortDesc']);
		$lbpDescription	= trim($_POST['albpDescription']);
		$lbpTag			= trim($_POST['albpTag']);
		$seoUrl			= makePermaLink(trim($_POST['aseoUrl']));
		$seoTitle		= trim($_POST['aseoTitle']);
		$seoKeywords	= trim($_POST['aseoKeywords']);
		$seoDesc		= trim($_POST['aseoDescription']);
		
		if($lbpTitle == ''){
			$returnData['err']['albpTitle'] = '<span class="bg-red tip">Please Enter Title.</span>';
		}
		if($lbpImg == ''){
			$returnData['err']['albpImg'] = '<span class="bg-red tip">Please Select Image.</span>';
		}
		if($lbpShortDesc == ''){
			$returnData['err']['albpShortDesc'] = '<span class="bg-red tip">Please Enter Short Description.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Please Enter SEO URL.</span>';
		}
		if(validateRecord('lebanon_posts', array('seoUrl' => $seoUrl))){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
			
				INSERT INTO lebanon_posts SET 
				
				addedOn			= "'.mysql_real_escape_string($addedOn).'",
				lbpTitle		= "'.mysql_real_escape_string($lbpTitle).'",
				lbpImg			= "'.mysql_real_escape_string($lbpImg).'",
				lbpShortDesc	= "'.mysql_real_escape_string($lbpShortDesc).'", 
				lbpDescription	= "'.mysql_real_escape_string($lbpDescription).'", 
				lbpTag			= "'.mysql_real_escape_string($lbpTag).'", 
				seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
				seoTitle		= "'.mysql_real_escape_string($seoTitle).'", 
			';
			if($seoKeywords != ''){$insertSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$insertSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$insertSql .= 'seoDescription = NULL ';}
			$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				
				$returnData['msg'] = '<span class="bg-green tip">Post Added Successfully.</span>';
				
				$btTag	= explode(',',$lbpTag);
				foreach($btTag as $key => $tag){
					$insertSql = mysql_query('
						INSERT INTO lebanon_tags SET
						tag = "'.mysql_real_escape_string($tag).'"
					');
				}
				
				$tr  = '<tr class="lbpRow" id="lbpRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_u_'.$insertedID.'">Admin</td>';
				$tr .= '<td id="td_bT_'.$insertedID.'">'.$lbpTitle.'</td>';
				$tr .= '<td id="td_aO_'.$insertedID.'">'.$addedOn.'</td>';
				$tr .= '<td id="td_iA_'.$insertedID.'">'.$yesNoArr['Y'].'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">'.$seoUrl.'</td>';
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getLbp" data-u="'.$formPostUrl.'" data-w="editBpWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delLbp" data-u="'.$formPostUrl.'" data-at="Country Post" data-numbering="lbpRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>'."\n";
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Error on Form, Please Fix.</span>';
		}
	}else if($action == 'getLbp'){
		$lbpID = (int) $_POST['id'];
		
		$lbpRes = mysql_query('SELECT * FROM lebanon_posts WHERE lbpID = '.$lbpID.'');
		
		if(mysql_num_rows($lbpRes) > 0){
			$returnData['status'] = 0;
			
			$lbpRow = mysql_fetch_object($lbpRes);
			
			$returnData['field']['lbpID']				= $lbpID;
			
			$returnData['select2']['euserID'] 			= stripslashes($lbpRow->userID);
			
			$returnData['field']['eBpTitle']			= stripslashes($lbpRow->lbpTitle);
			$returnData['field']['elbpImg']				= stripslashes($lbpRow->lbpImg);
			$returnData['field']['elbpShortDesc']		= stripslashes($lbpRow->lbpShortDesc);
			$returnData['tinymce']['elbpDescription']	= stripslashes($lbpRow->lbpDescription);
			$returnData['field']['elbpTag']				= stripslashes($lbpRow->lbpTag);
			$returnData['field']['eseoUrl'] 			= stripslashes($lbpRow->seoUrl);
			$returnData['field']['eseoTitle']			= stripslashes($lbpRow->seoTitle);
			$returnData['field']['eseoKeywords']		= stripslashes($lbpRow->seoKeyword);
			$returnData['field']['eseoDescription']		= stripslashes($lbpRow->seoDescription);
			$returnData['field']['eIsApproved']			= stripslashes($lbpRow->isApproved);
			
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveLbp'){
		$lbpID = (int) $_POST['lbpID'];
		
		$lbpRes = mysql_query('SELECT * FROM  lebanon_posts WHERE lbpID = '.$lbpID);
		
		if(mysql_num_rows($lbpRes) > 0){
			$lbpRow = mysql_fetch_object($lbpRes);
			$userArr = array();
			$userRes = mysql_query('SELECT * FROM users ORDER BY email ASC');
			if(mysql_num_rows($userRes) > 0){
				while($userRow = mysql_fetch_object($userRes)){
					$userArr[$userRow->userID] = stripslashes($userRow->email.' ('.$userRow->fullname.')');
				}
			}
			
			$userID			= (int) $_POST['euserID'];
			if($userID > 0){
				$email		= getRecord('users', 'email', array('userID' => $userID));
			}else {
				$email		= 'Admin';
			}
		
			$lbpTitle		= trim($_POST['eBpTitle']);
			$lbpImg			= trim($_POST['elbpImg']);
			$lbpShortDesc	= trim($_POST['elbpShortDesc']);
			$lbpDescription	= trim($_POST['elbpDescription']);
			$lbpTag			= trim($_POST['elbpTag']);
			$seoUrl			= makePermaLink(trim($_POST['eseoUrl']));
			$seoTitle		= trim($_POST['eseoTitle']);
			$seoKeywords	= trim($_POST['eseoKeywords']);
			$seoDesc		= trim($_POST['eseoDescription']);
			$isApproved		= trim($_POST['eIsApproved']);
			
			
			if($lbpTitle == ''){
				$returnData['err']['eBpTitle'] = '<span class="bg-red tip">Please Enter Title.</span>';
			}
			if($lbpImg == ''){
				$returnData['err']['elbpImg'] = '<span class="bg-red tip">Please Select Image.</span>';
			}
			if($lbpShortDesc == ''){
				$returnData['err']['elbpShortDesc'] = '<span class="bg-red tip">Please Enter  Short Description.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Please Enter  SEO URL.</span>';
			}
			if($seoUrl != $lbpRow->seoUrl && validateRecord('lebanon_posts', array('seoUrl' => $seoUrl))){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE lebanon_posts SET 
					userID			= '.$userID.', 
					lbpTitle		= "'.mysql_real_escape_string($lbpTitle).'",
					lbpImg			= "'.mysql_real_escape_string($lbpImg).'", 
					lbpShortDesc	= "'.mysql_real_escape_string($lbpShortDesc).'",
					lbpDescription	= "'.mysql_real_escape_string($lbpDescription).'",
					lbpTag			= "'.mysql_real_escape_string($lbpTag).'", 
					seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
					seoTitle		= "'.mysql_real_escape_string($seoTitle).'", 
					isApproved		= "'.mysql_real_escape_string($isApproved).'", 
				';
				if($seoKeywords != ''){$updateSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeyword = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$updateSql .= 'seoDescription = NULL ';}
				$updateSql .= 'WHERE lbpID = '.$lbpID.'' ;
				
				$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Post Updated Successfully.</span>';
					$btTag	= explode(',',$lbpTag);
					foreach($btTag as $key => $tag){
						$insertSql = mysql_query('
							INSERT INTO lebanon_tags SET
							tag = "'.mysql_real_escape_string($tag).'"
						');
					}
					if($userID > 0){
						$returnData['html']['td_u_'.$lbpID] 	= $userArr[$userID];
					}else {
						$returnData['html']['td_u_'.$lbpID] 	= 'Admin';
					}
					
					$returnData['html']['td_bT_'.$lbpID] = $lbpTitle;
					$returnData['html']['td_iP_'.$lbpID]	= $yesNoArr[$isApproved];
					$returnData['html']['td_sU_'.$lbpID] = $seoUrl;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$lbpID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($lbpID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE lebanon_posts SET 
				sOrder = '.$sOrder.'
				WHERE lbpID = '.$lbpID.'
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
	}else if($action == 'delLbp'){
		$lbpID = (int) $_POST['id'];
		
		$lbpRes = mysql_query('
			SELECT * FROM lebanon_posts WHERE lbpID = '.$lbpID.' 
		');
		
		if(mysql_num_rows($lbpRes) > 0){
			
			$delSql = 'DELETE FROM lebanon_posts WHERE lbpID = '.$lbpID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Post Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
			}
			
		}else { 
			$returnData['msg'] = '<span class="bg-red tip">Invalid Post or Post may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>