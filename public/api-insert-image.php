<?php
//$app->post('/image', function ($request, $response) {

    $files = $request->getUploadedFiles();
    $file = $files['image_image']; // uploaded file

    $parameters = $request->getParams(); // Other POST params

    $path = "/..../uploads/"."img-".date("Y-m-d-H-m-s").".jpg";

    if ($file->getError() === UPLOAD_ERR_OK) {

        $file->moveTo($path); // Save file

        // DB interactions here...

        $sql = "INSERT INTO images (name,image) VALUES (:item_name, :item_image)";

        $sth = $this->con->prepare($sql);
        $sth->bindParam("item_name", $input['name']);    
        $sth->bindParam("item_image", $input['image']); 

        // if statement is executed successfully, return id of the last inserted restaraunt
        if ($sth->execute()) {

            return $response->withJson($this->con->lastInsertId());

        } else {

            // else throw exception - Slim will return 500 error
            throw new \Exception('Failed to persist restaraunt');

        }

    } else {

        throw new \Exception('File upload error');

    }

//});
























// <?php
// use Psr\Http\Message\ResponseInterface as Response;
// use Psr\Http\Message\ServerRequestInterface as Request;
// header('Content-Type: application/json');
// header('Access-Control-Allow-Origin:*');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');


// 		require "connect.php";
// 		$data = json_decode(file_get_contents("php://input"),true);
//         //$data=$request->getParsedBody("php://input");
//         // if(isset($_POST['but_upload'])){
//             $filename = $data['name'];
// 		    $image = $data['file'];

//              //$filename = $_FILES['file']['name'];
//              $target_dir = "upload/";
//              if($filename !=''){
         
//              $target_file = $target_dir.basename($_FILES['file']['name']);
         
//              $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
         
//              $extensions_arr = array("jpg","jpeg","png","gif");
         
//              if(in_array($extension,$extensions_arr)){
//                $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
//                $image ="data::image/".$extension.";base64,".$image_base64;
         
//                if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
//                  $query = "insert into images(name,image) values('$filename','$image')";
//                  mysqli_query($con,$query);
//                }
         
//              }
         
//            }





		// $aname = $data['uname'];
		// $amail = $data['uemail'];
		// //$aage = $data['uage'];
		// $apass = $data['upass'];
		// //$sql = "INSERT INTO `users`( `name`, `age`) VALUES ($name,$age)";
		// //$sql = "INSERT INTO users(name,email,age,password) VALUES ('$aname','$amail','$aage','$apass')";
		// $sql = "INSERT INTO users(name,email,password) VALUES ('$aname','$amail','$apass')";
		// $result = $con->query($sql);
		// if($result){
		// 	// echo "1";
		// 	echo json_encode(array('name'=> $aname,'email'=> $amail), JSON_PRETTY_PRINT);
			
		// 	//echo json_encode(array('data'));
		// 	// return 1;
			
		// }
		// else
		// {
		// 	echo json_encode(array('message'=>'Student Recorded not Inserted','status'=>false));
		// 	// return 0;
		// 	echo "0";
		// }
		// return $response;public\api-insert-image.php
