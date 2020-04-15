<?php

function databaseConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbName = "j1b3w4-5";

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

/* CHARACTERS */

function retrieveCharacters($type, $order) {
    $dbConn = databaseConnection();
        $sql = 'SELECT * FROM characters ORDER BY ' . $type . ' ' . $order . ' ';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function retrieveSpecificCharacter($id) {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM characters WHERE id=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

/* AMOUNTS */

function getCharAmount() {
    $dbConn = databaseConnection();
    $sql = 'SELECT COUNT(id) AS AMOUNT FROM characters';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

/* LOCATIONS */

function getLocationAmount() {
    $dbConn = databaseConnection();
    $sql = 'SELECT COUNT(id) AS AMOUNT FROM locations';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

function getLocations() {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM locations';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function updateLocation($id, $charID) {
    $dbConn = databaseConnection();
    $sql = 'UPDATE `characters` SET `location` = (SELECT id FROM locations WHERE id=:id) WHERE id=:charID';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(':charID', $charID);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();;
    $dbConn = null;
    return $result;
}

function addLocation($name) {
    $dbConn = databaseConnection();
    $sql = 'INSERT INTO `locations` (`name`) VALUES ("'.$name.'")';
    $stmt = $dbConn->prepare($sql);
    $result = $stmt->execute();
    $dbConn = null;
    return $result;
}

function deleteLocation($id) {
    $dbConn = databaseConnection();
    $sql = 'DELETE FROM `locations` WHERE id=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $result = $stmt->execute();
    $dbConn = null;
    return $result;
}

?>