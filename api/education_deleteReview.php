<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];
  $courseID = $_POST["CourseID"];

  $sql = "DELETE FROM Education WHERE StudentID = '$studentID' AND CourseID = '$courseID'";
  $query = mysqli_query($con,$sql);

  if($query){
    $status = array('status' => 'success');
  }else{
    $status = array('status' => 'fail');
  }

  echo json_encode($status);

?>
