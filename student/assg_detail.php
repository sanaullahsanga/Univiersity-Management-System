<!DOCTYPE html>
<html>
<head>
	<title>Assignment Detail</title>
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
//echo $section;
$c_id = $_GET['c_id'];
//echo $c_id;
echo '<h1 align="center">Assignment Details</h1>';
echo '	<table cellspacing="30px" align="center">
		<tr>

			<th>Assignment no.</th>
			<th>Date</th>
			<th>Total Marks</th>
			<th>Total Weightage</th>
			<th>Obtained Marks</th>
			<th>Obtained Weightage</th>
		</tr>';
$sql1="select * from ass_std_sem where section = '$section' and c_id = '$c_id' ";
$result=mysqli_query($conn,$sql1);
//echo $sql1;
while($row=mysqli_fetch_array($result))
{
	echo "&emsp;<tr>
	      <td>" . $row['assg_no'] . "</td>
		  <td>" . $row['date_'] . "</td>
		  <td>" . $row['m_assg'] . "</td>
		  <td>" . $row['w_assg'] . "</td>";
	$abc = $row['assg_no'];
	$sql="select * from ass_std_sem1 where c_a_s_id = '$c_a_s_id' and assg_no = '$abc' ";
    
    $result1=mysqli_query($conn,$sql);
    $row1=mysqli_fetch_array($result1);
    echo "<td>" . $row1['o_m_assg'] . "</td>
		  <td>" . $row1['o_w_assg'] . "</td></tr>";

}		
echo "<br></table>"

?>

</body>
</html>