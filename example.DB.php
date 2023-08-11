<?php
class DatabaseConnection
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->username = '';
        $this->password = '';
        $this->dbname = '';

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function closeConnection()
    {
        $this->conn = null;
    }
}
