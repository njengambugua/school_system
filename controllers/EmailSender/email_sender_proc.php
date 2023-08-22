<?php

include("../../models/parent/parent_class.php");
include("../../Email/email.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $receiver_parent = new parent7();
    $status = (md5(1) == $_GET['status']) ? 1 : 0;

    // echo $status;
    $data = $receiver_parent->applicant_parent($_GET['applicant_id'], $status);

    if ($data) {
        $parent_name = $data->Parent_Name;
        $student_name = $data->Name;

        if ($status) {
            $student_regno = $data->regno;
            $email = new Email('../../sendEmail/passes.php', 'WiseDigits Academy Enrollment');
            if ($email->sendHtml($data->Email, $student_name, $student_regno)) {
                header('Location: ../../index.php');
            }
        } else {
            $email = new Email("../../sendEmail/failed.php", 'WiseDigits Academy Enrollment');
            if ($email->sendHtml($data->Email, $student_name, '000')) {
                header('Location: ../../index.php');
            }
        }
    } else {
        echo "failed to fetch data";
    }
}
