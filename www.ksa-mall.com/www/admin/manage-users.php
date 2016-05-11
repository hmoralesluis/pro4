<?
	require_once('../includes/db_con.php');
	require_once('../includes/general_functions.php');
	require_once('../includes/db_functions.php');
	
	if(isset($_REQUEST['a']) && $_REQUEST['a'] == 'downloadCsv'){
		function arrayToCsvDownload($array, $filename = "export.csv", $delimiter=";") {
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename="'.$filename.'";');
			
			$f = fopen('php://output', 'w');
			
			foreach($array as $line){
				fputcsv($f, $line, $delimiter);
			}
		}
		
		$csvUserRes = mysql_query('SELECT * FROM users ORDER BY fullName ASC');
		if($csvUserRes && mysql_num_rows($csvUserRes) > 0){
			$usersArr = array();
			
			$usersArr[] = array('User Name', 'Email');
			while($csvUserRow = mysql_fetch_object($csvUserRes)){
				$uArr = array(
					stripslashes($csvUserRow->fullname), 
					stripslashes($csvUserRow->email) 
				);
				
				$usersArr[] = $uArr;
			}
			
			arrayToCsvDownload($usersArr, 'user-records-'.date('dmy').'.csv', ',');
		}
		
		exit;
	}
	
	$header = array(
		'siteTitle' => 'Manage Users', 
		'loginName' => $_SESSION['admin']['name'], 
		'cMenuCat'	=> 'users-&-listings',
		'cMenu'		=> 'manage-users', 
		'breadcrumb'=> array(
			
		)
	);
	
	$formPostUrl = 'manage-users-post.php';
	
	$countries = array();
	$countryRes = mysql_query('SELECT countryID, countryName FROM countries ORDER BY countryName ASC');
	if(mysql_num_rows($countryRes) > 0){
		while($countryRow = mysql_fetch_object($countryRes)){
			$countries[] = $countryRow;
		}
	}
	
	$filterArr = array('fullname' => 'Full Name', 'username' => 'Username', 'email' => 'Email', 'countryName' => 'Country', 'telephone' => 'Telephone', 'mobile' => 'Mobile');
?>

