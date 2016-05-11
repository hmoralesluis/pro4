<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_SESSION['user']) && isset($_SESSION['user']['userID']) && $_SESSION['user']['userID'] > 0){
		header('Location: index.php');
		exit;
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - Users</title>
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

        <div class="form-box" id="login-box">
            <div class="header bg-black">Sign In</div>
            <form action="login-post.php" method="post" class="afs">
            	<input type="hidden" name="a" value="login" />
                <div class="body bg-gray">
                	<div class="sMsg">
                    	<?
							if(isset($_REQUEST['a']) && $_REQUEST['a'] == 'v' && isset($_REQUEST['uid'])){
								$userID = (int) decrypt($_REQUEST['uid']);
								
								$userRes = mysql_query('SELECT * FROM users WHERE userID = '.$userID.' AND status = "P"');
								if(mysql_num_rows($userRes) > 0){
									$activateSql = 'UPDATE users SET status = "A" WHERE userID = '.$userID;
									
									if(mysql_query($activateSql)){
										$userRow = mysql_fetch_object($userRes);
										
										echo '<span class="bg-green">Your Email Verified Successfully. Please Login.</span>';
										
										$from = 'noreply@'.$domainOnly;
										$subject = 'your registration at '.$domainOnly;
										
										$eMsg = 'Dear '.stripslashes($userRow->fullname).',<br />';
										$eMsg .= '<br />';
										$eMsg .= 'Thank you for registering to '.$domain.' here are some important info please keep it in a safe place.<br />';
										$eMsg .= '<br />';
										$eMsg .= 'You can access your user area by clicking on <a href="'.$domain.'/user/login.php" title="Click to Login">'.$domain.'/user/login.php</a><br />';
										$eMsg .= '<br />';
										$eMsg .= 'Email: '.stripslashes($userRow->email).'<br />';
										$eMsg .= '<br />';
										$eMsg .= 'Pass: '.decrypt(stripslashes($userRow->password)).'<br />';
										$eMsg .= '<br />';
										$eMsg .= '<br />';
										$eMsg .= '<br />';
										$eMsg .= 'You can add new listings for free, edit your listing at any time and add offers or advertisements for a small fee.<br />';
										$eMsg .= '<br />';
										$eMsg .= 'If you need any support, kindly contact us through our contact us page, we will be happy to support you and answer any of your queries.<br />';
										$eMsg .= '<br />';
										$eMsg .= '<br />';
										$eMsg .= '<br />';
										$eMsg .= '<a href="'.$domain.'" title="'.$domain.'">'.$domain.'</a><br />';
										$eMsg .= '<br />';
										$eMsg .= 'Support Team';
										
										sendEmail($from, stripslashes($userRow->email), $subject, $eMsg);
									}else {
										echo '<span class="bg-red">Error on Activating your Accound, Please Contact Support.</span>';
									}
								}
							}
						?>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus />
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required />
                    </div>
                </div>
                <div class="footer" style="text-align:center">
                    <button type="submit" class="btn bg-black btn-block">Login</button>
                    <a href="reset-password.php" title="Reset Password" style="font-size:14px;">Reset Password</a>
                </div>
            </form>
        </div>

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
						
						if(typeof data.redirect != 'undefined'){
							window.location.href = data.redirect;
						}
					}
				});
			});
		</script>
    </body>
</html>
