<?php
include('../../models/students/students_class.php');

$student = new students;

if (isset($_GET['applicant_id'])) {
  $obj = new stdClass;
  $regno = "SDT".$_GET['applicant_id'];
  $obj->regno = $regno;
  $obj->applicant_id = $_GET['applicant_id'];
  ;
  if ($student->create($obj)) {
    header('Location: ../../php/login.php');
  } else {
    echo 'Error creating Student: ';
  }
}

if ($_POST['action'] == 'Login') {
  $obj = (object)$_POST;
  if ($student->retrieve($obj)) {
    if ($student->numRows) {
      $_SESSION['std_data'] = $student->data;
      header('Location: ../../php/student_page/student_page.php');
    } else{
      header("Location: ../../php/login.php");
    }
  } else {
    $error = $student->error;
  }
}