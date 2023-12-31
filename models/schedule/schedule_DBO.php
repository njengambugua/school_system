<?php
include("../../DB.php");
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

class scheduleDBO
{
    public $conn;
    public $sql;
    public $query;
    public $stmt;
    public $data;
    public $error;


    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    public function insert($obj)
    {
        $this->sql = "SELECT s.id AS subject_id, t.name as teacher_name, l.id as level_id, s.subjectName as subject, t.id as teacher_id FROM teachers t JOIN teacher_subjects ts ON ts.teacher_id = t.id JOIN teacher_level tl ON tl.teacher_id = t.id JOIN subjects s ON s.id = ts.subject_id JOIN level l ON l.id = tl.level_id";
        $data = $this->conn->query($this->sql);
        $res = $data->fetchAll(PDO::FETCH_OBJ);

        $timetable = [];
        for ($day = 1; $day <= 5; $day++) {

            $assignedSubjects = [];

            $classTimes = [];
            foreach ($obj as $key => $value) {
                shuffle($res);
                $time = $value;

                foreach ($res as $teacher) {
                    $subject = $teacher->subject;
                    $teacher_name = $teacher->teacher_name;
                    $teacher_id = $teacher->teacher_id;
                    $level_id = $teacher->level_id;
                    $subject_id = $teacher->subject_id;

                    $teacherAvailability = true;
                    $assignmentKey = "{$level_id}_{$subject_id}";
                    $time_key = "{$level_id}-{$time}";

                    if (!isset($classTimes[$time_key])) {
                        if (!isset($assignedSubjects[$assignmentKey])) {
                            foreach ($timetable as $lesson) {
                                if ($lesson->day_of_week == 'Day' . $day && $lesson->time == $value && $lesson->teacher_id == $teacher_id) {
                                    $teacherAvailability = false;
                                }
                            }
                            if ($teacherAvailability) {
                                $lessonObj = new stdClass;
                                $lessonObj->subject = $subject;
                                $lessonObj->teacher_name = $teacher_name;
                                $lessonObj->teacher_id = $teacher_id;
                                $lessonObj->level_id = $level_id;
                                $lessonObj->time = $value;
                                $lessonObj->day_of_week = 'Day' . $day;
                                $lessonObj->subject_id = $subject_id;


                                $classTimes[$time_key] = true;
                                $assignedSubjects[$assignmentKey] = true;
                                array_push($timetable, $lessonObj);
                            }
                        }
                    }
                }
            }
        }

        // print_r($classTimes);
        //   ===
        $truncate = "DELETE FROM schedule";
        if ($this->conn->query($truncate)) {
            if (!empty($timetable)) {
                foreach ($timetable as $time) {

                    $this->query = "INSERT INTO schedule(subject_id, teacher_id, day_of_week, time, level_id, teacher_name) 
                            VALUES(:subject_id, :teacher_id, :day_of_week, :time, :level_id, :teacher_name)";

                    $this->stmt = $this->conn->prepare($this->query);

                    $this->stmt->bindParam(':subject_id', $time->subject_id);
                    $this->stmt->bindParam(':teacher_id', $time->teacher_id);
                    $this->stmt->bindParam(':day_of_week', $time->day_of_week);
                    $this->stmt->bindParam(':time', $time->time);
                    $this->stmt->bindParam(':level_id', $time->level_id);
                    $this->stmt->bindParam(':teacher_name', $time->teacher_name);
                    $this->stmt->execute();
                    // if ($this->stmt->execute()) {
                    //     echo "Time table completed";
                    // } else {
                    //     echo "Failed to generate time table: " . implode(" ", $this->stmt->errorInfo());
                    // }
                    // }

                }
            }
        }
    }

    public function select()
    {

        try {
            $sql = 'SELECT * FROM schedule sc JOIN level l ON l.id = sc.level_id JOIN subjects s ON s.id = sc.subject_id';
            $res = $this->conn->query($sql);
            $this->data = $res->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }

    public function findBy($obj)
    {
        if (isset($obj->level)) {
            try {
                $sql = 'SELECT * FROM schedule sc JOIN level l ON l.id = sc.level_id JOIN subjects s ON s.id = sc.subject_id WHERE level = :level';
                $this->stmt = $this->conn->prepare($sql);
                $this->stmt->bindParam('level', $obj->level);
                $this->stmt->execute();
                $this->data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
                return true;
            } catch (PDOException $th) {
                $this->error = $th->getMessage();
                return false;
            }
        }
    }

    public function selectByDay($obj)
    {
        try {
            $this->sql = 'SELECT * FROM schedule sc JOIN level l ON l.id = sc.level_id JOIN subjects s ON s.id = sc.subject_id WHERE level = :level AND day_of_week = :time';
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam('level', $obj->level);
            $this->stmt->bindParam('time', $obj->day);
            $this->stmt->execute();
            $this->data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }



    public function selectForTeacher($obj)
    {
        try {
            $this->sql = 'SELECT * FROM schedule sc JOIN level l ON l.id = sc.level_id JOIN subjects s ON s.id = sc.subject_id WHERE teacher_id = :teacher_id';

            if (!empty($obj->day)) {
                $this->sql .= ' AND day_of_week = :time';
                $this->stmt = $this->conn->prepare($this->sql);
                $this->stmt->bindParam('time', $obj->day);
            } else {
                $this->stmt = $this->conn->prepare($this->sql);
            }

            $this->stmt->bindParam('teacher_id', $obj->id);
            $this->stmt->execute();
            $this->data = $this->stmt->fetchAll(PDO::FETCH_OBJ);
            return true;
        } catch (PDOException $th) {
            $this->error = $th->getMessage();
            return false;
        }
    }
}
