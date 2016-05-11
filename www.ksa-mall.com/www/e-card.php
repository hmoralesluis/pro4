<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$cid = trim($_GET['cid']);
	
	$cardSql = 'SELECT * FROM ecards WHERE ec_seo_url = "'.mysql_real_escape_string($cid).'"';
	$cardRes = mysql_query($cardSql);
	
	if($cardRes && mysql_num_rows($cardRes) > 0) {
		$cardRow = mysql_fetch_object($cardRes);
		$header = array(
			'siteTitle'	=> 'Send This Free E-Card',
			'pageTitle'	=> 'Send This Free E-Card',
			'keywords'	=> $cardRow->ec_seo_key,
			'desc'		=> $cardRow->ec_seo_desc,
			'pageClass'	=> 'e-cards', //page-subpage
			'hmcurrent'	=> 'EC',
			'breadcrumb'=> array(
				array(
					'url' => '/e-cards/index/html', 'text' => 'E-Cards',
					'url' => '', 'text' => 'Send This Free E-Card'
				)
			)
		);
	}else {
		$header = array(
			'siteTitle'	=> 'ERROR! Page Not Foun!',
			'pageTitle'	=> 'ERROR! Page Not Foun!',
			'keywords'	=> 'ERROR! Page Not Foun!',
			'desc'		=> 'ERROR! Page Not Foun!',
			'pageClass' => 'e-cards', //page-subpage
			'hmcurrent'	=> 'EC',
			'breadcrumb'=> array(
				array(
					'url' => '/e-cards/index/html', 'text' => 'E-Cards',
					'url' => '', 'text' => 'Send This Free E-Card'
				)
			)
		);
	}
