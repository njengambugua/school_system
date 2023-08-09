<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Portal</title>
  <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
  />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
    crossorigin="anonymous"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap"
    rel="stylesheet"
  />

  <link rel="stylesheet" href="../../css/student/main.css">

  <link rel="stylesheet" href="../../css/student/profile.css">
</head>
<body>
  <?php include('../../php/student_navbar.php') ?>
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