<?php session_start(); 
if(!isset($_SESSION['Islogin'])){
  header("location:../../index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Management system</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/content.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>

    <input type="checkbox" id="check">
    <!--header area start-->
    <header>
      <div class="mob">
        <div>
        <label for="check">
          <i class="fas fa-bars" id="sidebar_btn"></i>
        </label>
      </div>
      
        <div class="left_area">
          <h3>school management <span>system</span></h3>
        </div>
        <div class="right_area">
          <i class="fas fa-envelope fa-lg" aria-hidden="true" id="bell"><span>2</span></span></i>
          <i class="fas fa-bell fa-lg" aria-hidden="true" id="bell"><span>4</span></span></i>
          <a href="logout.php" class="logout_btn"><i class="fas fa-power-off"></i> Logout</a>
        </div>
      </div>
    </header>
    <!--header area end-->
    <!--mobile navigation bar start-->
    <div class="mobile_nav">
      <div class="nav_bar">
        <img src="../assets/images/1.png" class="mobile_profile_image" alt="">
        <i class="fa fa-bars nav_btn"></i>
      </div>
      <div class="mobile_nav_items">
        <a href="#"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="course.php"><i class="fas fa-cogs"></i><span>Course</span></a>
        <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='teacher' ){ ?>
        <a href="teachers.php"><i class="fas fa-chalkboard-teacher"></i><span>Teacher</span></a>
        <a href="#"><i class="fas fa-clipboard"></i><span>All Attendence</span></a>
        <?php } ?>
        <a href="students.php"><i class="fas fa-user-graduate"></i><span>Student</span></a>
        <a href="exam.php"><i class="fas fa-book"></i><span>Exam</span></a>
        <a href="#"><i class="fas fa-poll"></i><span>Result</span></a>
        <a href="attendence.php"><i class="fas fa-user"></i><span>Attendance</span></a>
        <a href="#"><i class="fas fa-yen-sign"></i><span>Fee Mangement</span></a>
        <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
        <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
      </div>
    </div>
    <!--mobile navigation bar end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="profile_info">
        <img src="../assets/images/1.png" class="profile_image" alt="">
        <h4><?php if(isset($_SESSION['userName'])){echo $_SESSION['userName']; }?></h4>
      </div>
      <a href="home.php"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
      <a href="course.php"><i class="fas fa-cogs"></i><span>Course & Faculty</span></a>
       <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='teacher' ){ ?>
        <a href="teachers.php"><i class="fas fa-chalkboard-teacher"></i><span>Teacher</span></a>
        <a href="#"><i class="fas fa-clipboard"></i><span>All Attendence</span></a>
        <?php } ?>
      <a href="students.php"><i class="fas fa-user-graduate"></i><span>Student</span></a>
      <a href="exam.php"><i class="fas fa-book"></i><span>Exam</span></a>
      <a href="#"><i class="fas fa-poll"></i><span>Result</span></a>
      <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='admin' ){ ?>
      <a href="attendence.php"><i class="fas fa-user"></i><span>Attendance</span></a>
      <?php } ?>
      <a href="#"><i class="fas fa-yen-sign"></i><span>Fee Mangement</span></a>
      <a href="#"><i class="fas fa-info-circle"></i><span>About</span></a>
      <a href="#"><i class="fas fa-sliders-h"></i><span>Settings</span></a>
    </div>
    <!--sidebar end-->

    <div class="content">
      <div class="card">