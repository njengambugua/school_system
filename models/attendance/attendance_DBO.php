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
            if ($obj->action == 'Get All') {
                $query = 'SELECT sc.schedule_id, COUNT(*) as total_lessons, lv.level, st.regno, sj.subjectName, app.Name
                 FROM attendance at JOIN schedule sc ON at.lession_id = sc.schedule_id 
                 JOIN level lv ON lv.id = sc.level_id JOIN students st ON st.id = at.student_id 
                 JOIN subjects sj ON sj.id = sc.subject_id JOIN applicant app ON app.id = st.applicant_id 
                 WHERE lv.level = :level GROUP BY sc.schedule_id, st.regno, app.Name';

                $this->stmt = $this->conn->prepare($query);
                $this->stmt->bindParam(':level', $obj->level);
            } else {

                $query = "SELECT s.id, s.subjectName, COUNT(a.lession_id) as lesson_attend, t.total_lessons
                FROM subjects s
                LEFT JOIN schedule sc ON s.id = sc.subject_id
                LEFT JOIN (
                  SELECT subject_id, COUNT(*) * 12 AS total_lessons
                  FROM schedule
                  WHERE level_id = (SELECT l.id FROM students s JOIN applicant app ON s.applicant_id = app.id JOIN level l ON app.Level = l.level WHERE s.regno = :regno)
                  GROUP BY subject_id
                ) t ON t.subject_id = s.id
                LEFT JOIN attendance a ON sc.schedule_id = a.lession_id AND a.student_id = (SELECT s.id FROM students s LEFT JOIN applicant a ON a.id = s.applicant_id WHERE s.regno = :regno)
                GROUP BY s.id, s.subjectName, t.total_lessons";

                $this->stmt = $this->conn->prepare($query);
                // $this->stmt->bindParam(':id', $obj->id);
                // $this->stmt->bindParam(':level', $obj->level);
                $this->stmt->bindParam(':regno', $obj->regno);
            }

            $this->stmt->execute();
            $this->data = $this->stmt->fetchAll(PDO::FETCH_OBJ);

            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }

    function studentTotalAttendance($obj)
    {
        try {
            $this->query = 'SELECT COUNT(*) as total_lessons FROM attendance where student_id = :student_id GROUP BY student_id';
            $this->stmt = $this->conn->prepare($this->query);
            $this->stmt->bindParam("student_id", $obj->id);
            $this->stmt->execute();
            $this->data = $this->stmt->fetch(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }
}
