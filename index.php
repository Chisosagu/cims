
<html class='w3-padding-jumbo' style="margin-top: 10px";>

<head>
<title> MOUNTVIEW IDEA MANAGEMENT SYSTEM</title>
<link rel="stylesheet" href="App\css\w3.css" type="text/css"/>
</head>

<body>

<?php

$con = mysqli_connect ("Localhost","root","");

 
$status  = mysqli_select_db($con,"IdeaManagement");


if ($status===true)
{
	
}
else if ($status===false)
{
	Header ("Location:setup.php");
}
?>


<img src="App/images/art.jpg" style= "width:100%"height=25%"/>

</br>
</br>

<div class='w3-panel w3-blue w3-card-8 w3-medium'>
<h1 class='w3-xlarge w3-text-shadow'>MOUNTVIEW IDEA MANAGEMENT SYSTEM</h1>
</div>
</br>



</br>
<h3 class='w3-center'> LOGIN DETAILS</h3>



<form action="index.php" method="POST" class='w3-center'>
		<div class="form-group">
		
		<label> Username</label></br>
		<input type="text" class="form-group" placeholder="enter username" name= "username" >
		</div>
		<div class="form-group">
		<label> Password</label></br>
		<input type="password" class="form-group" placeholder="enter password" name="password" >
		</div>
		
		</br>
		
		<input class='w3-btn w3-round w3-green' type="Submit" name="login" value ="login" >
		 <a href="userReg.php"> SignUp Now </a>
		
					
		
</form>


</br>
</br>
</br>
</br></br>
</br>
		

<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>

<?php
  
  
  if (isset($_POST['login']))
  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	  
	$con = new mysqli("Localhost","root","","IdeaManagement");
	  
	$result  = $con->query("SELECT Role FROM Users WHERE username ='$username'  AND password= '$password'");
	  
	  $type = $result->fetch_row();
	  $gotType =  $type[0];
	 	  	  
	   if ($gotType==="Staff")
	   {
		   $con= new mysqli ("localhost","root","","IdeaManagement");
		    $result  = $con->query("SELECT UserName FROM Users WHERE username ='$username'  AND password= '$password'
			AND Role = '$gotType'");
			$name = $result->fetch_row();
			
			$empname = $name[0];
			
			$_SESSION['name'] = $empname;
			
			 			
		   Header ('Location:EmployerPages/EmployerAcount.php');  
		     
	   }
	   
	   else if ($gotType==="Student")
	   {
		 
		   $con= new mysqli ("localhost","root","","IdeaManagement");
		    $result  = $con->query("SELECT UserName FROM Users WHERE username ='$username'  AND password= '$password'
			AND Role = '$gotType'");
		  	$name = $result->fetch_row();
			$stname = $name[0];
			
			$_SESSION['name'] = $stname;
			
			Header ('Location:App/Students/StudentPage.php');
	   }
	   else if ($gotType==="Admin")
	   {
		   $con= new mysqli ("localhost","root","","IdeaManagement");
		   $result  = $con->query("SELECT UserName FROM Users WHERE username ='$username'  AND password= '$password'
			AND Role = '$gotType'");
			$name = $result->fetch_row();
			
			$admname = $name[0];
			
			$_SESSION['name'] = $admname;
					
		   Header ('Location:AdminPages/Admin.php');
	   }
	   else
	   { 
echo ("Wrong Username or Password Please Try Again");
	   }
	  
  }

?>



 
	   

</body>

</html>