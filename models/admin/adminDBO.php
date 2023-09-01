<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

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

    function addEvent($obj)
    {
        $insertCommand =
            "INSERT INTO events(eventName, eventDate, eventTime, venue, description)
        VALUES(:name, :date, :time, :venue, :description)
        ";
        $stmt = $this->conn->prepare($insertCommand);
        $stmt->bindParam(':name', $obj->eventName);
        $stmt->bindParam(':date', $obj->eventDate);
        $stmt->bindParam(':time', $obj->eventTime);
        $stmt->bindParam(':venue', $obj->eventVenue);
        $stmt->bindParam(':description', $obj->eventDetails);
        try {
            $stmt->execute();
            echo "Event added successfully";
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage() . "<br>";
        }
    }

    function readEvent(){
        $readCommand = "SELECT * FROM events";
        $stmt = $this->conn->prepare($readCommand);
        $stmt->execute();
        $eventsResults = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $eventsResults;
    }
}