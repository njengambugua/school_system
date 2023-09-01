<?php
include('../../models/parent/parent_class.php');
$newParent = new parent7();
$obj = (object)$_SESSION['obj'];

if (isset($_SESSION['applicant_id'])) {
    if ($newParent->create($obj)) {
        header('Location: ../../php/examRules.php');
    } else {
        header('Location: ../../php/admission.php');
    }
} else {
    // header('Location: ../../php/admissions.php');
}
