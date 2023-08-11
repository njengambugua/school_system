<?php
include("../../DB.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

class applicant_DBO
{
    public $query;
    public  $execute;
    // public $connection;

    private $conn;
    public $lastInsertId;
    
    public function __construct()
    {
        
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }

    function insert($obj)
    {
        try {
            $query = "INSERT INTO applicant(Name, Age, Gender, Level) VALUES(:Name, :Age, :Gender, :Level)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':Name', $obj->Name);
            $stmt->bindParam(':Age', $obj->Age);
            $stmt->bindParam(':Gender', $obj->Gender);
            $stmt->bindParam(':Level', $obj->Level);
            
            $stmt->execute();
            $this->lastInsertId = $this->conn->lastInsertId();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    function select($id)
    {
        try {
            if (isset($id)) {
                $query = "SELECT * FROM applicant WHERE id=:id";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    
                return $res;
            } else{
                $query="SELECT * FROM applicant";
                $res = $this->conn->query($query);
                return $res;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}
