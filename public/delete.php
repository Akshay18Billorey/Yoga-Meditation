<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');

// $app->delete('/delete', function(){
       
//  require 'connect.php';

//  $data = json_decode(file_get_contents("php://input"),true);
//  $bid = $data['sid'];
//  $query = "DELETE from users WHERE book_id = $bid";
//  $result = $conn->query($query)or die ("failed");
// });
require "connect.php";
        $data = json_decode(file_get_contents("php://input"),true);
//		$data=$request->getParsedBody("php://input");
		$bid=$data['uid'];
		
		$sql = "DELETE from users WHERE id = $bid";
		echo $sql;
		$result = $con->query($sql);
		if($result){
			echo json_encode(array('message'=>'Recorded Deleted','status'=>true));
		}
		else
		{
			echo json_encode(array('message'=>'Recorded not Deleted','status'=>false));
		}
		return $response;