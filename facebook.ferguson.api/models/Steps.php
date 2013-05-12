<?php
/*!
 * @desc Get the question information.
 */
class Steps {
	public static function get() {
		$placement = isset($_GET['placement']) ? intval($_GET['placement']) : 0;
		$style = isset($_GET['style']) ? strtolower($_GET['style']) : '';
		$version = isset($_GET['version']) ? intval($_GET['version']) : 1;

		$q = new Question($placement, $style, $version);
		return $q->getArray();
	}
}