<?php
include('../../models/fee/fee_class.php');
$fee = new Fee;

$obj = (object)$_POST;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_POST['action'] == 'Submit') {
    if ($fee->create($obj)) {
      $_SESSION['lastId'] = $fee->lastInsertId;
      header('Location: ../../php/admin/fees.php');
    }
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['std_id'])) {
    if ($fee->retrieveByLevel($_GET['std_id'])) {
      $_SESSION['fee_data'] = $fee->blue;
      header('Location: ../bank/bank_proc.php?src=' . $_GET['std_id']);
    }
  }

  if (isset($_GET['id'])) {
    if ($fee->retrieve()) {
      $_SESSION['fee_data'] = $fee->data;
      header('location: ../bank/bank_proc.php?id=' . $_GET['id']);
    }
  }
}
