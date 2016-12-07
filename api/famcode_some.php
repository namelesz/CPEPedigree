<?php
include "api_header.php";
$fc = $_POST["FamilyCode"];

$sql = "SELECT * FROM FamilyCode WHERE FamilyCode = '$fc'";
$query = mysqli_query($con, $sql);
while($result = mysqli_fetch_assoc($query)){
  $output= array("family_code" => $result["FamilyCode"],
                     "family_name" => $result["FamilyName"],
                     "facebook" => $result["FacebookGroup"],
                     "quote" => $result["Quote"],
                     "logo" => $result["Logo"]
                    );
}
echo json_encode($output);

?>
