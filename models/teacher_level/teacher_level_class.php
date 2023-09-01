<?php
include('teacher_level_DBO.php');

class Teacher_level
{
  public $data;
  public $error;
  public $lastInsertId;
  public $obj;
  public $teacher_levelObj;

  public function __construct()
  {
    $this->teacher_levelObj = new Teacher_level_DBO;
  }

  public function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->teacher_id = $obj->teacher_id;
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
    if ($this->teacher_levelObj->insert($obj)) {
      $this->lastInsertId = $this->teacher_levelObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->teacher_levelObj->error;
      return false;
    }
  }

  public function retrieve($id)
  {
    if ($this->teacher_levelObj->select($id)) {
      $this->data = $this->teacher_levelObj->res;
      return true;
    } else {
      $this->error = $this->teacher_levelObj->error;
      return false;
    }
  }
}
