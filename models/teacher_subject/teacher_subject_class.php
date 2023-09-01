<?php
include('teacher_subject_DBO.php');

class Teacher_subject
{
  public $teacher_subjectObj;
  public $error;
  public $lastInsertId;
  public $data;
  public $numRows;
  public $obj;

  public function __construct()
  {
    $this->teacher_subjectObj = new Teacher_subject_DBO;
  }

  public function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->teacher_id = $obj->teacher_id;
    $this->obj->subject_id = $obj->subject_id;
    $this->obj->level_id = $obj->level_id;
  }

  public function getObj()
  {
    return $this->obj;
  }

  public function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->teacher_subjectObj->insert($obj)) {
      $this->lastInsertId = $this->teacher_subjectObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->teacher_subjectObj->error;
      return false;
    }
  }

  public function retrieve($id)
  {
    if ($this->teacher_subjectObj->select($id)) {
      $this->data = $this->teacher_subjectObj->res;
      $this->numRows = $this->teacher_subjectObj->numRows;
      return true;
    } else {
      $this->error = $this->teacher_subjectObj->error;
      return false;
    }
  }
}