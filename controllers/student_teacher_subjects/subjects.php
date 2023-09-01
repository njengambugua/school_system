<?php
include("../../models/student_teacher_subjects/subject_class.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subject = new subject();
    $obj = (object)$_POST;
    if ($subject->create($obj)) {
        unset($_SESSION['reg_details']);
        unset($_SESSION['subjects']);

        header("Location: ../../index.php");
    } else {
        $id = $obj->studentId;
        header("Location: ../students/students_proc.php?id=$id");
    }
}
