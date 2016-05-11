<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-banners-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addBanner'){
			
		$bPosition	= trim($_POST['aBPosition']);
		$bTitle		= trim($_POST['aBTitle']);
		$imgPath	= trim($_POST['aimgPath']);
		$imgAlt		= trim($_POST['aImgAlt']);
		$link		= trim($_POST['aLink']);
		$linkTarget	= trim($_POST['aLinkTarget']);
		$expiry		= trim($_POST['aExpiry']);
		
		if($bPosition == ''){
			$returnData['err']['aBPosition'] = '<span class="bg-red tip">Please Select Banner Position.</span>';
		}
		if($bTitle == ''){
			$returnData['err']['aBTitle'] = '<span class="bg-red tip">Please Enter Banner Title.</span>';
		}
		if($imgPath == ''){
			$returnData['err']['aimgPath'] = '<span class="bg-red tip">Please Select Image Path .</span>';
		}
		if($link == ''){
			$returnData['err']['aLink'] = '<span class="bg-red tip">Please Enter Link .</span>';
		}
		if($expiry == ''){
			$returnData['err']['aExpiry'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO add_banners SET 
				bPosition	= "'.mysql_real_escape_string($bPosition).'", 
				bTitle		= "'.mysql_real_escape_string($bTitle).'", 
				imgPath		="'.mysql_real_escape_string($imgPath).'", 
				linkTarget	= "'.mysql_real_escape_string($linkTarget).'", 
				expiry		= "'.date('Y-m-d', strtotime($expiry)).'", 
				  
			';
			if($imgAlt != ''){$insertSql .= 'imgAlt = "'.mysql_real_escape_string($imgAlt).'", ';}else{$insertSql .= 'imgAlt = NULL, ';}
			if($link != ''){$insertSql .= 'link = "'.mysql_real_escape_string($link).'" ';}else{$insertSql .= 'link = NULL ';}
			
			$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Banner Added Successfully.</span>';
				
				$tr = '<tr class="bannerRow" id="bannerRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_bP_'.$insertedID.'">'.$bPositionArr[$bPosition].'</td>';
				$tr .= '<td id="td_bT_'.$insertedID.'">'.$bTitle.'</td>';
				$tr .= '<td id="td_e_'.$insertedID.'">';
                $tr .= '<input type="text" class="form-control tAlignC onblurUpdate" placeholder="dd-mm-yyyy" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-a="saveExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" value="'.date('d-m-Y', strtotime('.$expiry.')).'" />';
				$tr .= '</td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getBanner" data-u="'.$formPostUrl.'" data-w="editBannerWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delBanner" data-u="'.$formPostUrl.'" data-at="Banner" data-numbering="bannerRow" data-column="1" >';
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
	}else if($action == 'getBanner'){
		$bannerID = (int) $_POST['id'];
		
		$bannerRes = mysql_query('SELECT * FROM add_banners WHERE bannerID = '.$bannerID.' ');
		
		if(mysql_num_rows($bannerRes) > 0){
			$returnData['status'] = 0;
			
			$bannerRow = mysql_fetch_object($bannerRes);
			
			$returnData['field']['bannerID']		= $bannerID;
			$returnData['field']['eBPosition']		= stripslashes($bannerRow->bPosition);
			$returnData['field']['eBTitle'] 		= stripslashes($bannerRow->bTitle);
			$returnData['field']['eImgPath'] 		= stripslashes($bannerRow->imgPath);
			$returnData['img']['eImgPathPreview']	= stripslashes($bannerRow->imgPath);
			$returnData['field']['eImgAlt']			= stripslashes($bannerRow->imgAlt);
			$returnData['field']['eLink']			= stripslashes($bannerRow->link);
			$returnData['field']['eLinkTarget']		= stripslashes($bannerRow->linkTarget);
			
			if($bannerRow->expiry != ''){
				$returnData['field']['eExpiry']		= date('d-m-Y', strtotime($bannerRow->expiry));
			}else {
				$returnData['field']['eExpiry']	= '';
			}
			$returnData['field']['eStatus']			= stripslashes($bannerRow->status);
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveBanner'){
		$bannerID = (int) $_POST['bannerID'];
		
		$bannerRes = mysql_query('SELECT * FROM add_banners WHERE bannerID = '.$bannerID);
		
		if(mysql_num_rows($bannerRes) > 0){
			
			$bannerRow = mysql_fetch_object($bannerRes);
		
			$bPosition	= trim($_POST['eBPosition']);
			$bTitle		= trim($_POST['eBTitle']);
			$imgPath	= trim($_POST['eImgPath']);
			$imgAlt		= trim($_POST['eImgAlt']);
			$link		= trim($_POST['eLink']);
			$linkTarget	= trim($_POST['eLinkTarget']);
			$expiry		= trim($_POST['eExpiry']);
			$status		= trim($_POST['eStatus']);
			
			if($bPosition == ''){
				$returnData['err']['eBPosition'] = '<span class="bg-red tip">Please Select Banner Position.</span>';
			}
			if($bTitle == ''){
				$returnData['err']['eBTitle'] = '<span class="bg-red tip">Please Enter Banner Title.</span>';
			}
			if($imgPath == ''){
				$returnData['err']['eImgPath'] = '<span class="bg-red tip">Please Select Image Path .</span>';
			}
			if($link == ''){
				$returnData['err']['eLink'] = '<span class="bg-red tip">Please Enter Link.</span>';
			}
			if($expiry == ''){
				$returnData['err']['eExpiry'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
			}
				
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE add_banners SET 
					bPosition	= "'.mysql_real_escape_string($bPosition).'", 
					bTitle		= "'.mysql_real_escape_string($bTitle).'", 
					imgPath		= "'.mysql_real_escape_string($imgPath).'", 
					linkTarget	= "'.mysql_real_escape_string($linkTarget).'", 
					expiry		= "'.date('Y-m-d', strtotime($expiry)).'" ,
				';
				if($link != ''){$updateSql .= 'link = "'.mysql_real_escape_string($link).'", ';}else{$updateSql .= 'link = NULL, ';}
				if($imgAlt != ''){$updateSql .= 'imgAlt = "'.mysql_real_escape_string($imgAlt).'", ';}else{$updateSql .= 'imgAlt = NULL,';}
				
				$updateSql .= 'status = "'.$status.'" WHERE bannerID = '.$bannerID.'';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Banner Updated Successfully.</span>';
					
					$returnData['html']['td_bP_'.$bannerID] = $bPositionArr[$bPosition];
					$returnData['html']['td_bT_'.$bannerID] = $bTitle;
					$returnData['html']['td_e_'.$bannerID] 	= '<input type="text" class="form-control tAlignC onblurUpdate" placeholder="dd-mm-yyyy" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-a="saveExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" value="'.date('d-m-Y', strtotime($expiry)).'" />';
					
					$returnData['html']['td_s_'.$bannerID]	= $statusArr[$status];
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'saveExpiry'){
	
		$bannerID	= (int) $_POST['ids'];
		$expiry		= trim($_POST['val']);
		
		$exRes = mysql_query('SELECT * FROM add_banners WHERE bannerID = '.$bannerID.' ');
		
		if(mysql_num_rows($exRes) > 0){
			
			$sql = 'UPDATE add_banners SET expiry = "'.date('Y-m-d', strtotime($expiry)).'"  WHERE bannerID = '.$bannerID;
			
			if(mysql_query($sql)){
				$returnData['status'] = 0;
				//$returnData['msg'] = '<span class="bg-green">Expiry Updated Successfully.</span>';
			}else{
				$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support..</span>';
		}
		
	}else if($action == 'delBanner'){
		$bannerID = (int) $_POST['id'];
		
		$bannerRes = mysql_query('
			SELECT * FROM add_banners WHERE bannerID = '.$bannerID.' 
		');
		
		if(mysql_num_rows($bannerRes) > 0){
			$delSql = 'DELETE FROM add_banners WHERE bannerID = '.$bannerID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Banner Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Banner, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Banner or Banner may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>