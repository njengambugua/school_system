<?php
include('../../models/admin/adminClass.php');
if (isset($_POST['action'])) {
    $sh = new adminClass;
    $tables = (object)$sh->retrieveTables();
}
