<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	$header = array(
		'siteTitle' => 'Offers of the Week', 
		'pageTitle'	=> 'Offers of the Week', 
		'keywords'	=> 'Offers of the Week', 
		'desc'		=> 'Offers of the Week', 
		'pageClass'	=> '', //page-subpage
		'hmcurrent'	=> '',
		'breadcrumb'=> array(
		
		)
	);
	
	$mainSlider = true;
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
<?
	$offerRes = mysql_query('
		SELECT bl.* 
		FROM businesslistings AS bl 
		WHERE bl.offer != "" 
		AND bl.expiryOn >= "'.date('Y-m-d').'" AND bl.status = "A" 
		ORDER BY bl.featuredExpiry ASC 
	'); 
?>
<? if($offerRes && mysql_num_rows($offerRes) > 0): ?>
	<section id="price-drop" class="block equal-height" style="padding:0px 0px 40px 0px;">
		
		<div class="row">
			<? while($offerRow = mysql_fetch_object($offerRes)): ?>
				<?
					$businessName = ucwords(strtolower(stripslashes($offerRow->businessName)));
					
					$offer = stripslashes($offerRow->offer);
					
					//preg_match_all('/<img[^>]+>/i', $offer, $imgTagsArr); 
					
					#Get Offer Image Start
					$offerImg = '';
					
					$doc = new DOMDocument();
					@$doc->loadHTML($offer);
					
					$imgTagObj = $doc->getElementsByTagName('img');
					
					foreach($imgTagObj as $img) {
						$offerImg = $img->getAttribute('src');
						break;
					}
					#End
					
					$offer = preg_replace("/<img[^>]+\>/i", "", $offer); 
					$offer = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $offer);
					
					$offerUrl = '/offers/'.stripslashes($offerRow->seoUrl).'.html';
				?>
				<div class="col-sm-6 col-md-4">
					<div class="offer-col">
						<h1><?=$businessName?></h1>
						<?php /*?>
						<? if($offerRow->logo != ''): ?>
						<div class="offer-logo"><img alt="<?=$businessName?> Logo" src="<?=stripslashes($offerRow->logo)?>" height="50px" /></div>
						<? endif; ?>
						<?php */?>
						<? if($offerImg != ''): ?>
						<div class="offer-image" style="background-image:url('<?=$offerImg?>');"></div>
						<? endif; ?>
						
						<div class="offer-details"><?=$offer?></div>
						
						<a href="<?=$offerUrl?>" title="<?=$businessName?>">View Offer</a>
					</div>
				</div>
			<? endwhile; ?>
		</div>
	</section>
<? endif; ?>
<!--Page Content End -->
<? include('includes/site-footer.php'); ?>