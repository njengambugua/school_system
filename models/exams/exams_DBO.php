<?php
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

class exams_DBO{
  public $query;
  public  $execute;
  private $conn;
  public $lastInsertId;

  public function __construct()
  {
    $db = new DatabaseConnection();
    $this->conn = $db->getConnection();
  }

  function insert($obj) {
    try {

      $query = "INSERT INTO exams(question,answer1,answer2,answer3,answer4,level,correct_answer)VALUES(:question,:answer1,:answer2,:answer3,:answer4,:level,:correct_answer)";
      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':question', $obj->question);
      $stmt->bindParam(':answer1', $obj->answer1);
      $stmt->bindParam(':answer2', $obj->answer2);
      $stmt->bindParam(':answer3', $obj->answer3);
      $stmt->bindParam(':answer4', $obj->answer4);
      $stmt->bindParam(':level', $obj->level);
      $stmt->bindParam(':correct_answer', $obj->correct_answer);
      $stmt->execute();
      $this->lastInsertId = $this->conn->lastInsertId();
      $_SESSION['exam_id'] = $this->lastInsertId;
      return true;

    } catch (\Throwable $th) {
      return false;
    }
  }

  function select($id) {
    try {

      if (isset($id)) {
        $query = "SELECT * FROM exams WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $res;
      } else {
        $query = "SELECT * FROM exams";
        $res = $this->conn->query($query);
        return $res;
      }
      
    } catch (\Throwable $th) {
      return false;
    }
    
  }

}