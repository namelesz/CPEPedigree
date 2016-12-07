<?php
  include "api_header.php";

  $fc = $_POST["FamilyCode"];
  $fn = $_POST["FamilyName"];
  $fb = $_POST["FacebookGroup"];
  $qt = $_POST["Quote"];
  $lg = $_POST["Logo"];

  if($fc && $fn && $fb && $qt && $lg){
    $sql = "UPDATE 	FamilyCode SET FamilyName='$fn', FacebookGroup='$fb', Quote='$qt', Logo='$lg' WHERE FamilyCode='$fc'";
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
