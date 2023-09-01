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
      <h1 style="text-align: center;">Levels Available</h1>
      <form action="../../controllers/level/level_proc.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Level Name</label>
          <input type="text" class="form-control" name="level" id="" aria-describedby="helpId" placeholder="">
        </div>
        <input type="submit" name="action" class="btn btn-primary" value="Add Level">
      </form>
    </div>
  </main>
</body>

</html>