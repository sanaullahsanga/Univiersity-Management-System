<?php
$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
mysql_query($conn,"select * from course_info where of_degree='cs'");
?>