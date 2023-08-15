<?php
include('../../models/students/students_class.php');

$applicant_id = $_GET['applicant_id'];

//Generating registration number for a newly enroolled student

$regno = "SDT".$applicant_id;
$obj = new stdClass;
$obj->regno = $regno;
$obj->applicant_id = $applicant_id;
print_r($obj);
$student = new students;

if ($student->create($obj)) {
  echo 'Student created successfully';
} else {
  echo 'Error creating Student: ';
}

$data = $student->retrieve($id);
if($data){
  print_r($data);
} else{
  echo "Could not retrieve student data";
}

if($student->remove($id)){
  echo "Student deleted successfully";
} else{
  echo"Unable to delete the record";
}