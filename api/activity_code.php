<?php
include "api_header.php";
$sid = $_POST["StudentID"];
$sql = "SELECT * FROM ActivityCode ac WHERE NOT EXISTS (SELECT ActivityID FROM Activity a WHERE a.StudentID='$sid' AND ac.ActivityID=a.ActivityID)";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("activity_id" => $result["ActivityID"],
                     "activity_name" => $result["ActivityName"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);



 ?>
