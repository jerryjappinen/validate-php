<?php

/**
* Email (extend Strings)
*
* RESULT
* 	Type: String
* 	Stripped: all whitespace
*/
class EmailValidatorRoutine extends StringValidatorRoutine {



	/**
	* Trim all whitespace
	*/
	protected function sanitizeInput ($input) {
		return trim_whitespace($input);
	}



	/**
	* Must match email address format
	*/
	protected function validInput ($input) {
		return preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $input);
	}



}

?>