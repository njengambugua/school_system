<?php
session_start();
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Bank_DBO
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
      $this->sql = "INSERT INTO bank(bank_name,bank_paybill)VALUES(:bank_name,:bank_paybill)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':bank_name', $obj->bank_name);
      $this->stmt->bindParam(':bank_paybill', $obj->bank_paybill);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function select()
  {
    try {
      $this->sql = "SELECT * FROM bank";
      $this->stmt = $this->conn->query($this->sql);
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      $this->numRows = $this->stmt->rowCount();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function update($obj, $id)
  {
    try {
      $this->sql = "UPDATE bank SET bank_name=:bank_name, bank_paybill=:bank_paybill WHERE id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':bank_name', $obj->bank_name);
      $this->stmt->bindParam(':bank_paybill', $obj->bank_paybill);
      $this->stmt->bindParam(':id', $id);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function delete($id)
  {
    try {
      $this->sql = "DELETE FROM bank WHERE id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':id', $id);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
