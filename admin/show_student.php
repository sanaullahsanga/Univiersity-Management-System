	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="show.css">
	</head>
	<body>
	<table cellspacing="30px">
		<tr>
			<th>Student ID</th>
			<th>Student Name</th>
			<th>Student CNIC</th>
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

		 $sql1="select * from student_info  ";
	$result=mysqli_query($conn,$sql1);
	if(!$result)
	{
		echo "no value";
	}
	else{
	
	while($row=mysqli_fetch_array($result))
	{
		//echo "string";
		$id=$row['s_id'];
		echo "<tr>
		<td>" . $row['s_id'] . "</td>
		<td>" . $row['s_name'] . "</td>
		<td>" . $row['s_cnic'] . "</td>
		<td>" . $row['s_contact'] . "</td>
		<td>" . $row['s_email'] . "</td>
		<td>" . $row['s_dob'] . "</td>
		<td>" . $row['s_address'] . "</td>
		<td>" . $row['religion'] . "</td>
		<td>" . $row['nationality'] . "</td>
		<td>" . $row['s_gender'] . "</td>
		<td>" . $row['blood_group'] . "</td>
		<td>" . "<a href='edit_student.php?id=$id'>Edit</a>". "</td>
		<td>" . "<a href='delete_student.php?delete=$id'  >Delete</a>"."</td>
		<tr><br>";
	}}
		 ?>
	</table>
	<button><a href="admin1_main">Home</a></button> 
	<button><a href="show_record.php">Go Back</a></button>
	</body>
	</html>