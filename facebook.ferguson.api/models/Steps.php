<?php
/*!
 * @desc Get the question information.
 */
class Steps {
	public static function get() {
		$placement = isset($_GET['placement']) ? intval($_GET['placement']) : 0;
		$style = isset($_GET['style']) ? strtolower($_GET['style']) : '';
		$versions = isset($_GET['versions']) ? explode(',', $_GET['versions']) : array();

		return (new Question($placement, $style, $versions))->getArray();
	}
}