<!-- Por padrão, o form envia os dados no formato de string.
	 Com o atributo enctype="multipart/form-data", a tag form
	 enviará os dados no formato binário. É necessário para que
	 não ocorra um erro durante a execução do PHP.-->

<form method="POST" enctype="multipart/form-data">
	<input type="file" name="fileUpload">
	<button type="submit">Send</button>
</form>

<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$file = $_FILES["fileUpload"];

		//Visualizar o retorno da variável file
		//print_r($file); 

		if($file["error"]){

			throw new Exception("Erro:".$file["error"]);
			
		}

		$dirUploads = "upload";

		if(!is_dir($dirUploads)){

			mkdir($dirUploads);

		}

		// Função que enviar os arquivos para o servidor
		// O "tmp_name" contém o path do arquivo que 
		// o usuário deseja ser persistido. O PHP cria uma
		// pasta temporária chamada "tmp".
		if(move_uploaded_file($file["tmp_name"], $dirUploads . DIRECTORY_SEPARATOR . $file["name"])){

			echo "Envio do arquivo realizado com sucesso.";

		}else{

			throw new Exception("Erro ao realizar o envio do arquivo para o servidor.");
			
		}

	}

?>