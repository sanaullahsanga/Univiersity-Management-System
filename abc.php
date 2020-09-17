<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);

 
                    
                 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="" name="" required>
	<form method='post' action='teacher_courses_info.php'>
	<table cellpadding='5px' cellspacing='5px'>
		<tr>
		<th>Personal Info</th>
		<th><a href='teacher_courses_info.php?id=$id'>submit</a></th>
		</tr>
	</table>
</form>
</body>
</html>
