<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Blog', 
		'pageTitle'	=> 'Blog', 
		'keywords'	=> $settings[13], 
		'desc'		=> $settings[14], 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-subpage
		'hmcurrent'	=> 'BL',
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Blog')
		)
	);
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<!--Listing Grid-->
	<section class="block equal-height" style="padding-top:0px !important;">
		<div class="row">
        	<!--Detail Sidebar-->
            <aside class="col-md-3 col-sm-3" id="detail-sidebar">
                <!--Contact-->
                <section>
                    <header><h3>Tags</h3></header>
                    <figure id="tags">
                   		<? $selTag = mysql_query('SELECT * FROM blog_tags')?>
                        <? if(mysql_num_rows($selTag) > 0 ):?>
							<? while($row = mysql_fetch_object($selTag)):?>
                            	<?
									$tag = trim(stripslashes($row->tag));
									if(isset($_REQUEST['tag']) && $_REQUEST['tag'] == $tag){$current = ' current';}else{$current = '';}
								?>
                            	<a href="/blog/tag/<?=$tag?>" class="btn<?=$current?>" title="<?=$tag?>">
								<?=stripslashes($row->tag)?>
                                </a>
                            <? endwhile;?>
                        <? endif;?>
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
        	<div class="col-md-9 col-sm-9">
            	<?
					/*echo '<pre>';
					print_r($_REQUEST);
					echo '</pre>';*/
					$blogSql = '
						SELECT bp.*, 
						u.fullName 
						FROM blog_posts AS bp 
						LEFT JOIN users AS u ON u.userID = bp.userID 
						WHERE bp.isApproved = "Y" 
					';
					
					if(isset($_REQUEST['tag']) && $_REQUEST['tag'] != ''){
						$blogSql .= 'AND bpTag LIKE "%'.mysql_real_escape_string($_REQUEST['tag']).'%" ';
					}
					
					$blogSql .= 'ORDER BY bp.addedOn DESC ';
					
					$totalRows = mysql_num_rows(mysql_query($blogSql));
					$limit = 20;
					
					if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
						$offset = ($_REQUEST['pageNo'] - 1);
					}else {
						$offset = 0;
					}
					
					$blogSql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
					
					$blogRes = mysql_query($blogSql);
				?>
                <? if(mysql_num_rows($blogRes) > 0):?>
					<? while($row = mysql_fetch_object($blogRes)):?>
                    	<? 
							$addedOn 		= date('d-m-Y', strtotime($row->addedOn));
							$userID  		= stripslashes($row->userID);
							$bpTitle 		= stripslashes($row->bpTitle);
							$bpImg 			= stripslashes($row->bpImg);
							$bpShortDesc	= stripslashes($row->bpShortDesc);
							$bpDescription 	= stripslashes($row->bpDescription);
							$seoUrl 		= stripslashes($row->seoUrl);
							
							if($userID == 0){
								$userName = 'Admin';
							}else {
								$userName = stripslashes($row->fullName);
							}
							
							$aHref = '/blog/'.$seoUrl.'.html';
						?>
                        <article class="blog-post">
                            <header><a href="<?=$aHref?>"><h2><?=$bpTitle?></h2></a></header>
                            <a href="<?=$aHref?>"><img src="<?=$bpImg?>" alt=""></a>
                            <figure class="meta">
                            	<a href="javascript:void(0)" class="link-icon"><i class="fa fa-user"></i><?=$userName?></a>
                                <a href="javascript:void(0)" class="link-icon"><i class="fa fa-calendar"></i><?=$addedOn?></a>
                            </figure>
                            <p><?=$bpShortDesc?></p>
                            <a href="<?=$aHref?>" class="icon" title="Read More">Read More <i class="fa fa-angle-right"></i></a>
                        </article>
                    <? endwhile;?>
                    
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding:0px;">
                        <div class="pagination">
                            <? createPaginationLink($totalRows, $limit)?>
                        </div>
                    </div>
                <? else: ?>
                	<div class="col-md-12 col-sm-12">
                        <span class="red">No Records Found!</span>
                    </div>
                <? endif;?>
            </div>
		</div>
		<!--/.row-->
	</section>
	<!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>