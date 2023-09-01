<?php
session_start();
$bankdata = (object)$_SESSION['bank_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/student/fees.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <title>Student Portal</title>
</head>

<body>
  <?php include('../../php/student_navbar.php') ?>
  <main class="main">
    <div class="main-content-holder">
      <div class="top-select-head">
        <div class="left-select-head">
          <button class="print-btn">Print</button>
          <button class="print-btn">Print All</button>
        </div>
      </div>

      <div class="fees-tables">
        <div class="table-holder">
          <table class="table table-sm fee-table">
            <thead class="thead-fee">
              <tr>
                <td>Bank Name</td>
                <td>Bank Paybill</td>
                <td>Amount</td>
              </tr>
            </thead>
            <tbody class="tbody-fee">
              <?php foreach ($bankdata as $bank) { ?>
                <tr>
                  <td><?php echo $bank->bank_name ?></td>
                  <td><?php echo $bank->bank_paybill ?></td>
                  <td><?php echo $_SESSION['fee_data']->Amount ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>

</html>