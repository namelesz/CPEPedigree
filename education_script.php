<script>

$().ready(function(){
  showAllreview();
  getCourse();
  getFamilyCode();
  showMyReview();
  $('[data-toggle="tooltip"]').tooltip();
})

function getCourse(){

  $.ajax({
    type : "GET",
    url : "api/education_getCourse.php",
    success : function(data){
      var result ;
      result = "<select class = 'form-control' id = 'sel'>";
      result += "<option val = '0'>กรุณาเลือกวิชาเรียน</option>"
      for (var i = 0; i < data.length; i++) {
        result += "<option value = '"+data[i].courseID+"'>"+data[i].courseID+ " : "+data[i].courseName+"</option>";
      }

      result += "</select>";

      document.getElementById("showCourse").innerHTML = result;
      $("#sel").change(function(){
        var courseID = $(this).val();
        getTeacher(courseID);
      });
    },

    dataType : 'json',
    contentType: 'application/json'
  });

}

function getTeacher(courseID){
  $.post("api/education_teacher.php", {
    "CourseID" : courseID
  }, function(data){

    var result ;
    result = "<select class = 'form-control' id = 'selTeacherVar'>";
    for (var i = 0; i < data.length; i++) {
      result += "<option value = '" + data[i].teacherID + "'>" +data[i].teacherFirstName+ " " + data[i].teacherLastName+ "</option>";
    }

    result += "</select>";


    document.getElementById("showTeacher").innerHTML = result;

 })

}

function getFamilyCode(){

  $.ajax({
    type : "GET",
    url : "api/education_getFamilyCode.php",
    success : function(data){
      var result ;
      result = "<select class = 'form-control' id = 'selFamilyCode' style = 'width:auto;'>";
      result += "<option value = '0'>กรุณาเลือกสาย</option>"
      for (var i = 0; i < data.length; i++) {
        result += "<option value = '"+data[i].familyCode+"'>"+data[i].familyCode+ " : "+data[i].familyName+"</option>";
      }

      result += "</select>";
      document.getElementById("showFamily").innerHTML = result;

      $("#selFamilyCode").change(function(){
        var value = $(this).val();
        if(value!=0){
          showReviewAnotherCode(value);
        }
      });

    },

    dataType : 'json',
    contentType: 'application/json'
  });

}


function showReviewAnotherCode(familyCode){
  $.post("api/education_all.php", {
     "FamilyCode" : familyCode
   }, function(data){

     $("#showresult").empty();
     for(var i=0;i<data.length;i++){
       var starValue = parseFloat(data[i].review);
       var starValueFloor = Math.floor(starValue);
       var check = starValue - starValueFloor;
       var star = ' ';
       for (var j = 0; j < starValueFloor ; j++) {
          star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
       }

       if(check!=0){
         star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
       }


            $("#showresult").append("<div class = 'blog-comment'><div class = 'post-comments'><p class='meta' style='color:black;'><b><a href='profile.php?id="+data[i].studentID+ "' target='_blank'>"
                                     +data[i].studentID+ "</a> " + data[i].firstname + " " + data[i].lastname + "</b><i class='pull-right'><a><small style='color:#5BC0DE;'>"+data[i].courseID+ " "+data[i].courseName+"</small></a></i>"+
                                     "<br> คะแนน : "+star+"</b><i class='pull-right'><small style='color:#5BC0DE;'>ผู้สอน : "+data[i].teacherFirstName+" "+data[i].teacherLastName+"</small></i>"+
                                     "<p>"+data[i].comment+
                                     "</p></div></div>");
        star = ' ';
        // showMyReview();
     }
  })

}


function showMyReview(){
  var studentID = '<?php echo $_SESSION["StudentID"];?>';
  var table;
  $.post("api/education_myreviewNew.php",{
    StudentID : studentID
  },function(data){
    table = "<table class='table table-striped'><thead><tr><th>รหัสวิชา</th><th>คะแนน</th><th>ความคิดเห็น</th><th>ลบ</th></tr></thead>";
    table += "<tbody>";
    for (var i = 0; i < data.length; i++) {
      table +=   "<tr><td><a href='#' data-toggle='tooltip' data-placement='buttom' title='"+data[i].teacherFirstName+" "+data[i].teacherLastName+"'>"+data[i].courseID+"</a></td><td>"+data[i].review+"</td><td>"+data[i].comment+"</td><td>"+
                  "<button class='btn btn-danger btn-sm' onclick =\"deleteReview('"+studentID+"','"+data[i].courseID+"')\">"+
                  "<i class='fa fa-trash-o'aria-hidden='true'></i></button></td></tr>";
    }
    $('[data-toggle="tooltip"]').tooltip();

    table += "</tbody></table>";
    document.getElementById("showMyReview").innerHTML = table;
  })
}

