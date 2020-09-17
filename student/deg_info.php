
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
			
			<th>Degree Type</th>
			<th>Department</th>
			<th>BATCH</th>
		</tr>';
$sql1="select * from degree0_info where s_id = '$id'";
$result=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_array($result))
{
	echo "<tr>
		<td>" . $row['degree'] . "</td>
		<td>" . $row['dep'] . "</td>
		<td>" . $row['batch'] . "</td>
		<tr><br>";
}

?>