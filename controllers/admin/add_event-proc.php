<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../DB.php');
include ('../../models/admin/adminClass.php');

if (isset($_POST['action'])) {
    echo "Form details:<br>";
    print_r((object)$_POST);
    foreach($_POST as $key => $value) {
        echo $key . " = " . $value."<br>";
    }

    try{
        $newEvent = new adminClass;
        $newEvent->insertEvent((object)$_POST);
    }
    catch(Throwable $th){
        throw $th;
    }
}
?>