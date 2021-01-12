<?php
// ADMIN FUNCTIONS
function getAdminById($id) {
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
    return $result[0];
}

function getAdminByEmail($email) {
    include("connection.php");
    $query = "SELECT * FROM admins WHERE email = :email";
    $query_params = array(':email'=> $email);
    try{
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
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
