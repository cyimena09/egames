<?php
include("../models/update.php");
$teamId = $_GET['teamId'];
$gameId = $_POST['game'];

if(empty($gameId)) {
    $error = urlencode("Veuillez choisir un jeu.");
    header("Location: ../views/team_update.php?id=$teamId&error=$error");
} elseif(empty($_POST['teamName'])) {
    $error = urlencode("Veuillez donner un nom d'équipe.");
    header("Location: ../views/team_update.php?id=$teamId&error=$error");
} else {
    updateTeamById($teamId, $_POST);
    updateParticipationByTeamId($gameId, $teamId);
    header("Location: ../views/team_details.php?id=$teamId");
}
