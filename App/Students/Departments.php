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

</br>

<h3 class='w3-xlarge w3-text-shadow'>Departments</h3>

 
<table class='w3-table w3-bordered w3-card w3-small'>
      <thead class= 'w3-blue'>
        <tr>
		  <th>DepartmentID</th>
          <th>Name</th>
        </tr>
      </thead>
	  
</table> 	

<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>   	
	  
     

<tbody > 

<?php

$con = new mysqli("localhost","root","","IdeaManagement");

$result = mysqli_query($con,"SELECT * FROM Departments");

while ($row = mysqli_fetch_assoc($result)){
$departid = $row['DepartmentID'];
$name = $row['Name'];

//this will insert table values into the table columns
echo "<tr>";
echo "<td>";
echo "$departid";
echo "</td>";
echo "<td>";
echo "$name";
echo "</td>";
echo "</tr>";

}

?> 

</tbody>


</body>
</html>