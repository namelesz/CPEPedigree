<?php
include "api_header.php";

$FamCode = $_POST["FamilyCode"];

$sql = "SELECT MAX(Generation) as max_gen, MIN(Generation) as min_gen FROM Student WHERE FamilyCode='$FamCode'";

if($query = mysqli_query($con, $sql)){
  $output = array();
  $result = mysqli_fetch_assoc($query);
  $max = $result["max_gen"];
  $min = $result["min_gen"];
  $i = 0;
  while($i <= $max-$min){
    $reg1 = null;
    $reg2 = null;
    $reg3 = null;
    $int1 = null;
    $int2 = null;
    $current_gen = $max - $i;
    $sql = "SELECT * FROM Student WHERE FamilyCode='$FamCode' AND Generation='$current_gen' ORDER BY StudentID ASC";
    $query = mysqli_query($con, $sql);
    while($result = mysqli_fetch_assoc($query)){

      $row_array = array("studentid" => $result["StudentID"],
      "firstname" => $result["FirstName"],
      "lastname" => $result["LastName"],
      "fbid" => $result["FacebookID"],
      "program" => $result["Program"],
      "generation" => $result["Generation"],
      "familycode" => $result["FamilyCode"]
      );
        if(strlen($result["StudentID"])==11){
          if(ceil(($result["StudentID"]%1000)/40)==1){
            $reg1 = $row_array;
          }
          if(ceil(($result["StudentID"]%1000)/40)==2){
            $reg2 = $row_array;
          }
          if(ceil(($result["StudentID"]%1000)/40)==3){
            $reg3 = $row_array;
          }
          if(ceil(($result["StudentID"]%1000)/40)==11){
            $int1 = $row_array;
          }
          if(ceil(($result["StudentID"]%1000)/40)==12){
            $int2 = $row_array;
          }
        } else if(strlen($result["StudentID"])==8){
          if(ceil(($result["StudentID"]%100)/40)==1){
            $reg1 = $row_array;
          }
          if(ceil(($result["StudentID"]%100)/40)==2){
            $reg2 = $row_array;
          }
          if((ceil(($result["StudentID"]%100)/40)==1)&&$result["Program"]=="International"){
            $int1 = $row_array;
          }
          if((ceil(($result["StudentID"]%100)/40)==2)&&$result["Program"]=="International"){
            $int2 = $row_array;
          }
        }
    }

    $stu_data = array("reg1" => $reg1,
                      "reg2" => $reg2,
                      "reg3" => $reg3,
                      "int1" => $int1,
                      "int2" => $int2,
                      "generation" => $current_gen
                      );

    array_push($output,$stu_data);
    $i = $i+1;
  }


} else {
  $output = array("status" => "error");//check that data are exist.
}

echo json_encode($output);

?>
