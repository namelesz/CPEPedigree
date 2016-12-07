<?php
  header('Content-Type: application/json');
  include "api_header.php";

  $sql = "SELECT * FROM Course";

  $query = mysqli_query($con,$sql);

  $output = array();
  while($result = mysqli_fetch_assoc($query)){
  $row_array = array("courseID" => $result["CourseID"],
                     "courseName" => $result["CourseName"],
                    );

  array_push($output, $row_array);
 }

 echo json_encode($output);






 ?>
