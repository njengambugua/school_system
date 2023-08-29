<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/student/main.css" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../css/student/fees.css" />
  <link rel="stylesheet" href="../../css/student/attendance.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;500;600;700;800;900;1000&display=swap" rel="stylesheet" />
  <title>Student Portal</title>
</head>

<body>
  <main class="main">
    <?php
    include('../student_navbar.php');
    include('../../DB.php');
    $db = new DatabaseConnection;
    ?>
    <div class="main-content-holder">
      <div class="attendance-holder">
        <?php
        // This object should be made dynamic currently hardcoded for testing purposes _________________________________
        $term1 = (object)array(
          'Mathematics' => 38,
          'English' => 32,
          'Kiswahili' => 29,
          'Science' => 35,
          'Social Studies' => 32,
          'CRE' => 33,
          'Computer' => 37,
          'Geography' => 36,
          'History' => 40,
          'Agriculture' => 22,
          'Business Studies' => 20
        );
        $term2 = (object)array(
          'Mathematics' => 30,
          'English' => 35,
          'Kiswahili' => 34,
          'Science' => 30,
          'Social Studies' => 37,
          'CRE' => 30,
          'Computer' => 18,
          'Geography' => 36,
          'History' => 23,
          'Agriculture' => 26,
          'Business Studies' => 37,
        );
        $term3 = (object)array(
          'Mathematics' => 40,
          'English' => 36,
          'Kiswahili' => 34,
          'Science' => 33,
          'Social Studies' => 36,
          'CRE' => 33,
          'Computer' => 38,
          'Geography' => 36,
          'History' => 32,
          'Agriculture' => 34,
          'Business Studies' => 32
        );
        $terms = [$term1, $term2, $term3];

        // _______________________________________________________________________

        $conn = $db->getConnection();
        for ($x = 1; $x <= 3; $x++) {
          echo "
            <div class='attendance-table'>
            <div class='attendance-term'>
            <h4>Term $x</h4>
          </div>
          <div class='table-holder-content'>
            <table class='table'>
              <thead class='attendance-thead'>
                <tr>
                  <th scope='col'>Subject</th>
                  <th scope='col'>Lessons Attendance</th>
                  <th scope='col'>Total Lessons</th>
                  <th scope='col'>Percentage Attendance</th>
                </tr>
              </thead>
              <tbody class='attendance-tbody'>";

          $subjectCommand = "SELECT * FROM subjects";
          $results = $conn->query($subjectCommand)->fetchAll(PDO::FETCH_OBJ);
          foreach ($results as $subjects) {
            echo "
                <tr>
                  <td>$subjects->subjectName</td>
                  <td>";
            $lessonAttendance = $terms[$x - 1]->{$subjects->subjectName};
            echo $lessonAttendance;
            echo "
                  </td>
                  <td>40</td>
                  <td>";
            $percentAttendance = ($lessonAttendance / 40) * 100;
            echo $percentAttendance . "%";
            echo "
                  </td>
                </tr>";
          }
          echo "
              </tbody>
            </table>
          </div>
        </div>
          ";
        }
        ?>
</body>
</html>