<?php
class Results {
	public static function determine() {
		$style = isset($_GET['style']) ? strtolower($_GET['style']) : '';
		$color = isset($_GET['color']) ? strtolower($_GET['color']) : '';
		$cost = isset($_GET['cost']) ? strtolower($_GET['cost']) : '';
		$function = isset($_GET['operation']) ? strtolower($_GET['operation']) : '';
		return array(
			array(
				'src' => $style .'/sinks/'. $cost .'/product.png',
				'title' => ucwords($cost) .' Cost Sink',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			),
			array(
				'src' => $style .'/fixtures-faucets/'. $color .'/product.png',
				'title' => ucwords(str_replace('-', ' ', $color)) .' Fixture/Faucet',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			),
			array(
				'src' => $style .'/baths-showers/'. $function .'/product.png',
				'title' => ucwords($function) .' Function Bath/Shower',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			),
			array(
				'src' => $style .'/lights/'. $cost .'/product.png',
				'title' => ucwords($cost) .' Cost Lighting',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			),
			array(
				'src' => $style .'/accessories/'. $color .'/product.png',
				'title' => ucwords(str_replace('-', ' ', $color)) .' Accessory',
				'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'
			)
		);
	}
}