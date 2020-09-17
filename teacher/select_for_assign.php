<!DOCTYPE html>
<html>
<head>
	<title>Quiz Marks</title>
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
$adate=$_POST['date'];

$course_name=$_POST['course_name'];
$section=$_POST['Section'];
$ano=$_POST['assignno'];
$atmarks=$_POST['tmarks'];
$awaitg=$_POST['wtg'];
$asid=$_POST['sid'];
$amarks=$_POST['assign'];
$var0="INSERT INTO ass_std_sem values('$section','$course_name','$adate',$ano,$atmarks,$awaitg)";
$var2=mysqli_query($conn,$var0);
$var="select c_a_s_id from course_along_calculate_std where s_id in(".implode(',',$asid).") and c_id='$_POST[course_name]' and section='$_POST[Section]'";
//echo $var;
$var1=mysqli_query($conn,$var);
//$row = mysqli_fetch_array($var1);
$x = 0;
foreach($amarks as $temp)
{
	while($row = mysqli_fetch_array($var1))
	{
		$percent=(($temp*100)/$atmarks);
        $wa=(($percent*$awaitg)/100);
		$casid=$row['c_a_s_id'];
		$a="INSERT INTO ass_std_sem1 (c_a_s_id,assg_no,o_m_assg,o_w_assg)values('$casid',$ano,$temp,$wa)";
		$abc=mysqli_query($conn,$a);
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