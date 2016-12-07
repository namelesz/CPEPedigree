<?php
  if($_SESSION["Permission"]!='Admin'){
    header('Location: home.php');
  }
?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
    <ul class="nav nav-pills">
      <li id="manage_stat"><a href="manage_stat.php"><i class="fa fa-tachometer" aria-hidden="true"></i> แดชบอร์ดและสถิติ</a></li>
      <li id="manage_profile"><a href="manage_profile.php">จัดการข้อมูลส่วนบุคคล</a></li>
      <li id="manage_family"><a href="manage_family.php">จัดการข้อมูลสายรหัส</a></li>
      <li id="manage_education"><a href="manage_edu.php">จัดการข้อมูลการศึกษา</a></li>
      <li id="manage_activity"><a href="manage_activity.php">จัดการข้อมูลกิจกรรม</a></li>
      <li id="manage_admin"><a href="manage_admin.php">ผู้ดูแลระบบ</a></li>
    </ul>
    <hr>
    </div>
  </div>
</div>
