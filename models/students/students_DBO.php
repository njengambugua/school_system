<?php

include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

class students_DBO
{
  private $conn;
  public $lastInsertId;
  public $query;
  public $stmt;
  public $error;
  public $res;
  public $numRows;

  public function __construct()
  {
    $db = new DatabaseConnection();
    $this->conn = $db->getConnection();
  }

  function insert($obj)
  {
    try {
      $this->query = "INSERT INTO students(regno, applicant_id)VALUES(:regno,:applicant_id)";
      $this->stmt = $this->conn->prepare($this->query);
      $this->stmt->bindParam(':regno', $obj->regno);
      $this->stmt->bindParam(':applicant_id', $obj->applicant_id);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      $_SESSION['student_id'] = $this->lastInsertId;
      echo "<br>Applicant Id: " . $_SESSION['applicant_id'];
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function select($obj)
  {
    try {
      $this->query = "SELECT * FROM students WHERE regno=:regno AND password=:password";
      $this->stmt = $this->conn->prepare($this->query);
      $this->stmt->bindParam(':regno', $obj->regno);
      $this->stmt->bindParam(':password', $obj->password);
      $this->stmt->execute();
      $this->numRows = $this->stmt->rowCount();
      $this->res = $this->stmt->fetch(PDO::FETCH_OBJ);
      $_SESSION['res'] = $this->res;
      if (!$this->res) {
        $_SESSION['error'] = 'This account does not exist';
      } else {
        $_SESSION['error'] = 'Login success';
      }

      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function delete($id)
  {
    try {
      $query = "DELETE FROM students WHERE id=:id";
      $this->stmt = $this->conn->prepare($query);
      $this->stmt->bindParam(':id', $id);
      $this->stmt->execute();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
