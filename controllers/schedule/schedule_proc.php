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


    if (isset($_POST['input_0'])) {
        $obj = (object)$_POST;
        $schedule->create($obj);
        $schedule->retreive();
        $data = $schedule->data;
        $_SESSION['timetable'] = $data;
        header('Location: ../../php/admin/timetable.php');
    }

    if ($_POST['action'] == 'Sort Date') {
        $day;
        if ($_POST['day'] == 'Monday') {
            $day = 'Day1';
        } elseif ($_POST['day'] == 'Tuesday') {
            $day = 'Day2';
        } elseif ($_POST['day'] == 'Wednesday') {
            $day = 'Day3';
        } elseif ($_POST['day'] == 'Thursday') {
            $day = 'Day4';
        } elseif ($_POST['day'] == 'Friday') {
            $day = 'Day5';
        } else {
            echo "Enter valid day";
        }
        $obj = new stdClass;
        $obj->day = $day;
        print_r($_SESSION['loginData']);
        // if ($schedule->retreiveByDay($obj)) {
        //     # code...
        // }
    }
}
