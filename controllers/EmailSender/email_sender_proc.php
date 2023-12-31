<?php
include("../../models/parent/parent_class.php");
include("../../Email/email.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $receiver_parent = new parent7();
    $status = (md5(1) == $_GET['status']) ? 1 : 0;

    $data = $receiver_parent->applicant_parent($_GET['applicant_id'], $status);

    if ($data) {
        $parent_name = $data->Parent_Name;
        $student_name = $data->Name;
        $applicant_id = $_GET['applicant_id'];

        if ($status) {
            $student_regno = $data->regno;
            $email = new Email('../../sendEmail/passes.php', 'WiseDigits Academy Enrollment');
            if ($email->sendHtml($data->Email, $student_name, $student_regno, $applicant_id)) {
                header('Location: ../../index.php');
            }
        } else {
            $email = new Email("../../sendEmail/failed.php", 'WiseDigits Academy Enrollment');
            if ($email->sendHtml($data->Email, $student_name, '000', '000')) {
                header('Location: ../../index.php');
            }
        }
    } else {
        echo "failed to fetch data";
    }
}
