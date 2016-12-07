<?php
include "api_header.php";
$cid = $_POST["CourseID"];
$tid = $_POST["TeacherID"];

$add = "INSERT INTO Teaching VALUES ('$cid','$tid')";
    if($query = mysqli_query($con, $add))
  {
    $output = array("status"=>"Add Success");

  }
  else {
    $output = array("status"=>"samecode");
  }

echo json_encode($output);

?>
