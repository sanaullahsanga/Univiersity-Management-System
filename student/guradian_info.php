
<?php
//error_reporting(0);
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];


echo '	<table cellspacing="30px">
		<tr>
			
			<th>GUARDIAN Name</th>
			<th>GUARDIAN CNIC</th>
			<th>GUARDIAN Contact</th>
			<th>GUARDIAN Job</th>
		</tr>';
$sql1="select * from guardian_info where s_id = '$id'";
$result=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result))
{
	echo "<tr>
		<td>" . $row['father_name'] . "</td>
		<td>" . $row['father_cnic'] . "</td>
		<td>" . $row['father_contact'] . "</td>
		<td>" . $row['father_job'] . "</td>
		<tr><br>";
}
?>