<?php
  include "api_header.php";

  $FamCode = $_POST["FamilyCode"];
  $StudentID = $_POST["StudentID"];

  if($FamCode!=''){
    $sql = "SELECT StudentUpperID, StudentUpperFirstName, StudentUpperLastName, StudentUnderID, Student.FirstName AS StudentUnderFirstName, Student.LastName AS StudentUnderLastName, UpperFBID, Student.FacebookID AS UnderFBID  FROM (SELECT Taking.StudentUpperID, Student.FirstName AS StudentUpperFirstName, Student.LastName AS StudentUpperLastName, Taking.StudentUnderID, Student.FacebookID AS UpperFBID  FROM Student,Taking WHERE Student.StudentID = Taking.StudentUpperID AND Student.FamilyCode='$FamCode') AS std,Student WHERE std.StudentUnderID = Student.StudentID";
  } else if($StudentID!=''){
    $sql = "SELECT StudentUpperID, StudentUpperFirstName, StudentUpperLastName, StudentUnderID, Student.FirstName AS StudentUnderFirstName, Student.LastName AS StudentUnderLastName, UpperFBID, Student.FacebookID AS UnderFBID  FROM (SELECT Taking.StudentUpperID, Student.FirstName AS StudentUpperFirstName, Student.LastName AS StudentUpperLastName, Taking.StudentUnderID, Student.FacebookID AS UpperFBID  FROM Student,Taking WHERE Student.StudentID = Taking.StudentUpperID AND Taking.StudentUpperID='$StudentID') AS std,Student WHERE std.StudentUnderID = Student.StudentID";
  } else if($StudentID=='' && $FamCode==''){
    $sql = "SELECT StudentUpperID, StudentUpperFirstName, StudentUpperLastName, StudentUnderID, Student.FirstName AS StudentUnderFirstName, Student.LastName AS StudentUnderLastName, UpperFBID, Student.FacebookID AS UnderFBID  FROM (SELECT Taking.StudentUpperID, Student.FirstName AS StudentUpperFirstName, Student.LastName AS StudentUpperLastName, Taking.StudentUnderID, Student.FacebookID AS UpperFBID FROM Student,Taking WHERE Student.StudentID = Taking.StudentUpperID) AS std,Student WHERE std.StudentUnderID = Student.StudentID";
  }

  if($query = mysqli_query($con, $sql)){
    $output = array();
    while($result = mysqli_fetch_array($query)){
      $row_result = array("StudentUpperID" => $result["StudentUpperID"],
                          "StudentUpperName" => $result["StudentUpperFirstName"]." ".$result["StudentUpperLastName"],
                          "StudentUpperFBID" => $result["UpperFBID"],
                          "StudentUnderID" => $result["StudentUnderID"],
                          "StudentUnderName" => $result["StudentUnderFirstName"]." ".$result["StudentUnderLastName"],
                          "StudentUnderFBID" => $result["UnderFBID"]
                          );
      array_push($output, $row_result);
    }
  } else {
    $output = array("status" => "error");
  }

  echo json_encode($output);
?>
