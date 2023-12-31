<?php
include('../../models/bank/bank_class.php');

$bank = new Bank;
$obj = (object)$_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] == 'Add Bank') {
    if ($bank->create($obj)) {
      header('Location: ../../php/admin/bank.php');
    } else {
      $_SESSION['error'] = $bank->error;
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['source'])) {
    if ($bank->retrieve()) {
      $_SESSION['bank_data'] = $bank->data;
      header("Location: ../level/level_proc.php?src=" . $_GET['source']);
    }
  }

  if (isset($_GET['src'])) {
    if ($bank->retrieve()) {
      $_SESSION['bank_data'] = $bank->data;
      header("Location: ../attendance/attendance_proc.php?student_id=" . $_SESSION['res']->applicant_id);
    }
  }

  if (isset($_GET['id'])) {
    if ($bank->retrieve()) {
      $_SESSION['bank_data'] = $bank->data;
      header("Location: ../../php/fee.php");
    }
  }
}
