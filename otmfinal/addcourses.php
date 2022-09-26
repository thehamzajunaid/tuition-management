<?php
$course_ids =array();
if ($_SERVER["REQUEST_METHOD"] == "GET" ){
    session_start();
        include 'partials/_dbconnect.php';
        if (isset($_GET['proceed'])){
            if (isset($_SESSION["student_id_login"])){
                $student_id=$_SESSION["student_id"];
                $row4=$_SESSION["Del_rec"];
                $class_id=$row4[0]["class_id"];
             }
                else{
                 $student_id=$_SESSION["student_id"];
                 $class_id=$_SESSION["value"];
                }
            $sqlclass="SELECT course_id FROM courses where class_id='$class_id';";
            $run_query = mysqli_query($conn,$sqlclass);
            $count = mysqli_num_rows($run_query);
            $pay=0;
            for ($x =1; $x <= $count; $x++) {
            
                $subject="subject".$x;
                if (isset($_GET[$subject])){
                     //$subject[]=$_GET[$subject];
                     $course_id=$_GET[$subject];
                     array_push($course_ids, $course_id);
                     $courses="INSERT INTO `onlinetuitionmanagementsystem`.`student_courses` (`student_id`, `course_id`) VALUES ('$student_id', '$course_id');";
                     $payofsubject="SELECT pay_of_sub FROM courses WHERE course_id='$course_id';";
                     if ($conn->query($courses)==true){
                        $result = $conn->query($payofsubject);
                        $pay=$pay+$result->fetch_assoc()['pay_of_sub'];
                        
                    }
                    else{
                        echo "ERROR";
                    }
                }
                
            }
            $payofstudent= "SELECT stu_pay FROM student WHERE student_id='$student_id';";
            $result1 = $conn->query($payofstudent);
            $pay=$pay+$result1->fetch_assoc()['stu_pay'];
            $stu_pay="UPDATE `student` SET `stu_pay` = '$pay' WHERE `student`.`student_id` = '$student_id';";
            if ($conn->query($stu_pay)==true){
                echo "SUCCESSFULLY INSERTED";
              
            }
            else{
                echo "ERROR";
            }    
           
    $conn->close();       
}
//$_SESSION["subject"]=$subject;
header('Location: student-tutor.php?course_ids='.join(",",$course_ids));
}
?>