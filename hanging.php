<?php
include "header.php" ;
?>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
<style>
/****** Style Star Rating Widget *****/

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
    margin-bottom: 20px;
    margin-left: 20px;
  margin-right: 0px;
    padding: 10px 20px;
    position: relative;
    -webkit-border-radius: 4px;
       -moz-border-radius: 4px;
         -o-border-radius: 4px;
        border-radius: 4px;
  background: #fff;
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
          <!-- Comment -->
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
    <div class="col-md-6 " >
      <h2>ประวัติการเลี้ยงสายของครอบครัว CPE</h2>
      <div class="form-inline">
        <div class="form-group">
          <label>FamilyCode</label>
          <select class="form-control" id="search_fam"></select> &nbsp;&nbsp;
        </div>
      </div>
      <br>
      <table class="table table-striped" style="width:100%"  id="hanging">
        <tr>
          <th>ชื่อร้าน<a href="#"><span class="glyphicon glyphicon-triangle-bottom" id="sortres" aria-hidden="true"></span></a></th>
          <th>คะแนนรีวิว<a href="#"><span class="glyphicon glyphicon-triangle-bottom" id="sortreview" aria-hidden="true"></span></a></th>
          <th></th>
          <th></th>
        </tr>
      </table>
    </div>

    <div class="col-md-6" >
      <h3>เพิ่มร้านอาหารที่ไป</h3>
      <br>
        <form class="form-inline">

          <div class="form-group ">
            <label for="InputRestaurant">ชื่อร้าน&nbsp;&nbsp;</label>
            <input type="text" class="form-control" id="InputRestaurant" placeholder="ชื่อร้าน">
          </div>

           <div class="form-group ">

            <label for="InputReview">&nbsp;&nbsp;&nbsp;คะแนนรีวิว&nbsp;</label>

           </div>

          <div class="form-group">
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
        </form>

        <br>
        <form class="form-inline">
          <div class="form-group">
            <label for="InputDate">วันที่ไป&nbsp;&nbsp;</label>
            <div class="input-group date col-sm-8" ><input type="text" id="InputDate" placeholder="ปี-เดือน-วัน" data-date-format="yyyy-mm-dd" data-provide="datepicker" class="form-control">
            <div class="input-group-addon"><span class="glyphicon glyphicon-th"></span></div></div>
          </div>

           <button type="button" class="btn btn-default btn-sm btn-success" id="add">
            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"> <b>ยืนยัน </b></span>
          </button>

        </form>

      <div class="text-right">
      <span id="err" style="color: red; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> บันทึกข้อมูลไม่สำเร็จ!</span>
      <span id="suc" style="color: green; display:none; margin-left: 13px;"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> บันทึกข้อมูลสำเร็จ!</span>
    </div>

    </div>


  </div>
</div>
<?php
include "footer.php" ;
?>
<script type="text/javascript">

//document.getElementById('hello').innerHTML="HANGING OUT"

function filterByFamCode(){
  sai = ".sai" + $("#search_fam").val()
  console.log(sai)
  if(sai==".sai0"){
    $(".hangingshow").show()
  } else {
    $(".hangingshow").hide()
    $(sai).show();
  }
}

