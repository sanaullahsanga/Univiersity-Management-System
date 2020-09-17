<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Record</title>
</head>
<body>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="show.css">
	</head>
	<body>
		<center><h1>User Information</h1></center>
		<?php
		error_reporting(0);
		session_start();
		echo $_session["id"];
		$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;
		$edit_id=$_GET['id'];
		//echo $edit_id;
		 $sql1="select * from login_user where id=$edit_id ";
	$result=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array ($result);
    $id = $row['id'];
	$Name= $row['user_name'];
	$pass=$row['pin'];
	echo "<form name='registration' method='post' action='update_user.php' >
	<table>
	<tr>
		<th>User's ID</th>
		<th><input type='text' name='id' value='$id' readonly></th>
	</tr>
	<tr>
		<th>User's Name</th>
		<th><input type='text' name='uname' value='$Name' required></th>
	</tr>
	<tr>
		<th>Password</th>
		<th><input type='text' name='Pasword' value='$pass' required></th>
	</tr>
    </table>
     <input type='submit' name='submit' value='submit'>
	</form>";
	?>
	</body>
	</html>
</body>
</html>