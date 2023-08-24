<style>
    body{
        background: #222;
        color: #fff;
    }
</style>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../models/teacher/teacher_class.php');
include('../../DB.php');
echo "Delete called<br>";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo $_POST["deleteBtn"];
    echo "<br>Calling class";
    $ha = new Teacher;
    $ha->delete($_POST["deleteBtn"]);
    header('Location: ../database.php');
}
?>