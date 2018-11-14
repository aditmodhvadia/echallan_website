<?php

$servername="localhost";
$dbname="e_challan";
$username="root";
$password="";

$conn=new mysqli("localhost","root","");
mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
if(!$conn)	
{
		echo"fail";
}
$vehicleregno = $_POST['vreg'];	
$modelname = $_POST['modelname'];
$wheels = $_POST['wheels'];
$color = $_POST['color'];

$sql1="INSERT INTO `vehicle`(`regNo`, `model`, `wheels`, `color`) VALUES ('$vehicleregno','$modelname','$wheels','$color')";

$result1=$conn->query($sql1);

if($result1==TRUE)
{
	echo "<script>alert('Added Succesfully');</script>";
	echo file_get_contents('adminfunc.html');
}
else
{
	echo file_get_contents('incdetails.html');
}

?>