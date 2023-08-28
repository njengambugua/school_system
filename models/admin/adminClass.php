<?php
// echo "<h1>Admin class called</h1>";

error_reporting(E_ALL);
ini_set("display_errors", 1);

include('adminDBO.php');

class adminClass{
    function retrieveTables() {
        try {
            $dc = new adminDBO;
            return $dc->getTables();
        }
        catch(Throwable $th) {
            throw $th;
        }
    }

    function select($tableName) {
        $dbo = new adminDBO;
        return $dbo->selectTable($tableName);
    }

    function aboutTable($tableName) {
        $wh = new adminDBO;
        return $wh->descTable($tableName);
    }

    function getRow($tableName, $rowId) {
        $hs = new adminDBO;
        return $hs->selectRow($tableName, $rowId);
    }

    function insertEvent($obj){
        $newEvent = new adminDBO;
        $newEvent->addEvent($obj);
    }

    function getEvents() {
        $events = new adminDBO;
        return $events->readEvent();
    }
}
?>