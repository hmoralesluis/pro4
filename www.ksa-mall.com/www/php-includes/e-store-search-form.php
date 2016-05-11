<form class="main-search" role="form" method="get" action="/e-store/search/index.html" id="mainSearchForm">
    <div class="input-row">
        <div class="form-group">
            <input type="text" class="form-control" name="keyword" id="keyword" value="<?=$keyword?>" placeholder="Enter Keyword">
        </div><!-- /.form-group -->
        <div class="form-group">
            <select name="esCatID" id="esCatID" title="Select Category" data-live-search="true" class="loadesSubCats" data-t="esSubCatID" data-var="esSubCatIDs">
            	<?
					$esCatRes = mysql_query('SELECT * FROM product_cat WHERE parentID = 0 AND status = "A" ORDER BY sOrder ASC');
					$esCats = '<option value="0">All Categories</option>';
					if(mysql_num_rows($esCatRes) > 0){
						while($esCatRow = mysql_fetch_object($esCatRes)){
							if(isset($_REQUEST['esCatID']) && $_REQUEST['esCatID'] == $esCatRow->pCatID){
								$selected = ' selected="selected"';
							}else {
								$selected = '';
							}
							$esCats .= '<option value="'.$esCatRow->pCatID.'"'.$selected.'>'.stripslashes($esCatRow->pCatName).'</option>';
						}
					}
					echo $esCats;
				?>                
            </select>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <select name="esSubCatID" id="esSubCatID" title="Select Category" data-live-search="true">
            	<?
					$esSubCatIDs = array();
					$esSubCats	 = '<option value="0">All Subcategory</option>';
					
					$esSubCatSql = 'SELECT * FROM product_cat WHERE parentID != 0 AND status = "A" ORDER BY pCatID ASC, status ASC';
					$esSubCatRes = mysql_query($esSubCatSql);
					
					if(mysql_num_rows($esSubCatRes) > 0){
						while($esSubCatRow = mysql_fetch_object($esSubCatRes)){
							if(isset($_REQUEST['esSubCatID']) && $_REQUEST['esSubCatID'] == $esSubCatRow->pCatID){
								$selected = ' selected="selected"';
							}else {
								$selected = '';
							}
							
							if(isset($_REQUEST['esCatID']) && $_REQUEST['esCatID'] > 0 && $_REQUEST['esCatID'] == $esSubCatRow->parentID){
								$esSubCats .= '<option value="'.$esSubCatRow->pCatID.'"'.$selected.'>'.stripslashes($esSubCatRow->pCatName).'</option>';
							}else if(!isset($_REQUEST['esCatID'])){
								$esSubCats .= '<option value="'.$esSubCatRow->pCatID.'"'.$selected.'>'.stripslashes($esSubCatRow->pCatName).'</option>';
							}
							
							$esSubCatIDs[$esSubCatRow->parentID] = array($esSubCatRow->pCatID => stripslashes($esSubCatRow->pCatName));
						}
					}
					
					if(isset($_REQUEST['esCatID']) && $_REQUEST['esCatID'] > 0){
						echo $esSubCats;
					}
				?>
            </select>
        </div>
        <!-- /.form-group -->
        <div class="form-group">
            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
        </div>
        <!-- /.form-group -->
    </div>
</form>
<script type="text/javascript">
	//selectpicker
	var esSubCatIDs	= $.parseJSON('<?=json_encode($esSubCatIDs)?>'); //subcats
	//console.log(esSubCatIDs);
	
	$(document).on('change', '.loadesSubCats', function(event){
		event.preventDefault();
		var variable = $(this).data('var');
		var target	 = $(this).data('t');
		var value 	 = $(this).val();
		
		//console.log('Value: '+value+' | Target: '+target+' | Variable: '+variable);
		
		//console.log(esSubCatIDs[value]);
		var optionArr = esSubCatIDs[value];
		
		$('#esSubCatID').find('option').remove().end().append('<option value="0">All Subcategory</option>');
		
		var optionList = '';
		var count = 1;
		$.each(optionArr, function(id, value){
			if(count == 1){
				optionList += '<option value="0">All Subcategory</option>';
			}
			//console.log(id+' | '+value);
			optionList += '<option value="'+id+'">'+value+'</option>';
			count++;
		});
		
		$('#'+target).find('option').remove().end().append(optionList);
		$('select').selectpicker('refresh');
	});
</script>