<?php
/*!
 * @desc Format all JSON response messages the same.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class JSON {
	public static function response($msg, $code) {
		return json_encode(array(
			'response' => $msg,
			'code' => $code
		));
	}
}