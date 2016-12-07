<?php
include "api_header.php";

$FamCode = $_POST["FamilyCode"];

if(($FamCode != '') &&($FamCode<1 || $FamCode>40))
{
  $output = array("status"=>"famerr");
}
else
{

  if($FamCode == '')
  {
    $sql = "SELECT * FROM Student ORDER BY StudentID";
  }
  else
  {
    $sql = "SELECT * FROM Student WHERE FamilyCode='$FamCode' ORDER BY Generation DESC";
  }

  if($query = mysqli_query($con, $sql)){
    $studata = array();
    while($result = mysqli_fetch_assoc($query)){

      $row_array = array("studentid" => $result["StudentID"],
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

    array_push($studata, $row_array);
  }


  $sql = "SELECT MAX(generation) as MaxGen, MIN(generation) as MinGen FROM Student WHERE FamilyCode='$FamCode'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);

  $max = $result["MaxGen"];
  $min = $result["MinGen"];

  $output = array('max_gen' => $max, 'min_gen' => $min, 'student_data' => $studata);

} else {
  $output = array("status" => "error");//check that data are exist.
}

echo json_encode($output);

}

?>
