<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-categories-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addCategory'){
			
		$catName		= trim($_POST['acatName']);
		$catDesc		= trim($_POST['acatDesc']);
		$catSeoUrl		= makePermaLink(trim($_POST['acatSeoUrl']));
		$catSeoTitle	= trim($_POST['acatSeoTitle']);
		$catSeoKeywords	= trim($_POST['acatSeoKeywords']);
		$catSeoDesc		= trim($_POST['acatSeoDesc']);
		$categoryUrl = 'http://'.$catSeoUrl.'.'.$domain;
		
		if($catName == ''){
			$returnData['err']['acatName'] = '<span class="bg-red tip">Please Enter Category Name.</span>';
		}
		if($catDesc == ''){
			$returnData['err']['acatDesc'] = '<span class="bg-red tip">Please Enter Category Description.</span>';
		}
		if($catSeoUrl == ''){
			$returnData['err']['acatSeoUrl'] = '<span class="bg-red tip">Please Select Category SEO URL.</span>';
		}
		if(validateRecord('category', array('parentID' => 0, 'catSeoUrl' => $catSeoUrl))){
			$returnData['err']['acatSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		if($catSeoUrl == ''){
			$returnData['err']['acatSeoTitle'] = '<span class="bg-red tip">Please Enter Category SEO Title.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO category SET 
				catName			= "'.mysql_real_escape_string($catName).'", 
				catDesc			= "'.mysql_real_escape_string($catDesc).'", 
				catSeoUrl		="'.mysql_real_escape_string($catSeoUrl).'", 
				catSeoTitle		= "'.mysql_real_escape_string($catSeoTitle).'", 
			';
			
			if($catSeoKeywords != ''){$insertSql .= 'catSeoKeywords = "'.mysql_real_escape_string($catSeoKeywords).'", ';}else{$insertSql .= 'catSeoKeywords = NULL, ';}
			if($catSeoDesc != ''){$insertSql .= 'catSeoDesc = "'.mysql_real_escape_string($catSeoDesc).'" ';}else{$insertSql .= 'catSeoDesc = NULL ';}
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Category Added Successfully.</span>';
				
				$tr = '<tr class="categoryRow" id="categoryRow_'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_cN_'.$insertedID.'">'.$catName.'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">';
				$tr .= '<a href="'.$categoryUrl.'" title="View Category in Website" target="_blank">'.$categoryUrl.'</a>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<a href="manage-sub-categories.php?parentID='.$insertedID.'" title="Manage Sub Categories">';
				$tr .= 'Sub Category (0)';
				$tr .= '</a>';
				$tr .= '</td>';
				$tr .= '<td width="120">';
                $tr .= '<div class="pull-left" style="width:60%">';
                $tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
                $tr .= '</div>';
                $tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td id="td_s_'.$insertedID.'" align="center">'.$statusArr['A'].'</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getCategory" data-u="'.$formPostUrl.'" data-w="editCategoryWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delCategory" data-u="'.$formPostUrl.'" data-at="Category" data-numbering="categoryRow" data-column="1" >';
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
	}else if($action == 'getCategory'){
		$catID = (int) $_POST['id'];
		
		$catRes = mysql_query('SELECT * FROM category WHERE catID = '.$catID.' AND parentID = 0');
		if(mysql_num_rows($catRes) > 0){
			$returnData['status'] = 0;
			
			$catRow = mysql_fetch_object($catRes);
			
			$returnData['field']['catID']			= $catID;
			$returnData['field']['ecatName']		= stripslashes($catRow->catName);
			$returnData['tinymce']['ecatDesc']		= stripslashes($catRow->catDesc);
			
			$returnData['field']['ecatSeoUrl'] 		= stripslashes($catRow->catSeoUrl);
			$returnData['field']['ecatSeoTitle']	= stripslashes($catRow->catSeoTitle);
			$returnData['field']['ecatSeoKeywords']	= stripslashes($catRow->catSeoKeywords);
			$returnData['field']['ecatSeoDesc']		= stripslashes($catRow->catSeoDesc);
			
			$returnData['field']['estatus']			= stripslashes($catRow->status);
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveCategory'){
		$catID = (int) $_POST['catID'];
		
		$catRes = mysql_query('SELECT * FROM category WHERE catID = '.$catID);
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
		
			$catName		= trim($_POST['ecatName']);
			$catDesc		= trim($_POST['ecatDesc']);
			$catSeoUrl		= makePermaLink(trim($_POST['ecatSeoUrl']));
			$catSeoTitle	= trim($_POST['ecatSeoTitle']);
			$catSeoKeywords	= trim($_POST['ecatSeoKeywords']);
			$catSeoDesc		= trim($_POST['ecatSeoDesc']);
			$status			= trim($_POST['estatus']);
			$categoryUrl = 'http://'.$catSeoUrl.'.'.$domain;
			
			if($catName == ''){
				$returnData['err']['ecatName'] = '<span class="bg-red tip">Please Enter Category Name.</span>';
			}
			if($catDesc == ''){
				$returnData['err']['ecatDesc'] = '<span class="bg-red tip">Please Enter Category Description.</span>';
			}
			if($catSeoUrl == ''){
				$returnData['err']['ecatSeoUrl'] = '<span class="bg-red tip">Please Select Category SEO URL.</span>';
			}
			if($catRow->catSeoUrl != $catSeoUrl && validateRecord('category', array('parentID' => 0, 'catSeoUrl' => $catSeoUrl))){
				$returnData['err']['ecatSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			if($catSeoUrl == ''){
				$returnData['err']['ecatSeoTitle'] = '<span class="bg-red tip">Please Enter Category SEO Title.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE category SET 
					catName			= "'.mysql_real_escape_string($catName).'", 
					catDesc			= "'.mysql_real_escape_string($catDesc).'", 
					catSeoUrl		="'.mysql_real_escape_string($catSeoUrl).'", 
					catSeoTitle		= "'.mysql_real_escape_string($catSeoTitle).'", 
				';
				
				if($catSeoKeywords != ''){$updateSql .= 'catSeoKeywords = "'.mysql_real_escape_string($catSeoKeywords).'", ';}else{$updateSql .= 'catSeoKeywords = NULL, ';}
				if($catSeoDesc != ''){$updateSql .= 'catSeoDesc = "'.mysql_real_escape_string($catSeoDesc).'", ';}else{$updateSql .= 'catSeoDesc = NULL, ';}
				
				$updateSql .= 'status = "'.$status.'" WHERE catID = '.$catID.' AND parentID = 0';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Category Updated Successfully.</span>';
					
					$returnData['html']['td_cN_'.$catID] = $catName;
					$returnData['html']['td_sU_'.$catID] = $catSeoUrl;
					$returnData['html']['td_s_'.$catID]	 = $statusArr[$status];
					
					$returnData['field']['ecatSeoUrl'] = '<a href="'.$categoryUrl.'" title="View Category in Website" target="_blank">'.$categoryUrl.'</a>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$catID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($catID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE category SET 
				sOrder = '.$sOrder.'
				WHERE catID = '.$catID.'
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
	}else if($action == 'delCategory'){
		$catID = (int) $_POST['id'];
		$catRes = mysql_query('
			SELECT c.*, 
			(
				SELECT COUNT(*) FROM category AS sc WHERE sc.parentID = c.catID 
			) AS totalSCs 
			FROM category AS c 
			WHERE c.parentID = 0 AND c.catID = '.$catID.' 
		');
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			if($catRow->totalSCs > 0){
				$returnData['msg'] = 'This Category contain Sub Categories, Please Delete them First.';
			}else {
				$delSql = 'DELETE FROM category WHERE catID = '.$catID;
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Category Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Category, Please Contact Support.</span>';
				}
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