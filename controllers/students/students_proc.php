<?php
include('../../models/students/students_class.php');
include('../../DB.php');

$student = new students;

if (isset($_GET['applicant_id'])) {
  $obj = new stdClass;
  $regno = "SDT" . $_GET['applicant_id'];
  $obj->regno = $regno;
  $obj->applicant_id = $_GET['applicant_id'];
  $status = $_GET['status'];
  if ($student->create($obj)) {
    header("Location: ../EmailSender/email_sender_proc.php?applicant_id=" . $obj->applicant_id . "&status=" . $status);
  } else {
    echo 'Error creating Student: ';
  }
}

if (isset($_SESSION['loginData']) && $_SESSION['loginData']['action'] == 'Login') {
  $obj = (object)$_SESSION['loginData'];
  if ($student->retrieve($obj)) {
    if ($student->numRows) {
      $_SESSION['res'] = $student->data;
      unset($_SESSION['loginData']);
      header("Location: ../../php/student_page/student_page.php");
    } else {
      unset($_SESSION['loginData']);
      header("Location: ../../php/login.php");
    }
  } else {
    $error = $student->error;
  }
}



if ($_SERVER['REQUEST_METHOD'] == "GET") {
  if (isset($_GET['student_regno'])) {
    if ($student->getStudent($_GET['student_regno'])) {
      $data = $student->data;
      $_SESSION['student_data'] = $data;
      header("Location: ../../php/teacher_page/teacher_view_student_profile.php");
    } else {
      echo "data no found";
    }
  }



  if (isset($_GET['id'])) {
    print_r($_GET);
    if ($student->studentDetails($_GET['id'])) {
      $_SESSION['reg_details'] = $student->data;
      if ($student->readSubjects()) {
        $_SESSION['subjects'] = $student->data;
        header('Location: ../../php/student_page/student_page_register_subjects.php');
      }
    } else {
      echo "Failed: " . $student->error;
    }
  }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['grade']) && isset($_POST['subject'])) {
    $obj = (object)$_POST;
    if ($student->getStudentAttendance($obj)) {
      $_SESSION['teacher_related'] = $student->data;
      header("Location: ../../php/teacher_page/teacher_page_mark_attendance.php");
    } else {
      echo "Failed: " . $student->error;
    }
  }
}
