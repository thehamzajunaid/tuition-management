<?php

if ($_SERVER["REQUEST_METHOD"] == "GET" ){
    session_start();
        include 'partials/_dbconnect.php';
        if (isset($_GET['submit'])){
            $tutor_id=$_SESSION["tutor_id"];
            $del_rec=$_SESSION["Del_rec"] ;
            $count=count($del_rec);
            for ($x =1; $x <= $count; $x++) {
                $subject="subject".$x;
                echo $subject;
                if (isset($_GET[$subject])){
                     echo $_GET[$subject];
                     $course_id=$_GET[$subject];
                     $payofsubject="SELECT pay_of_sub FROM courses WHERE course_id='$course_id';";
                     $courses="DELETE FROM `tutor_courses` WHERE `tutor_courses`.`course_id`='$course_id' and `tutor_courses`.`tutor_id`='$tutor_id';";
                     mysqli_query($conn,$courses);
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
            $payoftutor= "SELECT tutor_pay FROM tutor WHERE tutor_id='$tutor_id';";
            $result1 = $conn->query($payoftutor);
            $pay=$result1->fetch_assoc()['tutor_pay']-$pay;
            $tutor_pay="UPDATE `tutor` SET `tutor_pay` = '$pay' WHERE `tutor`.`tutor_id` = '$tutor_id';";
            if ($conn->query($tutor_pay)==true){
                echo "SUCCESSFULLY INSERTED";
              
            }
            else{
                echo "ERROR";
            }
            $conn->close();             
}
header('Location: tutor-profile.php');
}
?>