<?php
include "api_header.php";
$teacher = $_POST["TeacherID"];
$sql = "SELECT * FROM Teacher WHERE TeacherID='$teacher'";

$query = mysqli_query($con, $sql);
$output=array();
if($result = mysqli_fetch_assoc($query)){
  $output = array("teacherid" => $result["TeacherID"],
                     "teacherfn" => $result["TeacherFirstName"],
                     "teacherln" => $result["TeacherLastname"]
                    );
}
echo json_encode($output);



 ?>
