<?php
/*!
 * @desc Get the question information.
 */
class Steps {
	public static function get() {
		$number = isset($_GET['number']) ? intval($_GET['number']) : 0;
		$style = isset($_GET['style']) ? strtolower($_GET['style']) : '';
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
			'question' => 'An <span>Expression</span> Of You.',
			'purpose' => 'style',
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
			'question' => 'Your <span>Taste.</span> Your <span>Vision.</span>',
			'purpose' => 'style',
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
			'question' => 'A Choice <span>All Your Own.</span>',
			'purpose' => 'style',
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
			'question' => '<span>Color</span> To Canvas.',
			'purpose' => 'color',
			'options' => array(
				array(
					'name' => 'Gold',
					'src' => $style .'/color/gold.png',
					'value' => 'gold'
				),
				array(
					'name' => 'Silver',
					'src' => $style .'/color/silver.png',
					'value' => 'silver'
				),
				array(
					'name' => 'Other',
					'src' => $style .'/color/other.png',
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
			'question' => '<span>Perfection</span> Is Priceless.',
			'purpose' => 'cost',
			'options' => array(
				array(
					'name' => 'High',
					'src' => $style .'/cost/high.png',
					'value' => 'high'
				),
				array(
					'name' => 'Moderate',
					'src' => $style .'/cost/moderate.png',
					'value' => 'moderate'
				),
				array(
					'name' => 'Low',
					'src' => $style .'/cost/low.png',
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
			'question' => 'The <span>Beauty</span> In Every Day.',
			'purpose' => 'operation',
			'options' => array(
				array(
					'name' => 'High',
					'src' => $style .'/function/high.png',
					'value' => 'high'
				),
				array(
					'name' => 'Moderate',
					'src' => $style .'/function/moderate.png',
					'value' => 'moderate'
				),
				array(
					'name' => 'Low',
					'src' => $style .'/function/low.png',
					'value' => 'low'
				)
			)
		);
	}
}