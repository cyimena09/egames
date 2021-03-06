<?php
// ADMIN FUNCTIONS
function getAdminById($id) {
    include("connection.php");
    $query = "SELECT * FROM admins WHERE id = :id";
    $query_params = array(':id'=> $id);

    try {
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

    try {
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
    $query = "SELECT p.id, p.firstName, p.lastName, p.email, p.pseudo, (YEAR(Now()) - YEAR(p.birthDate)) AS age, g.name AS gameName, t.name AS teamName
                FROM players p
                INNER JOIN participations pa ON p.id = pa.FK_Player
                INNER JOIN games g ON g.id = pa.FK_Game
                LEFT JOIN teams t ON t.id LIKE pa.FK_Team";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
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

    try {
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
    $query = "SELECT p.id, p.firstName, p.lastName, p.pseudo, (YEAR(Now()) - YEAR(p.birthDate)) AS age, t.name AS teamName FROM players p
                INNER JOIN teams t ON t.id = p.FK_team 
                WHERE p.FK_Team = :id ";
    $query_params = array(':id'=> $id);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPLayersWithoutTeam() {
    include("connection.php");
    $query = "SELECT p.id, p.firstName, p.lastName, p.pseudo, p.email, (YEAR(Now()) - YEAR(p.birthDate)) AS age, g.name AS game
                FROM players p
                INNER JOIN participations pa ON pa.FK_Player = p.id
                INNER JOIN games g ON g.id = pa.FK_Game
                WHERE p.FK_Team IS NULL";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlayerByIdAndGame($id) {
    include("connection.php");
    $query = "SELECT p.id as playerId, p.firstName, p.lastName, p.email, p.pseudo, p.birthDate, p.FK_Team as teamId, g.id AS gameId, g.name AS game 
                FROM players p
                INNER JOIN participations pa ON pa.FK_Player = p.id
                INNER JOIN games g ON g.id = pa.FK_Game
                WHERE p.id = :id";
    $query_params = array(':id'=> $id);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}

// TEAM FUNCTIONS
function getTeams() {
    include("connection.php");
    $query = "SELECT DISTINCT t.id, t.name AS teamName, g.name AS game
                FROM teams t
                INNER JOIN participations p ON p.FK_Team = t.id
                INNER JOIN games g ON g.id = p.FK_Game";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getTeamById($id) {
    include("connection.php");
    $query = "SELECT DISTINCT t.id, t.name AS teamName, g.name AS game, g.id as gameId
                FROM teams t
                INNER JOIN participations p ON p.FK_Team = t.id
                INNER JOIN games g ON g.id = p.FK_Game
                WHERE t.id = :id";
    $query_params = array(':id'=> $id);

    try {
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
    $query = "SELECT  * FROM GAMES";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getGamesByNbPlayers() {
    include("connection.php");
    $query = "SELECT g.id, g.name, COUNT(pa.FK_Player) as nbPlayer 
                FROM  games g
                LEFT JOIN participations pa ON pa.FK_Game = g.id
                GROUP by g.id 
                ORDER BY nbPlayer DESC";

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute();
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getPlayersByGameId($id) {
    include("connection.php");
    $query = "SELECT p.id, p.firstName, p.lastName, p.pseudo, (YEAR(Now()) - YEAR(p.birthDate)) AS age, t.name as teamName 
                FROM players p
                INNER JOIN participations pa ON pa.FK_Player = p.id
                LEFT JOIN teams t ON t.id = pa.FK_Team
                INNER JOIN games g ON g.id = pa.FK_Game
                WHERE g.id = :id
                ORDER BY teamName DESC";
    $query_params = array(':id'=> $id);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getGameById($id) {
    include("connection.php");
    $query = "SELECT * FROM games g WHERE g.id = :id";
    $query_params = array(':id'=> $id);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}

// CHECK FUNCTIONS
function getPlayerEmail($email) {
    include("connection.php");
    $query = "SELECT * FROM players p WHERE p.email = :email";
    $query_params = array(':email'=> $email);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}

function getAdminEmail($email) {
    include("connection.php");
    $query = "SELECT * FROM admins a WHERE a.email = :email";
    $query_params = array(':email'=> $email);

    try {
        $stmt = $db->prepare($query);
        $result = $stmt->execute($query_params);
    } catch(PDOException $ex) {
        die("Failed query : " . $ex->getMessage());
    }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result[0];
}
