<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include('attendance_DBO.php');


class attendance
{
    public $attendanceDBOInstance;
    public $data;
    public $error;

    public function __construct()
    {
        $this->attendanceDBOInstance = new AttendanceDBO();
    }


    public function create($obj)
    {

        if (!$this->attendanceDBOInstance->insert($obj)) {
            $this->error = $this->attendanceDBOInstance->error;
            return false;
        } else {
            return true;
        }
    }



    function retrieve($obj)
    {

        if ($this->attendanceDBOInstance->select($obj)) {
            $this->data = $this->attendanceDBOInstance->data;
            return true;
        } else {
            $this->error = $this->attendanceDBOInstance->error;
            return false;
        }
    }

    function retrieveStudentAttendance($obj)
    {
        if ($this->attendanceDBOInstance->studentTotalAttendance($obj)) {
            $this->data = $this->attendanceDBOInstance->data;
            return true;
        } else {
            $this->error = $this->attendanceDBOInstance->error;
            return false;
        }
    }
}
