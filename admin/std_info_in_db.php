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

                      //////////////////////////////////////////Insertion into Login User////////////////////////////////////////////  
                  
                      $name = $_POST['s_name'];
                      $user_name = "S-".$_POST['s_name']; 
                      mysqli_query($conn,"insert into login_user(user_name, pin) values ('$user_name', '$_POST[pin]')");  

                      /////////////////////////////////////////Insertion into Student_info///////////////////////////////////////////

                      $result = mysqli_query($conn,"select * from login_user where user_name='$user_name' and pin='$_POST[pin]'"); 
                      $row = mysqli_fetch_array($result);
                      $var = $row['id'];
                      $var1 = $row['user_name'];
                      $var2 = $row['pin'];
                      $var3 = "insert into student_info(s_id, s_name,  s_cnic, s_contact, s_email,
                                          s_dob, s_address, religion, nationality, s_gender, blood_group) 
                                          values('$var', '$_POST[s_name]', '$_POST[s_cnic]', '$_POST[s_contact]', '$_POST[s_email]', '$_POST[s_dob]', '$_POST[s_address]', 
                                          '$_POST[religion]', '$_POST[nationality]', '$_POST[s_gender]', '$_POST[blood_group]' )";

                                           
                                           
                      $sql=mysqli_query($conn,$var3);
                      if(!$sql)
                      {
                        echo "Data not inserted";
                      }
                      $var4 = mysqli_query($conn, "insert into guardian_info(s_id, father_name, father_cnic, father_contact, father_job) values('$var', '$_POST[father_name]', '$_POST[father_cnic]', '$_POST[father_contact]', '$_POST[father_job]')");
                      if(!$var4)
                      {
                        echo "Data Not Inserted into guardian_info";
                      }

                      $var5 = mysqli_query($conn, "insert into degree0_info(s_id, degree, dep, batch, section) values('$var', '$_POST[reg_degree]', '$_POST[reg_department]', '$_POST[batch]','$_POST[section]')");
                       if(!$var5)
                      {
                        echo "Data Not Inserted into degree_info";
                      }
                     
                      //////////////////////////////////////////Providing Option for Print////////////////////////////////////////////

                      echo "<br><br><br><br><br><br><br><br><br><br><br><p align='center'>LOGIN information for $name is<br>USER 
                             NAME = $var1<br>PIN       = $var2<br></p>";
                      echo '<p align="center"><a href="admin1_main.php">Click to get redirect to WELCOME page</a>&emsp;<a  
                             titlt="print screen" alt="print screen" onclick="window.print();" target="_blank" style="cursor:pointer;">
                             <h5 align="center">CLICK TO PRINT</h5></a></p>';	

/////////////////////////////////////////////////////////////////////////////End////////////////////////////////////////////////////////////////////////////////////
    
?>





