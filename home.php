<?php
include "header.php";
if($_SESSION["FamilyCode"]<10){
  $TwoDigitCode = "0".$_SESSION["FamilyCode"];
  $ThreeDigitCode = "0".($_SESSION["FamilyCode"]+80);
} else if($_SESSION["FamilyCode"]+80>=100){
  $TwoDigitCode = $_SESSION["FamilyCode"];
  $ThreeDigitCode = "0".$_SESSION["FamilyCode"]+80;
} else {
  $ThreeDigitCode = "00".$_SESSION["FamilyCode"]+80;
  $TwoDigitCode = $_SESSION["FamilyCode"];
}
?>
<body>
  <div class="container" >
    <div class="col-md-8">
      <table class="table table-striped" id="tree">
        <tr>
          <th class="text-center">รุ่น</th>
          <th class="col-xs-2 text-center">10<?php echo $TwoDigitCode; ?></th>
          <th class="col-xs-2 text-center">10<?php echo $_SESSION["FamilyCode"]+40; ?></th>
          <th class="col-xs-2 text-center">1<?php echo $ThreeDigitCode; ?></th>
          <th class="col-xs-2 text-center">34<?php echo $TwoDigitCode; ?></th>
          <th class="col-xs-2 text-center">34<?php echo $_SESSION["FamilyCode"]+40; ?></th>
        </tr>
      </table>
      <h6 style="font-weight: 100; text-align:center;">END OF RESULTS</h6>
    </div>
    <div class="col-md-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          ข้อมูลของสายรหัส
        </div>
        <div class="panel-body" >
          <div class="media">
            <div class="media-left">
              <img class="img-rounded" height="72" width="72" id="family_logo">
            </div>
            <div class="media-body">
              <h4 id="family_name"></h4>
              <h5 id="quote"></h5>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          เพิ่มข้อมูลน้องเทค
        </div>
        <div class="panel-body">
          <div class="form-horizontal">
            <div class="form-group">
              <div class="col-sm-12">
                <input type="text" class="form-control" id="under_input" placeholder="รหัสนักศึกษา เช่น 57070501099">
              </div>
            </div>
            <div class="alert text-center" id="relation" style="display:none;">
              <span id="relation-data"></span>
            </div>
            <button id="take-submit" class="btn btn-success btn-block disabled">ยืนยันข้อมูล</button>
          </div>
        </div>
        <table class="table" id="taking-list">

        </table>

      </div>
    </div>
  </div>

<?php
include "footer.php";
?>

