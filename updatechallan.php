<?php
session_start();

$servername="localhost";
$dbname="e_challan";
$usernamedef="root";
$password="";

$conn=new mysqli("localhost","root","");
mysqli_select_db($conn,$dbname) or die(mysqli_error($conn));
if(!$conn)	
{
		echo"fail";
}
//$firstName= $lastName=$password=$address="";
$licenseNo = $_POST['licenseNo'];	
$challanNo = $_POST['challanNo'];

	
$sql1="UPDATE `challan` SET `status`='Paid' WHERE `challanNo`=$challanNo and `licenseNo`=$licenseNo";
$result1=$conn->query($sql1);

if($result1==TRUE)
{
	echo "<script>alert('Challan Updated.');</script>";
	echo file_get_contents('officerfunc.html');
}
else
{
	echo file_get_contents('updatechallan.html');
	echo "<script>alert('You entered wrong details. Enter again.');</script>";
}

?>