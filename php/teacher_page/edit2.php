<?php
session_start();
$teacherObj = (object)$_POST;
$_SESSION['teacher_data'] = $teacherObj;
include('../../models/teacher/teacher_DBO.php');
$tchObj = new teacherDBO;
$tchObj->update($teacherObj, $teacherObj->id);
header('Location: teacher_page_profile.php');
?>