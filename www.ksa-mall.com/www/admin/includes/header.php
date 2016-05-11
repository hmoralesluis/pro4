<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?=$header['siteTitle']?> | Qatarimall Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="<?=$adminBaseUrl?>css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="<?=$adminBaseUrl?>css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="<?=$adminBaseUrl?>css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="<?=$adminBaseUrl?>css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- iCheck for checkboxes and radio inputs -->
        <link href="<?=$adminBaseUrl?>css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <!-- Bootstrap Color Picker -->
        <link href="<?=$adminBaseUrl?>css/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet"/>
        <!-- Bootstrap time Picker -->
        <link href="<?=$adminBaseUrl?>css/timepicker/bootstrap-timepicker.min.css" rel="stylesheet"/>
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="<?=$adminBaseUrl?>css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        
        <!-- fullCalendar -->
        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.0.2/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
        
        <!-- DATA TABLES -->
        <link href="<?=$adminBaseUrl?>css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        
        <!-- Theme style -->
        <link href="<?=$adminBaseUrl?>css/AdminLTE.css?v=1.1" rel="stylesheet" type="text/css" />
        
        <link href="<?=$adminBaseUrl?>css/lightbox.css?v=1.1" rel="stylesheet" />
        
        <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        
        <style type="text/css">
			.modal form .icheckbox_minimal, .iradio_minimal {
				top: -3px !important;
			}
		</style>
        <style type="text/css">
			.sMsg {margin-bottom:15px;}
			.sMsg span, #sMsg span {display:block; padding:3px 8px;}
			
			.submenu li a .text {margin-left:10px;}
			
			.popupWrapper {position:relative; width:100%; height:100%; top:0px; left:0px; background-color:rgba(0, 0, 0, .3); display:none; z-index:2000; margin-bottom:20px; }
			.popupWrapper .popupWindow {width:100%; height:94%; padding:0px; position:relative; margin:0 auto;}
			.popupWrapper .popupWindow .inner {background-color:#FFF;}
			
			.popupWrapper .popupWindow .titleBar {
				/*height:30px;
				margin:0 auto;
				background-color:#333;
				color:#FFF;*/
				-webkit-border-top-left-radius: 3px;
				-webkit-border-top-right-radius: 3px;
				-webkit-border-bottom-right-radius: 0;
				-webkit-border-bottom-left-radius: 0;
				-moz-border-radius-topleft: 3px;
				-moz-border-radius-topright: 3px;
				-moz-border-radius-bottomright: 0;
				-moz-border-radius-bottomleft: 0;
				border-top-left-radius: 3px;
				border-top-right-radius: 3px;
				border-bottom-right-radius: 0;
				border-bottom-left-radius: 0;
				border-bottom: 0px solid #f4f4f4;
				color: #444;
				border-top:2px solid #3c8dbc;
				background:#3c8dbc;
				color:#fff;
				border-bottom:1px solid #f4f4f4;
			}
			.popupWrapper .popupWindow .closeButton {display:block; margin-top:-43px; float:right; color:#FFF; width:30px; height:42px; line-height:42px; text-align:center;}
			.popupWrapper .popupWindow .titleBar span {display:block; height:40px; line-height:30px; padding:5px 15px;}
			.form-control {margin-bottom:10px;}
			
			.red {color:#F00;}
			.green {color:#090}
			.formFieldError {border:solid 1px #F00;}
			.formFieldSuccess {border:solid 1px #090;}
			.browseFile {margin-bottom:10px;}
			.sLeft {display:table-cell; width:70px; height:34px;}
			.sRight {display:table-cell; width:35px; height:34px; vertical-align:middle; padding-left:5px; text-align:right;}
			.sRight .progress {margin:0px;}
			.sortThis {text-align:center; margin:0px;}
			.table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {vertical-align:middle;}
			.pagination {margin:0px !important; width:100%;}
			.pagination .l {width:25%; text-align:left; display:inline-block; }
			.pagination .r {width:75%; text-align:right; display:inline-block; }
			.pagination .btn {margin-left:5px;}
			
			.mapCanvas {width: 100%; height: 200px; border: 8px solid #FFF; background-color: rgb(229, 227, 223); -webkit-box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.44); -moz-box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.44); box-shadow: 0px 0px 5px rgba(50, 50, 50, 0.44); margin-top:10px; }
			.mapCanvas:after{content: "Please Type your Location Above..."; font-weight:300; padding-top: 80px; display: block; text-align: center; font-size: 2em; color: #999;}
			.gmnoprint img { max-width: none !important; }
			.pac-container {z-index:2001 !important;}
			.hide {display:none;}
			
			::-webkit-scrollbar {width: 7px; height: 7px;}
			::-webkit-scrollbar-thumb {background-color: rgba(50,50,50,.3);}
			::-webkit-scrollbar-track {background-color: rgba(50,50,50,.2);}
			
			.bootbox .modal-header {background-color: #f56954 !important; color:#fff !important; border-radius:5px 5px 0px 0px;}
			#external-events .external-event {padding:3px 5px; cursor:pointer; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; margin-bottom:1px;}
			.popupWrapper .select2-container {display:block !important; margin-bottom:10px !important;}
			.select2-container {z-index:2003 !important;}
			.modal {z-index:2005 !important;}
			.tAlignL {text-align:left;}
			.tAlignC {text-align:center;}
			.tAlignR {text-align:right;}
			.browserFileThumb {min-width:150px !important; max-width:350px !important; display:block; }
			.browserFileThumb img {max-width:350px !important;}
			
			td .form-control{margin-bottom:0px;}
			
			.payBtnUrls a {display:inline-block; margin-right:10px;}
		</style>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?=$adminBaseUrl?>" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Admin
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>Admin <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?=$settings[5]?>" class="img-circle" alt="User Image" />
                                    <p>Admin</p>
                                </li>
                                <!-- Menu Body -->
                                
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="http://www.dynamicdezyne.com/" target="_blank" class="btn btn-default btn-flat" title="Developed by DDI">Developed by DDI</a> 
                                    </div>
                                    <div class="pull-right">
                                        <a href="../" target="_blank" class="btn btn-default btn-flat" title="View Website">View Website</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=$settings[5]?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Admin</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                    	<?
							if($header['cMenuCat'] == 'dashboard'){
								$active = ' class="active"';
							}else {
								$active = '';
							} 
						?>
                        <li<?=$active?>>
                            <a href="<?=$adminBaseUrl?>index.php">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        
                        <?
							$menuCatSql = '
								SELECT * FROM admin_menucat ORDER BY sOrder ASC 
							';
							//echo $menuCatSql;
							
							$menuCatRes = mysql_query($menuCatSql);
						?>
                        <? if(mysql_num_rows($menuCatRes) > 0): ?>
                        <? while($menuCatRow = mysql_fetch_object($menuCatRes)): ?>
                        <? $mcName = str_replace(' ', '-', strtolower(stripslashes($menuCatRow->menuCatName))); ?>
                        <?
							if($header['cMenuCat'] == $mcName){
								$active = ' active';
							}else {
								$active = '';
							} 
						?>
                        <li class="treeview<?=$active?>">
                            <a href="javascript:void(0)">
                                <i class="<?=stripslashes($menuCatRow->iconName)?>"></i> <span><?=stripslashes($menuCatRow->menuCatName)?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                            	<?
									$menuSql = 'SELECT * FROM admin_menu WHERE menuCatID = '.$menuCatRow->menuCatID.' ORDER BY sOrder ASC';
									//echo $menuSql;
									
									$menuRes = mysql_query($menuSql);
								?>
                                <? if(mysql_num_rows($menuRes) > 0): ?>
                                <? while($menuRow = mysql_fetch_object($menuRes)): ?>
									<?
                                        $mName = str_replace(' ', '-', stripslashes($menuRow->fileName));
                                        if($header['cMenu'] == $mName){ $active = ' class="active"';}else { $active = ''; }
                                    ?>
                                    <li<?=$active?>>
                                    <a href="<?=$adminBaseUrl?><?=stripslashes($menuRow->fileName)?>.php" title="<?=stripslashes($menuRow->pageName)?>">
                                    <i class="fa fa-angle-double-right"></i> <?=stripslashes($menuRow->pageName)?>
                                    </a>
                                    </li>
                                <? endwhile; ?>
                                <? endif; ?>
                            </ul>
                        </li>
                        <? endwhile; ?>
                        <? endif; ?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1><?=$header['siteTitle']?></h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=$adminBaseUrl?>index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <? foreach($header['breadcrumb'] as $key => $arr): ?>
							<? if($arr['url'] != ''): ?>
                        		<li><a href="<?=$adminBaseUrl?><?=$arr['url']?>"><?=$arr['text']?></a></li>
                            <? else: ?>
                        		<li><?=$arr['text']?></li>
                            <? endif; ?>
                        <? endforeach; ?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">