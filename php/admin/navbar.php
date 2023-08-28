<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/teacher/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <title>Admin Navbar</title>
</head>

<body>
  <!-- sidenav -->
  <nabar class="teacher-navbar">
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
        <a href="database.php" class="icon-item home-item">
          <div class="nav-icon">
            <i class="bx bx-home-circle"></i>
          </div>
          <div class="nav-name">Database</div>
        </a>

        <a href="../../controllers/schedule/schedule_proc.php?link=<?php echo 'Admin' ?>" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name">Timetable</div>
        </a>


        <a href="../../controllers/level/level_proc.php?source=<?php echo md5(1) ?>" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name">Teachers</div>
        </a>

        <a href="event.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name">Events</div>
        </a>

        <a href="subjects.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name">Subjects</div>
        </a>

        <a href="level.php" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-book-open"></i>
          </div>
          <div class="nav-name">Level</div>
        </a>

        <a href="#" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-list-ul"></i>
          </div>
          <div class="nav-name">Messages</div>
        </a>

        <a href="" class="icon-item">
          <div class="nav-icon">
            <i class="bx bx-user-circle"></i>
          </div>
          <div class="nav-name">School Fees</div>
        </a>
      </div>
    </div>
  </nabar>
  <!-- Header -->
  <header class="teacher-header">
    <div class="header-items">
      <button class="header-btn"><a href="../../index.php">Home Main</a></button>
      <button class="header-btn"><a href="">Logout</a></button>
    </div>
  </header>
</body>

</html>