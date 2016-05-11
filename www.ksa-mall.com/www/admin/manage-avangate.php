<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
        require_once('../api/avangate.php');
	
	$_SESSION['imgManagerFilePath'] = '../../../images/userfiles/';
	$_SESSION['imgManagerFileSelectPath'] = '/images/userfiles/';
	$_SESSION['imgManageruploadMaxSize'] = '30M';
	
        $avangate_settings_query = mysql_query("SELECT * FROM `avangate`");
        $avangate_settings = mysql_fetch_assoc($avangate_settings_query);
        
        if(isset($_POST['save_settings'])){
            $merchant_id = trim($_POST['merchant_id']);
            $merchant_secret = trim($_POST['merchant_secret']);
            
            $update_query = "UPDATE `avangate` 
                SET merchant_id = '" . mysql_real_escape_string($merchant_id) . "',
                merchant_secret = '" . mysql_real_escape_string($merchant_secret) . "'";
            
            if(mysql_query($update_query)){
                $msg = '<span class="bg-green tip">Settins Updated Successfully.</span>';
                
                $avangate_settings_query = mysql_query("SELECT * FROM `avangate`");
                $avangate_settings = mysql_fetch_assoc($avangate_settings_query);
            }else{
                $msg = '<span class="bg-red tip">Error on Settings Update, Please Contact Support.</span>';
            }
        }
        
        if(isset($_POST['save_price'])){            
            foreach ($_POST as $k => $v) {
                if(strpos($k, 'price_') !== false){
                    list($t, $product_id) = explode("_", $k);
                    $avangate = new Avangate($avangate_settings['merchant_id'], $avangate_settings['merchant_secret']);
                    $avangate->update_product($product_id, $v);
                }
            }
            $msg = '<span class="bg-green tip">Products Updated Successfully.</span>';
        }
        
	$header = array(
		'siteTitle' => 'Manage Avangate', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'avangate',
		'cMenu'		=> 'manage-avangate', 
		'breadcrumb'=> array(
			array('url' => '', 'text' => 'Manage Settings')
		)
	);
	
	$countries = array();
	$countryRes = mysql_query('SELECT countryID, countryName FROM countries ORDER BY countryName ASC');
	if(mysql_num_rows($countryRes) > 0){
		while($countryRow = mysql_fetch_object($countryRes)){
			$countries[] = $countryRow;
		}
	}
?>

<? require_once('includes/header.php'); ?>    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg" ><?php echo isset($msg) ? $msg : ''; ?></h5>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <form method="post">
                        <div class="table-responsive">
                            <table class="table table-striped" id="settingTable">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th width="150">Setting Name</th>
                                    <th class="hidden-sm hidden-md">Value</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Merchant ID</td>
                                        <td><input type="text" name="merchant_id" value="<?php echo $avangate_settings['merchant_id']; ?>" class="form-control" style="max-width: 200px;"/></td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>Merchant Secret</td>
                                        <td><input type="text" name="merchant_secret" value="<?php echo $avangate_settings['merchant_secret']; ?>" class="form-control" style="max-width: 200px;"/></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="pull-left">
                                <input type="submit" name="save_settings" value="Save" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                    
                    <div class="pull-left" style="margin-top:40px;">
                        <h3>Products</h3>
                        <?php
                        $avangate = new Avangate($avangate_settings['merchant_id'], $avangate_settings['merchant_secret']);
                        $login = $avangate->login();
                        if($login['status'] == 'error'){ ?>
                            <h5 id="sMsg" ><span class="bg-red tip">Avangate Error: <?php echo $login['msg'] ?></span></h5>
                        <?php }else{
                            $avangate->set_currency("USD");
                            
                            $products = $avangate->get_all_products();
                            
                            echo '<pre>';
                            print_r($products);
                            echo '</pre>';
                            
                            if($products['status'] == 'success'){ ?>
                            <form method="post">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="settingTable">
                                        <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th width="250">Product Name</th>
                                            <th class="hidden-sm hidden-md">Price</th>
                                            <th>Currency</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                <?php $i = 1; foreach ($products['response']->result as $single) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $single->ProductName; ?></td>
                                                <td><input type="text" name="price_<?php echo $single->ProductId; ?>" value="<?php echo $single->Price; ?>" class="form-control" style="max-width: 100px;"/></td>
                                                <td><?php echo $single->Currency; ?></td>
                                            </tr>
                                <?php $i++; } ?>
                                </tbody>
                                    </table>
                                </div>
                                <div class="pull-left">
                                    <input type="submit" name="save_price" value="Save" class="btn btn-primary" />
                                </div>
                            </form>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    
                </div>
            </div>
        </div>
    </div>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>