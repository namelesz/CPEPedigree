<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#fam_detail" aria-controls="fam_detail" role="tab" data-toggle="tab">จัดการข้อมูลทั่วไปของสายรหัส</a></li>
        <li role="presentation"><a href="#fam_hang" aria-controls="fam_hang" role="tab" data-toggle="tab">จัดการข้อมูลการเลี้ยงสาย</a></li>
      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="fam_detail">

          <div class="row">
            <div class="col-md-8 col-md-offset-2" style="display:none;" id="edit-area">
              <div class="form-horizontal">
                <h2>แก้ไขข้อมูลสายรหัส &nbsp; <span id="familycode"> </span></h2>
                <hr>
                <div class="form-group">
                  <label class="col-sm-3 control-label">ชื่อสายรหัส</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="familyname" placeholder="ชื่อสายรหัส">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">กลุ่มFacebook</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="facebook" placeholder="URL Facbook ของสายรหัส">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">คติประจำสายรหัส</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="quote" placeholder="ข้อความคติหรือคำระบุ ของสายรหัส">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Logo</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="logo" placeholder="ใส่โลโก้">
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                    <a href="http://cpe332.winwanwon.in.th/manage_family.php" class="btn btn-default" role="button" id ="back">ย้อนกลับ</a>
                    &nbsp;
                    <button id="submit" type="submit" class="btn btn-primary">บันทึกข้อมูลใหม่</button> <span id="success" style="color: #3C763D; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> อัพเดตข้อมูลเรียบร้อยแล้ว!</span>
                    <span id="error" style="color: red; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> เกิดข้อผิดพลาด! คุณไม่ได้ใส่ข้อมูลบางช่อง</span>
                  </div>
                </div>
              </div>



            </div>

            <div class="col-md-12">
              <div id="allfam">
                <h2>ข้อมูลสายรหัสทั้งหมด</h2>
                <table class="table table-striped" style="width:100%"  id="famtb">
                  <tr>
                    <th>สายรหัส</th>
                    <th>ชื่อสายรหัส</th>
                    <th>กลุ่มFacebook</th>
                    <th>คติประจำสาย</th>
                    <th>Logo</th>
                    <th>แก้ไข</th>
                  </tr>
                </table>
              </div>
            </div>

          </div>

        </div>



        <div role="tabpanel" class="tab-pane" id="fam_hang">

          <div class="col-md-12">
            <h2>ข้อมูลการเลี้ยงสายรหัสทั้งหมด </h2>
            <h4><span id="del_ok" style="color: #3C763D; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ลบข้อมูลเรียบร้อยแล้ว!</span></h4>

            <table class="table table-striped" style="width:100%"  id="hangtb">
              <tr>
                <th>สายรหัส</th>
                <th>ชื่อร้านอาหาร</th>
                <th>วัน/เดือน/ปี</th>
                <th>รุ่น</th>
                <th>คะแนน</th>
                <th>ลบ</th>
              </tr>
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>

<script type="text/javascript">

function del_hang(family_code,res,dat,gen) {
  $(".infor").remove();
  $.post("api/hanging_delete.php", {
    FamilyCode: family_code,
    Restaurant: res,
    DateT: dat,
    Generation: gen
  },function(data){
    $("#del_ok").show().delay(2000).fadeOut();
    fetchData();
  }
)

}


function edit_fam(family_code) {
  $("#allfam").hide();
  $.post("api/famcode_some.php", {
    FamilyCode: family_code,
  },function(data){
    $("#edit-area").show();
    $("#familycode").append(data.family_code);
    $("#familyname").val(data.family_name);
    $("#facebook").val(data.facebook);
    $("#quote").val(data.quote);
    $("#logo").val(data.logo);
    console.log(data)
  })
}

function fetchData(){
  $.post("api/hanging_all.php",
  {},
  function(data){
    for (var i = 0; i < data.length; i++)
    {
      $("#hangtb").append("<tr class='infor'><td>" + data[i].FamilyCode + "</td>" +
      "<td>" + data[i].Restaurant + "</td>" +
      "<td>" + data[i].DateT + "</td>" +
      "<td>" + data[i].Generation + "</td>" +
      "<td>" + data[i].Review + "</td>" +
      "<td>" + '<button type="button" class="btn btn-danger btn-xs" onclick="del_hang('+data[i].FamilyCode+',\''+data[i].Restaurant+'\',\''+data[i].DateT+'\','+data[i].Generation+')"> <span class="glyphicon glyphicon-remove" aria-hidden="true"> </span> ลบ</button>' + "</td>" +
      "</tr>")}
    })
  }

  $(document).ready( function(){
    $("#del_ok").hide()
    $.post("api/famcode_all.php",
    {},
    function(data){
      for (var i = 0; i < data.length; i++)
      {
        $("#famtb").append("<tr><td>" + data[i].family_code + "</td>" +
        "<td>" + data[i].family_name + "</td>" +
        "<td>" + data[i].facebook + "</td>" +
        "<td>" + data[i].quote + "</td>" +
        "<td>" + data[i].logo + "</td>" +
        "<td>" + '<button type="button" class="btn btn-warning btn-xs" onclick="edit_fam('+data[i].family_code+')"> <span class="glyphicon glyphicon-pencil" aria-hidden="true"> </span> แก้ไข</button>' + "</td>" +
        "</tr>")}
      })
    })

    $("#submit").click( function(){
      $.post("api/family_edit.php", {
        FamilyCode: $("#familycode").html(),
        FamilyName: $("#familyname").val(),
        FacebookGroup: $("#facebook").val(),
        Quote: $("#quote").val(),
        Logo: $("#logo").val()
      }, function(data){
        if(data.status=="success"){
          $("#success").show().delay(2000).fadeOut();
        } else if(data.status=="error") {
          alert('เกิดข้อผิดพลาด คุณใส่ประเภทข้อมูลไม่ถูกต้อง ทำการตรวจสอบอีกครั้ง');
        }
        else {
          console.log($("#familycode").html());
          $("#error").show().delay(2000).fadeOut();
        }
      })
    })

    $(document).ready( function(){
      fetchData();
    })

    </script>
