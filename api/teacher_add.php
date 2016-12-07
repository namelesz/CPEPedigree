<?php
include "api_header.php";
$tfname = $_POST["TeacherFirsName"];
$tlname = $_POST["TeacherLastname"];

if($tfname==""||$tlname=="")
{
  $output = array("status"=>"err");
}
else
{
    $add = "INSERT INTO Teacher (TeacherFirstName,TeacherLastname) VALUES ('$tfname','$tlname')";
    if($query = mysqli_query($con, $add))
  {
    $output = array("status"=>"Add Success",
                    "tfname" => $tfname,
                    "tlname" => $tlname);
  }
  else {
    $output = array("status"=>"samecode");
  }
}
echo json_encode($output);

?>
