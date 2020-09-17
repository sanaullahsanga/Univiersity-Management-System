<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

</body>
</html>
<?php
//error_reporting(0);
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();

$id=$_SESSION['var'];
//echo '<h1 align="center">PERSONAL INFORMATION</h1>';
echo '	<table cellspacing="30px">
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
		</tr>';
$sql1="select * from student_info where s_id = '$id' ";
$result=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result))
{
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
		<tr><br>";
}

echo "<br>";
?>
