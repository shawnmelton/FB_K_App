<?php
/**
 * @desc Controller for displaying results based on user selections.
 * @author Shawn Melton <shawn.a.melton@gmail.com>
 */
class ResultsController {
	public function get() {
		echo JSON::response(Results::determine(), 200);
	}

	public function pdf() {
		$pdf = new PDF();
		$pdf->setStyle('transitional');
		$pdf->setUserInfo('John', 'john.doe');
		$pdf->generate();
	}
}