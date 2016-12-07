<?php
include "api_header.php";
$actid = $_POST["ActivityID"];
$actname = $_POST["ActivityName"];

if($actid==""||$actname=="")
{
  $output = array("status"=>"err");
}
else
{
    $add = "INSERT INTO ActivityCode VALUES ('$actid','$actname')";
    if($query = mysqli_query($con, $add))
  {
    $output = array("status"=>"Add Success",
                    "activityid" => $actid,
                    "activityname" => $actname);
  }
  else {
    $output = array("status"=>"samecode");
  }
}
echo json_encode($output);

?>
