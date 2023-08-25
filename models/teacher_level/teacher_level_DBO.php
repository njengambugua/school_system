<?php
include('../../DB.php');
session_start();

class Teacher_level_DBO
{
  public $conn;
  public $sql;
  public $stmt;
  public $lastInsertId;
  public $res;
  public $numRows;
  public $error;

  public function __construct()
  {
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  public function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO teacher_level(teacher_id,level_id)VALUES(:teacher_id,:level_id)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':teacher_id', $obj->teacher_id);
      $this->stmt->bindParam(':level_id', $obj->level_id);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  public function select($id)
  {
    try {
      $this->sql = "SELECT * FROM teacher_level tl JOIN level l ON l.id = tl.level_id WHERE tl.teacher_id=:id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':id', $id);
      $this->stmt->execute();
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }
}
