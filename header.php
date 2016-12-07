<?php
  $con = mysqli_connect("localhost", "winwanwoni_db", "Cpe332", "winwanwoni_db");
  session_start();

  if(!$_SESSION["FacebookID"]){
    header('Location: index.php');
  }

  if(!$_SESSION["StudentID"] && $_SERVER['REQUEST_URI']!='/profile_add.php'){
    header('Location: profile_add.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>CPE Pedigree</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800|Open+Sans:300,400,600,700" rel="stylesheet">
  <style media="screen">
    .body {
        font-family: 'Open Sans', sans-serif;
        font-weight: 300;
    }
    .navbar,h1,h2,h3,h4,h5,h6 {
        font-family: 'Kanit', sans-serif;
        font-weight: 300;
    }

    .label {
      font-weight: 200;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">CPE Pedigree</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="home"><a href="home.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> หน้าหลัก</a></li>
          <li id="activity"><a href="activity.php"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> ข้อมูลกิจกรรม</a></li>
          <li id="education"><a href="education.php"><span class="glyphicon glyphicon-education" aria-hidden="true"></span> ข้อมูลวิชาเรียน</a></li>
          <li id="internship"><a href="internship.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> ข้อมูลการฝึกงาน</a></li>
          <li id="hangingout"><a href="hanging.php"><span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span> ประวัติการเลี้ยงสาย</a></li>

        </ul>
        <ul class="nav navbar-nav navbar-right">
          <?php if($_SESSION["Permission"]=='Admin') echo '<li id="admin"><a href="manage_stat.php"><i class="fa fa-sliders" aria-hidden="true"></i> จัดการระบบ</a></li>'; ?>
            <li class="dropdown"><a href="#" style="padding:10px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <img style="height: 30px; width:30px; border-radius: 15px;" src="http://graph.facebook.com/<?php echo $_SESSION["FacebookID"]; ?>/picture?type=square"> <?php echo $_SESSION["Name"]; ?> <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="profile.php?id=<?php echo $_SESSION["StudentID"]; ?>">หน้าโปรไฟล์</a></li>
            <li><a href="profile_edit.php">แก้ไขข้อมูลส่วนตัว</a></li>
            <li><a href="address_add.php">จัดการที่อยู่</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Log out</a></li>
          </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
