<?
	require_once('includes/db_con.php');
	require_once('includes/general_functions.php');
	require_once('includes/db_functions.php');
	require_once('includes/validate-user.php');
	
	$userID	= $_SESSION['user']['userID'];
	$email	= $_SESSION['user']['email'];
	
	$listingID = (int) $_REQUEST['listingID'];
	
	$listingRes = mysql_query('SELECT * FROM businesslistings WHERE listingID = '.$listingID.' AND userID = '.$userID);
	
	if(mysql_num_rows($listingRes) > 0){
		$formPostUrl = 'my-business-listings-post.php';
		
		$_SESSION['uimgManagerFilePath'] = '../../../images/userfiles/business/'.$listingID.'/';
		$_SESSION['uimgManagerFileSelectPath'] = '/images/userfiles/business/'.$listingID.'/';
		$_SESSION['uimgManageruploadMaxSize'] = '500K';
		
		$listingRow = mysql_fetch_object($listingRes);
		
		#Create Folder
		if(!file_exists('../images/userfiles/business/'.$listingID)){
			//$returnData['debug'] = 'Folder not Found!';
			
			if(!mkdir('../images/userfiles/business/'.$listingID)){
				//$returnData['debug'] .= ' | Error on Creating Folder!'.json_encode(error_get_last());
			}
		}
		#End
		
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
		
		$ecatLists	= '';
		$esubCatIDs	= '';
		$clcount = 1;
		foreach($catArr as $clcatID => $clcatName){
			$ecatLists .= '<option value="" data-sort="'.$clcount.'">'.$clcatName.'</option>';
			$clscRes = mysql_query('SELECT * FROM category WHERE parentID = '.$clcatID.' ORDER BY sOrder ASC');
			if(mysql_num_rows($clscRes) > 0){
				while($clscRow = mysql_fetch_object($clscRes)){
					$clcount++;
					
					$clsCatID	= $clscRow->catID;
					$clsCatName	= stripslashes($clscRow->catName);
					if(isset($subCatIdsArr[$clscRow->catID])){
						$esubCatIDs .= '<option value="'.$clsCatID.'" data-sort="'.$clcount.'" selected="selected">&nbsp;&nbsp;- '.$clsCatName.'</option>';
					}else {
						$ecatLists .= '<option value="'.$clsCatID.'" data-sort="'.$clcount.'">&nbsp;&nbsp;- '.$clsCatName.'</option>';
					}
				}
			}
			$clcount++;
		}
		
		$ecatLists	= $ecatLists;
		$esubCatIDs	= $esubCatIDs;
		#End
		
		$ebusinessName	= stripslashes($listingRow->businessName);
		$elogo			= stripslashes($listingRow->logo);
		$eimgPath		= stripslashes($listingRow->imgPath);
		$eaddress		= stripslashes($listingRow->address);
		$elocation		= stripslashes($listingRow->location);
		$etelephone		= stripslashes($listingRow->telephone);
		$emobile			= stripslashes($listingRow->mobile);
		$ebusinessEmail	= stripslashes($listingRow->businessEmail);
		
		if($listingRow->website != ''){
			$ewebsite	= stripslashes($listingRow->website);
		}else {
			$ewebsite	= 'http://';
		}
		/* Facebook url added by kavitha on 12-6-2015*/
		if($listingRow->facebookPage != ''){
			$efacebook	= stripslashes($listingRow->facebookPage);
		}else {
			$efacebook	= 'http://';
		}
		
		$edescription	= stripslashes($listingRow->description);
		$eoffer			= stripslashes($listingRow->offer);
		$eevents		= stripslashes($listingRow->events);
		$etags			= stripslashes($listingRow->tags);
		$eseoUrl		= stripslashes($listingRow->seoUrl);
		$eseoTitle		= stripslashes($listingRow->seoTitle);
		$eseoKeywords	= stripslashes($listingRow->seoKeywords);
		$eseoDesc		= stripslashes($listingRow->seoDesc);
		
		$eLmap_lat		= $listingRow->lat;
		$eLmap_lng		= $listingRow->lng;
		
		$lat			= $listingRow->lat;
		$lng			= $listingRow->lng;
		
		
		$header = array(
			'siteTitle' => 'Edit '.$ebusinessName, 
			'cMenu'		=> 'dashboard', 
			'breadcrumb'=> array(
				array('url' => 'my-business-listings.php', 'text' => 'My Business Listings'), 
				array('url' => '', 'text' => 'Edit "'.$ebusinessName.'"')
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
                        <h3 class="box-title">&nbsp;</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">
                        <!-- button with a dropdown -->
                        <a href="my-business-listings.php" class="btn btn-sm" data-widget="remove"><i class="fa fa-times"></i></a>
                        </div><!-- /. tools -->
                    </div>
                    
                    <div class="box-footer clearfix">
                        <form action="<?=$formPostUrl?>" method="post" class="afs" id="editBusinessListingForm">
                            <div class="sMsg"></div>
                            <input type="hidden" name="a" value="saveListing" />
                            <input type="hidden" name="fa" value="Edit" />
                            <input type="hidden" name="listingID" id="listingID" value="<?=$listingID?>" />
                            
                            <div class="row">
                                <div class="col-md-6">
                                <label for="ecatLists">Categories</label>
                                <select class="form-control swapesoption" data-swapid="esubCatIDs" id="ecatLists" data-sort="N" data-targetselect="Y" data-selectremaining="N" multiple="multiple" style="height:170px;">
                                    <?=$ecatLists?>
                                </select>
                                </div>
                                
                                <div class="col-md-6">
                                <label for="esubCatIDs">Sub Categories *</label>
                                <select class="form-control swapesoption removesoptions" data-swapid="ecatLists" name="esubCatIDs[]" id="esubCatIDs" data-sort="Y" data-targetselect="N" data-selectremaining="Y" multiple="multiple" required="required" style="height:170px;">
                                    <?=$esubCatIDs?>
                                </select>
                                </div>
                            </div>
                            
                            <label for="ebusinessName">Business Name *</label>
                            <input type="text" class="form-control" name="ebusinessName" id="ebusinessName" value="<?=$ebusinessName?>" required="required" />
                            
                            <div id="#edit">
                            <label for="ebusinessEmail">Business Email (Optional)</label>
                            <input type="email" class="form-control" name="ebusinessEmail" id="ebusinessEmail" value="<?=$ebusinessEmail?>" />
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="elogo" style="display:block;">Logo (Optional)</label>
                                    <input type="text" class="form-control" name="elogo" id="elogo" style="display:inline-block; width:90%;" value="<?=$elogo?>" />
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="elogo" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="eimgPath" style="display:block;">Image (Optional)</label>
                                    <input type="text" class="form-control" name="eimgPath" id="eimgPath" style="display:inline-block; width:90%;" value="<?=$eimgPath?>" />
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm browseFile" title="Browse File" data-f="eimgPath" data-m="false" style="display:inline-block;"><i class="fa fa-folder-open"></i></a>
                                 </div>
                            </div>
                            
                            <label for="eaddress">Address (Optional)</label>
                            <textarea class="form-control htmlEditor" name="eaddress" id="eaddress"><?=$eaddress?></textarea>
                            <br />
                            
                            <label for="elocation">Location (Optional)</label>
                            <input type="text" class="form-control" name="elocation" id="elocation" value="<?=$elocation?>" />
                            
                            <label for="etelephone">Telephone (Optional)</label>
                            <input type="text" class="form-control" name="etelephone" id="etelephone" value="<?=$etelephone?>" />
                            
                            <label for="emobile">Mobile Number (Optional)</label>
                            <input type="text" class="form-control" name="emobile" id="emobile" value="<?=$emobile?>" />
                            
                            <label for="ewebsite">Website (Optional)</label>
                            <input type="text" class="form-control forceUrl" name="ewebsite" id="ewebsite" value="<?=$ewebsite?>" />
                            
                            <label for="efacebook">Facebook (Optional)</label>
                    		<input type="text" class="form-control forceUrl" name="efacebook" id="efacebook" value="<?=$efacebook?>" />
                            
                            <label>Business Location (Optional)</label>
                            <input id="eAddress" type="text" placeholder="Type Your Location Here And Find. Drag the Marker Where you want." class="form-control" />
                            <div id="eLmap" class="mapCanvas" data-form="editBusinessListingForm" data-search="eAddress"></div>
                            <br />
                            <div class="row">
                                <div class="col-md-6">
                                <label for="eLmap_lat">Latitude (Optional)</label>
                                <input type="text" name="elat" id="eLmap_lat"  class="form-control" data-geo="lat" value="<?=$eLmap_lat?>" />
                                </div>
                                <div class="col-md-6">
                                <label for="eLmap_lng">Lontitude (Optional)</label>
                                <input type="text" name="elng" id="eLmap_lng" data-geo="lng" value="<?=$eLmap_lng?>" class="form-control" />
                                </div>
                            </div>
                            
                            <label for="edescription">Description *</label>
                            <textarea class="form-control htmlEditor" name="edescription" id="edescription"><?=$edescription?></textarea>
                            <br />
                            
                            <label for="eoffer">Offers (Optional)</label>
                            <textarea class="form-control htmlEditor" name="eoffer" id="eoffer"><?=$eoffer?></textarea>
                            <br />
                            
                            <label for="eevents">Events (Optional)</label>
                            <textarea class="form-control htmlEditor" name="eevents" id="eevents"><?=$eevents?></textarea>
                            <br />
                            
                            <label for="etags">Tags (Optional)</label>
                            <textarea class="form-control" name="etags" id="etags" placeholder="tag1, tag2, tag3"><?=$etags?></textarea>
                            
                            <label for="eseoUrl">SEO URL *</label>
                            <input type="text" class="form-control" name="eseoUrl" id="eseoUrl" value="<?=$eseoUrl?>" required="required" />
                            
                            <label for="eseoTitle">SEO Title (Optional)</label>
                            <input type="text" class="form-control" name="eseoTitle" id="eseoTitle" value="<?=$eseoTitle?>" />
                            
                            <?php /*?><label for="eseoKeywords">SEO Keywords (Optional)</label>
                            <textarea class="form-control" name="eseoKeywords" id="eseoKeywords"><?=$eseoKeywords?></textarea>
                            
                            <label for="eseoDesc">SEO Description (Optional)</label>
                            <textarea class="form-control" name="eseoDesc" id="eseoDesc"><?=$eseoDesc?></textarea><?php */?>
                            
                            <input type="submit" name="submitBtn" class="btn btn-info" value="Save Business Listing" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?
            $footerscript = '
				<script type="text/javascript">
					if($("#editListing .mapCanvas").length > 0){
						$("#editListing .mapCanvas").each(function(index, element){
							var mapID = $(this).attr("id");
							var formID = $(this).data("form");
							var searchInputID = $(this).data("search");
							//showAlert(mapID+" | "+formID);
							
							$("#"+searchInputID).geocomplete({
								map: "#"+mapID, 
								
								details: "#"+formID,
								detailsAttribute: "data-geo", 
								
								types: ["geocode", "establishment"],
								markerOptions: {
									draggable: true
								}, 
								mapOptions: {
									zoom: 13
								}
							});
							$("#"+searchInputID).bind("geocode:dragged", function(event, latLng){
								$("#"+mapID+"_lat").val(latLng.lat());
								$("#"+mapID+"_lng").val(latLng.lng());
							});
						});
					}
					
					eMap = $("#eAddress").geocomplete("map");
			';
			
			if($lat != '' && $lng != ''){
				$footerscript .= '
					center = new google.maps.LatLng(parseFloat('.$lat.'), parseFloat('.$lng.'));
					$("#eAddress").geocomplete("find", '.$lat.'+","+'.$lng.');
					eMap.setCenter(center);
				';	
			}
			
			$footerscript .= '
					google.maps.event.trigger(eMap,"resize");
				</script>
            ';
        ?>
    <? endif; ?>
<? require_once('includes/footer.php'); ?>