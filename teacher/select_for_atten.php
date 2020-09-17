<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
</head>
<body>
	<?php
	error_reporting(0);
	$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];
//$id=$_GET['id'];
$date=$_POST['date'];
$id=$_POST['sid'];
$status=$_POST['status'];

//echo $id;
$var="select c_a_s_id from course_along_calculate_std where s_id in(".implode(',',$id).") and c_id='$_POST[course_name]'";
$var1=mysqli_query($conn,$var);
//$row = mysqli_fetch_array($var1);
$x = 0;
foreach($status as $temp)
{
	while($row = mysqli_fetch_array($var1))
	{
		$casid=$row['c_a_s_id'];
		$a="INSERT INTO att_std_sem (c_a_s_id,date_,status)values('$casid','$date','$temp')";
		$abc=mysqli_query($conn,$a);
		//echo "string";
		if(abc)
		{

		    header("location:teacher_courses_info.php");
		}
		//echo $temp."&emsp;".$casid."&emsp;".$date."<br>";
		break;
	}
}
?>

</body>
</html>