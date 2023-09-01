<?php
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


    if (isset($_GET['teacher_id'])) {
        $obj = new stdClass;
        $obj->id = $_GET['teacher_id'];
        if ($schedule->retriveForTeacher($obj)) {
            $data = $schedule->data;
            $_SESSION['teacher_select'] = $data;
            header('Location: ../../php/teacher_page/teacher_page_choose_lesson.php');
        } else {
            echo "Error: " . $schedule->error;
        }
    }



    if (isset($_GET['id'])) {
        $obj = new stdClass;
        $obj->id = $_GET['id'];
        if ($schedule->retriveForTeacher($obj)) {
            $data = $schedule->data;
            $_SESSION['teacher_select'] = $data;
            header('Location: ../../php/teacher_page/teacher_view_student_attendance.php');
        } else {
            echo "Error: " . $schedule->error;
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
        $obj->level = $_SESSION['res']->Level;
        if ($schedule->retreiveByDay($obj)) {
            $data = $schedule->data;
            $_SESSION['student-day-table'] = $data;
            header('Location: ../../php/student_page/student_page_timetable.php');
        } else {
            echo "error:" . $schedule->error;
        }
    }



    if ($_POST['teacher-action'] == 'Sort Date') {
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
        $obj->id = $_SESSION['teacher_data']->teacher_id;
        $obj->day = $day;
        if ($schedule->retriveForTeacher($obj)) {
            $data = $schedule->data;
            $_SESSION['teacher-timetable'] = $data;
            header('Location: ../../php/teacher_page/teacher_page_timetable.php');
        } else {
            echo "Error" . $schedule->error;
        }
    }
}
