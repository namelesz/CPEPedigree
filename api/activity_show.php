<?php
include "api_header.php";
$sid = $_POST["StudentID"];
$sql = "SELECT * FROM Activity a,ActivityCode ac WHERE a.StudentID='$sid' AND a.ActivityID=ac.ActivityID";
$query = mysqli_query($con, $sql);

$output=array();
$found = 0;

while($result = mysqli_fetch_assoc($query))
  {
    $found = 1;
    $row_array = array("activity_id" => $result["ActivityID"],
                       "activity_name" => $result["ActivityName"],
                       "responsibility" => $result["Responsibility"]
                      );
  array_push($output, $row_array);
  }

if ($found==0)
{
  $output = array("activity_id" => "-",
                  "activity_name" => "-",
                  "responsibility" => "-"
                   );
}
echo json_encode($output);



?>
