<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-pages-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addPage'){
		
		$pageName	= trim($_POST['apageName']);
		$pageDesc	= trim($_POST['apageDesc']);
		$tags		= trim($_POST['atags']);
		$seoUrl		= makePermaLink(trim($_POST['aseoUrl']));
		$seoTitle	= trim($_POST['aseoTitle']);
		$seoKeyword	= trim($_POST['aseoKeyword']);
		$seoDesc	= trim($_POST['aseoDesc']);
		
		if($pageName == ''){
			$returnData['err']['apageName'] = '<span class="bg-red tip">Please Enter Page Name.</span>';
		}
		
		if($pageDesc == ''){
			$returnData['err']['apageDesc'] = '<span class="bg-red tip">Please Enter Page Description.</span>';
		}
		
		if(validateRecord('pages', array('seoUrl' => $seoUrl))){
			$returnData['err']['aseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		
		if($seoTitle == ''){
			$returnData['err']['aseoTitle'] = '<span class="bg-red tip">Please Enter Page SEO Title.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO pages SET 
				pageName	= "'.mysql_real_escape_string($pageName).'", 
				pageDesc	= "'.mysql_real_escape_string($pageDesc).'", 
				seoUrl		= "'.mysql_real_escape_string($seoUrl).'", 
				seoTitle	= "'.mysql_real_escape_string($seoTitle).'", 
			';
			
			if($tags != ''){$insertSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else {$insertSql .= 'tags = NULL, ';}
			
			if($seoKeyword != ''){$insertSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else {$insertSql .= 'seoKeyword = NULL, ';}
			if($seoDesc != ''){$insertSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'" ';}else {$insertSql .= 'seoDesc = NULL ';}
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Page Added Successfully.</span>';
				
				$tr = '<tr class="pageRow" id="pageRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_pN_'.$insertedID.'">'.$pageName.' ['.$insertedID.']</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">'.$seoUrl.'</td>';
				$tr .= '<td id="td_sT_'.$insertedID.'">'.$seoTitle.'</td>';
				$tr .= '<td id="td_sK_'.$insertedID.'">'.$seoKeyword.'</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getPage" data-u="'.$formPostUrl.'" data-w="editPageWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delPage" data-u="'.$formPostUrl.'" data-at="Page" data-numbering="pageRow" data-column="1" >';
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
		
	}else if($action == 'getPage'){
		$pageID = (int) $_POST['id'];
		
		$settingRes = mysql_query('SELECT * FROM pages WHERE pageID = '.$pageID);
		
		if(mysql_num_rows($settingRes) > 0){
			$returnData['status'] = 0;
			
			$pageRow = mysql_fetch_object($settingRes);
			
			$returnData['field']['pageID']	= $pageRow->pageID;
			
			$returnData['field']['epageName']	= stripslashes($pageRow->pageName);
			$returnData['tinymce']['epageDesc']	= stripslashes($pageRow->pageDesc);
			$returnData['field']['etags']		= stripslashes($pageRow->tags);
			$returnData['field']['eseoUrl']		= stripslashes($pageRow->seoUrl);
			$returnData['field']['eseoTitle']	= stripslashes($pageRow->seoTitle);
			$returnData['field']['eseoKeyword']	= stripslashes($pageRow->seoKeyword);
			$returnData['field']['eseoDesc']	= stripslashes($pageRow->seoDesc);
		}else {
			$returnData['msg'] = 'Requested Record not found, or Record may be Deleted, please contact support';
		}
	}else if($action == 'savePage'){
		$pageID = (int) $_POST['pageID'];
		
		$pagesRes = mysql_query('SELECT * FROM pages WHERE pageID = '.$pageID);
		
		if(mysql_num_rows($pagesRes) > 0){
			$pagesRow = mysql_fetch_object($pagesRes);
			
			$pageName	= trim($_POST['epageName']);
			$pageDesc	= trim($_POST['epageDesc']);
			$tags		= trim($_POST['etags']);
			$seoUrl		= makePermaLink(trim($_POST['eseoUrl']));
			$seoTitle	= trim($_POST['eseoTitle']);
			$seoKeyword	= trim($_POST['eseoKeyword']);
			$seoDesc	= trim($_POST['eseoDesc']);
			
			if($pageName == ''){
				$returnData['err']['apageName'] = '<span class="bg-red tip">Please Enter Page Name.</span>';
			}
			
			if($pageDesc == ''){
				$returnData['err']['apageDesc'] = '<span class="bg-red tip">Please Enter Page Description.</span>';
			}
			
			if($seoUrl != $pagesRow->seoUrl && validateRecord('pages', array('seoUrl' => $seoUrl))){
				$returnData['err']['eseoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			
			if($seoTitle == ''){
				$returnData['err']['aseoTitle'] = '<span class="bg-red tip">Please Enter Page SEO Title.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE pages SET 
					pageName	= "'.mysql_real_escape_string($pageName).'", 
					pageDesc	= "'.mysql_real_escape_string($pageDesc).'", 
					seoUrl 		= "'.mysql_real_escape_string($seoUrl).'", 
					seoTitle	= "'.mysql_real_escape_string($seoTitle).'", 
				';
				
				if($tags != ''){$updateSql .= 'tags = "'.mysql_real_escape_string($tags).'", ';}else {$updateSql .= 'tags = NULL, ';}
				
				if($seoKeyword != ''){$updateSql .= 'seoKeyword = "'.mysql_real_escape_string($seoKeyword).'", ';}else {$updateSql .= 'seoKeyword = NULL, ';}
				if($seoDesc != ''){$updateSql .= 'seoDesc = "'.mysql_real_escape_string($seoDesc).'" ';}else {$updateSql .= 'seoDesc = NULL ';}
				
				$updateSql .= 'WHERE pageID = '.$pageID;
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Page Saved Successfully.</span>';
					
					$returnData['html']['td_pN_'.$pageID] = $pageName.' ['.$pageID.']';
					$returnData['html']['td_sU_'.$pageID] = $seoUrl;
					$returnData['html']['td_sT_'.$pageID] = $seoTitle;
					$returnData['html']['td_sK_'.$pageID] = $seoKeyword;
					
					$returnData['field']['eseoUrl'] = $seoUrl;
					
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red tip">Please Check the Errors.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Requested Record not Found, or Record may Deleted. Please Contact Support.</span>';
		}
	}else if($action == 'delPage'){
		$pageID = (int) $_POST['id'];
		
		$pagesRes = mysql_query('SELECT * FROM pages WHERE pageID = '.$pageID);
		
		if(mysql_num_rows($pagesRes) > 0){
			
			$delSql = 'DELETE FROM pages WHERE pageID = '.$pageID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Page Deleted Successfully.</span>';
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