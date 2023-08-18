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
=======

// print_r($_POST);
$obj = (object)$_POST;
// print_r($obj);
session_start();


$obj = (object)$_POST;

$user = new applicant($obj);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['obj'] = $obj;

    if ($_POST['action'] == 'Apply') {
        echo "<br>Button was clicked";
        if ($user->create()) {

            include('../../models/parent/parent_class.php');
            $parent = new parent7($obj);
            if ($parent->create()) {
                echo "<br>Parent Created";
            } else {
                echo "<br>Parent Not Created";
            }
            echo "<hr>";
            echo "<br>Record Inserted successfully";
            header('Location: ../../php/examRules.php');
        } else {
            echo "<br>Record was not inserted successfully";
            // header('Location: ../../php/admission.php');
        }
    }
}



if (isset($_GET['applicant'])) {

    // print_r($_GET);

    $id = $_GET['applicant'];
    print_r($id);
    $data = $user->retrieve($id);
    
    if ($data) {

        // $applicant_level = $data['Level'];
        $_SESSION['applicant_data'] = $data;
        $applicant_level = $data[0]->Level;

        $applicant_level = $data[0]->Level;
        header("Location: ../exams/exams_proc.php?level=$applicant_level");
    }
}
