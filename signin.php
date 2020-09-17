<?php 

 ////////////////////////////////////////////////////////////////////connecting to dbwp/////////////////////////////////////////////////////////////////////////////

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
if(!$conn)
	echo "NOT CONNECTED";

///////////////////////////////////////////////////////////////////// query for sign in/////////////////////////////////////////////////////////////////////////////

$query_signin = mysqli_query($conn, "select substring(user_name,1,1) as first_part, substring(user_name,2,1) as second_part 
	                                 from login_user  
	                                 where            user_name='$_POST[user_name]' 
	                                                           and 
	                                                      pin='$_POST[pin]'"
                            );
$result = mysqli_fetch_array($query_signin);
$first_alphabet = $result['first_part'];
$second_alphabet = $result['second_part'];
$var=mysqli_query($conn,"select * from login_user where  user_name='$_POST[user_name]' and pin='$_POST[pin]'");
$var2=mysqli_fetch_array($var);
$id=$var2['id'];

session_start();
$_SESSION['var']=$id;
if(is_null($first_alphabet))
{
	header("location:index.php?msg=Kindly login to system with correct name and password");
}
else
	if($first_alphabet == 'S')
		header("location:student/student_main.php?id=$id");
else
	if($first_alphabet == 'A')
		{		
			header("location:admin/admin1_main.php?id=$id");
		}
else
	if($first_alphabet == 'T')
		header("location:teacher/teacher_main.php?id=$id");

////////////////////////////////////////////////////////////////////////////end/////////////////////////////////////////////////////////////////////////////////////

?>