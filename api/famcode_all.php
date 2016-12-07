<?php
include "api_header.php";
$sql = "SELECT * FROM FamilyCode";
$query = mysqli_query($con, $sql);
$output=array();
while($result = mysqli_fetch_assoc($query)){
  $row_array = array("family_code" => $result["FamilyCode"],
                     "family_name" => $result["FamilyName"],
                     "facebook" => $result["FacebookGroup"],
                     "quote" => $result["Quote"],
                     "logo" => $result["Logo"]
                    );
  array_push($output, $row_array);
}
echo json_encode($output);
 ?>
