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
	public static connected() {
		if(self::$instance === false) {
			self::init();
		}

		return true;
	}

	/*!
	 * Get the account of the logged in user.
	 */
	public static getUser() {
		if(self::connected()) {
			return self::$instance->getUser();
		}

		return false;
	}

	/*!
	 * Initialize Facebook connection.
	 */
	public static init() {
		self::$instance = new Facebook(array(
			'appId'  => APP_ID,
  			'secret' => APP_SECRET
  		));
	}
}