<?php

include('../../models/exams/exams_class.php');

$obj = (object)$_POST;
print_r($obj);
$exam = new exams($obj);

if ($_POST['action'] == 'Filter') {
  if ($exam->create()) {
    echo "
    <script>
      alert('Exam created successfully');
      window.location.href = '../../php/teacher_page/teacher_page.php';
    </script>
    ";
  } else{
    echo "Error inserting exam";
  }
}

