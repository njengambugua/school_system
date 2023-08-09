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
    body .student, body .parent {
      height: fit-content;
      padding: 30px;
      box-shadow: 0px 0px 10px 2px #000;
    }
  </style>
  <?php 
  include('../../php/teacher_navbar.php') ?>
    <main class="main">
      <div class="main-content-holder">
        <article class="student">
          <div class="desc"><h1>Student Details</h1></div>
          <div class="student_details">
            <div><span>Name: Marcos M</span></div>
            <div><span>Reg No: RWX</span></div>
            <div><span>Age: 12</span></div>
            <div><span>Level: Grade 1</span></div>
            <div><span>Gender: Male</span></div>
            <div><span>Religion: Christian</span></div>
          </div>
          <div class="avatar img">
            <img src="../../images/yellow_grt.jpg" alt="profile image" />
          </div>
          </article>
          <article class="parent">
            <div class="desc"><h1>Parent Details</h1></div>
            <div class="parent_details">
              <div><span>Name: Mary M</span></div>
              <div><span>Contact: 0712345678</span></div>
              <div><span>Email: test@example.com</span></div>
              <div><span>Gender: Female</span></div>
              <div><span>Religion: Christian</span></div>
              <div><span>Location: Nairobi</span></div>
              <div><span>Relationship: Mother</span></div>
            </div>
          </article>
      </div>
    </main>
</body>
</html>