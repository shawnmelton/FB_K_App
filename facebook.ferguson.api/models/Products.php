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
		self::add('modern', 'lights', 'high', 'gold product coming soon ...', 'coming soon ...');
		self::add('modern', 'lights', 'moderate', 'silver product coming soon ...', 'coming soon ...');
		self::add('modern', 'lights', 'low', 'other product coming soon ...', 'coming soon ...');
		self::add('modern', 'fixtures-faucets', 'high', 'GROHE ATRIO 19168000 THERMO VALVE TRIM; 27135000 SHOWERHEAD; 27414000 SHOWER ARM IN CHROME (MUST ORDER RI VALVE SEPARATE) CHROME FINISH', 'coming soon ...');
		self::add('modern', 'fixtures-faucets', 'moderate', 'Pfister PR898GLC/P0X8310A "Saxton" Single Handle Tub & Shower Faucet', 'coming soon ...');
		self::add('modern', 'fixtures-faucets', 'low', 'MOEN TS3715 SHOWER FAUCET IN CHROME (MUST ORDER VALVE SEPARATE)', 'coming soon ...');
		self::add('modern', 'accessories', 'gold', 'GROHE ATRIO 40313000 TOILET PAPER HOLDER IN CHROME', 'coming soon ...');
		self::add('modern', 'accessories', 'silver', 'BRIZO 694675PC ODIN TOWEL RING IN CHROME', 'coming soon ...');
		self::add('modern', 'accessories', 'other', 'MOEN YB8818 90 DEGREE 18" TOWEL BAR IN CHROME', 'coming soon ...');
		self::add('modern', 'toilets', 'high', 'KOHLER K3797 REVE TOILET IN WHITE', 'coming soon ...');
		self::add('modern', 'toilets', 'moderate', 'KOHLER K6299/K6284 VEIL WALL HUNG TOILET IN WHITE', 'coming soon ...');
		self::add('modern', 'toilets', 'low', 'KOHLER K3753 PERSUADE CIRC TOILET IN WHITE', 'coming soon ...');
		self::add('modern', 'baths-showers', 'gold', 'KOHLER K894-F62 REVE FREESTANDING TUB IN WHITE', 'coming soon ...');
		self::add('modern', 'baths-showers', 'silver', 'KOHLER EXPANSE K1118  BATH ONLY IN WHITE', 'coming soon ...');
		self::add('modern', 'baths-showers', 'other', 'Kohler K11344-0 "Escale"', 'coming soon ...');

		// Traditional
		self::add('traditional', 'lights', 'high', 'gold product coming soon ...', 'coming soon ...');
		self::add('traditional', 'lights', 'moderate', 'silver product coming soon ...', 'coming soon ...');
		self::add('traditional', 'lights', 'low', 'other product coming soon ...', 'coming soon ...');
		self::add('traditional', 'fixtures-faucets', 'high', 'ROHL PALLADIAN AKIT92LM SHOWER ONLY FAUCET IN POL NICKEL', 'coming soon ...');
		self::add('traditional', 'fixtures-faucets', 'moderate', 'DELTA T14297LHP/H795 CASSIDY SHOWER ONLY FAUCET', 'coming soon ...');
		self::add('traditional', 'fixtures-faucets', 'low', 'Kohler KT15611-7-CP "Coralais" Shower Faucet', 'coming soon ...');
		self::add('traditional', 'accessories', 'gold', 'ROHL PALLADIAN A688630 TOWEL BAR 30" POL NICKEL', 'coming soon ...');
		self::add('traditional', 'accessories', 'silver', 'DELTA 79724 CASSIDY 24" TOWEL BAR IN CHROME', 'coming soon ...');
		self::add('traditional', 'accessories', 'other', 'MOEN CSIYB8218CH ROTHBURY 24" TOWEL BAR IN CHROME', 'coming soon ...');
		self::add('traditional', 'toilets', 'high', 'KOHLER K3940 KATHRYN TOILET', 'coming soon ...');
		self::add('traditional', 'toilets', 'moderate', 'KOHLER K3827 BANCROFT TOILET', 'coming soon ...');
		self::add('traditional', 'toilets', 'low', 'KOHLER K3837 DEVONSHIRE TOILET', 'coming soon ...');
		self::add('traditional', 'baths-showers', 'gold', 'KOHLER K809-GO KATHRYN BUBBLE MASSAGE TUB IN WHITE', 'coming soon ...');
		self::add('traditional', 'baths-showers', 'silver', 'KOHLER BANCROFT K1158-H2 BUBBLE MASSAGE TUB', 'coming soon ...');
		self::add('traditional', 'baths-showers', 'other', 'KOHLER K1184 DEVONSHIRE BATH', 'coming soon ...');
	
		// Transitional
		self::add('transitional', 'lights', 'high', 'gold product coming soon ...', 'coming soon ...');
		self::add('transitional', 'lights', 'moderate', 'silver product coming soon ...', 'coming soon ...');
		self::add('transitional', 'lights', 'low', 'other product coming soon ...', 'coming soon ...');
		self::add('transitional', 'fixtures-faucets', 'high', 'KOHLER KT16234-4-CP MARGAUX SHOWER FAUCET IN CHROME (MUST ORDER RI VALVE SEPARATE)', 'coming soon ...');
		self::add('transitional', 'fixtures-faucets', 'moderate', 'DELTA T14292SS ADDISION SHOWER FAUCET IN SS (MUST ORDER RI VALVE SEPARATE)', 'coming soon ...');
		self::add('transitional', 'fixtures-faucets', 'low', 'PFISTER R897FEK PARK AVENUE SHOWER FCT TRIM  IN BRUSHED NICKEL (MUST ORDER RI VALVE OX8)', 'coming soon ...');
		self::add('transitional', 'accessories', 'gold', 'KOHLER K16253-CP MARGAUX DOUBLE TOWEL BAR IN CHROME', 'coming soon ...');
		self::add('transitional', 'accessories', 'silver', 'DELTA 79246SS ADDISON TOWEL RING IN SS', 'coming soon ...');
		self::add('transitional', 'accessories', 'other', 'PFISTER BRBFE1K PARK AVENUE TWL RING IN BRUSHED NICKEL', 'coming soon ...');
		self::add('transitional', 'toilets', 'high', 'Kohler K3597-NF-47 "San Raphael" One Piece Toilet', 'coming soon ...');
		self::add('transitional', 'toilets', 'moderate', 'KOHLER K3950 TRESHAM', 'coming soon ...');
		self::add('transitional', 'toilets', 'low', 'Kohler K3755-0 "Kelston" Two Piece Toilet', 'coming soon ...');
		self::add('transitional', 'baths-showers', 'gold', 'KOHLER K1124-VB ARCHER VIBRACOUSTIC BATH', 'coming soon ...');
		self::add('transitional', 'baths-showers', 'silver', 'Mirabelle MIRPRS6032RWH "Provincetown"', 'coming soon ...');
		self::add('transitional', 'baths-showers', 'other', 'KOHLER K1124-VB ARCHER VIBRACOUSTIC BATH', 'coming soon ...');	
	}
}