<!--<figure class="filter clearfix">
<div class="buttons pull-left">
    <a href="javascript:void(0)" class="btn icon active"><i class="fa fa-th"></i>Grid</a>
</div>
<div class="pull-right">
    
</div>
</figure> -->

<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">
<div class="row">
	<?
		$sql = '
			SELECT c.*, 
			(
				SELECT COUNT(*) FROM businesslistings AS ls WHERE ls.status = "A" 
				AND ls.expiryOn >= "'.date('Y-m-d').'"
				AND FIND_IN_SET(c.catID, ls.subCatIDs) 
			) AS totalListings 
			FROM category AS c 
			WHERE c.parentID = '.$catRow->catID.' 
			ORDER BY c.sOrder ASC
		';
		//echo $sql;
		$res = mysql_query($sql);
		$listedItems = 0;
		
		/*
		echo '<pre>';
		print_r($_REQUEST);
		echo '</pre>';
		*/
	?>
    <? if(mysql_num_rows($res) > 0): ?>
    <? while($row = mysql_fetch_object($res)): ?>
		<? if($row->totalListings > 0): ?>
        <?
			$listedItems++;
			$subcatName		= stripslashes($row->catName);
			$subcatSeoUrl	= stripslashes($row->catSeoUrl);
			$catSeoKeywords	= stripslashes($row->catSeoKeywords);
			
			$subCatHref	= '/'.$catSeoUrl.'/'.$subcatSeoUrl.'/index.html';
			if($row->imgPath != ''){
				$subCatImgPath	= stripslashes($row->imgPath);
			}else{
				$subCatImgPath = stripslashes($settings[4]);
			}
			
			if(strpos($subCatImgPath, "http") === false){
				$subCatImgPath	= 'http://'.$domain.'/'.$subCatImgPath;
			}
			
		?>
        <div class="col-md-3 col-sm-4">
            <div class="item ">
                <div class="image">
                    <a href="<?=$subCatHref?>" title="<?=$subcatName?>">
                        <img src="/thumb/263-196-<?=$subCatImgPath?>" alt="<?=$catSeoKeywords?>">
                    </a>
                </div>
                <div class="wrapper">
                    <a href="<?=$subCatHref?>" title="<?=$subcatName?>"><h3 style="min-height:34px;"><?=$subcatName?></h3></a><br/><br />

                </div>
            </div>
        </div>
        <? endif; ?>
    <? endwhile; ?>
	<div class="col-md-12 col-sm-12">		<!-- Add Description by kavitha on 12-06-2015 -->	
		<header><h3>Description</h3></header>
                        <?=stripslashes($catRow->catDesc)?>
	</div>
    <? endif; ?>
    
    <? if($listedItems == 0): ?>
    <div class="col-md-12 col-sm-12">
    	<span class="red">No Records Found!</span>
    </div>
    <? endif; ?>
</div>
<!--/.row-->
</section>
<!--end Listing Grid-->