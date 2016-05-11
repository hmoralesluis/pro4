<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-slides-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addSlides'){
		$files = $_POST['files'];
		$files = explode(',', $files);
		
		if(!is_array($files) || count($files) == 0 || count($files) > 0 && $files[0] == ''){
			$returnData['msg'] = '<span class="bg-red tip">Please Select atleast one Image File.</span>';
		}else {
			$insertSql = 'INSERT INTO slides (imgPath) VALUES ';
			
			$totalFiles = count($files);
			$n = 1;
			foreach($files as $key => $imgPath){
				
				$insertSql .= '("'.$imgPath.'")';
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
					
					$tr .= '<tr class="slideRow" id="slideRow_'.$lastInsertID.'">';
					$tr .= '<td>0</td>';
					$tr .= '<td id="td_iP_'.$lastInsertID.'">';
					$tr .= '<a href="'.$imgPath.'" data-lightbox="image-1" title="">'.$imgPath.'</a>';
					$tr .= '</td>';
					$tr .= '<td id="td_sC_'.$lastInsertID.'">&nbsp;</td>';
					$tr .= '<td id="td_sL_'.$lastInsertID.'">&nbsp;</td>';
					$tr .= '<td width="120">';
                    $tr .= '<div class="pull-left" style="width:60%">';
                    $tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$lastInsertID.'" data-resultprefix="sSort_" />';
                    $tr .= '</div>';
                    $tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$lastInsertID.'"></div>';
					$tr .= '</td>';
					$tr .= '<td>';
					$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$lastInsertID.'" data-a="getSlide" data-u="'.$formPostUrl.'" data-w="editSlideWindow">';
					$tr .= '<i class="glyphicon glyphicon-edit"></i>';
					$tr .= '</button>'."\n";
					$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$lastInsertID.'" data-a="delSlide" data-u="'.$formPostUrl.'" data-at="Slide" data-numbering="slideRow" data-column="1" >';
					$tr .= '<i class="glyphicon glyphicon-trash"></i>';
					$tr .= '</button>';
					$tr .= '</td>';
					$tr .= '</tr>';
					
					$lastInsertID++;
				}
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Insert Record.</span>';
			}
		}
		
	}else if($action == 'getSlide'){
		$slideID = (int) $_POST['id'];
		
		$settingRes = mysql_query('SELECT * FROM slides WHERE slideID = '.$slideID);
		
		if(mysql_num_rows($settingRes) > 0){
			$returnData['status'] = 0;
			
			$slideRow = mysql_fetch_object($settingRes);
			
			$returnData['field']['slideID']	= $slideRow->slideID;
			$returnData['field']['eimgPath']= stripslashes($slideRow->imgPath);
			$returnData['field']['eimgAlt']	= stripslashes($slideRow->imgAlt);
			$returnData['field']['elink']	= stripslashes($slideRow->link);
		}else {
			$returnData['msg'] = 'Requested Record not found, or Record may be Deleted, please contact support';
		}
	}else if($action == 'saveSlide'){
		$slideID = (int) $_POST['slideID'];
		
		$imgPath	= trim($_POST['eimgPath']);
		$imgAlt		= trim($_POST['eimgAlt']);
		$link		= trim($_POST['elink']);
		
		if($imgPath == ''){
			$returnData['err']['eimgPath'] = '<span class="bg-red tip">Slide Image cannot be Empty.</span>';
		}
		
		if(!isset($returnData['err'])){
			$updateSql = '
				UPDATE slides SET 
				imgPath	= "'.mysql_real_escape_string($imgPath).'", 
			';
			
			if($imgAlt != ''){$updateSql .= 'imgAlt = "'.mysql_real_escape_string($imgAlt).'", ';}else {$updateSql .= 'imgAlt = NULL, ';}
			if($link != ''){$updateSql .= 'link = "'.mysql_real_escape_string($link).'" ';}else {$updateSql .= 'link = NULL ';}
			
			$updateSql .= 'WHERE slideID = '.$slideID;
			
			//$returnData['sql'] = $updateSql;
			
			if(mysql_query($updateSql)){
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Slide Saved Successfully.</span>';
				
				$returnData['html']['td_iP_'.$slideID]	= '<a href="'.$imgPath.'" data-lightbox="image-'.$slideID.'" title="">'.$imgPath.'</a>';
				$returnData['html']['td_sC_'.$slideID]	= $imgAlt;
				$returnData['html']['td_sL_'.$slideID]	= $link;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
			}
		}
	}else if($action == 'sortThis'){
		$slideID= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($slideID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE slides SET 
				sOrder = '.$sOrder.'
				WHERE slideID = '.$slideID.'
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
	}else if($action == 'delSlide'){
		$slideID = (int) $_POST['id'];
		
		$slidesRes = mysql_query('SELECT * FROM slides WHERE slideID = '.$slideID);
		
		if(mysql_num_rows($slidesRes) > 0){
			
			$delSql = 'DELETE FROM slides WHERE slideID = '.$slideID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Slide Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Record, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Record may Deleted. Please Contact Support';
		}
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>