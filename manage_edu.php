<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

<ul class="nav nav-tabs" role="tablist">
   <li role="presentation" class="active"><a href="#mg_course" aria-controls="mg_course" role="tab" data-toggle="tab">จัดการรหัสรายวิชา</a></li>
   <li role="presentation"><a href="#mg_teacher" aria-controls="mg_teacher" role="tab" data-toggle="tab">จัดการอาจารย์ผู้สอน</a></li>
 </ul>

 <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="mg_course">


            <h2>ข้อมูลคลังวิชา &nbsp;<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;&nbsp;เพิ่มรหัสรายวิชาใหม่</button></h2>
            <div class='alert alert-success' style="display:none" role="alert" id='success'><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp; เพิ่มรหัสรายวิชาใหม่สำเร็จ</span></div>
            <div class='alert alert-success' style="display:none" role="alert" id='edit_suc'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; แก้ไขข้อมูลรายวิชาเรียบร้อยแล้ว!</span></div>
            <div class='alert alert-success' style="display:none" role="alert" id='del_ok'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; ลบรหัสรายวิชาเรียบร้อยแล้ว!</span></div>

            <table class="table table-striped" id="edutb">
              <tr>
                <th class ="col-md-3">รหัสรายวิชา</th>
                <th class ="col-md-6">ชื่อวิชา</th>
                <th class ="col-md-2">แก้ไข / ลบ</th>
              </tr>
            </table>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">เพิ่มรหัสรายวิชาใหม่</h4>
              </div>
              <div class="modal-body">

                <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 control-label">รหัสรายวิชา</label>
                  <div class="col-sm-3">
                    <input type="text" class="form-control" id="courseid" placeholder="ใส่รหัส (XXX000)">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">ชื่อวิชา</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="coursename" placeholder="ใส่ชื่อวิชา">
                  </div>
                </div>
              </div>


              </div>
              <div class="modal-footer">
                <span id="error" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอกข้อมูลบางช่อง&nbsp;&nbsp;&nbsp;</span>
                <span id="errorsame" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> รหัสวิชาที่คุณใช้อาจซ้ำกับรหัสที่มีอยู่แล้ว&nbsp;&nbsp;&nbsp;</span>
                <button type="button" class="btn btn-primary" id="confirm">บันทึก</button>
              </div>
            </div>

          </div>
        </div>

      <div class="modal fade" tabindex="-1" role="dialog" id="edit_area">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h3 class="modal-title">แก้ไขชื่อรายวิชา <span id="course_id"> </span></h3>
            </div>
            <div class="modal-body">
              <div class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3 control-label">ชื่อวิชา</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="course_name" placeholder="ชื่อวิชา">
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <span id="edit_err" style="color: red; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอกข้อมูล&nbsp;&nbsp;</span>
              <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
              <button id="submit" type="submit" class="btn btn-primary">บันทึก</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </div>

    <div role="tabpanel" class="tab-pane" id="mg_teacher">


      <?php
      include "manage_teach.php";
      ?>

    </div>

  </div>
</div>
</div>
</div>

<?php
include "footer.php";
?>


<script type="text/javascript">

//Course_Manage
function del_course(c_id) {
  console.log(c_id)
  $.post("api/coursecode_delete.php", {
    CourseID: c_id
  },function(data){
    $("#del_ok").show().delay(2000).fadeOut();
    fetchData();
    fetchTeaching();
    }
    )

}


function edit_course(c_id,c_name) {
    $("#course_id").empty();
    $("#edit_area").modal("show");
    $("#course_id").append(c_id);
    $("#course_name").val(c_name);

}


function fetchData(){
  $(".infor").remove();
  $.post("api/course_all.php",
  {},
  function(data){
    for (var i = 0; i < data.length; i++)
    {
      $("#edutb").append("<tr class='infor'><td>" + data[i].courseID + "</td>" +
      "<td>" + data[i].courseName + "</td>" +
      "<td>" + '<button type="button" class="btn btn-warning btn-xs" onclick="edit_course(\''+data[i].courseID+'\',\''+data[i].courseName+'\')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> แก้ไข</button> '+'<button type="button" class="btn btn-danger btn-xs" onclick="del_course(\''+data[i].courseID+'\')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>' + "</td>" +
      "</tr>")}
    })
}

