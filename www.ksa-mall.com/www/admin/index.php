<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	#Breadcrumb Array Sample: array('url' => '', 'text' => 'Manage Chanels')
	$header = array(
		'siteTitle' => 'Welcome', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'dashboard',
		'cMenu'		=> '', 
		'breadcrumb'=> array(
			
		)
	);
	
	$isMapPage = true;
?>
<? require_once('includes/header.php'); ?>
    <div class="row">
    	<section class="col-lg-12">
        	<div class="box box-solid bg-light-blue-gradient">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        
                    </div><!-- /. tools -->
    
                    <i class="fa fa-map-marker"></i>
                    <h3 class="box-title">
                        Mall Admin
                    </h3>
                </div>
                
            </div>
        </section>
    </div><!-- /.row -->
<? require_once('includes/footer.php'); ?>