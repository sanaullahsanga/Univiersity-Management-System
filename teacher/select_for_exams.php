<!DOCTYPE html>
<html>
<head>
	<title>Exams Marks</title>
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
$course_name=$_POST['course_name'];
$section=$_POST['Section'];
$edate=$_POST['date'];
$examno=$_POST['exam_name'];
$etmarks=$_POST['tmarks'];
$ewaitg=$_POST['wtg'];
$esid=$_POST['sid'];
$emarks=$_POST['exam'];
$var0="INSERT INTO exam_std_sem values('$section','$course_name','$edate','$examno',$etmarks,$ewaitg)";
$var2=mysqli_query($conn,$var0);
$var="select c_a_s_id from course_along_calculate_std where s_id in(".implode(',',$esid).") and c_id='$_POST[course_name]'and section='$_POST[Section]'";
//echo $var;
$var1=mysqli_query($conn,$var);
//$row = mysqli_fetch_array($var1);
$x = 0;
foreach($emarks as $temp)
{
	while($row = mysqli_fetch_array($var1))
	{
		$percent=(($temp*100)/$etmarks);
        $wa=(($percent*$ewaitg)/100);
		$casid=$row['c_a_s_id'];
		$a="INSERT INTO exam_std_sem1 (c_a_s_id,date_,exam_name,o_m_exam,o_w_exam)values('$casid','$edate','$examno',$temp,$wa)";
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