<?php
include "api_header.php";
$cid = $_POST["CourseID"];

$sql = "SELECT te.TeacherID,te.TeacherFirstName,te.TeacherLastName,t.CourseID FROM Teaching t,Teacher te WHERE t.CourseID='$cid' AND t.TeacherID=te.TeacherID";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("teacherid" => $result["TeacherID"],
                     "teacherfn" => $result["TeacherFirstName"],
                     "teacherln" => $result["TeacherLastName"],
                     "courseid" => $result["CourseID"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
