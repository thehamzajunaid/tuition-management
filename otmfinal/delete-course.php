<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" ){
    session_start();
        include 'partials/_dbconnect.php';
        if (isset($_GET['submit'])){
            //and isset($_POST['proceed'])
            
            $student_id=$_SESSION["student_id"];
            $del_rec=$_SESSION["Del_rec"] ;
            $count=count($del_rec);
            $pay=0;
            
            for ($x =1; $x <= $count; $x++) {
            
                $subject="subject".$x;
                echo $subject;
                if (isset($_GET[$subject])){
                     echo $_GET[$subject];
                     $course_id=$_GET[$subject];
                     $payofsubject="SELECT pay_of_sub FROM courses WHERE course_id='$course_id';";
                     $courses="DELETE FROM `student_courses` WHERE `student_courses`.`course_id`='$course_id' and `student_courses`.`student_id`='$student_id';";
                     //$result = $conn->query($payofsubject);
                     echo $courses;
                     if ($conn->query($courses)==true){
                        $result = $conn->query($payofsubject);
                        $pay=$pay+$result->fetch_assoc()['pay_of_sub']; 
                        echo "SUCCESSFUL";
                        
                    }
                    else{
                        echo "ERROR";
                    }
                }
            }
            $payofstudent= "SELECT stu_pay FROM student WHERE student_id='$student_id';";
            $result1 = $conn->query($payofstudent);
            $pay=$result1->fetch_assoc()['stu_pay']-$pay;
            $stu_pay="UPDATE `student` SET `stu_pay` = '$pay' WHERE `student`.`student_id` = '$student_id';";
            if ($conn->query($stu_pay)==true){
                echo "SUCCESSFULLY INSERTED";
              
            }
            else{
                echo "ERROR";
            }
            $conn->close();
                
}
header('Location: student-profile.php');
}
?>