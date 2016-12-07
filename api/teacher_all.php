<?php
include "api_header.php";
$sql = "SELECT * FROM Teacher";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("teacherid" => $result["TeacherID"],
                     "teacherfn" => $result["TeacherFirstName"],
                     "teacherln" => $result["TeacherLastname"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
