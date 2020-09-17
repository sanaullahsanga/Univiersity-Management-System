<!DOCTYPE html>
<html>
<head>
	<title>Course Exam for Teachers</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<br>
	<center><h1>Exams Detail</h1></center>
	<?php 
	session_start();
	$id=$_SESSION['var'];
	$course_id=$_GET['cid'];
	$section=$_GET['sec'];
	if (isset($abc)) 
		{ ?>
			<h1> Result: <?php echo $result ?></h1>
	<?php } ?>
	<br><br>
	<form align='center' method='post' action=''>
		<?php echo "	
		<table cellspacing='40px'>
			<tr>
			   <th>Exam Name :&emsp;<select name='exam_name' required>
			<option value=''>---Selct---</option>
			<option value='Mid 1'>Mid 1</option>
			<option value='Mid 2'>Mid 2</option>
			<option value='Final'>Final</option>
		</select></th>
			   <th>Course Name :&emsp;<input type='text' name='course_name' value=$course_id readonly></th>
				<th>Section :&emsp;<input type='text' name='Section' value='$section' readonly	></th>
				<th><input type='submit' value='Show Record' ></th>
			</tr>
			</table>
	</form>";
	?>
<?php 
////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////
function foo($exam_name, $course_name,$Section)
{
	$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";
                             //////////////////////////////////////Query to provide Options///////////////////////////////////////////
                                     $sql="SELECT * FROM course_along_calculate_std join exam_std_sem1 WHERE course_along_calculate_std.c_a_s_id=exam_std_sem1.c_a_s_id and exam_name='$exam_name' and c_id='$course_name'";
	                                  $a=mysqli_query($conn,$sql);
	  if(mysqli_num_rows($a) > 0)
    {
    	echo "<table align='center' cellspacing='20px'>
	    		<tr>
	    		<th>Student ID</th>
	    		<th></th>
	    		<th>Obtain Marks</th>
	    		<th></th>
	    		</tr>
	    		";
	    while($result = mysqli_fetch_assoc($a))
	    	{
	    		$s_name = $result["s_id"];
	    		echo "<tr>
	    		<td>".$s_name."<td>
	    		<td>".$result["o_m_exam"]."<td></tr>
	    		";
	        }
	        echo "
	    		</table>";
	}
    else
    	echo "<p align='center'>No Results Found</p>";

    echo"<p align='center'><a href='show_record.php'>Go Back</a>&emsp;&emsp;<a href='teacher_main.php'>Home</a></p>";
}
if (isset($_POST['exam_name']) &&  isset($_POST['course_name']) &&  isset($_POST['Section'])) 
{
    $abc = foo($_POST['exam_name'], $_POST['course_name'], $_POST['Section']);
}
?>
</body>
</html>
