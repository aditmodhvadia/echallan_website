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
$licenseNo = $_POST['licenseNo'];

$sql="INSERT INTO `personvehicle`(`licenseNo`, `regNo`) VALUES ('$licenseNo','$vehicleregno')";

$result1=$conn->query($sql);

if($result1==TRUE)
{
	echo "<script>alert('Assigned Succesfully');</script>";
	echo file_get_contents('adminfunc.html');
}
else
{
	echo file_get_contents('incdetails.html');
}

?>