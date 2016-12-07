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
    $sql = "INSERT INTO Student VALUES ('$stuID', '$fbID', '$firstname', '$lastname', '$gender', '$DOB', '$tel', '$email', '$program', '$occupation', '$workplace', '$generation', '$familycode')";
    if($query = mysqli_query($con, $sql)){
      $output = array("status" => "success");
      $_SESSION["StudentID"] = $stuID;
      $_SESSION["Name"] = $firstname." ".$lastname;
      $_SESSION["FamilyCode"] = $familycode;
      $_SESSION["Generation"] = $generation;

      $s = "INSERT INTO Permission VALUES('$fbID','User')";
      mysqli_query($con, $s);
    } else {
      $output = array("status" => "error");
    }
  } else {
    $output = array("status" => "input_error");
  }

  echo json_encode($output);
?>
