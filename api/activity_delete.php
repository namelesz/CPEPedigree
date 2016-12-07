<?php
include "api_header.php";

$sid = $_POST["StudentID"];
$actid = $_POST["ActivityID"];
$del = "DELETE FROM Activity WHERE StudentID='$sid' AND ActivityID='$actid'";
mysqli_query($con,$del);

$output = array("status"=>"Delete Success!");
echo json_encode($output);

?>
