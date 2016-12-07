<?php
include "api_header.php";
$cid = $_POST["CourseID"];
$sql = "SELECT TeacherID, TeacherFirstName, TeacherLastName FROM Teacher WHERE TeacherID NOT IN (SELECT TeacherID FROM Course, Teaching WHERE Course.CourseID=Teaching.CourseID AND Teaching.CourseID='$cid')";

$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("teacherid" => $result["TeacherID"],
                     "teacherfn" => $result["TeacherFirstName"],
                     "teacherln" => $result["TeacherLastName"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);



 ?>
