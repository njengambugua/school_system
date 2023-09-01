<?php
include('../../models/applicant/applicant_class.php');
$obj = (object)$_POST;
$_SESSION['obj'] = $obj;

$newApplicant = new applicant();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['action'] == 'Apply') {
        if ($newApplicant->create($obj)) {
            header('Location: ../parent/parent_proc.php');
        } else {
            header('Location: ../../php/admission.php');
        }
    }
}

if (isset($_GET['applicant'])) {
    $id = $_GET['applicant'];
    $data = $newApplicant->retrieve($id);
    if ($data) {
        $_SESSION['level'] = $data[0]->Level;
        header("Location: ../exams/exams_proc.php?level=" . $_SESSION['level']);
    }
}
