<?php
// ADMIN FUNCTIONS
function updateAdmin($admin) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE admins 
                SET firstName = :firstName, lastName = :lastName, email = :email, birthDate = :birthDate
                WHERE id = :id";
    $query_params = array(
        ':id' => $admin['id'],
        ':firstName' => $admin['firstName'],
        ':LastName' => $admin['lastName'],
        ':email' => $admin['email'],
        ':birthDate' => $admin['birthDate']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// TEAM FUNCTIONS
function updateTeam($team) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE teams SET name= :name WHERE id = :id";
    $query_params = array(
        ':id' => $team['id'],
        ':name' => $team['name']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// PLAYER FUNCTIONS
function updatePlayer($player) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE players 
                SET firstName = :firstName, lastName = :lastName, email = :email, pseudo = :pseudo, birthDate = :birthDate
                WHERE id = :id";
    $query_params = array(
        ':id' => $player['id'],
        ':firstName' => $player['firstName'],
        ':LastName' => $player['lastName'],
        ':email' => $player['email'],
        ':pseudo' => $player['pseudo'],
        ':birthDate' => $player['birthDate']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}
