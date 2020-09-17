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

    $t_id = $_POST['t_id'];
   // echo $t_id;
    $section = $_POST['section'];
    $batch =   $_POST['batch'];
    $cname = $_POST['course1'];
    $department = $_POST['department'];
  
    
  //  if(count($cname)!=count($section))
    	//$asd = count($cname);
    	//$qwe = count($section);
    	//echo $asd."&emsp;".$qwe;
	//while($s_ids = mysqli_fetch_array($query_sel_sid_degree0))
	//{
	//	foreach(array_keys($cname) as $i)
		//	{
		//		//echo ."&emsp;".."<br>";
		//		$temp = $cname[$i];
		//		$temp1 = $section[$i];
		//		if(!mysqli_query($conn, "insert into teacher_course_info(t_id, course_id, section) values('$t_id', '$temp', '$temp1')"))
		//			echo "noprint"."<br>";

    	//	}	
    $temp0 = sizeof($cname);
    for($x=0;$x<$temp0;$x++)
    {
        $temp = $cname[$x];
    	$temp1 = $section[$x];
        $batch1 = $batch[$x];
    	$sql =  "insert into teacher_course_info (t_id, course_id, section, batch) values ('$t_id', '$temp', '$temp1', $batch1)";
    	if(!mysqli_query($conn, $sql))
				echo $sql."<br>";
		//echo $temp."&emsp;".$temp1."<br>";
    }
		//echo $s_ids['s_id']."<br>";
    
	//}  
	//echo "<br><br><br><br><br><br><br><br><br><br><br><h1 align='center'>COURSES OFFERED TO ".$department." DEPARTMENT OF BATCH ".$batch."</h1><br>";
	echo '<p align="center"><a href="admin1_main.php">Click to get redirect to WELCOME page</a></p>';

    //foreach($s_ids as $ids)
    //{
                                
   // }




//
    




?>