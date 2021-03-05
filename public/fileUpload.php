<?php 
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST");


include "connect.php"; 
// $data=$request->getParsedBody("php://input");
// $_FILES['avatar'] = 
$response = array();
$upload_dir = 'upload/';
$server_url = 'http://localhost:8080/';

if($_FILES['avatar'])
{
    $avatar_name = $_FILES["avatar"]["name"];
    $avatar_tmp_name = $_FILES["avatar"]["tmp_name"];
    $error = $_FILES["avatar"]["error"];

    if($error > 0){
        $response = array(
            "status" => "error",
            "error" => true,
            "message" => "Error uploading the file!"
        );
    }else 
    {
        //$random_name = rand(1000,1000000)."-".$avatar_name;
        // $upload_name = $upload_dir.strtolower($random_name);
        $upload_name = $upload_dir.strtolower($avatar_name);
        //$upload_name = preg_replace('/\s+/', '-', $upload_name);
        //echo $avatar_name;
        // var_dump ($random_name);

        // var_dump ($avatar_name);
        // var_dump ($upload_name);
        $query = "insert into images(name,image) values('".$avatar_name."','".$upload_name."')";
        
        mysqli_query($con,$query);
        if(move_uploaded_file($avatar_tmp_name , $upload_name)) {
           
            $response = array(
                "status" => "success",
                
                "error" => false,
                "message" => "File uploaded successfully",
                "url" => $server_url."".$upload_name
              );
        }else
        {
            $response = array(
                "status" => "error",
                "error" => true,
                "message" => "Error uploading the file!"
            );
        }
    }
}else{
    $response = array(
        "status" => "error",
        "error" => true,
        "message" => "No file was sent!"
    );
}

echo json_encode($response);
?>