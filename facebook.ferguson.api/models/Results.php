<?php
/**
 * @desc Recommend products according to the selections made by the user.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Results {
	static private $userInfo = array();

	public static function determine() {
		if(!count(self::$userInfo)) {
			$cachedInfo = self::loadUserInfo();
			if($cachedInfo === false) {
				return array();
			}

			// Load cached data since there wasn't any info set.
			self::$userInfo = $cachedInfo;
		}
		
		Products::set();
		
		// Not showing lights as of yet.
		return array(
			Products::get(self::$userInfo['style'], 'accessories', self::$userInfo['cost']),
			Products::get(self::$userInfo['style'], 'baths-showers', self::$userInfo['space']),
			Products::get(self::$userInfo['style'], 'toilets', self::$userInfo['cost']),
			Products::get(self::$userInfo['style'], 'fixtures-faucets', self::$userInfo['function']),
			Products::get(self::$userInfo['style'], 'lights', self::$userInfo['cost']),
			Products::get(self::$userInfo['style'], 'sinks', self::$userInfo['cost'])
		);
	}

	/**
	 * Load the cached information, if it exists.
	 */
	private static function loadUserInfo() {
		if(isset($_SESSION['_userInfo']) && is_array($_SESSION['_userInfo']) && count($_SESSION['_userInfo'])) {
			return $_SESSION['_userInfo'];
		}

		return false;
	}

	public static function setUserInfo() {
		self::$userInfo = array(
			'firstName' => isset($_GET['firstName']) ? $_GET['firstName'] : '',
			'userName' => isset($_GET['userName']) ? $_GET['userName'] : '',
			'style' => isset($_GET['style']) ? strtolower($_GET['style']) : '',
			'space' => isset($_GET['space']) ? strtolower($_GET['space']) : '',
			'cost' => isset($_GET['cost']) ? strtolower($_GET['cost']) : '',
			'function' => isset($_GET['operation']) ? strtolower($_GET['operation']) : ''
		);

		// Cache user information in case user wants to download results
		$_SESSION['_userInfo'] = self::$userInfo;
	}
}