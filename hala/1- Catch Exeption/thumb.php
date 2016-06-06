<?php 	if(isset($_REQUEST['imagePath']) && $_REQUEST['imagePath'] != ''){
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
		include('phpmyadmin/libraries/Error_Handler.class.php');

		//Code edited by Hamlet
			$image = new SimpleImage();
			try{
				$image->load($imagePath);
			}
			catch(Exception $e){
				error_log($e->getMessage());
			}
	    //End Code edited by Hamlet

		
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