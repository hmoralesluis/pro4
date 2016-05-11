<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_SESSION['user']) && isset($_SESSION['user']['userID']) && $_SESSION['user']['userID'] > 0){
		header('Location: index.php');
		exit;
	}
	
	if(isset($_REQUEST['id']) && $_REQUEST['id'] != ''){
		$id = trim($_REQUEST['id']);
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Password - Lebanesemall Users</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css?v=1.0" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <style type="text/css">
			html, body {
				background-color:#414141 !important;
			}
			.sMsg {
				margin-bottom:10px;
			}
			.sMsg span {
				display:block;
				padding:3px 8px;
			}
		</style>
    </head>
    <body>
		<? if(isset($id)): ?>
        <div class="form-box" id="login-box">
            <div class="header bg-black">Reset Password</div>
            <form action="login-post.php" method="post" class="afs">
            	<input type="hidden" name="a" value="updatePassword" />
                <input type="hidden" name="id" value="<?=$id?>" />
                <div class="body bg-gray">
                	<div class="sMsg">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="New Password" autofocus required />
                    </div>
                    <div class="form-group">
                        <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" required />
                    </div>
                </div>
                <div class="footer" style="text-align:center">
                    <button type="submit" class="btn bg-black btn-block">Reset My Password</button>
                    <a href="login.php" title="Login" style="font-size:14px;">Login</a>
                </div>
            </form>
        </div>
        <? else: ?>
        <div class="form-box" id="login-box">
            <div class="header bg-black">Reset Password</div>
            <form action="login-post.php" method="post" class="afs">
            	<input type="hidden" name="a" value="resetPassword" />
                <div class="body bg-gray">
                	<div class="sMsg">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus />
                    </div>
                </div>
                <div class="footer" style="text-align:center">
                    <button type="submit" class="btn bg-black btn-block">Reset My Password</button>
                    <a href="login.php" title="Login" style="font-size:14px;">Login</a>
                </div>
            </form>
        </div>
        <? endif; ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script>
			$('form.afs').submit(function(e){
				e.preventDefault();
				var thisF = $(this);
				$('.sMsg', this).html('');
				
				var postUrl	= $(this).attr('action');
				var postData= $(this).serializeArray();
				var sMsg	= $('.sMsg', this);
				
				//console.log(postUrl);
				//console.log(postData);
				
				$.ajax({
					url: postUrl, 
					type: "POST",
					data : postData,
					success:function(jSonData, textStatus, jqXHR){
						console.log(jSonData);
						var data = jSonData;
						
						if(typeof data.msg != 'undefined'){
							sMsg.html(data.msg);
						}
						
						if(typeof data.field != 'undefined'){
							$.each(data.field, function(id, value){
								$('#'+id).val(value);
							});
						}
						
						if(typeof data.redirect != 'undefined'){
							window.location.href = data.redirect;
						}
					}
				});
			});
		</script>
    </body>
</html>
