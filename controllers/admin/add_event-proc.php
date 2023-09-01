<?php
include('../../models/admin/adminClass.php');

if (isset($_POST['action'])) {
    echo "Form details:<br>";
    print_r((object)$_POST);
    foreach ($_POST as $key => $value) {
        echo $key . " = " . $value . "<br>";
    }

    try {
        $newEvent = new adminClass;
        $newEvent->insertEvent((object)$_POST);
        header('Location: ../../php/admin/event.php');
    } catch (Throwable $th) {
        throw $th;
    }
}
