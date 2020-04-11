<?php 

	function getImage($url){

		// Get the content
		$content = file_get_contents($url);

		// Create the file and fill with content
		$file = fopen("thumb.jpg", "w+");
		fwrite($file, $content);
		fclose($file);

	}

	getImage("https://mp4-a.udemycdn.com/2017-03-08_23-11-37-edcc8950b1fa9758c402b9d8aeedeceb/original.jpg?ndvlcefnPo53X_tbF5bonyKoG2nLc9VTDM9-7241R69ojP-OAP94qOy38iK5kA_dExn1xiDdfXguaIeNxmHTmIeIa9rMMBM0ZSG71Xndhc6ajYVWkec9NwQ1_cVmL4gghsGlQzOx-tKEAIMSwSv4QkCiclnQOlYE7M22wmS6WWg");

	$file = "thumb.jpg";

	//Obter as dimensões da imagem de origem
	list($old_width, $old_height) = getimagesize($file);

	// Configurar as novas dimensões da imagem
	$new_width = 256;
	$new_height = 256;

	// Criando as variáveis das imagens
	$old_image = imagecreatefromjpeg($file);
	$new_image = imagecreate($new_width, $new_height);

	// Redimensionando a imagem
	imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);

	header("Content-Type: image/jpeg");
	imagejpeg($new_image);
	imagedestroy($new_image);
	imagedestroy($old_image);

?>