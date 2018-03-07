<html class='w3-padding-jumbo' style="margin-top: 10px";>

<head>
<title> MOUNTVIEW IDEA MANAGEMENT SYSTEM</title>
<link rel="stylesheet" href="../css/w3.css" type="text/css"/>
</head>

<body>
<img src="../images/art.jpg" style= "width:100%"height=25%"/>

</br>
</br>
<div class='w3-panel w3-blue w3-card-8 w3-medium'>
<h1 class='w3-xlarge w3-text-shadow'>MOUNTVIEW IDEA MANAGEMENT SYSTEM</h1>
</div>
</br>


<h3>Membership Registration</h3>


<div id="userReg"></br>
    
	<fieldset>
	<form class='w3-form w3-padding' action="StudentReg.php" method="POST">
	
	<table>
	<tr>
	<th style="float:right">First Name</th>
	<td>
	<input  type="text" id="fname" name="fname">
	</td>
	</tr>
	
	<tr>
	<th style="float:right">Last Name </th>
	<td>
	<input type="lname"  name="lname">
	</td>
	</tr>
	
	<th style="float:right">Email</th>
	<td>
	<input type="text"  name="email">
	</td> 
	
	<tr>
	<th style="float:right">Phone</th>
	<td>
	<input  type="text" id="phone" name="phone">
	</td>
	</tr>
	
	<tr>
	<th style="float:right">Postal Address </th>
	<td >
	<input type="paddress "  name="paddress">
	</td>
	</tr>
	
	<th style="float:right">DepartmentID</th>
	<td>
	<input type="text"  name="departid">
	</td> 
	
	</table>
	
	</br>
	</br>
	<input Class='w3-btn w3-round' type="submit" value="Register"  name="Register">
	
	</form>

	</fieldset>
	</div>

	<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>    
  
<?php
  
  if (isset($_POST['Register']))
	{
	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $paddress = $_POST['paddress'];
	  $departid = $_POST['departid'];
	   
	$con = new mysqli("Localhost","root","","IdeaManagement");
	  	  
		  
		 $result = $con->query("SELECT * FROM Students");
		 
		 $count = $result->num_rows;
		  
		  		   
		   if ($count===0)
		   {
			    $newId = 'ST100';
			   
				$S = '100';
					  
					  $statement  = $con->prepare("INSERT INTO Students (StudentID,fName,lName,Email,Phone,PostalAddress,DepartmentID) VALUES(?,?,?,?,?,?,?)");
					  $statement->bind_param('sssssss',$newId,$fname,$lname,$email,$phone,$paddress,$departid);
					   
					   $statement->execute();
			   
		   }
		   else
		   {
			      $result = $con->query("SELECT max(StudentID) FROM Students");
		 
						 $gotId = $result->fetch_row();
						  				  
						  $newId = $gotId[0];
						  					 
						  $newId = substr($newId,2) + 1;
						  
						  $newId = "ST".$newId;
							
					  $S = '100';
					  
					  $statement  = $con->prepare("INSERT INTO Students(StudentID,fName,lName,Email,Phone,PostalAddress,DepartmentID) VALUES(?,?,?,?,?,?,?)");
					  $statement->bind_param('sssssss',$newId,$fname,$lname,$email,$phone,$paddress,$departid);
					   
					   $statement->execute();
					   
					Header("Location:Ideas.php");   
		   } 
	
   }

 
?>  


</body>
</html>
