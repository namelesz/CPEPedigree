
<script type="text/javascript">
function fetchData(id){
  $.post("api/profile_request.php", {
    FacebookID: id
  }, function(data){
    $("#firstname").val(data.firstname);
    $("#lastname").val(data.lastname);
    $("#studentid").val(data.studentid);
    $("#gender").val(data.gender);
    $("#dob").val(data.dob);
    $("#tel").val(data.tel);
    $("#email").val(data.email);
    $("#program").val(data.program);
    $("#occupation").val(data.occp);
    $("#workplace").val(data.workplace);
    $("#generation").val(data.generation)
    $("#facebookid").val(id)
    console.log(data)

  })
}

function editStudent(id){
  $('#editModal').modal('show')
  fetchData(id)
}

function fetchStudent(){
  $(".each-student").remove()
  $.post("api/student.php", { FamilyCode: '' }, function(data){
    for(i=0; i<data.student_data.length; i++){
      if(data.student_data[i].gender=="M"){
        gender = '<i class="fa fa-mars" style="color: #0094ff;" aria-hidden="true"></i>'
      } else {
        gender = '<i class="fa fa-venus" style="color: #ff00c7;" aria-hidden="true"></i>'
      }
      $("#student-list").append("<tr class='each-student'><td><a href='profile.php?id=" + data.student_data[i].studentid + "' target='_blank'>" + data.student_data[i].studentid + "</a></td><td>" + data.student_data[i].generation + "</td><td>" + data.student_data[i].familycode + "</td><td>" + data.student_data[i].firstname + " " + data.student_data[i].lastname + "</td><td>"
      + gender + "</td><td>" + data.student_data[i].program + "</td><td>" + data.student_data[i].dob + "</td><td>" + data.student_data[i].tel + "</td><td>" + data.student_data[i].email + "</td>" +
      "<td><button class='btn btn-primary btn-xs' onclick='addressListRequest(" + data.student_data[i].studentid + ")'><span class='glyphicon glyphicon-map-marker' aria-hidden='true'></span> ที่อยู่</button> <button class='btn btn-warning btn-xs' onclick='editStudent(" + data.student_data[i].fbid + ")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> แก้ไข</button> <button class='btn btn-danger btn-xs' onclick='deleteStudent(" + data.student_data[i].studentid + ")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> ลบ</button></td></tr>")
    }
  })
}

function submitEditStudent(id){
  var famcode = $("#studentid").val() % 40;
  if(famcode==0){
    famcode = 40;
  }

  $.post("api/regis_edit.php", {
    StudentID: $("#studentid").val(),
    FacebookID: $("#facebookid").val(),
    FirstName: $("#firstname").val(),
    LastName: $("#lastname").val(),
    Gender: $("#gender").val(),
    DOB: $("#dob").val(),
    Tel: $("#tel").val(),
    Email: $("#email").val(),
    Program: $("#program").val(),
    Occupation: $("#occupation").val(),
    Workplace: $("#workplace").val(),
    Generation: $("#generation").val(),
    FamilyCode: famcode
  }, function(data){
    if(data.status=="success"){
      $("#editModal").modal('hide')
      fetchStudent();
    } else {
      alert('เกิดข้อผิดพลาด');
    }
  })
}

function deleteStudent(id){
  $.post("api/student_delete.php", {StudentID: id}, function(data){
    if(data.status=="success"){
      fetchStudent();
    } else {
      alert('เกิดข้อผิดพลาด');
    }
  })
}


