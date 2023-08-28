<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/timetable.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/css/student/timetable.css">
  <title>Student Portal</title>
</head>

<body>
  <?php include('../../php/student_navbar.php') ?>
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
          <input type="submit" value="Sort Date" name="action" id="sortButton">
        </form>
      </div>
      <!-- Classes -->
      <?php
      include("../../DB.php");
      $db = new DatabaseConnection;
      $conn = $db->getConnection();

      if (isset($_POST['action'])) {
        $grade = 'Grade 1';
        $retrieveCommand = "SELECT * FROM timetable INNER JOIN teachers ON timetable.teacher = teachers.id WHERE timetable.class = '$grade' AND timetable.day = '$_POST[day]'";
        echo "<h1>$_POST[day]</h1>";
        $results = $conn->query($retrieveCommand);
        $resultsObj = $results->fetchAll(PDO::FETCH_OBJ);
        foreach ($resultsObj as $record) {
          echo "
              <div id='time_subject_details'>
              <div id='time'>$record->period</div>
              <div id='subject_details'>
              <div id='subject'>$record->subject</div>
              <div id='details'>$record->name<br>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum impedit officiis expedita voluptates soluta reprehenderit quae, dolorum asperiores ipsa sit hic perspiciatis minus, corrupti, dicta error? Natus atque ratione id.
              </div>
              </div>
              </div>
              ";
        }
      }
      ?>
    </div>
  </main>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>