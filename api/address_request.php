<?php
  include "api_header.php";

  $StuID = $_POST["StudentID"];

  $sql = "SELECT * FROM Address WHERE StudentID='$StuID'";

  if($query = mysqli_query($con, $sql)){
    $output = array();
  } else {
    $output = array("status" => "error");
  }

  while($result = mysqli_fetch_assoc($query)){
    $row_array = array("type" => $result["Type"],
                       "address" => $result["Address"],
                       "latitude" => $result["Latitude"],
                       "longitude" => $result["Longitude"]
                      );
    array_push($output, $row_array);
  }

  echo json_encode($output);

?>
