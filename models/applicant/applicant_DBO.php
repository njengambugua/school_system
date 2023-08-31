<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('../../DB.php');

// session_start();
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
            $studentQuery = "INSERT INTO applicant(Name, Age, Gender, Level) VALUES(:Name, :Age, :Gender, :Level)";
            $stmt = $this->conn->prepare($studentQuery);
            $stmt->bindParam(':Name', $obj->Name);
            $stmt->bindParam(':Age', $obj->Age);
            $stmt->bindParam(':Gender', $obj->Gender);
            $stmt->bindParam(':Level', $obj->Level);

            $stmt->execute();
            $this->lastInsertId = $this->conn->lastInsertId();
            $_SESSION['applicant_id'] = $this->lastInsertId;
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
            } else {
                $query = "SELECT * FROM applicant";
                $res = $this->conn->query($query);
                return $res;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

    function update($id, $data)
    {
        try {

            $query = "UPDATE applicant SET Name = :name, Age = :age, Gender = :gender, Level = :level WHERE id = :id";
            echo "<br>$query<br>";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':name', $data->Name);
            $stmt->bindParam(':age', $data->Age);
            $stmt->bindParam(':gender', $data->Gender);
            $stmt->bindParam(':level', $data->Level);
            $stmt->bindParam(':id', $id);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }


    function delete($id)
    {
        try {
            $query = "DELETE FROM applicant WHERE id = :id";
            $statement = $this->conn->prepare($query);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>