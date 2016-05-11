<?
	function validateRecord($table, $conditions){
		$sql = 'SELECT * FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= $field.' = "'.$value.'" AND ';
				}else{
					$sql .= $field.' = "'.$value.'" ';
				}
			}
		}
		//echo $sql;
		if(mysql_num_rows(mysql_query($sql)) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function getRecord($table, $field_name, $conditions){
		$sql = 'SELECT `'.$field_name.'` FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= '`'.$field.'` = "'.$value.'" AND ';
				}else{
					$sql .= '`'.$field.'` = "'.$value.'" ';
				}
			}
		}
		//echo $sql;
		$res = mysql_query($sql);
		
		if($res && mysql_num_rows($res) > 0){
			
			$row = mysql_fetch_array($res);
			
			return $row[$field_name];
		}else{
			return ('');
		}
	}
?>