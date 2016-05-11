<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-blog-posts-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addBp'){
		$addedOn		= date('Y-m-d H:i:s');
		$bpTitle		= trim($_POST['aBpTitle']);
		$bpImg			= trim($_POST['aBpImg']);
		$bpShortDesc	= trim($_POST['aBpShortDesc']);
		$bpDescription	= trim($_POST['aBpDescription']);
		$bpTag			= trim($_POST['aBpTag']);
		$seoUrl			= makePermaLink(trim($_POST['aSeoUrl']));
		$seoTitle		= trim($_POST['aSeoTitle']);
		$seoKeywords	= trim($_POST['aSeoKeywords']);
		$seoDesc		= trim($_POST['aSeoDesc']);
		
		if($bpTitle == ''){
			$returnData['err']['aBpTitle'] = '<span class="bg-red tip">Please Enter Blog Title.</span>';
		}
		if($bpImg == ''){
			$returnData['err']['aBpImg'] = '<span class="bg-red tip">Please Select Blog Image.</span>';
		}
		if($bpShortDesc == ''){
			$returnData['err']['aBpShortDesc'] = '<span class="bg-red tip">Please Enter  Blog Short Description.</span>';
		}
		if($seoUrl == ''){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Please Enter  Blog SEO URL.</span>';
		}
		if(validateRecord('blog_posts', array('seoUrl' => $seoUrl))){
			$returnData['err']['aSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
			
				INSERT INTO blog_posts SET 
				
				addedOn			= "'.mysql_real_escape_string($addedOn).'",
				bpTitle			= "'.mysql_real_escape_string($bpTitle).'",
				bpImg			= "'.mysql_real_escape_string($bpImg).'",
				bpShortDesc		= "'.mysql_real_escape_string($bpShortDesc).'", 
				bpDescription	= "'.mysql_real_escape_string($bpDescription).'", 
				bpTag			= "'.mysql_real_escape_string($bpTag).'", 
				seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
				seoTitle		= "'.mysql_real_escape_string($seoTitle).'", 
			';
			if($seoKeywords != ''){$insertSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$insertSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$insertSql .= 'seoDescription = NULL ';}
			$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				
				$returnData['msg'] = '<span class="bg-green tip">Blog Post Added Successfully.</span>';
				
				$btTag	= explode(',',$bpTag);
				foreach($btTag as $key => $tag){
					$insertSql = mysql_query('
						INSERT INTO blog_tags SET
						tag = "'.mysql_real_escape_string($tag).'"
					');
				}
				
				$tr  = '<tr class="bpRow" id="bpRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_u_'.$insertedID.'">Admin</td>';
				$tr .= '<td id="td_bT_'.$insertedID.'">'.$bpTitle.'</td>';
				$tr .= '<td id="td_aO_'.$insertedID.'">'.$addedOn.'</td>';
				$tr .= '<td id="td_iA_'.$insertedID.'">'.$yesNoArr['Y'].'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">'.$seoUrl.'</td>';
				$tr .= '<td>';
				$tr .= '<button type="button" class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getBp" data-u="'.$formPostUrl.'" data-w="editBpWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delBp" data-u="'.$formPostUrl.'" data-at="Blog Post" data-numbering="bpRow" data-column="1" >';
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
	}else if($action == 'getBp'){
		$bpID = (int) $_POST['id'];
		
		$bpRes = mysql_query('SELECT * FROM blog_posts WHERE bpID = '.$bpID.'');
		
		if(mysql_num_rows($bpRes) > 0){
			$returnData['status'] = 0;
			
			$bpRow = mysql_fetch_object($bpRes);
			
			$returnData['field']['bpID']				= $bpID;
			
			$returnData['select2']['eUserID'] 			= stripslashes($bpRow->userID);
			
			$returnData['field']['eBpTitle']			= stripslashes($bpRow->bpTitle);
			$returnData['field']['eBpImg']				= stripslashes($bpRow->bpImg);
			$returnData['field']['eBpShortDesc']		= stripslashes($bpRow->bpShortDesc);
			$returnData['tinymce']['eBpDescription']	= stripslashes($bpRow->bpDescription);
			$returnData['field']['eBpTag']				= stripslashes($bpRow->bpTag);
			$returnData['field']['eSeoUrl'] 			= stripslashes($bpRow->seoUrl);
			$returnData['field']['eSeoTitle']			= stripslashes($bpRow->seoTitle);
			$returnData['field']['eSeoKeywords']		= stripslashes($bpRow->seoKeyword);
			$returnData['field']['eSeoDesc']			= stripslashes($bpRow->seoDescription);
			$returnData['field']['eIsApproved']			= stripslashes($bpRow->isApproved);
			
			$returnData['reloadSelect2'] = 'true';
			
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveBp'){
		$bpID = (int) $_POST['bpID'];
		
		$bpRes = mysql_query('SELECT * FROM  blog_posts WHERE bpID = '.$bpID);
		
		if(mysql_num_rows($bpRes) > 0){
			$bpRow = mysql_fetch_object($bpRes);
			$userArr = array();
			$userRes = mysql_query('SELECT * FROM users ORDER BY email ASC');
			if(mysql_num_rows($userRes) > 0){
				while($userRow = mysql_fetch_object($userRes)){
					$userArr[$userRow->userID] = stripslashes($userRow->email.' ('.$userRow->fullname.')');
				}
			}
			
			$userID			= (int) $_POST['eUserID'];
			if($userID > 0){
				$email		= getRecord('users', 'email', array('userID' => $userID));
			}else {
				$email		= 'Admin';
			}
		
			$bpTitle		= trim($_POST['eBpTitle']);
			$bpImg			= trim($_POST['eBpImg']);
			$bpShortDesc	= trim($_POST['eBpShortDesc']);
			$bpDescription	= trim($_POST['eBpDescription']);
			$bpTag			= trim($_POST['eBpTag']);
			$seoUrl			= makePermaLink(trim($_POST['eSeoUrl']));
			$seoTitle		= trim($_POST['eSeoTitle']);
			$seoKeywords	= trim($_POST['eSeoKeywords']);
			$seoDesc		= trim($_POST['eSeoDesc']);
			$isApproved		= trim($_POST['eIsApproved']);
			
			
			if($bpTitle == ''){
				$returnData['err']['eBpTitle'] = '<span class="bg-red tip">Please Enter Blog Title.</span>';
			}
			if($bpImg == ''){
				$returnData['err']['eBpImg'] = '<span class="bg-red tip">Please Select Blog Image.</span>';
			}
			if($bpShortDesc == ''){
				$returnData['err']['eBpShortDesc'] = '<span class="bg-red tip">Please Enter  Blog Short Description.</span>';
			}
			if($seoUrl == ''){
				$returnData['err']['eSeoUrl'] = '<span class="bg-red tip">Please Enter  Blog SEO URL.</span>';
			}
			if($seoUrl != $bpRow->seoUrl && validateRecord('blog_posts', array('seoUrl' => $seoUrl))){
				$returnData['err']['eSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE blog_posts SET 
					userID			= '.$userID.', 
					bpTitle			= "'.mysql_real_escape_string($bpTitle).'",
					bpImg			= "'.mysql_real_escape_string($bpImg).'", 
					bpShortDesc		= "'.mysql_real_escape_string($bpShortDesc).'",
					bpDescription	= "'.mysql_real_escape_string($bpDescription).'",
					bpTag			= "'.mysql_real_escape_string($bpTag).'", 
					seoUrl			= "'.mysql_real_escape_string($seoUrl).'", 
					seoTitle		= "'.mysql_real_escape_string($seoTitle).'", 
					isApproved		= "'.mysql_real_escape_string($isApproved).'", 
				';
				if($seoKeywords != ''){$updateSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeywords).'", ';}else{$updateSql .= 'seoKeyword = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDescription = "'.mysql_real_escape_string($seoDesc).'" ';}else{$updateSql .= 'seoDescription = NULL ';}
				$updateSql .= 'WHERE bpID = '.$bpID.'' ;
				
				$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Blog Post Updated Successfully.</span>';
					$btTag	= explode(',',$bpTag);
					foreach($btTag as $key => $tag){
						$insertSql = mysql_query('
							INSERT INTO blog_tags SET
							tag = "'.mysql_real_escape_string($tag).'"
						');
					}
					if($userID > 0){
						$returnData['html']['td_u_'.$bpID] 	= $userArr[$userID];
					}else {
						$returnData['html']['td_u_'.$bpID] 	= 'Admin';
					}
					
					$returnData['html']['td_bT_'.$bpID] = $bpTitle;
					$returnData['html']['td_iP_'.$bpID]	= $yesNoArr[$isApproved];
					$returnData['html']['td_sU_'.$bpID] = $seoUrl;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'delBp'){
		$bpID = (int) $_POST['id'];
		
		$bpRes = mysql_query('
			SELECT * FROM blog_posts WHERE bpID = '.$bpID.' 
		');
		
		if(mysql_num_rows($bpRes) > 0){
			
			$delSql = 'DELETE FROM blog_posts WHERE bpID = '.$bpID.'';
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Blog Post Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
			}
			
		}else { 
			$returnData['msg'] = '<span class="bg-red tip">Invalid Blog Post or Blog Post may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>