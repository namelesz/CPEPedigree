<?php
  include "api_header.php";

  session_destroy();

  $output = array("status" => "success");
  echo json_encode($output);

?>
