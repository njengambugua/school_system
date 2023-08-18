<?php
include('../../models/applicant/applicant_class.php');
session_start();
$obj = (object)$_POST;
$_SESSION['obj'] = $obj;

$newApplicant = new applicant($obj);

if ($_POST['action'] == 'Apply') {
    if ($newApplicant->create()) {
        header('Location: ../parent/parent_proc.php');
    } else {
        header('Location: ../../php/admission.php');
    }
}
else {
    header('Location: ../../php/admission.php');
}

if (isset($_GET['applicant'])) {
    echo "<br>Applicant is set";
    // print_r($_GET);
    $id = $_GET['applicant'];
    $data = $user->retrieve($id);
    if ($data) {
       $_SESSION['applicant_data'] = $data;
        // header('Location: ../../php/exams.php');
    }
}
