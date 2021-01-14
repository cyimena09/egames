<?php
// ADMIN FUNCTIONS
function createAdmin($admin) {
    include('connection.php');
    $admin['password'] = password_hash($admin['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO admins (firstName, lastName, email, password)
            VALUES (:firstName, :lastName, :email, :password)";
    $query_params = array(
        ':firstName' => $admin['firstName'],
        ':lastName' => $admin['lastName'],
        ':email' => $admin['email'],
        ':password' => $admin['password']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// PLAYER FUNCTIONS
function createPlayer($player, $teamID) {
    include('connection.php');
    $insertedId = null;
    $query = "INSERT INTO players (firstName, lastName, email, pseudo, birthDate, FK_Team)
            VALUES (:firstName, :lastName, :email, :pseudo, :birthDate, :FK_Team)";
    $query_params = array(
        ':firstName' => $player['firstName'],
        ':lastName' => $player['lastName'],
        ':email' => $player['email'],
        ':pseudo' => $player['pseudo'],
        ':birthDate' => $player['birthDate'],
        ':FK_Team' => $teamID);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        return $insertedId = $db->lastInsertId();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function insertPlayerTeam($playerID, $teamID, $gameID) {
    include('connection.php');
    $query = "INSERT INTO participations (FK_Player, FK_Team, FK_Game)
                VALUES (:playerID, :teamID, :gameID)";
    $query_params = array(
        ':playerID' => $playerID,
        ':teamID' => $teamID,
        ':gameID' => $gameID);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// TEAM FUNCTIONS
function createTeam($name) {
    include('connection.php');
    $insertedId = null;
    $query = "INSERT INTO teams (name) VALUES (:name)";
    $query_params = array(
        ':name' => $name);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
        return $insertedId = $db->lastInsertId();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// GAME FUNCTIONS
function createGame($name) {
    include('connection.php');
    $insertedId = null;
    $query = "INSERT INTO games (name) VALUES (:name)";
    $query_params = array(':name' => $name);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}
