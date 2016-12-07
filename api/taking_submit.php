<?php
  include "api_header.php";

  $upperID = $_POST["UpperID"];
  $underID = $_POST["UnderID"];
  if($upperID!=''&&$underID!=''&&($upperID!=$underID)){
    $sql = "INSERT INTO Taking VALUES ('$upperID','$underID')";
    if($query = mysqli_query($con, $sql)){
      $output = array("status" => "success");
    } else {
      $output = array("status" => "error");
    }
  } else {
    $output = array("status" => "no_input");
  }

  echo json_encode($output);
?>
