<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Search Result', 
		'pageTitle'	=> 'Search Result', 
		'keywords'	=> 'Search Result', 
		'desc'		=> 'Search Result', 
		'pageClass'	=> 'map-fullscreen', //page-subpage
		'hmcurrent'	=> '',
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Search Result')
		)
	);
	
	/*print_r($header);
	exit;*/
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<section class="block equal-height" style="padding-top:0px !important;">
        <div class="row">
            <?
				/*echo '<pre>';
				print_r($_REQUEST);
				echo '</pre>';*/
				
				$sql = '
                    SELECT bl.* 
					FROM businesslistings AS bl 
					WHERE bl.status = "A" 
                    AND bl.expiryOn >= "'.date('Y-m-d').'" 
				';
				
				if($keyword != ''){
					$sql .= 'AND bl.businessName LIKE "%'.$keyword.'%" ';
				}
				
				if($location != ''){
					$sql .= 'AND bl.location LIKE "%'.$location.'%" ';
				}
				
				if($category != ''){
					$sql .= 'AND (subCatIDs = "'.$category.'" OR FIND_IN_SET('.$category.', subCatIDs))';
				}
				
				$sql .= 'ORDER BY bl.sOrder ASC ';
				//echo $sql;
            ?>
            <? if($keyword != '' || $location != '' || $category != ''): ?>
            	<? $res = mysql_query($sql); ?>
				<? if(mysql_num_rows($res) > 0): ?>
                <? while($row = mysql_fetch_object($res)): ?>
                    <?
                        $businessName	= stripslashes($row->businessName);
                        $seoUrl			= stripslashes($row->seoUrl);
                        if($row->imgPath != ''){
                            $logo = stripslashes($row->imgPath);
                        }else { 
                            $logo = stripslashes($settings[4]);
                        }
                        //echo $logo;
                        if(strpos($logo, "http") === false){
                            $logo = 'http://'.$domain.'/'.$logo;
                        }
                        $CatHref		= $seoUrl.".html";
                    ?>
                <div class="col-md-3 col-sm-4">
                    <div class="item ">
                        <div class="image">
                            
                            <a href="<?=$CatHref?>">
                                <img src="/thumb/263-196-<?=$logo?>" alt="">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                        </div>
                    </div>
                </div>
                <? endwhile;?>
                <? endif;?>
            <? else: ?>
            	<span class="red">No Search Term Found.</span>
            <? endif; ?>
        </div>
    <!--/.row-->
    </section>
    <!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>