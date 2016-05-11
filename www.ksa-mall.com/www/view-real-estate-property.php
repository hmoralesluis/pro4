<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['pid'])){ $pid = trim($_REQUEST['pid']); }else { $pid = ''; }
	
	$isError = true;
	if($pid != ''){
		$curlRet = curlPost($settings[7], array('a' => 'getProperty', 'pid' => $pid));
		if($curlRet['status'] == 0){
			
			$jsonData = json_decode($curlRet['json']);
			
			if(isset($jsonData->property)){
				$pArr = $jsonData->property;
				
				/*echo '<pre>';
				print_r($pArr);
				echo '</pre>';*/
				
				$siteTitle	= $pArr->title;
				$pageTitle	= $pArr->title;
				$seoKeyword = $pArr->seokey;
				$seoDesc	= $pArr->seodesc;
				$hmcurrent	= 'RE';
				$breadcrumb = array(
					array('url' => '/real-estate/index.html', 'text' => 'Real Estate'), 
					array('url' => '', 'text' => $pArr->title)
				);
				$isError = false;
			}
		}
	}
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$hmcurrent	= 'RE';
		$breadcrumb = array(
			array('url' => '', 'text' => '404 ERROR!')
		);
	}
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent'	=> 'RE', 
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
	$openSearch = true;
	$itemGallery = true;
