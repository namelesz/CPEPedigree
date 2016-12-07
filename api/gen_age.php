<?php
include "api_header.php";

   $sql = "SELECT Generation, cast(AVG(YEAR(CURRENT_TIMESTAMP) - YEAR(DOB) - (RIGHT(CURRENT_TIMESTAMP, 5) < RIGHT(DOB, 5))) as decimal(10,2)) as Age 
  FROM Student GROUP BY Generation";

  if( $query = mysqli_query($con, $sql))
  {
  $output = array();
  
  while($result = mysqli_fetch_assoc($query))
    {

      $row_array = array('generation' => $result["Generation"],
      'Age' => $result["Age"]
    );

    array_push($output, $row_array);
    }

  }

 else {
  $output = array("status" => "error");//check that data are exist.
  }

echo json_encode($output);

?>

