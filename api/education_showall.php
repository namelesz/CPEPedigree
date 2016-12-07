<?php

  header('Content-Type: application/json');
  include "api_header.php";

  $sql = "SELECT Education.StudentID,Student.FirstName,Student.LastName,Course.CourseID,CourseName,Teacher.TeacherFirstName,Teacher.TeacherLastname,
              Review,Comment
              FROM Education
              INNER JOIN Student
              INNER JOIN FamilyCode
              INNER JOIN Course
              INNER JOIN Teacher
              WHERE Education.CourseID = Course.CourseID
              AND Student.FamilyCode = FamilyCode.FamilyCode
              AND Education.StudentID = Student.StudentID
              AND Education.TeacherID = Teacher.TeacherID";


  $query = mysqli_query($con,$sql);

  $output = array();
  while($result = mysqli_fetch_assoc($query)){
  $row_array = array("studentID" => $result["StudentID"],
                     "firstname" => $result["FirstName"],
                      "lastname" => $result["LastName"],
                      "courseID" => $result["CourseID"],
                     "courseName" => $result["CourseName"],
                    "teacherFirstName" => $result["TeacherFirstName"],
                    "teacherLastName" => $result["TeacherLastname"],
                      "review" => $result["Review"],
                      "comment" => $result["Comment"]
                    );
    array_push($output, $row_array);
  }

  echo json_encode($output);



 ?>
