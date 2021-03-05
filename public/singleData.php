<?php
	header('Content-Type: application/json');
	header('Access-Control-Allow-Origin:*');
	header('Access-Control-Allow-Methods: POST');
	header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');
		require "connect.php";

		$data = json_decode(file_get_contents("php://input"),true);
		var_dump($data);
		$User_id = $data['uid'];
		$sql = "SELECT * FROM  users WHERE Id = '$User_id'";
		$result = $con->query($sql);

		while($row = $result->fetch_assoc()){
			$data[]=$row;
		}
		echo json_encode($data);

	