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

                      $var3="update student_info set  s_name='$_POST[s_name]' ,  s_cnic= '$_POST[s_cnic]', s_contact = '$_POST[s_contact]', s_email = '$_POST[s_email]',s_dob = '$_POST[s_dob]', s_address = '$_POST[s_address]', religion = '$_POST[religion]', nationality = '$_POST[nationality]', s_gender = '$_POST[s_gender]', blood_group = '$_POST[blood_group]' where s_id= $_POST[s_id]";
                      $sql=mysqli_query($conn,$var3);
                      if(!$sql)
                      {
                        echo "Data not inserted";
                      }
                      else
                      {
                        header("location:show_Student.php");
                      }
                  
                      
/////////////////////////////////////////////////////////////////////////////End////////////////////////////////////////////////////////////////////////////////////
    
?>





