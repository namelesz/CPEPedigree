<?php

    header('Content-Type: application/json');
    include "api_header.php";

    $familyCode = $_POST["FamilyCode"];
    $sql = "SELECT * FROM `Internship`
            INNER JOIN Student
            WHERE Student.FamilyCode = '$familyCode'
            AND Student.StudentID = Internship.StudentID";

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
