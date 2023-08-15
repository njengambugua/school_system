<?php

include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

class students_DBO
{
  private $conn;
  public $lastInsertId;

  public function __construct()
  {
    $db = new DatabaseConnection();
    $this->conn = $db->getConnection();
  }

  function insert($obj)
  {
    try {
      $query = "INSERT INTO students(regno, applicant_id)VALUES(:regno,:applicant_id)";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':regno', $obj->regno);
      $stmt->bindParam(':applicant_id', $obj->applicant_id);
      $stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      $_SESSION['student_id'] = $this->lastInsertId;
      echo "<br>Applicant Id: " . $_SESSION['applicant_id'];
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  function select($id)
  {
    if (isset($id)) {
      $query = "SELECT * FROM students WHERE id=:id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      $res = $stmt->fetchAll(PDO::FETCH_OBJ);
      return $res;
    } else{
      $query = "SELECT * FROM students";
      $res = $this->conn->query($query);
      return $res;
    }
  }

  function delete($id){
    try {
      $query = "DELETE FROM students WHERE id=:id";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }
}
