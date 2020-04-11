<?php 

	require_once("config.php");

	$sql = new Sql();

	$results = $sql->select("SELECT * FROM tb_usuario");

	$headers = array();

	foreach ($results[0] as $key => $value) {
		array_push($headers,ucfirst($key));
	}

	$file = fopen("tabela.csv", "w+");

	fwrite($file,implode(",",$headers)."\r\n");

	foreach ($results as $row) {

		$data = array();

		foreach ($row as $key => $value) {
			array_push($data,$value);
		}

		fwrite($file,implode(",",$data)."\r\n");
	}
	
	fclose($file);

	echo "Arquivo tabela.csv criado!";

?>