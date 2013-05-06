<?php
/** 
 * This tool uses a zip_codes database table that should be fairly accurate.
 *
 * @desc Geolocation Tool
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Geolocator {
	private $city;
	private $state;

	public function __construct($city, $state) {
		$this->city = $city;
		$this->state = $state;
	}

	/**
	 * Locate a city by providing the geolocation information.
	 * @return array
	 */
	public function locate() {
		$sth = DB::get()->prepare('
			SELECT lat, lng
			FROM zip_codes
			WHERE city = :city
			AND abbr = :abbr
			LIMIT 1
		');

		$sth->execute(array(
			':city' => $this->city,
			':abbr' => $this->state
		));

		if($sth->rowCount() > 0) {
			$result = $sth->fetch(PDO::FETCH_OBJ);
			return array(
				'lat' => $result->lat,
				'lng' => $result->lng
			);
		}

		return false;
	}
}