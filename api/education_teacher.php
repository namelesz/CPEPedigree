<?php
  header('Content-Type: application/json');
  include "api_header.php";

  $courseID =  $_POST["CourseID"];

if($courseID==''){
  $sql = "SELECT * FROM Course
          INNER JOIN Teacher
          INNER JOIN Teaching
          WHERE Course.CourseID = Teaching.CourseID
          AND Teacher.TeacherID = Teaching.TeacherID";
} else {
  $sql = "SELECT * FROM Course
          INNER JOIN Teacher
          INNER JOIN Teaching
          WHERE Course.CourseID = '$courseID'
          AND Course.CourseID = Teaching.CourseID
          AND Teacher.TeacherID = Teaching.TeacherID";
}
  $query = mysqli_query($con,$sql);
  if($query){
    $output = array();
    while($result = mysqli_fetch_assoc($query)){
      $row_array = array("courseID" => $result["CourseID"],
                         "teacherID" => $result["TeacherID"],
                         "teacherFirstName" => $result["TeacherFirstName"],
                         "teacherLastName" => $result["TeacherLastname"]
                        );
      array_push($output, $row_array);
    }
  }

  echo json_encode($output);

?>
