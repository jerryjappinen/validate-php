<?php

class TestOfString extends UnitTestCase {

	// Preserves whitespace
	function test_preservers_space_at_start () {
		$validate = new Validator();
		$string = ' foo';
		$this->assertTrue($validate->string($string) === $string);
	}
	function test_preservers_spaces_at_start () {
		$validate = new Validator();
		$string = '    foo';
		$this->assertTrue($validate->string($string) === $string);
	}
	function test_preservers_tab_at_start () {
		$validate = new Validator();
		$string = '	foo';
		$this->assertTrue($validate->string($string) === $string);
	}
	function test_preservers_tabs_at_start () {
		$validate = new Validator();
		$string = '		foo';
		$this->assertTrue($validate->string($string) === $string);
	}

}

?>