<?php
include('level_DBO.php');

class Level
{
  public $data;
  public $error;
  public $numRows;
  public $levelObj;
  public $lastInsertId;
  public $obj;

  public function __construct()
  {
    $this->levelObj = new level_DBO;
  }

  function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->level = $obj->level;
  }

  function getObj()
  {
    return $this->obj;
  }

  function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->levelObj->insert($obj)) {
      $this->lastInsertId = $this->levelObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->levelObj->error;
      return false;
    }
  }

  function retrieve()
  {
    if ($this->levelObj->select()) {
      $this->data = $this->levelObj->res;
      $this->numRows = $this->levelObj->numRows;
      return true;
    } else {
      $this->error = $this->levelObj->error;
      return false;
    }
  }
}
