<?php 
 include 'new_conn.php';  
 ////////////////////////////////////////////////////////////////////connecting to dbwp////////////////////////////////////////////////////////////////////////////

$server_name = "localhost";
$user_name = "root";
$password = "";
$database = "dbwp";
$conn = mysqli_connect($server_name, $user_name, $password, $database);
if(!$conn)
	echo "NOT CONNECTED";

////////////////////////////////////////////////////////////////////////Tables/////////////////////////////////////////////////////////////////////////////////////
 
                  //////////////////////////////////////////////Login user Table//////////////////////////////////////////////////
                    
                  $login_user = mysqli_query($conn, "CREATE TABLE login_user
                                                    (
                  	                            id               int                not null         auto_increment,
 	                                              user_name        varchar(20)        not null         unique,
 	                                              pin              varchar(30)        not null,                                        
 	                                              primary key(id)
 	                                              )"
 	                                       );
                  if(!$login_user)
                  	echo "login table not created";

                          mysqli_query($conn, "Insert into login_user(user_name, pin) values ('A-admin', '1234asdf')");
                  /////////////////////////////////////////////////course's Table//////////////////////////////////////////////////

                  $course_info = mysqli_query($conn, "CREATE TABLE course_info
                                                (
                                                c_id            varchar(20)         primary KEY,
                                                c_name          varchar(40)         not null          unique,
                                                pre_req         varchar(40),
                                                of_department   varchar(40)         not null,
                                                of_degree       varchar(20)         not null,
                                                credit_hour     int                 not null
                                                )"
                                         );
                  if(!$course_info)
                        echo "course table not created";

  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('cs101', 'itc',  '',  'cs',    'bs', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('cs103', 'cp', 'cs101',  'cs', 'bs', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('cs201', 'ds', 'cs103',  'cs', 'bs', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('cs301', 'ap',  '',    'cs',   'ms', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('cs302', 'rm', 'cs301', 'cs',  'ms', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('ee182', 'be',  '',    'ee',   'bs', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('ee227', 'dld', 'ee182', 'ee', 'bs', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('ee109', 'amd',  '',   'ee',   'ms', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('ee108', 'cmd', 'ee109', 'ee', 'ms', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('bb102', 'fm',  '',   'ba',   'bba', 3)");
  mysqli_query($conn, "insert into course_info(c_id, c_name, pre_req, of_department, of_degree, credit_hour) values ('bb107', 'mm', 'bb102', 'ba', 'bba', 3)");

                  //////////////////////////////////////////////Teacher's Table/////////////////////////////////////////////////////
                    
                  $teacher_info = mysqli_query($conn, "CREATE TABLE teacher_info
                  	                              (
                  	                              t_id            int                 primary key,
 	                                                name            varchar(20)         not null,
 	                                                cnic            varchar(30)         not null         unique,
 	                                                education       varchar(30)         not null,
 	                                                contact         varchar(30)         not null,
 	                                                email           varchar(50)         not null         unique,
 	                                                dob             varchar(30),
 	                                                address         varchar(50)         not null,
 	                                                religion        varchar(20),
 	                                                nationality     varchar(15)         not null,
 	                                                gender          varchar(15)         not null,
                                                  blood_group     varchar(15)         not null,
 	                                                foreign key(t_id) references login_user(id)
 	                                                )"
 	                                         );
                  if(!$teacher_info)
                  	echo "teacher table not created";
                     

                                   /////////////////////////////Teacher's Courses Table/////////////////////////////
                 
                  $teacher_course_info = mysqli_query($conn, "CREATE TABLE teacher_course_info
                                                  (
                                                  t_id               int                 not null,
                                                  course_id          varchar(20)         not null,   
                                                  section            varchar(20)         not null,   
                                                  batch              int                 not null,         
                                                  foreign key(t_id) references teacher_info(t_id),
                                                  foreign key(course_id) references course_info(c_id)
                                                  )"
                                           );
                  if(!$teacher_course_info)
                    echo "teacher table not created";

                  
                  //////////////////////////////////////////////Student's Table/////////////////////////////////////////////////////
                    
                  $student_info = mysqli_query($conn, "CREATE TABLE student_info
                  	                              (
                  	                              s_id            int                 primary key,
 	                                                s_name          varchar(20)         not null         unique,   
 	                                                s_cnic          varchar(30)         not null         unique,
 	                                                s_contact       varchar(30)         not null,
 	                                                s_email         varchar(50)         not null         unique,
 	                                                s_dob           varchar(30)         not null,
 	                                                s_address       varchar(50)         not null,
 	                                                religion        varchar(20),
 	                                                nationality     varchar(15)         not null,
 	                                                s_gender        varchar(10)         not null,
 	                                                blood_group     varchar(10)         not null,
 	                                                foreign key(s_id) references login_user(id)
 	                                                )"
 	                                         );
                  if(!$student_info)
                  	echo "student table not created";

                                   //////////////////////////////Guardian's Table///////////////////////////////////
                  
                  $guardian_info = mysqli_query($conn, "CREATE TABLE guardian_info
                                                (
                                                s_id            INT                 not null,
                                                father_name     varchar(20)         not null,
                                                father_cnic     varchar(30)         not null         unique,
                                                father_contact  varchar(30)         not null,
                                                father_job      varchar(30)         not null,
                                                foreign key(s_id) references student_info(s_id)          
                                                )"
                                         );
                  if(!$guardian_info)
                        echo "guardian_info table not created";
                  
                  ///////////////////////////////////////////////////degree Table//////////////////////////////////////////////////


                  $degree0_info = mysqli_query($conn, "CREATE TABLE degree0_info
                                                (
                                                s_id            int                 not null         unique,
                                                degree          varchar(40)         not null,
                                                dep             varchar(40)         not null,
                                                batch           int                 not null,
                                                section         varchar(20)         not null,
                                                foreign key(s_id) references student_info(s_id)         
                                                )"
                                         );
                  if(!$degree0_info)
                        echo "degree0_info table not created";

              
                                   //////////////////////////////////degree1  Table////////////////////////////////////////

                  $degree1_info = mysqli_query($conn, "CREATE TABLE degree1_info
                                                (
                                                s_id           int                 not null         unique,
                                                cgpa           real                not null,
                                                c_hr_total     int                 not null,
                                                c_hr_earned    int                 not null,
                                                foreign key(s_id) references student_info(s_id)        
                                                )"
                                         );
                  if(!$degree1_info)
                        echo "degree1_info table not created";

                  ////////////////////////////////////////////Courses along Stds Table/////////////////////////////////////////////

                  $course_along_calculate_std = mysqli_query($conn, "CREATE TABLE course_along_calculate_std/*course_along_students*/
                                                (
                  /*course along student id*/   c_a_s_id        int                 auto_increment,
                                                s_id            INT                 not null,
                                                c_id            varchar(20)         not null,
                                                section         varchar(20)         not null,
                                                semester_no     INT                 not null,
                                                p_f_s           varchar(40),/*passed/failed/currently studying*/
                                                sgpa            REAL,                 
                                                primary key (c_a_s_id),
                                                foreign key(s_id) references student_info(s_id),
                                                foreign key(c_id) references course_info(c_id)         
                                                )"
                                         );
                  if(!$course_along_calculate_std)
                        echo "course along calculate table table not created";

            
                  ///////////////////////////////////////////////////course_std_sem/////////////////////////////////////////////////

                  $course_std_sem = mysqli_query($conn, "CREATE TABLE course_std_sem/*courses_of students_in_semesters*/
                                                (
                                                c_a_s_id        int                  not null         unique,
                                                t_m_assign      REAL                 not null,   /*only weightage*/
                                                o_m_assign      REAL                 not null,   /*only weightage*/
                                                t_m_quiz        REAL                 not null,   /*only weightage*/
                                                o_m_quiz        REAL                 not null,   /*only weightage*/
                                                t_att           REAL                 not null,   /*Only percentage*/ 
                                                foreign key (c_a_s_id) references  course_along_std(c_a_s_id)     
                                                )"
                                         );
                  if(!$course_std_sem)
                        echo "course for students in register table not created";

                  /////////////////////////////////////////////////Attendence table///////////////////////////////////////////////
 
                  $att_std_sem = mysqli_query($conn, "CREATE TABLE att_std_sem/*courses_of students_in_semesters*/
                                                (
                                                c_a_s_id        int                 not null,
                                                date_           date                not null,
                                                status          varchar(10)         not null,
                                                foreign key (c_a_s_id) references  course_along_std(c_a_s_id)        
                                                )"
                                         );
                  if(!$att_std_sem)
                        echo "attendence for students in register table not created";

                  /////////////////////////////////////////////////Quiz's table///////////////////////////////////////////////
                    
                      $quiz_std_sem = mysqli_query($conn, "CREATE TABLE quiz_std_sem/*quizes of students_in_semesters*/
                                                (
                                                section         varchar(20)         not null,
                                                c_id            varchar(20)         not null,
                                                quiz_no         int                 not null,
                                                date_           date                not null,
                                                m_quiz          int                 not null,
                                                w_quiz          REAL                not null,  
                                                foreign key (c_id) references  course_info(c_id)
                                                  )"
                                         );
                  if(!$quiz_std_sem)
                        echo "Quiz for students in register table not created";


                      $quiz_std_sem1 = mysqli_query($conn, "CREATE TABLE quiz_std_sem1/*quizes of students_in_semesters*/
                                                (
                                                c_a_s_id        int                 not null,
                                                quiz_no         int                 not null,
                                                o_m_quiz        REAL                not null,
                                                o_w_quiz        REAL                not null,                                                
                                                foreign key (c_a_s_id) references  course_along_std(c_a_s_id),
                                                foreign key (quiz_no) references  quiz_std_sem(quiz_no)        
                                                )"
                                         );
                  if(!$quiz_std_sem1)
                        echo "Quiz for students in register table1 not created";
                    
                  /////////////////////////////////////////////////Assignment's table///////////////////////////////////////////////
                     
                      $ass_std_sem = mysqli_query($conn, "CREATE TABLE ass_std_sem/*courses_of students_in_semesters*/
                                                (
                                                section         varchar(20)         not null,
                                                c_id            varchar(20)         not null,
                                                date_           date                not null, 
                                                assg_no         int                 not null,
                                                m_assg          int                 not null,
                                                w_assg          REAL                not null,
                                                foreign key (c_id) references  course_info(c_id)      
                                                )"
                                         );
                  if(!$ass_std_sem)
                        echo "Assignment for students in register table not created";


                      $ass_std_sem1 = mysqli_query($conn, "CREATE TABLE ass_std_sem1/*courses_of students_in_semesters*/
                                                (
                                                c_a_s_id        int                 not null,
                                                assg_no         int                 not null,
                                                o_m_assg        REAL                not null,
                                                o_w_assg        REAL                not null,                                                
                                                foreign key (c_a_s_id) references  course_along_std(c_a_s_id),
                                                foreign key (assg_no) references  ass_std_sem(assg_no)         
                                                )"
                                         );
                  if(!$ass_std_sem1)
                        echo "Assignment for students in register table1 not created";


                  ///////////////////////////////////////////////////Exam's table///////////////////////////////////////////////////
                     
                      $exam_std_sem = mysqli_query($conn, "CREATE TABLE exam_std_sem/*courses_of students_in_semesters*/
                                                (
                                                section         varchar(20)         not null,
                                                c_id            varchar(20)         not null,
                                                date_           date                not null, 
                                                exam_name       varchar(20)         not null,
                                                m_exam          int                 not null,
                                                w_exam          REAL                not null,
                                                foreign key (c_id) references  course_info(c_id)       
                                                )"
                                         );
                  if(!$ass_std_sem)
                        echo "Exam table for students not created";


                      $exam_std_sem1 = mysqli_query($conn, "CREATE TABLE exam_std_sem1/*courses_of students_in_semesters*/
                                                (
                                                c_a_s_id        int                 not null,
                                                date_           date                not null,
                                                exam_name       varchar(20)         not null,
                                                o_m_exam        REAL                not null,
                                                o_w_exam        REAL                not null,
                                                foreign key (c_a_s_id) references  course_along_std(c_a_s_id),
                                                foreign key (exam_name) references  exam_std_sem(exam_name)        
                                                )"
                                         );
                  if(!$ass_std_sem1)
                        echo "Assignment for students in register table1 not created";


                  /////////////////////////////////////////////////Fee detail table/////////////////////////////////////////////// 
                     
                     $fee_std_sem = mysqli_query($conn, "CREATE TABLE fee_detail
 	                                            (
 	                                            s_id             int            primary key,
 	                                            fee              real,
 	                                            foreign key(s_id) references login_user(id)	
 	                                            )
 	         ");
 	         
?>