<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	if(isset($_REQUEST['id']) && $_REQUEST['id'] > 0){
		$newsID = (int) $_REQUEST['id'];
	}
	
	if(isset($newsID)){
		
		$nSql = 'SELECT newsID, addedOn, title, description FROM user_latestnews WHERE newsID = '.$newsID;
		$nRes = mysql_query($nSql);
		if(mysql_num_rows($nRes) > 0){
			$nRow = mysql_fetch_object($nRes);
			
			mysql_query('UPDATE user_latestnews SET counts = (counts + 1) WHERE newsID = '.$newsID);
			
			$siteTitle	= stripslashes($nRow->title);
			$breadcrumb	= 'View News';
		}else {
			$siteTitle	= 'Error!';
			$breadcrumb	= 'News not Found, or News may Deleted by Admin.';
		}
	}else {
		$siteTitle	= 'Error!';
		$breadcrumb	= 'Invalid Access of the Page';
	}
	
	$header = array(
		'siteTitle' => $siteTitle,  
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			array('url' => '/user/news.php', 'text' => 'News'), 
			array('url' => '', 'text' => $breadcrumb)
		)
	);
	
	$formPostUrl = 'view-news-post.php';
?>

<? require_once('includes/header.php'); ?>
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
        	<style type="text/css">
				.timeline:before {
					content:normal;
				}
				.timeline > li > .timeline-item {
					margin-left:0px;
				}
				.timeline > li:before, .timeline > li:after {
					
				}
			</style>
            <ul class="timeline">
                <? if(isset($nRow)): ?>
                    <li>
                        <!-- timeline icon -->
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> <?=date('d-m-Y', strtotime($nRow->addedOn))?></span>
                            <h1 class="timeline-header">
                                <?=stripslashes($nRow->title)?>
                            </h1>
                            <div class="timeline-body">
                                <?=stripslashes($nRow->description)?>
                            </div>
                        </div>
                    </li>
                <? else: ?>
                	
                <? endif; ?>
            </ul>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
        	<? require_once('includes/rightside-news.php'); ?>
        </div>
    </div>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>