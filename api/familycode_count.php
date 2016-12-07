<?php
include "api_header.php";

   $sql = "SELECT f.FamilyCode, COUNT(StudentID) AS Count FROM FamilyCode f,Student s WHERE f.FamilyCode=s.FamilyCode GROUP BY f.FamilyCode ORDER BY f.FamilyCode";

  if( $query = mysqli_query($con, $sql))
  {
  $output = array();
  
  while($result = mysqli_fetch_assoc($query))
    {

      $row_array = array('FamilyCode' => $result["FamilyCode"],
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

