<?php
session_start();
$fees = (object)$_SESSION['fee_data'];
$bankdata = (object)$_SESSION['bank_data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/student/fees.css">
  <link rel="stylesheet" href="../css/student/main.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <section id="navbar">
    <div id="logo">
      <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Culcheth_High_School_Logo.png" alt="School Logo">
    </div>
    <div id="options">
      <ul>
        <li>
          <a href="../index.php">Home</a>
          <a href="about.php">About</a>
          <a href="admission.php">Admissions</a>
          <a href="./fee.php">Fees</a>
          <a href="login.php">Login</a>
        </li>
      </ul>
    </div>
  </section>
  <main class="bain">
    <div class="bain-content-holder">
      <div class="fees-tables">
        <div>
          <h2 style="color: black">Wisedigits Day and Boarding School</h2>
          <h3>FEE STRUCTURE FOR ALL STUDENTS</h3>
        </div>
        <div class="table-holder">
          <table class="table table-sm fee-table">
            <thead class="thead-fee">
              <tr>
                <th scope="col">ONE TIME PAYMENT</th>
                <th scope="col"></th>
                <th scope="col">ANNUAL PAYMENTS</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="tbody-fee">
              <tr>
                <td>INTERVIEW CHARGES</td>
                <td>1,500.00</td>
                <td>MAINTENANCE LEVY</td>
                <td>2,000.00</td>
              </tr>
              <tr>
                <td>INTERVIEW CHARGES</td>
                <td>2,500.00</td>
                <td>INSURANCE COVER</td>
                <td>500.00</td>
              </tr>
              <tr>
                <td>INTERVIEW CHARGES</td>
                <td>1,500.00</td>
                <td>LIBRARY FEES</td>
                <td>400</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="table-holder">
          <table class="table table-sm fee-table">
            <thead class="thead-fee">
              <tr>
                <th scope="col">Grade</th>
                <th scope="col">Total Amount Payable</th>
              </tr>
            </thead>
            <tbody class="tbody-fee">
              <?php foreach ($fees as $fee) { ?>
                <tr>
                  <td scope="row"><?php echo $fee->level ?></td>
                  <td><?php echo $fee->Amount ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div>
          <h3>TERMS OF PAYMENT:</h3>
          <h6>
            * FEES SHOULD BE PAID IN FULL ON OR BEFORE THE FIRST DAY OF TERM.
          </h6>
          <h6>
            * FEES IS PAYABLE BY PERSONAL/COMPANY/BANKERS CHEQUES, OR BY CASH DEPOSIT INTO EITHER OF THE
            FOLLOWING BANK ACCOUNTS:
          </h6>
        </div>
        <div class="table-holder">
          <table class="table table-sm fee-table">
            <thead class="thead-fee">
              <tr>
                <th scope="col">Grade</th>
                <th scope="col">Bank Paybill</th>
              </tr>
            </thead>
            <tbody class="tbody-fee">
              <?php foreach ($bankdata as $bank) { ?>
                <tr>
                  <td><?php echo $bank->bank_name ?></td>
                  <td><?php echo $bank->bank_paybill ?></td>
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