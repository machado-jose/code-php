<?php 

// A função mcrypt está depreciada a partir do PHP 7.1

$data = array('nome'=>'Belchior');

define('SECRET', pack('a16', 'senha'));

$mcrypt = mycrypt_encrypt(

	MCRYPT_RIJNDAEL_128,
	SECRET,
	json_encode($data),
	MCRYPT_MODE_ECB

);

$final = base64_encode($mcrypt);
var_dump($final);

$string = mcrypt_decrypt(
	MCRYPT_RIJNDAEL_128,
	SECRET, 
	base64_decode($final), 
	MCRYPT_MODE_ECB
);

var_dump($string);

?>
