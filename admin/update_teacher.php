<?php 

/////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
if(!$conn)
	echo "NOT CONNECTED";

///////////////////////////////////////////////////////////////////////////Start////////////////////////////////////////////////////////////////////////////////////

                      /////////////////////////////////////////Updation into Student_info///////////////////////////////////////////

                      $var3="update teacher_info set  name='$_POST[name]' ,  cnic= '$_POST[cnic]',  education='$_POST[edu]', contact = '$_POST[contact]', email = '$_POST[email]',dob = '$_POST[dob]', address = '$_POST[address]', religion = '$_POST[religion]', nationality = '$_POST[nationality]', gender = '$_POST[gender]', blood_group = '$_POST[blood_group]' where t_id= $_POST[id]";
                      $sql=mysqli_query($conn,$var3);
                      if(!$sql)
                      {
                        echo "Data not inserted";
                      }
                      else
                      {
                        header("location:show_faculty.php");
                      }
                  
                      
/////////////////////////////////////////////////////////////////////////////End////////////////////////////////////////////////////////////////////////////////////
    
?>





