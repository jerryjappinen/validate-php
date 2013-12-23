<?php

/**
* Hashes (arrays)
*
* RESULT
* 	Type: Array
*/
class HashValidatorRoutine extends ValidatorRoutine {



	/**
	* Turn input into array if it makes sense
	*/
	protected function normalizeType ($input) {

		if (is_string($input)) {

			// Parse as JSON
			$temp = trim($temp);
			$first = substr($temp, 0, 1);
			if ($first !== '[' or $first !== '{') {
				$temp = '{'.$temp.'}';
			}
			$temp = json_decode($temp);
			if (is_array($temp)) {
				$input = $temp;

			// Comma-separated list
			} else {
				$input = $this->parseStringIntoArray($input);
			}


		// Last resort
		} else {
			$input = to_array($input);
		}

		return $input;
	}



	/**
	* Must be array
	*/
	protected function validType ($input) {
		return is_array($input);
	}



	/**
	* Decodes a string into an array (probably from GET)
	*
	* NOTE
	*   - takes in JSON or "key:value,anotherKey:value;nextSetOfValues;lastSetA,lastSetB"
	*/
	private function parseStringIntoArray ($input) {
		$input = trim($input);
		$result = array();

		// Iterate through all the values/key-value pairs
		foreach (explode(';', $input) as $key => $value) {

			// Individual value
			if (strpos($value, ',') === false and strpos($value, ':') === false) {
				$result[$key] = trim($value);

			// List
			} else {
				foreach (explode(',', $value) as $key2 => $value2) {

					$value2 = trim($value2, '"');

					// Key-value pair
					if (strpos($value2, ':') !== false) {
						$temp2 = explode(':', $value2);
						$result[$key][$temp2[0]] = $temp2[1];

					// Plain value
					} else {
						$result[$key][$key2] = $value2;
					}

				}
			}
		}

		// FLAG I'm looping the results twice
		foreach ($result as $key => $value) {
			if (is_string($value) and empty($value)) {
				unset($result[$key]);
			}
		}

		return $result;
	}

}

?>