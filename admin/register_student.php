<!DOCTYPE html>
<html>
<head>
	<title>Register Student</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	
</head>
<body>
	<form name="registration" method="post" align='center' action="std_info_in_db.php" >
		<div class="c1">
			<center><h1>Student Registration Form</h1></center>
		</div>
		<div class="c2">
		<table cellspacing="13px">
			<tr >
				<th><h1 align="center">Personal Information</h1></th>
			</tr>
			<tr>
				<th>Name: </th>
				<td><input type="text" name="s_name" placeholder="Name.." required></th>
			</tr>
			<tr>
				<th>Password:</th>
				<th><input type="password" name="pin" pattern=".{8,}" placeholder="8 or more Characters"  required></th>
			</tr>
			<tr>
				<th>CNIC:</th>
				<th><input type="text" name="s_cnic" pattern="[0-9]{5}-+[0-9]{7}-[0-9]{1}" placeholder='*****-*******-*' required></th>
			</tr>
			<tr>
				<th>Contact No.:</th>
				<th><input type="text" name="s_contact" pattern="[0-9]{4}-+[0-9]{7}" placeholder="****-*******"  required></th>
			</tr>
			<tr>
				<th>Date of Birth:</th>
				<th width="60" height="48"> <input type="date" name="s_dob" placeholder='Date of Birth'  required></th>
			</tr>
			<tr>
				<th>Home Address:</th>
				<th><input type="text" name="s_address" placeholder="Permanent Home Address.."   required></th>
			</tr>
			<tr>
				<th>Religion:</th>
				<th><input type="text" name="religion" placeholder="Religion"  required></th>
			</tr>
			<tr>
				<th>Nationality:</th>
				<th><input type="text" name="nationality" placeholder="Nationality"  required></th>
			</tr>
			<tr>
				<th>Gender:</th>
				<th>Male<input type="radio" name="s_gender" value="male"  required>
                Female<input type="radio" name="s_gender" value="female"  required></th>
			</tr>
			<tr>
				<th>Blood Group:</th>
				<th><input type="text" name="blood_group" placeholder="Enter Class" required></th>
			</tr>
			<tr>
				<th>Email:</th>
				<th><input type="text" name="s_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}" placeholder="example@example.example" required></th>
			</tr>
			<tr>
				<th><h1 align="center">Guardian Information</h1></th>
			</tr>
			<tr>
				<th>Name:</th>
				<th><input type="text" name="father_name" placeholder="Father Name.."  required></th>
			</tr>
			<tr>
				<th>CNIC:</th>
				<th><input type="text" name="father_cnic" pattern="[0-9]{5}-+[0-9]{7}-[0-9]{1}" placeholder='*****-*******-*' required></th>
			</tr>
			<tr>
				<th>Contact No.:</th>
				<th><input type="text" name="father_contact" pattern="[0-9]{4}-+[0-9]{7}" placeholder="****-*******"  required></th>
			</tr>
			<tr>
				<th>Profession:</th>
				<th><input type="text" name="father_job" placeholder="Profession" required></th>
			</tr>
			<tr>
				<th><h1 align="center">Degree Type</h1></th>
			</tr>
			<tr>
				<th>Degree Program:</th>
				<th>BS<input type="radio" name="reg_degree" value="bs" required>
	            MS<input type="radio" name="reg_degree" value="ms" required><br>
	    </th>
			</tr>
			<tr>
				<th>Department:</th>
				<th>Computer Science<input type="radio" name="reg_department" value="cs" required>
	            Electrical Engineering<input type="radio" name="reg_department" value="ee" required>
	            Business Administration<input type="radio" name="reg_department" value="bba" required></th>
			</tr>
			<tr>
				<th>Batch:</th>
				<th><input type="number" name="batch"   required></th>	    
			</tr>
			<tr>
				<th>Section: </th>
				<th><select name="section" required>
			<option value="">Selct Section</option>
			<option value="A">A</option>
			<option value="B">B</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="F">F</option>
		</select></th>
			</tr>

			<tr>
				<th class="c3"><input align="center" type="submit" name="button" value="Submit"></th>
			</tr>

		</table>
		</div>
	</form>

</body>
</html>