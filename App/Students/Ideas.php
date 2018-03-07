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


<h3>Idea Capturing Form</h3>


<fieldset>
	
	<form class='w3-form w3-padding w3-left' action="ideas.php" method="POST">
	
	<table>
	
	<tr>
	<th style="float:right">Subject</th>
	<td>
	<input type="text"  name="subject">
	</td>
	</tr>	
	
	<tr>
	<th style="float:right">Description</th>
	<td>
	<textarea rows="5" cols="50" name="description" placeholder="description"></textarea>
	</td>
	</tr>	
	
	<tr>
	<th style="float:right">StudentID</th>
	<td>
	<input type="text"  name="studentid">
    </td>
	</tr>
	
	<tr>
	<th style="float:right">Category Code</th>
	<td>
	<input type="text"  name="categorycode">
    </td>
	</tr>
		
   	</table>
	
	</br>
	</br>
	<input Class='w3-btn w3-round' type="submit" value="Submit"  name="Submit">
	
	</form>

	</fieldset>
	
	</div>

	<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>    
  
<?php
  include_once "C:\wamp\www\IdeaManagement\App\db_file.php";

  if (isset($_POST['Submit']))
	{
		$subject = $_POST['subject'];
		$description = $_POST['description'];
		$studentid = $_POST['studentid'];
		$category = $_POST['categorycode'];

		$sql = "insert into ideas set 
			subject = '$subject',
			Description = '$description',
			StudentID = '$studentid', 
			categoryCode = '$category' ";

		$res = DtBase::run_query( $sql );

		exit();

		$result = $con->query("SELECT * FROM ideas");
		 
		$count = $result->num_rows;

		echo $count;exit();
		  
		  		   
		   if ($count===0)
		   {
			   $newId = '100';
			   
			    $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO ideas (ideaCode,subject,Description,studentID,CetegoryCode) VALUES(?,?,?,?,?)");
					  $con->bind_param('issss',$newId,$subject,$description,$studentid,$category);
					   
					   $statement->execute();
			   
		   }
		   else
		   {
			      $result = $con->query("SELECT max(ideaCode) FROM ideas");
		 
						 $gotId = $result->fetch_row();
						  				  
						  $newId = $gotId[0];
						  
						  $newId = $newId + 1;
							
					  $S = '1';
					  
					  $statement  = $con->prepare("INSERT INTO ideas (ideaCode,subject,Description,studentID,CetegoryCode) VALUES(?,?,?,?,?)");
					  $statement->bind_param('issss',$newId,$subject,$description,$studentid,$category);
					   
					   $statement->execute();
					   
					Header("Location:StudentPage.php");   
		   } 
	
   }

 
?>  



</body>
</html>
