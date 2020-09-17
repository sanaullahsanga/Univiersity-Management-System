<!DOCTYPE html>
<html>
<head>
	<title>Course Selection for Teachers</title>
</head>
<body>
	<?php 
	if (isset($abc)) 
		{ ?>
			<h1> Result: <?php echo $result ?></h1>
	<?php } ?>

	<br><br><br><br><br><br>
	<form align='center' method="POST" action="">
		Teacher ID
		<input type="number" name="t_id" placeholder="Teacher's Unique ID" required>
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
function foo($t_id, $department)
{
	$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";

                             //////////////////////////////////////Query to provide Options///////////////////////////////////////////


    /*$query_selecting_course = mysqli_query($conn, "select * 
	                                          from course_info 
	                                          where 
	                                          of_department = '$department';
	                                  ");*/
     $temp = $query_selecting_course = mysqli_query($conn, "select name 
	                                          from teacher_info 
	                                          where 
	                                          t_id = '$t_id';
	                                  ");
	 $temp1 = mysqli_fetch_array($temp);
	 $t_name = $temp1['name'];
	 $query_selecting_course = mysqli_query($conn, "select * 
	                                          from course_info 
	                                          where 
	                                          of_department = '$department';
	                                  ");
    echo '<form name="sel_course_teacher" method="POST" action="sel_course_teacher1" onsubmit="return validate_form(this)"><br>';
    	echo '<p align="center"><input type="" name="department" value='.$department.' readonly><input type="" name="t_na" value='.$t_name.' readonly></p>';
    if(mysqli_num_rows($query_selecting_course) > 0)
    {
    	

	    while($result = mysqli_fetch_assoc($query_selecting_course))
	    	{
	    		$c_name = $result["c_id"];
		        echo '<p align="center"><input type="checkbox" name="course1[]"  id="course1"  value='.$c_name.'>'.$c_name.'&emsp;&emsp;<input type="text" name="section[]" placeholder="SECTION" >&emsp;&emsp;<input type="text" name="batch[]" placeholder="BATCH" >';
	        }
	    echo '<p align="center"><input type="hidden" name="t_id" value='.$t_id.' ><input type="submit" name="button" value="Submit" ></p> </form>';    
    }
    else
    	echo "NO results found";



    echo "<script>
function validate_form(form)
{
	var i,
	chks = document.getElementsByName('course1[]');
	chks1 = document.getElementsByName('section[]');
	for( i=0 ; i < chks.length; i++)
	{
		if(chks[i].checked)
		{
			console.log(chks1[i].value);
		    if(!chks1[i].value) 
			{
			   alert('Please enter SECTION along COURSE');
			}
			else
				return true;	
		}
		else
		{
			alert('Please Select atleast 1 COURSE');
			
            
		}
		return false;

		
	}

} 
</script>
";

}


if (isset($_POST['t_id']) &&  isset($_POST['of_department'])) 
{
    $abc = foo($_POST['t_id'], $_POST['of_department']);
}

?>
</body>
</html>


