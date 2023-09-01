<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../models/attendance/attendance_class.php');
$attendance = new attendance();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'Mark Attendance') {
        $student = [];
        foreach ($_POST as $key => $data) {
            $obj = new stdClass;
            if (preg_match('/^studentId/', $key)) {
                $obj->student_id = $data;
                $obj->lesson_id = $_POST['lesson_id'];
                array_push($student, $obj);
            }
        }
        $full_obj = (object)$student;
        // $attendance->create($full_obj);
        if ($attendance->create($full_obj)) {
            $_SESSION['message'] = 'You have successfully marked attendance';
            header('Location: ../../php/teacher_page/teacher_page_choose_lesson.php');
        } else {
            $_SESSION['error'] = $attendance->error;
            header('Location: ../../php/teacher_page/teacher_page_mark_attendance.php');
        }
    }


    if ($_POST['action'] == 'Get Student') {
        $obj = (object)$_POST;
        if ($attendance->retrieve($obj)) {
            $data = $attendance->data;
            $_SESSION['student_attendance'] = $data;
            header('Location: ../../php/teacher_page/teacher_view_student_attendance.php');
            // exit;
        }
    }

    if ($_POST['action'] == 'Get All') {
        $obj = (object)$_POST;
        unset($_SESSION['all_student_attendance']);
        if ($attendance->retrieve($obj)) {
            $data = $attendance->data;
            $_SESSION['all_student_attendance'] = $data;
            header('Location: ../../php/teacher_page/teacher_view_many_attendance.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $obj = new stdClass;
    if (isset($_GET['id']) && $_GET['id'] == $_SESSION['res']->id) {
        $obj->id = $_GET['id'];
        $obj->level = $_SESSION['res']->Level;
        $obj->regno = $_SESSION['res']->regno;


        if ($attendance->retrieve($obj)) {
            $data = $attendance->data;
            $_SESSION['student_attendance'] = $data;
            header('Location: ../../php/student_page/student_page_attendance.php');
            // exit;
        }
    }

    if (isset($_GET['student_id'])) {
        $obj = new stdClass;

        $obj->id = $_GET['student_id'];
        if ($attendance->retrieveStudentAttendance($obj)) {
            $data = $attendance->data;
            // if ($data) {
            print_r($obj);
            array_push($_SESSION['bank_data'], $data);
            header("Location: ../../php/student_page/student_page.php");
            // }
        }
    }
}
