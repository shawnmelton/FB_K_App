<?php
/**
 * @desc Controller for displaying results based on user selections.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class ResultsController {
	public function get() {
		Results::setUserInfo();
		echo JSON::response(Results::determine(), 200);
	}

	public function pdf() {
		$pdf = new PDF();
		if($pdf->setInfo() === false) {
			$domain = preg_match('/facebook/i', $_SERVER['REQUEST_URI']) ? '/facebook.ferguson.com' : '';
			header('Location: '. $domain .'/session-expired');
			exit;
		}

		$pdf->showStyleIntro();
		$pdf->showProducts(Results::determine());
		$pdf->out();
	}
}