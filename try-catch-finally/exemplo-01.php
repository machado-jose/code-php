<?php 

	function verificaNome($nome){

		if(!$nome) throw new Exception("O dado Nome não foi informado", 4000);
		
		echo $nome."<br>";
	}

	try{

		//verificaNome("Gustavo");
		verificaNome("");

	}catch(Exception $e){

		echo json_encode(array(

			"message"=>$e->getMessage(),
			"line"=>$e->getLine(),
			"file"=>$e->getFile(),
			"code"=>$e->getCode()

		));

	}finally{

		echo "<br>O try foi disparado.";

	}

?>