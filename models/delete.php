<?php

function deletePlayerById($id) {
    include('connection.php');
    $query = "DELETE FROM players WHERE id = :id";
    $query_params = array(':id' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function deletePlayerByTeamId($id) {
    include('connection.php');
    $query = "DELETE FROM players WHERE FK_Team = :id";
    $query_params = array(':id' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function deleteTeamById($id) {
    include('connection.php');
    $query = "DELETE FROM teams WHERE id = :id";
    $query_params = array(':id' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function deleteParticipationByPlayerId($id) {
    include('connection.php');
    $query = "DELETE FROM participations WHERE FK_Player = :id";
    $query_params = array(':id' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function deleteParticipationByTeamId($id) {
    include('connection.php');
    $query = "DELETE FROM participations WHERE FK_Team = :id";
    $query_params = array(':id' => $id);
    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
}

function deleteTeamAndPlayers($id) {
    deleteTeamById($id);
    deletePlayerByTeamId($id);
    deleteParticipationByTeamId($id);
}
