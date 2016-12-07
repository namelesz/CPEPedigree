<?php
header('Content-Type: application/json');
include "api_header.php";

  $StudentID  = $_POST["StudentID"];
  $FamilyCode = $_POST["FamilyCode"];
  $Restaurant = $_POST["Restaurant"];
  $DateTime   = $_POST["DateT"];
  $Generation = $_POST["Generation"];
  $Review     = $_POST["Review"];

      $edit = "UPDATE HangingOut
             SET Review = '$review'
             WHERE FamilyCode ='$FamilyCode' AND Restaurant='$Restaurant'AND DateT='$DateTime' AND Generation='$Generation'";

    if($Review>0 && $Review <=5){
      mysqli_query($conn,$edit);
      $output = array("status"=>"Edit Success!");
    }
    else {
      $output = array("status"=>"Edit Fail!");
    }


echo json_encode($output);

?>
