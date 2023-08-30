<?php
session_start();
if (!isset($_SESSION['teacher_data'])) {
  header('Location: ../login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Portal</title>
  <link rel="stylesheet" href="../../css/teacher/view_attendance.css">
</head>

<body>
  <?php include('../../php/teacher_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <form method="post" action="../../controllers/attendance/attendance_proc.php" class="select_heads">
        <div class="left-select-head">
          <input type="text" class="form-control" name="regno" placeholder="SDT1">
        </div>
        <div class="right-select-head">
          <input type="submit" name="action" value="Get Student" class="select-grade">
        </div>
      </form>

      <div class="att_rec">
        <h4>Attendance Records</h4>
      </div>
      <div class="attendance-tables">
        <div class="table-holder">
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
  </main>
</body>

</html>