<?php
include('bank_DBO.php');

class Bank
{
  public $data;
  public $error;
  public $numRows;
  public $bankObj;
  public $lastInsertId;
  public $obj;

  public function __construct()
  {
    $this->bankObj = new Bank_DBO;
  }

  function setObj($obj)
  {
    $this->obj = new stdClass;
    $this->obj->bank_name = $obj->bank_name;
    $this->obj->bank_paybill = $obj->bank_paybill;
  }

  function getObj()
  {
    return $this->obj;
  }

  function create($obj)
  {
    $this->setObj($obj);
    $this->getObj();
    if ($this->bankObj->insert($obj)) {
      $this->lastInsertId = $this->bankObj->lastInsertId;
      return true;
    } else {
      $this->error = $this->bankObj->error;
      return false;
    }
  }

  function retrieve(){
    if ($this->bankObj->select()) {
      $this->data = $this->bankObj->res;
      $this->numRows = $this->bankObj->numRows;
      return true;
    } else {
      $this->error = $this->bankObj->error;
      return false;
    }
  }
}
