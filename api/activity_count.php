<?php
header('Content-Type: application/json');
include "api_header.php";

   $sql = "SELECT StudentID,COUNT(a.ActivityID) AS NumOfAttended FROM Activity a,ActivityCode ac WHERE a.ActivityID=ac.ActivityID GROUP BY StudentID ORDER BY NumOfAttended DESC";
   
   if($query = mysqli_query($con,$sql)){

   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
         $row_array = array("StudentID" => $result["StudentID"],
                            "NumOfAttended" => $result["NumOfAttended"],
                            );
         array_push($output, $row_array);
   }
 }
  else {
    $output = array('status'=>'Show Fail! ');
  }


 echo json_encode($output);

 ?>
