<?php 

	$cep = "28110000";
	$link = "https://viacep.com.br/ws/$cep/json/";

	$ch = curl_init($link);

	// O valor 1 indica que espera uma resposta do servidor
	// O valor 0 não espera uma resposta, como no caso de uma notificação.
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

	// O valor 0 não exige a comprovação do certificado SSL
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$responses = curl_exec($ch);

	$data = json_decode($responses,true);

	print_r($data);

?>