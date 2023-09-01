<?php
include("../../models/students/students_class.php");
$readAcademics = new students;
$academics = $readAcademics->readAcademics();
return $academics;
