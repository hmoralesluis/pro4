<?
	if(isset($_REQUEST['imagePath']) && $_REQUEST['imagePath'] != ''){
		$imagePath = str_replace(' ', "%20", $_REQUEST['imagePath']);
		$imagePath = str_replace('http:/', "http://", $imagePath);
		
		if(isset($_REQUEST['width'])){
			$width		= $_REQUEST['width'];
		}else {
			$width		= '';
		}
		if(isset($_REQUEST['height'])){
			$height		= $_REQUEST['height'];
		}else {
			$height		= '';
		}
		
		#Print Image
		include('includes/SimpleImage.php');
		
		$image = new SimpleImage();
		$image->load($imagePath);
		
		if($width != '' && $height != ''){
			$image->adaptive_resize($width, $height);
		}else if($width != '' && $height == ''){
			$image->fit_to_width($width);
		}else if($height != '' && $width == ''){
			$image->fit_to_height($height);
		}
		
		$image->output();
		#End
	}
?>