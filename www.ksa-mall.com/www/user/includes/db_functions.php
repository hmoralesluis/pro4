<?
	function validateRecord($table, $conditions){
		$sql = 'SELECT * FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= '`'.$field.'` = "'.$value.'" AND ';
				}else{
					$sql .= '`'.$field.'` = "'.$value.'" ';
				}
			}
		}
		//echo $sql;
		if(mysql_num_rows(mysql_query($sql)) > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function getRecord($table, $field_name, $conditions){
		$sql = 'SELECT `'.$field_name.'` FROM '.$table.' ';
		
		if($conditions != '' && is_array($conditions) && count($conditions) > 0){
			$total_conditions = count($conditions);
			$sql .= 'WHERE ';
			foreach($conditions as $field => $value){
				$total_conditions--;
				
				if($total_conditions > 0){
					$sql .= '`'.$field.'` = "'.$value.'" AND ';
				}else{
					$sql .= '`'.$field.'` = "'.$value.'" ';
				}
			}
		}
		//echo $sql;
		$res = mysql_query($sql);
		
		if($res && mysql_num_rows($res) > 0){
			
			$row = mysql_fetch_array($res);
			
			return $row[$field_name];
		}else{
			return ('');
		}
	}
	
	function catDeviceImages($catID){
		//devices, category_device_images
		
		#Delete Category Records in `category_device_images` Where Devices are not found in `devices` Table
		mysql_query('DELETE FROM category_device_images WHERE catID = '.$catID.' AND dID NOT IN(SELECT d.dID FROM devices AS d)');
		#End
		
		#Insert Records in `category_device_images` for catID if Device is not Found
		$devicesRes = mysql_query('SELECT * FROM devices WHERE dID NOT IN (SELECT cdi.dID FROM category_device_images AS cdi WHERE cdi.catID = '.$catID.')');
		if(mysql_num_rows($devicesRes) > 0){
			while($devicesRow = mysql_fetch_object($devicesRes)){
				mysql_query('INSERT INTO category_device_images SET catID = '.$catID.', dID = '.$devicesRow->dID);
			}
		}
		#End
	}
	
	function catDeviceLinks($catID){
		//devices, category_device_links
		
		#Delete Category Records in `category_device_links` Where Devices are not found in `devices` Table
		mysql_query('DELETE FROM category_device_links WHERE catID = '.$catID.' AND dID NOT IN(SELECT d.dID FROM devices AS d)');
		#End
		
		#Insert Records in `category_device_links` for catID if Device is not Found
		$devicesRes = mysql_query('SELECT * FROM devices WHERE dID NOT IN (SELECT cdl.dID FROM category_device_links AS cdl WHERE cdl.catID = '.$catID.')');
		if(mysql_num_rows($devicesRes) > 0){
			while($devicesRow = mysql_fetch_object($devicesRes)){
				mysql_query('INSERT INTO category_device_links SET catID = '.$catID.', dID = '.$devicesRow->dID);
			}
		}
		#End
	}
	
	function langDeviceImages($langID){
		//devices, category_device_images
		
		#Delete Language Records in `language_device_images` Where Devices are not found in `devices` Table
		mysql_query('DELETE FROM language_device_images WHERE langID = '.$langID.' AND dID NOT IN(SELECT d.dID FROM devices AS d)');
		#End
		
		#Insert Records in `category_device_images` for langID if Device is not Found
		$devicesRes = mysql_query('SELECT * FROM devices WHERE dID NOT IN (SELECT ldi.dID FROM language_device_images AS ldi WHERE ldi.langID = '.$langID.')');
		if(mysql_num_rows($devicesRes) > 0){
			while($devicesRow = mysql_fetch_object($devicesRes)){
				mysql_query('INSERT INTO language_device_images SET langID = '.$langID.', dID = '.$devicesRow->dID);
			}
		}
		#End
	}
	
	function getCustomerChannels($customerID){
		$channels = '';
		$cusPackagesSql = 'SELECT GROUP_CONCAT(packageID) AS packageIDs FROM `customer_packages` WHERE customerID = '.$customerID;
		//echo $cusPackagesSql;
		$cusPackagesRes = mysql_query($cusPackagesSql);
		
		if(mysql_num_rows($cusPackagesRes) > 0){
			$cusPackagesRow = mysql_fetch_object($cusPackagesRes);
					
			$packageIDs = $cusPackagesRow->packageIDs;
			
			if($packageIDs != ''){
				$packagesSql = 'SELECT GROUP_CONCAT(channels) AS channels FROM packages WHERE packageID IN ('.$packageIDs.')';
				//echo $packagesSql;
				$packagesRes = mysql_query($packagesSql);
				
				if(mysql_num_rows($packagesRes) > 0){
					$packageRow = mysql_fetch_object($packagesRes);
					$channels .= stripslashes($packageRow->channels);
				}
			}
		}
		
		return($channels);
	}
	
	function getChannelLink($customerRow, $channelRow, $isMovie = 'N'){
		$link = '';
		
		if($channelRow->linkType == 'NS'){
			$link = stripslashes($channelRow->link);
		}else if($channelRow->linkType == 'SC'){
			
			if($channelRow->serverID > 0){
				$serverSql = 'SELECT * FROM servers WHERE status = "A" AND serverID = '.$channelRow->serverID;
			}else if($customerRow->serverType == 'SG' && $customerRow->serverID > 0){
				$serverSql = '
					SELECT s.* FROM servers AS s 
					WHERE  s.status = "A" AND s.serverID IN (
						SELECT sg.servers FROM servergroups AS sg WHERE sg.sGroupID = '.$customerRow->serverID.' 
					)
					LIMIT 1 
				';
			}else if($customerRow->serverType == 'S' && $customerRow->serverID > 0){
				$serverSql = 'SELECT * FROM servers WHERE status = "A" AND serverID = '.$customerRow->serverID;
			}else if($customerRow->cServerType == 'SG' && $customerRow->cServerID > 0){
				$serverSql = '
					SELECT s.* FROM servers AS s 
					WHERE s.status = "A" AND s.serverID IN (
						SELECT sg.servers FROM servergroups AS sg WHERE sg.sGroupID = '.$customerRow->cServerID.' 
					)
					LIMIT 1 
				';
			}else if($customerRow->cServerType == 'S' && $customerRow->cServerID > 0){
				$serverSql = 'SELECT * FROM servers WHERE status = "A" AND serverID = '.$customerRow->cServerID;
			}
			
			$serverRes = mysql_query($serverSql);
			
			if(mysql_num_rows($serverRes) > 0){
				$serverRow = mysql_fetch_object($serverRes);
				
				$ip				= stripslashes($serverRow->ipDomain);
				$port			= stripslashes($serverRow->port);
				$streamApp		= stripslashes($channelRow->streamApp);
				$streamName		= stripslashes($channelRow->streamName);
				$playlistName	= stripslashes($serverRow->playlistName);
				
				$link = 'http://'.$ip.':'.$port.'/'.$streamApp.'/'.$streamName;
				if($isMovie == 'N'){
					$link .= '/'.$playlistName;
				}
			}
		}
		
		return($link);
	}
	
	function channelDeviceImages($channelID){
		//devices, channel_device_images
		
		#Delete Channel Records in `channel_device_images` Where Devices are not found in `channels` Table
		mysql_query('DELETE FROM channel_device_images WHERE channelID = '.$channelID.' AND dID NOT IN(SELECT d.dID FROM devices AS d)');
		#End
		
		#Insert Records in `channel_device_images` for catID if Device is not Found
		$devicesRes = mysql_query('SELECT * FROM devices WHERE dID NOT IN (SELECT cdi.dID FROM channel_device_images AS cdi WHERE cdi.channelID = '.$channelID.')');
		if(mysql_num_rows($devicesRes) > 0){
			while($devicesRow = mysql_fetch_object($devicesRes)){
				mysql_query('INSERT INTO channel_device_images SET channelID = '.$channelID.', dID = '.$devicesRow->dID);
			}
		}
		#End
	}
	
	function avangateLink($shortInfo, $currency = 'USD', $transactionID, $price, $transactionFor, $domain, $secretKey, $isTest = 'L'){
		
		$tfRes = mysql_query('
			SELECT * FROM avangate_products 
			WHERE transactionFor = "'.mysql_real_escape_string($transactionFor).'" 
			LIMIT 1 
		');
		
		if(mysql_num_rows($tfRes) > 0){
			$tfRow = mysql_fetch_object($tfRow);
			$productID = stripslashes($tfRow->productID);
			
			$baseUrl = 'https://secure.avangate.com/order/checkout.php?';
			
			$params = array(
				'CART'									=> 1, 
				'CARD'									=> 2, 
				'PRODS'									=> $productID,
				'QTY'									=> 1, 
				'PRICES'.$productID.'['.$currency.']'	=> $price, 
				'INFO'.$productID						=> $shortInfo,
				'PHASH'									=> '', 
				'CURRENCY'								=> $currency, 
				'LANG'									=> 'en',
				'REF'									=> $transactionID, 
				'BACK_REF'								=> $domain.'/avangate/status.php', 
				'SHOPURL'								=> $domain.'/user/pay-order/'.$transactionFor.'/'.$transactionID.'/', 
				'CLEAN_CART'							=> 1
			);
			unset($params['INFO'.$productID]);
			
			$HMAC_MD5	= 'PRODS='.$productID.'&QTY=1&PRICES'.$productID.'['.$currency.']='.$price;
			$hashBaseStr= strlen($HMAC_MD5).$HMAC_MD5;
			
			$params['PHASH'] = hash_hmac('md5', $hashBaseStr, $secretKey);
			
			if($isTest == 'T'){
				$params['DOTEST'] = 1;
			}
			
			$url = $baseUrl.http_build_query($params) ;
			
			$link = '<a href="'.$url.'" title="Pay with Avangate" class="buy-button">';
			$link .= '<img alt="Avangate Pay Button" src="/images/avangate.png" />';
			$link .= '</a><br /><br />';
			
			return($link);
		}else {
			
		}
	}
	
	function avangateHash($currency = 'USD', $transactionID, $price, $transactionFor, $secretKey){
		$tfRes = mysql_query('
			SELECT * FROM avangate_products 
			WHERE transactionFor = "'.mysql_real_escape_string($transactionFor).'" 
			LIMIT 1 
		');
		
		if(mysql_num_rows($tfRes) > 0){
			$tfRow = mysql_fetch_object($tfRow);
			$productID = stripslashes($tfRow->productID);
			
			$HMAC_MD5	= 'PRODS='.$productID.'&QTY=1&PRICES'.$productID.'['.$currency.']='.$price;
			$hashBaseStr= strlen($HMAC_MD5).$HMAC_MD5;
			
			$PHASH = hash_hmac('md5', $hashBaseStr, $secretKey);
			
			return($PHASH);
		}
	}
?>