<?php
include "api_header.php";
$sql = "SELECT * FROM Teaching";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("courseid" => $result["CourseID"],
                     "teacherid" => $result["TeacherID"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
