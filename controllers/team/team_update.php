<?php
include("../../models/update.php");
$teamId = $_GET['team_id'];
$gameId = $_POST['game'];

if (empty($gameId)) {
    $error = urlencode("Veuillez choisir un jeu.");
    header("Location: ../../views/team_update.php?team_id=$teamId&error=$error");
} elseif (empty($_POST['teamName'])) {
    $error = urlencode("Veuillez donner un nom d'équipe.");
    header("Location: ../../views/team_update.php?team_id=$teamId&error=$error");
} else {
    updateTeamById($teamId, $_POST);
    updateParticipationByTeamId($gameId, $teamId);
    header("Location: ../../views/team_details.php?team_id=$teamId");
}
