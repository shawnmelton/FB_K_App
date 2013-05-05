<?php
/*!
 * @desc Route traffic of api.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Router {
	static function run() {
		header('Content-type: text/plain');

		$bits = explode('/', str_replace($_SERVER['QUERY_STRING'], '', $_SERVER['REQUEST_URI']));
		$siteroot = dirname(dirname(__FILE__));
		
		// Default to 404 failure
		$controller = 'Controller';
		$action = 'notFound';

		if(isset($bits[1]) && preg_match('/facebook\.ferguson\.com/i', $bits[1])) {
			array_shift($bits);
		}
		
		// Determine controller
		if(isset($bits[2]) && ($bits[2] = strtolower(preg_replace('/\W/', '', $bits[2]))) != '') {
			$controller = ucwords(strtolower($bits[2])) .'Controller';
			if(!file_exists($siteroot .'/controllers/'. $controller .'.php')) {
				$controller = 'Controller';
			}
		}
		
		// Instantiate controller
		$controller = new $controller();
		
		// Determine method
		if(isset($bits[3]) && ($bits[3] = strtolower(preg_replace('/\W/', '', $bits[3]))) != '') {
			$action = strtolower($bits[3]);
			if(!method_exists($controller, $action)) {
				$controller = new Controller();
				$action = 'notFound';
			}
		}
		
		$controller->$action();
	}
}