<?php
include('../../models/applicant/applicant_class.php');
// print_r($_POST);
$obj = (object)$_POST;
// print_r($obj);
session_start();
$user = new applicant($obj);

if ($_POST['action'] == 'Apply') {

    if ($user->create()) {
        header('Location: ../../php/examRules.php');
    } else {
        header('Location: ../../php/admission.php');
    }
} else {
    header('Location: ../../php/admission.php');
}

if (isset($_GET['applicant'])) {
    print_r($_GET);
    $id = $_GET['applicant'];
    $data = $user->retrieve($id);
    if ($data) {
        // $applicant_level = $data['Level'];
        $_SESSION['applicant_data'] = $data;
        $applicant_level = $data[0]->Level;

        header("Location: ../exams/exams_proc.php?level=$applicant_level");
    }
}
