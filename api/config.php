<?php
define('IN_DEV', preg_match('/^dev\./i', $_SERVER['HTTP_HOST']));
if( !IN_DEV ) { // Gzip output.
	ob_start('ob_gzhandler');
} else { // Turn on error reporting in development environment.
	ini_set('display_errors', 1);
	error_reporting(-1);
}

// Set default timezone
date_default_timezone_set('America/New_York');
putenv('TZ=US/Eastern');

// Load Facebook Fwk
require_once 'facebook/facebook.php';
define('APP_ID', ''); // TODO
define('APP_SECRET', ''); // TODO

// Class autoloader
function __autoload( $className ) {
	foreach( array('tools', 'models', 'controllers') as $folder ) {
		$class = dirname(__FILE__) .'/'. $folder .'/'. $className .'.php';
		if( file_exists($class) ) {
			require_once($class);
			return;
		}
	}

	throw new Exception('Cannot find '. $className .'.php in library folder.', E_USER_ERROR);
}