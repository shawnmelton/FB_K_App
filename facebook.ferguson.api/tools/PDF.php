<?php
/**
 * @desc PDF Generation Class. Uses FPDF v1.7
 * @author Shawn Melton <shawn.melton@gmail.com>
 */
class PDF {
	private $pdf;
	private $style;
	private $userName;
	private $firstName;

	private function init() {
		$this->pdf = new FergusonFPDF('P', 'mm');
		$this->pdf->SetAuthor('Ferguson Bath, Kitchen & Lighting Gallery');
		$this->pdf->SetCreator('Sway Creative Labs');
		$this->pdf->SetTitle('See My Results');
		$this->pdf->AddFont('myriadpro', '', 'MyriadPro-Regular.php');
		$this->pdf->AddFont('myriadpro-bold', '', 'MyriadPro-Bold.php');
	}

	private function getStyleDescription() {
		switch($this->style) {
			case 'modern': return 'Sleek styling with European influences and an infusion of clean and sharp finishes suits you. Your Ferguson consultant can guide you through the endless modern design possibilities at any of our locations. Come by your local Ferguson Bath, Kitchen & Lighting Gallery showroom today and experience a gallery where you\'re the artist.';
			case 'traditional': return 'You show a preference for timeless designs that include simple, symmetrical lines, with elegant details. Visit your nearby Ferguson Bath, Kitchen & Lighting Gallery showroom today and let one of our consultants help you bring your masterpiece to life.';
		}

		// Transitional
		return 'Your tastes lie somewhere between traditional and contemporary, and your Ferguson consultant can help you merge those styles in a complementary way. Visit a nearby Ferguson Bath, Kitchen & Lighting Gallery showroom and see, touch, and feel your home the way you want it, right now.';
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
		} else {
			return false;
		}

		$this->style = isset($info['style']) ? $info['style'] : '';
		$this->firstName = isset($info['firstName']) ? $info['firstName'] : '';
		$this->userName = isset($info['userName']) ? $info['userName'] : '';
	}

	public function showProducts($products) {
		$this->pdf->SetY($this->pdf->GetY()-18); // First line fix.
		$this->pdf->SetFillColor(204, 204, 204);

		$currentX = 0;
		$currentY = 0;
		foreach($products as $index => $product) {
			if($index % 2 == 1) {
				$currentX = 115;
			} else {
				$currentX = 15;
				$currentY = $this->pdf->GetY() + (30 - ($index * 4));
			}

			$imgWidth = 35;
			$this->pdf->SetXY($currentX-0.5, $currentY-0.5);
			
			// border for image
			$this->pdf->Cell($imgWidth + 1, $imgWidth + 1, "", 0, 0, 'C', 1);
			$this->pdf->Image($this->pdf->getImagePath() .'/'. $product['src'], $currentX, $currentY, $imgWidth, $imgWidth);

			$this->pdf->SetXY($currentX + $imgWidth + 3, $currentY);
			$this->pdf->SetFont('myriadpro-bold', '', 11);
			$this->pdf->SetTextColor(1, 71, 107);
			$this->pdf->MultiCell(45, 4.5, $product['title'], 0, 'L');

			$this->pdf->SetXY($currentX + $imgWidth + 3, $this->pdf->GetY() + 4);
			$this->pdf->SetFont('myriadpro-bold', '', 11);
			$this->pdf->SetTextColor(153, 153, 153);
			$this->pdf->MultiCell(45, 4.5, 'Why?', 0, 'L');

			$this->pdf->SetXY($currentX + $imgWidth + 3, $this->pdf->GetY() + 1);
			$this->pdf->SetFont('myriadpro', '', 10);
			$this->pdf->SetTextColor(102, 102, 102);
			$this->pdf->MultiCell(45, 4, $product['description'], 0, 'L');
		}
	}

	public function showStyleIntro() {
		$this->init();

		$this->pdf->AddPage();
		$this->pdf->SetY(35);

		$this->pdf->SetFont('myriadpro-bold', '', 27);
		$this->pdf->SetTextColor(1, 71, 107);
		$this->pdf->MultiCell(0, 9, strtoupper($this->firstName .', You\'re '. $this->style), 0, 'C');

		// Description of users style
		$this->pdf->SetFont('myriadpro', '', 11.5);
		$this->pdf->SetTextColor(102, 102, 102);
		$this->pdf->SetXY(19, $this->pdf->GetY() + 5);
		$this->pdf->MultiCell(170, 5, $this->getStyleDescription(), 0, 'C');
	}
}