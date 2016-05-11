<!--<figure class="filter clearfix">
<div class="buttons pull-left">
    <a href="javascript:void(0)" class="btn icon active"><i class="fa fa-th"></i>Grid</a>
</div>
<div class="pull-right">
    <aside class="sorting">
        <span>Sorting</span>
        <div class="form-group">
            <select class="framed" name="sort">
                <option value="">Date - Newest First</option>
                <option value="1">Date - Oldest First</option>
                <option value="2">Price - Highest First</option>
                <option value="3">Price - Lowest First</option>
            </select>
        </div>
    </aside>
</div>
</figure> -->

<!--Listing Grid-->
<section class="block equal-height" style="padding-top:0px !important;">
<div class="row">
	<? 
		$catID		 = $catRow->catID;
		$sql = '
			SELECT * FROM businesslistings  WHERE status = "A" 
			AND expiryOn >= "'.date('Y-m-d').'"
			AND (subCatIDs = "'.$catID.'" OR FIND_IN_SET('.$catID.', subCatIDs)) 
			ORDER BY sOrder ASC 
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
			$CatHref		= $seoUrl.".html";
			
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
	<div class="col-md-12 col-sm-12">	<!-- Add Description by kavitha on 12-06-2015 -->	
		<header><h3>Description</h3></header>
		<?=stripslashes($catRow->subCatDesc)?>
	</div>
    <? endif;?>
</div>
<!--/.row-->
</section>
<!--end Listing Grid-->
<?php /*?><!--Pagination-->
<nav>
<ul class="pagination pull-right">
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#" class="previous"><i class="fa fa-angle-left"></i></a></li>
    <li><a href="#" class="next"><i class="fa fa-angle-right"></i></a></li>
</ul>
</nav>
<!--end Pagination--><?php */?>