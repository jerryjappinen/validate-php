<?php

/**
* List of IDs
*
* RESULT
* 	Type: Array
*   Stripped: Child arrays, keys; each item validated for ID
*/
class IdsValidatorRoutine extends QueueValidatorRoutine {



	// Child validator
	private $validate = null;
	public function __construct () {
		$this->validate = new Validator();
		return $this;
	}



	/**
	* Children are normalized, keys are removed
	*/
	protected function sanitizeInput ($input) {

		// Sanitize all children
		$result = array();
		foreach (array_flatten($input) as $value) {
			$value = $this->validate->id($value);
			if ($value) {
				$result[] = $value;
			}
		}

		return $result;
	}



}

?>