function addressListRequest(id){
  $("#addressModal").modal("show")
  $("#studentid").val(id)
  $.post("api/address_request.php",{ StudentID: id },
  function(data){
    console.log(data);
    $(".address-each").remove();
    if(data.length == 0){
      $("#address-list").append("<tr class='address-each'><td class='text-center'>ไม่มีข้อมูล</td></tr>")
    }
    for (var i = 0; i < data.length; i++) {
      id = data[i].address.replace(/ /g,"_");
      $("#address-list").append("<tr class='address-each' id='" + id + "'><td><span class='glyphicon glyphicon-map-marker'></span> " + data[i].address + " (<a href='http://maps.google.com/maps?q=loc:" + data[i].latitude + "," + data[i].longitude + "' target='_blank'>Google Map</a>)</td><td>" + data[i].type + "</td><td><button class='btn btn-danger btn-xs' onclick='deleteAddress(\"" + data[i].address + "\")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td></tr>")
    }
  })
}

function addAddress(){
  var id = $("#studentid").val()
  var addresslocation = $('#location').locationpicker('location');
  $.post("api/address_submit.php", {
    StudentID: $("#studentid").val(),
    Type: $("#type").val(),
    Address: $("#address").val(),
    Latitude: addresslocation.latitude,
    Longitude: addresslocation.longitude
  }, function(data){
    if(data.status=="success"){
      $("#address").val("");
      addressListRequest(id);
    } else {
      alert('เกิดข้อผิดพลาด')
    }
  })
}

function deleteAddress(addressName){
  var id = $("#studentid").val()
  $.post("api/address_delete.php", {StudentID: $("#studentid").val(), Address: addressName},
    function(data){
      if(data.status=="success"){

        $(".address-each").remove();
        addressListRequest(id);
      }
    }
  )
}


