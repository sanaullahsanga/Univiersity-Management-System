<!DOCTYPE html>
<html>
<head>
	<title>Course Attendance for Teachers</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<br>
	<center><h1>Attendance Detail</h1></center>
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
		<table cellspacing='40px'>
			<tr>
				<?php
				echo"
				<th>Date <input type='date' name='date' required></th>
				<th>Course Name <input type='text' name='course_name' value=$course_id readonly></th>
				<th>Section <input type='text' name='Section' value=$section readonly> </th>";
				?>
				<th><input type="submit" value="Show Record" ></th>
			</tr>
		</table>
	</form>
<?php 
////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////
function foo($date, $course_name,$Section)
{
	$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";
                             //////////////////////////////////////Query to provide Options///////////////////////////////////////////
                                     $sql="SELECT * FROM course_along_calculate_std join att_std_sem WHERE course_along_calculate_std.c_a_s_id=att_std_sem.c_a_s_id and date_='$date' and c_id='$course_name'";
	                                  $a=mysqli_query($conn,$sql);if(mysqli_num_rows($a) > 0)
    {
    	echo "<table align='center' cellspacing='20px'>
	    		<tr>
	    		<th>Student ID</th>
	    		<th></th>
	    		<th>Status</th>
	    		<th></th>
	    		</tr>
	    		";
	    while($result = mysqli_fetch_assoc($a))
	    	{
	    		$s_name = $result["s_id"];
	    		echo "<tr>
	    		<td>".$s_name."<td>
	    		<td>".$result["status"]."<td>
	    		</tr>";
	        }
	        echo "
	    		</table>";
	}
    else
    	echo "<p align='center'>No Results Found</p>";

    echo"<p align='center'><a href='show_record.php'>Go Back</a>&emsp;&emsp;<a href='teacher_main.php'>Home</a></p>";
}
if (isset($_POST['date']) &&  isset($_POST['course_name']) &&  isset($_POST['Section'])) 
{
    $abc = foo($_POST['date'], $_POST['course_name'], $_POST['Section']);
}
?>
</body>
</html>


