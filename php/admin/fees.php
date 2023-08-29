<?php
session_start();
$levels = (object)$_SESSION['level_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../css/teacher/view_attendance.css">
</head>

<body>
  <?php include('navbar.php'); ?>
  <main class="main">
    <div class="main-content-holder">
      <form action="../../controllers/fee/fee_proc.php" method="post">
        <div class="select_heads">
          <div class="left-select-head">
            <select name="grade" class="select-grade" id="grade">
              <option>Select Grade</option>
              <?php foreach ($levels as $item) { ?>
                <option value="<?php echo $item->id ?>"><?php echo $item->level ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="mb-3 mt-3">
          <label for="" class="form-label">Payment Amount</label>
          <input type="number" class="form-control" name="amount">
        </div>
        <div class="mb-3">
          <input type="hidden" class="form-control" name="student_id">
        </div>
        <div class="mb-3 submit">
          <input type="submit" class="btn btn-primary" name="action" value="Submit">
        </div>
      </form>
    </div>
  </main>
</body>

</html>