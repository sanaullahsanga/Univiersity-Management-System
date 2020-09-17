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
		<?php
		error_reporting(0);
		session_start();
		echo $_session["id"];
		$conn=@mysqli_connect("localhost","root","","dbwp") or die(mysqli_error()) ;
		$edit_id=$_GET['id'];
		//echo $edit_id;
		 $sql1="select * from student_info where s_id=$edit_id ";
	$result=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array ($result);
    $id = $row['s_id'];
	$Name= $row['s_name'];
	$CNIC=$row['s_cnic'];
	$contact=$row['s_contact'];
	$email=$row['s_email'];
	$dob=$row['s_dob'];
	$address=$row['s_address'];
	$Religion=$row['religion'];
	$Nationality=$row['nationality'];
	$gender=$row['s_gender'];
	$b_group=$row['blood_group'];
	//$degree=$row['reg_degree'];
	//$dep=$row['reg_department'];
	//$batch=$row['batch'];
	echo "<form name='registration' method='post' align='center' action='update_student.php' >
		<div class='c1'>
			<center><h1>Student Update Form</h1></center>
		</div>
		<div class='c2'>
		<table cellspacing='13px'>
			<tr>
				<th>Student's ID:</th>
				<th> <input type='text' name='s_id' value='$id' readonly></th>
			</tr>
			<tr>
				<th>Name: </th>
				<th><input type='text' name='s_name' value='$Name'  required></th>
			</tr>
			
			<tr>
				<th>CNIC:</th>
				<th><input type='text' name='s_cnic' pattern='[0-9]{5}-+[0-9]{7}-[0-9]{1}' value='$CNIC'  required></th>
			</tr>
			<tr>
				<th>Contact No.:</th>
				<th><input type='text' name='s_contact' pattern='[0-9]{4}-+[0-9]{7}' value='$contact'   required></th>
			</tr>
			<tr>
				<th>Date of Birth:</th>
				<th width='60' height='48'> <input type='date' name='s_dob' value='$dob' required></th>
			</tr>
			<tr>
				<th>Home Address:</th>
				<th><input type='text' name='s_address' value='$address'   required></th>
			</tr>
			<tr>
				<th>Religion:</th>
				<th><input type='text' name='religion' value='$Religion'  required></th>
			</tr>
			<tr>
				<th>Nationality:</th>
				<th><input type='text' name='nationality' value='$Nationality' required></th>
			</tr>
			<tr>
				<th>Gender:</th>
				<th><input type='text' name='s_gender' value='$gender'  required>
            </tr>
			<tr>
				<th>Blood Group:</th>
				<th><input type='text' name='blood_group' value='$b_group'  required></th>
			</tr>
			<tr>
				<th>Email:</th>
				<th><input type='text' name='s_email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}' value='$email' required></th>
			</tr>
			<tr>
			<th><input align='center' type='submit' name='button' value='Submit' /></th>
			</tr>
	    
	</form>";
	?>
	</body>
	</html>
</body>
</html>