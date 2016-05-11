<?php

error_reporting(-1); // Set E_ALL for debuging
//session_start();

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
// Required for FTP connector support
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool|null
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0       // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')    // set read+write to false, other (locked+hidden) set to true
		:  null;                                    // else elFinder decide it itself
}

$opts = array(
	'bind' => array(
		'mkdir mkfile rename duplicate upload rm paste' => 'logger'
	),
	'roots' => array(
		array(
			'driver'     	=> 'FTP',
			'host'   		=> '103.1.174.1',
            'user'   		=> 'reliablepaper',
            'pass'   		=> 'Pa@@word123',
			'alias'			=> 'Images',
			'path'       	=> '/',
			'startPath'  	=> '/',
			'URL'        	=> '/',
			'mimeDetect' 	=> 'internal',
			'utf8fix'    	=> true,
			'tmbCrop'    	=> false,
			'tmbBgColor' 	=> 'transparent',
			'accessControl' => 'access',
			'acceptedName'	=> '/^[^\.].*$/',
			'copyOverwrite'	=> true, 
			'uploadMaxSize'	=> '30M',
			'uploadOverwrite' => true, 
			'uploadAllow' 	=> array('image/png', 'image/jpeg', 'image/gif', 'application/pdf'), 
			'uploadDeny'	=> array('all'),
			'uploadOrder' 	=> 'deny,allow'
		)
	)
);

// run elFinder
$connector = new elFinderConnector(new elFinder($opts));
$connector->run();

