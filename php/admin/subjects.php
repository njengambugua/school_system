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
      <h1 style="text-align: center;">Subjects Taught</h1>
      <form action="../../controllers/subjects/subjects_proc.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Subject Name</label>
          <input type="text" class="form-control" name="subject_name" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input type="submit" name="action" class="btn btn-primary" value="Add Subject">
      </form>
    </div>
  </main>
</body>

</html>