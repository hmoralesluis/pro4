<?php

set_time_limit(0); // just in case it too long, not recommended for production
error_reporting(-1); //error_reporting(E_ALL | E_STRICT); // Set E_ALL for debuging

$parseDomain= parse_url($_SERVER['HTTP_HOST']);
$domainOnly	= str_replace('www.', '', $parseDomain['path']);
preg_match('/(.*?)((\.co)?.[a-z]{2,4})$/i', $domainOnly, $domainArr);

session_name($domainArr[1]);
ini_set('session.cookie_domain', '.'.$domainOnly);
session_set_cookie_params(0, '/', '.'.$domainOnly);
session_start();

ini_set('max_file_uploads', 20);   // allow uploading up to 50 files at once

// needed for case insensitive search to work, due to broken UTF-8 support in PHP
ini_set('mbstring.internal_encoding', 'UTF-8');
ini_set('mbstring.func_overload', 2);

if (function_exists('date_default_timezone_set')) {
	date_default_timezone_set('Asia/Beirut');
}

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderConnector.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinder.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeDriver.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeLocalFileSystem.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';
include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeFTP.class.php';

function debug($o) {
	echo '<pre>';
	print_r($o);
}

/**
 * Smart logger function
 * Demonstrate how to work with elFinder event api
 *
 * @param  string   $cmd       command name
 * @param  array    $result    command result
 * @param  array    $args      command arguments from client
 * @param  elFinder $elfinder  elFinder instance
 * @return void|true
 * @author Troex Nevelin
 **/
function logger($cmd, $result, $args, $elfinder) {
	$log = sprintf('[%s] %s:', date('r'), strtoupper($cmd));
	foreach ($result as $key => $value) {
		if (empty($value)) {
			continue;
		}
		$data = array();
		if (in_array($key, array('error', 'warning'))) {
			array_push($data, implode(' ', $value));
		} else { // changes made to files
			foreach ($value as $file) {
				$filepath = (isset($file['realpath']) ? $file['realpath'] : $elfinder->realpath($file['hash']));
				array_push($data, $filepath);
			}
		}
		$log .= sprintf(' %s(%s)', $key, implode(', ', $data));
	}
	$log .= "\n";

	$logfile = '../files/temp/log.txt';
	$dir = dirname($logfile);
	if (!is_dir($dir) && !mkdir($dir)) {
		return;
	}
	if (($fp = fopen($logfile, 'a'))) {
		fwrite($fp, $log);
		fclose($fp);
	}
}


/**
 * Simple logger function.
 * Demonstrate how to work with elFinder event api.
 *
 * @package elFinder
 * @author Dmitry (dio) Levashov
 **/
class elFinderSimpleLogger {
	
	/**
	 * Log file path
	 *
	 * @var string
	 **/
	protected $file = '';
	
	/**
	 * constructor
	 *
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	public function __construct($path) {
		$this->file = $path;
		$dir = dirname($path);
		if (!is_dir($dir)) {
			mkdir($dir);
		}
	}
	
	/**
	 * Create log record
	 *
	 * @param  string   $cmd       command name
	 * @param  array    $result    command result
	 * @param  array    $args      command arguments from client
	 * @param  elFinder $elfinder  elFinder instance
	 * @return void|true
	 * @author Dmitry (dio) Levashov
	 **/
	public function log($cmd, $result, $args, $elfinder) {
		$log = $cmd.' ['.date('d.m H:s')."]\n";
		
		if (!empty($result['error'])) {
			$log .= "\tERROR: ".implode(' ', $result['error'])."\n";
		}
		
		if (!empty($result['warning'])) {
			$log .= "\tWARNING: ".implode(' ', $result['warning'])."\n";
		}
		
		if (!empty($result['removed'])) {
			foreach ($result['removed'] as $file) {
				// removed file contain additional field "realpath"
				$log .= "\tREMOVED: ".$file['realpath']."\n";
			}
		}
		
		if (!empty($result['added'])) {
			foreach ($result['added'] as $file) {
				$log .= "\tADDED: ".$elfinder->realpath($file['hash'])."\n";
			}
		}
		
		if (!empty($result['changed'])) {
			foreach ($result['changed'] as $file) {
				$log .= "\tCHANGED: ".$elfinder->realpath($file['hash'])."\n";
			}
		}
		
		$this->write($log);
	}
	
