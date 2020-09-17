<!DOCTYPE html>
<html>
<head>
	<title>Course Selection for Students</title>
	<link rel="stylesheet" type="text/css" href="stylesheet1.css">
</head>
<body>
	<?php 
	if (isset($abc)) 
		{ ?>
			<h1> Result: <?php echo $result ?></h1>
	<?php } ?>

	<br><br><br><br><br><br>
	<form align='center' method="POST" action="">
		BATCH
		<input type="number" name="batch" placeholder="Selct Batch" required>
		Section
		<select name="of_section" required>
			<option value="">Selct Section</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>
		</select>
		Smester No.
		<select name="of_semester" required>
			<option value="">Selct Semester</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select>
		Degree Program
		<select name="of_degree" required>
			<option value="">Selct Degree</option>
			<option value="bs">BS</option>
			<option value="ms">MS</option>
			<option value="bba">BBa</option>
		</select>
		Department
		<select name="of_department" required>
			<option value="">Selct Department</option>
			<option value="CS">CS</option>
			<option value="EE">EE</option>
			<option value="BA">Ba</option>
		</select>
		<input type="submit" value="Show Courses" >
	</form>

<?php 
 
////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////
function foo($batch, $section, $semester, $degree, $department)
{
	$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";

////////////////////////////////////////////////////////////////////Query to provide Options////////////////////////////////////////////////////////////////////////


    $query_selecting_course = mysqli_query($conn, "select * 
	                                          from course_info 
	                                          where 
	                                          of_degree = '$degree'
	                                          and
	                                          of_department = '$department';
	                                  ");
 
    
    if(mysqli_num_rows($query_selecting_course) > 0)
    {
    	echo '<form name="sel_course_student" method="POST" action="sel_course_student1.php" onsubmit="return validate_form(this)"><br>';
	    echo '<p align="center"><input type="" name="batch" value='.$batch.' readonly><input type="" name="section" value='.$section.' readonly><input type="" name="semester" value='.$semester.' readonly><input type="" name="degree" value='.$degree.' readonly><input type="" name="department" value='.$department.' readonly></p>';
	    while($result = mysqli_fetch_assoc($query_selecting_course))
	    	{
	    		$c_name = $result["c_id"];
		        echo '<p align="center"><input type="checkbox" name="course1[]"  id="course1"  value='.$c_name.'>'.$c_name.'</p>';
	        }
	    echo '<p align="center"><input align="center" type="submit" name="button" value="Submit"></p> </form>';    
    }
    else
    	echo "NO results found";

echo "<script>
function validate_form(form)
{
	var i,
	chks = document.getElementsByName('course1[]');
	for( i=0 ; i < chks.length; i++)
	{
		if(chks[i].checked)
		{
			return true;
		}
		else
		{
			alert('Please Select atleast 1 COURSE');
			return false;

		}
	}
} 
</script>
";

}


if (isset($_POST['batch']) &&  isset($_POST['of_section']) &&  isset($_POST['of_semester']) && isset($_POST['of_degree']) && isset($_POST['of_department'])) 
{
    $abc = foo($_POST['batch'], $_POST['of_section'], $_POST['of_semester'], $_POST['of_degree'], $_POST['of_department']);
}

?>
</body>
</html>

