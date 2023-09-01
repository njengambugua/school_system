<?php

include('exams_DBO.php');
class exams
{
  public $question;
  public $answer1;
  public $answer2;
  public $answer3;
  public $answer4;
  public $level;
  public $correct_answer;

  function __construct()
  {
  }

  function create($obj)
  {
    $this->question = $obj->question;
    $this->answer1 = $obj->answer1;
    $this->answer2 = $obj->answer2;
    $this->answer3 = $obj->answer3;
    $this->answer4 = $obj->answer4;
    $this->level = $obj->level;
    $this->correct_answer = $obj->correct_answer;
    $exams = new exams_DBO();
    if ($exams->insert($this)) {
      return true;
    } else {
      return false;
    }
  }

  function retrieve($level)
  {
    $exams = new exams_DBO();
    $data = $exams->select($level);
    if ($data) {
      return $data;
    } else {
      return false;
    }
  }
}
