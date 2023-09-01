<?php
include('fee_DBO.php');
class Fee
{
  public $feeObj;
  public $error;
  public $numRows;
  public $data;
  public $lastInsertId;
  public $obj;
  public $blue;

  public function __construct()
  {
    $this->feeObj = new Fee_DBO;
  }

  public function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->amount = $obj->amount;
    $this->obj->grade = $obj->grade;
  }

  public function getObj()
  {
    return $this->obj;
  }

  public function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->feeObj->insert($obj)) {
      $this->lastInsertId = $this->feeObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->feeObj->error;
      return false;
    }
  }

  function retrieve()
  {
    if ($this->feeObj->select()) {
      $this->data = $this->feeObj->res;
      $this->numRows = $this->feeObj->numRows;
      return true;
    } else {
      $this->error = $this->feeObj->error;
      return false;
    }
  }

  function retrieveByLevel($level)
  {
    if ($this->feeObj->selectbyLevel($level)) {
      $this->blue = $this->feeObj->res;
      $this->numRows = $this->feeObj->numRows;
      return true;
    } else {
      $this->error = $this->feeObj->error;
      return false;
    }
  }

  function edit($obj, $id)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->feeObj->update($obj, $id)) {
      return true;
    } else {
      $this->error = $this->feeObj->error;
      return false;
    }
  }
}
