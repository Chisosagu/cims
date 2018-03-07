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

<h3 class='w3-xlarge w3-text-shadow'>Ideas</h3>
 
<table class='w3-table w3-bordered w3-card w3-small'>
      <thead class= 'w3-blue'>
        <tr>
		      <th>Code</th>
          <th>Subject</th>
        </tr>
      </thead>
      <tbody>
        <?php
            include_once "C:\wamp\www\IdeaManagement\App\db_file.php";

            $sql = "SELECT * FROM ideas";
            $res = DtBase::run_query( $sql );

            for ( $cnt = 0; $cnt < count($res); $cnt++ ) {
              $idea_code = $res[$cnt]['ideaCode'];
              $subject = $res[$cnt]['subject'];

              echo "<tr>";
                echo "<td> $idea_code </td>";
                echo '<td> <a href = "a.php?idea_code=$idea_code">'. $subject. '</a> </td>';
              echo "</tr>";
            }
        ?>
      </tbody>

	  
</table> 	

<div class='w3-container w3-blue-grey' style= "height:40px">
			<footer>
			<p >Copyright &copy 2017 All rights reserved  <a href="" target="">Mount View Idea Management System </a> </p>
			
			</footer>
</div>   	
	  
<tbody > 

</body>
</html>