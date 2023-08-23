<?php
session_start();
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Subjects_DBO
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
      $this->sql = "INSERT INTO subjects(subjectName)VALUES(:subject_name)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':subject_name', $obj->subject_name);
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
      $this->sql="SELECT * FROM subjects";
      $this->stmt = $this->conn->query($this->sql);
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      $this->numRows = $this->stmt->rowCount();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
