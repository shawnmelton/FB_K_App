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
	public static function connected() {
		if(self::$instance === false) {
			self::init();
		}

		return true;
	}

	public static function getInstance() {
		return self::$instance;
	}

	/*!
	 * Get the account of the logged in user.
	 */
	public static function getLoginUrl() {
		if(self::connected()) {
			return self::$instance->getLoginLink();
		}

		return false;
	}

	/*!
	 * Get the account of the logged in user.
	 */
	public static function getUser() {
		if(self::connected()) {
			return self::$instance->getUser();
		}

		return false;
	}

	/*!
	 * Initialize Facebook connection.
	 */
	public static function init() {
		self::$instance = new Facebook(array(
			'appId'  => APP_ID,
  			'secret' => APP_SECRET
  		));
	}
}