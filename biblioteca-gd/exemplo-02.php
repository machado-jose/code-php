<?php 

	function getImage($url){

		// Get the content
		$content = file_get_contents($url);

		// Create the file and fill with content
		$file = fopen("certificado.jpg", "w+");
		fwrite($file, $content);
		fclose($file);

	}

	// Download the image
	getImage("https://mp4-a.udemycdn.com/2017-03-08_23-10-39-713e03a316c779a61856ff22064930ba/original.jpg?WW_NyvXpvC9zT7A3ZEmQTD6fSjo__6evS6JxuDKdwazf0w56u-lg6YRchAi6YVmMLz60NUhUTHRMYAVt8NjltTjQdkzLt-AAP-M2ci81193TU3_yhqOAFlcxlSKDlw_eSWmxbGwMBWV-gaRYfQ7w8pXpdiWyG6G10sk8fULJtmQ");

	// Begin of the manipulation
	$image = imagecreatefromjpeg("certificado.jpg");

	$titleColor = imagecolorallocate($image, 0, 0, 0);
	$gray = imagecolorallocate($image, 100, 100, 100);

	imagestring($image, 5, 450, 150, "CERTIFICADO", $titleColor);
	imagestring($image, 5, 440, 350, "Belchior da Silva", $titleColor);
	imagestring($image, 5, 440, 370, utf8_decode("Concluído em: ").date('d/m/Y'), $gray);

	header("Content-Type: image/jpeg");
	
	// Último parâmetro é em porcentagem
	imagejpeg($image, "certificado-".date('d-m-Y').".jpg", 10);
	imagedestroy($image);


?>