<?php
error_reporting(E_ALL);
ini_set('report_errors', 1);

include('../../DB.php');

class SubjectsDBO
{
    public $query;
    public $stmt;
    public $numrows;
    public $data;
    public $conn;
    public $error;

    public $success;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    public function insert($obj)
    {
        if (isset($obj->studentId)) {
            $this->success = true;

            foreach ($obj as $key => $value) {
                if ($key !== 'studentId' && $key !== 'regno' && $key !== 'level') {
                    $this->query = "INSERT INTO student_subject(student_id, subject_id) VALUES ($obj->studentId, $value)";

                    if ($this->conn->query($this->query) !== TRUE) {
                        $success = false;
                        $this->error = "Failed to insert units for one or more subjects";
                    }
                }
            }

            return $this->success;
        }
    }
}
