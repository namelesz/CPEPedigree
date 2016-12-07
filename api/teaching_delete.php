<?php
include "api_header.php";

$tid = $_POST["TeacherID"];
$cid = $_POST["CourseID"];

$del = "DELETE FROM Teaching WHERE CourseID='$cid' AND TeacherID='$tid'";

mysqli_query($con,$del);

$output = array("status"=>"delete_success");
echo json_encode($output);

?>
