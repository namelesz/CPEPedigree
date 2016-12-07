<?php
  include "api_header.php";

  $FacebookID = $_POST["FacebookID"];
  $Permission = $_POST["Permission"];

  $sql = "UPDATE Permission SET Permission='$Permission' WHERE FacebookID='$FacebookID'";
  if($query = mysqli_query($con,$sql)){
    $output = array("status" => "success");
  } else {
    $output = array("status" => "error");
  }


  echo json_encode($output);
?>
