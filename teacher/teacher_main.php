<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Management System</title>
    <link rel="stylesheet" href="../stylesheet1.css">
    
</head>
<body>
	<?php
	session_start();
	$id=$_SESSION['var'];
	?>
	<div class="container">
        <div class="main-content">
            <h1>WELCOME<br>
                <span>Teacher</span>
            </h1>
            <div class="navigation">
                    <div class="c1">
                    <table align="center">
                        <tr>
                            <th><a href='teacher_personal_info.php'>Personal Info</a></th>
                            <th><a href='show_courses.php'>Course Info</a></th>
                            <th><a href='logout.php'>Logout</a></th>
                        </tr>
                    </table>
             </div>
         </div></div></div>


	
	
	 

</body>
</html>