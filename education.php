<?php include "header.php"; ?>

<link href="css/education_css.css" rel="stylesheet">

<body style="background-color:white; margin-left:auto; margin-right:auto;">

  <div class="container" style="background-color:white;">
    <div class="row">
      <div class="col-md-7">
        <div class="row" style="margin-bottom: 30px;">
          <div class="col-md-12">
            <h2>ข้อมูลวิชาเรียนของครอบครัว CPE</h2>
            <div class="form-inline">
              <div class="form-group">
                <label>FamilyCode</label>
                <span id="showFamily"></span>
                <button class="btn btn-success" onclick = "showAllreview()">แสดงทั้งหมด</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div id="showresult"></div>
          </div>
        </div>
      </div>

      <div class="col-md-5">

        <div class="row">
          <div class="col-md-12">
            <h3>
              ความเห็นของคุณ
              <a href="#" data-toggle="tooltip" data-placement="right" title="เพิ่มรีวิว">
                <button type="button" class="btn btn-success btn-circle btn-sm" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i></button>
              </a>
            </h3>
            <br>
            <table class="table table-striped">
              <div id="showMyReview"></div>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" onclick="manageAlert()" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add more review</h4>
        </div>
        <div class="modal-body">

          <div id = "warning">

          </div>

          <form>
            <div class="form-group">
              <label for="courseID">รหัสวิชา</label>

              <div id="showCourse">

              </div>
              <!-- <input type="text" style="width:80%;" class="form-control" id="courseID" placeholder="CourseID"> -->
            </div>

            <label for="teacherID">ครูผู้สอน</label>
            <div id="showTeacher">

            </div>
            <br>
            <div class="form-group">
              <label for="review">คะแนน</label> <br>
              <!-- <input type="text" style = "width:80%;" class="form-control" id="review" placeholder="Review"> -->
              <fieldset class="rating">
                <input type="radio" id="star5" name="rating" value="5"/><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4half" name="rating" value="4.5" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                <input type="radio" id="star4" name="rating" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                <input type="radio" id="star3" name="rating" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                <input type="radio" id="star2" name="rating" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                <input type="radio" id="star1" name="rating" value="1"/><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                <input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
              </fieldset>

            </div>
            <br>

            <label for="comment">ความคิดเห็น</label>
            <textarea class="form-control" id = "comment" rows="4" placeholder="เพิ่มความคิดเห็น..."></textarea>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="manageAlert()" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-success" onclick = "addEducation()">บันทึก</button>
        </div>
      </div>

    </div>
  </div>

</body>

<!-- <script src="js/jquery.js"></script> -->
<?php include "footer.php"; ?>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
<?php include "education_script.php" ?>

</html>