?>
<? require_once('includes/site-header.php'); ?>
    <!--Page Content Start -->
    <!--Listing Grid-->
    <style type="text/css">
		#sMsg {height:35px;}
		.msg-bg {color:#fff; padding:5px 10px; font-size:13px; font-weight:300; display:block; margin-bottom:10px;}
		.msg-bg.red {background-color:#f00;}
		.msg-bg.green {background-color:#090;}
		.cl-lable {cursor: pointer; display: block; margin: 0 0 10px; padding: 2px 5px;}
	</style>
    <section class="block equal-height" style="padding-top:0px !important;">

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="item">
                    <div class="image">
                        <div class="wrapper" style="overflow: hidden;">
                            <form action="/e-card-post.php" method="post" class="sendECard">
                                <div class="card-preview-container">
                                    <table class="card-preview" align="center">
                                        <tr>
                                            <td height="30" width="30"></td>
                                            <td></td>
                                            <td width="30"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <div style="text-align: left; font-weight: bold;">To <span class="to-name"></span></div>
                                                <p style="opacity: 1">
                                                <img src="http://www.aswakdubai.com/upload/e-cards/<?=$cardRow->ec_filename?>" alt="<?=$cardRow->ec_alt_tag?>">
                                                </p>
                                                <p style="margin: 0; opacity: 1;" class="my-msg">
                                                Your personal Message goes here. you can write as much as you like our cards<br>
                                                expand to fit your message.
                                                </p>
                                                <div style="text-align: right; font-weight: bold;">From <span class="from-name"></span></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td height="30"></td>
                                        </tr>
                                    </table>
                                </div>

                                <p>&nbsp;</p>

                                <div class="phase-customization">
                                    <fieldset style="text-align: left;" class="col-md-6 col-sm-6">
                                        <legend>Choose Your background and font color (optional)</legend>
                                        <? $ccRes = mysql_query('SELECT * FROM ecards_colors ORDER BY c_id DESC'); ?>
										<? while($ccRow = mysql_fetch_object($ccRes)): ?>
                                        <label class="cl-lable" style="background: <?=$ccRow->c_bg_color?>; color: <?=$ccRow->c_fg_color?>;">
                                            <input type="radio" name="color" value="<?=$ccRow->c_bg_color?>; <?=$ccRow->c_fg_color?>"> 
                                            The quick brown fox jumps over the lazy dog.
                                        </label>
                                        <? endwhile; ?>
                                    </fieldset>

                                    <fieldset style="text-align: left;" class="col-md-6 col-sm-6">
                                        <legend>Personalize your E-Card</legend>
                                        <label>Sender's Details</label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" class="form-control sender-name" name="sender-name" id="sender-name" placeholder="Name" required="required">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="email" class="form-control" name="sender-email" id="sender-email"  placeholder="Email" required="required">
                                            </div>
                                        </div>
                                        <br>
                                        <label>Recepient's Details</label>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input type="text" class="form-control rec-name" name="rec-name" id="rec-name" placeholder="Name" required="required">
                                            </div>
                                            <div class="col-md-6 col-sm-6">
                                                <input type="email" class="form-control" name="rec-email" id="rec-email" placeholder="Email" required="required">
                                            </div>
                                        </div>
                                        <br>
                                        <label>Custom Message</label>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <select name="custom-msg" class="custom-msg" required="required">
                                                    <option>Select</option>
                                                    <? $ctRes = mysql_query('SELECT * FROM ecards_temps ORDER BY t_id DESC'); ?>
                                                    <? while($ctRow = mysql_fetch_object($ctRes)): ?>
                                                    <option value="<?=$ctRow->t_temp?>"><?=str_replace('<br />', ' ', $ctRow->t_temp)?></option>
                                                    <? endwhile; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <label>Personal Message</label>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12">
                                                <textarea name="msg" class="form-control msg"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <button type="button" class="btn preview" style="background-color: #FF513F; color: #fff;">Next</button>
                                    
                                </div>
                                <div class="phase-preview" style="display:none;">
                                	
                                	<div class="form-group inputcaptcha-group">
                                    	<div id="sMsg"></div>
                                        <label for="captcha">Captcha:</label>
                                        <input type="text" id="captcha" name="captcha" class="inputcaptcha" placeholder="Captcha Code is Case Sensitive" required="required">
                                        <img src="<?=$siteBaseUrl?>php-includes/captcha.php" class="imgcaptcha" alt="captcha"  />
                                        <img src="<?=$siteBaseUrl?>assets/img/refresh.png" alt="reload" class="refresh" />
                                    </div>
                                    <button type="button" class="btn edit" style="background-color: #FF513F; color: #fff;">Edit</button> 
                                    <button type="submit" class="btn send" style="background-color: #FF513F; color: #fff;">Send This Card</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <script type="text/javascript">
		$('form.sendECard').submit(function(event){
			// Sending card
			event.preventDefault();
			$('#sMsg').html('sending...');
			
			//Action If Okay Button Pressed
			var postUrl	= $(this).attr('action');
			var formData = new FormData(this);
			var msgBox = $('.card-preview-container').html();
			formData.append('msgBox', msgBox)
			console.log(postUrl);
			console.log(formData);
			
			$.ajax({
				url: postUrl,
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false, 
				success:function(data, textStatus, jqXHR){
					console.log(data);
					
					if(typeof data.status != 'undefined'){
						if(data.status == 0){
							 $('.image .wrapper').html(data.msg);
							 $('body').scrollTop(150);
						}else {
							if(typeof data.msg != 'undefined'){
								 $('#sMsg').html(data.msg);
							}
						}
					}
				},
				error: function(jqXHR, textStatus, errorThrown){
					alert('Error on Submitting Form.');
				}
				
			});
		});
		
        $(function () {
            $('.preview').click(function(){
                $('.phase-customization').hide();
                $('.phase-preview').show();
                $('body').scrollTop(250);
            });
            
            $('.edit').click(function(){
                $('.phase-customization').show();
                $('.phase-preview').hide();
                $('body').scrollTop(250);
            });

            // Selecting theme
            $('input[type=radio]').click(function () {
                var colors = $(this).val();
                var color = colors.split(';');
                $('.card-preview').css({
                    'background-color': color[0],
                    'color': color[1]
                });
            });

            // Personalizing card
            $('.sender-name').keyup(function () {
                var from = $(this).val();
                $('.from-name').text(from);
            });
            $('.rec-name').keyup(function () {
                var from = $(this).val();
                $('.to-name').text(from);
            });
            $('.msg').keyup(function () {
                var msg = $(this).val();
                $('.my-msg').html(msg);
            });
            $('.custom-msg').change(function () {
                var msg = $(this).val();
                $('.my-msg').html(msg);
            });
        });
    </script>
    <!--end Listing Grid-->
    <!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>