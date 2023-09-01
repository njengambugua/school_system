<style>
    body {
        background: #222;
        color: #fff;
    }
</style>
<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // If table to be deleted is teachers==================================
    if ($_SESSION['tableName'] == 'teachers') {
        include('../../models/teacher/teacher_class.php');
        $ha = new Teacher;
        $ha->remove($_POST["deleteBtn"]);
        header('Location: ../../php/admin/database.php');
    }

    // It table is applicant============================================
    if ($_SESSION['tableName'] == 'bank') {
        include('../../models/bank/bank_class.php');
        $bank = new Bank();
        if ($bank->remove($_POST['deleteBtn'])) {
            header('Location: ../../php/admin/database.php');
        }
    }

    if ($_SESSION['tableName'] == 'applicant') {
        include('../../models/applicant/applicant_class.php');
        $applicant = new applicant();
        if ($applicant->remove($_POST['deleteBtn'])) {
            header('Location: ../../php/admin/database.php');
        }
    }

    if ($_SESSION['tableName'] == 'parent') {
        include('../../models/parent/parent_class.php');
        $parent = new parent7();
        if ($parent->remove($_POST['deleteBtn'])) {
            header('Location: ../../php/admin/database.php');
        }
    }

    if ($_SESSION['tableName'] == 'students') {
        include('../../models/students/students_class.php');
        $students = new students();
        if ($students->remove($_POST['deleteBtn'])) {
            header('Location: ../../php/admin/database.php');
        }
    }
}
?>