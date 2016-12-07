<?php
include "api_header.php";

$sql = "SELECT FamilyCode,COUNT(*) as count FROM HangingOut GROUP BY FamilyCode";
$query = mysqli_query($con, $sql);

$output=array();
while($result = mysqli_fetch_assoc($query)){

  $row_array = array("familyCode" => $result["FamilyCode"],
                     "count" => $result["count"]
                    );
  array_push($output, $row_array);

}
echo json_encode($output);


?>
