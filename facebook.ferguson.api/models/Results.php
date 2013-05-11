<?php
/**
 * @desc Recommend products according to the selections made by the user.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Results {
	public static function determine() {
		$style = isset($_GET['style']) ? strtolower($_GET['style']) : '';
		$color = isset($_GET['color']) ? strtolower($_GET['color']) : '';
		$cost = isset($_GET['cost']) ? strtolower($_GET['cost']) : '';
		$function = isset($_GET['operation']) ? strtolower($_GET['operation']) : '';
		
		Products::set();
		
		// Not showing lights as of yet.
		return array(
			Products::get($style, 'lights', $cost),
			Products::get($style, 'fixtures-faucets', $function),
			Products::get($style, 'toilets', $cost),
			Products::get($style, 'baths-showers', $color),
			Products::get($style, 'accessories', $color)
		);
	}
}