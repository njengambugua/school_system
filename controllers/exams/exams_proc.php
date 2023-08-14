<?php

include('../../models/exams/exams_class.php');

// '
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if ($_POST['action'] == 'Filter') {
    $obj = (object)$_POST;
    // print_r($obj);
    $exam = new exams;
    if ($exam->create($obj)) {
      echo "
      <script>
        alert('Exam created successfully');
        window.location.href = '../../php/teacher_page/teacher_page.php';
      </script>
      ";
    } else {
      echo "Error inserting exam";
    }
  }

  if ($_POST['action'] == 'submit-exam') {
    $marks = 0;
    foreach ($_SESSION["exams"] as $question) {
      $questionId = $question->id;
      $selected = $_POST["answer$questionId"];
      if ($question->correct_answer == $selected) {
        $marks++;
      }
    }
    $perc_score = ($marks / count($_SESSION['exams'])) * 100;
    if ($perc_score > 65) {
      echo "you have been enrolled";
    } else {
      echo "Sorry, Please try another day";
    }
  }
}

if (isset($_GET['level'])) {

  $exam = new exams;
  $level = $_GET['level'];
  $exams_data = $exam->retrieve($level);
  $_SESSION['exams'] = $exams_data;
  header("Location: ../../php/exams.php");
}
