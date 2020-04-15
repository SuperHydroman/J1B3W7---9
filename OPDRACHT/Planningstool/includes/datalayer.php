<?php

function databaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "planningstool";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Connected successfully to <b>$dbName</b>";
        return $conn;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }

}

/* GAMES */

function getGames() {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM games';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function getSpecificGame($id) {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM games WHERE id=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

?>