<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/post-validate-user.php');
	
	$formPostUrl = 'my-business-listings-post.php';
	
	$userID	= $_SESSION['user']['userID'];
	$email	= $_SESSION['user']['email'];
	$name	= $_SESSION['user']['name'];
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action	= $_POST['a'];
	
	if(!$isUserLogged){
		$returnData['msg'] = 'Please Login to Access this Page.';
	}else {
		if($action == 'loadAdvertDetails'){
			$atID = (int) $_POST['id'];
			
			$advTypeRes = mysql_query('SELECT * FROM advertisement_types WHERE atID = '.$atID.' AND isDeleted = "N"');
			if(mysql_num_rows($advTypeRes) > 0){
				$returnData['status'] = 0;
				
				$advTypeRow = mysql_fetch_object($advTypeRes);
				
				$returnData['html']['atDescription'] = '<div style="border:solid 2px #F4F4F4; padding:15px; margin-bottom:20px;">';
				$returnData['html']['atDescription'] .= stripslashes($advTypeRow->atDescription);
				$returnData['html']['atDescription'] .= '</div>';
				
				#Fields Manipulating Start
				$uaFields = '';
				if($advTypeRow->atType == 'RSI' || $advTypeRow->atType == 'FI' || $advTypeRow->atType == 'PII' || $advTypeRow->atType == 'HS'){
					$uaFields = '<label for="uaDetails">Select File ('.$advTypeRow->imgWidth.' x '.$advTypeRow->imgHeight.') *</label>';
                    $uaFields .= '<input type="file" class="form-control" name="uaDetails" id="uaDetails" value="" required="required" />';
					
					$uaFields .= '<label for="uaTitle">Image Alt *</label>';
                    $uaFields .= '<textarea class="form-control" name="uaTitle" id="uaTitle" required="required"></textarea>';
					
					$uaFields .= '<label for="uaLink">Link (Optional)</label>';
                    $uaFields .= '<input type="text" class="form-control" name="uaLink" id="uaLink" value="" />';
				}else if($advTypeRow->atType == 'BL'){
					$uaFields = '<label for="uaDetails">Select a Business Listing *</label>';
				
					$uaFields .= '<select class="form-control" name="uaDetails" id="uaDetails" required="required">';
					$uaFields .= '<option value="">Select a Business Listing</option>';
					$blRes = mysql_query('SELECT * FROM businesslistings WHERE userID = '.$userID.' AND status = "A" ');
					if($blRes && mysql_num_rows($blRes) > 0){
						while($blRow = mysql_fetch_object($blRes)){
							if($post['uaDetails'] == $blRow->listingID){$selected = ' selected="selected"';}else{$selected = '';}
							$uaFields .= '<option value="'.$blRow->listingID.'"'.$selected.'>'.stripslashes($blRow->businessName).'</option>';
						}
					}
					$uaFields .= '</select>';
				}else {
					$uaFields = '<label for="uaTitle">Title *</label>';
                    $uaFields .= '<input type="text" class="form-control" name="uaTitle" id="uaTitle" value="" required="required" />';
					
					$uaFields .= '<label for="uaDetails">Short Description *</label>';
                    $uaFields .= '<textarea class="form-control" name="uaDetails" id="uaDetails" required="required"></textarea>';
					
					$uaFields .= '<label for="uaLink">Link (Optional)</label>';
                    $uaFields .= '<input type="text" class="form-control" name="uaLink" id="uaLink" value="" />';
				}
				
				$returnData['html']['uaFields'] = $uaFields;
				#Fields Manipulating End
				
			}else {
				$returnData['msg'] = '<span class="bg-red">Invalid Request, or Record not Found.</span>';
			}
		}else {
			$returnData['msg'] = 'No Request Found.';
		}
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>