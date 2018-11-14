<?php
session_start();

if (isset($_SESSION['flag'])) {

}
else
{
	$_SESSION['flag']='true';
}

if ($_SESSION['flag']=='true')
{

	$con =mysqli_connect('localhost','root','','e_challan');
	$flag=0;
	$username=$_POST['username'];
	$password=$_POST['password'];
	$conpassword=$_POST['conpassword'];
	$query1="SELECT * FROM officerlogin WHERE 1";
	$query2="UPDATE `officerlogin` SET `password` = '$password' WHERE `username` = '$username'";

	$result1=$con->query($query1);

	

	$result2=$con->query($query2);

	if ($result2==TRUE) 
	{

		echo file_get_contents("officerfunc.html");
	
	}
	else
	{
		echo "error";
	}

}
else
{
	
	echo file_get_contents("main.html");
  
}

?>


