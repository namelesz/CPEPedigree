<?php
header('Content-Type: application/json');
include "api_header.php";

   $sql = "SELECT CorpName,COUNT(StudentID) AS Num FROM Internship GROUP BY CorpName ORDER BY Num DESC";
   
   if($query = mysqli_query($con,$sql)){

   $output = array();
   while($result = mysqli_fetch_assoc($query)) {
         $row_array = array("CorpName" => $result["CorpName"],
                            "Num" => $result["Num"],
                            );
         array_push($output, $row_array);
   }
 }
  else {
    $output = array('status'=>'Show Fail! ');
  }


 echo json_encode($output);

 ?>
