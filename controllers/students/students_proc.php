<?php
include('../../models/students/students_class.php');

$student = new students;

if (isset($_GET['applicant_id'])) {
  $obj = new stdClass;
  $regno = "SDT" . $_GET['applicant_id'];
  $obj->regno = $regno;
  $obj->applicant_id = $_GET['applicant_id'];
  $status = $_GET['status'];
  if ($student->create($obj)) {
    header("Location: ../EmailSender/email_sender_proc.php?applicant_id=" . $obj->applicant_id . "&status=" . $status);
    // header('Location: ../../php/login.php');
  } else {
    echo 'Error creating Student: ';
  }
}

if ($_SESSION['loginData']['action'] == 'Login') {
  $obj = (object)$_SESSION['loginData'];
  if ($student->retrieve($obj)) {
    if ($student->numRows) {
      $_SESSION['res'] = $student->data;
      header("Location: ../../php/student_page/student_page.php");
    } else {
      header("Location: ../../php/login.php");
    }
  } else {
    $error = $student->error;
  }
}
