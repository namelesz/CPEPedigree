<?php
include "api_header.php";
$teacherID = $_POST["TeacherID"];
$tfname = $_POST["TeacherFirsName"];
$tlname = $_POST["TeacherLastname"];

if($tfname==""||$tlname=="")
{
  $output = array("status"=>"err");
}
else
{
    $add = "UPDATE Teacher SET TeacherFirstName='$tfname', TeacherLastname='$tlname' WHERE TeacherID='$teacherID'";
    $query = mysqli_query($con, $add);
    $output = array("status"=>"success");
}
echo json_encode($output);

?>
