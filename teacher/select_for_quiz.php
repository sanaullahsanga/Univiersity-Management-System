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
$qdate=$_POST['date'];
$course_name=$_POST['course_name'];
$section=$_POST['Section'];
$quizno=$_POST['quizno'];
$qtmarks=$_POST['tmarks'];
$qwaitg=$_POST['wtg'];
$qsid=$_POST['sid'];
$qmarks=$_POST['quiz'];
$var0="INSERT INTO quiz_std_sem values('$section','$course_name',$quizno,'$qdate',$qtmarks,$qwaitg)";
//echo $var0;
//echo "<br>";
$var2=mysqli_query($conn,$var0);
$var="select c_a_s_id from course_along_calculate_std where s_id in(".implode(',',$qsid).") and c_id='$_POST[course_name]' and section='$_POST[Section]'";
//echo $var;
$var1=mysqli_query($conn,$var);
//$row = mysqli_fetch_array($var1);

$x = 0;


foreach($qmarks as $temp)
{
	while($row = mysqli_fetch_array($var1))
	{
		$percent=(($temp*100)/$qtmarks);
        $wa=(($percent*$qwaitg)/100);
		$casid=$row['c_a_s_id'];
		$a="INSERT INTO quiz_std_sem1 (c_a_s_id,quiz_no,o_m_quiz,o_w_quiz)values('$casid',$quizno,$temp,$wa)";
		//echo "<br>";
		//echo $a;
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