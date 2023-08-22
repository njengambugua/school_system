<?php
include('../../DB.php');
class teacherDBO
{
  private $conn;
  public $stmt;
  public $sql;
  public $lastInsertId;
  public $res;
  public $error;
  public $numRows;

  public function __construct()
  {
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  function insert($obj)
  {
    try {
      $this->sql = "INSERT INTO teachers(name)VALUES(:name)";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':name', $obj->name);
      $this->stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function select($obj)
  {
    try {
      $this->sql = "SELECT * FROM teachers t JOIN teacher_subjects ts ON t.id=ts.teacher_id JOIN subjects s ON s.id=ts.subject_id JOIN teacher_level tl ON tl.teacher_id = t.id JOIN level l ON l.id = tl.level_id WHERE staff_no=:staff_no AND password=:password";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam(':staff_no', $obj->regno);
      $this->stmt->bindParam(':password', $obj->password);
      $this->stmt->execute();
      $this->res = $this->stmt->fetch(PDO::FETCH_OBJ);
      $this->numRows = $this->stmt->rowCount();
      return true;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      return false;
    }
  }

  function selectLevel($id)
  {
    try {
      $this->sql = "SELECT l.level FROM teachers t JOIN teacher_level tl ON t.id = tl.teacher_id JOIN level l ON l.id = tl.level_id WHERE t.id = :id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam("id", $id);
      $this->stmt->execute();
      $this->numRows = $this->stmt->rowCount();
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);

      return true;
    } catch (PDOException $th) {
      $this->error = $th->getMessage();
      return false;
    }
  }


  function selectSubject($id)
  {
    try {
      $this->sql = "SELECT s.subjectName FROM teachers t JOIN teacher_subjects ts ON t.id = ts.teacher_id JOIN subjects s ON s.id = ts.subject_id WHERE t.id = :id";
      $this->stmt = $this->conn->prepare($this->sql);
      $this->stmt->bindParam("id", $id);
      $this->stmt->execute();
      $this->numRows = $this->stmt->rowCount();
      $this->res = $this->stmt->fetchAll(PDO::FETCH_OBJ);

      return true;
    } catch (PDOException $th) {
      $this->error = $th->getMessage();
      return false;
    }
  }
}
