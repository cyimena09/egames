<?php
// ADMIN FUNCTIONS
function getAdmin($id) {
    include("connection.php");
    $query = "SELECT * FROM admins WHERE id = :id";
    $query_params = array(':id'=> $id);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// PLAYER FUNCTIONS
function getPlayers() {
    include("connection.php");
    $query = "SELECT * FROM players";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlayer($id) {
    include("connection.php");
    $query = "SELECT * FROM players WHERE id = :id";
    $query_params = array(':id'=> $id);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlayersByTeam() {

}

// TEAM FUNCTIONS
function getTeams() {
    include("connection.php");
    $query = "SELECT * FROM teams";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getTeam() {

}

// GAME FUNCTIONS
function getGames() {
    include("connection.php");
    $query = "SELECT * FROM games";
    $query_params = array();
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
