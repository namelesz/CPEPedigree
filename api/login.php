<?php
  include "api_header.php";

  $fbid = $_POST["FacebookID"];
  $_SESSION["FacebookID"] = $_POST["FacebookID"];
  $_SESSION["FacebookName"] = $_POST["FacebookName"];

  $sql = "SELECT * FROM Student WHERE FacebookID='$fbid'";

  if($query = mysqli_query($con, $sql)){
    if($result = mysqli_fetch_assoc($query)){
      $_SESSION["StudentID"] = $result["StudentID"];
      $_SESSION["Name"] = $result["FirstName"]." ".$result["LastName"];
      $_SESSION["FamilyCode"] = $result["FamilyCode"];
      $_SESSION["Generation"] = $result["Generation"];
      $output = array("status" => "success",
      "studentID" => $result["StudentID"],
      "generation" => $result["Generation"],
      "familycode" => $result["FamilyCode"],
      "firstname" => $result["FirstName"],
      "lastname" => $result["LastName"],
      "gender" => $result["Gender"],
    );

    $sql = "SELECT * FROM Permission WHERE FacebookID='$fbid'";

      if($query = mysqli_query($con, $sql)){
        if($result = mysqli_fetch_assoc($query)){
          $_SESSION["Permission"] = $result["Permission"];
        }
      }
    } else {
      $output = array("status" => "not_found");
    }
  } else {
    $output = array("status" => "error");
  }

  echo json_encode($output);
?>
