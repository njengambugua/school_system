<?php
include('../../models/teacher_level/teacher_level_class.php');

$tchlvl = new Teacher_level;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['last'])) {
    $obj = $_SESSION['obj'];
    $subjects = [];
    foreach ($_SESSION['subject_data'] as $sub) {
      array_push($subjects, $sub->subjectName);
    }
    print_r($subjects);
    foreach ($obj as $key => $value) {
      if ($key !== 'trname' && $key !== 'regno' && $key !== 'password' && $key !== 'action' && $key !== 'teacher_id') {
        if (!in_array($key, $subjects)) {
          $insertObj = new stdClass();
          $insertObj->teacher_id = $_GET['last'];
          $insertObj->level_id = $value;
          if ($tchlvl->create($insertObj)) {
            $_SESSION['level_id'] = $tchlvl->lastInsertId;
            if ($tchlvl->retrieve($_GET['last'])) {
              $_SESSION['levels'] = $tchlvl->data;
              header("Location: ../../php/admin/teacher.php");
            }
          }
        }
      }
    }
  }
}
