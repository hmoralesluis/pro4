<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-settings-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addSetting'){
		$sName	= trim($_POST['asName']);
		$sValue	= trim($_POST['asValue']);
		
		if($sName == ''){
			$returnData['err']['asName'] = '<span class="bg-red tip">Please Enter Setting Name.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO settings SET 
				sName	= "'.mysql_real_escape_string($sName).'", 
			';
			
			if($sValue != ''){
				$insertSql .= 'sValue = "'.mysql_real_escape_string($sValue).'" ';
			}else {
				$insertSql .= 'sValue = NULL ';
			}
			
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Setting Added Successfully.</span>';
				
				$tr = '<tr class="settingRow" id="settingRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_sN_'.$insertedID.'">'.$sName.' ['.$insertedID.']</td>';
				$tr .= '<td id="td_sV_'.$insertedID.'">';
				
				if(preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $sValue)){
				   $tr .= '<a href="'.$sValue.'" data-lightbox="image-'.$sID.'" title="View Image">'.$sValue.'</a>';
				}else if(substr($sValue, 0, 4) == 'http'){
					$tr .= '<a href="'.$sValue.'" target="_blank" title="">'.htmlentities($sValue).'</a>';
				}else {
					$tr .= $sValue;
				}
				
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getSetting" data-u="'.$formPostUrl.'" data-w="editSettingWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				
				//$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delSetting" data-u="'.$formPostUrl.'" data-at="Setting" data-numbering="settingRow" data-column="1" >';
				//$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				//$tr .= '</button>';
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Inserting Record, Please Contact Support.</span>';
			}
		}
		
	}else if($action == 'getSetting'){
		$sID = (int) $_POST['id'];
		
		$settingRes = mysql_query('SELECT * FROM settings WHERE sID = '.$sID);
		
		if(mysql_num_rows($settingRes) > 0){
			$returnData['status'] = 0;
			
			$settingRow = mysql_fetch_object($settingRes);
			
			$returnData['field']['sID']	= $settingRow->sID;
			
			$returnData['field']['esName']	= stripslashes($settingRow->sName);
			$returnData['field']['esValue']	= stripslashes($settingRow->sValue);
		}else {
			$returnData['msg'] = 'Requested Record not found, or Record may be Deleted, please contact support';
		}
	}else if($action == 'saveSetting'){
		$sID = (int) $_POST['sID'];
		
		$sName	= trim($_POST['esName']);
		$sValue	= trim($_POST['esValue']);
		
		if($sName == ''){
			$returnData['err']['esName'] = '<span class="bg-red tip">Please Enter Setting Name.</span>';
		}
		
		if(!isset($returnData['err'])){
			$updateSql = '
				UPDATE settings SET 
				sName	= "'.mysql_real_escape_string($sName).'", 
			';
			
			if($sValue != ''){
				$updateSql .= 'sValue = "'.mysql_real_escape_string($sValue).'" ';
			}else {
				$updateSql .= 'sValue = NULL ';
			}
			
			$updateSql .= 'WHERE sID = '.$sID;
			
			$returnData['sql'] = $updateSql;
			
			if(mysql_query($updateSql)){
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Setting Saved Successfully.</span>';
				
				$returnData['html']['td_sN_'.$sID] = $sName.' ['.$sID.']';
				
				if(preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $sValue)){
					$returnData['html']['td_sV_'.$sID] = '<a href="'.$sValue.'" data-lightbox="image-'.$sID.'" title="View Image">'.$sValue.'</a>';
				}else if(substr($sValue, 0, 4) == 'http'){
					$returnData['html']['td_sV_'.$sID] = '<a href="'.$sValue.'" target="_blank" title="">'.$sValue.'</a>';
				}else {
					$returnData['html']['td_sV_'.$sID] = htmlentities($sValue);
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
			}
		}
	}else if($action == 'delSetting'){
		$sID = (int) $_POST['id'];
		
		$returnData['msg'] = 'You cannot Delete Settings.';
		
		/*$settingsRes = mysql_query('SELECT * FROM settings WHERE sID = '.$sID);
		
		if(mysql_num_rows($settingsRes) > 0){
			
			$delSql = 'DELETE FROM settings WHERE sID = '.$sID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Setting Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Record, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Record may Deleted. Please Contact Support';
		}*/
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>