<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../models/admin/adminClass.php');
if (isset($_POST['action'])) {
    $sh = new adminClass;
    $tables = (object)$sh->retrieveTables();
        print_r($tables);
    
    // return $tables;
}
?>