<script type="text/javascript">
    $.post("api/student_gen_code.php",{FamilyCode: <?php echo $_SESSION["FamilyCode"]; ?>},function(data)
      {
        for(i=0; i<data.length; i++){

          if(data[i].reg1){
            reg1_image = "<a href='profile.php?id=" + data[i].reg1.studentid + "' target='_blank'><img class='img-thumbnail' data-toggle='tooltip' data-placement='bottom' title='" + data[i].reg1.firstname + " " + data[i].reg1.lastname + "' src='http://graph.facebook.com/" + data[i].reg1.fbid + "/picture?width=150&height=150'></a>";
          } else {
            reg1_image = "<span style='font-size: 4vw; opacity:0.15;'>✕</span>"
          }
          if(data[i].reg2){
            reg2_image = "<a href='profile.php?id=" + data[i].reg2.studentid + "' target='_blank'><img class='img-thumbnail' data-toggle='tooltip' data-placement='bottom' title='" + data[i].reg2.firstname + " " + data[i].reg2.lastname + "' src='http://graph.facebook.com/" + data[i].reg2.fbid + "/picture?width=150&height=150'></a>";
          } else {
            reg2_image = "<span style='font-size: 4vw; opacity:0.15;'>✕</span>"
          }
          if(data[i].reg3){
            reg3_image = "<a href='profile.php?id=" + data[i].reg3.studentid + "' target='_blank'><img class='img-thumbnail' data-toggle='tooltip' data-placement='bottom' title='" + data[i].reg3.firstname + " " + data[i].reg3.lastname + "' src='http://graph.facebook.com/" + data[i].reg3.fbid + "/picture?width=150&height=150'></a>";
          } else {
            reg3_image = "<span style='font-size: 4vw; opacity:0.15;'>✕</span>"
          }
          if(data[i].int1){
            int1_image = "<a href='profile.php?id=" + data[i].int1.studentid + "' target='_blank'><img class='img-thumbnail' data-toggle='tooltip' data-placement='bottom' title='" + data[i].int1.firstname + " " + data[i].int1.lastname + "' src='http://graph.facebook.com/" + data[i].int1.fbid + "/picture?width=150&height=150'></a>";
          } else {
            int1_image = "<span style='font-size: 4vw; opacity:0.15;'>✕</span>"
          }
          if(data[i].int2){
            int2_image = "<a href='profile.php?id=" + data[i].int2.studentid + "' target='_blank'><img class='img-thumbnail' data-toggle='tooltip' data-placement='bottom' title='" + data[i].int2.firstname + " " + data[i].int2.lastname + "' src='http://graph.facebook.com/" + data[i].int2.fbid + "/picture?width=150&height=150'></a>";
          } else {
            int2_image = "<span style='font-size: 4vw; opacity:0.15;'>✕</span>"
          }

        $("#tree").append("<tr><td class='text-center' style='vertical-align: middle;'><span " +
        //"class='label' style='background: rgb(" + (60+(i*2)) + ", " + (141+(i*2)) + ", " + (188+(i*2)) + "); " +
        " style='letter-spacing: 2px; font-size: calc(8px + 1vw); font-weight: 100;'>CPE" + data[i].generation + "</span></td><td style='vertical-align: middle; text-align:center; font-weight:100;'>" + reg1_image + "</td><td style='vertical-align: middle; text-align:center; font-weight:100;'>" + reg2_image + "</td><td style='vertical-align: middle; text-align:center; font-weight:100;'>" + reg3_image + "</td><td style='vertical-align: middle; text-align:center; font-weight:100;'>" + int1_image + "</td><td style='vertical-align: middle; text-align:center; font-weight:100;'>" + int2_image + "</td></tr>")

        }
        $('[data-toggle="tooltip"]').tooltip()
    })


    function updateTake(upper, under) {
      if(upper && under){
        $("#relation").slideDown();
        $.post("api/profile_request.php", {StudentID: upper}, function(data){
          uppername = data.firstname + " " + data.lastname
          if(data.firstname==undefined){
            uppername = "(ไม่พบข้อมูล)"
            found = 0;
          } else {
            found = 1;
          }
        })
        $.post("api/profile_request.php", {StudentID: under}, function(data){
          undername = data.firstname + " " + data.lastname
          if(data.firstname==undefined){
            undername = "(ไม่พบข้อมูล)"
            found = 0;
          } else {
            found = 1;
          }
          if(uppername!=''&&undername!=''){
            $("#relation-data").html(uppername + ' <i class="fa fa-long-arrow-right" aria-hidden="true"></i> ' + undername);
          } else {
            $("#relation-data").html()
          }
          if(found){
            $("#relation").addClass("alert-success")
            $("#relation").removeClass("alert-warning")
            $("#take-submit").removeClass("disabled")
          } else {
            $("#relation").removeClass("alert-success")
            $("#relation").addClass("alert-warning")
            $("#take-submit").addClass("disabled")
          }
        })
      } else {
        $("#relation").slideUp();
      }
    }

    $("#under_input").keyup( function(){
      updateTake(<?php echo $_SESSION["StudentID"]; ?>, $("#under_input").val())
    })


    function deleteTake(upper, under){
      console.log(upper + " " + under)
      $.post("api/taking_delete.php", {UpperID: upper, UnderID: under}, function(data){
        if(data.status=="success"){
          fetchTake()
        } else {
          alert('เกิดข้อผิดพลาด')
        }
      })
    }

    function fetchTake(){
      $(".taking-each").empty()
      $.post("api/taking_request.php", {StudentID: <?php echo $_SESSION["StudentID"]; ?>}, function(data){
        for(i=0; i<data.length; i++){
            $("#taking-list").append("<tr class='taking-each'><td><td><a href='profile.php?id=" + data[i].StudentUnderID + "' target='_blank'>" + data[i].StudentUnderID + " </td><td>" + data[i].StudentUnderName + "</td><td><button class='btn btn-danger btn-xs' onclick='deleteTake(\"" + data[i].StudentUpperID + "\",\"" + data[i].StudentUnderID + "\")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></button></td></tr>")
        }
      })
    }

    function addTake(){
      $.post("api/taking_submit.php", {UpperID: <?php echo $_SESSION["StudentID"]; ?>, UnderID: $("#under_input").val()}, function(data){
        if(data.status=="success"){
          fetchTake()
          $("#under_input").val('')
          $("#relation").slideUp()
        } else {
          alert('เกิดข้อผิดพลาด')
        }
      })
    }

    $("#take-submit").click( function(){
      if ($(this).hasClass('disabled')==false) {
        addTake()
      }
    })

    function fetchFamCodeData(){
      $.post("api/famcode_some.php", {FamilyCode: <?php echo $_SESSION["FamilyCode"]; ?>}, function(data){
        $("#family_name").html(data.family_name + ' <a target="_blank" href="' + data.facebook + '"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>')
        $("#quote").html(data.quote)
        if(data.logo){
          $("#family_logo").attr("src",data.logo)
        } else {
          $("#family_logo").attr("src","http://placekitten.com/g/200/200")
        }
      })
    }

    $(document).ready( function(){
      fetchTake();
      fetchFamCodeData();
    })

</script>

</body>
  </html>
