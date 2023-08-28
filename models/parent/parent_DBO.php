<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../DB.php';

class ParentDBO
{
    // Public Connection
    public $query;
    public $execure;

    private $conn;
    private $lastInsertId;

    public function __construct()
    {
        $db = new DatabaseConnection();
        $this->conn = $db->getConnection();
    }
    function insert($obj)
    {
        try {
            $query = "INSERT INTO parent(Parent_Name, Parent_Gender, Occupation, Relationship, Contact, Email, Location, Religion, applicant_id)
            VALUES(:Name, :Gender, :Occupation, :Relationship, :Contact, :Email, :Location, :Religion, :applicant_id)";
            // echo "<br>".$query;
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":Name", $obj->name);
            $stmt->bindParam(":Gender", $obj->gender);
            $stmt->bindParam(":Occupation", $obj->occupation);
            $stmt->bindParam(":Contact", $obj->contact);
            $stmt->bindParam(":Email", $obj->email);
            $stmt->bindParam(":Religion", $obj->religion);
            $stmt->bindParam(":Relationship", $obj->relationship);
            $stmt->bindParam(":Location", $obj->location);
            $stmt->bindParam(":applicant_id", $_SESSION['applicant_id']);

            $stmt->execute();
            $this->lastInsertId = $this->conn->lastInsertId();
            $_SESSION['parentId'] = $this->lastInsertId;
            return true;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function select($id)
    {
        try {
            if (isset($id)) {
                $selectQuery = "SELECT * FROM parent WHERE applicant_id=:id";
                $stmt = $this->conn->prepare($selectQuery);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
                $selectResults = $stmt->fetch(PDO::FETCH_OBJ);

                return $selectResults;
            } else {
                $selectQuery = "SELECT * FROM parent";
                $stmt = $this->conn->query($selectQuery);
                $stmt->execute();
                $selectResults = $stmt->fetchAll(PDO::FETCH_OBJ);

                return $selectResults;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    function edit($obj, $id) {
        echo "<br>DBO called";

        $updateCmd =
        "UPDATE parent
        SET Name = :name, Gender = :gender, Occupation = :occupation, Relationship = :relationship, Contact = :contact, Email = :email, Location = :location, Religion = :religion, applicant_id = :applicantId
        WHERE id = :id
        ";
        $stmt = $this->conn->prepare($updateCmd);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $obj->Name);
        $stmt->bindParam(':gender', $obj->Gender);
        $stmt->bindParam(':occupation', $obj->Occupation);
        $stmt->bindParam(':relationship', $obj->Relationship);
        $stmt->bindParam(':contact', $obj->Contact);
        $stmt->bindParam(':email', $obj->Email);
        $stmt->bindParam(':location', $obj->Location);
        $stmt->bindParam(':religion', $obj->Religion);
        $stmt->bindParam(':applicantId', $obj->applicant_id);

        $stmt->execute();
        echo "<br>Done";
    }

    function join_applicant_parent($id, $status)
    {


        if ($status == 1) {
            $query = "SELECT * FROM parent JOIN applicant ON applicant.id = parent.applicant_id JOIN students ON students.applicant_id = applicant.id where parent.applicant_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->execute();

            $results = $stmt->fetch(PDO::FETCH_OBJ);
            if ($results) {
                return $results;
            } else {
                return false;
            }
        } else {
            $query = "SELECT * FROM parent JOIN applicant ON applicant.id = parent.applicant_id where parent.applicant_id = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam("id", $id);
            $stmt->execute();

            $results = $stmt->fetch(PDO::FETCH_OBJ);
            if ($results) {
                return $results;
            } else {
                return false;
            }
        }
    }
}
