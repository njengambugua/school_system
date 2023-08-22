<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/student/timetable.css">
  <title>Teacher Portal</title>
</head>
<body>
  <?php
  include('../../php/teacher_navbar.php');
  
  ?>
  <main class="main">
    <div class="main-content-holder">
      <?php
      $tableName = 'timetable';
      echo "
      <div id='date'>
      <h1>August 9, 2023</h1>
      </div>
      ";
      ?>
      <?php
      include("../../controllers/teacher/timetable_proc.php");
      $dataObj = $dataResults->fetchAll(PDO::FETCH_OBJ);

      foreach ($dataObj as $task) {
        echo "
        <div id='time_subject_details'>
        <div id='time'>$task->period</div>
        <div id='subject_details'>
        <div id='subject'>$task->subject</div>
        <div id='details'>$task->class<br>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum impedit officiis expedita voluptates soluta reprehenderit quae, dolorum asperiores ipsa sit hic perspiciatis minus, corrupti, dicta error? Natus atque ratione id.</div>
        </div>
        </div>
        ";
      }
      ?>
    </div>
  </main>
</body>
</html>