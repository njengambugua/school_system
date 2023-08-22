<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../models/teacher/teacher_class.php");

$teacher = new Teacher();

if ($_SESSION['loginData']['action'] == 'Login') {
    $obj = (object)$_SESSION['loginData'];

    if ($teacher->retrieve($obj)) {
        if ($teacher->numRows) {
            $_SESSION['res'] = $teacher->data;
            header("Location: ../../php/teacher_page/teacher_page.php");
        } else {
            header("Location: ../../php/login.php");
        }
    } else {
        $error = $teacher->error;
    }
}
