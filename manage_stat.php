<?php
include "header.php";
include "admin_header.php";
?>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
         <i class="fa fa-users" aria-hidden="true"></i>  จำนวนนักศึกษาทั้งหมดในระบบ
        </div>
        <table class="table" id="gen-count">
          <tr><th class="text-center">รุ่น</th><th>หลักสูตร</th><th>จำนวนคน</th></tr>
        </table>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> บริษัทที่มีนักศึกษาไปฝึกงาน
        </div>
        <table class="table" id="intern-list">

        </table>
      </div>
    </div>
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <i class="fa fa-pie-chart" aria-hidden="true"></i> อัตราส่วน
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-2">
              <label>เพศ</label>
            </div>
            <div class="col-md-10">
              <p><i class="fa fa-mars" style="color: #0094ff;" aria-hidden="true"></i> ผู้ชาย <span id="male-count"></span> คน</p>
              <p><i class="fa fa-venus" style="color: #ff00c7;" aria-hidden="true"></i> ผู้หญิง <span id="female-count"></span> คน</p>
              <div class="progress">
                <div class="progress-bar progress-bar-info " id="male-bar">
                </div>
                <div class="progress-bar progress-bar-danger "id="female-bar">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label>หลักสูตร</label>
            </div>
            <div class="col-md-10">
              <p>ปกติ <span id="regular-count"></span> คน</p>
              <p>อินเตอร์ <span id="international-count"></span> คน</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary " id="regular-bar">
                </div>
                <div class="progress-bar progress-bar-warning " id="international-bar">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> รายวิชาที่ได้คะแนนเฉลี่ยสูงสุด
        </div>
        <table class="table" id="education-list">
        </table>
      </div>


    </div>
    <div class="col-md-4">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <span class="glyphicon glyphicon-send" aria-hidden="true"></span> นักศึกษาที่เข้าร่วมกิจกรรม
        </div>
        <table class="table" id="student-act-list">

        </table>
      </div>
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> ร้านอาหารยอดนิยม
        </div>
        <table class="table" id="hanging-list">

        </table>
      </div>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>

<script>
  $(document).ready(function(){
    $.post("api/gen_count.php", {}, function(data){
      for(i=0; i<data.length; i++)
      $("#gen-count").append("<tr><td class='text-center'>" + data[i].generation + "</td><td>" + data[i].program + "</td><td>" + data[i].student_count + " คน</td></tr>")
    })

    $.post("api/gender_count.php", {}, function(data){
      console.log(data)
      var sum = parseInt(data.M) + parseInt(data.F)
      var mpercent = ((data.M/sum)*100).toFixed(1)
      var fpercent = ((data.F/sum)*100).toFixed(1)
      var mwidth = mpercent.toString()+"%"
      var fwidth = fpercent.toString()+"%"
      console.log(mwidth)
      $("#male-bar").width(mwidth)
      $("#female-bar").width(fwidth)
      $("#male-bar").html(mwidth)
      $("#female-bar").html(fwidth)
      $("#male-count").html(data.M)
      $("#female-count").html(data.F)
    })

    $.post("api/program_count.php", {}, function(data){
      console.log(data)
      var sum = parseInt(data.regular) + parseInt(data.international)
      var reg_percent = ((data.regular/sum)*100).toFixed(1)
      var int_percent = ((data.international/sum)*100).toFixed(1)
      var reg_width = reg_percent.toString()+"%"
      var int_width = int_percent.toString()+"%"
      $("#regular-bar").width(reg_width)
      $("#international-bar").width(int_width)
      $("#regular-bar").html(reg_width)
      $("#international-bar").html(int_width)
      $("#regular-count").html(data.regular)
      $("#international-count").html(data.international)
    })

    $.post("api/activity_count.php", {}, function(data){
      for(i=0;i<data.length;i++){
        $("#student-act-list").append("<tr><td class='text-center col-md-6'><a target='_blank' href='profile.php?id=" + data[i].StudentID + "'>" + data[i].StudentID + "</a> </td><td class='col-md-6'>เข้าร่วม " + data[i].NumOfAttended + " กิจกรรม</td></tr>")
      }
    })

    $.post("api/hanging_count.php", {}, function(data){
      for(i=0;i<data.length;i++){
        $("#hanging-list").append("<tr><td class='text-center col-md-6'><b>" + data[i].Restaurant + "</b></td><td class='col-md-6'>มีข้อมูลการเลี้ยงสาย " + data[i].NumberOfWhoWent + " ครั้ง</td></tr>")
      }
    })

    $.post("api/internship_count.php", {}, function(data){
      for(i=0;i<data.length;i++){
        $("#intern-list").append("<tr><td class='text-center col-md-6'><b>" + data[i].CorpName + "</b></td><td class='col-md-6'>มีนักศึกษาเคยฝึกงาน " + data[i].Num + " คน</td></tr>")
      }
    })

    $.post("api/education_count.php", {}, function(data){
      for(i=0; i<data.length; i++){
        var starValue = parseFloat(data[i].AVGReview);
        var starValueFloor = Math.floor(starValue);
        var check = starValue - starValueFloor;
        var star = ' ';
        for (var j = 0; j < starValueFloor ; j++) {
           star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
        }

        if(check>=0.25 && check<=0.75){
          star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
        }
        if(check>0.75){
           star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
        }
          $("#education-list").append("<tr><td class='text-center'><b>" + data[i].courseID + "</b></td><td>"  + data[i].courseName +  "</td><td class='col-md-5'>" + star + "</td></tr>")
      }
    })
  })
</script>
