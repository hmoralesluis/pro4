<style type="text/css">
	.lable {
		-moz-box-shadow: none;
		-webkit-box-shadow: none;
		box-shadow: none;
		-moz-border-radius: 0px;
		-webkit-border-radius: 0px;
		border-radius: 0px;
		-moz-transition: 0.3s;
		-webkit-transition: 0.3s;
		transition: 0.3s;
		-webkit-appearance: none;
		background-color: #fff;
		border: none;
		font-size: 14px;
		outline: none !important;
		padding: 10px 9px 9px;
		height: inherit;
		line-height: inherit;
		display:table-cell;
		margin-bottom:0px;
	}
	.inline-block {
		display:table-cell;
		vertical-align:top;
	}
	.k-table {
		display:table;
	}
</style>
<?
	//error_reporting(-1);
	if(isset($_REQUEST['sfcountryID'])){
		$sfcountryID		= (int) $_REQUEST['sfcountryID'];
		$sfcityID			= (int) $_REQUEST['sfcityID'];
		$sflocationID		= (int) $_REQUEST['sflocationID'];
		$sfpropertyTypeID	= (int) $_REQUEST['sfpropertyTypeID'];
		$sfbeds				= (int) $_REQUEST['sfbeds'];
		$sfmin				= (float) $_REQUEST['sfmin'];
		$sfmax				= (float) $_REQUEST['sfmax'];
		$sfref				= trim($_REQUEST['sfref']);
	}else {
		$sfcountryID		= 1;
		$sfcityID			= '';
		$sflocationID		= '';
		$sfpropertyTypeID	= '';
		$sfbeds				= '';
		$sfmin				= '';
		$sfmax				= '';
		$sfref				= '';
	}
	
	$curlRet = curlPost($settings[7], array('a' => 'searchFields'));
	if($curlRet['status'] == 0){
		$sfArr = json_decode($curlRet['json']);	
		
		/*echo '<pre>';
		print_r($sfArr->locations->{17});
		echo '</pre>';*/
	}else {
		echo '<br />';
		echo '<pre>';
		echo $curlRet['msg'];
		echo '</pre>';
	}
?>
<form class="main-search" role="form" method="get" action="/real-estate/search/index.html" id="mainSearchForm">
	<div class="input-row">
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Country</label>
            <div class="inline-block">
        	<select name="sfcountryID" id="sfcountryID" title="Country" data-live-search="true" class="loadjOptions" data-t="sfcityID" data-var="sfcities">
            	<? if(isset($sfArr->countries) && count($sfArr->countries) > 0): ?>
                	<? foreach($sfArr->countries as $key => $val): ?>
					<? if($key == $sfcountryID){$selected=' selected="selected"';}else{$selected='';} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=ucfirst($val)?></option>
                    <? endforeach; ?>
                <? endif; ?>
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Region</label>
            <div class="inline-block">
        	<select name="sfcityID" id="sfcityID" title="Region" data-live-search="true" class="loadjOptions" data-t="sflocationID" data-var="sflocations">
                <? if($sfcountryID != '' && isset($sfArr->cities->{$sfcountryID}) && count($sfArr->cities->{$sfcountryID}) > 0): ?>
                	<option value="">Select</option>
                	<? foreach($sfArr->cities->{$sfcountryID} as $key => $val): ?>
					<? if($key == $sfcityID){$selected=' selected="selected"';}else{$selected='';} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=ucfirst($val)?></option>
                    <? endforeach; ?>
                <? endif; ?>
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Location</label>
            <div class="inline-block">
        	<select name="sflocationID" id="sflocationID" title="Location" data-live-search="true">
                <? if($sfcityID != '' && isset($sfArr->locations->{$sfcityID}) && count($sfArr->locations->{$sfcityID}) > 0): ?>
                	<option value="">Select</option>
                	<? foreach($sfArr->locations->{$sfcityID} as $key => $val): ?>
					<? if($key == $sflocationID){$selected=' selected="selected"';}else{$selected='';} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=ucfirst($val)?></option>
                    <? endforeach; ?>
                <? endif; ?>
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Type</label>
            <div class="inline-block">
        	<select name="sfpropertyTypeID" id="sfpropertyTypeID" title="Type" data-live-search="true">
            	<option value="">Select</option>
                <? if(isset($sfArr->propertytypes) && count($sfArr->propertytypes) > 0): ?>
                	<? foreach($sfArr->propertytypes as $key => $val): ?>
					<? if($key == $sfpropertyTypeID){$selected=' selected="selected"';}else{$selected='';} ?>
                    <option value="<?=$key?>"<?=$selected?>><?=ucfirst($val)?></option>
                    <? endforeach; ?>
                <? endif; ?>
            </select>
            </div>
        </div>
    </div>
    <div class="input-row">
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Bedroom</label>
            <div class="inline-block">
        	<select name="sfbeds" title="sfbeds" data-live-search="true">
            	<option value="">Select</option>
				<? for($i = 1; $i <= 5; $i++): ?>
                <? if($sfbeds == $i){$selected = ' selected="selected"';}else{$selected = '';} ?>
                <option value="<?=$i?>"<?=$selected?>><?=$i?></option>
                <? endfor; ?>
            </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Min</label>
            <div class="inline-block">
            <? if($sfmin > 0){echo $value = $sfmin;}else{$value = '';}?>
        	<input type="text" class="form-control" name="sfmin" id="sfmin" value="<?=$value?>" placeholder="USD" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-3 k-table">
        	<label class="lable">Max</label>
            <div class="inline-block">
            <? if($sfmax > 0){echo $value = $sfmax;}else{$value = '';}?>
        	<input type="text" class="form-control" name="sfmax" id="sfmax" value="<?=$value?>" placeholder="USD" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-2 k-table">
        	<label class="lable">Ref</label>
            <div class="inline-block">
        	<input type="text" class="form-control" name="sfref" id="sfref" value="<?=$sfref?>" placeholder="Ex: RL-1029" />
            </div>
        </div>
        <div class="col-xs-12 col-sm-1 col-md-1 k-table">
        	<button type="submit" class="btn btn-default" style="width:100%"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
<script type="text/javascript">
	//selectpicker
	var sfcities	= $.parseJSON('<?=json_encode($sfArr->cities)?>'); //cities
	var sflocations = $.parseJSON('<?=json_encode($sfArr->locations)?>'); //locations
	//console.log(sfcities);
	//console.log(sflocations);
	
	$(document).on('change', '.loadjOptions', function(event){
		event.preventDefault();
		var variable = $(this).data('var');
		var target	 = $(this).data('t');
		var value 	 = $(this).val();
		
		//console.log('Value: '+value+' | Target: '+target+' | Variable: '+variable);
		if(variable == 'sfcities'){
			//console.log(sfcities[value]);
			var optionArr = sfcities[value];
			
			$('#sflocationID').find('option').remove().end().append('<option value="">Select</option>');
		}else if(variable == 'sflocations'){
			//console.log(sflocations[value]);
			var optionArr = sflocations[value];
		}
		
		var optionList = '';
		var count = 1;
		$.each(optionArr, function(id, value){
			if(count == 1){
				optionList += '<option value="">Select</option>';
			}
			//console.log(id+' | '+value);
			optionList += '<option value="'+id+'">'+value+'</option>';
			count++;
		});
		
		$('#'+target).find('option').remove().end().append(optionList);
		$('select').selectpicker('refresh');
	});
</script>