

<?php

$con =  mysqli_connect("Localhost","root","");

$status = mysqli_query($con,"CREATE DATABASE IF NOT EXISTS IdeaManagement" );


 if ($status===true)
 {
	 
mysqli_select_db($con,"IdeaManagement");
	 
 
mysqli_query($con,"CREATE TABLE Departments(
					DepartmentID varchar(20) NOT NULL PRIMARY KEY, 
					Name varchar(100))");
					
mysqli_query($con,"CREATE TABLE Categories( 
					CategoryCode varchar(20) NOT NULL PRIMARY KEY,
					Name varchar(100))");	

mysqli_query($con,"CREATE TABLE Users( 
					UserId int(20) NOT NULL PRIMARY KEY,  
					UserName  varchar(200), 
					Password varchar(50),
					Role varchar (50))");
					
mysqli_query($con,"CREATE TABLE Students( 
					StudentId Varchar(20) NOT NULL PRIMARY KEY,  
					fName varchar(100),	
					lName varchar(200),
					Email varchar(100),
					Phone varchar(20),
					PostalAddress varchar(200),
					DepartmentID varchar(20) NOT NULL,
					FOREIGN KEY (DepartmentID) references Departments (DepartmentID))");
					
mysqli_query($con,"CREATE TABLE Ideas( 
					ideaCode int(20) NOT NULL PRIMARY KEY, 
					subject varchar (60),
					Description varchar(500),
					StudentID varchar(20) NOT NULL, 
					categoryCode varchar(20) NOT NULL,
					FOREIGN KEY (StudentID) references Students (StudentID),
					FOREIGN KEY (CategoryCode) references Categories (CategoryCode))");	
						 
	
Header("Location:index.php");
	 
	 
 }


?>					
	 
 


</body>

</html>	 
	 
	 
	 
	 
	 