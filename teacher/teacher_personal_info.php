	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<link rel="stylesheet" type="text/css" href="stylesheet.css">
	</head>
	<body>
		<center><h1>Personal Information</h1></center>
	<table cellspacing="50px" align="center">
		
		<?php
		session_start();
		$id=$_SESSION['var'];
		$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;

		 $sql1="select * from teacher_info where t_id=$id ";
	$result=mysqli_query($conn,$sql1);
	
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['t_id'];
		echo "
		<tr>
		<th> ID :&emsp;</th>
		<td>" . $row['t_id'] . "</td>
		<th> Name :&emsp;</th>
		<td>" . $row['name'] . "</td>
		</tr>
		<tr>
		<th> CNIC :&emsp;</th>
		<td>" . $row['cnic'] . "</td>
		<th>Contact :&emsp;</th>
		<td>" . $row['contact'] . "</td>
		</tr>
		
		<tr>
		<th>Education :&emsp;</th>
		<td>" . $row['education'] . "</td>
				<th>Email :&emsp;</th>
		<td>" . $row['email'] . "</td>
		<tr>
		<th>Date of Birth</th>
		<td>" . $row['dob'] . "</td>
		<th>Adress :&emsp;</th>
		<td>" . $row['address'] . "</td>
		</tr>
		<tr>
		<th>Religion :&emsp;</th>
		<td>" . $row['religion'] . "</td>
				<th>Nationality :&emsp;</th>
		<td>" . $row['nationality'] . "</td>
		</tr>
		<tr>
		<th>Gender :&emsp;</th>
		<td>" . $row['gender'] . "</td>
				<th>Blood Group :&emsp;</th>
		<td>" . $row['blood_group'] . "</td>
		</tr>";
	}
		 ?>
	</table> 
	<p align="center"><button><a href="teacher_main.php">Go Back</a></button></p>
	</body>
	</html>