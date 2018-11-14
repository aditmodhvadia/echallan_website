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
//$firstName= $lastName=$password=$address="";
$licenseNo = $_POST['licenseNo'];	
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$DOB = $_POST['DOB'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql1="INSERT INTO `personaldetails`(`licenseNo`, `firstName`, `lastName`, `DOB`, `phone`, `address`) VALUES ('$licenseNo','$firstName','$lastName','$DOB',$phone,'$address')";

$result1=$conn->query($sql1);

if($result1==TRUE)
{
	echo "<script>alert('Registered Succesfully');</script>";
	echo file_get_contents('adminfunc.html');
}
else
{
	echo "error";
}

?>