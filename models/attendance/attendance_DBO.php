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




    function select($obj)
    {
        try {

            $query = "SELECT s.id, s.subjectName, COUNT(a.lession_id) as lesson_attend, t.total_lessons, t.level
FROM subjects s
LEFT JOIN schedule sc ON s.id = sc.subject_id
LEFT JOIN (
  SELECT subject_id, COUNT(*) * 12 AS total_lessons, l.level as level
  FROM schedule sch LEFT JOIN level l ON l.id = sch.level_id
  WHERE l.level = :level
  GROUP BY subject_id
) t ON t.subject_id = s.id
LEFT JOIN attendance a ON sc.schedule_id = a.lession_id AND a.student_id = :id
GROUP BY s.id, s.subjectName, t.total_lessons
LIMIT 100;
";

            $this->stmt = $this->conn->prepare($query);
            $this->stmt->bindParam(':id', $obj->id);
            $this->stmt->bindParam(':level', $obj->level);
            $this->stmt->execute();
            $this->data = $this->stmt->fetchAll(PDO::FETCH_OBJ);

            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }
}