$(document).ready( function(){
  fetchData();
  })

  $("#confirm").click( function(){
    $.post("api/coursecode_add.php", {
      CourseID: $("#courseid").val(),
      CourseName: $("#coursename").val()
    },function(data){
      if(data.status=="err"){
        $("#error").show().delay(2000).fadeOut();
      } else if(data.status=="samecode"){
        $("#errorsame").show().delay(2000).fadeOut();
      }
      else {
          $("#myModal").modal('hide');
          $("#success").show().delay(2000).fadeOut();
          fetchData();
          fetchTeaching();
          $("#courseid").val("");
          $("#coursename").val("");

      }
    })
  })

  $("#submit").click( function(){
    $.post("api/coursecode_edit.php", {
      CourseID: $("#course_id").html(),
      CourseName: $("#course_name").val()
    }, function(data){
      if(data.status=="success"){
        $("#edit_suc").show().delay(2000).fadeOut();
        fetchData();
        $("#edit_area").modal('hide');
      } else if(data.status=="error") {
        alert('เกิดข้อผิดพลาด คุณใส่ประเภทข้อมูลไม่ถูกต้อง ทำการตรวจสอบอีกครั้ง');
      }
      else {
        $("#edit_err").show().delay(2000).fadeOut();
      }
    })
  })

  //manage_teach


  function fetchTeaching(){
    $(".teaching_tr").remove();
    $.post("api/course_all.php",
    {},
    function(data){
      for (var i = 0; i < data.length; i++)
      {
        $("#teachingtb").append("<tr class='teaching_tr'><td>" + data[i].courseID + "</td>" +
        "<td>" + data[i].courseName + "</td>" +
        "<td>" + '<button type="button" class="btn btn-default btn-sm" onclick="see_teach(\''+data[i].courseID+'\')"> <span class="glyphicon glyphicon-book" aria-hidden="true"> </span> เปิดรายชื่อ</button>'+ "</td>" +
        "</tr>")}
      })
  }

  function add_teaching(c_id){
    $("#input_teaching").slideDown();
    $("#select_t").empty();
    $.post("api/teacher_show.php",
    {CourseID: c_id},
    function(data){
      for (var i = 0; i < data.length; i++) {
        $("#select_t").append("<option value='"+data[i].teacherid+"'>" + data[i].teacherid +"&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;"+ data[i].teacherfn + "&nbsp;&nbsp; " + data[i].teacherln + "</option>")
      }
    })
  }

  function del_book(t_id,c_id){
    $.post("api/teaching_delete.php", {
      TeacherID: t_id,
      CourseID: c_id
    },function(data){
      $("#alert-del-success").show().delay(2000).fadeOut();
      see_teach(c_id);

    })
  }

  $("#add_teac_con").click( function(){
    $.post("api/teaching_add.php", {
      CourseID: $("#course_id2").html(),
      TeacherID: $("#select_t").val()
    },function(data){
      if(data.status=="Add Success"){
        var x = $("#course_id2").html();
        see_teach(x);
      } else {
          alert("ผิดพลาดบางอย่าง");
      }
    })
  })

  $("#te_add_con").click( function(){
    $.post("api/teacher_add.php", {
      TeacherFirsName: $("#teacher_fn").val(),
      TeacherLastname: $("#teacher_ln").val()
    },function(data){
      if(data.status=="err"){
        $("#error2").show().delay(2000).fadeOut();
      } else if(data.status=="samecode"){
        $("#errorsame2").show().delay(2000).fadeOut();
      }
      else {
          $("#teacher_modal").modal('hide');
          $("#success2").show().delay(2000).fadeOut();
          fetchAllTeacher();
          $("#teacher_fn").val("");
          $("#teacher_ln").val("");
      }
    })
  })

  function see_teach(c_id) {
      $("#input_teaching").hide();
      $("#course_id2").empty();
      $("#buttonadd").empty();
      $(".booking_tr").remove();
      $("#book_area").modal("show");
      $("#buttonadd").append('<button type="button" class="btn btn-success col-md-2 col-md-offset-10" onclick="add_teaching(\''+ c_id +'\')"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true" id="addbook"></span>&nbsp;เพิ่มอาจารย์ผู้สอน</button>');
      $("#course_id2").append(c_id);
      $.post("api/teaching_some.php",
      {CourseID: c_id},
      function(data){
        for (var i = 0; i < data.length; i++)
        {
          $("#booktb").append("<tr class='booking_tr'><td>" + data[i].teacherid + "</td>" +
          "<td>" + data[i].teacherfn + "   "+ data[i].teacherln +"</td>" +
          "<td>" + '<button type="button" class="btn btn-danger btn-xs" onclick="del_book('+data[i].teacherid+',\''+ data[i].courseid +'\')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span> ลบ</button>'+ "</td>" +
          "</tr>")}
        })

  }

  function del_teacher(t_id){
    $.post("api/teacher_delete.php", {
      TeacherID: t_id
    },function(data){
      $("#del_ok2").show().delay(2000).fadeOut();
      fetchAllTeacher();
      }
      )
  }

  function edit_teacher(t_id){
    $("#teacher_modal_edit").modal('show')
    $.post("api/teacher_request.php", {
      TeacherID: t_id
    },function(data){
      console.log(data)
      $("#teacher_id").val(t_id)
      $("#teacher_edit_fn").val(data.teacherfn)
      $("#teacher_edit_ln").val(data.teacherln)
    })
  }

  function fetchAllTeacher(){
    $(".teachertr").remove();
    $.post("api/teacher_all.php", {}, function(data){
      console.log(data)
      for(i=0; i<data.length; i++){
        $("#teachertb").append("<tr class='teachertr'><td class='text-center'>" + data[i].teacherid + "</td><td>" + data[i].teacherfn + "&nbsp;&nbsp;" + data[i].teacherln + "</td><td>"+'<button type="button" class="btn btn-warning btn-xs" onclick="edit_teacher('+data[i].teacherid+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> แก้ไข</button> <button type="button" class="btn btn-danger btn-xs" onclick="del_teacher('+data[i].teacherid+')"> <span class="glyphicon glyphicon-log-out" aria-hidden="true"> </span> ลบ</button>'+"</td></tr>")
      }
    })
  }

  $("#te_edit_con").click( function(){
    $.post("api/teacher_update.php", {
      TeacherID: $("#teacher_id").val(),
      TeacherFirsName: $("#teacher_edit_fn").val(),
      TeacherLastname: $("#teacher_edit_ln").val()
    },function(data){
      $("#teacher_modal_edit").modal('hide')
      fetchAllTeacher()
    })
  })

  $(document).ready( function(){
    fetchTeaching();
    fetchAllTeacher();
    })


  </script>
