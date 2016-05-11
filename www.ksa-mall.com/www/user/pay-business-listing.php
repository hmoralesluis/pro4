<?
	require_once('../includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
        require_once('../api/avangate.php');
	
	$userID	= $_SESSION['user']['userID'];
	$email	= $_SESSION['user']['email'];
	
        $avangate_settings_query = mysql_query("SELECT * FROM `avangate`");
        $avangate_settings = mysql_fetch_assoc($avangate_settings_query);
        
	$listingID = (int) $_REQUEST['listingID'];
	
	$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
        
	if(mysql_num_rows($listingRes) > 0){	
                $listingRow = mysql_fetch_object($listingRes);
                
		#Manipulate and Return the Sub Cats
		$catArr = array();
		$catRes = mysql_query('SELECT * FROM category WHERE parentID = 0 ORDER BY sOrder ASC');
		if(mysql_num_rows($catRes) > 0){
			while($catRow = mysql_fetch_object($catRes)){
				$catArr[$catRow->catID] = stripslashes($catRow->catName);
			}
		}
		
		$subCatIDs = explode(',', $listingRow->subCatIDs);
		$subCatIdsArr = array();
		foreach($subCatIDs as $key => $val){
			$subCatIdsArr[$val] = $val;
		}
		
		$ebusinessName	= stripslashes($listingRow->businessName);
		
		$header = array(
			'siteTitle' => 'Pay for '.$ebusinessName, 
			'cMenu'		=> 'dashboard', 
			'breadcrumb'=> array(
				array('url' => 'my-business-listings.php', 'text' => 'My Business Listings'), 
				array('url' => '', 'text' => 'Pay for "'.$ebusinessName.'"')
			)
		);
	}else {
		$header = array(
			'siteTitle' => 'ERROR!',  
			'cMenu'		=> 'dashboard', 
			'breadcrumb'=> array(
				array('url' => 'my-business-listings.php', 'text' => 'My Business Listings'), 
				array('url' => '', 'text' => 'ERROR!')
			)
		);
	}
?>

<? require_once('includes/header.php'); ?>
	<? if(isset($listingRow)): ?>
        <div class="row" id="editListing">
            <div class="col-md-12">
                <div class="box box-primary box-solid">
                	<div class="box-header ui-sortable-handle" style="cursor: move;">
                        <h3 class="box-title">Select period:</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <a href="my-business-listings.php" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i></a>
                        </div><!-- /. tools -->
                    </div>
                    
                    <div class="box-footer clearfix">
                        <?php
                        $avangate = new Avangate($avangate_settings['merchant_id'], $avangate_settings['merchant_secret']);
                        $login = $avangate->login();
                        if($login['status'] == 'error'){ ?>
                            <h5 id="sMsg" ><span class="bg-red tip">Avangate Error: <?php echo $login['msg'] ?></span></h5>
                        <?php }else{
                            $avangate->set_currency("USD");
                            
                            $products = $avangate->get_all_products();
                            if($products['status'] == 'success'){ ?>
                                <?php foreach ($products['response']->result as $single) { ?>
                            <div style="width: 100%; margin: 20px auto; text-align: center;">
                                <button 
                                    style="width: 280px;"
                                    class="btn btn-primary"
                                    onClick="window.location.href = 'https://secure.avangate.com/order/checkout.php?CART=1&CARD=2';"><?php echo $single->ProductName; ?> - <?php echo $single->Price; ?> <?php echo $single->Currency; ?></button>
                            </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <?
            $footerscript = '';
        ?>
    <? else: ?>
    	<? $footerscript = ''; ?>
    <? endif; ?>
<? //require_once('includes/footer.php'); ?>