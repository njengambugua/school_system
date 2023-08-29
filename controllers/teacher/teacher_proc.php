<?php


session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../models/teacher/teacher_class.php");
// echo "vincent";
$teacher = new Teacher();

if (isset($_SESSION['loginData']) && $_SESSION['loginData']['action'] == 'Login') {
    $obj = (object)$_SESSION['loginData'];
    if ($teacher->retrieve($obj)) {
        if ($teacher->numRows) {
            $_SESSION['teacher_data'] = $teacher->data;
            unset($_SESSION['loginData']);
            header("Location: ../../php/teacher_page/teacher_page.php");
        } else {
            unset($_SESSION['loginData']);
            header("Location: ../../php/login.php");
        }
    } else {
        $error = $teacher->error;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['student_regno'])) {
        header("Location: ../students/students_proc.php?student_regno=" . $_POST['student_regno'] . "");
    }


    if ($_POST['action'] == 'Add Teacher') {
        $obj = (object)$_POST;
        if ($teacher->create($obj)) {
            $lastId = $teacher->lastInsertId;
            $_SESSION['obj'] = $obj;
            header("Location: ../teacher_level/teacher_level_proc.php?last=" . $lastId);
        }
    }
}

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//     if (isset($_GET['teacher_id'])) {
//         if ($teacher->retrieveTeacherLevel($_GET['teacher_id'])) {
//             $teacher_levels = $teacher->data;

//             $_SESSION['teacher_level'] = $teacher_levels;
//             if ($teacher->retrieveTeacherSubjects($_GET['teacher_id'])) {
//                 $teacher_subject = $teacher->data;

//                 $_SESSION['teacher_subject'] = $teacher_subject;
//                 Header('Location: ../../php/teacher_page/teacher_page_mark_attendance.php');
//             } else {
//                 echo "Error: " . $teacher->error;
//             }
//         } else {
//             echo "Error: " . $teacher->error;
//         }
//     }
// }