function deleteReview(studentID,courseID){
  $.post("api/education_deleteReview.php",{
    StudentID : studentID,
    CourseID : courseID
  },function(data){
    if(data.status == "success"){
      // postidToEducation();
      showAllreview();
      showMyReview();
    }
  })
}

function deleteReviewFromCode(studentID,courseID){
  $.post("api/education_deleteReview.php",{
    StudentID : studentID,
    CourseID : courseID
  },function(data){
    if(data.status == "success"){
      postidToEducation();
      showMyReview();
    }
  })
}


function showAllreview(){

  $.post("api/education_showall.php", {

   }, function(data){

     $("#showresult").val('');
     document.getElementById("showresult").innerHTML = ' ';

     for(var i=0;i<data.length;i++){
       var starValue = parseFloat(data[i].review);
       var starValueFloor = Math.floor(starValue);
       var check = starValue - starValueFloor;
       var star = ' ';
       for (var j = 0; j < starValueFloor ; j++) {
          star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
       }

       if(check!=0){
         star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
       }


      $("#showresult").append("<div class = 'blog-comment'><div class = 'post-comments'><p class='meta' style='color:black;'><b><a href='profile.php?id="+data[i].studentID+ "' target='_blank'>"
                               +data[i].studentID+ "</a> " + data[i].firstname + " " + data[i].lastname + "</b><i class='pull-right'><a><small style='color:#5BC0DE;'>"+data[i].courseID+ " "+data[i].courseName+"</small></a></i>"+
                               "<br> คะแนน : "+star+"</b><i class='pull-right'><small style='color:#5BC0DE;'>ผู้สอน : "+data[i].teacherFirstName+" "+data[i].teacherLastName+"</small></i>"+
                               "<p>"+data[i].comment+
                               "</p></div></div>");

        star = ' ';

        getFamilyCode();
        showMyReview();
     }
  })


}


function postidToEducation(){

 document.getElementById("showresult").innerHTML = " ";
 var studentID = '<?php echo $_SESSION["StudentID"];?>';
 var len = studentID.length;
 var res = studentID.substring(len-2,len);
 var code = parseInt(res);

 if(code > 40 && code<=80){
   code = code-40;
 }else if(code>80){
   code = code - 80;
 }

 $.post("api/education_all.php", {
    "FamilyCode" : code
  }, function(data){

    for(var i=0;i<data.length;i++){
      var starValue = parseFloat(data[i].review);
      var starValueFloor = Math.floor(starValue);
      var check = starValue - starValueFloor;
      var star = ' ';
      for (var j = 0; j < starValueFloor ; j++) {
         star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      if(check!=0){
        star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      $("#showresult").append("<div class = 'blog-comment'><div class = 'post-comments'><p class='meta' style='color:black;'><b><a href='profile.php?id="+data[i].studentID+ "' target='_blank'>"
                              +data[i].studentID+ "</a> " + data[i].firstname + " " + data[i].lastname + "</b><i class='pull-right'><a><small style='color:#5BC0DE;'>"+data[i].courseID+ " "+data[i].courseName+"</small></a></i>"+
                              "<br> คะแนน : "+star+"</b><i class='pull-right'><small style='color:#5BC0DE;'>ผู้สอน : "+data[i].teacherFirstName+" "+data[i].teacherLastName+"</small></i>"+
                              "<p>"+data[i].comment+
                              "</p></div></div>");

       star = ' ';
      //  showMyReview();
    }
 })
}


function addEducation(){

  var studentID = '<?php echo $_SESSION["StudentID"];?>';
  var courseID = $("#sel").val();
  var teacherID = $("#selTeacherVar").val();
  var review = $("#review").val();
  var comment = $("#comment").val();

  var star = document.getElementsByName("rating");
  var sizes = star.length;

  for (i=0; i < sizes; i++) {
        if(star[i].checked==true) {
            review = parseFloat(star[i].value);
        }
  }

  $.post("api/education_insert.php",{
    "StudentID" : studentID,
    "CourseID" : courseID,
    "TeacherID" : teacherID,
    "Review" : review,
    "Comment" : comment
  },function(data){
    if(data.status == 'success' && courseID!=0){
      $('#myModal').modal('hide');
      showAllreview();
      // postidToEducation();
    }else{
      $("#warning").append("<div class='alert alert-danger'><strong>เกิดข้อผิดพลาด</strong> กรุณากรอกข้อมูลใหม่อีกครั้ง</div>")
    }
  })

  $("#courseID").val(' ');
  $("#review").val(' ');
  $("#comment").val(' ');
  manageAlert();
}

function manageAlert(){
  document.getElementById("warning").innerHTML = ' ';
}


</script>
