<?php
  include "api_header.php";

  $studentID = $_POST["StudentID"];
  $type = $_POST["Type"];
  $address = $_POST["Address"];
  $lat = $_POST["Latitude"];
  $long = $_POST["Longitude"];
  if($studentID&&$type&&$address&&$lat&&$long){
    $sql = "INSERT INTO Address VALUES ('$studentID','$type','$address','$lat','$long')";
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
