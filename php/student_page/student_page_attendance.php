<?php session_start();
if (!isset($_SESSION['student_attendance'])) {
  header('Location: ../logout.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/student/fees.css" />
  <link rel="stylesheet" href="../../css/student/attendance.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <title>Student Portal</title>
</head>

<body>
  <main class="main">
    <?php
    include('../student_navbar.php');
    include('../../DB.php');
    $db = new DatabaseConnection;
    ?>
    <div class="main-content-holder">
      <div class="attendance-holder">
        <div class='attendance-table'>
          <div class='attendance-term'>
            <h4>Term</h4>
          </div>
          <div class='table-holder-content'>
            <table class='table'>
              <thead class='attendance-thead'>
                <tr>
                  <th scope='col'>Subject</th>
                  <th scope='col'>Lessons Attendance</th>
                  <th scope='col'>Total Lessons</th>
                  <th scope='col'>Percentage Attendance</th>
                </tr>
              </thead>
              <tbody class='attendance-tbody'>

                <?php foreach ($_SESSION['student_attendance'] as $time) { ?>
                  <tr>
                    <td><?php echo $time->subjectName ?></td>
                    <td><?php echo $time->lesson_attend ?></td>
                    <td><?php echo $time->total_lessons ?></td>
                    <td><?php echo number_format((($time->lesson_attend) / ($time->total_lessons)) * 100, 2) . "%" ?></td>
                  </tr>

                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
</body>

</html>