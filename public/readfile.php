<!DOCTYPE html>
<html>
<head>
  <title>Fetch image from database in PHP</title>
</head>
<body>

<h2>All Records</h2>

<table border="2">
  <tr>
    <td>Sr.No.</td>
    <td>Name</td>
    <td>Images</td>
  </tr>

<?php

include "connect.php"; // Using database connection file here

$records = mysqli_query($con,"select * from images"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><img src="<?php echo $data['image']; ?>" width="300" height="300"></td>
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($con);  // close connection ?>

</body>
</html>