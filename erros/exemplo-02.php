<?php 
	// Tratando os notices
	
	// Função nativa
	// O ~ tem a função de negação
	// É possível alterar também no arquivo de configuração do apache.
	error_reporting(E_ALL & ~E_NOTICE);

	$nome = $_GET["nome"];
	echo $nome;
 ?>