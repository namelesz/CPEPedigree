<?php
include "api_header.php";

   $sql = "SELECT StudentUpperID,COUNT(StudentUnderID) AS Count FROM Taking GROUP BY StudentUpperID ORDER BY StudentUpperID";

  if( $query = mysqli_query($con, $sql))
  {
  $output = array();
  
  while($result = mysqli_fetch_assoc($query))
    {

      $row_array = array('StudentUpperID' => $result["StudentUpperID"],
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

