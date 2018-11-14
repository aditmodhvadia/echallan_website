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
	$_SESSION['login_user']= $username; 
	$query="SELECT * FROM officerlogin WHERE 1";
	$givenPass=mysqli_query($con,$query);
	
	while($row=mysqli_fetch_assoc($givenPass))
	{

   		if($row["username"] == $username and $row["password"] == $password and $row["password"] !="")
    	{
    		$flag=1;
    		
    		$_SESSION["flag"] = "true";
        	echo file_get_contents("officerfunc.html");
     	}
	}
	if($flag==0)

    	echo file_get_contents("incdetails.html");
		
}
else
{
	
	echo file_get_contents("main.html");
  
}

?>