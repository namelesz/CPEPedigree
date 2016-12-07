<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <table class="table table-striped" id="admin-list">
        <tr>
          <th>รหัสนักศึกษา</th>
          <th>ชื่อผู้ใช้</th>
          <th>สถานะ</th>
          <th>แก้ไข/ลบ</th>
        </tr>
      </table>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>

<script>
  function adminShow(){
      $(".each-admin").empty()
      $.post("api/admin_show.php", {}, function(data){
        for(i=0; i<data.length; i++){
          if(data[i].Permission=="Admin"){
            option = "<option val='User'>User</option><option val='Admin' selected>Admin</option>"
            color = "info"
          } else {
            option = "<option val='User'>User</option><option val='Admin'>Admin</option>"
            color = ""
          }
          $("#admin-list").append("<tr class='each-admin " + color + "'><td><a href='profile.php?id='" + data[i].StudentID + "' target='_blank'>" + data[i].StudentID + "</a></td><td>" + data[i].StudentName + "</td><td>" + data[i].Permission + "</td><td>"+
          "<select class='admin-update' id='" + data[i].FacebookID + "'>" + option + "</select>"+
          "</td></tr>")
        }

        $(".admin-update").change(function(){
          console.log("updated!")
          $.post("api/admin_update.php", {FacebookID: $(this).attr("id"), Permission: $(this).val()}, function(data){
            if(data.status == "success"){
              adminShow()
            } else {
              alert('เกิดข้อผิดพลาด')
            }
          })
        })
      })
  }

  $(document).ready(function(){
    adminShow()

  })

</script>
