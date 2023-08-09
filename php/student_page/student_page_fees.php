<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/student/main.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../../css/student/fees.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap"
      rel="stylesheet"
    />
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
          <div class="right-select-head">
            <select class="select-grade">
              <option value="">Grade 1</option>
              <option value="">Grade 1</option>
              <option value="">Grade 1</option>
              <option value="">Grade 1</option>
              <option value="">Grade 1</option>
            </select>
          </div>
        </div>

        <div class="fees-tables">
          <div class="table-holder">
            <p>Term 1</p>
            <table class="table table-sm fee-table">
              <thead class="thead-fee">
                <tr>
                  <td>Bank Name</td>
                  <td>Date</td>
                  <td>Amount</td>
                </tr>
              </thead>
              <tbody class="tbody-fee">
                <tr>
                  <td>kcb</td>
                  <td>20/04/2022</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-holder">
            <p>Term 2</p>
            <table class="table table-sm fee-table">
              <thead class="thead-fee">
                <tr>
                  <td>Bank Name</td>
                  <td>Date</td>
                  <td>Amount</td>
                </tr>
              </thead>
              <tbody class="tbody-fee">
                <tr>
                  <td>kcb</td>
                  <td>20/04/2022</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-holder">
            <p>Term 3</p>
            <table class="table table-sm fee-table">
              <thead class="thead-fee">
                <tr>
                  <td>Bank Name</td>
                  <td>Date</td>
                  <td>Amount</td>
                </tr>
              </thead>
              <tbody class="tbody-fee">
                <tr>
                  <td>kcb</td>
                  <td>20/04/2022</td>
                  <td>20,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
                <tr>
                  <td>family</td>
                  <td>30/05/2022</td>
                  <td>23,000</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
  </body>
</html>
