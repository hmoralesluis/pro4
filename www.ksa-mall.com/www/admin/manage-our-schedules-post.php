<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	$formPostUrl = 'manage-our-schedules-post.php';
	
	$returnData = array();
	$returnData['status'] = 1;
	
	$action = $_POST['a'];
	if($action == '' && isset($_REQUEST['a'])){
		$action = $_REQUEST['a'];
	}
	
	if($action == 'getAllEvents'){
		$eventSql = 'SELECT * FROM evenement ORDER BY id';
		$eventRes = mysql_query($eventSql);
		if(mysql_num_rows($eventRes) > 0){
			while($eventRow = mysql_fetch_object($eventRes)){
				if($eventRow->allDay == 'true'){
					$allDay = true;
				}else {
					$allDay = false;
				}
				$returnData[] = array(
					'id'				=> (int) $eventRow->id,
					'title'				=> stripslashes($eventRow->title),
					'start'				=> $eventRow->start,
					'end'				=> $eventRow->end,
					'allDay'			=> $allDay,
					'url'				=> $eventRow->url,
					'backgroundColor'	=> $eventRow->backgroundColor,
					'borderColor'		=> $eventRow->borderColor,
				);
			}
		}
		unset($returnData['status']);
	}else if($action == 'addEvent'){
		$title			= $_POST['title'];
		$start			= $_POST['start'];
		$end			= $_POST['end'];
		$allDay			= $_POST['allDay'];
		$url			= $_POST['url'];
		$backgroundColor= $_POST['backgroundColor'];
		$borderColor	= $_POST['borderColor'];
		
		// insert the records
		$sql = '
			INSERT INTO evenement SET 
			title			= "'.mysql_real_escape_string($title).'", 
			start			= "'.date('Y-m-d H:i:s', strtotime($start)).'", 
			end				= "'.date('Y-m-d H:i:s', strtotime($end)).'", 
			allDay			= "'.mysql_real_escape_string($allDay).'", 
			url				= "'.mysql_real_escape_string($url).'", 
			backgroundColor	= "'.mysql_real_escape_string($backgroundColor).'", 
			borderColor		= "'.mysql_real_escape_string($borderColor).'" 
		';
		
		if(mysql_query($sql)){
			$insertedID = mysql_insert_id();
			
			$returnData['id'] = $insertedID;
			$returnData['status'] = 0;
		}else {
			$returnData['msg'] = 'Error on Adding Event, Please Contact Support.';
		}
	}else if($action == 'saveEvent'){
		$id		= $_POST['id'];
		$start	= $_POST['start'];
		$end	= $_POST['end'];
		
		if(date('H', strtotime($start)) > 0){
			$allDay = 'false';
		}else {
			$allDay = 'true';
		}
		
		$sql = '
			UPDATE evenement SET 
			start	= "'.date('Y-m-d H:i:s', strtotime($start)).'", 
			end		= "'.date('Y-m-d H:i:s', strtotime($end)).'", 
			allDay	= "'.mysql_real_escape_string($allDay).'"
			WHERE id = '.$id.' 
		';
		
		if(mysql_query($sql)){
			$returnData['status'] = 0;
		}else {
			$returnData['msg'] = 'Error on Updating Event, Please Contact Support.';
		}
	}else if($action == 'deleteEvent'){
		$id = (int) $_POST['id'];
		
		$eventRes = mysql_query('SELECT id FROM evenement WHERE id = '.$id);
		
		if(mysql_num_rows($eventRes) > 0){
			$delSql = 'DELETE FROM evenement WHERE id = '.$id;
			if(mysql_query($delSql)){
				$returnData['status'] = 0;
				$returnData['msg'] = 'Event Deleted Successfully.';
			}else {
				$returnData['msg'] = 'Error on Deleting Event, Please Contact Support.';
			}
		}else {
			$returnData['msg'] = 'Requested Event not Found, Please Contact Support.';
		}
		
	}else {
		$returnData['msg'] = 'No Request Found.';
	}
	
	header('Content-Type: application/json');
	print_r(json_encode($returnData));
?>