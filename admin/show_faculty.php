	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="show.css">
	</head>
	<body>
	<table cellspacing="30px">
		<tr>
			<th> ID</th>
			<th> Name</th>
			<th> CNIC</th>
			<th>Education</th>
			<th>Contact</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Adress</th>
			<th>Religion</th>
			<th>Nationality</th>
			<th>Gender</th>
			<th>Blood Group</th>
			<th>Action</th>
			<th>Action</th>
		</tr>
		<?php
		$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;

		 $sql1="select * from teacher_info ";
	$result=mysqli_query($conn,$sql1);
	
	while($row=mysqli_fetch_array($result))
	{
		$id=$row['t_id'];
		echo "<tr>
		<td>" . $row['t_id'] . "</td>
		<td>" . $row['name'] . "</td>
		<td>" . $row['cnic'] . "</td>
		<td>" . $row['education'] . "</td>
		<td>" . $row['contact'] . "</td>
		<td>" . $row['email'] . "</td>
		<td>" . $row['dob'] . "</td>
		<td>" . $row['address'] . "</td>
		<td>" . $row['religion'] . "</td>
		<td>" . $row['nationality'] . "</td>
		<td>" . $row['gender'] . "</td>
		<td>" . $row['blood_group'] . "</td>
		<td>" . "<a href='edit_faculty.php?id=$id'>Edit</a>". "</td>
		<td>" . "<a href='delete_faculty.php?delete=$id'  >Delete</a>"."</td>
		<tr><br>";
	}
		 ?>
	</table>
	<button><a href="admin1_main">Home</a></button> 
	<button><a href="show_record.php">Go Back</a></button>
	</body>
	</html>