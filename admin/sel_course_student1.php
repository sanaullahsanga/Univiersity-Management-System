<?php 
 
////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////

	$server_name = "localhost";
    $user_name = "root";
    $password = ""; 
    $database = "dbwp";
    $conn = mysqli_connect($server_name, $user_name, $password, $database);
    if(!$conn)
    	echo "NOT CONNECTED";

////////////////////////////////////////////////////////////////////Query to provide Options////////////////////////////////////////////////////////////////////////

    $batch = $_POST['batch'];
    $section=$_POST['section'];
    $semester_no=$_POST['semester'];
    $degree = $_POST['degree'];
    $cname = $_POST['course1'];
    $department = $_POST['department'];
   // echo $cname."<br>";
    /*$query_sel_cid_courseinfo = mysqli_query($conn, "select c_id 
	                                          from course_info 
	                                          where 
	                                          c_name in $cname
	                                          
	                                  ");*/
    $query_sel_sid_degree0 = mysqli_query($conn, "select s_id 
	                                          from degree0_info 
	                                          where 
	                                          degree = '$degree'
	                                          and
	                                          dep = '$department'
	                                          and
	                                          batch = '$batch'
	                                  ");
//	$c_ids = mysqli_fetch_array($query_sel_cid_courseinfo);
	while($s_ids = mysqli_fetch_array($query_sel_sid_degree0))
	{
		foreach($cname as $course)
			{
				//echo ."&emsp;".."<br>";
				$temp = $s_ids['s_id'];
				if(!mysqli_query($conn, "insert into course_along_calculate_std(s_id, c_id, section, semester_no, p_f_s) values('$temp', '$course', '$section', $semester_no, 'stuyding')"))
					echo "noprint"."<br>";

    		}	

		//echo $s_ids['s_id']."<br>";
	}  
	echo "<br><br><br><br><br><br><br><br><br><br><br><h1 align='center'>COURSES OFFERED TO ".$department." DEPARTMENT OF BATCH ".$batch." OF SECTION ".$section." OF SEMESTER NO.  ".$semester_no."</h1><br>";
	echo '<p align="center"><a href="admin1_main.php">Click to get redirect to WELCOME page</a></p>';

    //foreach($s_ids as $ids)
    //{
                                
   // }




//
    




?>