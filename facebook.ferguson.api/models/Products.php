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
		self::add('modern', 'lights', 'high', 'Hudson Valley Lighting "Southport" Bathroom Light', 'The "Southport" light by Hudson Valley presents a top-line and streamlined solution to illuminating your bathroom.');
		self::add('modern', 'lights', 'moderate', 'Brizo "Odin" 1 Bulb Wall Sconce', 'Brizo\'s "Odin" light sconce adds a contemporary touch to your modern canvas. ');
		self::add('modern', 'lights', 'low', 'Minka Lighting "City Square" 3 Bulb Bathroom Light', 'Minka Lighting\'s "City Square" breaks conventional design barriers without breaking the bank.');
		self::add('modern', 'fixtures-faucets', 'high', 'Grohe "Thermo Valve" Showerhead', 'This shower faucet by Grohe is perfect for the modern woman who expects both form and function.');
		self::add('modern', 'fixtures-faucets', 'moderate', 'Brizo "Odin" Shwoer Faucet', 'The "Odin" shower faucet by Brizo creates a modern aesthetic that enhances any bathroom.');
		self::add('modern', 'fixtures-faucets', 'low', 'Moen "90 Degree" Shower Faucet', 'The "90 Degree" faucet by Moen offers a minimalist and modern fit for your shower.');
		self::add('modern', 'accessories', 'high', 'Grohe "Atrio" Toilet Paper Holder', 'The Grohe "Atrio" toilet paper adds a chic modern aesthetic to your contemporary bathroom.');
		self::add('modern', 'accessories', 'moderate', 'Brizo "Odin" Towel Ring', 'The sleek design of the Brizo "Odin" toilet paper holder sets off any modern bathroom.');
		self::add('modern', 'accessories', 'low', 'Moen "90 Degree" Towel Bar', 'Moen\'s "90 Degree" towel bar is a smart choice to complete your modern looking bathroom.');
		self::add('modern', 'toilets', 'high', 'Kohler "Reve" One Piece Toilet', 'The geometric style of Kohler\'s "Reve" toilet adds a sculptural elegance to your bathroom.');
		self::add('modern', 'toilets', 'moderate', 'Kohler "Veil" Wall Hung Toilet', 'Kohler\'s "Veil" wall hung toilet saves space and water with its innovative and inspiring design.');
		self::add('modern', 'toilets', 'low', 'Kohler "Persuade Circ" Two Piece Toilet', 'The "Persuade Circ" toilet from Kohler lends a contemporary and cost-effective flare to your modern bathroom.');
		self::add('modern', 'baths-showers', 'gold', 'Kohler "Reve" Freestanding Tub', 'The striking "Reve" freestanding tub by Kohler accomodates a deep, relaxing soak for a modern woman.');
		self::add('modern', 'baths-showers', 'silver', 'Kohler "Escale" Tub', 'Simple but spacious, the "Escale" tub by Kohler offers a relaxing bath with a little extra room to soak.');
		self::add('modern', 'baths-showers', 'other', 'Kohler "Expanse" Soaking Tub', 'With its curved apron, the Kohler "Expanse" tub is a great choice for a compact bathroom.');

		// Traditional
		self::add('traditional', 'lights', 'high', 'Metropolitan 3 Bulb Bathroom Light', 'Classic as it is classy, this three bulb bathroom light in polished nickel from Metropolitan Lighting Fixture Co. exudes elegance.');
		self::add('traditional', 'lights', 'moderate', 'Feiss "Harvard"  3 Bulb Bathroom Light', 'Its classic three bulb look at a reasonable price makes the "Harvard" bathroom light ideal for any traditional canvas.');
		self::add('traditional', 'lights', 'low', 'Sea Gull "Sagemore" Two Bulb Bathroom Light', 'A classic feel at an affordable price; Sea Gull\'s "Sagemore" model brings your bathroom to life.');
		self::add('traditional', 'fixtures-faucets', 'high', 'Rohl "Palladian" Shower Faucet', 'The "Palladian" shower faucet by Rohl offers a timeless design but is functional enough to meet modern needs.');
		self::add('traditional', 'fixtures-faucets', 'moderate', 'Delta "Cassidy" Shower Faucet', 'The multiple spout options on Delta\'s "Cassidy" shower faucet makes it an obvious choice for any traditional bathroom. ');
		self::add('traditional', 'fixtures-faucets', 'low', 'Moen "Rothbury" Shower Faucet', 'Moen\'s "Rothbury" shower faucet brings a bold, no frills design to your traditional bathroom.');
		self::add('traditional', 'accessories', 'high', 'Rohl "Palladian" Towel Bar', 'The "Palladian" towel bar by Rohl adds a touch of class to complete any traditional bathroom.');
		self::add('traditional', 'accessories', 'moderate', 'Delta "Cassidy" Towel Bar', 'Delta\'s "Cassidy" towel bar makes for a perfect accessory to compliment a traditional style.');
		self::add('traditional', 'accessories', 'low', 'Moen "Rothbury" Towel Bar', 'The chrome sheen of the Moen "Rothbury" towel bar adds an elegant touch for just a modest cost.');
		self::add('traditional', 'toilets', 'high', 'Kohler "Kathryn" Toilet', 'The "Kathryn" toilet by Kohler takes its high-end design cues from the powder rooms of yesteryear.');
		self::add('traditional', 'toilets', 'moderate', 'Kohler "Bancroft" Toilet', 'Harkening back to 1900s sensibility and design, the "Bancroft" toilet by Kohler lets you make a statement for a reasonable price.');
		self::add('traditional', 'toilets', 'low', 'Kohler "Devonshire" Toilet', 'Reminiscent of old-world design, Kohler\'s "Devonshire" toilet makes a simple and striking statement in any traditional bathroom. ');
		self::add('traditional', 'baths-showers', 'gold', 'Kohler "Kathryn" Bubble Massage Tub', 'With tons of room to relax in, the "Kathryn" bubble massage is the perfect centerpiece to any classic bathroom.');
		self::add('traditional', 'baths-showers', 'silver', 'Kohler "Bancroft" Bubble Massage Tub', 'Kohler\'s "Bancroft" bubble massage tub adds comfort and class to any traditional bathroom motif.');
		self::add('traditional', 'baths-showers', 'other', 'Kohler "Devonshire" Bubble Massage Tub', 'Kohler\'s traditional "Devonshire" tub makes a big impression even in smaller spaces.');
	
		// Transitional
		self::add('transitional', 'lights', 'high', 'Kohler "Margaux" 1 Bulb Wall Sconce', 'Combining traditional edges with modern touches, "Margaux" by Kohler offers the best in bathroom brilliance.');
		self::add('transitional', 'lights', 'moderate', 'Progress "Addison" 3 Bulb Bathroom Light', 'Progress\' "Addison" bathroom light offers transitional style in a brushed nickel finish.');
		self::add('transitional', 'lights', 'low', 'Maxim "Conical" Two Bulb Bathroom Light', 'The "Conical" two bulb light from Maxim gives you the best of the timeless and the timely, all for an affordable price.');
		self::add('transitional', 'fixtures-faucets', 'high', 'Kohler "Margaux" Shower Faucet', 'Durable and stylish, the superior "Margaux" faucet by Kohler blends traditional design with modern accents.');
		self::add('transitional', 'fixtures-faucets', 'moderate', 'Delta "Addision" Shower Faucet', 'Quality engineering and great looks make the "Addison" faucet by Delta the perfect addition to any transitional bathroom.');
		self::add('transitional', 'fixtures-faucets', 'low', 'Pfister "Park Avenue" Shower Faucet', 'Pfister\'s "Park Avenue" shower faucet offers a unique and utilitarian design perfect for any transitional bath.');
		self::add('transitional', 'accessories', 'high', 'Kohler "Margaux" Double Towel Bar', 'Kohler\s "Margaux" chrome double towel bar adds the perfect detail to your transitional bathroom.');
		self::add('transitional', 'accessories', 'moderate', 'Delta "Addision" Towel Ring', 'The stainless steel "Addison" towel ring by Delta adds a distinct sheen to any transitional bathroom.');
		self::add('transitional', 'accessories', 'low', 'Pfister "Park Avenue" Towel Ring', 'The brushed nickel finished "Park Avenue" towel ring by Pfister is the perfect accessory to set off your bathroom.');
		self::add('transitional', 'toilets', 'high', 'Kohler "Archer" Toilet', 'Kohler\'s "Archer" toilet offers a seamless style that transcends most offerings in the transitional category.');
		self::add('transitional', 'toilets', 'moderate', 'Kohler "Tresham" Two Piece Toilet', '"Tresham" by Kohler is elegantly simplistic, offering you a just-right toilet at a just-right price.');
		self::add('transitional', 'toilets', 'low', 'Kohler "Kelston" Two Piece Toilet', 'The "Kelston" two-piece toilet by Kohler combines the old with the new at an affordable price.');
		self::add('transitional', 'baths-showers', 'gold', 'Kohler "Archer" Vibracoustic Tub', 'The "Archer" vibracoustic tub from Kohler serves as an impressive centerpiece to any transitional bathroom.');
		self::add('transitional', 'baths-showers', 'silver', 'Kohler "Bellwether" Soaking Tub', 'The "Bellwether" soaking tub by Kohler offers us that "just-right" fit to your transitional bathroom.');
		self::add('transitional', 'baths-showers', 'other', 'Kohler "Seaforth" Tub', 'The "Seaforth" tub by Kohler a durable choice for a wide range of transitional bathrooms.');
	}
}