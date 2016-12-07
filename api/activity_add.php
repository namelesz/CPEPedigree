<?php
include "api_header.php";
$sid = $_POST["StudentID"];
$actid = $_POST["ActivityID"];
$res = $_POST["Responsibility"];

if($res=="")
{
  $output = array("status"=>"reserr");
}
else
{
  $checkact = "SELECT * FROM ActivityCode WHERE ActivityID='$actid'";
  $q1 = mysqli_query($con, $checkact);
  if($result = mysqli_fetch_assoc($q1))
  {
    $add = "INSERT INTO Activity VALUES ('$sid','$actid','$res')";
    $query = mysqli_query($con, $add);
    $output = array("status"=>"Add Success",
                    "studentid" => $sid,
                    "activityid" => $actid,
                    "responsibility" => $res);
  }
  else
  {
  $output = array("status"=>"acterr");
  }
}
echo json_encode($output);

?>
