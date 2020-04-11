<?php 

//$email = $_POST['email'];

//var_dump($_POST);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(

	"secret"=> "6LfGh-gUAAAAAE4z9kvVJlkxoSvcSQgYCegnFnM0",
	"response"=> $_POST["g-recaptcha-response"],
	"remoteip"=> $_SERVER["REMOTE_ADDR"]

)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recaptcha = json_decode(curl_exec($ch), true);

curl_close($ch);

//var_dump($recaptcha);

($recaptcha['success'] === true) ? print_r($_POST['email']) : header("Location: formulario.html");
?>