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
	$oldpassword=$_POST['oldpassword'];
	$password=$_POST['password'];
	$conpassword=$_POST['conpassword'];

	$query1="SELECT * FROM officerlogin WHERE 1";
	$givenPass=mysqli_query($con,$query1);
	
	while($row=mysqli_fetch_assoc($givenPass))
	{



		if($row["username"] == $username and $row["password"] == $oldpassword and $password != $row['password'])
    	{

    		$query2="UPDATE `officerlogin` SET `password` = '$password' WHERE `username` = '$username'";
			$result2=$con->query($query2);
    		if ($result2==TRUE) 
			{
				
				$flag=1;
				echo "<script>alert('Login with new password.');</script>";
				echo file_get_contents("officer.html");

	
			}
			
			else
			{
				echo "error";
			}
    	}
    	else if($row["username"] == $username and $row["password"] == $oldpassword and $password == $row['password'])
			{
				echo "<script>alert('New password should be different than the current one.');</script>";
				echo file_get_contents("resetpassofficer.html");
				$flag=1;
				break;
			}

	}
	
	if($flag==0)
	{
				echo file_get_contents("incdetails.html");
	}



}
else
{
	
	echo file_get_contents("main.html");
  
}	 

?>