<?php
/**
 * @desc Showrooms Controller
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class ShowroomsController {
	/**
	 * Find the closest showroom to the user that is using the system.
	 * Expecting query string parameters city and state.
	 */
	public function find() {
		$city = isset($_GET['city']) ? $_GET['city'] : '';
		$state = isset($_GET['state']) ? $_GET['state'] : '';
		$geolocation = $this->getGeolocationInfo($city, $state);
		$result = array();
		if(is_array($geolocation)) {
			$sth = DB::get()->prepare('
				SELECT name, street_address, showrooms.city,
					showrooms.state, zip_code, url, (
					(
						ACOS(
							SIN(:lat * PI() / 180) * 
							SIN(lat * PI() / 180) + 
							COS(:lat * PI() / 180) * 
							COS(lat * PI() / 180) * 
							COS((:lng - lng) * PI() / 180)
						) * 180 / PI()
					) * 60 * 1.1515
				) AS distance 
				FROM zip_codes
					JOIN showrooms ON (code = SUBSTRING(zip_code, 1 ,5))
				HAVING distance <= 100
				ORDER BY distance ASC
				LIMIT 1
			');

			$sth->execute(array(
				':lat' => $geolocation['lat'],
				':lng' => $geolocation['lng']
			));

			if($sth->rowCount() > 0) {
				$result = $sth->fetch(PDO::FETCH_ASSOC);
			}
		}

		echo JSON::response($result, 200);
	}

	/**
	 * Get the latitude and longitude for a given city.
	 * @param String
	 * @param String
	 * @return array - return false if we were not able to match city/state.
	 */
	public function getGeolocationInfo($city, $state) {
		$sth = DB::get()->prepare('
			SELECT lat, lng
			FROM zip_codes
			WHERE city = :city
			AND abbr = :abbr
			LIMIT 1
		');

		$sth->execute(array(
			':city' => $city,
			':abbr' => $state
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