function seere(res){
$("#myModal").modal('show');
  $.post("api/hanging_search.php",{Restaurant:res},function(data)
  {
    $(".post-comments").remove();
    $(".text-success").html("");
    $(".text-success").append(res);

    for(i=0; i<data.length; i++)
    {
      var starValue = parseFloat(data[i].Review);
      var starValueFloor = Math.floor(starValue);
      var check = starValue - starValueFloor;
      var star = ' ';
      for (var j = 0; j < starValueFloor ; j++)
      {
         star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      if(check>=0.25&&check<=0.75){
        star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";}

      $(".blog-comment").append("<div class='post-comments'><p class='meta'><span style='color:#337ab7'><b> สาย "+data[i].FamilyCode+"</b></span> : "+data[i].FamilyName+" <br>"+data[i].DateT+"&nbsp; รุ่น : "+data[i].Generation+"</p><p class='metascore'>"+star+"</p></div>" );

    }

  })

}

function showtable(){
  $.post("api/hanging_all.php", {},
  function(data){
    for (i=0; i < data.length; i++) {
      var starValue = parseFloat(data[i].Review);
      var starValueFloor = Math.floor(starValue);
      var check = starValue - starValueFloor;
      var star = ' ';
      for (var j = 0; j < starValueFloor ; j++) {
         star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      if(check>=0.25&&check<=0.75){
        star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";}

        saiclass = ""
        for(j=0; j< data[i].FamilyCode.length; j++){
          saiclass += (" sai"+data[i].FamilyCode[j])
        }

      $("#hanging").append("<tr class='hangingshow "+ saiclass +"'><td>"+data[i].Restaurant+"</td><td>"+ star +
        "</td><td>" +data[i].Review+"</td><td><button type='button' class='btn btn-xs' onclick='seere(\""+data[i].Restaurant+"\")'> <span class='glyphicon glyphicon-eye-open' aria-hidden='true'> </span> </button></tr>");

    }
  })
}

$("#add").click( function(){
  var famcode = <?php echo $_SESSION["StudentID"] % 40 ; ?>;
  var genn = <?php echo $_SESSION["Generation"] ;?>;
  if(famcode==0)
  {famcode = 40;}

var star = document.getElementsByName("rating");
  var sizes = star.length;
  var review;
  for (i=0; i < sizes; i++) {
        if(star[i].checked==true) {
            //console.log(star[i].value + ' you got a value');
            review = parseFloat(star[i].value);
        }
  }

  $.post("api/hanging_add.php", {
    FamilyCode: famcode,
    Restaurant: $("#InputRestaurant").val(),
    DateT: $("#InputDate").val(),
    Generation : genn,
    Review : review
  },function(data){
    if(data.status=="add success"){
      $(".hangingshow").remove();
      $("#suc").show().delay(2000).fadeOut();
      showtable();

    } else if(data.status=="wrong input") {
        $("#err").show().delay(2000).fadeOut();

    }
  })
})

$(document).ready( function(){
  showtable();
  $.post("api/famcode_all.php",
  {},
  function(data){
    $("#search_fam").append("<option value='0'>All</option>")
    for (var i = 0; i < data.length; i++) {
      console.log(data[i].family_code);
      $("#search_fam").append("<option value='"+data[i].family_code+"'>" + data[i].family_code + ":" + data[i].family_name + "</option>")
    }
  })
  })

$("#sortreview").click( function(){
  $.post("api/hanging_orderreview.php",{},function(data)
  {
    $(".hangingshow").remove();
    for (i=0; i < data.length; i++) {
      var starValue = parseFloat(data[i].Review);
      var starValueFloor = Math.floor(starValue);
      var check = starValue - starValueFloor;
      var star = ' ';
      for (var j = 0; j < starValueFloor ; j++) {
         star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      if(check>=0.25&&check<=0.75){
        star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";}

        saiclass = ""
        for(j=0; j< data[i].FamilyCode.length; j++){
          saiclass += (" sai"+data[i].FamilyCode[j])
        }

        $("#hanging").append("<tr class='hangingshow "+ saiclass +"'><td>"+data[i].Restaurant+"</td><td>"+ star +
        "</td><td>" +data[i].Review+"</td><td><button type='button' class='btn btn-xs' onclick='seere(\""+data[i].Restaurant+"\")'> <span class='glyphicon glyphicon-eye-open' aria-hidden='true'> </span> </button></tr>");
        filterByFamCode()
      }

  })
})

$("#sortres").click( function(){
  $.post("api/hanging_orderrest.php",{},function(data)
  {
    $(".hangingshow").remove();
    for (i=0; i < data.length; i++) {
      var starValue = parseFloat(data[i].Review);
      var starValueFloor = Math.floor(starValue);
      var check = starValue - starValueFloor;
      var star = ' ';
      for (var j = 0; j < starValueFloor ; j++) {
         star += " <i class='fa fa-star fa-2x' style='color:#FFD700; font-size:20px;' aria-hidden='true'></i>";
      }

      if(check>=0.25&&check<=0.75){
        star += " <i class='fa fa-star-half-o fa-2x' style = 'color:#FFD700; font-size:20px;' aria-hidden='true'></i>";}

        saiclass = ""
        for(j=0; j< data[i].FamilyCode.length; j++){
          saiclass += (" sai"+data[i].FamilyCode[j])
        }

      $("#hanging").append("<tr class='hangingshow "+ saiclass +"'><td>"+data[i].Restaurant+"</td><td>"+ star +
        "</td><td>" +data[i].Review+"</td><td><button type='button' class='btn btn-xs' onclick='seere(\""+data[i].Restaurant+"\")'> <span class='glyphicon glyphicon-eye-open' aria-hidden='true'> </span> </button></tr>");
        filterByFamCode()
    }
  })
})


$("#search_fam").change(function(){
  filterByFamCode()
})


</script>
</body>
</html>
