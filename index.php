
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Education Management System</title>
    <link rel="stylesheet" href="stylesheet1.css">
    
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
               <img src="logo.jpg" alt="logo"></a>
            </div>
        </div>
    </header>

    <?php
	//include "new_conn.php";
	//include "tables.php"; 
	if (isset($_GET['msg']))
	{
		echo "<div style='background-color:#ddd;' align='center'><h3> $_GET[msg]</h3></div>";
    }
	?>
    <div class="container">
        <div class="main-content">
            <h1>
                <span>MARK</span>
            </h1>
            <div class="navigation">
                
                <form  method="POST" action="signin.php">
                    <div class="c1">
                    <table align="center">
                        <tr>
                            <th>User Name</th>
                            <th><input type="text" name="user_name"></th>
                        </tr>

                        <tr>
                            <th>Password</th>
                            <th><input type="Password" name="pin"><br></th>
                        </tr>
                    </table>
                		</div>	
                		
                			
                		<p align="center">	<input type="submit" value="SIGN IN"></p>
		
	</form>
            </div>
        </div>
    </div>
   


    

</body>

</html>