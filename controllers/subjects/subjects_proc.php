<?php
include('../../models/subjects/subjects_class.php');

$subject = new Subjects;
$obj = (object)$_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] == 'Add Subject') {
    if ($subject->create($obj)) {
      header('Location: ../../php/admin/subjects.php');
    } else {
      $_SESSION['error'] = $subject->error;
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['source'])) {
    if ($subject->retrieve()) {
      $_SESSION['subject_data'] = $subject->data;
      header('Location: ../../php/admin/teacher.php');
    } else {
      
    }
  }
}