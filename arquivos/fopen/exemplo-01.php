<?php 

	$file = fopen("log.txt","a+");
	/*
		w+ => Cria um novo arquivo e ativa a função de escrita;
		a+ => Adiciona arquivo no final da linha
	*/
	fwrite($file,date("Y-m-d h:i:s")."\r\n");
	fclose($file);
	echo "Arquivo criado com sucesso!";

?>