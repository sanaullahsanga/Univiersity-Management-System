<?php
$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";
    session_start();
	$id=$_SESSION['var'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th>Student ID: <input type="text" name=""></th>
			<th>Status: </th>
		</tr>
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>

</body>
</html>