<?php
include('../../models/teacher_subject/teacher_subject_class.php');

$tchsbj = new Teacher_subject;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] == 'Add Teacher_Subject') {
    $obj = (object)$_POST;
    foreach ($obj as $key => $value) {
      if ($key !== 'level' && $key !== 'action') {
        $insertObj = new stdClass;
        $insertObj->subject_id = $value;
        $insertObj->teacher_id = $_SESSION['levels'][0]->teacher_id;
        $insertObj->level_id = $obj->level;
        if ($tchsbj->create($insertObj)) {
          header("Location: ../../php/admin/teacher.php");
        }
      }
    }
  }
}
