
<?php
  include "header.php";
  $MyStudentID = $_SESSION["StudentID"];
  $sql = "SELECT * FROM Student WHERE StudentID='$MyStudentID'";
  $query = mysqli_query($con, $sql);
  $result = mysqli_fetch_assoc($query);
  $MyGeneration = $result["Generation"];
  $MyProgram = $result["Program"];

  $StudentID = $_GET["id"];
  $sql = "SELECT * FROM Student WHERE StudentID='$StudentID'";
  $query = mysqli_query($con, $sql);
  if($result = mysqli_fetch_assoc($query)){
    $FacebookID = $result["FacebookID"];
    $Name = $result["FirstName"]." ".$result["LastName"];
    $generation = $result["Generation"];
    $email = $result["Email"];
    $phone = $result["Tel"];
    $program = $result["Program"];
    $occupation = $result["Occupation"];
    $workplace = $result["Workplace"];
    $familycode = $result["FamilyCode"];
    $dob = $result["DOB"];
    $gender = $result["Gender"];
  } else {
    header('Location: home.php');
  }


  if(strlen($StudentID)==11){
    $s1=$StudentID%10000;
  }
  if(strlen($MyStudentID)==11){
    $s2=$MyStudentID%10000;
  }
  if(strlen($StudentID)==8){
    $x = $StudentID%100; //เอา2เลขหลัง
    $s1 = floor($StudentID/100)%10000; //ดูว่าปกหรืออินเตอร์
    if($s1==2115){
      $s1=10;
    } else {
      $s1=34;
    }
    $s1=($s1*100)+$x;
  }
  if(strlen($MyStudentID)==8){
    $x = $MyStudentID%100; //เอา2เลขหลัง
    $s2=floor($MyStudentID/100)%10000; //ดูว่าปกหรืออินเตอร์
    if($s2==2115){
      $s2=10;
    } else {
      $s2=34;
    }
    $s2=($s2*100)+$x;
  }

