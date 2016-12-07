<?php
header('Content-Type: application/json');
include "api_header.php";

  $FamilyCode = $_POST["FamilyCode"];

  if($FamilyCode>0 && $FamilyCode<=40){
   $sql = "SELECT *
           FROM HangingOut
           WHERE FamilyCode ='$FamilyCode'";
   $query = mysqli_query($con,$sql);

   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
         $row_array = array("FamilyCode" => $result["FamilyCode"],
                            "Restaurant" => $result["Restaurant"],
                            "DateT"      => $result["DateT"],
                            "Generation" => $result["Generation"],
                            "Review"     => $result["Review"]);
         array_push($output, $row_array);
   }
  }
  else {
    $output = array('status'=>'Show Fail! '.$FamilyCode);
  }


 echo json_encode($output);

 ?>
