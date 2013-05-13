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


		$this->pdf->Output('Ferguson-Results.pdf', 'I');
	}

	public function setStyle($style) {
		$this->style = $style;
	}

	public function setUserInfo($firstName, $userName) {
		$this->firstName = $firstName;
		$this->userName = $userName;
	}
}