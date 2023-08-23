<?php
include('../../models/teacher_subject/teacher_subject_class.php');

$tchsbj = new Teacher_subject;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['last'])) {
    $obj = $_SESSION['obj'];
    $levels = array('PP1', 'PP2', 'Grade_1', 'Grade_2', 'Grade_3', 'Grade_4', 'Grade_5', 'Grade_6', 'Form_1', 'Form_2');
    
    foreach ($obj as $key => $value) {
      if ($key !== 'trname' && $key !== 'regno' && $key !== 'password' && $key !== 'action' && $key !== 'teacher_id') {
        if (!in_array($key, $levels)) {
          // Create a new insertObj instance for each iteration
          $insertObj = new stdClass();
          $insertObj->teacher_id = $_GET['last'];
          $insertObj->subject_id = $value;
          print_r($insertObj);
          if ($tchsbj->create($insertObj)) {
            echo "woohoo";
          }
        }
      }
    }
  }
}