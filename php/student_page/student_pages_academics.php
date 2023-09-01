<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../css/student/academics.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
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

      <div class="academics-table-holder">
        <table class="table table-bordered table-sm fee-table">
          <thead class="thead-fee">
            <tr>
              <th>Subject</th>
              <td>Term 1</td>
              <td>Term 2</td>
              <td>Term 3</td>
            </tr>
          </thead>
          <tbody class="tbody-fee">
            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Mathematics</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>

            <tr>
              <td>Total</td>
              <td>80%</td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>