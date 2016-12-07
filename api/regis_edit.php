<?php
  include "api_header.php";

  $stuID = $_POST["StudentID"];
  $fbID = $_POST["FacebookID"];
  $firstname = $_POST["FirstName"];
  $lastname = $_POST["LastName"];
  $gender = $_POST["Gender"];
  $DOB = $_POST["DOB"];
  $tel = $_POST["Tel"];
  $email = $_POST["Email"];
  $program = $_POST["Program"];
  $occupation = $_POST["Occupation"];
  $workplace = $_POST["Workplace"];
  $generation = $_POST["Generation"];
  $familycode = $_POST["FamilyCode"];

  if($stuID && $fbID && $firstname && $lastname && $gender && $DOB && $tel && $email && $program && $occupation && $generation && $familycode){
    $sql = "UPDATE Student SET StudentID='$stuID', FirstName='$firstname', LastName='$lastname', Gender='$gender', DOB='$DOB', Tel='$tel', Email='$email', Program='$program', Occupation='$occupation', Workplace='$workplace', Generation='$generation', FamilyCode='$familycode' WHERE FacebookID='$fbID'";
    if($query = mysqli_query($con, $sql)){
      $output = array("status" => "success");
    } else {
      $output = array("status" => "error");
    }
  } else {
    $output = array("status" => "input_error");
  }

  echo json_encode($output);
?>
