<?php
include('../../models/admin/adminClass.php');
if (isset($_SESSION['loginData']) && $_SESSION['loginData']['action'] == 'Login') {
  if ($_SESSION['loginData']['regno'] == 'Admin' &&  $_SESSION['loginData']['password'] == 'a') {
    unset($_SESSION['loginData']);
    header("Location: ../../php/admin/navbar.php");
  } else {
    unset($_SESSION['loginData']);
    header('Location: ../../php/login.php');
  }
}
