<?php
include "header.php" ;
?>
<style>
/****** Style Star Rating Widget *****/

a, a:hover{
  text-decoration:none;
}

.rating {
  border: none;
  float: left;
}

.rating > input { display: none; }
.rating > label:before {
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before {
  content: "\f089";
  position: absolute;
}

.rating > label {
  color: #ddd;
 float: right;
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

.blog-comment::before,
.blog-comment::after,
.blog-comment-form::before,
.blog-comment-form::after{
    content: "";
  display: table;
  clear: both;
}

.blog-comment ul{
  list-style-type: none;
  padding: 0;
}

.blog-comment img{
  opacity: 1;
  filter: Alpha(opacity=100);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
       -o-border-radius: 4px;
      border-radius: 4px;
}

.blog-comment img.avatar {
  position: relative;
  float: left;
  margin-left: 0;
  margin-top: 0;
  width: 65px;
  height: 65px;
}

.blog-comment .post-comments{
  border: 1px solid #eee;
    margin-bottom: 15px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
         -o-border-radius: 4px;
        border-radius: 4px;
  background: #F5F5F5;
  color: #6b6e80;
  position: relative;
}

.blog-comment .meta {
  font-size: 13px;
  color: #aaaaaa;
  padding-bottom: 8px;
  margin-bottom: 10px !important;
  border-bottom: 1px solid #eee;
}

.blog-comment h3,
.blog-comment-form h3{
  margin-bottom: 40px;
  font-size: 26px;
  line-height: 30px;
  font-weight: 800;
}


</style>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title">คะแนนรีวิวของแต่ละสายรหัส</h2>
      </div>
      <div class="modal-body">
            <h2 class="text-success" style="margin-left:20px"></h2>
      <div class="container bootstrap snippet">
      <div class="row">
      <div class="col-md-6">
        <div class="blog-comment">

        </div>
      </div>
      </div>
      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-7" >
      <h2>สถานที่ฝึกงานของครอบครัว CPE</h2>

          <div class="form-inline">
            <div class="form-group text-center" style="margin:auto;">
              <div id="showFamily">
              </div>
            </div>
          <button class = "btn btn-success" onclick="showtable()">แสดงทั้งหมด</button>

          </div>
          <br>
          <div id="hanging">

          </div>
    </div>

    <div class="col-md-5" >
      <h3>เพิ่มสถานที่ฝึกงาน</h3>
      <br>


          <div class="form-group">
            <label for="InputRestaurant">ชื่อบริษัท&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="InputCorp" placeholder="ชื่อบริษัท">
          </div>

          <div class="form-group">
            <div class="form-group">
              <label for="comment">ความคิดเห็น :</label>
              <textarea class="form-control" rows="5" id="comment" placeholder = "ใส่ความเห็น"></textarea>
            </div>
          </div>

           <button type="button" class="btn btn-default btn-sm btn-success pull-right" style="margin-right:0px;" onclick="addComment()">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true">เพิ่มสถานที่ฝึกงาน</span>
          </button>





      <div class="text-right">
      <span id="err" style="color: red; display:none; margin-left: 13px; margin-right:20px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> บันทึกข้อมูลไม่สำเร็จ!</span>
      <span id="suc" style="color: green; display:none; margin-left: 13px; margin-right:20px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> บันทึกข้อมูลสำเร็จ!</span>
    </div>
    </div>


  </div>
</div>

  <?php include "footer.php" ;?>

  <script type="text/javascript">


function showtable(){

  $(".post-comments").remove();
  $.post("api/internship_show.php", {},

  function(data){

    var studentID = <?php echo $_SESSION["StudentID"];?> ;

    for (var i = 0; i < data.length; i++) {

      if(studentID == data[i].studentID){
          $("#hanging").append("<div class = 'blog-comment'><div class = 'post-comments' style:'background-color:#E7E7E7';><p class='meta' style='color:black;'><i class='fa fa-building' aria-hidden='true'></i> <b>"
                                +data[i].corpName+ "</b><i class='pull-right'><a href='profile.php?id="+data[i].studentID+ "' target='_blank'><small style='color:#5BC0DE;'>"+data[i].studentID+ " " + data[i].firstname + " " + data[i].lastname + "</small></a></i>"+" "+
                                "<p>"+data[i].comment+
                    "<button class = 'btn btn-danger btn-sm pull-right' onclick =\"deleteCorpFromAll('"+studentID+"','"+data[i].corpName+"')\"><i class='fa fa-trash-o' aria-hidden='true'></i></button></p></div></div>");
      }else{
        $("#hanging").append("<div class = 'blog-comment'><div class = 'post-comments' style:'background-color:#E7E7E7';><p class='meta' style='color:black;'><i class='fa fa-building' aria-hidden='true'></i> <b>"
                                  +data[i].corpName+ "</b><i class='pull-right'><a href='profile.php?id="+data[i].studentID+ "' target='_blank'><small style='color:#5BC0DE;'>"+data[i].studentID+ " " + data[i].firstname + " " + data[i].lastname + "</small></a></i>"+" "+
                                  "<p>"+data[i].comment+
                                  "</p></div></div>");
      }

    }


      getFamilyCode();
      // $("#hanging").append("<tr class='hangingshow'><td>"+data[i].corpName+"</td>"+
      //   "<td>" +data[i].comment+"</td><td><button type='button' class='btn btn-xs' onclick='seere(\""+data[i].Restaurant+"\")'> <span class='glyphicon glyphicon-eye-open' aria-hidden='true'> </span> </button></tr>");

  })
}

  function addComment(){
    var corpName = $("#InputCorp").val();
    var comment = $("#comment").val();
    console.log("Add comment");

    console.log("CorpName : "+corpName);
    console.log("Comment : "+comment);

    $.post("api/internship_insert.php", {
        "StudentID" : <?php echo $_SESSION["StudentID"];?> ,
        "CorpName" : corpName,
        "Comment" : comment

      },function(data){

        $("#InputCorp").val("");
        $("#comment").val("");

        if(data.status =="success" && corpName && comment){
              $("#suc").show().delay(2000).fadeOut();
              showtable();
        }else{
              $("#err").show().delay(2000).fadeOut();
        }
    })
  }

  function deleteCorpFromAll(studentID,corpName){
    console.log("Delete");
    $.post("api/internship_delete.php",{
      "StudentID" : studentID,
      "CorpName" : corpName
    },function(data){
      if(data.status == "success"){
        showtable();

      }
    })
  }

  function deleteCorpFromCode(studentID,corpName){

    var len = studentID.length;
    var res = studentID.substring(len-2,len);
    var code = parseInt(res);

    if(code>40 && code<=80){
      code = code-40;
    }else if(code>80){
      code = code-80;
    }

    $.post("api/internship_delete.php",{
      "StudentID" : studentID,
      "CorpName" : corpName
    },function(data){
      if(data.status == "success"){
        showFromFamilyCode(code);
      }
    })
  }

  function getFamilyCode(){

    $.ajax({
      type : "GET",
      url : "api/education_getFamilyCode.php",
      success : function(data){
        var result ;
        result = "<select class = 'form-control' id = 'selFamilyCode' style = 'width:auto'>";
        result += "<option value = '0'>กรุณาเลือกสาย</option>"
        for (var i = 0; i < data.length; i++) {
          result += "<option value = '"+data[i].familyCode+"'>"+data[i].familyCode+ " : "+data[i].familyName+"</option>";
        }

        result += "</select>";
        console.log("Result : "+result);
        document.getElementById("showFamily").innerHTML = result;

        $("#selFamilyCode").change(function(){
          var value = $(this).val();
          if(value!=0){
            showFromFamilyCode(value);
          }
          console.log(value);
        });

      },

      dataType : 'json',
      contentType: 'application/json'
    });

  }

  //เดี๋ยวต้องแก้ตรงนี้นะจ๊ะ button onclick นาจา
  function showFromFamilyCode(familyCode){

      var studentID = <?php echo $_SESSION["StudentID"];?>;
      $.post("api/internship_family.php",{
         "FamilyCode" : familyCode
       }, function(data){
         $("#hanging").empty();
         for (var i = 0; i < data.length; i++) {
           if(studentID == data[i].studentID){
               $("#hanging").append("<div class = 'blog-comment'><div class = 'post-comments' style:'background-color:#E7E7E7';><p class='meta' style='color:black;'><i class='fa fa-building' aria-hidden='true'></i> <b>"
                                     +data[i].corpName+ "</b><i class='pull-right'><a href='profile.php?id="+data[i].studentID+ "' target='_blank'><small style='color:#5BC0DE;'>"+data[i].studentID+ " " + data[i].firstname + " " + data[i].lastname + "</small></a></i>"+" "+
                                     "<p>"+data[i].comment+
                  "<button class = 'btn btn-danger btn-sm pull-right' onclick =\"deleteCorpFromCode('"+studentID+"','"+data[i].corpName+"')\"><i class='fa fa-trash-o' aria-hidden='true'></i></button></p></div></div>");
           }else{
             $("#hanging").append("<div class = 'blog-comment'><div class = 'post-comments' style:'background-color:#E7E7E7';><p class='meta' style='color:black;'><i class='fa fa-building' aria-hidden='true'></i> <b>"
                                       +data[i].corpName+ "</b><i class='pull-right'><a href='profile.php?id="+data[i].studentID+ "' target='_blank'><small style='color:#5BC0DE;'>"+data[i].studentID+ " " + data[i].firstname + " " + data[i].lastname + "</small></a></i>"+" "+
                                       "<p>"+data[i].comment+
                                       "</p></div></div>");
           }

         }


      })

  }





$(document).ready( function(){
  showtable();
  getFamilyCode();
})




</script>
</body>
</html>
