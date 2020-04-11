<?php 

	spl_autoload_register(function($className){

		$dirname = "classes";
		$filename = str_replace ("\\", "/", $dirname . DIRECTORY_SEPARATOR . $className . ".php");

		if(file_exists($filename)){

			require_once($filename);

		}

	});
	
?>