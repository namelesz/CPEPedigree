<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#m_student" aria-controls="m_student" role="tab" data-toggle="tab">ข้อมูลนักศึกษา</a></li>
        <li role="presentation"><a href="#m_taking" aria-controls="m_taking" role="tab" data-toggle="tab">ข้อมูลสายเทค</a></li>
        <li role="presentation"><a href="#m_internship" aria-controls="m_internship" role="tab" data-toggle="tab">ข้อมูลการฝึกงาน</a></li>
        <li role="presentation"><a href="#m_education" aria-controls="m_education" role="tab" data-toggle="tab">ข้อมูลการศึกษา</a></li>
        <li role="presentation"><a href="#m_activity" aria-controls="m_activity" role="tab" data-toggle="tab">ข้อมูลกิจกรรม</a></li>
      </ul>
      <br>
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="m_student">
          <table class="table table-striped" id="student-list">
            <tr>
              <th class="col-md-1">รหัสนักศึกษา</th>
              <th>รุ่น</th>
              <th>สายรหัส</th>
              <th class="col-md-2">ชื่อนักศึกษา</th>
              <th></th>
              <th class="col-md-1">หลักสูตร</th>
              <th class="col-md-1">วันเกิด</th>
              <th class="col-md-1">โทรศัพท์</th>
              <th class="col-md-1">อีเมล</th>
              <th class="col-md-2">แก้ไข / ลบ</th>
            </tr>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="m_taking">
          <div class="row">
            <div class="col-md-7">
              <table class="table table-striped" id="taking-list">
                <tr>
                  <th class="col-md-2">พี่เทค</th>
                  <th></th>
                  <th></th>
                  <th class="col-md-2">น้องเทค</th>
                  <th></th>
                  <th>ลบ</th>
                </tr>
              </table>
            </div>
            <div class="col-md-5">
              <div class="panel panel-default">
                <div class="panel-heading">
                  เพิ่มข้อมูล พี่เทค-น้องเทค
                </div>
                <div class="panel-body">
                  <div class="form-horizontal">
                    <div class="form-group">
                      <label class="col-sm-4 control-label">รหัสนักศึกษาพี่เทค</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="upper_input" placeholder="เช่น 56070501000">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-4 control-label">รหัสนักศึกษาน้องเทค</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" id="under_input" placeholder="เช่น 57070501099">
                      </div>
                    </div>
                    <div class="alert text-center" id="relation" style="display:none;">
                      <span id="relation-data"></span>
                    </div>
                    <button id="take-submit" class="btn btn-success btn-block disabled">ยืนยันข้อมูล</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="m_internship">
          <table class="table table-striped" id="internship-list">
            <tr>
              <th class="col-md-1">รหัสนักศึกษา</th>
              <th class="col-md-2">ชื่อ</th>
              <th>บริษัท</th>
              <th>ความคิดเห็น</th>
              <th class="col-md-1">ลบ</th>
            </tr>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="m_education">
          <table class="table table-striped" id="education-list">
            <tr>
              <th>รหัสนักศึกษา</th>
              <th class="col-md-2">ชื่อ</th>
              <th>รหัสวิชา</th>
              <th>ชื่อวิชา</th>
              <th class="col-md-2">คะแนน</th>
              <th class="col-md-3">ความคิดเห็น</th>
              <th class="col-md-1">ลบ</th>
            </tr>
          </table>
        </div>
        <div role="tabpanel" class="tab-pane" id="m_activity">
          <div class="row">
              <table class="table table-striped" id="activity-list">
                <tr>
                  <th>รหัสนักศึกษา</th>
                  <th>ชื่อ</th>
                  <th>กิจกรรม</th>
                  <th>หน้าที่</th>
                  <th>ลบ</th>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal สำหรับ Edit ข้อมูลนักศึกษา -->
<?php
include "manage_profile_modal.php";
?>


<?php
include "footer.php";
?>

<?php
include "manage_profile_script.php";
?>