?>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-md-offset-1">
        <div class="well">
          <center><img class="img-thumbnail" src="http://graph.facebook.com/<?php echo $FacebookID; ?>/picture?width=200&height=200">
            <h4><?php echo $Name; ?> <small>(CPE<?php echo $generation; ?>) </small><?php if($gender=='M') echo '<i class="fa fa-mars" style="color: #0094ff;" aria-hidden="true"></i>'; else echo'<i class="fa fa-venus" style="color: #ff00c7;" aria-hidden="true"></i>'; ?></h4>
              <h4>
                <?php if($StudentID != $MyStudentID){ if($s1==$s2) echo '<span class="label label-success">สายตรง</span>'; else if($StudentID%40==$MyStudentID%40) echo '<span class="label label-info">สายรหัส</span>'; }?>
                <?php if($StudentID != $MyStudentID){ if($MyGeneration==$generation){ echo '<span class="label label-success">เพื่อน CPE'.$MyGeneration.'</span>'; } else if($MyGeneration<$generation){ echo '<span class="label label-warning">น้อง CPE'.$generation.'</span>'; } else if($MyGeneration>$generation){ echo '<span class="label label-danger">พี่ CPE'.$generation.'</span>'; } }?>
              </h4>
            </center>
            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> เกิดเมื่อ <?php echo $dob; ?><br>
            <span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> <?php echo $phone; ?><br>
            <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> <?php echo $email; ?><br>
            <span class="glyphicon glyphicon-apple" aria-hidden="true"></span> หลักสูตร <?php echo $program." Program"; ?><br>
            <span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> <?php echo "อาชีพ ".$occupation; if($workplace) echo " ที่ ".$workplace; ?>
            <div id="taking-list" style="margin: 15px auto;"></div>
            <a target="_blank" href="https://www.facebook.com/<?php echo $FacebookID; ?>" class="btn btn-primary btn-block" id="facebook_login"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook Profile</a>

          </div>
        </div>
        <div class="col-md-7">
          <div class="row">
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">ประวัติกิจกรรม</div>
                <table class="table" id="activity-list">

                </table>
              </div>
            </div>
            <div class="col-md-6">
              <div class="panel panel-default">
                <div class="panel-heading">ประวัติวิชาเรียน</div>
                <table class="table" id="education-list">
                  </table>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">ข้อมูลฝึกงาน</div>
                  <table class="table" id="internship-list">
                  </table>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">ที่อยู่</div>
                    <div class="panel-body">
                      <div id="location" style="width: 100%; height: 200px;"></div>
                    </div>
                    <table class="table" id="address-list">

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

        <script>
        function addressListRequest(){
          $.post("api/address_request.php",{ StudentID: '<?php echo $StudentID; ?>' },
          function(data){
            console.log(data);
            for (var i = 0; i < data.length; i++) {
              id = data[i].address.replace(/ /g,"_");
              $("#address-list").append("<tr class='address-each' id='" + id + "'><td><span class='glyphicon glyphicon-map-marker'></span> " + data[i].address + " (<a href='http://maps.google.com/maps?q=loc:" + data[i].latitude + "," + data[i].longitude + "' target='_blank'>Google Map</a>)</td><td>" + data[i].type + "</td></tr>")
            }
            if(data.length==0){
              $("#location").after("<center>ไม่มีข้อมูล</center>")
              $("#location").hide()
            } else {
              $('#location').locationpicker({
                location: {
                  latitude: data[0].latitude,
                  longitude: data[0].longitude
                },
                markerDraggable: false,
              });
            }
          })
        }

        function activityRequest(){
          $.post("api/activity_show.php",{ StudentID: '<?php echo $StudentID; ?>' },
          function(data){
            console.log(data);
            if(data.activity_id=='-'){
              $("#activity-list").append("<tr><td class='text-center'>ไม่มีข้อมูล</td></tr>")
            }
            for (var i = 0; i < data.length; i++) {
              $("#activity-list").append("<tr><td class='text-center col-md-5'><b> " + data[i].activity_name + "</b></td><td>หน้าที่ " + data[i].responsibility + "</td></tr>")
            }
          })
        }

        function takingRequest(){
            $(".taking-each").remove()
            $.post("api/student_samecode.php", {FamilyCode: '', StudentID: '<?php echo $StudentID; ?>'}, function(data){
              for(i=0; i<data.length; i++){
                  $("#taking-list").append("<a data-toggle='tooltip' data-placement='top' title='" + data[i].StudentName + " (สายตรง)' href='profile.php?id=" + data[i].StudentID + "' target='_blank'><img class='img-rounded' src='http://graph.facebook.com/" + data[i].FacebookID + "/picture?width=30&height=30'> ")
              }
              $('[data-toggle="tooltip"]').tooltip()
            })
            $.post("api/taking_request.php", {FamilyCode: '', StudentID: '<?php echo $StudentID; ?>'}, function(data){
              for(i=0; i<data.length; i++){
                  $("#taking-list").append("<a data-toggle='tooltip' data-placement='top' title='" + data[i].StudentUnderName + " (น้องเทค)' href='profile.php?id=" + data[i].StudentUnderID + "' target='_blank'><img class='img-rounded' src='http://graph.facebook.com/" + data[i].StudentUnderFBID + "/picture?width=30&height=30'> ")
              }
              $('[data-toggle="tooltip"]').tooltip()
            })
        }

        function educationRequest(){
          $.post("api/education_myreview.php", { StudentID: '<?php echo $StudentID; ?>'}, function(data){

            if(data.length==0){
              $("#education-list").append("<tr><td class='text-center'>ไม่มีข้อมูล</td></tr>")
            }
            for(i=0; i<data.length; i++){
              var starValue = parseFloat(data[i].review);
              var starValueFloor = Math.floor(starValue);
              var check = starValue - starValueFloor;
              var star = ' ';
              for (var j = 0; j < starValueFloor ; j++) {
                 star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
              }

              if(check!=0){
                star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
              }
                $("#education-list").append("<tr><td class='text-center'><b>" + data[i].courseID + "</b></td><td class='col-md-5'>" + star + "</td><td>" + data[i].comment + "</td></tr>")
            }
            $('[data-toggle="tooltip"]').tooltip()
          })
        }

        function internshipRequest(){
          $.post("api/internship_show.php", { StudentID: '<?php echo $StudentID; ?>' }, function(data){
            console.log(data)
            if(data.length==0){
              $("#internship-list").append("<tr><td class='text-center'>ไม่มีข้อมูล</td></tr>")
            }
            for (i = 0; i < data.length; i++) {
              $("#internship-list").append("<tr><td class='text-center col-md-5'><b> " + data[i].corpName + "</b></td><td>" + data[i].comment + "</td></tr>")
            }
          })
        }

        $(document).ready(function(){
          addressListRequest();
          activityRequest();
          takingRequest();
          educationRequest();
          internshipRequest();
        })
        </script>
      </body>
