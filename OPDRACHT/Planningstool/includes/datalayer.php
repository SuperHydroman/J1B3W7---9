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

function addGame($players, $explainer, $time, $gameID) {
    $dbConn = databaseConnection();
    $sql = 'INSERT INTO gamesPlanned (`players`, `explainer`, `time`, `gameID`) VALUES (:players, :explainer, :time, :gameID)';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(":players", $players);
    $stmt->bindParam(":explainer", $explainer);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":gameID", $gameID);
    $stmt->execute();
    $dbConn = null;
}

function updateGame($players, $explainer, $time, $gameID, $id) {
    $dbConn = databaseConnection();
    $sql = 'UPDATE `gamesplanned` SET `players`=:players,`explainer`=:explainer,`time`=:time WHERE `gameID`=:gameID AND `id`=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(":players", $players);
    $stmt->bindParam(":explainer", $explainer);
    $stmt->bindParam(":time", $time);
    $stmt->bindParam(":gameID", $gameID);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn = null;
}

function deleteGame($id) {
    $dbConn = databaseConnection();
    $sql = 'DELETE FROM `gamesplanned` WHERE id=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $dbConn = null;
}

function getPlannedGames() {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM gamesPlanned ORDER BY time ASC';
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $dbConn = null;
    return $result;
}

function getSpecificPlannedGame($id) {
    $dbConn = databaseConnection();
    $sql = 'SELECT * FROM gamesPlanned WHERE gameID=:id';
    $stmt = $dbConn->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $result = $stmt->fetch();
    $dbConn = null;
    return $result;
}

?>