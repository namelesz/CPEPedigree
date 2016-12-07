<?php
  include "api_header.php";

  $cid = $_POST["CourseID"];
  $cname = $_POST["CourseName"];

  if($cid && $cname){
    $sql = "UPDATE 	Course SET CourseName='$cname' WHERE CourseID='$cid'";
    if($query = mysqli_query($con, $sql)){
      $output = array("status" => "success");
    } else {
      $output = array("status" => "error");
    }
  } else {
    $output = array("status" => "input_error");
  }

  echo json_encode($output);
?>
