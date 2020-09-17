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
                  
                      $name = $_POST['name'];
                      $user_name = "T-".$_POST['name']; 
                      mysqli_query($conn,"insert into login_user(user_name, pin) values ('$user_name', '$_POST[pin]')");  

                      /////////////////////////////////////////Insertion into Student_info///////////////////////////////////////////

                      $result = mysqli_query($conn,"select * 
                                                    from login_user
                                                    where 
                                                         user_name='$user_name' 
                                                                 and 
                                                          pin='$_POST[pin]'"
                                            ); 
                      $row = mysqli_fetch_array($result);
                      $var=$row['id'];
                      $var1=$row['user_name'];
                      $var2=$row['pin'];
                      mysqli_query($conn, "insert into teacher_info(t_id, name, cnic, education, contact, email, dob, address, religion
                                           , nationality, gender, blood_group) values('$var', '$_POST[name]', '$_POST[cnic]',
                                            '$_POST[education]', '$_POST[contact]', '$_POST[email]', '$_POST[dob]', '$_POST[address]',
                                             '$_POST[religion]', '$_POST[nationality]', '$_POST[gender]', '$_POST[blood_group]')");
                  
                      //////////////////////////////////////////Providing Option for Print////////////////////////////////////////////

                      echo "<br><br><br><br><br><br><br><br><br><br><br><p align='center'>LOGIN information for $name is<br>USER 
                             NAME = $var1<br>PIN       = $var2<br></p>";
                      echo '<p align="center"><a href="admin1_main.php">Click to get redirect to WELCOME page</a>&emsp;<a  
                             titlt="print screen" alt="print screen" onclick="window.print();" target="_blank" style="cursor:pointer;">
                             <h5 align="center">CLICK TO PRINT</h5></a></p>';	

/////////////////////////////////////////////////////////////////////////////End////////////////////////////////////////////////////////////////////////////////////
    
?>





