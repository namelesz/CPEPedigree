<?php
header('Content-Type: application/json');
include "api_header.php";

  $FamilyCode = $_POST["FamilyCode"];
  $Restaurant = $_POST["Restaurant"];
  $DateTime   = $_POST["DateT"];
  $Generation = $_POST["Generation"];
  $Review     = $_POST["Review"];

    $add    = "INSERT INTO HangingOut(Restaurant, DateT, FamilyCode, Generation, Review)
               VALUES('$Restaurant', '$DateTime', '$FamilyCode', '$Generation', '$Review')";


    if($Restaurant==""||$Generation==""||$DateTime=="0000-00-00") {
        $output = array('status'=>'wrong input');
    }
    else if($Review>=0 && $Review <=5){
      mysqli_query($con,$add);
      $output = array('status'=>'add success');
    }
    else {
      $output = array('status'=>'add fail');
    }


echo json_encode($output);

?>
