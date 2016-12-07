<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">แก้ไขข้อมูลนักศึกษา</h4>
      </div>

      <div class="modal-body">

        <div class="form-horizontal">
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
              <input type="text" class="form-control" id="tel" placeholder="เบอร์โทรศัพท์มือถือ เช่น 0812345678">
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
          <div class="form-group" style="display:none;">
            <label class="col-sm-3 control-label">FacebookID</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="facebookid" placeholder="">
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" onclick="submitEditStudent()" class="btn btn-primary">บันทึกข้อมูล</button> <span id="success" style="color: #3C763D; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> อัพเดตข้อมูลเรียบร้อยแล้ว!</span>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- แก้ไขที่อยู่ของนักศึกษา -->
<div class="modal fade" id="addressModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">แก้ไขข้อมูลที่อยู่</h4>
      </div>
      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th class="col-md-7">Address Name</th>
              <th class="col-md-3">Type</th>
              <th class="col-md-2">จัดการ</th>
            </tr>
          </thead>
          <tbody id="address-list">

          </tbody>
        </table>

        <div class="form-horizontal">
          <div class="form-group">
            <div class="col-sm-12">
            <h4 class="modal-title">บันทึกที่อยู่ใหม่</h4>
            <hr>
          </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Address Name</label>
            <div class="col-sm-9">
              <textarea class="form-control" id="address" placeholder="ที่อยู่ เช่น My Place 2"></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Type</label>
            <div class="col-sm-9">
              <select id="type" class="form-control">
                <option value="Home" selected>บ้าน / Home</option>
                <option value="Dormitory">หอพัก / Dormitory</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label">Location</label>
            <div class="col-sm-9">
              <input type="text" id="location-name" class="form-control" placholder="ชื่อที่อยู่สำหรับค้นหาใน Google Map"/>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-9">
              <div id="location" style="width: 100%; height: 180px;"></div>
            </div>
          </div>

          <input type="text" id="studentid" class="form-control" style="display:none;"/>
          <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
              <button onclick="addAddress()" type="submit" class="btn btn-info">เพิ่มที่อยู่</button>
            </div>
          </div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" onclick="submitEditAddress()" class="btn btn-primary">บันทึกข้อมูล</button> <span id="success" style="color: #3C763D; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> อัพเดตข้อมูลเรียบร้อยแล้ว!</span>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
