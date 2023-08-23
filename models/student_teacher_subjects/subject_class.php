<?php
include("subject_DBO.php");

class subject
{

    public $subjectDBO;
    public $error;

    public function __construct()
    {
        $this->subjectDBO = new SubjectsDBO();
    }


    public function create($obj)
    {
        $this->subjectDBO->insert($obj);
        if ($this->subjectDBO->success) {
            return true;
        } else {
            $this->error = $this->subjectDBO->error;
            return false;
        }
    }
}
