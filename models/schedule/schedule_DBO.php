<?php

use GuzzleHttp\Psr7\Query;

include("../../DB.php");

class scheduleDBO
{
    public $conn;
    public $sql;


    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function create()
    {
        $lessonTimes = [
            "8:00 AM - 9:00 AM",
            "9:00 AM - 10:00 AM",
            "10:00 AM - 10:20 AM",
            "10:20 AM - 11:20 AM",
            "11:20 AM - 12:20 PM",
            "12:20 PM - 1:00 PM",
            "1:00 PM - 2:00 PM",
            "2:00 PM - 3:00 PM",
        ];
        $obj = (object)$lessonTimes;

        $this->sql = "SELECT s.id AS subject_id, t.name as teacher_name, l.level as level, s.subjectName as subject FROM teachers t JOIN teacher_subjects ts ON ts.teacher_id = t.id JOIN teacher_level tl ON tl.teacher_id = t.id JOIN subjects s ON s.id = ts.subject_id JOIN level l ON l.id = tl.level_id";
        $data = $this->conn->query($this->sql);
        $res = $data->fetchAll(PDO::FETCH_OBJ);
        print_r($res);
    }
}

$new  = new scheduleDBO();
$new->create();
