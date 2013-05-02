<?php
/*!
 * @desc Get the question information.
 */
class Steps {
	public static function get() {
		$number = isset($_GET['number']) ? intval($_GET['number']) : 0;
		$style = isset($_GET['style']) ? $_GET['style'] : false;
		switch($number) {
			case 1: return self::firstStep();
			case 2: return self::secondStep();
			case 3: return self::thirdStep();
			case 4: return self::fourthStep($style);
			case 5: return self::fifthStep($style);
			case 6: return self::sixthStep($style);
		}

		return array();
	}

	/**
	 * The first step will be used to determine style preference.
	 */
	public static function firstStep() {
		return array(
			'question' => 'First Style Question',
			'options' => array(
				array(
					'name' => 'Modern',
					'src' => 'modern/question-1.png',
					'value' => 'modern'
				),
				array(
					'name' => 'Transitional',
					'src' => 'transitional/question-1.png',
					'value' => 'transitional'
				),
				array(
					'name' => 'Traditional',
					'src' => 'traditional/question-1.png',
					'value' => 'traditional'
				)
			)
		);
	}

	/**
	 * The second step will be used to determine style preference.
	 */
	public static function secondStep() {
		return array(
			'question' => 'Second Style Question',
			'options' => array(
				array(
					'name' => 'Modern',
					'src' => 'modern/question-2.png',
					'value' => 'modern'
				),
				array(
					'name' => 'Transitional',
					'src' => 'transitional/question-2.png',
					'value' => 'transitional'
				),
				array(
					'name' => 'Traditional',
					'src' => 'traditional/question-2.png',
					'value' => 'traditional'
				)
			)
		);
	}

	/**
	 * The third step will be used to determine style preference.
	 */
	public static function thirdStep() {
		return array(
			'question' => 'Third Style Question',
			'options' => array(
				array(
					'name' => 'Modern',
					'src' => 'modern/question-3.png',
					'value' => 'modern'
				),
				array(
					'name' => 'Transitional',
					'src' => 'transitional/question-3.png',
					'value' => 'transitional'
				),
				array(
					'name' => 'Traditional',
					'src' => 'traditional/question-3.png',
					'value' => 'traditional'
				)
			)
		);
	}

	/**
	 * The fourth step will be used to determine color preference
	 */
	public static function fourthStep($style) {
		return array(
			'question' => 'Color Question',
			'options' => array(
				array(
					'name' => 'Brass',
					'src' => 'coming-soon.png',
					'value' => 'brass'
				),
				array(
					'name' => 'Stainless Steel',
					'src' => 'coming-soon.png',
					'value' => 'stainless-steel'
				),
				array(
					'name' => 'Other',
					'src' => 'coming-soon.png',
					'value' => 'other'
				)
			)
		);
	}

	/**
	 * The fourth step will be used to determine cost preference
	 */
	public static function fifthStep($style) {
		return array(
			'question' => 'Cost Question',
			'options' => array(
				array(
					'name' => 'High',
					'src' => 'coming-soon.png',
					'value' => 'high'
				),
				array(
					'name' => 'Moderate',
					'src' => 'coming-soon.png',
					'value' => 'moderate'
				),
				array(
					'name' => 'Low',
					'src' => 'coming-soon.png',
					'value' => 'low'
				)
			)
		);
	}

	/**
	 * The fourth step will be used to determine function preference
	 */
	public static function sixthStep($style) {
		return array(
			'question' => 'Function Question',
			'options' => array(
				array(
					'name' => 'High',
					'src' => 'coming-soon.png',
					'value' => 'high'
				),
				array(
					'name' => 'Moderate',
					'src' => 'coming-soon.png',
					'value' => 'moderate'
				),
				array(
					'name' => 'Low',
					'src' => 'coming-soon.png',
					'value' => 'low'
				)
			)
		);
	}
}