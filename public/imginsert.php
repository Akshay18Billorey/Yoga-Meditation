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
        
		$aname = $data['uname'];
		$amail = $data['uemail'];
		$aage = $data['uage'];
		$apass = $data['upass'];
		//$sql = "INSERT INTO `users`( `name`, `age`) VALUES ($name,$age)";
		$sql = "INSERT INTO users(name,email,age,password) VALUES ('$aname','$amail','$aage','$apass')";
		$result = $con->query($sql);
		if($result){
			// echo "1";
			echo json_encode(array('name'=> $aname,'email'=> $amail,'age'=> $aage), JSON_PRETTY_PRINT);
			
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




       
$cn=mysqli_connect("localhost","root","","image") or die("Could not Connect My Sql");
$output_dir = "upload/";/* Path for file upload */
	$RandomNum   = time();
	$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][0]));
	$ImageType      = $_FILES['image']['type'][0];
 
	$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
	$ImageExt       = str_replace('.','',$ImageExt);
	$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
	$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
    $ret[$NewImageName]= $output_dir.$NewImageName;
	
	/* Try to create the directory if it does not exist */
	if (!file_exists($output_dir))
	{
		@mkdir($output_dir, 0777);
	}               
	move_uploaded_file($_FILES["image"]["tmp_name"][0],$output_dir."/".$NewImageName );
	     $sql = "INSERT INTO `img`(`image`)VALUES ('$NewImageName')";
		if (mysqli_query($cn, $sql)) {
			echo "successfully !";
		}
		else {
		echo "Error: " . $sql . "" . mysqli_error($cn);
	 }

?>