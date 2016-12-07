<?php
include "api_header.php";

$sql = "SELECT CourseID, COUNT( * ) AS count FROM Teaching GROUP BY CourseID";
$query = mysqli_query($con, $sql);

$output=array();
while($result = mysqli_fetch_assoc($query)){

  $row_array = array("courseID" => $result["CourseID"],
                     "count" => $result["count"]
                    );
  array_push($output, $row_array);

}
echo json_encode($output);


?>
