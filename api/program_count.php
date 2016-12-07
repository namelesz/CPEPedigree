<?php
include "api_header.php";

  $sql = "SELECT Program, COUNT(*) AS Count FROM Student GROUP BY Program";
  if( $query = mysqli_query($con, $sql))
  {
    while($result = mysqli_fetch_assoc($query)){
      if($result["Program"]=='Regular'){
        $CountM = $result["Count"];
      }
      if($result["Program"]=='International'){
        $CountF = $result["Count"];
      }
    }
    $output = array("regular" => $CountM,
                    "international" => $CountF
  );
  }

  else {
    $output = array("status" => "error");//check that data are exist.
  }

  echo json_encode($output);


?>
