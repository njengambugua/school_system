<?php
// These are the credentials you'll use to connect to your database
$server_name = "localhost";
$mysql_user = "username";
$password = "password";
$databases_we_are_using = "database";

try {
    $connection = new PDO("mysql:host=$server_name;dbname=$databases_we_are_using", $mysql_user, $password);

    // Set PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // You are now connected to the database!
    // echo "<br>Connected successfully!<br>";
} catch (PDOException $e) {
    // If there is an error, handle it here
    echo "Connection failed: " . $e->getMessage();
    die();
}

?>