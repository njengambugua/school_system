<?php
include('../../DB.php');

$obj = $_SESSION['obj'];

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
            echo "<br>".$query;
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
        }
    }

    function select($id) {
        try{
            if(isset($id)) {
                $selectQuery = "SELECT * FROM parent WHERE id = :id";
                $stmt = $this->conn->prepare($selectQuery);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $selectResults = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $selectResults;
            }
            else{
                $selectQuery = "SELECT * FROM parent";
                $stmt = $this->conn->prepare($selectQuery);
                $stmt->execute();
                $selectResults = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $selectResults;
            }
        }
        catch(\Throwable) {
            return false;
        }
    }
    function update($id, $data) {
        try {
            foreach($data as $key => $value) {
                $updateQuery = "UPDATE parent SET $key = :value WHERE id = :id";
                $stmt = $this->conn->prepare($updateQuery);
                $stmt->bindParam(':value', $value);
                $stmt->bindParam(':id', $id);

                if ($stmt->execute()) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        catch (Throwable $th) {
            throw new Exception('Error: '.$th->getMessage());
        }
    }
    function delete($id) {
        try {
            if(isset($id)) {
                $deleteQuery = 'DELETE from parent where id=:id';
                $stmt = $this->conn->prepare($deleteQuery);
                $stmt->bindParam(':id', $id);

                if($stmt->execute()) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }
        catch (Throwable $th) {
            throw new Exception('Error: '.$th->getMessage());
        }
    }
}
echo "<h3>Parent DBO ended</h3>";
?>