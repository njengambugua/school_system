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

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['source'])) {
    if ($level->retrieve()) {
      $_SESSION['level_data'] = $level->data;
      header("Location: ../subjects/subjects_proc.php?source=".$_GET['source']);
    } else {
      
    }
  }

  if (isset($_GET['src'])) {
    if ($level->retrieve()) {
      $_SESSION['level_data'] = $level->data;
      header("Location: ../../php/admin/fees.php");
    } else {
      
    }
  }
}