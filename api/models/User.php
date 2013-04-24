<?php
/*!
 * @desc User class that's a wrapper for Facebook user object.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class User {
	private $info;

	public function User() {
		$user = FB::getInstance()->getUser();
		if($user || true) {
			try {
				$this->info = FB::getInstance()->api('/me');
			} catch(FacebookApiException $e) {}
		}
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
}