<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/teacher/view_academics.css">
  <title>Teacher Portal</title>
</head>

<body>
  <?php
  include('../../php/teacher_navbar.php');
  include("../../controllers/students/retrieve_student_academics.php"); //Returns an object called $academics
  ?>
  <main class="main">
    <div class="main-content-holder">
      <div class="search-bar">
        <form action="" method="post">
          <select name="grade" class="select-view">
            <option selected disabled>Select Class</option>
            <option value="pp1">PP1</option>
            <option value="pp2">PP2</option>
            <option value="grade1">Grade 1</option>
            <option value="grade2">Grade 2</option>
            <option value="grade3">Grade 3</option>
            <option value="grade4">Grade 4</option>
            <option value="grade5">Grade 5</option>
            <option value="grade6">Grade 6</option>
            <option value="junior1">Junior 1</option>
            <option value="junior2">Junior 2</option>
          </select>

          <select name="term" class="select-view">
            <option selected disabled>Select Term</option>
            <option value="term1">Term1</option>
            <option value="term2">Term2</option>
            <option value="term3">Term3</option>
          </select>

          <input type="submit" class="select-view-btn" value="Select" name="action">
        </form>

        </div>
        <?php
        // echo "Posting<br>";
        // echo "Grade Chosen: ".$_POST['grade'];
        // echo "<br>Term Chosen: ".$_POST['term'];
        ?>

      <div class="view-academics-container">

        <table class="table table-bordered table-academics">
          <thead class="thead-academics">
            <th scope="col">Student Name</th>
            <!-- <th scope="col">Reg No</th> -->
            <th scope="col">English</th>
            <th scope="col">Maths</th>
            <th scope="col">Kiswahili</th>
            <th scope="col">Environmental Act</th>
            <th scope="col">Religious Act</th>
            <th scope="col">Hygiene and Nutrition</th>
            <th scope="col">Movement and Creatives</th>
            <th scope="col">Total</th>
          </thead>
          <tbody class="tbody-academics">
            <?php
            foreach($academics as $record) {
              echo "
              <tr>
                <td>$record->Name</td>
                <td>$record->english%</td>
                <td>$record->mathematics%</td>
                <td>$record->kiswahili%</td>
                <td>$record->envitonmentalArt%</td>
                <td>$record->religiousAct%</td>
                <td>$record->healthAndNutrition%</td>
                <td>$record->movementAndCreatives%</td>
                <td>";
                  echo number_format(((int)$record->english + (int)$record->mathematics + (int)$record->kiswahili + (int)$record->envitonmentalArt + (int)$record->religiousAct + (int)$record->healthAndNutrition + (int)$record->movementAndCreatives) / 7, 2).'%';"
                </td>
              </tr>
              ";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>
</html>