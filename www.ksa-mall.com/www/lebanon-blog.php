<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Qatar', 
		'pageTitle'	=> 'Qatar', 
		'keywords'	=> $settings[15], 
		'desc'		=> $settings[16], 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-sulbpage
		'hmcurrent'	=> 'LB',
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Qatar')
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
                   		<? $selTag = mysql_query('SELECT * FROM lebanon_tags')?>
                        <? if(mysql_num_rows($selTag) > 0 ):?>
							<? while($row = mysql_fetch_object($selTag)):?>
                            	<?
									$tag = trim(stripslashes($row->tag));
									if(isset($_REQUEST['tag']) && $_REQUEST['tag'] == $tag){$current = ' current';}else{$current = '';}
								?>
                            	<a href="/qatar/tag/<?=$tag?>" class="btn<?=$current?>" title="<?=$tag?>">
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
						SELECT lbp.*, 
						u.fullName 
						FROM lebanon_posts AS lbp 
						LEFT JOIN users AS u ON u.userID = lbp.userID 
						WHERE lbp.isApproved = "Y" 
					';
					
					if(isset($_REQUEST['tag']) && $_REQUEST['tag'] != ''){
						$blogSql .= 'AND lbpTag LIKE "%'.mysql_real_escape_string($_REQUEST['tag']).'%" ';
					}
					
					$blogSql .= 'ORDER BY lbp.sOrder ASC ';
					
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
							$lbpTitle 		= stripslashes($row->lbpTitle);
							$lbpImg 		= stripslashes($row->lbpImg);
							$lbpShortDesc	= stripslashes($row->lbpShortDesc);
							$lbpDescription = stripslashes($row->lbpDescription);
							$seoUrl 		= stripslashes($row->seoUrl);
							
							if($userID == 0){
								$userName = 'Admin';
							}else {
								$userName = stripslashes($row->fullName);
							}
							
							$aHref = '/qatar/'.$seoUrl.'.html';
						?>
                        <article class="blog-post">
                            <header><a href="<?=$aHref?>"><h2><?=$lbpTitle?></h2></a></header>
                            <a href="<?=$aHref?>"><img src="<?=$lbpImg?>" alt=""></a>
                            <figure class="meta">
                            	<a href="javascript:void(0)" class="link-icon"><i class="fa fa-user"></i><?=$userName?></a>
                                <a href="javascript:void(0)" class="link-icon"><i class="fa fa-calendar"></i><?=$addedOn?></a>
                            </figure>
                            <p><?=$lbpShortDesc?></p>
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