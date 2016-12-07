<?php
include "api_header.php";

$tid = $_POST["TeacherID"];
$del = "DELETE FROM Teacher WHERE TeacherID='$tid'";

mysqli_query($con,$del);

$output = array("status"=>"delete_success");
echo json_encode($output);

?>
