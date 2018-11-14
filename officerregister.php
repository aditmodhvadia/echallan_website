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

$licenseNo = $_POST['licenseNo'];	
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$DOB = $_POST['DOB'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$username=$firstName.$lastName;
$sql1="INSERT INTO `personaldetails`(`licenseNo`, `firstName`, `lastName`, `DOB`, `phone`, `address`) VALUES ('$licenseNo','$firstName','$lastName','$DOB',$phone,'$address')";
$sql2="insert into officerlogin(licenseNo,username) values('$licenseNo','$username')";

$result1=$conn->query($sql1);
$result2=$conn->query($sql2);



if($result1==TRUE && $result2==TRUE)
{
	print_r("<script>alert('New Officer added')</script>");
	echo file_get_contents("adminfunc.html");

	
}
else
{
	echo "error";
}

?>