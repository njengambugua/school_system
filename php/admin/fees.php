<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php include('navbar.php'); ?>
  <main class="main">
    <div class="main-content-holder">
      <form action="" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Bank Name</label>
          <select class="form-select form-select-lg" name="bank_name" id="">
            <option selected>Select Bank</option>
            <option value="">KCB</option>
            <option value="">Co-operative</option>
            <option value="">Equity</option>
            <option value="">Family</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Amount Paid</label>
          <input type="number" class="form-control" name="amount">
        </div>
        <div class="mb-3">
          <input type="hidden" class="form-control" name="student_id" aria-describedby="helpId">
        </div>
        <div class="mb-3 submit">
          <input type="submit" class="btn btn-primary" name="action" value="Submit">
        </div>
      </form>
    </div>
  </main>
</body>

</html>