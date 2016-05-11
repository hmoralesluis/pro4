<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-gallery-images-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addGi'){
		$gID 		= (int) $_POST['gID'];
		$imgPath	= trim($_POST['aImgPath']);
		
		if($imgPath == ''){
			$returnData['err']['aImgPath'] = '<span class="bg-red tip">Please Select Image Path.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO  gallery_images SET 
				gID		= '.$gID.',
				imgPath	= "'.mysql_real_escape_string($imgPath).'"
			';
			$returnData['sql'] = $insertSql;
			
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Gallery Image Added Successfully.</span>';
				
				$tr  = '<tr class="giRow" id="giRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_iP_'.$insertedID.'">';
				$tr .= '<a href="'.$imgPath.'" data-lightbox="image-'.$insertedID.'" title="">'.$imgPath.'</a>';
				$tr .= '</td>';
				$tr .= '<td width="120">';
                $tr .= '<div class="pull-left" style="width:60%">';
                $tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
                $tr .= '</div>';
                $tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getGi" data-u="'.$formPostUrl.'" data-w="editGiWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delGi" data-u="'.$formPostUrl.'" data-at="Gallery Image" data-numbering="giRow" data-column="1" >';
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
	}else if($action == 'getGi'){
		$gImgID = (int) $_POST['id'];
		
		$giRes = mysql_query('SELECT * FROM gallery_images WHERE gImgID = '.$gImgID.'');
		if(mysql_num_rows($giRes) > 0){
			$returnData['status'] = 0;
			
			$giRow = mysql_fetch_object($giRes);
			
			$returnData['field']['gImgID']			= $gImgID;
			$returnData['field']['eImgPath']		= stripslashes($giRow->imgPath);
			$returnData['field']['eImgAlt']			= stripslashes($giRow->imgAlt);
			
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveGi'){
		$gImgID = (int) $_POST['gImgID'];
		
		$giRes = mysql_query('SELECT * FROM gallery_images WHERE gImgID = '.$gImgID);
		
		if(mysql_num_rows($giRes) > 0){
			$giRow = mysql_fetch_object($giRes);
		
			$imgPath	= trim($_POST['eImgPath']);
			$imgAlt		= trim($_POST['eImgAlt']);
			
			if($imgPath == ''){
				$returnData['err']['eImgPath'] = '<span class="bg-red tip">Please Select Image Path.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE gallery_images SET 
					imgPath	= "'.mysql_real_escape_string($imgPath).'", 
					imgAlt	= "'.mysql_real_escape_string($imgAlt).'"
					WHERE gImgID = '.$gImgID.'
				';
				
				$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Gallery Image Updated Successfully.</span>';
					
					$returnData['html']['td_iP_'.$gImgID] = '<a href="'.$imgPath.'" data-lightbox="image-'.$insertedID.'" title="">'.$imgPath.'</a>';
					$returnData['html']['td_iA_'.$gImgID] = $imgAlt;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'addImages'){
		$gID 	= (int) $_POST['gID'];
		$files	= $_POST['files'];
		$files 	= explode(',', $files);
		
		if(!is_array($files) || count($files) == 0 || count($files) > 0 && $files[0] == ''){
			$returnData['msg'] = '<span class="bg-red tip">Please Select atleast one Image File.</span>';
		}else {
			$insertSql = 'INSERT INTO gallery_images (gID, imgPath) VALUES ';
			
			$totalFiles = count($files);
			$n = 1;
			foreach($files as $key => $imgPath){
				
				$insertSql .= '('.$gID.',"'.$imgPath.'")';
				if($n != $totalFiles){
					$insertSql .= ',';
				}
				
				$n++;
			}
			$returnData['sql'] = $insertSql;
			if(mysql_query($insertSql)){
				$insertedID = mysql_insert_id();
				
				$returnData['msg'] = '<span class="bg-green tip">Image(s) Added Successfully.</span>';
				
				$returnData['status']	= 0;
				
				foreach($files as $key => $imgPath){
					
					$tr .= '<tr class="giRow" id="giRow_'.$insertedID.'">';
					$tr .= '<td>0</td>';
					$tr .= '<td id="td_iP_'.$insertedID.'">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-'.$insertedID.'" title="">'.$imgPath.'</a>';
					$tr .= '</td>';
					$tr .= '<td width="120">';
					$tr .= '<div class="pull-left" style="width:60%">';
					$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
					$tr .= '</div>';
					$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getGi" data-u="'.$formPostUrl.'" data-w="editGiWindow">';
					$tr .= '<i class="glyphicon glyphicon-edit"></i>';
					$tr .= '</button>'."\n";
					$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delGi" data-u="'.$formPostUrl.'" data-at="Gallery Image" data-numbering="giRow" data-column="1" >';
					$tr .= '<i class="glyphicon glyphicon-trash"></i>';
					$tr .= '</button>';
					$tr .= '</td>';
					$tr .= '</tr>';
                    
					$lastInsertID++;
					$returnData['tbody'] = $tr;
				}
				
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}
	}else if($action == 'sortThis'){
		$gImgID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($gImgID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE gallery_images SET 
				sOrder = '.$sOrder.'
				WHERE gImgID = '.$gImgID.'
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
	}else if($action == 'delGi'){
		$gImgID = (int) $_POST['id'];
		
		$giRes = mysql_query('
			SELECT * FROM gallery_images WHERE gImgID = '.$gImgID.' 
		');
		
		if(mysql_num_rows($giRes) > 0){
			
				$delSql = 'DELETE FROM gallery_images WHERE gImgID = '.$gImgID.'';
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Gallery Image Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
				}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Gallery Image or Gallery Image may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>