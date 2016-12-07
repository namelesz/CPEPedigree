<?php
include "api_header.php";
$cid = $_POST["CourseID"];
$cname = $_POST["CourseName"];

if($cid==""||$cname=="")
{
  $output = array("status"=>"err");
}
else
{
    $add = "INSERT INTO Course VALUES ('$cid','$cname')";
    if($query = mysqli_query($con, $add))
  {
    $output = array("status"=>"Add Success",
                    "courseid" => $cid,
                    "coursename" => $cname);
  }
  else {
    $output = array("status"=>"samecode");
  }
}
echo json_encode($output);

?>
