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

	public function getArray() {
		return array(
			'heading' => $this->getHeading(),
			'subHeading' => $this->getSubheading(),
			'purpose' => $this->getPurpose(),
			'options' => $this->getOptions()
		);
	}

	private function getColorOptions() {
		return array(
			array(
				'name' => 'Gold',
				'src' => $this->style .'/color/gold-v'. $this->version .'.png',
				'value' => 'gold'
			),
			array(
				'name' => 'Silver',
				'src' => $this->style .'/color/silver-v'. $this->version .'.png',
				'value' => 'silver'
			),
			array(
				'name' => 'Other',
				'src' => $this->style .'/color/other-v'. $this->version .'.png',
				'value' => 'other'
			)
		);
	}

	private function getCostOptions() {
		return array(
			array(
				'name' => 'High',
				'src' => $this->style .'/cost/high-v'. $this->version .'.png',
				'value' => 'high'
			),
			array(
				'name' => 'Moderate',
				'src' => $this->style .'/cost/moderate-v'. $this->version .'.png',
				'value' => 'moderate'
			),
			array(
				'name' => 'Low',
				'src' => $this->style .'/cost/low-v'. $this->version .'.png',
				'value' => 'low'
			)
		);
	}

	private function getHeading() {
		switch($this->placement) {
		 	case 1: return 'An <span>Expression</span> Of You.';
		 	case 2: return 'Your <span>Taste.</span> Your <span>Vision.</span>';
		 	case 3: return 'A Choice <span>All Your Own.</span>';
		 	case 4: return '<span>Color</span> To Canvas.';
		 	case 5: return '<span>Perfection</span> Is Priceless.';
		 	case 6: return 'The <span>Beauty</span> In Every Day.';
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

	private function getOperationOptions() {
		return array(
			array(
				'name' => 'High',
				'src' => $this->style .'/cost/high-v'. $this->version .'.png',
				'value' => 'high'
			),
			array(
				'name' => 'Moderate',
				'src' => $this->style .'/cost/moderate-v'. $this->version .'.png',
				'value' => 'moderate'
			),
			array(
				'name' => 'Low',
				'src' => $this->style .'/cost/low-v'. $this->version .'.png',
				'value' => 'low'
			)
		);
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

	private function getStyleOptions() {
		return array(
			array(
				'name' => 'Modern',
				'src' => 'modern/question-'. $this->placement .'-v'. $this->version .'.png',
				'value' => 'modern'
			),
			array(
				'name' => 'Transitional',
				'src' => 'transitional/question-'. $this->placement .'-v'. $this->version .'.png',
				'value' => 'transitional'
			),
			array(
				'name' => 'Traditional',
				'src' => 'traditional/question-'. $this->placement .'-v'. $this->version .'.png',
				'value' => 'traditional'
			)
		);
	}

	private function getSubheading() {
		switch($this->placement) {
			case 1:
			case 2:
			case 3:
			case 5:
			case 6: return 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
			
			// Color
			case 4: return $this->version == 1 ? 
				'What color is most of your jewelry?' : 
				'Which is your favorite color pair of shoes?';
		}

		return '';
	}
}