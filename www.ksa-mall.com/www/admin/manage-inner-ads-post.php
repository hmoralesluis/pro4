<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-inner-ads-post-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addBanner'){
			
		$bSize	    = trim($_POST['aBSize']);
		$bTitle		= trim($_POST['aBTitle']);
		$imgPath	= trim($_POST['aimgPath']);
		$imgAlt		= trim($_POST['aImgAlt']);
		$link		= trim($_POST['aLink']);
		$ad	        = trim($_POST['aAd']);
		$expiry		= trim($_POST['aExpiry']);
		
		if($bSize == ''){
			$returnData['err']['aBSize'] = '<span class="bg-red tip">Please Select Banner Size.</span>';
		}
		if($bTitle == ''){
			$returnData['err']['aBTitle'] = '<span class="bg-red tip">Please Enter Banner Title.</span>';
		}
		
		if($link == ''){
			$returnData['err']['aLink'] = '<span class="bg-red tip">Please Enter Link .</span>';
		}
		if($expiry == ''){
			$returnData['err']['aExpiry'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO ad_banners SET 
				bSize	    = "'.mysql_real_escape_string($bSize).'", 
				bTitle		= "'.mysql_real_escape_string($bTitle).'", 
				imgPath		="'.mysql_real_escape_string($imgPath).'", 
				ad	        = "'.mysql_real_escape_string($ad).'", 
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
				$tr .= '<td id="td_bP_'.$insertedID.'">'.($bSize == '1' ? '1000px' : '490px').'</td>';
				$tr .= '<td id="td_bI_'.$insertedID.'"><img src="'.$imgPath.'" alt="" width="100"></td>';
				$tr .= '<td id="td_bT_'.$insertedID.'">'.$bTitle.'</td>';
				$tr .= '<td id="td_e_'.$insertedID.'">';
                $tr .= '<input type="text" class="form-control tAlignC onblurUpdate" placeholder="dd-mm-yyyy" data-inputmask="\'alias\': \'dd-mm-yyyy\'" data-mask="" data-a="saveExpiry" data-ids="'.$insertedID.'" data-url="'.$formPostUrl.'" value="'.date('d-m-Y', strtotime($expiry)).'" />';
				$tr .= '</td>';
				$tr .= '<td>';
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
		
		$bannerRes = mysql_query('SELECT * FROM ad_banners WHERE bannerID = '.$bannerID.' ');
		
		if(mysql_num_rows($bannerRes) > 0){
			$returnData['status'] = 0;
			
			$bannerRow = mysql_fetch_object($bannerRes);
			
			$returnData['field']['bannerID']		= $bannerID;
			$returnData['field']['eBSize']		    = stripslashes($bannerRow->bSize);
			$returnData['field']['eBTitle'] 		= stripslashes($bannerRow->bTitle);
			$returnData['field']['eImgPath'] 		= stripslashes($bannerRow->imgPath);
			$returnData['img']['eImgPathPreview']	= stripslashes($bannerRow->imgPath);
			$returnData['field']['eImgAlt']			= stripslashes($bannerRow->imgAlt);
			$returnData['field']['eLink']			= stripslashes($bannerRow->link);
			$returnData['field']['eAd']		        = stripslashes($bannerRow->ad);
			
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
		
		$bannerRes = mysql_query('SELECT * FROM ad_banners WHERE bannerID = '.$bannerID);
		
		if(mysql_num_rows($bannerRes) > 0){
			
			$bannerRow = mysql_fetch_object($bannerRes);
		
			$bSize	    = trim($_POST['eBSize']);
			$bTitle		= trim($_POST['eBTitle']);
			$imgPath	= trim($_POST['eImgPath']);
			$imgAlt		= trim($_POST['eImgAlt']);
			$link		= trim($_POST['eLink']);
			$ad	        = trim($_POST['eAd']);
			$expiry		= trim($_POST['eExpiry']);
			$status		= trim($_POST['eStatus']);
			
			if($bSize == ''){
				$returnData['err']['eBSize'] = '<span class="bg-red tip">Please Select Banner Size.</span>';
			}
			if($bTitle == ''){
				$returnData['err']['eBTitle'] = '<span class="bg-red tip">Please Enter Banner Title.</span>';
			}
			
			if($link == ''){
				$returnData['err']['eLink'] = '<span class="bg-red tip">Please Enter Link.</span>';
			}
			if($expiry == ''){
				$returnData['err']['eExpiry'] = '<span class="bg-red tip">Please Select Expiry Date.</span>';
			}
				
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE ad_banners SET 
					bSize	    = "'.mysql_real_escape_string($bSize).'", 
					bTitle		= "'.mysql_real_escape_string($bTitle).'", 
					imgPath		= "'.mysql_real_escape_string($imgPath).'", 
					ad	        = "'.mysql_real_escape_string($ad).'", 
					expiry		= "'.date('Y-m-d', strtotime($expiry)).'" ,
				';
				if($link != ''){$updateSql .= 'link = "'.mysql_real_escape_string($link).'", ';}else{$updateSql .= 'link = NULL, ';}
				if($imgAlt != ''){$updateSql .= 'imgAlt = "'.mysql_real_escape_string($imgAlt).'", ';}else{$updateSql .= 'imgAlt = NULL,';}
				
				$updateSql .= 'status = "'.$status.'" WHERE bannerID = '.$bannerID.'';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Banner Updated Successfully.</span>';
					
					$returnData['html']['td_bP_'.$bannerID] = ($bSize == '1') ? '1000px' : '490px';
					$returnData['html']['td_bI_'.$bannerID] = '<img src="'.$imgPath.'" alt="" width="100">';
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
		
		$exRes = mysql_query('SELECT * FROM ad_banners WHERE bannerID = '.$bannerID.' ');
		
		if(mysql_num_rows($exRes) > 0){
			
			$sql = 'UPDATE ad_banners SET expiry = "'.date('Y-m-d', strtotime($expiry)).'"  WHERE bannerID = '.$bannerID;
			
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
			SELECT * FROM ad_banners WHERE bannerID = '.$bannerID.' 
		');
		
		if(mysql_num_rows($bannerRes) > 0){
			$delSql = 'DELETE FROM ad_banners WHERE bannerID = '.$bannerID;
			
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