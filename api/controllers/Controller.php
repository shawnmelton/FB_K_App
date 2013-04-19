<?php
/*!
 * @desc Base controller that traffic will be routed to if it fails
 */
class Controller {
	/*!
	 * @desc 404 page
	 */
	public function notFound() {
		header('HTTP/1.0 404 Not Found');
		echo JSON::response('404 Not Found', false);
	}
}