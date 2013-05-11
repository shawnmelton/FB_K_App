<?php
/**
 * @desc Products class
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Products {
	private static $list = array();

	public static function add($style, $type, $value, $title, $description) {
		self::$list[$style][$type][$value] = array(
			'title' => $title,
			'description' => $description,
			'src' => $style .'/'. $type .'/'. $value .'/product.jpg'
		);
	}

	public static function get($style, $type, $value) {
		if(isset(self::$list[$style]) && isset(self::$list[$style][$type]) && isset(self::$list[$style][$type][$value])) {
			return self::$list[$style][$type][$value];
		}

		return false;
	}

	public static function set() {
		// Modern
		self::add('modern', 'lights', 'high', 'Hudson Valley Lighting "Southport" Bathroom Light', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'lights', 'moderate', 'Brizo "Odin" 1 Bulb Wall Sconce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'lights', 'low', 'Minka Lighting "City Square" 3 Bulb Bathroom Light', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'fixtures-faucets', 'high', 'Grohe "Thermo Valve" Showerhead', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'fixtures-faucets', 'moderate', 'Pfister "Saxton" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'fixtures-faucets', 'low', 'Moen "90 Degree" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'accessories', 'gold', 'Grohe "Atrio" Toilet Paper Holder', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'accessories', 'silver', 'Brizo "Odin" Towel Ring', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'accessories', 'other', 'Moen "90 Degree" Towel Bar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'toilets', 'high', 'Kohler "Reve" One Piece Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'toilets', 'moderate', 'Kohler "Veil" Wall Hung Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'toilets', 'low', 'Kohler "Persuade Circ" Two Piece Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'baths-showers', 'gold', 'Kohler "Reve" Freestanding Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'baths-showers', 'silver', 'Kohler "Expanse" Soaking Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('modern', 'baths-showers', 'other', 'Kohler "Escale" Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');

		// Traditional
		self::add('traditional', 'lights', 'high', 'Metropolitan 3 Bulb Bathroom Light', 'Classic as it is classy, this three bulb bathroom light in polished nickel from Metropolitan Lighting Fixture Co. exudes elegance.');
		self::add('traditional', 'lights', 'moderate', 'Feiss "Harvard"  3 Bulb Bathroom Light', 'Its classic three bulb look at a reasonable price makes the "Harvard" bathroom light ideal for any traditional canvas.');
		self::add('traditional', 'lights', 'low', 'Sea Gull "Sagemore" Two Bulb Bathroom Light', 'A classic feel at an affordable price; Sea Gull\'s "Sagemore" model brings your bathroom to life.');
		self::add('traditional', 'fixtures-faucets', 'high', 'Rohl "Palladian" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'fixtures-faucets', 'moderate', 'Delta "Cassidy" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'fixtures-faucets', 'low', 'Kohler "Coralais" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'accessories', 'gold', 'Rohl "Palladian" Towel Bar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'accessories', 'silver', 'Delta "Cassidy" Towel Bar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'accessories', 'other', 'Moen "Rothbury" Towel Bar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'toilets', 'high', 'Kohler "Kathryn" Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'toilets', 'moderate', 'Kohler "Bancroft" Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'toilets', 'low', 'Kohler "Devonshire" Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'baths-showers', 'gold', 'Kohler "Kathryn" Bubble Massage Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'baths-showers', 'silver', 'Kohler "Bancroft" Bubble Massage Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('traditional', 'baths-showers', 'other', 'Kohler "Devonshire" Bubble Massage Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
	
		// Transitional
		self::add('transitional', 'lights', 'high', 'Kohler "Margaux" 1 Bulb Wall Sconce', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'lights', 'moderate', 'Progress "Addison" 3 Bulb Bathroom Light', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'lights', 'low', 'Maxim "Conical" Two Bulb Bathroom Light', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'fixtures-faucets', 'high', 'Kohler "Margaux" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'fixtures-faucets', 'moderate', 'Delta "Addision" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'fixtures-faucets', 'low', 'Pfister "Park Avenue" Shower Faucet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'accessories', 'gold', 'Kohler "Margaux" Double Towel Bar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'accessories', 'silver', 'Delta "Addision" Towel Ring', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'accessories', 'other', 'Pfister "Park Avenue" Towel Ring', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'toilets', 'high', 'Kohler "San Raphael" One Piece Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'toilets', 'moderate', 'Kohler "Tresham" Two Piece Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'toilets', 'low', 'Kohler "Kelston" Two Piece Toilet', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'baths-showers', 'gold', 'Kohler "Archer" Vibracoustic Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'baths-showers', 'silver', 'Mirabelle "Provincetown" Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
		self::add('transitional', 'baths-showers', 'other', 'Kohler"Bellwether" Soaking Tub', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');	
	}
}