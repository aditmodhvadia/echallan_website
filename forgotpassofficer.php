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
	$licenseno=$_POST['licenseno'];
	$password=$_POST['password'];
	$conpassword=$_POST['conpassword'];

	$query1="SELECT * FROM officerlogin WHERE 1";
	$givenPass=mysqli_query($con,$query1);
	
	while($row=mysqli_fetch_assoc($givenPass))
	{

		if($row["username"] == $username and $row["licenseNo"] == $licenseno)
    	{

    		$query2="UPDATE `officerlogin` SET `password` = '$password' WHERE `username` = '$username'";
			$result2=$con->query($query2);
    		if ($result2==TRUE) 
			{
				
				$flag=1;
				echo file_get_contents("officerfunc.html");
	
			}
			else
			{
				echo "error";
			}
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