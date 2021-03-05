<?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// // header('Content-Type: application/x-www-form-urlencoded');
// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: PUT');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');

// $app->put('/apiUp',function(Request $request, Response $response, array $args){
// 		require "connect.php";

// 		// $data = json_decode(file_get_contents("php://input"),true);
// 		$data=$request->getParsedBody("php://input");
// 		$u_id=$data['uid'];
// 		$name = $data['uname'];
// 		$age = $data['uage'];
// 		// $user_pass = $data['upass'];
		
// 		$sql = "UPDATE `users` SET `name`=$name],`age`=$age WHERE `id`=$u_id";
// 		echo $sql;
// 		$result = $con->query($sql);
// 		if($result){
// 			echo json_encode(array('message'=>'Student Recorded Updated','status'=>true));
// 		}
// 		else
// 		{
// 			echo json_encode(array('message'=>'Student Recorded not Updated','status'=>false));
// 		}
// 		return $response;
// });



use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');


		require "connect.php";

		$data = json_decode(file_get_contents("php://input"),true);
//		$data=$request->getParsedBody("php://input");
		$b_id=$data['uid'];
		$name = $data['uname'];
		$age = $data['uage'];
		$pwd = $data['upass'];

		
		$sql = "UPDATE users SET name = '$name', age = '$age', password ='$pwd' WHERE id = '$b_id'";
		echo $sql;
		$result = $con->query($sql);
		if($result){
			echo json_encode(array('message'=>'Student Recorded Updated','status'=>true));
		}
		else
		{
			echo json_encode(array('message'=>'Student Recorded not Updated','status'=>false));
		}
		return $response;