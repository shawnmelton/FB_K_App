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
		$http = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] == 1)) ? 'https' : 'http';
		echo JSON::response(array(
			'url' => FB::getInstance()->getLoginUrl(array(
				'redirect_uri' => $http .'://'. $_SERVER['HTTP_HOST'] .'/'
			))
		), 200);
	}
}