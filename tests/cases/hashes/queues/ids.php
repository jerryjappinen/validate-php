<?php

class TestOfIds extends UnitTestCase {

	function test_returns_empty_array () {
		$validate = new Validator();
		$value = array();
		return $this->assertTrue($validate->ids($value) === array());
	}

	function test_returns_empty_array_on_empty_string () {
		$validate = new Validator();
		$value = '';
		return $this->assertTrue($validate->ids($value) === array());
	}

	function test_returns_array_on_string () {
		$validate = new Validator();
		$value = 'foo';
		return $this->assertTrue($validate->ids($value) === array($value));
	}

	function test_returns_normalized_array_on_string () {
		$validate = new Validator();
		$value = '  foo  ';
		$normalized = 'foo';
		return $this->assertTrue($validate->ids($value) === $validate->ids($normalized));
	}

}

?>