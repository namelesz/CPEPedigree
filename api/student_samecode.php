<?php
include "api_header.php";

$StudentID = $_POST["StudentID"];
$Code = $StudentID%100;

$sql = "SELECT * FROM Student WHERE StudentID='$StudentID'";
$query = mysqli_query($con, $sql);
$result = mysqli_fetch_assoc($query);
$Program = $result["Program"];

$sql = "SELECT * FROM Student WHERE StudentID LIKE '%$Code' AND StudentID != '$StudentID'";

if($query = mysqli_query($con, $sql)){
  $output = array();
  while($result = mysqli_fetch_assoc($query)){
    if(strlen($StudentID)==11){
      $s1=$StudentID%10000;
    }
    if(strlen($result["StudentID"])==11){
      $s2=$result["StudentID"]%10000;
    }
    if(strlen($StudentID)==8){
      $x = $StudentID%100; //เอา2เลขหลัง
      $s1 = floor($StudentID/100)%10000; //ดูว่าปกหรืออินเตอร์
      if($s1==2115){
        $s1=10;
      } else {
        $s1=34;
      }
      $s1=($s1*100)+$x;
    }
    if(strlen($result["StudentID"])==8){
      $x = $result["StudentID"]%100; //เอา2เลขหลัง
      $s2=floor($result["StudentID"]/100)%10000; //ดูว่าปกหรืออินเตอร์
      if($s2==2115){
        $s2=10;
      } else {
        $s2=34;
      }
      $s2=($s2*100)+$x;
    }
    if($s1==$s2){
      $row_array = array("StudentID" => $result["StudentID"],
                         "StudentName" => $result["FirstName"]." ".$result["LastName"],
                         "FacebookID" => $result["FacebookID"],
                         "Generation" => $result["Generation"]
                        );
      array_push($output, $row_array);
    }
  }



} else {
  $output = array("status" => "error");//check that data are exist.
}

echo json_encode($output);

?>
