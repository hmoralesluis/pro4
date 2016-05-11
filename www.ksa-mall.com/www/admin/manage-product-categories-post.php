<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-product-categories-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if($action == 'addPc'){
		$catName		= trim($_POST['apCatName']);
		$catDesc		= trim($_POST['acatDesc']);
		$imgPath		= trim($_POST['aimgPath']);
		$catSeoUrl		= makePermaLink(trim($_POST['acatSeoUrl']));
		$catSeoTitle	= trim($_POST['acatSeoTitle']);
		$catSeoKeywords	= trim($_POST['acatSeoKeywords']);
		$catSeoDesc		= trim($_POST['acatSeoDesc']);
		$categoryUrl = 'http://'.$catSeoUrl.'.'.$domain;
		
		if($catName == ''){
			$returnData['err']['apCatName'] = '<span class="bg-red tip">Please Enter Category Name.</span>';
		}
		if($catDesc == ''){
			$returnData['err']['acatDesc'] = '<span class="bg-red tip">Please Enter Category Description.</span>';
		}
		if($catSeoUrl == ''){
			$returnData['err']['acatSeoUrl'] = '<span class="bg-red tip">Please Select Category SEO URL.</span>';
		}
		if(validateRecord('product_cat', array('parentID' => 0, 'catSeoUrl' => $catSeoUrl))){
			$returnData['err']['acatSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
		}
		if($catSeoUrl == ''){
			$returnData['err']['acatSeoTitle'] = '<span class="bg-red tip">Please Enter Category SEO Title.</span>';
		}
		
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO product_cat SET 
				pCatName		= "'.mysql_real_escape_string($catName).'", 
				catDesc			= "'.mysql_real_escape_string($catDesc).'", 
				imgPath			= "'.mysql_real_escape_string($imgPath).'", 
				catSeoUrl		="'.mysql_real_escape_string($catSeoUrl).'", 
				catSeoTitle		= "'.mysql_real_escape_string($catSeoTitle).'", 
			';
			
			if($catSeoKeywords != ''){$insertSql .= 'catSeoKeywords = "'.mysql_real_escape_string($catSeoKeywords).'", ';}else{$insertSql .= 'catSeoKeywords = NULL, ';}
			if($catSeoDesc != ''){$insertSql .= 'catSeoDesc = "'.mysql_real_escape_string($catSeoDesc).'" ';}else{$insertSql .= 'catSeoDesc = NULL ';}
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
				
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green tip">Product Category Added Successfully.</span>';
				
				$tr = '<tr class="pcRow" id="pcRow'.$insertedID.'">';
				$tr .= '<td>0</td>';
				$tr .= '<td id="td_cN_'.$insertedID.'">'.$catName.'</td>';
				$tr .= '<td id="td_sU_'.$insertedID.'">';
				$tr .= '<a href="'.$categoryUrl.'" title="View Category in Website" target="_blank">'.$categoryUrl.'</a>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<a href="manage-product-sub-categories.php?parentID='.$insertedID.'" title="Manage Sub Categories">';
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
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getPc" data-u="'.$formPostUrl.'" data-w="editPcWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delPc" data-u="'.$formPostUrl.'" data-at="Product Category" data-numbering="pcRow" data-column="1" >';
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
	}else if($action == 'getPc'){
		$pCatID = (int) $_POST['id'];
		
		$pcRes = mysql_query('SELECT * FROM product_cat WHERE pCatID = '.$pCatID.' AND parentID = 0');
		if(mysql_num_rows($pcRes) > 0){
			$returnData['status'] = 0;
			
			$pcRow = mysql_fetch_object($pcRes);
			
			$returnData['field']['pCatID']			= $pCatID;
			$returnData['field']['epCatName']		= stripslashes($pcRow->pCatName);
			$returnData['tinymce']['ecatDesc']		= stripslashes($pcRow->catDesc);
			$returnData['field']['etags']			= stripslashes($pcRow->tags);
			$returnData['field']['eimgPath']		= stripslashes($pcRow->imgPath);
			$returnData['field']['ecatSeoUrl'] 		= stripslashes($pcRow->catSeoUrl);
			$returnData['field']['ecatSeoTitle']	= stripslashes($pcRow->catSeoTitle);
			$returnData['field']['ecatSeoKeywords']	= stripslashes($pcRow->catSeoKeywords);
			$returnData['field']['ecatSeoDesc']		= stripslashes($pcRow->catSeoDesc);
			
			$returnData['field']['estatus']			= stripslashes($pcRow->status);
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'savePc'){
		$pCatID = (int) $_POST['pCatID'];
		
		$pcRes = mysql_query('SELECT * FROM product_cat WHERE pCatID = '.$pCatID);
		
		if(mysql_num_rows($pcRes) > 0){
			$pcRow = mysql_fetch_object($pcRes);
		
			$catName		= trim($_POST['epCatName']);
			$catDesc		= trim($_POST['ecatDesc']);
			$tags			= trim($_POST['etags']);
			$imgPath		= trim($_POST['eimgPath']);
			$catSeoUrl		= makePermaLink(trim($_POST['ecatSeoUrl']));
			$catSeoTitle	= trim($_POST['ecatSeoTitle']);
			$catSeoKeywords	= trim($_POST['ecatSeoKeywords']);
			$catSeoDesc		= trim($_POST['ecatSeoDesc']);
			$status			= trim($_POST['estatus']);
			$categoryUrl = 'http://'.$catSeoUrl.'.'.$domain;
			
			if($catName == ''){
				$returnData['err']['epCatName'] = '<span class="bg-red tip">Please Enter Product Category Name.</span>';
			}
			if($catDesc == ''){
				$returnData['err']['ecatDesc'] = '<span class="bg-red tip">Please Enter Category Description.</span>';
			}
			if($catSeoUrl == ''){
				$returnData['err']['ecatSeoUrl'] = '<span class="bg-red tip">Please Select Category SEO URL.</span>';
			}
			if($pcRow->catSeoUrl != $catSeoUrl && validateRecord('product_cat', array('parentID' => 0, 'catSeoUrl' => $catSeoUrl))){
				$returnData['err']['ecatSeoUrl'] = '<span class="bg-red tip">Entered SEO URL Already Assigned.</span>';
			}
			if($catSeoUrl == ''){
				$returnData['err']['ecatSeoTitle'] = '<span class="bg-red tip">Please Enter Category SEO Title.</span>';
			}
			
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE product_cat SET 
					pCatName			= "'.mysql_real_escape_string($catName).'", 
					catDesc			= "'.mysql_real_escape_string($catDesc).'", 
					imgPath			= "'.mysql_real_escape_string($imgPath).'", 
					catSeoUrl		="'.mysql_real_escape_string($catSeoUrl).'", 
					catSeoTitle		= "'.mysql_real_escape_string($catSeoTitle).'", 
				';
				
				if($catSeoKeywords != ''){$updateSql .= 'catSeoKeywords = "'.mysql_real_escape_string($catSeoKeywords).'", ';}else{$updateSql .= 'catSeoKeywords = NULL, ';}
				if($catSeoDesc != ''){$updateSql .= 'catSeoDesc = "'.mysql_real_escape_string($catSeoDesc).'", ';}else{$updateSql .= 'catSeoDesc = NULL, ';}
				
				$updateSql .= 'status = "'.$status.'" WHERE pCatID = '.$pCatID.' AND parentID = 0';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Product Category Updated Successfully.</span>';
					
					$returnData['html']['td_cN_'.$pCatID] = $catName;
					$returnData['html']['td_sU_'.$pCatID] = $catSeoUrl;
					$returnData['html']['td_s_'.$pCatID]  = $statusArr[$status];
					
					$returnData['field']['ecatSeoUrl'] = '<a href="'.$categoryUrl.'" title="View Category in Website" target="_blank">'.$categoryUrl.'</a>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Updating Record, Please Contact Support.</span>';
				}
			}
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$pCatID	= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($pCatID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE product_cat SET 
				sOrder = '.$sOrder.'
				WHERE pCatID = '.$pCatID.'
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
	}else if($action == 'delPc'){
		$pCatID = (int) $_POST['id'];
		$catRes = mysql_query('
			SELECT c.*, 
			(
				SELECT COUNT(*) FROM product_cat AS sc WHERE sc.parentID = c.pCatID 
			) AS totalSCs 
			FROM product_cat AS c 
			WHERE c.parentID = 0 AND c.pCatID = '.$pCatID.' 
		');
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			if($catRow->totalSCs > 0){
				$returnData['msg'] = 'This Product Category contain Sub Product Categories, Please Delete them First.';
			}else {
				$delSql = 'DELETE FROM product_cat WHERE pCatID = '.$pCatID;
				
				if(mysql_query($delSql)){
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green tip">Product Category Deleted Successfully.</span>';
				}else {
					$returnData['msg'] = '<span class="bg-red tip">Error on Deleting Product Category, Please Contact Support.</span>';
				}
			}
			
		}else {
			$returnData['msg'] = '<span class="bg-red tip">Invalid Product Category or Product Category may Deleted, Please Contact Support.</span>';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>