?>
<? require_once('includes/site-header.php'); ?>
<? if($isError == false):?>
    <div class="row">
        <!--Detail Sidebar-->
        <aside class="col-md-4 col-sm-4" id="detail-sidebar">
            <!--Contact-->
            <section>
            	<div class="info" style="text-align:center;">
                	<? if($pArr->logo != ''): ?>
                	<img src="<?=$pArr->logo?>" alt="<?=$pArr->logoalt?>" />
                    <? endif; ?>
                </div>
                
                <header><h3>Contact</h3></header>
                <address style="margin-bottom:0px;">
                    <figure>
                        <div class="info">
                            <?=$pArr->address?>
                        </div>
                    </figure>
                    <figure>
                    	<div class="row">
                        	<?
								$realtyCountRes = mysql_query('SELECT * FROM realestate WHERE pID = '.$pid);
								if(mysql_num_rows($realtyCountRes) > 0){
									$realtyCountRow = mysql_fetch_object($realtyCountRes);
									
									mysql_query('UPDATE realestate SET visited = (visited + 1) WHERE pID = '.$pid);
									$views = $realtyCountRow->visited+1;
									$likes = $realtyCountRow->likes;
								}else {
									mysql_query('INSERT INTO realestate SET pID = '.$pid.', visited = 1, likes = 0');
									$views = 1;
									$likes = 0;
								}
							?>
                            <div class="col-md-4" style="height:55px;line-height:55px;">
                            	<?=$views?> views
                            </div>
                            <div class="col-md-4" style="height:55px;line-height:55px;">
                            	<span id="likesCount"><?=$likes?></span> likes
                            </div>
                            <div class="col-md-4" style="text-align:right;">
                               	<a href="<?=$siteBaseUrl?>ajax.php" title="Like Us" class="singleAction" data-id="<?=$pid?>" data-a="likeRealty">
                                <img src="<?=$siteBaseUrl?>images/like-us.png"/>
                                </a>
                            </div>
                            <script type="application/javascript">
								$(document).on('click', '.singleAction', function(event){
									event.preventDefault();
									var thisE		= $(this);
									var url			= thisE.attr('href');
									var id			= thisE.data('id');
									var a			= thisE.data('a');
									
									if(url != '' && id != '' && a != ''){
										//Ajax Start
										$.ajax({
											type: "POST",
											data: 'a='+a+'&id='+id,
											url : url, 
											success: function(jSonData){
												
												var data = jSonData;
												console.log(data);
												
												if(typeof data.html != 'undefined'){
													$.each(data.html, function(id, content){
														//console.log(id+': '+content);
														$('#'+id).html(content);
													});
												}
												
												if(typeof data.msg != 'undefined'){
													alert(data.msg);
												}
											}, 
											error: function(jqXHR, textStatus, errorThrown){
												alert('Error on Submitting Request.');
											}
										});
										//Ajax End
									}
								});
							</script>
                    	</div>
                    </figure>
                </address>
            </section>
            
            <!--Contact Form-->
            <section>
                <header><h3>Contact Form</h3></header>
                <figure>
                    <form id="item-detail-form" role="form" method="post" action="<?=$siteBaseUrl?>ajax.php" class="afs">
                    	<input type="hidden" name="a" value="sendRealEstateQuery" />
                        <input type="hidden" name="refNo" value="<?='RL-'.$pid?>" />
                        <div class="form-group">
                            <label for="item-detail-name">Name *</label>
                            <input type="text" class="form-control framed" id="eqName" name="eqName" required="required" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="item-detail-email">Email *</label>
                            <input type="email" class="form-control framed" id="eqEmail" name="eqEmail" required="required" />
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label for="item-detail-message">Message *</label>
                            <textarea class="form-control framed" id="eqMessage" name="eqMessage"  rows="3" required="required" /></textarea>
                        </div>
                        <div class="form-group">
                            <label for="item-detail-message">Captcha *</label>
                            <div class="row">
                            	<div class="col-md-5">
                                	<img src="/captcha/" id="captchaImg" alt="Captcha" />
                                </div>
                                <div class="col-md-7">
                                    <input type="text" class="form-control framed" id="captcha" name="captcha"  rows="4" required="required" />
                                </div>
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <button type="submit" class="btn framed icon">Send<i class="fa fa-angle-right"></i></button>
                        </div>
                        <!-- /.form-group -->
                    </form>
                    <script type="text/javascript">
						$('form.afs').submit(function(event){
							event.preventDefault();
							var thisF = $(this);
							
							var postUrl	= $(this).attr('action');
							var postData= $(this).serializeArray();
							var formData = new FormData(this);
							
							console.log(postUrl);
							console.log(postData);
							
							$.ajax({
								url: postUrl,
								type: 'POST',
								data: formData,
								processData: false,
								contentType: false, 
								success:function(jSonData, textStatus, jqXHR){
									console.log(jSonData);
									var data = jSonData;
									
									if(typeof data.img != 'undefined'){
										$.each(data.img, function(id, src){
											if(src != ''){
												$('#'+id).attr('src', src);
											}
										});
									}
									
									if(data.status == 0){
										thisF.trigger("reset");
									}
									
									if(typeof data.msg != 'undefined'){
										alert(data.msg);
									}
								},
								error: function(jqXHR, textStatus, errorThrown){
									alert('Error on Submitting Form.');
								}
							});
						});
					</script>
                </figure>
            </section>
            <section>
            	<header><h3>Tags</h3></header>
                <figure id="tags">
                	<? $tagArr = explode(',', $pArr->seokey); ?>
                    <? foreach($tagArr as $key => $val): ?>
                    <a href="#<?=$val?>" class="btn" title="<?=$val?>"><?=$val?></a>
                    <? endforeach; ?>
                </figure>
            </section>
            <? if($settings[2] != ''):?>
            <section>
            	<figure>
                	<div class="row">
                    	<div class="col-md-12">
                        	<?=$settings[2]?>
                        </div>
                    </div>
                </figure>
            </section>
            <? endif;?>
        </aside>
        <!--end Detail Sidebar-->
        <!--Content-->
        <div class="col-md-8 col-sm-8">
            <section style="margin-bottom:0px;">
               	<? if(count($pArr->images) > 0):?>
                <article class="item-gallery">
                    <div class="owl-carousel item-slider" id="itemSlier">
                    	<? foreach($pArr->images as $key => $imagePath):?>
                        <div class="slide"><img src="<?=$imagePath?>" data-hash="<?=$key+1?>" alt="<?=$pArr->seokey?>"></div>
                        <? endforeach;?>
                    </div>
                   
                    <!-- /.item-slider -->
                    <div class="thumbnails">
                        <span class="expand-content btn framed icon" data-expand="#gallery-thumbnails" >More<i class="fa fa-plus"></i></span>
                        <div class="expandable-content height collapsed show-70" id="gallery-thumbnails">
                            <div class="content">
                            	<? foreach($pArr->images as $key => $imagePath):?>
                                <a href="#<?=$key+1?>" id="thumbnail-<?=$key+1?>" class="active">
                                <img src="<?=$imagePath?>" data-hash="<?=$imagePath?>" alt="<?=$pArr->title?>">
                                </a>
                                <? endforeach;?>
                            </div>
                           
                        </div>
                    </div>
                </article>
                <? endif;?>
                <style type="text/css">
					#reDetails .row {
						margin-bottom:20px;
					}
					#reDetails h2 {
						margin-bottom:0px;
						color:#999;
					}
				</style>
                <article class="block">
                	<div id="reDetails">
                    	<header><h2>Location Details</h2></header>
                        <div class="row">
                        	<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            	Type: <?=$pArr->type?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            	City: <?=$pArr->city?>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            	Location: <?=$pArr->location?>
                            </div>
                        </div>
                        
                        <header><h2>General Amenities</h2></header>
                        <ul class="bullets">
                        	<? if(count($pArr->amenities) > 0): ?>
                            	<? foreach($pArr->amenities as $key => $val): ?>
                                <li><?=$val?></li>
                            	<? endforeach; ?>
                            <? endif; ?>
                        </ul>
                        
                        <header><h2>Description</h2></header>
                        <p><?=$pArr->description?></p>
                    </div>
                </article>
            </section>
            
        </div>
        <!-- /.col-md-8-->
    </div>
<? else:?>
	<? require_once('php-includes/404.php');?>
<? endif;?>
<? require_once('includes/site-footer.php'); ?>