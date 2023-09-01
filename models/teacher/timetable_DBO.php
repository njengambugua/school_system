<?php
session_start();
include("../../DB.php");
// Retrieving the rest of the data

class teacherDBO{
    
    private $conn;
    private $day;
    
    public function __construct(){
        $db = new DatabaseConnection;
        $this->conn = $db->getConnection();
    }
    
    function read() {
        // Assuming the teacher's ID
        $_SESSION['teacher_id'] = 1;
            
        $day = 'Monday';
        // $day = 'Tuesday';
        // $day = 'Wednesday';
        // $day = 'Thursday';
        // $day = 'Friday';

        $retrieveAllData = "SELECT * FROM timetable WHERE teacher = ".$_SESSION['teacher_id'];
        // $retrieveAllData = "SELECT * FROM timetable WHERE day = '$day' and teacher = ".$_SESSION['teacher_id'];
        // $retrieveAllData = "SELECT * FROM timetable WHERE day = '$day' and class = 'Grade 1'";

        $dataResults = $this->conn->query($retrieveAllData);
        return $dataResults;
    }
}
?>