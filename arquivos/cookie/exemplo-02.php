<?php 

	if(isset($_COOKIE["NOME_DO_COOKIE"])){

		$obj = json_decode($_COOKIE["NOME_DO_COOKIE"]);
		//var_dump($obj);
		echo $obj->empresa;

	}

?>