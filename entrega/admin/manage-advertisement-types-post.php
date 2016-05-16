<?php 	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');



	
	$formPostUrl = 'manage-advertisement-types-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	$advTypeArr = array(
		'RSI'	=> 'Right Side Image',
		'RST'	=> 'Right Side Text',
		'FI'	=> 'Footer Image',
		'FT'	=> 'Footer Text',
		'PII'	=> 'Page Inner Image',
		'PIT'	=> 'Page Inner Text',
		'HS'	=> 'Home Slider',
		'BL'	=> 'Business Listings' 
	);
	
	$expiryTypeArr = array(
		'D' => 'One Day',
		'W' => 'Weekly',
		'M' => 'Monthly',
		'Q' => 'Quarterly',
		'Y' => 'Yearly'
	);
	
	if($action == 'loadImgPropertiesForAdd'){
		$type = trim($_POST['type']);
		
		$returnData['status'] = 0;
		if($type == 'RSI' || $type == 'FI' || $type == 'PII' || $type == 'HS'){
			$aImgWidthDiv = '<label for="aimgWidth">Required Image Width *</label>'."\n";
			$aImgWidthDiv .= '<input type="text" class="form-control" name="aimgWidth" id="aimgWidth" value="" required="required" style="width:150px" />'."\n";
			
			$aImgHeightDiv .= '<label for="aimgHeight">Required Image Height *</label>'."\n";
			$aImgHeightDiv .= '<input type="text" class="form-control" name="aimgHeight" id="aimgHeight" value="" required="required" style="width:150px" />'."\n";
			
			$returnData['html']['aImgWidthDiv']	= $aImgWidthDiv;
			$returnData['html']['aImgHeightDiv']= $aImgHeightDiv;
		}else {
			$returnData['html']['aImgWidthDiv']	= '';
			$returnData['html']['aImgHeightDiv']= '';
		}
	}else if($action == 'loadImgPropertiesForEdit'){
		$type = trim($_POST['type']);
		
		$returnData['status'] = 0;
		if($type == 'RSI' || $type == 'FI' || $type == 'PII' || $type == 'HS'){
			$aImgWidthDiv = '<label for="eimgWidth">Required Image Width *</label>'."\n";
			$aImgWidthDiv .= '<input type="text" class="form-control" name="eimgWidth" id="eimgWidth" value="" required="required" style="width:150px" />'."\n";
			
			$aImgHeightDiv .= '<label for="eimgHeight">Required Image Height *</label>'."\n";
			$aImgHeightDiv .= '<input type="text" class="form-control" name="eimgHeight" id="eimgHeight" value="" required="required" style="width:150px" />'."\n";
			
			$returnData['html']['eImgWidthDiv']	= $aImgWidthDiv;
			$returnData['html']['eImgHeightDiv']= $aImgHeightDiv;
		}else{
			$returnData['html']['eImgWidthDiv']	= '';
			$returnData['html']['eImgHeightDiv']= '';
		}
	}else if($action == 'addAdvertisementType'){
		
		$atName	= trim($_POST['aatName']);
		$atType	= trim($_POST['aatType']);
		if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
			$imgWidth	= (int) $_POST['aimgWidth'];
			$imgHeight	= (int) $_POST['aimgHeight'];
		}else {
			$imgWidth	= 'NULL';
			$imgHeight	= 'NULL';
		}
		$atDescription		= trim($_POST['aatDescription']);
		$payButtonDaily		= trim($_POST['apayButtonDaily']);
		$payButtonWeekly	= trim($_POST['apayButtonWeekly']);
		$payButtonMonthly	= trim($_POST['apayButtonMonthly']);
		$payButtonQuarterly	= trim($_POST['apayButtonQuarterly']);
		$payButtonYearly	= trim($_POST['apayButtonYearly']);
		
		if($atName == ''){
			$returnData['err']['aatName'] = '<span class="bg-red tip">Please Enter Advertisement Type Name.</span>';
		}
		if($atType == ''){
			$returnData['err']['aatType'] = '<span class="bg-red tip">Please Select Type.</span>';
		}
		
		if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS') && $imgWidth == 'NULL'){
			$returnData['err']['aimgWidth'] = '<span class="bg-red tip">Please Enter Required Image Width.</span>';
		}
		if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS') && $imgHeight == 'NULL'){
			$returnData['err']['aimgHeight'] = '<span class="bg-red tip">Please Enter Required Image Height.</span>';
		}
		
		if($atDescription == ''){
			$returnData['err']['aatDescription'] = '<span class="bg-red tip">Please Enter Descriptions.</span>';
		}
		if($payButtonDaily == ''){
			$returnData['err']['apayButtonDaily'] = '<span class="bg-red tip">Please Enter Payment Details.</span>';
		}
		
		/*
		if($payButtonDaily == '' && $payButtonWeekly == '' && $payButtonMonthly == '' && $payButtonQuarterly == '' && $payButtonYearly == ''){
			$returnData['err']['apayButtonDaily'] = '<span class="bg-red tip">Please Enter Atleast One Pay Button URL.</span>';
		}
		*/
		if(!isset($returnData['err'])){
			$insertSql = '
				INSERT INTO advertisement_types SET 
				atName			= "'.mysql_real_escape_string($atName).'", 
				atType			= "'.mysql_real_escape_string($atType).'", 
				imgWidth		= '.$imgWidth.', 
				imgHeight		= '.$imgHeight.', 
				atDescription	= "'.mysql_real_escape_string($atDescription).'", 
			';
			
			if($payButtonDaily != ''){$insertSql .= 'payButtonDaily = "'.mysql_real_escape_string($payButtonDaily).'" ';}else{$insertSql .= 'payButtonDaily = NULL ';}
			/*
			if($payButtonWeekly != ''){$insertSql .= 'payButtonWeekly = "'.mysql_real_escape_string($payButtonWeekly).'", ';}else{$insertSql .= 'payButtonWeekly = NULL, ';}
			if($payButtonMonthly != ''){$insertSql .= 'payButtonMonthly = "'.mysql_real_escape_string($payButtonMonthly).'", ';}else{$insertSql .= 'payButtonMonthly = NULL, ';}
			if($payButtonQuarterly != ''){$insertSql .= 'payButtonQuarterly = "'.mysql_real_escape_string($payButtonQuarterly).'", ';}else{$insertSql .= 'payButtonQuarterly = NULL, ';}
			if($payButtonYearly != ''){$insertSql .= 'payButtonYearly = "'.mysql_real_escape_string($payButtonYearly).'" ';}else{$insertSql .= 'payButtonYearly = NULL ';}
			*/
			
			//$returnData['sql'] = $insertSql;
			
			if(mysql_query($insertSql)){
			
				$insertedID = mysql_insert_id();
				
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green">Advertisement Type Added Successfully.</span>';
				
				if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS')){
					$imgSize = $imgWidth.' x '.$imgHeight;
				}else {
					$imgSize = '';
				}
				
				$payBtnDetails = '<div class="payBtnUrls">';
				if($payButtonDaily != ''){
					$payBtnDetails .= '<a href="'.$payButtonDaily.'" target="_blank">One Day</a>';
				}
				if($payButtonWeekly != ''){
					$payBtnDetails .= '<a href="'.$payButtonWeekly.'" target="_blank">Weekly</a>';
				}
				if($payButtonMonthly != ''){
					$payBtnDetails .= '<a href="'.$payButtonMonthly.'" target="_blank">Monthly</a>';
				}
				if($payButtonQuarterly != ''){
					$payBtnDetails .= '<a href="'.$payButtonQuarterly.'" target="_blank">Quarterly</a>';
				}
				if($payButtonYearly != ''){
					$payBtnDetails .= '<a href="'.$payButtonYearly.'" target="_blank">Yearly<br /></a>';
				}
				$payBtnDetails .= '</div>';
				
				$tr = '<tr class="advertisementRow" id="advertisementRow_'.$insertedID.'">';
				$tr .= '<td>&nbsp;</td>';
				$tr .= '<th width="200" id="td_atN_'.$insertedID.'">'.$atName.'</th>';
				$tr .= '<th width="200" id="td_at_'.$insertedID.'">'.$advTypeArr[$atType].'</th>';
				$tr .= '<th width="150" id="td_iS_'.$insertedID.'">'.$imgSize.'</th>';
				
				//$tr .= '<th id="td_atB_'.$insertedID.'">'.$payBtnDetails.'</th>';
				
				$tr .= '<td width="120">';
				$tr .= '<div class="pull-left" style="width:60%">';
				$tr .= '<input type="text"class="form-control sortThis" value="0" data-url="'.$formPostUrl.'" data-a="sortThis" data-wid="'.$insertedID.'" data-resultprefix="sSort_" />';
				$tr .= '</div>';
				$tr .= '<div class="pull-right" style="width:30%;" id="sSort_'.$insertedID.'"></div>';
				$tr .= '</td>';
				$tr .= '<td>';
				$tr .= '<button class="btn btn-sm btn-primary editBtn" data-id="'.$insertedID.'" data-a="getAdvertisement" data-u="'.$formPostUrl.'" data-w="editAdvertisementWindow">';
				$tr .= '<i class="glyphicon glyphicon-edit"></i>';
				$tr .= '</button>'."\n";
				$tr .= '<button class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="'.$insertedID.'" data-a="delAdvertisement" data-u="'.$formPostUrl.'" data-at="Advertisement" data-numbering="advertisementRow" data-column="1" >';
				$tr .= '<i class="glyphicon glyphicon-trash"></i>';
				$tr .= '</button>'."\n";
				$tr .= '</td>';
				$tr .= '</tr>';
				
				$returnData['tbody'] = $tr;
			}else {
				$returnData['msg'] = '<span class="bg-red">Error on Inserting Record, Please Contact Support.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red">Error on Form, Please Fix.</span>';
		}
	}else if($action == 'getAdvertisement'){
		$atID = (int) $_POST['id'];
		
		$advTypeRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		if(mysql_num_rows($advTypeRes) > 0){
			
			$returnData['status'] = 0;
			
			$advTypeRow = mysql_fetch_object($advTypeRes);
			
			$returnData['field']['atID']	= $advTypeRow->atID;
			$returnData['field']['eatName']	= stripslashes($advTypeRow->atName);
            $returnData['field']['aatIDe']	= stripslashes($advTypeRow->atName);
			$returnData['field']['eatType']	= stripslashes($advTypeRow->atType);
			
			if($advTypeRow->atType == 'RSI' || $advTypeRow->atType == 'FI' || $advTypeRow->atType == 'PII' || $advTypeRow->atType == 'HS'){
				
				$aImgWidthDiv = '<label for="eimgWidth">Required Image Width *</label>'."\n";
				$aImgWidthDiv .= '<input type="text" class="form-control" name="eimgWidth" id="eimgWidth" value="'.$advTypeRow->imgWidth.'" required="required" style="width:150px" />'."\n";
				
				$aImgHeightDiv .= '<label for="eimgHeight">Required Image Height *</label>'."\n";
				$aImgHeightDiv .= '<input type="text" class="form-control" name="eimgHeight" id="eimgHeight" value="'.$advTypeRow->imgHeight.'" required="required" style="width:150px" />'."\n";
				
				$returnData['html']['eImgWidthDiv']	= $aImgWidthDiv;
				$returnData['html']['eImgHeightDiv']= $aImgHeightDiv;
			}
			
			$returnData['tinymce']['eatDescription'] 	= stripslashes($advTypeRow->atDescription);
			$returnData['tinymce']['epayButtonDaily']	= stripslashes($advTypeRow->payButtonDaily);
			
			/*
			$returnData['field']['epayButtonWeekly']	= stripslashes($advTypeRow->payButtonWeekly);
			$returnData['field']['epayButtonMonthly']	= stripslashes($advTypeRow->payButtonMonthly);
			$returnData['field']['epayButtonQuarterly']	= stripslashes($advTypeRow->payButtonQuarterly);
			$returnData['field']['epayButtonYearly']	= stripslashes($advTypeRow->payButtonYearly);
			*/
		}else {
			$returnData['msg'] = 'Invalid Request, or Record not Found.';
		}
	}else if($action == 'saveAdvertisementType'){
		$atID = (int) $_POST['atID'];
		
		$advTypeRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		
		if(mysql_num_rows($advTypeRes) > 0){
			$advTypeRow = mysql_fetch_object($advTypeRes);
		
			$atName	= trim($_POST['eatName']);
			$atType	= trim($_POST['eatType']);
			if($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS'){
				$imgWidth	= (int) $_POST['eimgWidth'];
				$imgHeight	= (int) $_POST['eimgHeight'];
			}else {
				$imgWidth	= 'NULL';
				$imgHeight	= 'NULL';
			}
			$atDescription		= trim($_POST['eatDescription']);
			$payButtonDaily		= trim($_POST['epayButtonDaily']);
			/*
			$payButtonWeekly	= trim($_POST['epayButtonWeekly']);
			$payButtonMonthly	= trim($_POST['epayButtonMonthly']);
			$payButtonQuarterly	= trim($_POST['epayButtonQuarterly']);
			$payButtonYearly	= trim($_POST['epayButtonYearly']);
			*/
			if($atName == ''){
				$returnData['err']['eatName'] = '<span class="bg-red tip">Please Enter Advertisement Type Name.</span>';
			}
			if($atType == ''){
				$returnData['err']['eatType'] = '<span class="bg-red tip">Please Select Type.</span>';
			}
			
			if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS') && $imgWidth == 'NULL'){
				$returnData['err']['eimgWidth'] = '<span class="bg-red tip">Please Enter Required Image Width.</span>';
			}
			if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS') && $imgHeight == 'NULL'){
				$returnData['err']['eimgHeight'] = '<span class="bg-red tip">Please Enter Required Image Height.</span>';
			}
			
			if($atDescription == ''){
				$returnData['err']['eatDescription'] = '<span class="bg-red tip">Please Enter Descriptions.</span>';
			}
			if($payButtonDaily == ''){
				$returnData['err']['epayButtonDaily'] = '<span class="bg-red tip">Please Enter Payment Details.</span>';
			}
			
			/*
			if($payButtonDaily == '' && $payButtonWeekly == '' && $payButtonMonthly == '' && $payButtonQuarterly == '' && $payButtonYearly == ''){
				$returnData['err']['epayButtonDaily'] = '<span class="bg-red tip">Please Enter Atleast One Pay Button URL.</span>';
			}
			*/
			if(!isset($returnData['err'])){
				$updateSql = '
					UPDATE advertisement_types SET 
					atName			= "'.mysql_real_escape_string($atName).'", 
					atType			= "'.mysql_real_escape_string($atType).'", 
					imgWidth		= '.$imgWidth.', 
					imgHeight		= '.$imgHeight.', 
					atDescription	= "'.mysql_real_escape_string($atDescription).'", 
				';
				
				if($payButtonDaily != ''){$updateSql .= 'payButtonDaily = "'.mysql_real_escape_string($payButtonDaily).'" ';}else{$updateSql .= 'payButtonDaily = NULL ';}
				/*
				if($payButtonWeekly != ''){$updateSql .= 'payButtonWeekly = "'.mysql_real_escape_string($payButtonWeekly).'", ';}else{$updateSql .= 'payButtonWeekly = NULL, ';}
				if($payButtonMonthly != ''){$updateSql .= 'payButtonMonthly = "'.mysql_real_escape_string($payButtonMonthly).'", ';}else{$updateSql .= 'payButtonMonthly = NULL, ';}
				if($payButtonQuarterly != ''){$updateSql .= 'payButtonQuarterly = "'.mysql_real_escape_string($payButtonQuarterly).'", ';}else{$updateSql .= 'payButtonQuarterly = NULL, ';}
				if($payButtonYearly != ''){$updateSql .= 'payButtonYearly = "'.mysql_real_escape_string($payButtonYearly).'" ';}else{$updateSql .= 'payButtonYearly = NULL ';}
				*/
				$updateSql .= 'WHERE atID = '.$atID.' ';
				
				//$returnData['sql'] = $updateSql;
				
				if(mysql_query($updateSql)){
					
					$returnData['status'] = 0;
					$returnData['msg'] = '<span class="bg-green">Advertisement Type Updated Successfully.</span>';
					
					$returnData['html']['td_atN_'.$atID]= $atName;
					$returnData['html']['td_at_'.$atID] = $advTypeArr[$atType];
					
					if(($atType == 'RSI' || $atType == 'FI' || $atType == 'PII' || $atType == 'HS')){
						$returnData['html']['td_iS_'.$atID]	= $imgWidth.' x '.$imgHeight;
					}
					/*
					$payBtnDetails = '<div class="payBtnUrls">';
					if($payButtonDaily != ''){
						$payBtnDetails .= '<a href="'.$payButtonDaily.'" target="_blank">One Day</a>';
					}
					if($payButtonWeekly != ''){
						$payBtnDetails .= '<a href="'.$payButtonWeekly.'" target="_blank">Weekly</a>';
					}
					if($payButtonMonthly != ''){
						$payBtnDetails .= '<a href="'.$payButtonMonthly.'" target="_blank">Monthly</a>';
					}
					if($payButtonQuarterly != ''){
						$payBtnDetails .= '<a href="'.$payButtonQuarterly.'" target="_blank">Quarterly</a>';
					}
					if($payButtonYearly != ''){
						$payBtnDetails .= '<a href="'.$payButtonYearly.'" target="_blank">Yearly<br /></a>';
					}
					$payBtnDetails .= '</div>';
					
					$returnData['html']['td_atB_'.$atID]= $payBtnDetails;
					*/
				}else {
					$returnData['msg'] = '<span class="bg-red">Error on Updating Record, Please Contact Support.</span>';
				}
			}else {
				$returnData['msg'] = '<span class="bg-red">Please Fill Required Details.</span>';
			}
		}else {
			$returnData['msg'] = '<span class="bg-red">Record not Found, Please Contact Support.</span>';
		}
	}else if($action == 'sortThis'){
		$atID= (int) $_POST['wid'];
		$sOrder	= (int) $_POST['val'];
		
		if($atID != '' && $sOrder != ''){
			$updateSql = '
				UPDATE advertisement_types SET 
				sOrder = '.$sOrder.'
				WHERE atID = '.$atID.'
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
	}else if($action == 'delAdvertisement'){
		$atID = (int) $_POST['id'];
		
		$advertisement_typesRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
		
		if(mysql_num_rows($advertisement_typesRes) > 0){
			
			$delSql = 'UPDATE advertisement_types SET isDeleted = "Y" WHERE atID = '.$atID;
			
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = '<span class="bg-green">Advertisement Type Deleted Successfully.</span>';
			}else {
				$returnData['msg'] = '<span class="bg-red">Error on Deleting Record, Please Contact Support.</span>';
			}
			
		}else {
			$returnData['msg'] = 'Requested Record not Found, or Record may Deleted. Please Contact Support';
		}
	}else {
		$returnData['msg'] = '<span class="bg-red">No Request Found.</span>';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>