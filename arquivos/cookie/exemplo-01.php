<?php 

	$data = array(
		"empresa"=>"Home"
	);

	setcookie("NOME_DO_COOKIE",json_encode($data),time() + 3600);
	echo "Processo de criação do cookie feito!";
?>