<? require_once('includes/header.php'); ?>
	<!-- Modal -->
    <div class="popupWrapper" id="addUserWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Add User</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" data-numbering="userRow" data-column="1" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="addUser" />
                    <input type="hidden" name="fa" value="Add" data-tableid="userTable" />
                    
                    <label for="aemail">Email</label>
                    <input type="email" class="form-control" name="aemail" id="aemail" value="" required />
                    
                    <label for="apassword">Password *</label>
                    <input type="text" class="form-control" name="apassword" id="apassword" value="" required />
                    
                    <label for="afullname">Full Name *</label>
                    <input type="text" class="form-control" name="afullname" id="afullname" value="" required />
                    
                    <label for="aaddress">Address *</label>
                    <textarea class="form-control" name="aaddress" id="aaddress" required></textarea>
                    
                    <label for="acountryName">Country *</label>
                    <select class="form-control" name="acountryName" id="acountryName" required="required">
                        <option value="">Select a Country</option>
                        <? if(count($countries) > 0): ?>
                        <? foreach($countries as $key => $row): ?>
                        <option value="<?=stripslashes($row->countryName)?>"><?=stripslashes($row->countryName)?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="atelephone">Telephone (optional)</label>
                    <input type="text" class="form-control" name="atelephone" id="atelephone" value="" />
                    
                    <label for="amobile">Mobile (optional)</label>
                    <input type="text" class="form-control" name="amobile" id="amobile" value="" />
                    
                    <label for="aaboutme">About User (optional)</label>
                    <textarea class="form-control" name="aaboutme" id="aaboutme"></textarea>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Add User" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="popupWrapper" id="editUserWindow">
        <div class="popupWindow">
            <div class="titleBar"><span>Edit User</span></div>
            <a href="javascript:void(0)" class="closeButton" title="Close Window"><i class="fa fa-close"></i></a>
            <div class="inner">
                <div style="padding:15px;">
                <form action="<?=$formPostUrl?>" method="post" class="afs">
                    <div class="sMsg"></div>
                    <input type="hidden" name="a" value="saveUser" />
                    <input type="hidden" name="fa" value="Edit" />
                    <input type="hidden" name="userID" id="userID" />
                    
                    <label for="eemail">Email</label>
                    <input type="email" class="form-control" name="eemail" id="eemail" value="" required />
                    
                    <label for="epassword">Password *</label>
                    <input type="text" class="form-control" name="epassword" id="epassword" value="" required />
                    
                    <label for="efullname">Full Name *</label>
                    <input type="text" class="form-control" name="efullname" id="efullname" value="" required />
                    
                    <label for="eaddress">Address *</label>
                    <textarea class="form-control" name="eaddress" id="eaddress" required></textarea>
                    
                    <label for="ecountryName">Country *</label>
                    <select class="form-control" name="ecountryName" id="ecountryName" required="required">
                        <option value="">Select a Country</option>
                        <? if(count($countries) > 0): ?>
                        <? foreach($countries as $key => $row): ?>
                        <option value="<?=stripslashes($row->countryName)?>"><?=stripslashes($row->countryName)?></option>
                        <? endforeach; ?>
                        <? endif; ?>
                    </select>
                    
                    <label for="etelephone">Telephone (optional)</label>
                    <input type="text" class="form-control" name="etelephone" id="etelephone" value="" />
                    
                    <label for="emobile">Mobile (optional)</label>
                    <input type="text" class="form-control" name="emobile" id="emobile" value="" />
                    
                    <label for="eaboutme">About User (optional)</label>
                    <textarea class="form-control" name="eaboutme" id="eaboutme"></textarea>
                    
                    <label for="estatus">Status *</label>
                    <select class="form-control" name="estatus" id="estatus" required="required">
                        <option value="P">Pending</option>
                        <option value="A">Active</option>
                        <option value="D">inactive</option>
                    </select>
                    
                    <input type="submit" name="submitBtn" class="btn btn-info" value="Save User" />
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5 id="sMsg">Search</h5>
                        </div>
                        <div class="pull-right">
                            
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                	<?
						if(isset($_REQUEST['filter'])){
							$filter		= trim($_REQUEST['filter']);
							$value		= trim($_REQUEST['value']);
							$status		= trim($_REQUEST['status']);
						}else {
							$filter		= '';
							$value		= '';
							$status		= '';
						}
					?>
                    <form action="manage-users.php" method="get">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="col-lg-4">
                                    <select class="form-control" name="filter" id="filter">
                                        <option value="">Select a Filter</option>
                                        <? if(count($filterArr) > 0): ?>
                                        <? foreach($filterArr as $key => $filterText): ?>
                                            <? if(isset($filter) && $filter == $key): ?>
                                                <option value="<?=$key?>" selected="selected"><?=$filterText?></option>
                                            <? else: ?>
                                                <option value="<?=$key?>"><?=$filterText?></option>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="value" id="value" class="form-control" placeholder="Enter Search Term" value="<?=$value?>" />
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="col-lg-3" style="line-height:34px;">Status</div>
                                <div class="col-lg-9">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">All Status</option>
                                        <? if(count($statusArr) > 0): ?>
                                        <? foreach($statusArr as $key => $statusText): ?>
                                            <? if(isset($status) && $status == $key): ?>
                                                <option value="<?=$key?>" selected="selected"><?=strip_tags($statusText)?></option>
                                            <? else: ?>
                                                <option value="<?=$key?>"><?=strip_tags($statusText)?></option>
                                            <? endif; ?>
                                        <? endforeach; ?>
                                        <? endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="col-lg-12">
                                    <input type="submit" name="submitBtn" class="btn btn-primary" value="Filter Result" />
                                    <a href="manage-users.php" class="btn btn btn-danger" title="Reset Filters">Reset Filter</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="clearfix" style="padding-bottom:15px;"></div>
            </div>
            
            <div class="box">
                <div class="box-header">
                    <div class="box-title clearfix" style="float:none; display:block;">
                        <div class="pull-left">
                            <h5></h5>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-info addPopup" data-w="addUserWindow">Add New User</button>
                            <a href="manage-users.php?a=downloadCsv" class="btn btn-success" title="Download CSV" style="color:#fff;" target="_blank">Download CSV</a>
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body no-padding" style="padding-top:0px;">
                    <div class="table-responsive">
                        <form action="<?=$formPostUrl?>" method="post" data-numbering="userRow" data-column="1" class="multipleRowAction" data-check="check">
                        <input type="hidden" name="a" value="deleteSelectedUsers" />
                        <table class="table table-striped" id="userTable">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Email/ Name</th>
                                <th>Password</th>
                                <th>Country</th>
                                <th>Telephone/Mobile</th>
                                <th>Status</th>
                                <th width="120">Registered</th>
                                <th width="120">Login</th>
                                <th style="width: 100px">Actions</th>
                                <th style="width: 50px">
                                <label><input type="checkbox" class="checkUncheck" data-class="check" /></label>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
								$sql = 'SELECT u.* FROM users AS u WHERE 1 = 1 ';
								
								if($filter != '' && $value != ''){
									$sql .= 'AND `u`.`'.mysql_real_escape_string($filter).'` LIKE "%'.mysql_real_escape_string($value).'%" ';
								}
								
								if($status != '' && ($status == 'A' || $status == 'D')){
									$sql .= 'AND `u`.`status` = "'.mysql_real_escape_string($status).'" ';
								}
								
								$sql .= 'ORDER BY u.userID DESC ';
								
								//echo $sql;
								
								$totalRows = mysql_num_rows(mysql_query($sql));
								$limit = 20;
								
								if(isset($_REQUEST['pageNo']) && $_REQUEST['pageNo'] > 0){
									$offset = ($_REQUEST['pageNo'] - 1);
								}else {
									$offset = 0;
								}
								
								$sql .= ' LIMIT '.$limit.' OFFSET '.($offset*$limit);
								
								$res = mysql_query($sql);
								$sNo = 1;
							?>
                            <? if(mysql_num_rows($res) > 0): ?>
                            <? while($row = mysql_fetch_object($res)): ?>
                            <? $userID = $row->userID; ?>
                            <tr class="userRow" id="userRow_<?=$userID?>">
                                <td><?=$sNo?></td>
                                <td id="td_fN_<?=$userID?>">
								<?=stripslashes($row->email)?><br /><strong><?=stripslashes($row->fullname)?></strong>
                                <? if($row->isNewsletterSignup == 'Y'): ?>
                                	<i class="fa fa-envelope-o"></i>
                                <? endif; ?>
                                </td>
                                <td id="td_pW_<?=$userID?>"><?=decrypt(stripslashes($row->password))?></td>
                                <td id="td_uC_<?=$userID?>"><?=stripslashes($row->countryName)?></td>
                                <td id="td_TM_<?=$userID?>">
								<?
									if($row->telephone != '' && $row->mobile != ''){
										echo stripslashes($row->telephone.'/ '.$row->mobile);
									}else if($row->telephone != ''){
										echo stripslashes($row->telephone);
									}else if($row->mobile != ''){
										echo stripslashes($row->mobile);
									}
								?>
                                </td>
                                <td id="td_uS_<?=$userID?>"><?=$statusArr[stripslashes($row->status)]?></td>
                                <td width="120">
                                	<? if($row->registeredIP != ''): ?>
									<?=stripslashes($row->registeredIP).'<br />'?>
                                    <? endif; ?>
                                    
									<?=date('d-m-Y H:i', strtotime($row->createdOn))?>
                                </td>
                                <td width="120">
								<? if($row->lastLoginIP != ''): ?>
								<?=stripslashes($row->lastLoginIP).'<br />'?>
                                <? endif; ?>
                                
                                <? if($row->lastLoggedIn != ''): ?>
                                <?=date('d-m-Y H:i', strtotime($row->lastLoggedIn))?>
                                <? endif; ?>
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-primary editBtn" data-id="<?=$userID?>" data-a="getUser" data-u="<?=$formPostUrl?>" data-w="editUserWindow">
                                <i class="glyphicon glyphicon-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger deleteIcon" data-placement="top" data-original-title="Delete" data-id="<?=$userID?>" data-a="delUser" data-u="<?=$formPostUrl?>" data-at="User" data-numbering="userRow" data-column="1" >
                                <i class="glyphicon glyphicon-trash"></i>
                                </button>
                                </td>
                                <td>
								<label><input type="checkbox" class="check" name="users[]" value="<?=$userID?>" /></label>
                                </td>
                            </tr>
                            <? $sNo++; ?>
                            <? endwhile; ?>
                            <? else: ?>
                            <tr class="errorRow">
                                <td colspan="10" align="center"><span class="text-red">No Records Found</span></td>
                            </tr>
                            <? endif; ?>
                            <tr>
                                <td colspan="10" align="right">
                                	<button type="submit" class="btn btn-sm btn-danger">
                                    Delete All
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                	<div class="pagination">
                    <?=createPaginationLink($totalRows, $limit)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? $footerscript = ''; ?>
<? require_once('includes/footer.php'); ?>