<!DOCTYPE html>
<html>
<head>
	<title>Edit Student Record</title>
</head>
<body>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="show.css">
	</head>
	<body>
		<center><h1>Teacher Information</h1></center>
		<?php
		error_reporting(0);
		session_start();
		echo $_session["id"];
		$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;
		$edit_id=$_GET['id'];
		//echo $edit_id;
		 $sql1="select * from teacher_info where t_id=$edit_id ";
	$result=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array ($result);
    $id = $row['t_id'];
	$Name= $row['name'];
	$CNIC=$row['cnic'];
	$education=$row['education'];
	$contact=$row['contact'];
	$email=$row['email'];
	$dob=$row['dob'];
	$address=$row['address'];
	$Religion=$row['religion'];
	$Nationality=$row['nationality'];
	$gender=$row['gender'];
	$b_group=$row['blood_group'];
	echo "<form name='registration' method='post' action='update_teacher.php' >
	    Teacher's ID :&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type='text' name='id' value='$id' readonly><br>
		Name :&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;
	    <input type='text' name='name'  value='$Name' size='70.9' required>
        <br>
		CNIC:&emsp;&emsp;&emsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    <input type='text' name='cnic'  value='$CNIC' required>
        <br>
        education &emsp;&nbsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type='text' name='edu' value='$education' required>
        Contact No.:&emsp;&emsp;&emsp;&emsp;&emsp;
	    <input type='text' name='contact' value='$contact' required><br>
	    Date of Birth:
	    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    <input type='date' name='dob'  value='$dob' required>
        <br>
        Permanent Home Address:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    <input type='text' name='address'value='$address' required ><br>
		Religion:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	    <input type='text' name='religion' value='$Religion' required ><br>
		Nationality:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    <input type='text' name='nationality' value='Nationality' required><br>
	    Gender:&nbsp;&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;	&emsp;	
        <input type='text' name='gender' value='$gender'required ><br>
        Blood Group:&nbsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;
	    <input type='text' name='blood_group' value='$b_group' required><br>
        Email:&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&emsp;
	    <input type='text' name='email' value='$email' required> <br>
	    <input align='center' type='submit' name='button' value='Submit' />
	</form>";
	?>
	</body>
	</html>
</body>
</html>