<?php
include "api_header.php";

  $sql = "SELECT Gender, COUNT(*) AS Count FROM Student GROUP BY Gender";
  if( $query = mysqli_query($con, $sql))
  {
    while($result = mysqli_fetch_assoc($query)){
      if($result["Gender"]=='M'){
        $CountM = $result["Count"];
      }
      if($result["Gender"]=='F'){
        $CountF = $result["Count"];
      }
    }
    $output = array("M" => $CountM,
                    "F" => $CountF
  );
  }

  else {
    $output = array("status" => "error");//check that data are exist.
  }

  echo json_encode($output);


?>
