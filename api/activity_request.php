<?php
include "api_header.php";
$ActID = $_POST["ActivityID"];
$FamCode = $_POST["FamilyCode"];
$found = 0;
if(($FamCode<1 || $FamCode>40) && $FamCode!="")
{
  $output = array("status"=>"famerr");
}
else
{
  $output=array();
  $checkact = "SELECT * FROM ActivityCode WHERE ActivityID='$ActID'";
  $q1 = mysqli_query($con, $checkact);
  if($result = mysqli_fetch_assoc($q1) || $ActID=="")
  {
    if($FamCode=="" && $ActID!="")
    {
      $sql = "SELECT * FROM Activity a,ActivityCode ac,Student s WHERE a.ActivityID='$ActID' AND a.ActivityID=ac.ActivityID AND a.StudentID=s.StudentID";
    }
    else if($ActID=="" && $FamCode!="")
    {
      $sql = "SELECT * FROM Activity a,ActivityCode ac,Student s WHERE s.FamilyCode='$FamCode'AND a.ActivityID=ac.ActivityID AND a.StudentID=s.StudentID";
    }
    else if($ActID=="" && $FamCode=="")
    {
      $sql = "SELECT * FROM Activity a,ActivityCode ac,Student s WHERE a.ActivityID=ac.ActivityID AND a.StudentID=s.StudentID";
    }
    else
    {
      $sql = "SELECT * FROM Activity a,ActivityCode ac,Student s WHERE s.FamilyCode='$FamCode' AND a.ActivityID='$ActID' AND a.ActivityID=ac.ActivityID AND a.StudentID=s.StudentID";
    }
    $q2 = mysqli_query($con, $sql);

    while($result = mysqli_fetch_assoc($q2)){
      $found = 1;
      $row_array = array("actid" => $result["ActivityID"],
      "actname" => $result["ActivityName"],
      "respon" => $result["Responsibility"],
      "sid" => $result["StudentID"],
      "fname" => $result["FirstName"],
      "lname" => $result["LastName"],
      "program" => $result["Program"],
      "gen" => $result["Generation"]
    );
    array_push($output, $row_array);
  }
}
else
{
  $output = array("status"=>"acterr");
}

if ($found==0)
{
  $row_array = array("actid" => "-",
                  "actname" => "-",
                  "respon" => "-",
                  "sid" => "-",
                  "fname" => "-",
                  "lname" => "-",
                  "program" => "-",
                  "gen" => "-"
                   );
  array_push($output, $row_array);
}

}

echo json_encode($output);
?>
