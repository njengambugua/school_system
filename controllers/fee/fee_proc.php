<?php
include('../../DB.php');
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