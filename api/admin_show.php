<?php
  include "api_header.php";
  $sql = "SELECT * FROM Permission, Student WHERE Permission.FacebookID=Student.FacebookID ORDER BY Permission";
  $query = mysqli_query($con,$sql);
  $output = array();
  while($result = mysqli_fetch_array($query)){
    $row = array("FacebookID" => $result["FacebookID"],
                 "Permission" => $result["Permission"],
                 "StudentID" => $result["StudentID"],
                 "StudentName" => $result["FirstName"]." ".$result["LastName"]
                );
    array_push($output, $row);
  }

  echo json_encode($output);
?>
