<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['seoUrl'])){$seoUrl = trim($_REQUEST['seoUrl']);}else {$seoUrl = '';}
	
	$isError = true;
	if($seoUrl != ''){
		#Blog Details SQL Start
		$blogSql = '
			SELECT lbp.*, 
			u.fullName 
			FROM lebanon_posts AS lbp 
			LEFT JOIN users AS u ON u.userID = lbp.userID 
			WHERE lbp.seoUrl = "'.mysql_real_escape_string($seoUrl).'" AND lbp.isApproved = "Y" 
		';
		
		$blogRes = mysql_query($blogSql);
		if(mysql_num_rows($blogRes) > 0){
			$isError = false;
			
			$blogRow = mysql_fetch_object($blogRes);
			
			$addedOn 	= date('d-m-Y', strtotime($blogRow->addedOn));
			$lbpImg 		= stripslashes($blogRow->lbpImg);
			$lbpTag 		= stripslashes($blogRow->lbpTag);
			
			$siteTitle	= stripslashes($blogRow->seoTitle);
			$pageTitle	= stripslashes($blogRow->lbpTitle);
			$seoKeyword = stripslashes($blogRow->seoKeyword);
			$seoDesc	= stripslashes($blogRow->seoDescription);
			$breadcrumb = array(
				array('url' => '/qatar/index.html', 'text' => 'Qatar'), 
				array('url' => '', 'text' => $pageTitle)
			);
			
			if($blogRow->userID == 0){
				$userName = 'Admin';
			}else {
				$userName = stripslashes($blogRow->fullName);
			}
		}
		#Blog Details SQL End
	}
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$breadcrumb = array(
			array('url' => '', 'text' => '404 ERROR!')
		);
	}
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen page-item-detail', //page-sulbpage
		'hmcurrent'	=> 'LB', 
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
?>
<? require_once('includes/site-header.php'); ?>
<? if($isError == false):?>
    <!--Listing Grid-->
    <section class="block equal-height" style="padding-top:0px !important;">
        <div class="row">
            <!--Detail Sidebar-->
            <aside class="col-md-3 col-sm-3" id="detail-sidebar">
                <!--Contact-->
                <section>
                    <header><h3>Tags</h3></header>
                    <figure id="tags">
                    	<? $lbpTagArr = explode(',', $lbpTag);?>
                        <? foreach($lbpTagArr as $key => $tag): ?>
                        <span class="btn<?=$current?>"><?=trim($tag)?></span>
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
            <div class="col-md-9 col-sm-9">
                <article class="blog-post">
                    <img src="<?=$lbpImg?>" alt="<?=$seoKeyword?>">
                    <figure class="meta">
                        <a href="#" class="link-icon"><i class="fa fa-user"></i><?=$userName?></a>
                        <a href="#" class="link-icon"><i class="fa fa-calendar"></i><?=$addedOn?></a>
                        <div class="tags">&nbsp;</div>
                    </figure>
                    <div>
                        <?=stripslashes($blogRow->lbpDescription)?>
                    </div>
                </article><!-- /.blog-post-listing -->
            </div>
        </div>
        <!--/.row-->
    </section>
    <!--end Listing Grid-->
<? else:?>
	<? require_once('php-includes/404.php');?>
<? endif;?>
<? require_once('includes/site-footer.php'); ?>