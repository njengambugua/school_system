<?php
include("../../models/teacher/timetable_class.php");
$timetable = new teacherClass;

$dataResults = $timetable->retrieve();
return $dataResults;
?>