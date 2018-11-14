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
$issueDate = $_POST['issueDate'];
$fine = $_POST['fine'];
$place = $_POST['place'];
$time = $_POST['time'];
$regNo = $_POST['regNo'];
$officerusername = $_SESSION['login_user'];
$violationType = $_POST['violationType'];
	
$sql1="INSERT INTO `challan` (`challanNo`, `issueDate`, `fine`, `place`, `time`, `regNo`, `licenseNo`, `officerusername`, `violationType`,`Status`) VALUES ('$challanNo','$issueDate',$fine,'$place','$time','$regNo','$licenseNo','$officerusername','$violationType','Unpaid')";
$result1=$conn->query($sql1);

if($result1==TRUE)
{
	echo "<script>alert('Challan Added.');</script>";
	echo file_get_contents('officerfunc.html');
}
else
{
	echo file_get_contents('addchallan.html');
	echo "<script>alert('You entered wrong details. Enter again.');</script>";
}

?>