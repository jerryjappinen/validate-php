<?php
error_reporting(E_ALL|E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '1');
mb_internal_encoding('UTF-8');
date_default_timezone_set('UTC');



// Basic variables
$sourcePath = '../source/';
$casePath = 'cases/';
$simpletestPath = 'simpletest/';



/**
* Run test suites
*/



// Allow selecting a selection of tests via GET parameters
$suite = array();
if (isset($_GET['suite']) and is_string($_GET['suite'])) {

	// Accept comma-separated list
	foreach (explode(',', $_GET['suite']) as $value) {
		if (is_string($value)) {
			$suite[] = $value;
		} else {
			break;
		}
	}
	unset($value);

}



// We have selected tests
$dir = $casePath.implode('/', $suite);
if (is_dir($dir) or is_file($dir.'.php')) {



	// Run tests
	try {

		// Load SimpleTest
		require_once 'baseline.php';
		require_once $simpletestPath.'autorun.php';

		// Load Source
		foreach (rglob_files($sourcePath, 'php') as $path) {
			require_once $path;
		}

		// Load test cases
		if (is_dir($dir)) {
			foreach (rglob_files($dir, 'php') as $path) {
				require_once $path;
			}
		} else if (is_file($dir.'.php')) {
			require_once $dir.'.php';
		}
		unset($path);



	// Everything went to shit, let's try to recover
	} catch (Exception $e) {
		echo '<h1>Major fail</h1>';
	}



} else {

	// Print a page about how sorry we are
	header('HTTP/1.1 404 Not Found');
	header('Content-Type: text/html; charset=utf-8');
	echo '<html><head><title>Tests</title></body>';
	echo '<h1>No test suite found</h1><p>Try one of these:</p><ul>';
	foreach (glob($casePath.'*', GLOB_ONLYDIR) as $path) {
		echo '<li><a href="?suite='.basename($path).'">'.basename($path).'</a></li>';
	}
	echo '</ul></body></html>';
	unset($path);
}
unset($dir);

die();

?>