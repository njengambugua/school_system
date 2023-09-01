<?php
include('applicant_DBO.php');

class applicant
{
    public $Name;
    public $Age;
    public $Gender;
    public $Level;
    public $obj;
    public $applicant;

    function __construct()
    {
        $this->applicant = new applicant_DBO();
    }

    function setObj($obj)
    {
        $this->obj = new stdClass;
        $this->obj->Name = $obj->Name;
        $this->obj->Age = $obj->Age;
        $this->obj->Gender = $obj->Gender;
        $this->obj->Level = $obj->Level;
    }

    function getObj()
    {
        return $this->obj;
    }

    function validate($obj)
    {
        // check for empty fields
        foreach ($obj as $key => $value) {
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

    function create($obj)
    {
        $this->setObj($obj);
        $this->getObj();
        if ($this->validate($obj)) {
            if ($this->applicant->insert($this)) {
                return true;
            } else {
                return false;
            }
        }
    }

    function retrieve($id)
    {
        $data = $this->applicant->select($id);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    function update($obj, $id)
    {
        $this->setObj($obj);
        $this->getObj();
        try {
            $this->applicant->update($obj, $id);
        } catch (Throwable $th) {
            throw $th;
        }
    }

    function remove($id)
    {
        if ($this->applicant->delete($id)) {
            return true;
        } else {
            return false;
        }
    }
}
