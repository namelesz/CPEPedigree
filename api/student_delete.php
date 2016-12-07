<?php
  include "api_header.php";
  $StudentID = $_POST["StudentID"];
    if($StudentID!=''){
    $sql = "DELETE FROM Student WHERE StudentID='$StudentID'";
    $query = mysqli_query($con, $sql);
    if($query){
      $output = array("status" => "success");
    } else {
      $output = array("status" => "error");
    }
  } else {
    $output = array("status" => "no_input");
  }

  echo json_encode($output);

?>
