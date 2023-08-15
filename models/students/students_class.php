<?php
include('students_DBO.php');
class students{
  public $regno;
  public $applicant_id;

  public function create($obj){
    $this->regno = $obj->regno;
    $this->applicant_id = $obj->applicant_id;
    $students = new students_DBO;
    if ($students->insert($obj)) {
      return true;
    } else{
      return false;
    }
  }

  public function retrieve($id) {
    $students = new students_DBO;
    $data = $students->select($id);
    if($data){
      return $data;
    } else{
      return false;
    }
  }

  public function remove($id){
    $students=new students_DBO;
    if ($students->delete($id)) {
      return true;
    } else {
      return false;
    }
    
  }
}