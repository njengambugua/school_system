<?php
echo "parent_class.php has been called.";

error_reporting(E_ALL);
ini_set("display_errors", 1);

echo "<br>Calling parent_DBO.php.";
include('parent_DBO.php');
echo "<br>parent_class.php continiation";

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
        echo "<br>About to call Insert";
        if ($parent->insert($this)) {
            echo "Parent added successfully";
            return true;
        }
        else {
            echo "An error occured.";
            return false;
        }
    }
}

?>