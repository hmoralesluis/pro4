<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	$header = array(
		'siteTitle' => 'News',  
		'cMenu'		=> 'dashboard', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'News')
		)
	);
	
	$formPostUrl = 'news-post.php';
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
                <?
					$sql = 'SELECT newsID, addedOn, title, shortDescription  FROM user_latestnews ORDER BY addedOn DESC';
					$res = mysql_query($sql);
				?>
                <? if(mysql_num_rows($res) > 0): ?>
					<? while($row = mysql_fetch_object($res)): ?>
                        <li>
                            <!-- timeline icon -->
                            <div class="timeline-item">
                                <span class="time"><i class="fa fa-clock-o"></i> <?=date('d-m-Y', strtotime($row->addedOn))?></span>
                                <h3 class="timeline-header">
                                	<a href="/user/view-news.php?id=<?=$row->newsID?>"><?=stripslashes($row->title)?></a>
                                </h3>
                                <div class="timeline-body">
                                    <?=stripslashes($row->shortDescription)?>
                                </div>
                                <div class="timeline-footer">
                                    <a href="/user/view-news.php?id=<?=$row->newsID?>" class="btn btn-primary btn-xs">Read more</a>
                                </div>
                            </div>
                        </li>
                    <? endwhile; ?>
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