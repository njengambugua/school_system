<?php
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
}
?>