<?php
session_start();
// $directory1 = '../../models/admin/';
// $directory2 = '../../models/applicant/';
// $directory3 = '../../models/parent/';
// $directory4 = '../../models/students/';
// $directory5 = '../../models/teacher/';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $updates = (object)$_POST;
    if ($_SESSION['tableName'] == 'parent') {
        include('../../models/parent/');
        $upd = new parent7();
        try {
            $upd->create($updates);
            header('Location: database.php');
        }
        catch (PDOException $e)
        {
            $e->getMessage();
        }
    }
    print_r($updates);
    if ($_SESSION['tableName'] == 'teachers'){
        include('../../models/teacher/teacher_class.php');
        echo "<br>Done<br>";
        $tch = new Teacher;
        try {
            $tch->edit($updates, 12);
            header('Location: database.php');
        }
        catch(Throwable $th){
            throw $th;
        }
    }
}