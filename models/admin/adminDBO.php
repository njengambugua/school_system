<?php
class adminDBO
{
    public $conn;
    public $stmt;

    function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    function getTables()
    {
        $getTableCommand = "SHOW TABLES";
        try {
            return $this->conn->query($getTableCommand);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function descTable($tableName)
    {
        $columnCommand = "DESC $tableName";
        $this->stmt = $this->conn->prepare($columnCommand);
        $this->stmt->execute();
        $results = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }

    function selectRow($tableName, $rowId)
    {
        $rowCommand = "SELECT * FROM $tableName WHERE id = $rowId";
        $this->stmt = $this->conn->prepare($rowCommand);
        try {
            $this->stmt->execute();
            $results = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return $results;
        } catch (Throwable $th) {
            throw $th;
        }
    }

    function selectTable($tableName)
    {
        $selectCommand = "SELECT * FROM $tableName";
        $this->stmt = $this->conn->prepare($selectCommand);
        $this->stmt->execute();
        $results = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
}
