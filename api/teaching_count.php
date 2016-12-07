<?php
include "api_header.php";

   $sql = "SELECT tc.TeacherID,TeacherFirstName,TeacherLastName, COUNT(CourseID) AS Count FROM Teacher t,Teaching tc WHERE tc.TeacherID = t.TeacherID GROUP BY tc.TeacherID ORDER BY Count DESC";

  if( $query = mysqli_query($con, $sql))
  {
  $output = array();
  
  while($result = mysqli_fetch_assoc($query))
    {

      $row_array = array('TeacherFirstName' => $result["TeacherFirstName"],
        'TeacherLastName' => $result["TeacherLastName"],
      'Count' => $result["Count"]
    );

    array_push($output, $row_array);
    }

  }

 else {
  $output = array("status" => "error");//check that data are exist.
  }

echo json_encode($output);

?>

