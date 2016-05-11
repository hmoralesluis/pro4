<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>File Manager</title>

		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>

		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">

		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="js/elfinder.min.js"></script>

		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			function getURLParameter(name) {
				return decodeURI(
					(RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
				);
			}
			var m = getURLParameter('m');
			$().ready(function() {
				if(m == 'true'){
					var elf = $('#elfinder').elfinder({
						url : 'php/connector.php',  // connector URL (REQUIRED)
						getFileCallback : function(files) {
							window.opener["receiveFiles_"+getURLParameter('f')](files); //getURLParameter('f') in this f is Function
							window.close();
						},
						commandsOptions : {
						   getfile : {multiple : true, oncomplete : 'close' }
						},
						resizable: false, 
						rememberLastDir: false 
					}).elfinder('instance');
				}else if(m == 'false') {
					var elf = $('#elfinder').elfinder({
						url : 'php/connector.php',  // connector URL (REQUIRED)
						getFileCallback : function(file) {
							window.opener.receiveFile(file, getURLParameter('f')); //getURLParameter('f') in this f is Field
							window.close();
						},
						resizable: false, 
						rememberLastDir: false 
					}).elfinder('instance');
				}
            });
		</script>
	</head>
	<body>

		<!-- Element where elFinder will be created (REQUIRED) -->
        <span style="color:#06F; display:block; margin-bottom:10px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;">Help: After uploading Images, Select image/images and right click on image and click 'select' to insert.</span>
		<div id="elfinder"></div>
		<span style="color:#090; display:block; margin-bottom:10px; font-family:'Trebuchet MS', Arial, Helvetica, sans-serif; font-size:14px;">
        You can drag files and images from your computer and drop them here.
        </span>
	</body>
</html>
