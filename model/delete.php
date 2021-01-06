<?php
// TEAM FUNCTIONS
function deleteTeam($id) {
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
