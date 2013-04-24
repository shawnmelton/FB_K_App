<?php
/*!
 * @desc Facebook Framework instance.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */ 
class FB {
	private static $instance = false;

	/*!
	 * Have we established a connection to the Facebook Fwk?
	 * @return boolean
	 */
	public static function connect() {
		if(self::$instance === false) {
			self::init();
		}
	}

	public static function getInstance() {
		self::connect();
		return self::$instance;
	}

	/*!
	 * Initialize Facebook connection.
	 */
	public static function init() {
		self::$instance = new Facebook(array(
			'appId'  => APP_ID,
  			'secret' => APP_SECRET,
  			'cookie' => true
  		));
	}
}