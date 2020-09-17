<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;
	if(isset($_GET['delete']))
		{
			$delete_id=$_GET['delete'];
			//echo $delete_id;
			mysqli_query($conn,"delete from student_info where s_id=$delete_id");
			mysqli_query($conn,"delete from login_user where id=$delete_id");
			mysqli_query($conn,"delete from guardian_info where id=$delete_id");
			mysqli_query($conn,"delete from degree0_info where id=$delete_id");
		}
	if(mysqli_query($conn,"delete from student_info where s_id=$delete_id"))
	{
		header("location:show_student.php");
	}
	else
	{
		echo "Not Successfully Deleted";
	}
	?>

</body>
</html>