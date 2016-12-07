<?php
include "api_header.php";

   $sql = "SELECT Generation,Program,COUNT(StudentID) AS 'Student_count' FROM Student GROUP BY Generation, Program ORDER BY Generation DESC";

  if( $query = mysqli_query($con, $sql))
  {
  $gendata = array();
  
  while($result = mysqli_fetch_assoc($query))
    {

      $row_array = array('generation' => $result["Generation"],
      'program' => $result["Program"],
      'student_count' => $result["Student_count"]
    );

    array_push($gendata, $row_array);
    }

  }

 else {
  $gendata = array("status" => "error");//check that data are exist.
  }

echo json_encode($gendata);

?>

