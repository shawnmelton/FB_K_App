<?php
/*!
 * @desc User class that's a wrapper for Facebook user object.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class User {
	private $instance;

	public User() {
		$this->instance = FB::getUser();
	}

	/*!
	 * Is the current user logged in?
	 * @return boolean
	 */
	public function isLoggedIn() {
		if($this->instance !== false) {
			try {
				self::$instance->api('/me');
				return true;
			} catch(FacebookApiException $e) {}
		}

		return false;
	}
}