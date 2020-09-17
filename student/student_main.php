
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Management System</title>
    <link rel="stylesheet" href="../stylesheet1.css">
    
</head>
<body>
	<?php 
	//include 'conn.php';
	?>
	<?php
	session_start();
	$id=$_SESSION['var']; 
	 ?>
         <div class="container">
        <div class="main-content">
            <h1>WELCOME <br>
                <span>STUDENT</span>
            </h1>
            <br>
            <div class="navigation">
                
                <form  method="POST" action="signin.php">
                    <div class="c1">
                    <table align="center">
                        <tr>
                            <th><a href='perso.php?id=$id'>Personal </a></th>
                            <th><a href="courses.php">Show Record</a></th>
                            <th><a href="logout.php">Logout</a></th>
                        </tr>
                    </table>
                		</div>	

</body>
</html>
