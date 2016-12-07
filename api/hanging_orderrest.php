<?php
header('Content-Type: application/json');
include "api_header.php";

 $sql = "SELECT FamilyCode,Restaurant,DateT,Generation,cast(AVG(Review) AS decimal(10,1)) AS AVGReview
           FROM HangingOut
           GROUP BY Restaurant
           ORDER BY Restaurant ";

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
                            "Review"     => $result["AVGReview"]);
         array_push($output, $row_array);
   }
   echo json_encode($output);

 ?>
