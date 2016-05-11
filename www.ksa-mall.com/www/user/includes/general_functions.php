<?
	function getFullUrl(){
		$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
		$protocol = substr(strtolower($_SERVER["SERVER_PROTOCOL"]), 0, strpos(strtolower($_SERVER["SERVER_PROTOCOL"]), "/")) . $s;
		$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
		return $protocol . "://" . $_SERVER['SERVER_NAME'] . $port . $_SERVER['REQUEST_URI'];
	}
	
	function redirectPage($page){
		echo '<script type="text/javascript">window.location.href="'.$page.'.php"</script>';
	}
	
	function redirectUrl($url){
		echo '<script type="text/javascript">window.location.href="'.$url.'"</script>';
	}
	
	function alert($text){
		echo '<script type="text/javascript">alert("'.$text.'");</script>';
	}
	
	function focus($field_id){
		return '<script type="text/javascript">document.getElementById("'.$field_id.'").focus();</script>';
	}
	
	//Pagination Functions
	function createPaginationLink($totalRows, $limit, $viewAll = 'N'){
		if($totalRows > $limit){
			$pages = ceil($totalRows/$limit);
			
			#Query String
			if(isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] != ''){
				parse_str($_SERVER['QUERY_STRING'], $qsArr);
				
				unset($qsArr['pageNo']);
				unset($qsArr['pagination']);
				
				$qs = '?'. http_build_query($qsArr).'&';
			}else {
				$qs = '?';
			}
			
			if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 1){
				$p = $_REQUEST['pageNo'];
			}else {
				$p = 1;
			}
			
			if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 1){
				
				if($_REQUEST['pageNo'] == $pages){
					#Prev Page and First Page Button
					$paginationLinks = '<a href="'.$qs.'pageNo=1" class="btn btn-default" title="Goto Page 1"><i class="fa fa-angle-double-left"></i></a>';
					$paginationLinks .= '<a href="'.$qs.'pageNo='.($_REQUEST['pageNo']-1).'" class="btn btn-default" title="Goto Page '.($_REQUEST['pageNo']-1).'"><i class="fa fa-angle-left"></i>&nbsp;&nbsp;Prev</a>';
				}else {
					#Prev Page, Next Page, First Page, Last Page Buttons
					$paginationLinks = '<a href="'.$qs.'pageNo=1" class="btn btn-default" title="Goto Page 1"><i class="fa fa-angle-double-left"></i></a>';
					$paginationLinks .= '<a href="'.$qs.'pageNo='.($_REQUEST['pageNo']-1).'" class="btn btn-default" title="Goto Page '.($_REQUEST['pageNo']-1).'"><i class="fa fa-angle-left"></i>&nbsp;&nbsp;Prev</a>';
					
					$paginationLinks .= '<a href="'.$qs.'pageNo='.($_REQUEST['pageNo']+1).'" class="btn btn-default" title="'.($_REQUEST['pageNo']+1).'">Next&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>';
					$paginationLinks .= '<a href="'.$qs.'pageNo='.$pages.'" class="btn btn-default" title="Goto Page '.$pages.'"><i class="fa fa-angle-double-right"></i></a>';
				}
				
			}else {
				
				#Next Page and Last Page Button
				$paginationLinks = '<a href="'.$qs.'pageNo=2" class="btn btn-default" title="Goto Page 2">Next&nbsp;&nbsp;<i class="fa fa-angle-right"></i></a>';
				$paginationLinks .= '<a href="'.$qs.'pageNo='.$pages.'" class="btn btn-default" title="Goto Page '.$pages.'"><i class="fa fa-angle-double-right"></i></a>';
			}
			
			
			if($viewAll == 'Y'){
				$viewAllLink = '<a href="?viewall=yes" class="btn btn-info" title="View All">View All</a>';
			}else {
				$viewAllLink = '';
			}
			if(isset($_REQUEST['viewall'])){
				echo '<div class="l"></div>';
				echo '<div class="r"><a href="?pagination=yes" class="btn btn-info" title="View Pagination">Pagination</a></div>';
			}else {
				echo '<div class="l"><button class="btn btn-white">Page: '.$p.'/'.$pages.'</button></div>';
				echo '<div class="r">'.$viewAllLink.' '.$paginationLinks.'</div>';
			}
			
		}
	}
	
	function isImage($imageFilePath){
		list($width, $height, $type, $attr) = getimagesize($imageFilePath);
		
		if($type != 1 && $type != 2 && $type != 3){
			return false;
		}else{
			return true;
		}
	}
	
	function isDocuments($fileType){
		$allowedFileTypes = array(
			'application/pdf', 
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
			'application/msword', 
			'image/jpeg', 
			'image/png', 
			'image/gif', 
			'image/bmp'
		);
		if(in_array($fileType, $allowedFileTypes)){
			return true;
		}else {
			return false;
		}
	}
	
	function isImageSize($imageFilePath, $imageWidth, $imageHeight){
		list($width, $height, $type, $attr) = getimagesize($imageFilePath);
		
		if($imageWidth == $width && $imageHeight == $height){
			return true;
		}else {
			return false;
		}
	}
	
	function isEmail($email){
		$pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
		if (preg_match($pattern, $email)){
			return true;
		}else {
			return false;
		}   
	}
	
	function validatePassword($password){
		$pattern = "/^(?=.*[!@#$%^&*()\-_=+`~\[\]{}?|])(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{6,16}$/i";
		if (preg_match($pattern, $password)){
			return true;
		}else {
			return false;
		}   
	}
	
	function isSpecialChar($string){
		
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)){
			return true;
		}else{
			return false;
		}
	}
	
	function encrypt($string, $key = 'lmSKey') {
	  $result = '';
	  for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	  }
	  return base64_encode($result);
	}
	
	function decrypt($string, $key = 'lmSKey') {
	  $result = '';
	  $string = base64_decode($string);
	  for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	  }
	  return $result;
	}
	
	function getRandomString($length = 6) {
		$characters = array('A','1','B','2','C','3','D','4','E','5','F','6','G','7','H','8','I','9','J','0','K','9','L','8','M','7','N','6','O','5','P','4','Q','3','R','2','S','1','T','2','U','3','V','4','W','5','X','6','Y','7','Z','8');
		$string = '';
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[rand(0, 51)];
		}
		return $string;
	}
	
	function getRandomNumber($length = 10) {
		$numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0');
		$string = '';
		for ($p = 0; $p < $length; $p++) {
			$string .= $numbers[rand(0, 18)];
		}
		return $string;
	}

	function numberToWord($number) {
	
		$hyphen      = '-';
		//$hyphen      = ' ';
		$conjunction = ' and ';
		$separator   = ', ';
		$negative    = 'negative ';
		$decimal     = ' point ';
		$dictionary  = array(
			0                   => 'Zero',
			1                   => 'One',
			2                   => 'Two',
			3                   => 'Three',
			4                   => 'Four',
			5                   => 'Five',
			6                   => 'Six',
			7                   => 'Seven',
			8                   => 'Eight',
			9                   => 'Nine',
			10                  => 'Ten',
			11                  => 'Eleven',
			12                  => 'Twelve',
			13                  => 'Thirteen',
			14                  => 'Fourteen',
			15                  => 'Fifteen',
			16                  => 'Sixteen',
			17                  => 'Seventeen',
			18                  => 'Eighteen',
			19                  => 'Nineteen',
			20                  => 'Twenty',
			30                  => 'Thirty',
			40                  => 'Fourty',
			50                  => 'Fifty',
			60                  => 'Sixty',
			70                  => 'Seventy',
			80                  => 'Eighty',
			90                  => 'Ninety',
			100                 => 'Hundred',
			1000                => 'Thousand',
			1000000             => 'Million',
			1000000000          => 'Billion',
			1000000000000       => 'Trillion',
			1000000000000000    => 'Quadrillion',
			1000000000000000000 => 'Quintillion'
		);
	
		if (!is_numeric($number)) {
			return false;
		}
	
		if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
			// overflow
			trigger_error(
				'numberToWord only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
				E_USER_WARNING
			);
			return false;
		}
	
		if ($number < 0) {
			return $negative . numberToWord(abs($number));
		}
	
		$string = $fraction = null;
	
		if (strpos($number, '.') !== false) {
			list($number, $fraction) = explode('.', $number);
		}
	
		switch (true) {
			case $number < 21:
				$string = $dictionary[$number];
				break;
			case $number < 100:
				$tens   = ((int) ($number / 10)) * 10;
				$units  = $number % 10;
				$string = $dictionary[$tens];
				if ($units) {
					$string .= $hyphen . $dictionary[$units];
				}
				break;
			case $number < 1000:
				$hundreds  = $number / 100;
				$remainder = $number % 100;
				$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
				if ($remainder) {
					$string .= $conjunction . numberToWord($remainder);
				}
				break;
			default:
				$baseUnit = pow(1000, floor(log($number, 1000)));
				$numBaseUnits = (int) ($number / $baseUnit);
				$remainder = $number % $baseUnit;
				$string = numberToWord($numBaseUnits) . ' ' . $dictionary[$baseUnit];
				if ($remainder) {
					$string .= $remainder < 100 ? $conjunction : $separator;
					$string .= numberToWord($remainder);
				}
				break;
		}
	
		if (null !== $fraction && is_numeric($fraction)) {
			//$fraction = number_format($fraction,2);
			$string .= $decimal;
			$words = array();
			$string .= numberToWord($fraction);
			//foreach (str_split((string) $fraction) as $number) {
	
			//    $words[] = $dictionary[$number];
			//}
			//$string .= implode(' ', $words);
		}
	
		return $string;	
	}
	
	function makePermaLink($pageName){
		#Remove All Special Chars
		$outPut = preg_replace('/[^a-zA-Z0-9 -]/s', '', $pageName);
		#Remove Double Spaces
		$outPut = preg_replace('/\s+/', ' ', $outPut);
		return strtolower(str_replace(' ', '-', trim($outPut)));
	}

	function sendEmail($from, $to, $subject, $msg){
		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= "Content-type:text/html; charset=utf-8"."\r\n";
		$headers .= "Reply-To: ". $from . "\r\n";
		$headers .= "From: ".$from."\r\n";
		$message = '<html><body>';
		$message .= stripslashes($msg);
		$message .= '</body></html>';
		
		if(mail($to, $subject, $message, $headers)){
			return true;
		}else{
			return false;
		}
	}
	
	function getIPDetails($ip){
		$result = file_get_contents("http://freegeoip.net/json/".$ip); //IP address
		$return = json_decode($result);
		return($return);
	}
?>