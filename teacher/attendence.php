<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<center><h1>Attendence</h1></center>
	<?php
	error_reporting(0);
	$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];

$course_id=$_GET['cid'];
$section=$_GET['sec'];
$var="select * from course_along_calculate_std where c_id='$course_id'";
$sql=mysqli_query($conn,$var);
echo "
	<form method='post' action='select_for_atten.php?id=$id'>
		
		<table cellspacing='40px'>
			<tr>
				<th>Date <input type='date' name='date' required></th>
				<th>Course Name <input type='text' name='course_name' value=$course_id readonly></th>
				<th>Section <input type='text' name='Section' value=$section readonly> </th>
			</tr>
		</table><table align='center' cellpadding='10px' cellspacing='20px'>
			<tr>
				<th>Student ID</th>
				<th></th>
				<th>Status</th>
			</tr>";
			while($row=mysqli_fetch_array($sql))
	        {
	        	$id=$row[s_id];

		         echo" 
			<tr>".
			"<td>".$row[s_id]."<td>".
			"<td>"."
			<select name='status[]' required>
            <option value='present' > Present </option>
            <option value='absent'  > Absent </option>
            </select></td></tr>
            ";
            echo"<input type='hidden' name='sid[]' value='$id'>";
		
	        }
	        echo "
		</table><br><br><br>
		<center><input type='submit' value='submit'></center>
	</form>";
	?>
	
	
</body>
</html>