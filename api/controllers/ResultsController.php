<?php
class ResultsController {
	public function get() {
		echo JSON::response(Results::determine(), 200);
	}
}