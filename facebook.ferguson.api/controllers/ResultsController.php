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
		$pdf->setInfo();
		$pdf->showTop();
		$pdf->showProducts(Results::determine());
		$pdf->out();
	}
}