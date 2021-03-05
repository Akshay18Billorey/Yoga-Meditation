<?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');

// //$app->post('/apiIns',function(Request $request, Response $response, array $args){
// 		require "connect.php";
// 		$data=$request->getParsedBody("php://input");
// 		$name = $data['uname'];
// 		$age = $data['uage'];
// 		// $user_pass = $data['upass'];
		
// 		$sql = "INSERT INTO `users`( `name`, `age`) VALUES ($name,$age)";
// 		$result = $con->query($sql);
// 		if($result){
// 			echo json_encode(array('message'=>'Student Recorded Inserted','status'=>true));
// 		}
// 		else
// 		{
// 			echo json_encode(array('message'=>'Student Recorded not Inserted','status'=>false));
// 		}
// 		return $response;
// //});
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');


		require "connect.php";
		//$data = json_decode(file_get_contents("php://input"),true);
        $data=$request->getParsedBody("php://input");
        
		$aname = $data['uname'];
		$amail = $data['uemail'];
		//$aage = $data['uage'];
		$apass = $data['upass'];
		//$sql = "INSERT INTO `users`( `name`, `age`) VALUES ($name,$age)";
		//$sql = "INSERT INTO users(name,email,age,password) VALUES ('$aname','$amail','$aage','$apass')";
		$sql = "INSERT INTO users(name,email,password) VALUES ('$aname','$amail','$apass')";
		$result = $con->query($sql);
		if($result){
			// echo "1";
			echo json_encode(array('name'=> $aname,'email'=> $amail), JSON_PRETTY_PRINT);
			
			//echo json_encode(array('data'));
			// return 1;
			
		}
		else
		{
			echo json_encode(array('message'=>'Student Recorded not Inserted','status'=>false));
			// return 0;
			echo "0";
		}
		return $response;
