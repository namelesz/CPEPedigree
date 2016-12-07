<?php
header('Content-Type: application/json');
include "api_header.php";

  $FamilyCode = $_POST["FamilyCode"];
  $Restaurant = $_POST["Restaurant"];
  $DateTime   = $_POST["DateT"];
  $Generation = $_POST["Generation"];

    $delete = "DELETE FROM HangingOut
               WHERE FamilyCode ='$FamilyCode' AND Restaurant='$Restaurant'AND DateT='$DateTime' AND Generation='$Generation'";

  if($query=mysqli_query($con,$delete)) {
    $output = array("status"=>"Delete Success!");
  }
  else {
    $output = array("status"=>"Delete Fail!");
  }

 echo json_encode($output);

?>
