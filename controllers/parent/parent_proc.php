<?php
session_start();
$obj = $_SESSION['obj'];
include('../../models/parent/parent_class.php');

$newParent = new parent7($obj);
try{
    $newParent->create();
    header('Location: ../../php/examRules.php');
}
catch(Throwable $th) {
    throw $th;
}
?>