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
