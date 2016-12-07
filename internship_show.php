<?php
  header('Content-Type: application/json');
  include "api_header.php";

  // $codeString = $_POST["StudentID"];
  // $code = intVal(substr($codeString, -2));
  // if($code>40){
  //   $code = $code-40;
  // }

  $sql = "SELECT Internship.StudentID,Student.FirstName,Student.LastName,CorpName,Comment
          FROM Internship
          INNER JOIN Student
          WHERE Student.StudentID = Internship.StudentID";

        // WHERE Student.Familycode = '$code'
        // AND Student.StudentID = Internship.StudentID";

  $output = array();
  $query = mysqli_query($con,$sql);

  $row_array = array();
  while($result = mysqli_fetch_assoc($query)){
    $row_array = array("studentID" => $result["StudentID"],
                       "firstname" => $result["FirstName"],
                       "lastname" => $result["LastName"],
                       "corpName" => $result["CorpName"],
                       "comment" => $result["Comment"]
                     );
    array_push($output, $row_array);
  }

  echo json_encode($output);

 ?>
