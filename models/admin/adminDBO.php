<?php
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class adminDBO{
    public $conn;
    public $stmt;

    function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function getTables() {
        $getTableCommand = "SHOW TABLES";
        try {
            return $this->conn->query($getTableCommand);
        }
        catch(\Throwable $th){
            throw $th;
        }
    }

    function selectTable($tableName) {
        $selectCommand = "SELECT * FROM $tableName";
        $this->stmt = $this->conn->prepare($selectCommand);
        $this->stmt->execute();
        $results = $this->stmt->fetchAll(PDO::FETCH_OBJ);
        print_r($results);
    }

    
}
?>