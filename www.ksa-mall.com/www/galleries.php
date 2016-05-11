<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['seoUrl'])){ $seoUrl = trim($_REQUEST['seoUrl']); }else { $seoUrl = ''; }
	
	$isError = true;
	
	$gcRes = mysql_query('
		SELECT gc.* 
		FROM gallery_cat AS gc 
		WHERE gc.seoUrl = "'.mysql_real_escape_string($seoUrl).'" 
	');
	
	if(mysql_num_rows($gcRes) > 0){
		$gcRow = mysql_fetch_object($gcRes);
		
		$siteTitle	= stripslashes($gcRow->seoTitle);
		$pageTitle	= stripslashes($gcRow->gCatName);
		$seoKeyword = stripslashes($gcRow->seoKeyword);
		$seoDesc	= stripslashes($gcRow->seoDescription);
		
		if(isset($_REQUEST['isSpecial']) && $seoUrl == 'lebanon-nightlife-photos'){
			$hmcurrent	= 'NL';
		}else {
			$hmcurrent	= 'PA';
		}
		
		$breadcrumb = array(
			array('url' => '/photos/index.html', 'text' => 'Photos'), 
			array('url' => '', 'text' => stripslashes($gcRow->gCatName))
		);
		
		$isError = false;
	}
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		
		if(isset($_REQUEST['isSpecial']) && $seoUrl == 'lebanon-nightlife-photos'){
			$hmcurrent	= 'NL';
		}else {
			$hmcurrent	= 'PA';
		}
		
		$breadcrumb = array(
			array('url' => '', 'text' => '404 ERROR!')
		);
		
		$includeFile = 'php-includes/404.php';
	}
	
	$header = array(
		'siteTitle' => $siteTitle, 
		'pageTitle'	=> $pageTitle, 
		'keywords'	=> $seoKeyword, 
		'desc'		=> $seoDesc, 
		'pageClass'	=> 'map-fullscreen', //page-subpage
		'hmcurrent'	=> $hmcurrent,
		'breadcrumb'=> $breadcrumb
	);
	
	/*print_r($header);
	exit;*/
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<? if(!$isError): ?>
	<!--Listing Grid-->
    <section id="photo-album" class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
    	<?
			$gSql = '
				SELECT g.*, 
				(
					SELECT imgPath  
					FROM gallery_images AS gi 
					WHERE gi.gID = g.gID 
					ORDER BY rand() 
					LIMIT 1 
				) AS imgPath 
				FROM gallery AS g 
				WHERE g.gCatID = '.$gcRow->gCatID.' 
			';
			//echo $gSql;
			
			$gRes = mysql_query($gSql);
		?>
        <? if(mysql_num_rows($gRes) > 0): ?>
			<? while($gRow = mysql_fetch_object($gRes)): ?>
                <?
                    $gName	= stripslashes($gRow->gName);
					if(isset($_REQUEST['isSpecial']) && $seoUrl == 'lebanon-nightlife-photos'){
                    	$gHref = '/nightlife/'.stripslashes($gRow->seoUrl).'.html';
					}else {
						$gHref = '/photos/'.$seoUrl.'/'.stripslashes($gRow->seoUrl).'.html';
					}
					
                    if($gRow->imgPath != ''){
                        $imgPath = stripslashes($gRow->imgPath);
                    }else{
                        $imgPath = stripslashes($settings[4]);
                    }
                    
                    if(strpos($imgPath, "http") === false){
                        $imgPath	= 'http://'.$domain.'/'.$imgPath;
                    }
                    
                ?>
                <div class="col-md-3 col-sm-4">
                    <div class="item ">
                        <div class="image">
                            <a href="<?=$gHref?>" title="<?=$gName?>">
                                <img src="/thumb/263-196-<?=$imgPath?>" alt="<?=$gName?>">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$gHref?>" title="<?=$gName?>"><h3 style="min-height:34px;"><?=$gName?></h3></a>
                        </div>
                    </div>
                </div>
            <? endwhile; ?>
        <? endif; ?>
    </div>
    <!--/.row-->
    </section>
    <!--end Listing Grid-->
<? else: ?>
	<? require_once('php-includes/404.php');?>
<? endif; ?>
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>