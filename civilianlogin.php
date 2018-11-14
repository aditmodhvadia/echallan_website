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

	$query="SELECT * FROM challan WHERE 1";
	$givenPass=mysqli_query($con,$query);

	$vehicleNo=$_POST['vehicleNo'];
	$licenseNo=$_POST['licenseNo'];
	


	while($row=mysqli_fetch_assoc($givenPass))
	{
		
   		if($row["regNo"] == $vehicleNo and $row["licenseNo"] == $licenseNo)
    	{

    		if ($flag!=1) 
    		{
    			echo file_get_contents("userdisp.html");
    			echo "<style type='text/css'>
		
	body {
  background-image: url('light6bg.jpg');
  background-size: cover;
  
  font-family: 'Nunito', sans-serif;
  color: #384047;
}
	
	#top {
		background-color: black;
		color: white;
	}
	
	.even {
		background-color: grey;
	}

	.odd {
		background-color: darkgrey;
	}

	.head
{
  margin-top: -9px; 
}

.trigger{
    display:none;
    font-family:arial,sans-serif;

}
.clearfix:before, .clearfix:after{content: '';display:table;}
.clearfix:after{ clear:both;}
.clearfix{ *zoom: 1;}

div.nav-menu{
    background:#333333;
    border-bottom:2px solid #777777;
    padding: 0 10px;
    margin: 0px;
    opacity: 0.80;
}

div.nav-menu ul{
    margin:0;
    padding:0;
}

div.nav-menu ul li{
    list-style:none;
    float:left;
}

div.nav-menu ul li a:link,
div.nav-menu ul li a:visited{
    display: block;
    font-size:90%;
    padding: 10px 25px 10px 25px;
    color:#efefef;
    text-decoration:none;
    text-align:center;
    font-weight:bold;
    font-family:arial,sans-serif;
    transition:all 0.3s ease-in-out;
    -webkit-transition:all 0.3s ease-in-out;
    -moz-transition:all 0.3s ease-in-out;
    
}
h2{
	color:white;
}
	
	</style>";

    			echo "<header class='head'>
    <div class='trigger'>Menu</div>
    <div class='nav-menu'>
        <ul class='clearfix'>
          <li><a href='main.html'>Home</a></li>
            <li style='float: right;''><a href='userflag.php'>Check another one</a></li>
            
        </ul>
    </div>
</header>";echo "<h2 align='center'>Your Challan</h2>";
echo "<br><br>";
    			echo "<table  border='0' align='center' cellspacing='3px' cellpadding='15px'><tr id='top'><th>Challan No</th><th>Issue Date</th><th>Fine</th><th>Place</th><th>Time</th><th>Registration Number</th><th>License Number</th><th>Violation Type</th><th>Status</th></tr>";
    		}

    		$flags=1;
    		$flag=1;
	    	$_SESSION["flag"] = "true";
			
			echo "<tr align='center'>";
			echo "<td class='odd'>" . $row['challanNo'] . "</td>";
			echo "<td class='even'>" . $row['issueDate'] . "</td>";
			echo "<td class='odd'>" . $row['fine'] . "</td>";
			echo "<td class='even'>" . $row['place'] . "</td>";
			echo "<td class='odd'>" . $row['time'] . "</td>";
			echo "<td class='even'>" . $row['regNo'] . "</td>";
			echo "<td class='odd'>" . $row['licenseNo'] . "</td>";
			echo "<td class='even'>" . $row['violationType'] . "</td>";
			echo "<td class='odd'>" . $row['Status'] . "</td>";
			echo "</tr>";
			

     	}
     	else if ($row["regNo"] == $vehicleNo or $row["licenseNo"] == $licenseNo) {
     		
     		$flag=2;
     		
     	}
     	else
     	{

     		$flag=3;
     	}
	}
	echo "</table>";
	if($flag==0 and $flags!=1)
	{
		echo file_get_contents("incdetails.html");
	}
	else if($flag==2 and $flags!=1)
	{
		echo "<script>alert('You have entered wrong details. Enter again.');</script>";
     		echo file_get_contents("user.html");
	}
	else if ($flag==3 and $flags!=1) {
			echo "<script>alert('You have no challans or you have entered the wrong details.');</script>";
     		echo file_get_contents("user.html");
	}

			
}
else
{
	
	echo file_get_contents("main.html");
  
}	 
?>