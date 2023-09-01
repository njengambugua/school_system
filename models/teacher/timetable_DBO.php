<?php
session_start();
include("../../DB.php");

class teacherDBO
{

    private $conn;
    private $day;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }

    function read()
    {
        $_SESSION['teacher_id'] = 1;

        $day = 'Monday';

        $retrieveAllData = "SELECT * FROM timetable WHERE teacher = " . $_SESSION['teacher_id'];

        $dataResults = $this->conn->query($retrieveAllData);
        return $dataResults;
    }
}
