<?php
/*!
 * @desc User class that's a wrapper for Facebook user object.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class User {
	private $instance;
	private $info;

	public function User() {
		$this->instance = FB::getUser();
		try {
			$this->info = FB::getInstance()->api('/me');
		} catch(FacebookApiException $e) {}
	}

	/*!
	 * Get the name of the user that is logged in.
	 */
	public function get() {
		if(is_array($this->info)) {
			return $this->info;
		}

		return '';
	}

	/*!
	 * Is the current user logged in?
	 * @return boolean
	 */
	public function isLoggedIn() {
		return ($this->instance !== false && is_array($this->info) && count($this->info));
	}
}