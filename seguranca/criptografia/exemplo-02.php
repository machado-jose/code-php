<?php 

$data = array('nome'=>'Belchior');

define('SECRET', pack('a16', 'senha'));
define('SECRET_IV', pack('a16', 'senha'));

$openssl = openssl_encrypt(

	json_encode($data),
	'AES-128-CBC',
	SECRET,
	0,
	SECRET_IV

);

var_dump(base64_encode($openssl));

$string = openssl_decrypt($openssl, 'AES-128-CBC', SECRET, 0, SECRET_IV);
var_dump($string);

?>