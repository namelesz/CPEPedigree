<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div id="actshow">
      <h2>ข้อมูลคลังกิจกรรม &nbsp;<button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;&nbsp;เพิ่มรหัสกิจกรรมใหม่</button></h2>
      <div class='alert alert-success' style="display:none" role="alert" id='success'><span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>&nbsp; เพิ่มกิจกรรมใหม่สำเร็จ</span></div>
      <div class='alert alert-success' style="display:none" role="alert" id='edit_suc'><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>&nbsp; แก้ไขข้อมูลกิจกรรมเรียบร้อยแล้ว!</span></div>
      <div class='alert alert-success' style="display:none" role="alert" id='del_ok'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; ลบรหัสกิจกรรมเรียบร้อยแล้ว!</span></div>

      <table class="table table-striped" id="acttb">
        <tr>
          <th class ="col-md-2">รหัสกิจกรรม</th>
          <th class ="col-md-7">ชื่อกิจกรรม</th>
          <th class ="col-md-1 text-center">ผู้เข้าร่วม</th>
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
          <h4 class="modal-title">เพิ่มรหัสกิจกรรมใหม่</h4>
        </div>
        <div class="modal-body">

          <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">รหัสกิจกรรม</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="actid" placeholder="ใส่รหัส (X000)">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">ชื่อกิจกรรม</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="actname" placeholder="ใส่ชื่อกิจกรรม">
            </div>
          </div>
        </div>


        </div>
        <div class="modal-footer">
          <span id="error" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอกข้อมูลบางช่อง&nbsp;&nbsp;&nbsp;</span>
          <span id="errorsame" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> รหัสที่คุณใช้อาจซ้ำกับรหัสที่มีอยู่แล้ว&nbsp;&nbsp;&nbsp;</span>
          <button type="button" class="btn btn-primary" id="confirm">บันทึก</button>
        </div>
      </div>

    </div>
  </div>
</div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="edit_area">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">แก้ไขรหัสกิจกรรม <span id="act_id"> </span></h3>
      </div>
      <div class="modal-body">
        <div class="form-horizontal">
          <div class="form-group">
            <label class="col-sm-3 control-label">ชื่อกิจกรรม</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="act_name" placeholder="ชื่อกิจกรรม">
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

<?php
include "footer.php";
?>

<script type="text/javascript">

function del_act(actid) {
  console.log(actid)
  $.post("api/activitycode_delete.php", {
    ActivityID: actid
  },function(data){
    $("#del_ok").show().delay(2000).fadeOut();
    fetchData();
    }
    )

}

function edit_act(act_id,act_name) {
    $("#act_id").empty();
    $("#edit_area").modal("show");
    $("#act_id").append(act_id);
    $("#act_name").val(act_name);

}

function fetchData(){
  $(".infor").remove();
  $.post("api/activity_all.php",
  {},
  function(data){
    console.log(data)
    for (var i = 0; i < data.length; i++)
    {
      $("#acttb").append("<tr class='infor'><td>" + data[i].activity_id + "</td>" +
      "<td>" + data[i].activity_name + "</td><td class='text-center'>" + data[i].student_num + "</td>" +
      "<td>" + '<button type="button" class="btn btn-warning btn-xs" onclick="edit_act(\''+data[i].activity_id+'\',\''+data[i].activity_name+'\')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> แก้ไข</button> '+'<button type="button" class="btn btn-danger btn-xs" onclick="del_act(\''+data[i].activity_id+'\')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> ลบ</button>' + "</td>" +
      "</tr>")}
    })
}



$(document).ready( function(){
  fetchData();
  })

  $("#confirm").click( function(){
    $.post("api/activitycode_add.php", {
      ActivityID: $("#actid").val(),
      ActivityName: $("#actname").val()
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
          $("#actid").val("");
          $("#actname").val("");
      }
    })
  })

  $("#submit").click( function(){
    $.post("api/activitycode_edit.php", {
      ActivityID: $("#act_id").html(),
      ActivityName: $("#act_name").val()
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

  </script>
