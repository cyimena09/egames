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
    return $result[0];
}

function getPlayersByTeamId($id) {
    include("connection.php");
    $query = "SELECT p.id, p.firstName, p.lastName, p.pseudo, p.birthDate, t.name as teamName FROM players p
                INNER JOIN teams t ON t.id = p.FK_team 
                WHERE p.FK_Team = :id ";
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

// TEAM FUNCTIONS
function getTeams() {
    include("connection.php");
    $query = "SELECT DISTINCT t.id, t.name as teamName, g.name as game
                FROM teams t
                INNER JOIN participations p ON p.FK_Team = t.id
                INNER JOIN games g ON g.id = p.FK_Game";
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

function getTeamById($id) {
    include("connection.php");
    $query = "SELECT DISTINCT t.id, t.name as teamName, g.name as game
                FROM teams t
                INNER JOIN participations p ON p.FK_Team = t.id
                INNER JOIN games g ON g.id = p.FK_Game
                WHERE t.id = :id";
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
