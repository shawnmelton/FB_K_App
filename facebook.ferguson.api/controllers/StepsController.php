<?php
/*!
 * @desc Steps Controller
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class StepsController {
	public function load() {
		echo JSON::response(Steps::get(), 200);
	}
}