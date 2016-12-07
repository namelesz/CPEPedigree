<?php
  include "api_header.php";

  $FacebookID = $_POST["FacebookID"];
  $StudentID = $_POST["StudentID"];

  if($FacebookID!=''){
    $sql = "SELECT * FROM Student WHERE FacebookID='$FacebookID'";
  } else if($StudentID!=''){
    $sql = "SELECT * FROM Student WHERE StudentID='$StudentID'";
  }
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  if($result){
    $output = array("studentid" => $result["StudentID"],
                       "fbid" => $result["FacebookID"],
                       "firstname" => $result["FirstName"],
                       "lastname" => $result["LastName"],
                       "gender" => $result["Gender"],
                       "dob" => $result["DOB"],
                       "tel" => $result["Tel"],
                       "email" => $result["Email"],
                       "program" => $result["Program"],
                       "occp" => $result["Occupation"],
                       "workplace" => $result["Workplace"],
                       "generation" => $result["Generation"],
                       "familycode" => $result["FamilyCode"]
              );
  } else {
    $output = array("status" => "error");//check that data are exist.
  }


  echo json_encode($output);


?>
