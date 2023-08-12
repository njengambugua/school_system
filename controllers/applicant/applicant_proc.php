<?php
include('../../models/applicant/applicant_class.php');
// print_r($_POST);
$obj = (object)$_POST;
// print_r($obj);

$user = new applicant($obj);

if ($user->create()) {
    header('Location: ../../php/examRules.php');
} else {
    header('Location: ../../php/admission.php');
}

// if ($user->retrieve(7)) {
//     echo $user;
// }

print_r($user->retrieve(7));
