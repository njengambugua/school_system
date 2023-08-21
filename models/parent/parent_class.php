<?php
include('parent_DBO.php');

class parent7
{
    public $name;
    public $gender;
    public $occupation;
    public $contact;
    public $email;
    public $religion;
    public $relationship;
    public $location;

    function __construct()
    {
    }

    function create($obj)
    {
        $this->name = $obj->parentName;
        $this->gender = $obj->parentGender;
        $this->occupation = $obj->parentOccupation;
        $this->contact = $obj->parentContact;
        $this->email = $obj->parentEmail;
        $this->religion = $obj->parentReligion;
        $this->relationship = $obj->parentRelationship;
        $this->location = $obj->parentLocation;
        $parent = new ParentDBO();
        if ($parent->insert($this)) {
            return true;
        } else {
            return false;
        }
    }

    function retrieve($id)
    {
        $parent = new ParentDBO;
        $data = $parent->select($id);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    function applicant_parent($id,$status)
    {
        $parent = new ParentDBO;
        $data = $parent->join_applicant_parent($id,$status);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
}
