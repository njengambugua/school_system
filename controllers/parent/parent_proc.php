<?php
session_start();
$obj = $_SESSION['obj'];
include('../../models/parent/parent_class.php');

$newParent = new parent7($obj);

if (isset($_SESSION['applicant_id'])) {
    if ($newParent->create()) {
        header('Location: ../../php/examRules.php');
    } else {
        header('Location: ../../php/admissions.php');
    }
} else {
    header('Location: ../../php/admissions.php');
}

// if (isset($_SESSION['parentId'])) {
//     $id = $_SESSION['applicant_id'];
//     $data = $newParent->retrieve($id);
//     print_r($data);
// }
?>