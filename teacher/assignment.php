<!DOCTYPE html>
<html>
<head>
	<title>Quiz</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<h1 align="center">Assignment Detail</h1>
	<?php
	error_reporting(0);
	$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];
$section=$_GET['sec'];
$course_id=$_GET['cid'];
$var="select * from course_along_calculate_std where c_id='$course_id'";
$sql=mysqli_query($conn,$var);
echo "
	<form method='post' action='select_for_assign.php?id=$id'>
		
		<table cellspacing='40px'>
			<tr>
				<th>Date <input type='date' name='date' required></th>
				<th>Course Name <input type='text' name='course_name' value=$course_id readonly></th>
				<th>Section <input type='text' name='Section' value='$section' readonly></th>
			</tr>
		</table>
		<table cellspacing='40px'>
			<tr>
				<th>Assignment No <input type='number' name='assignno'required></th>
				<th>Total Marks <input type='number' name='tmarks'required></th>
				<th>Waitage <input type='number' name='wtg'required></th>
			</tr>
		</table>

		<table align='center' cellpadding='10px' cellspacing='20px'>
			<tr>
				<th>Student ID</th>
				<th></th>
				<th>Marks</th>
			</tr>";
			while($row=mysqli_fetch_array($sql))
	        {
	        	$id=$row[s_id];
	        	echo"<input type='hidden' name='sid[]' value='$id'>";
	            echo"<input type='hidden' name='section1' value='$section'>";
		         echo" 
			 <tr>".
			"<td>".$row[s_id]."<td>";
			echo 
			"<td>"."<input type='number' name='assign[]' size='3' required>"."</td>

			</tr>";
		
	        }
	        echo "
		</table><br><br><br>
		<center><input type='submit' value='submit'></center>
	</form>";
	?>
	
	
</body>
</html>