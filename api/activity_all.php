<?php
include "api_header.php";
$sql = "SELECT * FROM ActivityCode";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $act_id = $result['ActivityID'];
  $sql = "SELECT COUNT(*) AS StudentNum FROM Activity WHERE ActivityID='$act_id'";
  $q = mysqli_query($con, $sql);
  $stu_num = mysqli_fetch_assoc($q);

  $row_array = array("activity_id" => $result["ActivityID"],
                     "activity_name" => $result["ActivityName"],
                     "student_num" => $stu_num["StudentNum"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
