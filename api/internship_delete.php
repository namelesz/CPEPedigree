<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];
  $corpName = $_POST["CorpName"];

  $sql = "DELETE FROM Internship WHERE StudentID = '$studentID' AND CorpName ='$corpName'";

  $query = mysqli_query($con,$sql);

  if($query){
    $status = array('status' => 'success');
  }else{
    $status = array('status' => 'fail');
  }


  echo json_encode($status);

 ?>
