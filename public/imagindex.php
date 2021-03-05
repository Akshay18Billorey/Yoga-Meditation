<?php
include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <?php
  if(isset($_POST['but_upload'])){
   $filename = $_FILES['file']['name'];
    $target_dir = "upload/";
    if($filename !='')
    //if($filename ! = '')
    {

      $target_file = $target_dir.basename($_FILES['file']['name']);

    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");

    if(in_array($extension,$extensions_arr)){
      $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
      $image ="data::image/".$extension.";base64,".$image_base64;

      if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
        $query = "insert into images(name,image) values('".$filename."','".$image."')";
        mysqli_query($con,$query);
      }

    }

  }
}
?>
</head>
<body>
<form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' />
  <input type='submit' value='Upload' name='but_upload'>
</form>
</body>
</html>



