<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];
  $corpName = $_POST["CorpName"];
  $comment = $_POST["Comment"];

  $comment = mysqli_escape_string($con,$comment);

  if($corpName && $comment){
    $sql = "INSERT INTO Internship(StudentID,CorpName,Comment)
            VALUES('$studentID','$corpName','$comment')";
    $query = mysqli_query($con,$sql);

    if($query){
      $status = array('status' => 'success');
    }else{
      $status = array('status' => 'fail');
    }

  }else{
    $status = array('status' => 'fail');
  }


  echo json_encode($status);

 ?>
