<?php
include "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <h2>ข้อมูลกิจกรรมของครอบครัว CPE</h2>

      <div class="form-inline">
        <div class="form-group">
          <label>FamilyCode</label>
            <select class="form-control" id="search_fam"></select> &nbsp;&nbsp;
        </div>
        <div class="form-group">
          <label>Activity</label>
            <select class="form-control" id="search_act"></select>
          </div>
  <button type="submit" class="btn btn-default" id="search">
    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>
      </div>
      <br>

      <div id="search_alert"></div>
    <!--  <div class="alert alert-success" style="display:none;" id="search_err"><b>ค้นหาสำเร็จ!</b> แต่ไม่พบข้อมูลกิจกรรมที่คุณค้นหา</div>
      <div class="alert alert-success" style="display:none;" id="search_success"><b>ค้นหาสำเร็จ!</b></div>
    </div>-->
      <table class="table table-striped" style="width:100%"  id="search_tb">
        <tr>
          <th class="col-md-2">กิจกรรม</th>
          <th>หน้าที่</th>
          <th>รหัสนักศึกษา</th>
          <th>ชื่อ</th>
          <th>นามสกุล</th>
          <th>หลักสูตร</th>
          <th>รุ่น</th>
        </tr>
      </table>

    </div>
    <div class="col-md-4">
      <div class="Uract">
        <h3>กิจกรรมของคุณ &nbsp;<button type="button" class="btn btn-success btn-sm" id="add">
          <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> เพิ่มกิจกรรมที่ทำ
        </button></h3>


        <div style="display:none;" id="add_form">
          <br>
          <label>กิจกรรม</label>
          <select class="form-control" id="act"></select>
          <label>หน้าที่</label>

          <div class="input-group">
            <input type="text" class="form-control" placeholder="เช่น สตาฟ,เฮดวิชาการ,ประธาน,ฝ่ายสวัสดิการ" id="res">
            <span class="input-group-btn">
              <button class="btn btn-primary" type="button" id="add_submit">
                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> ยืนยัน
              </button>
            </span>
          </div>
          <br>
        </div>

            <div class="alert alert-success" id="alert-add-success" style="display:none;"><b>บันทึกข้อมูลเสร็จสิ้น!</b></div>
            <div class="alert alert-danger" id="res_err" style="display:none;"><b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอก Responsibility ของคุณ</div>

        <hr>
        <div class="alert alert-success" id="alert-del-success" style="display:none;"><b>ลบข้อมูลเสร็จสิ้น!</b></div>
        <table class="table table-striped" style="width:100%" id="show">
          <tr>
            <th>กิจกรรม</th>
            <th>หน้าที่</th>
            <th>ลบ</th>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>


<?php
include "footer.php";
?>

<script type="text/javascript">

function delete_act(activity_id) {
  $.post("api/activity_delete.php", {
    StudentID: '<?php echo $_SESSION["StudentID"]; ?>',
    ActivityID: activity_id
  },function(data){
    $("#alert-del-success").show();
    location.reload();
  })
}

$(document).ready( function(){
  $.post("api/activity_all.php",
  {},
  function(data){
    $("#search_act").append("<option value=''>All Activity</option>")
    for (var i = 0; i < data.length; i++) {
      console.log(data[i].activity_name);
      $("#search_act").append("<option value='"+data[i].activity_id+"'>" + data[i].activity_name + "</option>")
    }
  })
  $.post("api/famcode_all.php",
  {},
  function(data){
    $("#search_fam").append("<option value=''>All</option>")
    for (var i = 0; i < data.length; i++) {
      console.log(data[i].family_code);
      $("#search_fam").append("<option value='"+data[i].family_code+"'>" + data[i].family_code + ":" + data[i].family_name + "</option>")
    }
  })
})

$(document).ready( function(){
  $.post("api/activity_show.php",
  { StudentID: '<?php echo $_SESSION["StudentID"]; ?>'},
  function(data){
    for (var i = 0; i < data.length; i++)
    {
      console.log(data[i].responsibility);
      $("#show").append("<tr><td>" + data[i].activity_name + "</td>" +
      "<td>" + data[i].responsibility + "</td>" +
      "<td>" + '<button type="button" class="btn btn-danger btn-xs" onclick="delete_act(\''+data[i].activity_id+'\')"> <span class="glyphicon glyphicon-trash" aria-hidden="true"> </span></button>' + "</td></tr>")
    }
  })
})

$("#search").click( function(){
  $(".infor").remove()
  $.post("api/activity_request.php",
  { ActivityID: $("#search_act").val(),
    FamilyCode: $("#search_fam").val()
},
  function(data){
    for (var i = 0; i < data.length; i++)
    { console.log(data[i].responsibility);
      $("#search_tb").append("<tr class='infor'><td>" + data[i].actname + "</td>" +
      "<td>" + data[i].respon + "</td>" +
      "<td>" + data[i].sid + "</td>" +
      "<td>" + data[i].fname + "</td>" +
      "<td>" + data[i].lname + "</td>" +
      "<td>" + data[i].program + "</td>" +
      "<td>" + data[i].gen + "</td>" +
      "</tr>")}

      if(data[0].actid=="-"){
        $("#search_alert").html("<div class='alert alert-success'  id='search_err'><b>ค้นหาสำเร็จ!</b> แต่ไม่พบข้อมูลกิจกรรมที่คุณค้นหา</div>");
      }
      else {
        $("#search_alert").html("<div class='alert alert-success'  id='search_success'><b>ค้นหาสำเร็จ!</b> ค้นพบ <b>"+i+"</b> ข้อมูล");
      }
  })
})

$(document).ready( function(){
  $.post("api/activity_code.php",
  {StudentID: '<?php echo $_SESSION["StudentID"]; ?>'},
  function(data){
    for (var i = 0; i < data.length; i++) {
      console.log(data[i].activity_name);
      $("#act").append("<option value='"+data[i].activity_id+"'>" + data[i].activity_name + "</option>")
    }
  })
})

$(document).ready( function(){
  $.post("api/activity_request.php",
  { ActivityID: "",
    FamilyCode: ""
},
  function(data){
    for (var i = 0; i < data.length; i++)
    { console.log(data[i].responsibility);
      $("#search_tb").append("<tr class='infor'><td>" + data[i].actname + "</td>" +
      "<td>" + data[i].respon + "</td>" +
      "<td><a href='profile.php?id=" + data[i].sid + "' target='_blank'>" + data[i].sid + "</a></td>" +
      "<td>" + data[i].fname + "</td>" +
      "<td>" + data[i].lname + "</td>" +
      "<td>" + data[i].program + "</td>" +
      "<td>" + data[i].gen + "</td>" +
      "</tr>")}

  })
})

$("#add").click( function(){
  $("#add_form").slideDown()
})

$("#add_submit").click( function(){
  $(".alert").hide();
  $.post("api/activity_add.php", {
    StudentID: '<?php echo $_SESSION["StudentID"]; ?>',
    ActivityID: $("#act").val(),
    Responsibility: $("#res").val()
  },function(data){
    if(data.status=="reserr"){
      $("#res").val("");
      $("#res_err").show();
    } else {
        $("#alert-add-success").show();
        location.reload();
    }
  })
})



</script>
