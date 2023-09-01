<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/student/main.css">
  <link rel="stylesheet" href="../../css/student/profile.css">
  <title>Teacher Portal</title>
</head>

<body>
  <style>
    body .student,
    body .parent {
      height: fit-content;
      padding: 30px;
      box-shadow: 0px 0px 10px 2px #000;
    }
  </style>
  <?php
  include('../../php/teacher_navbar.php') ?>
  <main class="main">
    <form action="../../controllers/teacher/teacher_proc.php" method="post" class="form-student-main">
      <input type="text" name="student_regno" class="form-student-select" placeholder="Enter Student RegNo">
    </form>
    <div class="main-content-holder">
      <article class="student">
        <div class="desc">
          <h1>Student Details</h1>
        </div>
        <div class="student_details">
          <div><span>Name: <?php echo $_SESSION['student_data']->Name ?> </span></div>
          <div><span>Reg No: <?php echo $_SESSION['student_data']->regno ?></span></div>
          <div><span>Age: <?php echo $_SESSION['student_data']->Age ?></span></div>
          <div><span>Level: <?php echo $_SESSION['student_data']->Level ?></span></div>
          <div><span>Gender: <?php echo $_SESSION['student_data']->Gender ?></span></div>
          <div><span>Religion: <?php echo $_SESSION['student_data']->Religion ?></span></div>
        </div>
        <div class="avatar img">
          <img src="../../images/yellow_grt.jpg" alt="profile image" />
        </div>
      </article>
      <article class="parent">
        <div class="desc">
          <h1>Parent Details</h1>
        </div>
        <div class="parent_details">
          <div><span>Name: <?php echo $_SESSION['student_data']->Parent_Name ?></span></div>
          <div><span>Contact: <?php echo $_SESSION['student_data']->Contact ?></span></div>
          <div><span>Email: <?php echo $_SESSION['student_data']->Email ?></span></div>
          <div><span>Gender: <?php echo $_SESSION['student_data']->Parent_Gender ?></span></div>
          <div><span>Religion: <?php echo $_SESSION['student_data']->Religion ?></span></div>
          <div><span>Location: <?php echo $_SESSION['student_data']->Location ?></span></div>
          <div><span>Relationship: <?php echo $_SESSION['student_data']->Relationship ?></span></div>
        </div>
      </article>
    </div>
  </main>
</body>
<script>
  const formStudent = document.querySelector(".form-student-main")

  const input = formStudent.querySelector("input");

  input.addEventListener("keydown", (ev) => {
    if (ev.key == 'Enter') {
      formStudent.submit();
    }
  })
</script>

</html>