<?php
  include "api_header.php";

  $StuID = $_POST["StudentID"];
  $Address = $_POST["Address"];

  $sql = "DELETE FROM Address WHERE StudentID='$StuID' AND Address='$Address'";

  if($query = mysqli_query($con, $sql)){
    $output = array("status" => "success");
  } else {
    $output = array("status" => "error");
  }


  echo json_encode($output);

?>
