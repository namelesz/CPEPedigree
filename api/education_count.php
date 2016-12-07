<?php
  header('Content-Type: application/json');
  include "api_header.php";

  $sql = "SELECT c.CourseID, CourseName, AVG(Review) AS AVGReview FROM Education e,Course c WHERE e.CourseID = c.CourseID GROUP BY c.CourseID ORDER BY AVGReview DESC";

  $query = mysqli_query($con,$sql);

  $output = array();
  while($result = mysqli_fetch_assoc($query)){
  $row_array = array("courseID" => $result["CourseID"],
                     "courseName" => $result["CourseName"],
                     "AVGReview" => $result["AVGReview"]
                    );

  array_push($output, $row_array);
 }

 echo json_encode($output);






 ?>
