<div class="container">
  <div class="row">

    <div class="col-md-7">
      <h2>ข้อมูลรายวิชา</h2>
      <hr>

      <table class="table table-striped" id="teachingtb">
        <tr>
          <th class ="col-md-1">รหัสรายวิชา</th>
          <th class ="col-md-5">ชื่อวิชา</th>
          <th class ="col-md-1">อาจารย์ผู้สอน</th>
        </tr>
      </table>


    </div>

    <div class="col-md-5">
      <h2>ข้อมูลอาจารย์ <button type="button" class="btn btn-success" data-toggle="modal" data-target="#teacher_modal"><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>&nbsp;&nbsp;เพิ่ม</button></h2>
      <div class='alert alert-success' style="display:none" role="alert" id='del_ok2'><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp; ปลดอาจารย์ออกเรียบร้อยแล้ว!</span></div>
      <span id="success2" style="color: #3C763D; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> เพิ่มอาจารย์ผู้สอนเรียบร้อยแล้ว!</span>
      <hr>
      <table class="table table-striped" id="teachertb">
        <tr>
          <th class ="col-md-1">รหัสอาจารย์</th>
          <th class ="col-md-3">ชื่อ-นามสกุล</th>
          <th class ="col-md-2">แก้ไข/ปลด</th>
        </tr>
      </table>


    </div>

  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="book_area">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">อาจารย์ผู้สอนประจำรายวิชา <b><span id="course_id2"> </span></h3></b>
        <div id="buttonadd" ></div>
        <div style="display:none; color: green" role="alert" id='alert-del-success'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp; ลบเรียบร้อยแล้ว!</span></div>
      </div>
      <div class="modal-body">

        <table class="table table-striped" id="booktb">
          <tr>
            <th>รหัสอาจารย์</th>
            <th class ="col-md-5">ชื่อ - นามสกุล</th>
            <th class ="col-md-6">แก้ไข/ลบ</th>
          </tr>
        </table>
        <div class="input-group" style="display:none;" id="input_teaching">
          <select class="form-control" id="select_t"></select><span class="input-group-btn"><button id ="add_teac_con" type="button" class="btn btn-primary">
  <span class="glyphicon glyphicon-floppy-open" aria-hidden="true"></span> เพิ่ม </button></span>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">ออก</button>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div id="teacher_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">เพิ่มอาจารย์ผู้สอน</h4>
      </div>
      <div class="modal-body">

        <div class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">ชื่อ</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="teacher_fn" placeholder="ชื่อ">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">นามสกุล</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="teacher_ln" placeholder="นามสกุล">
          </div>
        </div>
      </div>


      </div>
      <div class="modal-footer">
        <span id="error2" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอกข้อมูลบางช่อง&nbsp;&nbsp;&nbsp;</span>
        <span id="errorsame2" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> รหัสวิชาที่คุณใช้อาจซ้ำกับรหัสที่มีอยู่แล้ว&nbsp;&nbsp;&nbsp;</span>
        <button type="button" class="btn btn-primary" id="te_add_con">บันทึก</button>
      </div>
    </div>

  </div>
</div>

<div id="teacher_modal_edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">แก้ไขอาจารย์ผุ้สอน</h4>
      </div>
      <div class="modal-body">

        <div class="form-horizontal">
          <input type="text" class="form-control" style="display:none;" id="teacher_id">
        <div class="form-group">
          <label class="col-sm-3 control-label">ชื่อ</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="teacher_edit_fn" placeholder="ชื่อ">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">นามสกุล</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="teacher_edit_ln" placeholder="นามสกุล">
          </div>
        </div>
      </div>


      </div>
      <div class="modal-footer">
        <span id="error2" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> คุณยังไม่ได้กรอกข้อมูลบางช่อง&nbsp;&nbsp;&nbsp;</span>
        <span id="errorsame2" style="color: red; margin-left: 13px; display:none;"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> <b>เกิดข้อผิดพลาด!</b> รหัสวิชาที่คุณใช้อาจซ้ำกับรหัสที่มีอยู่แล้ว&nbsp;&nbsp;&nbsp;</span>
        <button type="button" class="btn btn-primary" id="te_edit_con">บันทึก</button>
      </div>
    </div>

  </div>
</div>
