<?php
include('../../models/applicant/applicant_class.php');
echo "<hr>";
$obj = (object)$_POST;
$_SESSION['obj'] = $obj;
echo "<hr>";

$user = new applicant($obj);

if ($_POST['action'] == 'Apply') {
    echo "<br>Button was clicked";
    if ($user->create()) {
        echo "<br>About to include parent";
        echo "<hr>";
        include('../../models/parent/parent_class.php');
        $parent = new parent7($obj);
        if($parent->create()) {
            echo "<br>Parent Created";
        }
        else {
            echo "<br>Parent Not Created";

        }
        echo "<hr>";
        echo "<br>Record Inserted successfully";
        header('Location: ../../php/examRules.php');
    } else {
        echo "<br>Record was not inserted successfully";
        // header('Location: ../../php/admission.php');
    }
} else {
    echo "<br>Button was not clicked";
    header('Location: ../../php/admission.php');
}

echo "<br>Done";

if (isset($_GET['applicant'])) {
    echo "<br>Applicant is set";
    print_r($_GET);
    $id = $_GET['applicant'];
    $data = $user->retrieve($id);
    if ($data) {
       $_SESSION['applicant_data'] = $data;
        // header('Location: ../../php/exams.php');
    }
}
