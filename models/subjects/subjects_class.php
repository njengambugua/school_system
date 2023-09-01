<?php
include('subjects_DBO.php');

class Subjects
{
  public $data;
  public $error;
  public $numRows;
  public $subjectsObj;
  public $lastInsertId;
  public $obj;

  public function __construct()
  {
    $this->subjectsObj = new Subjects_DBO;
  }

  function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->subject_name = $obj->subject_name;
  }

  function getObj()
  {
    return $this->obj;
  }

  function validate($obj)
  {
    foreach ($obj as $key => $value) {
      if ($key !== "action") {
        if (is_string($value)) {
          $modifiedValue = preg_replace('/\s+/', '_', $value);
          $obj->$key = $modifiedValue;
        }
      }
    }
  }

  function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    $this->validate($obj);
    if ($this->subjectsObj->insert($obj)) {
      $this->lastInsertId = $this->subjectsObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->subjectsObj->error;
      return false;
    }
  }

  function retrieve()
  {
    if ($this->subjectsObj->select()) {
      $this->data = $this->subjectsObj->res;
      $this->numRows = $this->subjectsObj->numRows;
      return true;
    } else {
      $this->error = $this->subjectsObj->error;
      return false;
    }
  }
}
