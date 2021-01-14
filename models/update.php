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
function updateTeamById($id, $team) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE teams SET name= :name WHERE id = :id";
    $query_params = array(
        ':id' => $id,
        ':name' => $team['teamName']);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

// PLAYER FUNCTIONS
function updatePlayer($id, $player) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE players 
                SET firstName = :firstName, lastName = :lastName, email = :email, pseudo = :pseudo, birthDate = :birthDate 
                WHERE id = :id";
    $query_params = array(
        ':id' => $id,
        ':firstName' => $player['firstName'],
        ':lastName' => $player['lastName'],
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

// Participation FUNCTIONS
function updateParticipationByTeamId($gameId, $teamId) {
    include('connection.php');
    $insertedId = null;
    $query = "UPDATE participations 
                SET FK_Game = :FK_Game 
                WHERE FK_Team = :FK_Team";
    $query_params = array(
        ':FK_Game' => $gameId,
        ':FK_Team' => $teamId);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}