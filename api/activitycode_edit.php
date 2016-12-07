<?php
  include "api_header.php";

  $actid = $_POST["ActivityID"];
  $actname = $_POST["ActivityName"];

  if($actid && $actname){
    $sql = "UPDATE 	ActivityCode SET ActivityName='$actname' WHERE ActivityID='$actid'";
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
