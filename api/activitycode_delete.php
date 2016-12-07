<?php
include "api_header.php";

$actid = $_POST["ActivityID"];
$del = "DELETE FROM ActivityCode WHERE ActivityID='$actid'";

mysqli_query($con,$del);

$output = array("status"=>"delete_success");
echo json_encode($output);

?>
