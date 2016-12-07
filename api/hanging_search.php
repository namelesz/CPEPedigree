<?php
//header('Content-Type: application/json');
include "api_header.php";

$Restaurant = $_POST["Restaurant"];

   $sql = "SELECT h.FamilyCode,Restaurant,DateT,Generation,Review,fc.FamilyName
           FROM HangingOut h ,FamilyCode fc WHERE fc.FamilyCode = h.FamilyCode AND Restaurant = '$Restaurant'
            ";

  if($query = mysqli_query($con,$sql))
  {

   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
         $row_array = array("FamilyCode" => $result["FamilyCode"],
                            "FamilyName" => $result["FamilyName"],
                            "Restaurant" => $result["Restaurant"],
                            "DateT"      => $result["DateT"],
                            "Generation" => $result["Generation"],
                            "Review"     => $result["Review"]);
         array_push($output, $row_array);
   }
  }else
  {
    $output = array("status" => "error");
  }

 echo json_encode($output);
