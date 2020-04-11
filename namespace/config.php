<?php 

	spl_autoload_register(function($nameClass){

		$dirClass = "classes";
		//$filename = $dirClass. DIRECTORY_SEPARATOR . $nameClass . ".php";
		$filename = str_replace ("\\", "/", $dirClass . DIRECTORY_SEPARATOR . $nameClass . ".php");	//Se for usar ubuntu
		//print_r($filename);

		if(file_exists($filename)){
			require_once($filename);
		}

	});

?>