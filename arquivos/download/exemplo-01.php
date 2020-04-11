<?php 

	$link = "https://www.google.com.br/images/branding/googlelogo/2x/googlelogo_color_160x56dp.png";

	// A função file_get_contents pode receber uma URL ou um filename no
	// próprio servidor
	$content = file_get_contents($link);

	// Visualizar o conteúdo
	//var_dump($content);

	$parse = parse_url($link);
	// Visualizar as informações do link
	//var_dump($parse);

	$basename = basename($parse["path"]);
	// Visualizar o basename do arquivo
	//var_dump($basename);

	// Criando o arquivo para ser salvo no host
	$file = fopen($basename,"w+");
	fwrite($file,$content);
	fclose($file);

?>

<!-- Visualizando a imagem-->
<img src="<?=$basename?>">