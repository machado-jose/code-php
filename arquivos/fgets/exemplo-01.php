<?php 

	$filename = "original.csv";

	if(file_exists($filename)){

		$file = fopen($filename,"r");

		$headers = explode(",",fgets($file));

		$data = array();

		while($row = fgets($file)){

			$rowData = explode(",", $row);

			$tmp = array();

			for($i = 0; $i < count($headers); $i++){

				$tmp[$headers[$i]] = $rowData[$i];

			}

			array_push($data, $tmp);

		}

		echo json_encode($data);

		fclose($file);
	}

?>