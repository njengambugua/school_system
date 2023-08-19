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
  include('../../DB.php');

  // Creating an object of the class
  $dbConnection = new DatabaseConnection();
  $conn = $dbConnection->getConnection();
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
      // Retrieving the rest of the data
          // Assuming the teacher's ID
      $_SESSION['teacher'] = 3;
      $day = 'Monday';
      // $day = 'Tuesday';
      // $day = 'Wednesday';
      // $day = 'Thursday';
      // $day = 'Friday';
      $retrieveAllData = "SELECT * FROM ".$tableName." WHERE teacher = ".$_SESSION['teacher'];
      // $retrieveAllData = "SELECT * FROM ".$tableName." WHERE day = '$day' and teacher = ".$_SESSION['teacher'];
      // $retrieveAllData = "SELECT * FROM ".$tableName." WHERE day = '$day' and class = 'Grade 1'";
      // echo $retrieveAllData;
      $dataResults = $conn->query($retrieveAllData);
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