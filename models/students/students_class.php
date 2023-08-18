<?php
include('students_DBO.php');
class students{
  public $regno;
  public $applicant_id;
  public $studentsObj;
  public $lastInsertId;
  public $error;
  public $obj;
  public $numRows;
  public $data;

  function __construct()
  {
    $this->studentsObj = new students_DBO;
    $this->error = $this->studentsObj->error;
  }

  function setObj($obj){
    $this->obj = new stdClass;
    $this->obj->id = $obj->id;
    $this->obj->regno = $obj->regno;
    $this->obj->applicant_id = $obj->applicant_id;
    $this->obj->password = $obj->password;
  }
  
  function getObj()
  {
    return $this->obj;
  }

  public function create($obj){
    $this->setObj($obj);
    $this->getObj();
    if ($this->studentsObj->insert($obj)) {
      $this->lastInsertId = $this->studentsObj->lastInsertId;
      return true;
    } else{
      $this->error = $this->studentsObj->error;
      return false;
    }
  }

  public function retrieve($obj) {
    $this->setObj($obj);
    $this->getObj();
    if ($this->studentsObj->select($obj)) {
      $this->numRows = $this->studentsObj->numRows;
      $this->data = $this->studentsObj->res;
      return true;
    } else{
      $this->error = $this->studentsObj->error;
      return false;
    }
  }

  public function remove($id){
    if ($this->studentsObj->delete($id)) {
      return true;
    } else {
      return false;
    }
    
  }
}