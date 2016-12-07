<?php
  include "api_header.php";

  $upperID = $_POST["UpperID"];
  $underID = $_POST["UnderID"];

  $sql = "DELETE FROM Taking WHERE StudentUpperID='$upperID' AND StudentUnderID='$underID'";
  if($query = mysqli_query($con, $sql)){
    $output = array("status" => "success");
  } else {
    $output = array("status" => "error");
  }

  echo json_encode($output);
?>
