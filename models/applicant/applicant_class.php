<?php
// include("./applicant_DBO.php");
include('applicant_DBO.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);

class applicant
{
    public $Name;
    public $Age;
    public $Gender;
    public $Level;

    function __construct($obj)
    {
        print_r($obj);
        $this->validate($obj);
        $this->Name = $obj->Name;
        $this->Age = $obj->Age;
        $this->Gender = $obj->Gender;
        $this->Level = $obj->Level;
    }


    function validate($obj)
    {
        // check for empty fields
        foreach (get_object_vars($obj) as $key => $value) {
            if ($key == 'Name') {
                if (empty($value)) {
                    throw new Exception("Error Key Name is empty", 1);
                }
                if (preg_match('/[0-9]/', $value)) {
                    throw new Exception("Error key Name has a number", 1);
                }
            }
            if ($key == 'Age') {
                if (empty($value)) {
                    throw new Exception("Error Key Age is empty", 1);
                }
            }
        }
    }

    function create()
    {
        $applicant = new applicant_DBO();
        if ($applicant->insert($this)) {
            return true;
        } else {
            return false;
        }
    }

    function retrieve($id)
    {
        $applicant = new applicant_DBO();
        $data = $applicant->select($id);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
}
