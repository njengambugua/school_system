<?php
include('schedule_DBO.php');

class Schedule
{
    public $scheduleInstance;
    public $data;
    public $error;

    public function __construct()
    {
        $this->scheduleInstance = new scheduleDBO();
    }

    public function create($obj)
    {
        if ($this->scheduleInstance->insert($obj)) {
            return true;
        } else {
            $this->error = $this->scheduleInstance->error;
            return false;
        }
    }


    public function retreive()
    {

        if ($this->scheduleInstance->select()) {
            $this->data = $this->scheduleInstance->data;
            return true;
        } else {
            $this->error = $this->scheduleInstance->error;
            return false;
        }
    }

    function find($obj)
    {

        if ($this->scheduleInstance->findBy($obj)) {
            $this->data = $this->scheduleInstance->data;
            return true;
        } else {
            $this->error = $this->scheduleInstance->error;
            return false;
        }
    }

    function retreiveByDay($obj)
    {

        if ($this->scheduleInstance->selectByDay($obj)) {
            $this->data = $this->scheduleInstance->data;
            // print_r($_SESSION);
            return true;
        } else {
            $this->error = $this->scheduleInstance->error;
            return false;
        }
    }

    function retriveForTeacher($obj)
    {
        if ($this->scheduleInstance->selectForTeacher($obj)) {
            $this->data = $this->scheduleInstance->data;
            // print_r($_SESSION);
            return true;
        } else {
            $this->error = $this->scheduleInstance->error;
            return false;
        }
    }
}
