<?php
session_start();
function convertDay($day)
{
  if ($day == 'Day1') {
    return 'Monday';
  } elseif ($day == 'Day2') {
    return 'Tuesday';
  } elseif ($day == 'Day3') {
    return 'Wednesday';
  } elseif ($day == 'Day4') {
    return 'Thursday';
  } elseif ($day == 'Day5') {
    return 'Friday';
  } else {
    return "Day not valid";
  }
}
if (!isset($_SESSION['teacher_data'])) {
  header('Location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/timetable.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="stylesheet" href="../../css/admin/timetable.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/student/timetable.css">
  <title>Student Portal</title>
</head>

<body>
  <?php include('../../php/teacher_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <div id="date">
        <!-- <p>August 9, 2023</p> -->
        <form method="post" action="../../controllers/schedule/schedule_proc.php" id="dayDiv">
          <select name="day" id="days">
            <option selected disabled>Choose day</option>
            <option class="dayOptions" value="Monday">Monday</option>
            <option class="dayOptions" value="Tuesday">Tuesday</option>
            <option class="dayOptions" value="Wednesday">Wednesday</option>
            <option class="dayOptions" value="Thursday">Thursday</option>
            <option class="dayOptions" value="Friday">Friday</option>
          </select>
          <input type="submit" value="Sort Date" name="teacher-action" id="sortButton">
        </form>
      </div>

      <div class="time-table-display">
        <table class="table table-sm timetable-table">
          <thead>
            <tr>
              <th scope="col">schedule_id</th>
              <th scope="col">day_of_week</th>
              <th scope="col">time</th>
              <th scope="col">teacher_name</th>
              <th scope="col">level</th>
              <th scope="col">subjectNames</th>


            </tr>
          </thead>
          <tbody>
            <?php foreach ($_SESSION['teacher-timetable'] as $session) { ?>

              <tr>
                <td><?php echo $session->schedule_id ?></td>
                <td><?php echo convertDay($session->day_of_week) ?></td>
                <td><?php echo $session->time ?></td>
                <td><?php echo $session->teacher_name ?></td>
                <td><?php echo $session->level ?></td>
                <td><?php echo $session->subjectName ?></td>

              </tr>
            <?php } ?>


          </tbody>
        </table>
      </div>
    </div>
  </main>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>