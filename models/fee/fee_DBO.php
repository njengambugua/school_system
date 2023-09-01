<?php
include('../../DB.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Fee_DBO
{
  public $error;
  public $lastInsertId;
  public $numRows;
  public $res;
  public $conn;
  public $stmt;
  public $sql;

  public function __construct()
  {
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  public function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO fee(Amount,level_id)VALUES(:amount,:grade)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':amount', $obj->amount);
      $this->stmt->bindParam(':grade', $obj->grade);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  public function select()
  {
    try {
      $this->sql = "SELECT l.level, f.Amount FROM fee f LEFT JOIN level l ON l.id=f.level_id";
      $this->stmt = $this->conn->query($this->sql);
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      $this->numRows = $this->stmt->rowCount();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  public function selectbyLevel($level)
  {
    try {
      $this->sql = "SELECT l.level, f.Amount FROM fee f LEFT JOIN level l ON l.id=f.level_id WHERE l.level=:level";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':level', $level);
      $this->stmt->execute();
      $this->res = $this->stmt->fetch(PDO::FETCH_OBJ);
      $this->numRows = $this->stmt->rowCount();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  public function update($obj, $id)
  {
    try {
      $this->sql = "UPDATE fee SET Amount=:Amount, level_id=:level_id WHERE id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':Amount', $obj->Amount);
      $this->stmt->bindParam(':level_id', $obj->level_id);
      $this->stmt->bindParam(':id', $id);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
