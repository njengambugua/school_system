<?php
include('../../DB.php');
class teacherDBO{
  private $conn;
  public $stmt;
  public $sql;
  public $lastInsertId;

  public function __construct(){
    $db = new DatabaseConnection;
    $this->conn = $db->getConnection();
  }

  function insert($obj){
    $this->sql = "INSERT INTO teachers(name)VALUES(:name)";
    $this->stmt = $this->conn->prepare($this->sql);
    $this->stmt->bindParam(':name', $obj->name);
    $this->stmt->execute();
    $this->lastInsertId = $this->conn->lastInsertId();
  }
}