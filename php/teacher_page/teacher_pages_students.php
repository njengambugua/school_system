<?php
session_start();
if (isset($_GET['id'])) {
  header("Location: ../../controllers/schedule/schedule_proc.php?id=" . $_GET['id']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Portal</title>
  <link rel="stylesheet" href="../../css/teacher/students.css">
</head>

<body>
  <?php include('../../php/teacher_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <div class="all_students">
        <h4>Total Students</h4>
        <h1><?php echo $_SESSION['total']->total_students ?></h1>
      </div>

      <a href="./teacher_view_student_profile.php">
        <div class="student_profile">
          <h4>Students Profile</h4>
        </div>
      </a>

      <a href="./teacher_view_student_attendance.php">
        <div class="student_attendance">
          <h4>Student Attendance</h4>
        </div>
      </a>

      <a href="./teacher_view_student_academics.php">
        <div class="student_academics">
          <h4>Students Academics</h4>
        </div>
      </a>
    </div>
  </main>
</body>

</html>