<?php
header('Content-Type: application/json');
include "api_header.php";

   $sql = "SELECT Restaurant, COUNT(FamilyCode) AS NumberOfWhoWent FROM HangingOut GROUP BY Restaurant ORDER BY NumberOfWhoWent DESC LIMIT 5";

   if($query = mysqli_query($con,$sql)){

   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
         $row_array = array("Restaurant" => $result["Restaurant"],
                            "NumberOfWhoWent" => $result["NumberOfWhoWent"],
                            );
         array_push($output, $row_array);
   }
 }
  else {
    $output = array('status'=>'Show Fail! '.$FamilyCode);
  }


 echo json_encode($output);

 ?>
