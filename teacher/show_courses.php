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
            <h1 align="left">Teacher</h1>
                <h1><span>Courses</span>
            </h1>
            <div class="navigation">
                    <div class="c1">
                    <table align="center">
                        <tr>
                            <th><a href='teacher_courses_info.php'>Courses</a></th>
                            <th><a href='show_record.php'>Show Record</a></th>
                            <th><a href='teacher_main.php'>Home</a></th>
                        </tr>
                    </table>
             </div>
         </div></div></div>


	
	
	 

</body>
</html>