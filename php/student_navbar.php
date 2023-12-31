<?php
session_start();
$id = $_SESSION['res']->id;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <title>Student Portal</title>
</head>

<body>

  <!-- sidenav -->
  <nabar class="student-navbar">
    <div class="top-nav">
      <div class="avatar-holder">
        <img src="../../images/yellow_grt.jpg" alt="profile image" />
      </div>
      <div class="avatar-name">
        <p>Marcos</p>
      </div>
    </div>
    <div class="other-navbars">
      <div class="icons-holder">
        <a href="./student_page.php" class="icon-item home-item">
          <div class="nav-icon">
            <i class="bx bx-home-circle"></i>
          </div>
          <div class="nav-name"> Home </div>
        </a>

        <a href="./student_page_fees.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bxs-credit-card"></i>
          </div>
          <div class="nav-name"> Fees </div>
        </a>

        <a href="./student_pages_academics.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name"> Academics </div>
        </a>

        <a href="../../controllers/attendance/attendance_proc.php?id=<?php echo $id ?>" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-list-ul"></i>
          </div>
          <div class="nav-name"> Attendance </div>
        </a>

        <a href="./student_page_event.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-calendar-check"></i>
          </div>
          <div class="nav-name"> Events </div>
        </a>

        <a href="./student_page_timetable.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-time-five"></i>
          </div>
          <div class="nav-name"> Timetable </div>
        </a>

        <a href="./student_page_profile.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="nav-name"> Profile </div>
        </a>
      </div>
    </div>
  </nabar>
  <!-- Header -->
  <header class="student-header">
    <div class="header-items">
      <button class="header-btn"><a href="../../index.php">Home Main</a></button>
      <button class="header-btn"><a href="../logout.php">Logout</a></button>
    </div>
  </header>
</body>

</html>