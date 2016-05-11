<?
	require_once('../../includes/db_con.php');
	require_once('../../includes/general_functions.php');
	require_once('../../includes/db_functions.php');
?>
<!DOCTYPE html>
<html>

<body>

<ul>
	<li><a href="javascript:void(0)">Home</a></li>
    <li><a href="javascript:void(0)">Lebanon</a></li>
    <?
    	$hmCatRes = mysql_query('
			SELECT c.catID, c.catName, c.catSeoUrl 
			FROM category AS c
			WHERE c.parentID = 0 ORDER BY c.sOrder ASC
		');
	?>
    <? if(mysql_num_rows($hmCatRes) > 0): ?>
    <? while($hmCatRow = mysql_fetch_object($hmCatRes)): ?>
    	<?
			$hmCatID	= $hmCatRow->catID;
			$hmCatName	= stripslashes($hmCatRow->catName);
			$hmCatSeoUrl= stripslashes($hmCatRow->catSeoUrl);
		?>
        <li><a href="<?='http://'.$hmCatSeoUrl.'.'.$domain?>" title="<?=$hmCatName?>"><?=$hmCatName?></a></li>
    <? endwhile; ?>
    <? endif; ?>
</ul>

<!--[if lte IE 9]>
<script type="text/javascript" src="new/assets/js/ie-scripts.js"></script>
<![endif]-->
</body>

</html>