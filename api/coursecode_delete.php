<?php
include "api_header.php";

$cid = $_POST["CourseID"];
$del = "DELETE FROM Course WHERE CourseID='$cid'";

mysqli_query($con,$del);

$output = array("status"=>"delete_success");
echo json_encode($output);

?>
