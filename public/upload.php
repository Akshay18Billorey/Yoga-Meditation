<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
header('Content-Type: application/json');
header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type: application/json,Access-Control-Allow-Methods,Authorization, X-Requested-With');

require "connect.php";

 //if($_SERVER['REQUEST_METHOD']=='POST'){
        //$data=$request->getParsedBody("php://input");
 
 //Getting actual file name
 $name = $_FILES['photo']['name'];
 
 //Getting temporary file name stored in php tmp folder 
 $tmp_name = $_FILES['photo']['tmp_name'];
 
 //Path to store files on server
 $path = 'upload/';
 
 //checking file available or not 
 if(!empty($name)){
 //Moving file to temporary location to upload path 
 move_uploaded_file($tmp_name,$path.$name);

//  $sql = "INSERT INTO `images`(`image`)VALUES ('$name')";
// 		if (mysqli_query($con, $sql)) {
// 			echo "successfully !";
// 		}
// 		else {
// 		echo "Error: " . $sql . "" . mysqli_error($con);
// 	 }
 //Displaying success message 
 echo "Upload successfully";
 }else{
 //If file not selected displaying a message to choose a file 
 echo "Please choose a file";
 }
 //}



//  <?php

//  require_once 'connect.php';
 
//  use Slim\Http\Request;
//  use Slim\Http\Response;
//  use Slim\Http\UploadedFile;
 

 
// //  $container = $app->getContainer();
//  $upload_directory = '/upload';
 
//  $app->post('/', function(Request $request, Response $response) {
//      $directory = $this->get('upload_directory');
 
//      $uploadedFiles = $request->getUploadedFiles();
 
//      // handle single input with single file upload
//      $uploadedFile = $uploadedFiles['photo'];
//      if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
//          $filename = moveUploadedFile($directory, $uploadedFile);
//          $response->write('uploaded ' . $filename . '<br/>');
//      }
 
 
//      // handle multiple inputs with the same key
//     //  foreach ($uploadedFiles['example2'] as $uploadedFile) {
//     //      if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
//     //          $filename = moveUploadedFile($directory, $uploadedFile);
//     //          $response->write('uploaded ' . $filename . '<br/>');
//     //      }
//     //  }
 
//      // handle single input with multiple file uploads
//     //  foreach ($uploadedFiles['example3'] as $uploadedFile) {
//     //      if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
//     //          $filename = moveUploadedFile($directory, $uploadedFile);
//     //          $response->write('uploaded ' . $filename . '<br/>');
//     //      }
//     //  }
 
//  });
 
//  /**
//   * Moves the uploaded file to the upload directory and assigns it a unique name
//   * to avoid overwriting an existing uploaded file.
//   *
//   * @param string $directory directory to which the file is moved
//   * @param UploadedFile $uploadedFile file uploaded file to move
//   * @return string filename of moved file
//   */
//  function moveUploadedFile($directory, UploadedFile $uploadedFile)
//  {
//      $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
//      $basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
//      $filename = sprintf('%s.%0.8s', $basename, $extension);
 
//      $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
 
//      return $filename;
//  }
 

 