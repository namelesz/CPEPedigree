<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];

  $sql = "SELECT * FROM Education WHERE StudentID = '$studentID'";
  $query = mysqli_query($con,$sql);

  $output = array();
  while($result = mysqli_fetch_assoc($query)){
    $row_array = array("studentID" => $result["StudentID"],
                       "courseID" => $result["CourseID"],
                       "review" => $result["Review"],
                       "comment" => $result["Comment"]
                      );
    array_push($output, $row_array);
  }

  echo json_encode($output);

 ?>
