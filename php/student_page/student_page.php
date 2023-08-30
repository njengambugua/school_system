<?php
session_start();
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
  <?php include('../student_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <div class="headline-fee">
        <div class="fees-amount">
          <h4>Total Fees</h4>
          <h1><?php echo $_SESSION['fee_data']->Amount ?></h1>
        </div>
        <div class="attendance-display">
          <h4>Weeks Attended</h4>
          <span>
            <h1>40</h1>
            <p>Weeks</p>
          </span>
        </div>
      </div>
      <div class="hostel-display">
        <h1>Student Hostel</h1>
        <p>- - -</p>
      </div>
    </div>
  </main>
</body>

</html>