<?php
/**
 * @desc Question class
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class Question {
	private $placement;
	private $style;
	private $version;

	public function __construct($p, $s, $v) {
		$this->placement = $p;
		$this->style = $s;
		$this->version = $v;
	}

	/**
	 * Format the cost, color and function options to the necessary format.
	 */
	private function generateOptionsArr($options, $version, $folder) {
		return array(
			array(
				'name' => $options[$version - 1][0]['text'],
				'src' => strtolower($folder .'/'. $options[$version - 1][0]['value'] .'-v'. $version .'.png'),
				'value' => strtolower($options[$version - 1][0]['value'])
			),
			array(
				'name' => $options[$version - 1][1]['text'],
				'src' => strtolower($folder .'/'. $options[$version - 1][1]['value'] .'-v'. $version .'.png'),
				'value' => strtolower($options[$version - 1][1]['value'])
			),
			array(
				'name' => $options[$version - 1][2]['text'],
				'src' => strtolower($folder .'/'. $options[$version - 1][2]['value'] .'-v'. $version .'.png'),
				'value' => strtolower($options[$version - 1][2]['value'])
			)
		);
	}

	public function getArray() {
		return array(
			'heading' => $this->getHeading(),
			'subHeading' => $this->getSubheading(),
			'purpose' => $this->getPurpose(),
			'options' => $this->getOptions()
		);
	}

	/**
	 * Color Options are: Gold, Silver, Other.
	 */
	private function getColorOptions() {
		$options = array(
			array(
				array(
					'text' => 'Gold',
					'value' => 'gold'
				), array(
					'text' => 'Silver',
					'value' => 'silver'
				), array(
					'text' => 'Funky',
					'value' => 'other'
				)
			), array(
				array(
					'text' => 'Autumn',
					'value' => 'gold'
				), array(
					'text' => 'Winter',
					'value' => 'silver'
				), array(
					'text' => 'Spring',
					'value' => 'other'
				)
			), array(
				array(
					'text' => 'Warm Tones',
					'value' => 'gold'
				), array(
					'text' => 'Cold Tones',
					'value' => 'silver'
				), array(
					'text' => 'Bold tones',
					'value' => 'other'
				)
			), array(
				array(
					'text' => 'Saucer and plate',
					'value' => 'gold'
				), array(
					'text' => 'Stainless thermos',
					'value' => 'silver'
				), array(
					'text' => 'Crazy mug',
					'value' => 'other'
				)
			)
		);

		// Default to 1 if its out of scope.
		$version = !isset($options[$this->version - 1]) ? 1 : $this->version;
		return $this->generateOptionsArr($options, $version, 'questions/color');
	}

	/**
	 * Cost Options are: Low, High, Moderate.
	 */
	private function getCostOptions() {
		$options = array(
			array(
				array(
					'text' => 'Something quick at home',
					'value' => 'low'
				), array(
					'text' => '5-star restaurant',
					'value' => 'high'
				), array(
					'text' => 'A local eatery',
					'value' => 'moderate'
				)
			), array(
				array(
					'text' => 'Out on the lawn',
					'value' => 'low'
				), array(
					'text' => 'Backstage passes',
					'value' => 'high'
				), array(
					'text' => 'Row K, Seat 6',
					'value' => 'moderate'
				)
			), array(
				array(
					'text' => 'First class',
					'value' => 'high'
				), array(
					'text' => 'Coach',
					'value' => 'moderate'
				), array(
					'text' => '70 MPH on the highway',
					'value' => 'low'
				)
			)
		);

		// Default to 1 if its out of scope.
		$version = !isset($options[$this->version - 1]) ? 1 : $this->version;
		return $this->generateOptionsArr($options, $version, 'questions/cost');
	}

	private function getHeading() {
		switch($this->placement) {
		 	case 1: return 'An Expression Of You.';
		 	case 2: return 'Your Taste. Your Vision.';
		 	case 3: return 'A Choice All Your Own.';
		 	case 4: return 'Color To Canvas.';
		 	case 5: return 'Perfection Is Priceless.';
		 	case 6: return 'The Beauty In Every Day.';
		}
		
		return '';
	}

	private function getOptions() {
		switch($this->placement) {
			case 1:
			case 2:
			case 3: return $this->getStyleOptions();
			case 4:	return $this->getColorOptions();
			case 5:	return $this->getCostOptions();
			case 6: return $this->getOperationOptions();
		}

		return array();
	}

	/**
	 * Function Options are: Low, Moderate, High.
	 */
	private function getOperationOptions() {
		$options = array(
			array(
				array(
					'text' => 'Under 30 minutes',
					'value' => 'low'
				), array(
					'text' => '30 minutes to an hour',
					'value' => 'moderate'
				), array(
					'text' => 'Over an hour',
					'value' => 'high'
				)
			), array(
				array(
					'text' => 'Get in and get out',
					'value' => 'low'
				), array(
					'text' => 'Wash, rinse, and repeat',
					'value' => 'moderate'
				), array(
					'text' => 'Sing \'til the water runs cold',
					'value' => 'high'
				)
			), array(
				array(
					'text' => 'Almost never',
					'value' => 'high'
				), array(
					'text' => 'Every once in a while',
					'value' => 'moderate'
				), array(
					'text' => 'Every day',
					'value' => 'low'
				)
			), array(
				array(
					'text' => 'Almost never',
					'value' => 'low'
				), array(
					'text' => 'Every once in a while',
					'value' => 'moderate'
				), array(
					'text' => 'All the time',
					'value' => 'high'
				)
			)
		);

		// Default to 1 if its out of scope.
		$version = !isset($options[$this->version - 1]) ? 1 : $this->version;
		return $this->generateOptionsArr($options, $version, 'questions/function');
	}

	private function getPurpose() {
		switch($this->placement) {
		 	case 1:
		 	case 2:
		 	case 3: return 'style';
		 	case 4: return 'color';
		 	case 5: return 'cost';
		 	case 6: return 'operation';
		}
		
		return '';
	}

	/**
	 * Style options are presented as follows: Traditional, Modern, Transitional
	 */
	private function getStyleOptions() {
		$options = array(
			array(
				array(
					'text' => 'Roses',
					'value' => 'Traditional'
				), array(
					'text' => 'Orchids',
					'value' => 'modern'
				), array(
					'text' => 'Daises',
					'value' => 'transitional'
				)
			), array(
				array(
					'text' => 'A glass of red',
					'value' => 'Traditional'
				), array(
					'text' => 'A layered martini',
					'value' => 'modern'
				), array(
					'text' => 'A craft beer',
					'value' => 'transitional'
				)
			), array(
				array(
					'text' => 'Indie films',
					'value' => 'modern'
				), array(
					'text' => 'Dramas',
					'value' => 'traditional'
				), array(
					'text' => 'Romantic comedies',
					'value' => 'transitional'
				)
			), array(
				array(
					'text' => 'An island getaway',
					'value' => 'traditional'
				), array(
					'text' => 'An Italian vineyard tour',
					'value' => 'transitional'
				), array(
					'text' => 'New York Fashion Week',
					'value' => 'modern'
				)
			), array(
				array(
					'text' => 'At a beachouse with friends',
					'value' => 'transitional'
				), array(
					'text' => 'At home with the bubbly',
					'value' => 'traditional'
				), array(
					'text' => 'At an invite-only party',
					'value' => 'modern'
				)
			)
		);

		$index = ((($this->version - 1) * 3) + $this->placement) - 1;
		if($index >= count($options)) {
			$index %= count($options);
		}

		return $this->generateOptionsArr($options, ($index + 1), 'questions/style');
	}

	/**
	 * Rotate through the total headings, making sure we display a unique
	 * question set (3 questions) each time.
	 */
	private function getStyleSubheading() {
		$options = array(
			'I\'d most like to receive a bouquet of:',
			'On a night out with friends I\'ll order:',
			'My favorite flicks are usually:',
			'My dream vacation would be:',
			'I\'d rather spend New Year\'s Eve:'
		);

		$index = ((($this->version - 1) * 3) + $this->placement) - 1;
		if($index >= count($options)) {
			$index %= count($options);
		}

		return isset($options[$index]) ? $options[$index] : '';
	}

	private function getSubheading() {
		switch($this->placement) {
			case 1:
			case 2:
			case 3: return $this->getStyleSubheading();
			
			// Color
			case 4: 
				switch($this->version) {
					case 1: return 'My favorite pair of earrings are:';
					case 2: return 'My favorite season is:';
					case 3: return 'I typically go for:';
					case 4: return 'Which of these looks most like your coffee cup?';
				}

				return '';

			// Cost
			case 5: 
				switch($this->version) {
					case 1: return 'My typical dinner is:';
					case 2: return 'The type of tickets I usually purchase are:';
					case 3: return 'When I fly, I typically go:';
					case 4: return 'My typical dinner is:'; // Temporary fix since we are missing 4th heading for this category.
				}

				return '';

			// Function
			case 6: 
				switch($this->version) {
					case 1: return 'I spend about this much time getting ready:';
					case 2: return 'In the shower I usually:';
					case 3: return 'I take a bath:';
					case 4: return 'I enjoy massages:';
				}

				return '';

		}

		return '';
	}
}