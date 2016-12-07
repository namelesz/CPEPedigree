<?php
header('Content-Type: application/json');
include "api_header.php";

   $sql = "SELECT *
           FROM HangingOut
           ORDER BY FamilyCode ";

   $query = mysqli_query($con,$sql);
   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
     $restaurant = $result["Restaurant"];
     $s = "SELECT DISTINCT(FamilyCode) FROM HangingOut WHERE Restaurant='$restaurant'";
     $q = mysqli_query($con,$s);
     $famcode = array();
     while($r = mysqli_fetch_assoc($q)){
       array_push($famcode ,$r["FamilyCode"]);
     }
         $row_array = array("FamilyCode" => $famcode,
                            "Restaurant" => $result["Restaurant"],
                            "DateT"      => $result["DateT"],
                            "Generation" => $result["Generation"],
                            "Review"     => $result["Review"]);
         array_push($output, $row_array);
   }

 echo json_encode($output);

 ?>
