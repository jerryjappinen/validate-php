<?php

/**
* ID (extend Strings)
*
* RESULT
* 	Type: String
* 	Stripped: all whitespace
*/
class IdValidatorRoutine extends StringValidatorRoutine {



	/**
	* Trim all whitespace
	*/
	protected function sanitizeInput ($input) {
		return trim_whitespace($input);
	}



}

?>