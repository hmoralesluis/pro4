<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	
	if(isset($_REQUEST['catSeoUrl'])){ $catSeoUrl = trim($_REQUEST['catSeoUrl']); }else { $catSeoUrl = ''; }
	if(isset($_REQUEST['subCatSeoUrl'])){ $subCatSeoUrl = trim($_REQUEST['subCatSeoUrl']); }else { $subCatSeoUrl = ''; }
	
	$isError = true;
	if($catSeoUrl != '' && $subCatSeoUrl == ''){
		$catSql = '
			SELECT catID, catName, catDesc, catSeoTitle, catSeoKeywords, catSeoDesc FROM category 
			WHERE parentID = 0 
			AND catSeoUrl = "'.mysql_real_escape_string($catSeoUrl).'"
		';
		$catRes = mysql_query($catSql);
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			$siteTitle	= stripslashes($catRow->catSeoTitle);
			$pageTitle	= stripslashes($catRow->catName);
			$seoKeyword = stripslashes($catRow->catSeoKeywords);
			$seoDesc	= stripslashes($catRow->catSeoDesc);
			$hmcurrent	= $hmCatArr[$catSeoUrl]['count'];
			$breadcrumb = array(
				array('url' => '', 'text' => $pageTitle)
			);
			
			$includeFile = 'php-includes/category.php';
			$isError = false;
		}
	}else if($catSeoUrl != '' && $subCatSeoUrl != ''){
		$catSql = '
			SELECT sc.catID, 
			sc.catName AS subCatName, 
			sc.catDesc AS subCatDesc, 
			sc.catSeoTitle AS subCatSeoTitle, 
			sc.catSeoKeywords AS subCatSeoKeywords, 
			sc.catSeoDesc AS subCatSeoDesc, 
			c.catName, c.catSeoUrl 
			FROM category AS sc 
			LEFT JOIN category AS c ON c.catID = sc.parentID 
			WHERE sc.parentID > 0 
			AND sc.catSeoUrl = "'.mysql_real_escape_string($subCatSeoUrl).'"
		';
		
		$catRes = mysql_query($catSql);
		
		if(mysql_num_rows($catRes) > 0){
			$catRow = mysql_fetch_object($catRes);
			
			$siteTitle	= stripslashes($catRow->subCatSeoTitle);
			$pageTitle	= stripslashes($catRow->subCatName);
			$seoKeyword = stripslashes($catRow->subCatSeoKeywords);
			$seoDesc	= stripslashes($catRow->subCatSeoDesc);
			$hmcurrent	= $hmCatArr[$catSeoUrl]['count'];
			$breadcrumb = array(
				array('url' => '/'.stripslashes($catRow->catSeoUrl).'/index.html', 'text' => stripslashes($catRow->catName)), 
				array('url' => '', 'text' => $pageTitle)
			);
			$includeFile = 'php-includes/sub-category.php';
			$isError = false;
		}
	}
	
	if($isError) {
		$siteTitle	= '404 ERROR!';
		$pageTitle	= '404 ERROR!';
		$seoKeyword = '';
		$seoDesc	= '';
		$hmcurrent	= '';
		$breadcrumb = array(
			array('url' => '', 'text' => 'Business Listing')
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
	
	$openSearch = true;
?>
<? require_once('includes/site-header.php'); ?>
<!--Page Content Start -->
	<? require_once($includeFile); ?>
<!--Page Content End -->
<? require_once('includes/site-footer.php'); ?>