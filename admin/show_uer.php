	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="show.css">
	</head>
	<body>
	<table cellpadding="5px" cellspacing="20px">
		<tr>
			<th>User's ID</th>
			<th>User's Name</th>
			<th>Password</th>
			<th>Action</th>
		</tr>
		<?php
		$conn=@mysqli_connect("localhost","root","","dbwp");

		 $sql1="select * from login_user ";
	    $result=mysqli_query($conn,$sql1);
	
	while($row=mysqli_fetch_array ($result))
	{
		//$User_id=$row['User_id'];
		$User_Name=$row['user_name'];
		$Password=$row['pin'];
		$id=$row['id'];
		echo "<tr>
		<td>" . $row['id'] . "</td>
		<td>" . $row['user_name'] . "</td>
		<td>" . $row['pin'] . "</td>
		<td>" . "<a href='edit_user.php?id=$id'>Edit</a>". "</td>
		<tr><br>";
		//echo"<a href='edit.php?id=$id'>Edit</a>";
		//echo "<a href='delete.php?delete=$id'  >Delete</a>";
		 
	}
		 ?>
	</table>
	<button><a href="show_record.php">Go Back</a></button>
	<button><a href="admin1_main.php">Home</a></button>
	</body>
	</html>