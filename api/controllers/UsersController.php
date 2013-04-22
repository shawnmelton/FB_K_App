<?php
/*!
 * @desc Users UsersController
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class UsersController {
	public function get() {
		if(IN_DEV) { // Provide test data to mimic facebook api.
			echo JSON::response(array(
				'name' => 'John Doe'
			), 200);
			return;
		}

		$user = new User();
		echo JSON::response($user->get(), 200);
	}

	/*!
	 * Get the link needed for the user to login.
	 */
	public function loginUrl() {
		echo JSON::response(array(
			'url' => FB::getLoginUrl()
		), 200);
	}
}