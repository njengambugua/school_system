<?php
include('../../DB.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

class AttendanceDBO
{
    public $conn;
    public $data;
    public $query;
    public $error;
    public $stmt;
    public $obj;
    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }


    public function insert($obj)
    {
        $success = true;
        foreach ($obj as $student) {
            try {
                $this->query = "INSERT INTO attendance(lession_id, student_id)VALUES(:lesson_id, :student_id)";

                $this->stmt = $this->conn->prepare($this->query);
                $this->stmt->bindParam('lesson_id', $student->lesson_id);
                $this->stmt->bindParam('student_id', $student->student_id);
                $this->stmt->execute();
                $success = true;
            } catch (PDOException $th) {
                $this->error = $th->getMessage();
                $success = false;
            }
        }

        if ($success) {
            return true;
        } else {
            return false;
        }
    }
}
