<?php
include('../../DB.php');
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Teacher_subject_DBO
{
  public $conn;
  public $sql;
  public $stmt;
  public $error;
  public $lastInsertId;
  public $res;
  public $numRows;

  public function __construct()
  {
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  public function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO teacher_subjects(teacher_id,subject_id,level_id)VALUES(:teacher_id,:subject_id,:level_id)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':teacher_id', $obj->teacher_id);
      $this->stmt->bindParam(':subject_id', $obj->subject_id);
      $this->stmt->bindParam(':level_id', $obj->level_id);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
