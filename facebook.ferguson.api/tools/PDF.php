<?php
/**
 * @desc PDF Generation Class. Uses FPDF v1.7
 * @author Shawn Melton <shawn.melton@gmail.com>
 */
require_once dirname(dirname(__FILE__)) .'/fpdf/fpdf.php';

class PDF {
	private $pdf;
	private $imgPath;
	private $style;
	private $userName;
	private $firstName;

	private function init() {
		$this->pdf = new FPDF('P', 'mm');
		$this->pdf->SetAuthor('Ferguson Bath, Kitchen & Lighting Gallery');
		$this->pdf->SetCreator('Sway Creative Labs');
		$this->pdf->SetTitle('See My Results');
		$this->pdf->AddFont('myriadpro', '', 'MyriadPro-Regular.php');
		$this->pdf->AddFont('myriadpro-bold', '', 'MyriadPro-Bold.php');

		$this->imgPath = dirname(dirname(dirname(__FILE__))) .'/httpdocs/img';
		if(!file_exists($this->imgPath)) {
			$this->imgPath = dirname(dirname(dirname(__FILE__))) .'/facebook.ferguson.com/img';
		}
	}

	public function generate() {
		$this->init();

		$this->pdf->AddPage();
		$this->pdf->Image($this->imgPath .'/'. $this->style .'/bg.png', 10, 10, 190);
		$this->pdf->Image($this->imgPath .'/logo.png', 10, 10);

		$this->pdf->SetY(25);

		$this->pdf->SetFont('myriadpro-bold', '', 38);
		$this->pdf->SetTextColor(1, 71, 107);
		$this->pdf->MultiCell(0, 15, strtoupper($this->firstName .', You\'re '. $this->style), 0, 'C');

		// Description of users style
		$this->pdf->SetFont('myriadpro', '', 12);
		$this->pdf->SetTextColor(102, 102, 102);
		$this->pdf->SetXY(19, $this->pdf->GetY() + 5);
		$this->pdf->MultiCell(170, 6, $this->getStyleDescription(), 0, 'C');

		$this->pdf->Output('Ferguson-Results.pdf', 'I');
	}

	private function getStyleDescription() {
		switch($this->style) {
			case 'modern': return 'Sleek styling with European influences and an infusion of clean and sharp finishes suits you. Your Ferguson consultant can guide you through the endless modern design possibilities in our showrooms. Come by today and experience a gallery where you\'re the artist.';
			case 'traditional': return 'You show a preference for timeless designs that include simple, symmetrical lines, with elegant details. Visit your nearby Ferguson showroom today and let one of our consultants help you bring your masterpiece to life.';
		}

		// Transitional
		return 'Your tastes lie somewhere between traditional and contemporary looks, and your Ferguson consultant can help you merge those styles in a complimentary way. Visit a nearby Ferguson showroom and see, touch, and feel your home the way you want it, right now.';
	}

	public function out() {
		$this->pdf->Output('Ferguson-Results.pdf', 'I');
	}

	/**
	 * Set the user info (their selected style, first name and FB username)
	 */
	public function setInfo() {
		$info = array();
		if(isset($_SESSION['_userInfo']) && is_array($_SESSION['_userInfo']) && count($_SESSION['_userInfo'])) {
			$info = $_SESSION['_userInfo'];
		}

		$this->style = isset($info['style']) ? $info['style'] : '';
		$this->firstName = isset($info['firstName']) ? $info['firstName'] : '';
		$this->userName = isset($info['userName']) ? $info['userName'] : '';
	}

	public function showProducts($products) {
		$this->pdf->SetY($this->pdf->GetY() + 8);
		foreach($products as $product) {
			$this->pdf->Image($this->imgPath .'/'. $product['src'], 15, $this->pdf->GetY(), 50, 50);
			// title & description too
		}
	}

	public function showTop() {
		$this->init();

		$this->pdf->AddPage();
		$this->pdf->Image($this->imgPath .'/'. $this->style .'/bg.png', 10, 10, 190);
		$this->pdf->Image($this->imgPath .'/logo.png', 10, 10);

		$this->pdf->SetY(25);

		$this->pdf->SetFont('myriadpro-bold', '', 38);
		$this->pdf->SetTextColor(1, 71, 107);
		$this->pdf->MultiCell(0, 15, strtoupper($this->firstName .', You\'re '. $this->style), 0, 'C');

		// Description of users style
		$this->pdf->SetFont('myriadpro', '', 12);
		$this->pdf->SetTextColor(102, 102, 102);
		$this->pdf->SetXY(19, $this->pdf->GetY() + 5);
		$this->pdf->MultiCell(170, 6, $this->getStyleDescription(), 0, 'C');
	}
}