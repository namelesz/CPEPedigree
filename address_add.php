<?php
include "header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>ที่อยู่ที่บันทึกแล้วในระบบ</h2>
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
    </div>
    <div class="col-md-8">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-9">
            <h2>บันทึกที่อยู่ใหม่</h2>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label"></label>
          <div class="col-sm-9">

            <div class="alert alert-success" style="display:none;"><b>บันทึกข้อมูลเสร็จสิ้น!</b></div>
            <div class="alert alert-danger" id="error" style="display:none;"><b>เกิดข้อผิดพลาด!</b> อาจเป็นเพราะมีชื่อที่อยู่ดังกล่าวในรายชื่อที่อยู่ของคุณอยู่แล้ว หรือการเชื่อมต่อผิดพลาด กรุณาลองใหม่อีกครั้ง</div>
            <div class="alert alert-danger" id="input_error" style="display:none;"><b>เกิดข้อผิดพลาด!</b> คุณยังกรอกข้อมูลในแบบฟอร์มไม่ครบถ้วน</div>

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
            <div id="location" style="width: 100%; height: 280px;"></div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button id="submit" type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
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



function deleteAddress(addressName){
  $.post("api/address_delete.php", {StudentID: "<?php echo $_SESSION["StudentID"]; ?>", Address: addressName},
    function(data){
      if(data.status=="success"){

        $(".address-each").remove();
        addressListRequest();
      }
    }
  )
}

function addressListRequest(){
  $.post("api/address_request.php",{ StudentID: '<?php echo $_SESSION["StudentID"]; ?>' },
  function(data){
    console.log(data);
    $(".address-each").remove();
    for (var i = 0; i < data.length; i++) {
      id = data[i].address.replace(/ /g,"_");
      $("#address-list").append("<tr class='address-each' id='" + id + "'><td><span class='glyphicon glyphicon-map-marker'></span> " + data[i].address + " (<a href='http://maps.google.com/maps?q=loc:" + data[i].latitude + "," + data[i].longitude + "' target='_blank'>Google Map</a>)</td><td>" + data[i].type + "</td><td><button class='btn btn-danger btn-xs' onclick='deleteAddress(\"" + data[i].address + "\")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td></tr>")
    }
  })
}

$(document).ready(function(){
  addressListRequest();

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

})


$("#submit").click( function(){
  var addresslocation = $('#location').locationpicker('location');
  $(".alert").hide();
  $.post("api/address_submit.php", {
    StudentID: '<?php echo $_SESSION["StudentID"]; ?>',
    Type: $("#type").val(),
    Address: $("#address").val(),
    Latitude: addresslocation.latitude,
    Longitude: addresslocation.longitude
  }, function(data){
    if(data.status=="success"){
      $("#address").val("");
      $(".alert-success").show();
      addressListRequest();
    } else if(data.status=="error"){
      $("#error").show();
    } else {
        $("#input_error").show();
    }
  })
})

</script>

</body>
</html>
