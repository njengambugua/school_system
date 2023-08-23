<?php
session_start();
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Level_DBO
{
  public $conn;
  public $sql;
  public $error;
  public $res;
  public $stmt;
  public $numRows;
  public $lastInsertId;

  public function __construct()
  {
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  public function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO level(level)VALUES(:level)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':level', $obj->level);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
