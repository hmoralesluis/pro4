<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	
	$header = array(
		'siteTitle' => 'Featured Listings', 
		'pageTitle'	=> 'Featured Listings', 
		'keywords'	=> 'Featured Listings', 
		'desc'		=> 'Featured Listings', 
		'pageClass'	=> 'map-fullscreen', //page-subpage
		'hmcurrent'	=> '',
		'breadcrumb'=> array('url' => '', 'text' => 'Featured Listings')
	);
	
	/*print_r($header);
	exit;*/
	
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<!--Listing Grid-->
    <section class="block equal-height" style="padding-top:0px !important;">
    <div class="row">
        <?
            $sql = '
                SELECT bl.* 
				FROM businesslistings AS bl 
				WHERE 
				bl.listingID IN (
					SELECT CAST(ua.uaDetails AS UNSIGNED) 
					FROM user_advertisements AS ua 
					WHERE ua.atID = 6 
					AND ua.status = "A" 
					AND ua.expiryOn >= "'.date('Y-m-d').'" 
				) 
				AND bl.expiryOn >= "'.date('Y-m-d').'" 
				AND bl.status = "A" 
            ';
            //echo $sql;
            $res	= mysql_query($sql);
        ?>
        <? if(mysql_num_rows($res) > 0): ?>
			<? while($row = mysql_fetch_object($res)): ?>
                <?
                    $businessName	= stripslashes($row->businessName);
                    $seoUrl			= stripslashes($row->seoUrl);
                    $seoKeywords	= stripslashes($row->seoKeywords);
                    
                    if($row->imgPath != ''){
                        $logo = stripslashes($row->imgPath);
                    }else { 
                        $logo = stripslashes($settings[4]);
                    }
                    //echo $logo;
                    if(strpos($logo, "http") === false){
                        $logo = 'http://'.$domain.'/'.$logo;
                    }
                    $CatHref = $seoUrl.".html";
					
					if($row->offer != ''){
						$offerLabel = '<div class="ribbon-wrapper"><div class="ribbon-green"></div></div>';
					}else {
						$offerLabel = '';
					}
                ?>
                <div class="col-md-3 col-sm-4">
                	<?=$offerLabel?>
                    <div class="item ">
                        <div class="image">
                            
                            <a href="<?=$CatHref?>">
                                <img src="/thumb/263-196-<?=$logo?>" alt="<?=$seoKeywords?>">
                            </a>
                        </div>
                        <div class="wrapper">
                            <a href="<?=$CatHref?>"><h3><?=$businessName?></h3></a>
                        </div>
                    </div>
                </div>
            <? endwhile;?>
        <? endif;?>
    </div>
    <!--/.row-->
    </section>
    <!--end Listing Grid-->
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>