	/**
	 * Write log into file
	 *
	 * @param  string  $log  log record
	 * @return void
	 * @author Dmitry (dio) Levashov
	 **/
	protected function write($log) {
		
		if (($fp = @fopen($this->file, 'a'))) {
			fwrite($fp, $log."\n");
			fclose($fp);
		}
	}
	
	
} // END class 


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

/**
 * Access control example class
 *
 * @author Dmitry (dio) Levashov
 **/
class elFinderTestACL {
	
	/**
	 * make dotfiles not readable, not writable, hidden and locked
	 *
	 * @param  string  $attr  attribute name (read|write|locked|hidden)
	 * @param  string  $path  file path. Attention! This is path relative to volume root directory started with directory separator.
	 * @param  mixed   $data  data which seted in 'accessControlData' elFinder option
	 * @param  elFinderVolumeDriver  $volume  volume driver
	 * @return bool
	 * @author Dmitry (dio) Levashov
	 **/
	public function fsAccess($attr, $path, $data, $volume) {
		
		if ($volume->name() == 'localfilesystem') {
			return strpos(basename($path), '.') === 0
				? !($attr == 'read' || $attr == 'write')
				: $attr == 'read' || $attr == 'write';
		}
		
		return true;
	}
	
} // END class 

$acl = new elFinderTestACL();

function validName($name) {
	return strpos($name, '.') !== 0;
}

$logger = new elFinderSimpleLogger('../files/temp/log.txt');

function kResize($cmd, $result, $args, $elfinder){
	$log = '';
	
	$files = $result['added'];
	foreach ($files as $file) {
		$log .= "\n".json_encode($file);
		
		$imgSizeArr = getimagesize($elfinder->realpath($file['hash']));
		$originalWidth  = $imgSizeArr[0];
		$originalHeight = $imgSizeArr[1];
		$log .= $originalWidth.' | '.$originalHeight;
		
		$ratio = $originalWidth / $originalHeight;
		if($originalWidth > 1024){
			$targetWidth = 1024;
			$targetHeight = round($targetWidth/$ratio);
			$log .= ' => Original Size is Greater than 1024';
			
			$arg = array(
				'target' => $file['hash'],
				'width' => $targetWidth,
				'height' => $targetHeight,
				'x' => 0,
				'y' => 0,
				'mode' => 'propresize',
				'degree' => 0
			);
			
			$elfinder->exec('resize', $arg);
		}
		
		$log .= "\n".$file['name'];
		$filename = preg_replace('/[^A-Za-z0-9.\-]/', '', $file['name']); // Removes special chars.
		$filename = str_replace(' ', '-',$filename); // Replaces all spaces with hyphens.
		$filename = preg_replace('/-+/', '-', $filename); // Replaces multiple hyphens with single one.
		$log .= " => ".$filename;
		
        $fnarg = array('target' => $file['hash'], 'name' => $filename);
        $elfinder->exec('rename', $fnarg);
		
		$logfile = '../files/temp/log.txt';
		if(($fp = fopen($logfile, 'a'))) {
			fwrite($fp, $log);
			fclose($fp);
		}
	}
	return true;
}

$opts = array(
	'locale' => 'en_US.UTF-8',
	'bind' => array(
		'mkdir mkfile rename duplicate upload rm paste' => 'logger', 
		'upload' => 'kResize'
	),
	'debug' => true,
	'roots' => array(
		array(
			'driver'     		=> 'LocalFileSystem',
			'path'       		=> $_SESSION['imgManagerFilePath'],
			'startPath'  		=> $_SESSION['imgManagerFilePath'],
			'URL'        		=> $_SESSION['imgManagerFileSelectPath'], //dirname($_SERVER['PHP_SELF']).
			'alias'				=> 'Images',
			'mimeDetect' 		=> 'internal',
			'utf8fix'    		=> true,
			'tmbCrop'    		=> false,
			'tmbBgColor' 		=> 'transparent',
			'accessControl' 	=> 'access',
			'acceptedName'		=> '/^[^\.].*$/',
			'copyOverwrite'		=> true, 
			'uploadMaxSize'		=> '10M',
			'uploadOverwrite'	=> true, 
			'uploadAllow' 		=> array('image/png', 'image/jpeg', 'image/gif', 'application/pdf'), 
			'uploadDeny'		=> array('all'),
			'uploadOrder' 		=> 'deny,allow', 
			'tmbPath'			=> '.tmb'
		),
	)
);

/**header('Access-Control-Allow-Origin: *'); 
**/
$connector = new elFinderConnector(new elFinder($opts), true);
$connector->run();