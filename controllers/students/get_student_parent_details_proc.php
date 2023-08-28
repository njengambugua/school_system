<?php
include('../../DB.php');
include('../../models/students/students_class.php');
$student = new students();
return $student->getParentStudentInformation();
?>