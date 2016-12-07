<?php
include "api_header.php";
$sql = "SELECT * FROM Activity, ActivityCode, Student WHERE ActivityCode.ActivityID = Activity.ActivityID AND Activity.StudentID = Student.StudentID";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("activity_id" => $result["ActivityID"],
                     "activity_name" => $result["ActivityName"],
                     "student_id" => $result["StudentID"],
                     "student_name" => $result["FirstName"]." ".$result["LastName"],
                     "responsibility" => $result["Responsibility"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
