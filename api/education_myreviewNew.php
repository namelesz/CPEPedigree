<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $studentID = $_POST["StudentID"];

  $sql = "SELECT Education.StudentID,Education.CourseID,Teacher.TeacherID,TeacherFirstName,TeacherLastname,Review,Comment
          FROM Education
          INNER JOIN Teacher
          WHERE StudentID =  '$studentID'
          AND Education.TeacherID = Teacher.TeacherID";

    $query = mysqli_query($con,$sql);

    $output = array();
    while($result = mysqli_fetch_assoc($query)){
        $row_array = array("studentID" => $result["StudentID"],
                           "courseID" => $result["CourseID"],
                           "teacherID" => $result["TeacherID"],
                           "teacherFirstName" => $result["TeacherFirstName"],
                           "teacherLastName" => $result["TeacherLastname"],
                           "review" => $result["Review"],
                          "comment" => $result["Comment"]
                          );

        array_push($output, $row_array);
      }

    echo json_encode($output);

 ?>
