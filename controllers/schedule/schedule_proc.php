<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
include("../../models/schedule/schedule_class.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $schedule = new Schedule();
    if ($_GET['link'] == 'Admin') {
        if ($schedule->retreive()) {
            $data = $schedule->data;
            $_SESSION['timetable'] = $data;
            header('Location: ../../php/admin/timetable.php');
        } else {
            $error = $schedule->error;
            echo "Error: " . $error;
            header('Location: ../../php/admin/timetable.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schedule = new Schedule();
    $obj = (object)$_POST;

    if ($_POST['action'] == 'Sort') {
        if ($schedule->find($obj)) {
            session_start();
            $_SESSION['sort-timetable'] = $schedule->data;
            header('Location: ../../php/admin/timetable.php');
        } else {
            echo "Error: " . $schedule->error;
        }
    }

    $obj = (object)$_POST;

    if ($schedule->create($obj)) {
        if ($schedule->retreive()) {
            $data = $schedule->data;
            $_SESSION['timetable'] = $data;
            header('Location: ../../php/admin/timetable.php');
        } else {
            echo "Error: " . $schedule->error;
        }
    } else {
        echo "Error: " . $schedule->error;
    }
}
