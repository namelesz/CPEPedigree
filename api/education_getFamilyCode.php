<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $sql = "SELECT FamilyCode,FamilyName FROM FamilyCode";
  $query = mysqli_query($con,$sql);

  $output = array();
  while($result = mysqli_fetch_assoc($query)){
    $row_array = array("familyCode" => $result["FamilyCode"],
                       "familyName" => $result["FamilyName"]
                      );
    array_push($output, $row_array);
  }

  echo json_encode($output);

 ?>
