<?php
  include "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="form-horizontal">
        <h2>แก้ไขข้อมูลส่วนตัว</h2>
        <hr>
        <div class="form-group">
          <label class="col-sm-3 control-label">ชื่อจริง</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="firstname" placeholder="ชื่อจริง (ภาษาไทย)">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">นามสกุล</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="lastname" placeholder="นามสกุล (ภาษาไทย)">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">รหัสนักศึกษา</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="studentid" placeholder="รหัสนักศึกษา เช่น 57070501038">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">เพศ</label>
          <div class="col-sm-9">
            <select class="form-control" id="gender">
              <option value="M">Male</option>
              <option value="F">Female</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">วัน/เดือน/ปี เกิด</label>
          <div class="col-sm-9">
            <div class="input-group date" >
                <input type="text" id="dob" data-date-format="yyyy-mm-dd" data-provide="datepicker" class="form-control">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">เบอร์โทรศัพท์</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="tel" onkeypress='return event.charCode >= 48 && event.charCode <= 57' maxlength="10" placeholder="เบอร์โทรศัพท์มือถือ เช่น 0812345678">
          </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">อีเมล</label>
          <div class="col-sm-9">
            <input type="email" class="form-control" id="email" placeholder="อีเมล เช่น test@gmail.com">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">หลักสูตร</label>
          <div class="col-sm-9">
            <select class="form-control" id="program">
              <option value="Regular">หลักสูตรปกติ</option>
              <option value="International">หลักสูตรนานาชาติ</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">อาชีพ</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="occupation" placeholder="อาชีพ เช่น นักศึกษา, Full-Stack Developer">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">สถานที่ทำงาน</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="workplace" placeholder="">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">รุ่น</label>
          <div class="col-sm-9">
            <input type="number" class="form-control" id="generation" placeholder="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button id="submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button> <span id="success" style="color: #3C763D; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> อัพเดตข้อมูลเรียบร้อยแล้ว!</span>
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

  function fetchData(){
    $.post("api/profile_request.php", {
      FacebookID: '<?php echo $_SESSION["FacebookID"]; ?>',
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
      console.log(data)

    })
  }

  $(document).ready(function(){
    fetchData()
  })


  $("#submit").click( function(){
    var famcode = $("#studentid").val() % 100;
    if(famcode>40){
      famcode = famcode-40;
    }
    if(famcode>80){
      famcode = famcode-80;
    }
    $.post("api/regis_edit.php", {
      StudentID: $("#studentid").val(),
      FacebookID: '<?php echo $_SESSION["FacebookID"]; ?>',
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
        fetchData()
        $("#success").show().delay(1300).fadeOut();
      } else {
        alert('เกิดข้อผิดพลาด');
      }
    })
  })

</script>

</body>
</html>
