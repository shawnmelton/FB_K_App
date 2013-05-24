<?php
/**
 * @desc Ferguson specific FPDF Class. Uses FPDF v1.7
 * @author Shawn Melton <shawn.melton@gmail.com>
 */
require_once dirname(dirname(__FILE__)) .'/fpdf/fpdf.php';

class FergusonFPDF extends FPDF {
	private $imgPath = false;

	/**
	 * Build the footer for Ferguson PDFs.
	 */
	public function Footer() {
		// Ferguson showroom text.
		$this->SetFont('myriadpro', '', 11.5);
		$this->SetTextColor(102, 102, 102);
		$this->SetXY(19, $this->GetY() + 22);
		$this->MultiCell(170, 5, 'Experience a gallery where you are the artist. Where you can see, touch, and feel your home the way you want it, right now. All the latest appliances. Gorgeous sinks and faucets. Brilliant lighting. Plus, the product expertise that makes it easy to turn your vision into reality.', 0, 'C');

		$this->Image($this->getImagePath() .'/pdf-footer.png', 10, $this->GetY() + 3, 190);
	}

	/**
	 * Get the path to images for this specific site.
	 */
	public function getImagePath() {
		if($this->imgPath === false) {
			$this->imgPath = dirname(dirname(dirname(__FILE__))) .'/httpdocs/img';
			if(!file_exists($this->imgPath)) {
				$this->imgPath = dirname(dirname(dirname(__FILE__))) .'/facebook.ferguson.com/img';
			}
		}

		return $this->imgPath;
	}

	public function Header() {
		$this->Image($this->getImagePath() .'/pdf-header.png', 10, 10, 190);
	}
}