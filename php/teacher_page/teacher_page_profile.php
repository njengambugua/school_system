<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/colors.css">
  <link rel="stylesheet" href="../../css/teacher/profile.css">
  <title>Teacher Portal</title>
</head>

<body>
  <?php include('../../php/teacher_navbar.php') ?>

  <main class="main">
    <div class="main-content-holder">
      <div>
        <?php
        session_start();
        include('../../models/teacher/teacher_class.php');
        $teacherDetails = new Teacher;
        $subjectsTaught = $teacherDetails->retrieveTeacherSubjects($_SESSION['teacher_data']->id);
        ?>
        <!-- profile -->
        <h2>Teacher Profile</h2>
        <div id="teacherInfo">
          <div id="information">
            <span>Name: <?php print_r($_SESSION['teacher_data']->name) ?></span>
            <span>Employee No: <?php print_r($_SESSION['teacher_data']->staff_no) ?></span>
            <span>Total Subjects Taught: <?php echo $subjectsTaught ?></span>
            <span>Phone No: <?php print_r($_SESSION['teacher_data']->phone) ?></span>
            <span>Email: <?php print_r($_SESSION['teacher_data']->email); ?></span>
          </div>
          <form action="./edit_profile.php" id="teacherPassportDiv">
            <img id='trImg' src="../../images/yellow_grt.jpg">
            <button type="submit">&#x1F58A</button>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>

</html>