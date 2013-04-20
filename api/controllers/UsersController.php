<?php
/*!
 * @desc Users UsersController
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class UsersController {
	/*!
	 * Get the username for the user who is logged in.  If 
	 */
	public function authenticate() {
		$user = new User();
		echo JSON::response(($user->isLoggedIn() ? 1 : 0), 200);
	}

	public function get() {
		$user = new User();
		echo JSON::response($user->get(), 200);
	}

	/*!
	 * Get the link needed for the user to login.
	 */
	public function loginUrl() {
		echo JSON::response(FB::getLoginUrl(), 200);
	}
}