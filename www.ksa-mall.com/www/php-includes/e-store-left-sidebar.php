<!--Category-->
<section>
    <figure id="p-category-menu">
        <div class="panel-group" id="accordion">
            <?
                $menuPcRes = mysql_query('
                    SELECT pc.pCatID, pc.pCatName, 
                    (
                        SELECT GROUP_CONCAT(sc.pCatID, "|", sc.pCatName, "|", sc.catSeoUrl) 
                        FROM product_cat AS sc 
                        WHERE sc.parentID = pc.pCatID 
                    ) AS subCats 
                    FROM product_cat AS pc 
                    WHERE pc.parentID = 0 ORDER BY pc.sOrder ASC 
                ');
            ?>
            <? if(mysql_num_rows($menuPcRes) > 0): ?>
            <? while($mpcRow = mysql_fetch_object($menuPcRes)): ?>
            <?
                $pcatID		= $mpcRow->pCatID;
                $pCatName	= stripslashes($mpcRow->pCatName);
                $subCats	= explode(',', stripslashes($mpcRow->subCats));
                
                if(isset($pcRow) && $pcRow->parentID == $pcatID){
                    $in = ' in';
                }else {
                    $in = '';
                }
                
                $scLinks = '';
                foreach($subCats as $key => $val){
                    $scArr = explode('|', $val);
                    $scID	= $scArr[0];
                    $scName	= $scArr[1];
                    $scHref	= '/e-store/'.$scArr[2].'/index.html';
                    
                    if(isset($pcRow) && $pcRow->pCatID == $scID){
                        $scCurrent = ' class="current"';
                    }else {
                        $scCurrent = '';
                    }
                    
                    $scLinks .= '<a href="'.$scHref.'" title="'.$scName.'"'.$scCurrent.'>'.$scName.'</a>';
                }
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#category-<?=$pcatID?>"><?=$pCatName?></a>
                    </h4>
                </div>
                <div id="category-<?=$pcatID?>" class="panel-collapse collapse<?=$in?>">
                    <div class="panel-body">
                        <?=$scLinks?>
                    </div>
                </div>
            </div>
            <? endwhile; ?>
            <? endif; ?>
        </div>
    </figure>
</section>

<? if(isset($visited)): ?>
<section>
    <figure>
        <div class="row">
            <div class="col-md-4" style="height:55px;line-height:55px;">
                <?=$visited?> views
            </div>
            <div class="col-md-4" style="height:55px;line-height:55px;">
                
            </div>
        </div>
    </figure>
</section>
<? endif; ?>

<? if(isset($tagArr) && count($tagArr) > 0): ?>
<section>
    <header><h3>Tags</h3></header>
    <figure id="tags">
        <? foreach($tagArr as $key => $value):?>
        <a href="#<?=$value?>" class="btn" title="<?=$value?>"><?=$value?></a>
        <? endforeach;?>
    </figure>
</section>
<? endif; ?>

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

<section class="sidebar-link-menu">
    <figure>
        <div class="row">
            <div class="col-md-12">
            	<? if(isset($espageRow) && $espageRow->seoUrl == 'e-store-faq'){$active = ' btn-default';}else{$active = '';} ?>
                <a href="/e-store/page/e-store-faq.html" title="FAQ" class="btn<?=$active?>">FAQ</a>
                
				<? if(isset($espageRow) && $espageRow->seoUrl == 'delivery-prices'){$active = ' btn-default';}else{$active = '';} ?>
                <a href="/e-store/page/delivery-prices.html" title="Delivery Prices" class="btn<?=$active?>">Delivery Prices</a>
                
				<? if(isset($espageRow) && $espageRow->seoUrl == 'payment-options'){$active = ' btn-default';}else{$active = '';} ?>
                <a href="/e-store/page/payment-options.html" title="Payment Options" class="btn<?=$active?>">Payment Options</a>
            </div>
        </div>
    </figure>
</section>