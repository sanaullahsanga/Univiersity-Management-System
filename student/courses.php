
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Management System</title>
    <link rel="stylesheet" href="../stylesheet.css">
    
</head>
<body>
<?php
//error_reporting(0);
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
session_start();
$id=$_SESSION['var'];

echo "<br>
			<div class='container'>
            <div class='main-content'>
            <div class='navigation'>
                
                    <div class='c1'>
                    <table align='center'>
                    <tr bgcolor='#FF0000'>
                    <th><a>Courses</a></th>
                    <th></th>
                    <th><a>Action</a></th>
                    <th><a>Action</a></th>
                    </tr>
	";
$var=mysqli_query($conn,"select * from course_along_calculate_std where s_id= '$id' ");


     while ($row=mysqli_fetch_array($var)) 
     {
	        # code...
        	$va= $row['c_id'];
        	$temp  = $row['c_a_s_id'];
        	$temp1  = $row['section'];
			echo "
                            <tr><th><a>" .$va ."</a></th>
                            <th>"."<input type='hidden' name='cou_name' value='$va' size='10'>"."</th>
			                <th>"."<a href='attendence.php?c_a_s_id=$temp'>Attendence</a>"."</th>
			                <th>"."<a href='mark.php?c_a_s_id=$temp&section=$temp1&c_id=$va'>Marks</a>"."</th>
			                
                        </tr>
                        ";
			
			
			
	}
	echo "<tr>
                        
                        </table><p align='center'><a width= '50px' href='student_main.php'>Home</a></p></div></div></div></div>";
	?> 


    
                        
                		
	</body>
	</html>