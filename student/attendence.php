<!DOCTYPE html>
<html>
<head>
	<title>Attendance Detail</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
//error_reporting(0);
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];
$c_a_s_id = $_GET['c_a_s_id'];
//echo $c_a_s_id;
echo '<h1 align="center">ATTENDENCE</h1>';
echo '	<table cellspacing="30px">
		<tr>
			<th>Date</th>
			<th>Status(Present/Absent)</th>
		</tr>';
$sql1="select * from att_std_sem where c_a_s_id = '$c_a_s_id' ";
$result=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result))
{
	echo "<tr>
		<td>" . $row['date_'] . "</td>
		<td>" . $row['status'] . "</td>
		<tr><br>";
}

echo "<br></table>";
?>
</body>
</html>
