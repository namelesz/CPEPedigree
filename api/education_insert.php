<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];
  $courseID = $_POST["CourseID"];
  $teacherID = $_POST["TeacherID"];
  $review = $_POST["Review"];
  $comment = $_POST["Comment"];

  $comment = mysqli_escape_string($con,$comment);

  $sql = "INSERT INTO Education(StudentID,CourseID,TeacherID,Review,Comment)
          VALUES('$studentID','$courseID','$teacherID','$review','$comment')";

  $query = mysqli_query($con,$sql);

  if($query){
    $status = array('status' => 'success');
  }else{
    $status = array('status' => 'fail');
  }

  echo json_encode($status);

 ?>
