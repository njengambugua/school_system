<?php
include('../../DB.php');

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
            $query = "INSERT INTO parent(Name, Gender, Occupation, Relationship, Contact, Email, Location, Religion, applicant_id)
            VALUES(:Name, :Gender, :Occupation, :Relationship, :Contact, :Email, :Location, :Religion, :applicant_id)";
            // echo "<br>".$query;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":Name", $obj->name);
            $stmt->bindParam(":Gender", $obj->gender);
            $stmt->bindParam(":Occupation", $obj->occupation);
            $stmt->bindParam(":Contact", $obj->contact);
            $stmt->bindParam(":Email", $obj->email);
            $stmt->bindParam(":Religion", $obj->religion);
            $stmt->bindParam(":Relationship", $obj->relationship );
            $stmt->bindParam(":Location", $obj->location);
            $stmt->bindParam(":applicant_id", $_SESSION['applicant_id']);

            $stmt->execute();
            $this->lastInsertId = $this->conn->lastInsertId();
            $_SESSION['parentId'] = $this->lastInsertId;
            return true;
        }
        catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }

    function select($id) {
        try{
            if(isset($id)) {
                $selectQuery = "SELECT * FROM parent WHERE id=:id";
                $stmt = $this->conn->prepare($selectQuery);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $selectResults = $stmt->fetch(PDO::FETCH_OBJ);

                return $selectResults;
            }
            else{
                $selectQuery = "SELECT * FROM parent";
                $stmt = $this->conn->query($selectQuery);
                $stmt->execute();
                $selectResults = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $selectResults;
            }
        }
        catch(\Throwable $th) {
            throw $th;
            return false;
        }
    }

}
?>