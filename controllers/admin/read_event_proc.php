<?php
include('../../DB.php');
include('../../models/admin/adminClass.php');
$adminClassObj = new adminClass();
return $adminClassObj->getEvents();
?>