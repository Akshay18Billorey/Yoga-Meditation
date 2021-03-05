<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');


		require "connect.php";
		//$data = json_decode(file_get_contents("php://input"),true);
        $data=$request->getParsedBody("php://input");

		$mail = $data['uemail'];

		$checkUser="SELECT * from users WHERE email='$mail'";
		$checkQuery=mysqli_query($con,$checkUser);

		if(mysqli_num_rows($checkQuery)>0){
			echo "1";

		}else{
			echo "0";
		}
		return $response;

		
		
	