<?php
include('../../models/level/level_class.php');

$level = new Level;
$obj = (object)$_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] == 'Add Level') {
    if ($level->create($obj)) {
      header('Location: ../../php/admin/level.php');
    } else {
      $_SESSION['error'] = $level->error;
    }
  }
}