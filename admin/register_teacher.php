<!DOCTYPE html>
<html>
<head>
	<title>Register Teacher</title>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body>
	<form name="registration" method="post" align='center' action="teacher_info_in_db.php" >
		<div class="c1">
			<center><h1>Teacher Registration Form</h1></center>
		</div>
		<div class="c2">
		<table cellspacing="13px">
			<tr>
				<th><h1 align="center">Personal Information</h1></th>
			</tr>
			<tr>
				<th>Name:</th>
				<th><input type="text" name="name" placeholder="Name.."  required></th>
			</tr>
			<tr>
				<th>Password:</th>
				<th><input type="password" name="pin" pattern=".{8,}" placeholder="8 or more Characters"  required></th>
			</tr>
			<tr>
				<th>CNIC:</th>
				<th><input type="text" name="cnic" pattern="[0-9]{5}-+[0-9]{7}-[0-9]{1}" placeholder='*****-*******-*'  required></th>
			</tr>
			<tr>
				<th>Education:</th>
				<th><input type="text" name="education" placeholder='BSc/MSc/Phd/Others'  required></th>
			</tr>
			<tr>
				<th>Contact No.:</th>
				<th><input type="text" name="contact" pattern="[0-9]{4}-+[0-9]{7}" placeholder="****-*******"  required></th>
			</tr>
			<tr>
				<th>Date of Birth:</th>
				<th ><input type="date" name="dob" placeholder='Date of Birth'  required></th>
			</tr>
			<tr>
				<th>Home Address:</th>
				<th><input type="text" name="address" placeholder="Permanent Home Address.."  required></th>
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
				<th>Male<input type="radio" name="gender" value="male"  required>
                Female<input type="radio" name="gender" value="female"  required></th>
			</tr>
			<tr>
				<th>Blood Group:</th>
				<th><input type="text" name="blood_group" placeholder="Blood Group"  required></th>
			</tr>
			<tr>
				<th>Email:</th>
				<th><input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3}" placeholder="Email.."  required></th>
			</tr>

            <tr>
				<th class="c3"><input  type="submit" name="button" value="Submit" /></th>
			</tr>


		</table>
		</div>
	</form>

</body>
</html>