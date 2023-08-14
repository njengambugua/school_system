<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);


echo "<hr>parent_DBO.php has been called";

echo "<br>Applicant ID: ".$_SESSION['applicant_id'];

$obj = $_SESSION['obj'];
foreach($obj as $v){
    print_r("<br>".$v);
}

class ParentDBO {
    // Public Connection
    public $query;
    public $execure;
    
    private $conn;
    private $lastInsertId;
    
    public function __construct() {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }
    function insert($obj) {
        try {
            echo "<br>Insertion try method called";
            $applicant_id = $_SESSION['applicant_id'];
            $query = "INSERT INTO parent(Name, Gender, Occupation, Relationship, Contact, Email, Location, Religion, applicant_id)
            VALUES(:Name, :Gender, :Occupation, :Relationship, :Contact, :Email, :Location, :Religion, :applicant_id)";
            echo "<br>".$query;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":Name", $obj->name);
            $stmt->bindParam(":Gender", $obj->gender);
            $stmt->bindParam(":Occupation", $obj->occupation);
            $stmt->bindParam(":Contact", $obj->contact);
            $stmt->bindParam(":Religion", $obj->religion);
            $stmt->bindParam(":Relationship", $obj->relationship );
            $stmt->bindParam(":Location", $obj->location);

            echo "About to excecute command.<br>";
            $stmt->execute();
            echo "Excecuted command.<br>";
            $this->lastInsertId = $this->conn->lastInsertId();
            $_SESSION['parentId'] = $this->lastInsertId;
            return true;
        }
        catch (\Throwable $th) {
            echo "<br>Insertion catch method called";
            return false;
        }
    }
}
echo "<br>parent_DB0.php has ended";
?>