<?php 

	$image = imagecreatefromjpeg("certificado.jpg");

	$titleColor = imagecolorallocate($image, 0, 0, 0);
	$gray = imagecolorallocate($image, 100, 100, 100);

	// O terceiro parâmetro refere-se ao ângulo do texto
	imagettftext($image, 32, 0, 320, 250, $titleColor, "fonts".DIRECTORY_SEPARATOR."Bevan".DIRECTORY_SEPARATOR."Bevan-Regular.ttf", "CERTIFICADO");
	imagettftext($image, 32, 0, 375, 350, $titleColor, "fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf", "Belchior da Silva");
	imagestring($image, 5, 440, 370, utf8_decode("Concluído em: ").date('d/m/Y'), $gray);

	header("Content-Type: image/jpeg");
	
	imagejpeg($image);
	imagedestroy($image);

?>