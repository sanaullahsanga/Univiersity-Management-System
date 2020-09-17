<!DOCTYPE html>
<html>
<head>
	<title>Marks</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>

<?php
//error_reporting(0);
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];
$c_a_s_id = $_GET['c_a_s_id'];
$section = $_GET['section'];
$c_id = $_GET['c_id'];
//echo $section;
echo '<link rel="stylesheet" href="styles.css"><h1 align="center">MARKS</h1>';
echo "	<table cellspacing='30px'>
		<tr>

			<th>Total Marks <a href='quiz_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>QUIZ</th>
			<th>Obtained Marks <a href='quiz_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>QUIZ</th>
			<th>Total Marks <a href='assg_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>ASSIGNMENT</th>
			<th>Obtained Marks <a href='assg_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>ASSIGNMENT</th>
			<th>Total Marks Mid 1</th>
			<th>Obtained Marks  Mid 1</th>
			<th>Total Marks  Mid 2</th>
			<th>Obtained Marks  Mid 2</th>
			<th>Total Marks  Final</th>
			<th>Obtained Marks  Final</th>
			<th>Total Absolutes</th>
			<th>Grade</th>
		</tr>";
$sql1="select * from quiz_std_sem where section = '$section' and c_id = '$c_id' ";
$result=mysqli_query($conn,$sql1);
$q_w_total = 0;
$q_o_total = 0;
while($row=mysqli_fetch_array($result))
{
	$q_w_total=$q_w_total+$row['w_quiz'];
	$abc = $row['quiz_no'];
	$sql="select * from quiz_std_sem1 where c_a_s_id = '$c_a_s_id' and quiz_no = '$abc' ";
    //echo $sql;
    $result1=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_array($result1);
    $q_o_total=$q_o_total+$row1['o_w_quiz'];

}


$sql2="select * from ass_std_sem where section = '$section' and c_id = '$c_id' ";
$result2=mysqli_query($conn,$sql2);
$a_w_total = 0;
$a_o_total = 0;
while($row2=mysqli_fetch_array($result2))
{
	$a_w_total=$a_w_total+$row2['w_assg'];
	$abc1 = $row2['assg_no'];
	$sql="select * from ass_std_sem1 where c_a_s_id = '$c_a_s_id' and assg_no = '$abc1' ";
   // echo $sql;
    $result3=mysqli_query($conn,$sql);
    $row3=mysqli_fetch_array($result3);
    $a_o_total=$a_o_total+$row3['o_w_assg'];

}



mysqli_query($conn, "insert into course_std_sem (c_a_s_id, t_m_assign, o_m_assign, t_m_quiz, o_m_quiz, t_att) values ('$c_a_s_id', '$a_w_total', '$a_o_total', '$q_w_total', '$q_o_total', 0)");




$exam_o_total = 0;
	echo "&emsp;<tr>
		<td>" . $q_w_total . "</td>
		<td>" . $q_o_total . "</td>
		<td>" . $a_w_total . "</td>
		<td>" . $a_o_total . "</td>";
		$sql3="select * from exam_std_sem where section = '$section' and c_id = '$c_id' ";
        $result2=mysqli_query($conn,$sql3);
        while($row2=mysqli_fetch_array($result2))
       {
       	echo "<td>" . $row2['w_exam'] . "</td>";
	    $abc1 = $row2['exam_name'];
	    $sql="select * from exam_std_sem1 where c_a_s_id = '$c_a_s_id' and exam_name = '$abc1' ";
        // echo $sql;
        $result3=mysqli_query($conn,$sql);
        $row3=mysqli_fetch_array($result3);
        $exam_o_total = $exam_o_total + $row3['o_w_exam'];
        echo "<td>" . $row3['o_w_exam'] . "</td>";

      }
	  $total = $exam_o_total+$a_o_total+$q_o_total;
	  if($total>=80)
	  {
	  	$grade='A+';
	  }
	  else if($total>=70&$total<80)
	  {
	  	$grade='A';
	  }
	  else if($total>=60&$total<70)
	  {
	  	$grade='B';
	  }
	  else if($total>=50&$total<60)
	  {
	  	$grade='C';
	  }
	  else if($total>=40&$total<50)
	  {
	  	$grade='D';
	  }
	  else 
	  {
	  	$grade='F';
	  }

	  echo	"		<td>".$total."</td>
	                <td>".$grade."</td></tr><br>";


	 // echo "<td><a href='quiz_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>QUIZ Details</td>";
	
	  //echo "<td><a href='assg_detail.php?c_a_s_id=$c_a_s_id&section=$section&c_id=$c_id'>ASSIGNMENT Details</td>";
//}*/

echo "<br></table>";
?>

</body>
</html>