function updateTake(upper, under) {
  if(upper && under){
    $("#relation").slideDown();
    $.post("api/profile_request.php", {StudentID: upper}, function(data){
      uppername = data.firstname + " " + data.lastname
      if(data.firstname==undefined){
        uppername = "(ไม่พบข้อมูลรหัสนักศึกษา)"
        found = 0;
      } else {
        found = 1;
      }
    })
    $.post("api/profile_request.php", {StudentID: under}, function(data){
      undername = data.firstname + " " + data.lastname
      if(data.firstname==undefined){
        undername = "(ไม่พบข้อมูลรหัสนักศึกษา)"
        found = 0;
      } else {
        found = 1;
      }
      if(uppername!=''&&undername!=''){
        $("#relation-data").html(uppername + ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' + undername);
      } else {
        $("#relation-data").html()
      }
      if(found){
        $("#relation").addClass("alert-success")
        $("#relation").removeClass("alert-warning")
        $("#take-submit").removeClass("disabled")
      } else {
        $("#relation").removeClass("alert-success")
        $("#relation").addClass("alert-warning")
        $("#take-submit").addClass("disabled")
      }
    })
  } else {
    $("#relation").slideUp();
  }
}

$("#upper_input").keyup( function(){
  var upper = $("#upper_input").val()
  var under = $("#under_input").val()
  updateTake(upper, under)
})

$("#under_input").keyup( function(){
  var upper = $("#upper_input").val()
  var under = $("#under_input").val()
  updateTake(upper, under)
})

function fetchTake(){
  $(".taking-each").empty()
  $.post("api/taking_request.php", {FamCode: ''}, function(data){
    for(i=0; i<data.length; i++){
        $("#taking-list").append("<tr class='taking-each'><td><a href='profile.php?id=" + data[i].StudentUpperID + "' target='_blank'>" + data[i].StudentUpperID + "</a></td><td>" + data[i].StudentUpperName + "</td><td> <i class='fa fa-long-arrow-right' aria-hidden='true'></i> </td><td><a href='profile.php?id=" + data[i].StudentUnderID + "' target='_blank'>" + data[i].StudentUnderID + " </td><td>" + data[i].StudentUnderName + "</td><td><button class='btn btn-danger btn-xs' onclick='deleteTake(\"" + data[i].StudentUpperID + "\",\"" + data[i].StudentUnderID + "\")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td></tr>")
    }
  })
}

function addTake(){
  var upper = $("#upper_input").val()
  var under = $("#under_input").val()
  $.post("api/taking_submit.php", {UpperID: upper, UnderID: under}, function(data){
    if(data.status=="success"){
      fetchTake()
      $("#upper_input").val('')
      $("#under_input").val('')
      $("#relation").slideUp()
    } else {
      alert('เกิดข้อผิดพลาด')
    }
  })
}


function deleteTake(upper, under){
  console.log(upper + " " + under)
  $.post("api/taking_delete.php", {UpperID: upper, UnderID: under}, function(data){
    if(data.status=="success"){
      fetchTake()
    } else {
      alert('เกิดข้อผิดพลาด')
    }
  })
}

function fetchActivity(){
  $(".activity-each").remove()
  $.post("api/activity_all_each.php", {}, function(data){
    for(i=0; i<data.length; i++){
      $("#activity-list").append("<tr class='activity-each'><td><a href='profile.php?id=" + data[i].student_id +" target='_blank'>" + data[i].student_id + "</a></td><td>" + data[i].student_name + "</td><td>" + data[i].activity_name + "</td><td>" + data[i].responsibility + "</td><td><button class='btn btn-danger btn-xs' onclick=\"deleteActivity(\'" + data[i].student_id + "\',\'" + data[i].activity_id + "\')\" ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> ลบ</button></td></tr>")
    }
  })
}

function deleteActivity(stu_id, act_id){
  $.post("api/activity_delete.php", {StudentID: stu_id, ActivityID: act_id}, function(data){
    fetchActivity()
  })
}

function fetchEducation(){
  $.post("api/education_all.php", { }, function(data){
    $(".education-each").remove()
    if(data.length==0){
      $("#education-list").append("<tr><td class='text-center'>ไม่มีข้อมูล</td></tr>")
    }
    for(i=0; i<data.length; i++){
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
      $("#education-list").append("<tr class='education-each'><td>" + data[i].studentID + "</td><td>" + data[i].firstname + " " + data[i].lastname + "</td><td class='text-center'><b>" + data[i].courseID + "</b></td><td>"
       + data[i].courseName + "</td><td>" + star + "</td><td>" + data[i].comment + "</td><td><button class='btn btn-danger btn-xs' onclick=\"deleteEducation(\'" + data[i].studentID + "\',\'" + data[i].courseID + "\')\" ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> ลบ</button></td></tr>")
    }
  })
}

function deleteEducation(stu_id,course_id){
  $.post("api/education_deleteReview.php", {StudentID: stu_id, CourseID: course_id}, function(data){
    fetchEducation()
  })
}

function fetchInternship(){
  $(".internship-each").remove()
  $.post("api/internship_show.php", {}, function(data){
    for(i=0; i<data.length; i++){
      $("#internship-list").append("<tr class='internship-each'><td><a href='profile.php?id=" + data[i].studentID +" target='_blank'>" + data[i].studentID + "</a></td><td>" + data[i].firstname + " " + data[i].lastname + "</td><td>" + data[i].corpName + "</td><td>" + data[i].comment + "</td><td><button class='btn btn-danger btn-xs' onclick=\"deleteInternship(\'"
      + data[i].studentID + "\',\'" + data[i].corpName + "\')\" ><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> ลบ</button></td></tr>")
    }
  })
}

function deleteInternship(stu_id,corpname){
  $.post("api/internship_delete.php", {StudentID: stu_id, CorpName: corpname}, function(data){
    fetchInternship()
  })
}

$(document).ready( function(){
  $('#location').locationpicker({
    location: {
      latitude: 13.6549285,
      longitude: 100.4980835
    },
    inputBinding: {
        latitudeInput: null,
        longitudeInput: null,
        radiusInput: null,
        locationNameInput: $('#location-name')
    },
    enableAutocomplete: true,
    onchanged: function (currentLocation, radius, isMarkerDropped) {
        console.log("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
    }
  });
  fetchStudent();
  fetchTake();
  fetchActivity();
  fetchEducation();
  fetchInternship();
})

$("#take-submit").click( function(){
  if ($(this).hasClass('disabled')==false) {
    addTake()
  }
})

</script>
