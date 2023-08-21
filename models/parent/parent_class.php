<?php
include('parent_DBO.php');

class parent7 {
    public $name;
    public $gender;
    public $occupation;
    public $contact;
    public $email;
    public $religion;
    public $relationship;
    public $location;

    function __construct($obj) {
        $this->name = $obj->parentName;
        $this->gender = $obj->parentGender;
        $this->occupation = $obj->parentOccupation;
        $this->contact = $obj->parentContact;
        $this->email = $obj->parentEmail;
        $this->religion = $obj->parentReligion;
        $this->relationship = $obj->parentRelationship;
        $this->location = $obj->parentLocation;
    }

    function create() {
        $parent = new ParentDBO();
        if ($parent->insert($this)) {
            return true;
        }
        else {
            return false;
        }
    }

    function retrieve($id) {
        $parent = new ParentDBO;
        $data = $parent->select($id);
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }
    
    function remove($obj) {
        $rmParent = new ParentDBO;
        $rmParent->delete($obj->id);
    }
}
?>