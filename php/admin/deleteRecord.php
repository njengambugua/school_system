<style>
    body{
        background: #222;
        color: #fff;
    }
</style>
<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // If table to be deleted is teachers==================================
    if ($_SESSION['tableName'] == 'teachers') {
        include('../../models/teacher/teacher_class.php');
        $ha = new Teacher;
        $ha->delete($_POST["deleteBtn"]);
        header('Location: ../../php/admin/database.php');
    }
    
    // It table is applicant============================================
    if ( $_SESSION['tableName'] == 'applicant') {
        include('../../models/applicant/applicant_class.php');
        $applicantObj = new applicant();
        if($applicantObj->delete($_POST['deleteBtn'])){
            header('Location: ../../php/admin/database.php');
        } 
    }


}
?>