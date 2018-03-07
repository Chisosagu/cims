
<html class='w3-padding-jumbo' style="margin-top: 10px";>

<head>
<title> MOUNTVIEW IDEA MANAGEMENT SYSTEM</title>
<link rel="stylesheet" href="App\css\w3.css" type="text/css"/>
</head>

<body>
<img src="App/images/art.jpg" style= "width:100%"height=25%"/>

</br>
</br>
<div class='w3-panel w3-blue w3-card-8 w3-medium'>
<h1 class='w3-xlarge w3-text-shadow'>MOUNTVIEW IDEA MANAGEMENT SYSTEM</h1>
</div>
</br>

</br>

<h3 class='w3-xlarge w3-text-shadow'>User Account Sign up</h3>

 
<fieldset>
	
	<form class='w3-form w3-padding w3-left' action="UserReg.php" method="POST">
	
	<table>
	
	<tr>
	<th style="float:right">User Name</th>
	<td>
	<input type="text"  name="username">
	</td>
	</tr>	
	
	<tr>
	<th style="float:right">Password</th>
	<td>
	<input type="password"  name="password">
	</td>
	</tr>	
	
	<tr>
	<th style="float:right">Role</th>
	<td>
	<input type="text"  name="role">
    </td>
	</tr>
	
   	</table>
	
	</br><input Class='w3-btn w3-round w3-center' type="submit" value="Signup" name="Signup">
	</table>
	
	
	</fieldset>
</div>



</br>

</div>

<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>    
  
<?php
  
  if (isset($_POST['Signup']))
	{
	  $username = $_POST['username'];
	  $password = $_POST['password'];
	  $role = $_POST['role'];
	   
	$con = new mysqli("Localhost","root","","IdeaManagement");
	  	  
		  
		 $result = $con->query("SELECT * FROM Users");
		 
		 $count = $result->num_rows;
		  
		  		   
		   if ($count===0)
		   {
			   $newId = '100';
			   
			    $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO Users (UserId,UserName,Password,Role) VALUES(?,?,?,?)");
					  $statement->bind_param('isss',$newId,$username,$password,$role);
					   
					   $statement->execute();
			   
		   }
		   else
		   {
			      $result = $con->query("SELECT max(UserId) FROM Users");
		 
						 $gotId = $result->fetch_row();
						  				  
						  $newId = $gotId[0];
						  
						  $newId = $newId + 1;
							
					  $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO Users (UserId,UserName,Password,Role) VALUES(?,?,?,?)");
					  $statement->bind_param('isss',$newId,$username,$password,$role);
					   
					   $statement->execute();
					   
					Header("Location:index.php");   
		   } 
	
   }

 
?>  


</body>
</html>