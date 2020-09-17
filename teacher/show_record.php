
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Management System</title>
    <link rel="stylesheet" href="../stylesheet2.css">
    
</head>
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
               <center><h1>Record</h1></center>
                    <div class='c1'>
                    <table align='center'>
                    <tr bgcolor='#FF0000'>
                    <th><a>Courses</a></th>
                    <th></th>
                    <th><a>Action</a></th>
                    <th><a>Action</a></th>
                    <th><a>Action</a></th>
                    <th><a>Action</a></th>
                    </tr>
    ";
$var=mysqli_query($conn,"select * from teacher_course_info where t_id=$id");

       while ($row=mysqli_fetch_array($var)) {
            # code...
            $va= $row['course_id'];
            $section=$row['section'];
            echo 
            "<tr><td><a>" .$va ."</a></td>
            <td>"."<input type='hidden' name='cou_name' value='$va' size='10'>"."</td>
            <td>"."<a href='show_attendance.php?id=$id&cid=$va&sec=$section'>Attendence</a>"."</td>
            <td>"."<a href='show_quiz.php?id=$id&cid=$va&sec=$section'>Quiz</a>"."</td>
            <td>"."<a href='show_assignment.php?id=$id&cid=$va&sec=$section'>Assignment</a>"."</td>
            <td>"."<a href='show_Exams.php?id=$id&cid=$va&sec=$section'>Exam</a>"."</td>
            </tr>";
            
        }
    echo "</table>
            <p align='center'><a href='show_courses.php'>Go Back</a><a href='teacher_main.php'>Home</a></p>
            ";
    ?> 