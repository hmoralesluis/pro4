<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'user-latest-news-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addNews'){
		
		$title				= trim($_POST['atitle']);
		$shortDescription	= trim($_POST['ashortDescription']);
		$description		= trim($_POST['adescription']);
		
		if($title == ''){
			$returnData['err']['atitle'] = '<span class="bg-red tip">Please Enter News Title.</span>';
		}
		
		if($shortDescription == ''){
			$returnData['err']['ashortDescription'] = '<span class="bg-red tip">Please Enter News Short Description.</span>';
		}
		
		if($description == ''){
			$returnData['err']['adescription'] = '<span class="bg-red tip">Please Enter News Description.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO user_latestnews SET 
				title			= "'.mysql_real_escape_string($title).'", 
				shortDescription= "'.mysql_real_escape_string($shortDescription).'", 
				description		= "'.mysql_real_escape_string($description).'", 
				addedOn			= "'.date('Y-m-d H:i:s').'" 
			';
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">News Added Successfully.</span>';
				
				$tr = '<tr class="userNewsRow" id="newsRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_nT_'.$insertedID.'" width="400">'.$title.'</td>';
				$tr .= '<td id="td_sD_'.$insertedID.'">'.$shortDescription.'</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getNews" data-u="'.$formPostUrl.'" data-w="editNewsWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delNews" data-u="'.$formPostUrl.'" data-at="User News" data-numbering="userNewsRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Please Check the Errors.</span>';
		}
	}else if($action == 'getNews'){
		$newsID = (int) $_POST['id'];
		
		$settingRes = mysql_query('SELECT * FROM user_latestnews WHERE newsID = '.$newsID);
		
		if(mysql_num_rows($settingRes) > 0){
			$returnData['status'] = 0;
			
			$pageRow = mysql_fetch_object($settingRes);
			
			$returnData['field']['newsID']	= $pageRow->newsID;
			
			$returnData['field']['etitle']				= stripslashes($pageRow->title);
			$returnData['field']['eshortDescription']	= stripslashes($pageRow->shortDescription);
			$returnData['tinymce']['edescription']		= stripslashes($pageRow->description);
		}else {
			$returnData['msg'] = 'Requested Record not found, or Record may be Deleted, please contact support';
		}
	}else if($action == 'saveNews'){
		$newsID = (int) $_POST['newsID'];
		
		$newsRes = mysql_query('SELECT * FROM user_latestnews WHERE newsID = '.$newsID);
		
		if(mysql_num_rows($newsRes) > 0){
			
			$title				= trim($_POST['etitle']);
			$shortDescription	= trim($_POST['eshortDescription']);
			$description		= trim($_POST['edescription']);
			
			if($title == ''){
				$returnData['err']['etitle'] = '<span class="bg-red tip">Please Enter News Title.</span>';
			}
			
			if($shortDescription == ''){
				$returnData['err']['eshortDescription'] = '<span class="bg-red tip">Please Enter News Short Description.</span>';
			}
			
			if($description == ''){
				$returnData['err']['edescription'] = '<span class="bg-red tip">Please Enter News Description.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE user_latestnews SET 
					title			= "'.mysql_real_escape_string($title).'", 
					shortDescription= "'.mysql_real_escape_string($shortDescription).'", 
					description		= "'.mysql_real_escape_string($description).'" 
					WHERE newsID = '.$newsID.' 
				';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">News Saved Successfully.</span>';
					
					$returnData['html']['td_nT_'.$newsID] = $title;
					$returnData['html']['td_sD_'.$newsID] = $shortDescription;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Please Check the Errors.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Requested Record not Found, or Record may Deleted. Please Contact Support.</span>';
		}
	}else if($action == 'delNews'){
		$newsID = (int) $_POST['id'];
		
		$newsRes = mysql_query('SELECT * FROM user_latestnews WHERE newsID = '.$newsID);
		
		if(mysql_num_rows($newsRes) > 0){
			
			$delSql = 'DELETE FROM user_latestnews WHERE newsID = '.$newsID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">UserNews Deleted Successfully.</span>';
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