<?php

include("timetable_DBO.php");
class teacherClass
{
    private $obj;

    function __construct()
    {
        $this->obj = new teacherDBO;
    }

    public function retrieve()
    {
        return $this->obj->read();
    }
}
