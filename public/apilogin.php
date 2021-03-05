<?php

    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;

    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');


        require "connect.php";
        require "jwt.php";

        // $data = json_decode(file_get_contents("php://input"),true);
       $data = $request->getParsedBody("php://input");

        
        $email = $data['lemail'];
		$pass = $data['lpass'];

        $sql="SELECT * FROM users WHERE email='$email' and password='$pass'";
        $result=$con->query($sql);
        if($result->num_rows==0)
        {
           // echo json_encode(array('message'=>'Unsuccessfully login ','status'=>false));
           echo "0";
        }
        else
        {   

            $_SESSION["users"]=$result->fetch_assoc();
            $payloadArray = array();
            $payloadArray['userId'] = $_SESSION["users"]["id"];
            $payloadArray['name']   = $_SESSION["users"]["name"];
            $payloadArray['email']   = $_SESSION["users"]["email"];
            $payloadArray['age']   = $_SESSION["users"]["age"];
            $payloadArray['pass']   = $_SESSION["users"]["password"];
            
            $secret_key="Akbill05";
            $jwt = JWT::encode($payloadArray,$secret_key); 
            //echo json_encode(array('message'=>'successfully login ','jwt'=>$jwt , 'status'=>true));
            $returnArray = array('token' => $jwt);
            $jsonEncodedReturnArray = json_encode($returnArray, JSON_PRETTY_PRINT);
            echo $jsonEncodedReturnArray;

        }

       return $response;