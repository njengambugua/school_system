<?php
include('../../models/teacher_level/teacher_level_class.php');

$tchlvl = new Teacher_level;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['last'])) {
    $obj = $_SESSION['obj'];
    $subjects = array('Mathematics', 'English', 'Kiswahili', 'Social Studies', 'Art and Craft', 'Music', 'CRE', 'Home Science', 'P.H.E', 'Agriculture');

    foreach ($obj as $key => $value) {
      if ($key !== 'trname' && $key !== 'regno' && $key !== 'password' && $key !== 'action' && $key !== 'teacher_id') {
        if (!in_array($key, $subjects)) {
          // Create a new insertObj instance for each iteration
          $insertObj = new stdClass();
          $insertObj->teacher_id = $_GET['last'];
          $insertObj->level_id = $value;
          if ($tchlvl->create($insertObj)) {
            header("Location: ../../php/admin/teacher.php");
          }
        }
      }
    }
  }
}
