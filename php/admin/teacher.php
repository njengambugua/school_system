<?php
session_start();
if (isset($_SESSION['level_data']) && isset($_SESSION['subject_data'])) {
  $levelObj = (object)$_SESSION['level_data'];
  $subjectObj = (object)$_SESSION['subject_data'];
  $selectedLevels = (object)$_SESSION['levels'];
} else {
  header('Location: ../login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include('navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <h1 style="text-align: center;">Teacher Details</h1>

      <?php if (!isset($_SESSION['level_id'])) { ?>
        <form action="../../controllers/teacher/teacher_proc.php" method="post">
          <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="trname" id="" aria-describedby="helpId" placeholder="">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Staff Number</label>
            <input type="text" class="form-control" name="regno" id="" aria-describedby="helpId" placeholder="">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Level</label>
            <div class="form-check-holder">
              <?php foreach ($levelObj as $level) { ?>
                <div class="form-check">
                  <input class="form-check-input" name="<?php echo $level->level ?>" type="checkbox" value="<?php echo $level->id ?>" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    <?php echo $level->level ?>
                  </label>
                </div>
              <?php } ?>
            </div>
          </div>
          <div class="submit">
            <input type="submit" class="btn btn-primary" name="action" value="Add Teacher">
          </div>

        <?php } else { ?>
          <form action="../../controllers/teacher_subject/teacher_subject_proc.php" method="post">
            <div class="form_checkboxes">
              <div>
                <div class="mb-3">
                  <label for="" class="form-label">Level</label>
                  <select class="form-select form-select-lg" name="level" id="">
                    <option selected>Select Level</option>
                    <?php foreach ($selectedLevels as $level) { ?>
                      <option value="<?php echo $level->id ?>"><?php echo $level->level ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Subject</label>
                <div class="form-check-holder">
                  <?php foreach ($subjectObj as $subject) { ?>
                    <div class="form-check">
                      <input class="form-check-input" name="<?php echo $subject->subjectName ?>" type="checkbox" value="<?php echo $subject->id ?>" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        <?php echo $subject->subjectName ?>
                      </label>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="submit">
              <input type="submit" class="btn btn-primary" name="action" value="Add Teacher_Subject">
            </div>
          <?php } ?>
          </form>
    </div>
  </main>

</body>

</html>