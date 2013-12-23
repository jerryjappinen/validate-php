<?php

/**
* JSON (extends String)
*
* RESULT
* 	Type: String, valid JSON
*/
class JsonValidatorRoutine extends StringValidatorRoutine {



	/**
	* Override String's type normalization
	*/
	protected function normalizeType ($input) {
		return $input;
	}
	protected function validType ($input) {
		return true;
	}



	/**
	* Attempt to parse as JSON
	*/
	protected function sanitizeInput ($input) {
		return json_encode($input);
	}



	/**
	* Must be valid JSON
	*/
	protected function validInput ($input) {
		$valid = json_decode($input);
		return (json_last_error() == JSON_ERROR_NONE);
	}



}

?>