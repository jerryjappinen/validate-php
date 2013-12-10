<?php

$string = '


dsklds

adsdsaasdd as       daop asdkps adpokasdpkads

	ads as dasasd     asddasda 		  asddads 	
dadsa';

$string = 'foo@bar.com';

$dump = array(

	$validate->email($string),
	// $validate->base64($string),
	// $validate->string($string),
	// $validate->fulltext($string),
	// $validate->oneliner($string),

);

// $dump = rglob('../source/');
?>