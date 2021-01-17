<?php
include("../../models/update.php");
include("../../toolbox/formsValidator.php");
include("../../configuration.php");
$player = $_POST;
$teamId = 0;
if(isset($_GET['player_id'])) {
    $playerId = $_GET['player_id'];
}

if(isset( $_GET['previous_page'])) {
    $previousPage = $_GET['previous_page'];
}

if(isset($_GET['game_id'])) {
    $gameId = $_GET['game_id'];
}

if(isset($_GET['team_id'])) {
    $teamId = $_GET['team_id'];
}
$error = true;

// On vérifie que les données récupérées dans le POST sont correct
if (checkEmptyArray($player)) {
    $error = urlencode("veuillez remplir tous les champs");
    header("Location: ../../views/player_update.php?previous_page=$previousPage&player_id=$playerId&team_id=$teamId&error=$error");
} elseif (checkNumber($_POST['firstName']) || checkNumber($_POST['lastName'])) {
    $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
    header("Location: ../../views/player_update.php?previous_page=$previousPage&player_id=$playerId&team_id=$teamId&error=$error");
} elseif (!checkFormatMail($_POST['email'])) {
    $error = urlencode("L'email n'est pas correct");
    header("Location: ../../views/player_update.php?previous_page=$previousPage&player_id=$playerId&team_id=$teamId&error=$error");
} elseif (getAgeFromDate($_POST['birthDate']) < $minAge) {
    $error = urlencode("Le joueur doit avoir au moins $minAge ans");
    header("Location: ../../views/player_update.php?previous_page=$previousPage&player_id=$playerId&team_id=$teamId&error=$error");
} else {
    $error = false;
}

// S'il n'y a pas d'erreur on traite le cas ou le joueur est seul ET le cas ou il est en équipe.
if ($error == false) {
    // 1. S'il est seul
    if (!empty($player['gameId'])) { // On sait qu'un joueur est seul si on récupère l'id du jeu (car un uniquement joueur seul (ou une équipe) peut changer de jeu).
        updatePlayer($playerId, $player);
        updateParticipationByPlayerId($player['gameId'], $playerId);
        header("Location: ../../views/$previousPage.php?game_id=$gameId&team_id=$teamId");
    }
    // 1. S'il est en équipe
    elseif (empty($player['gameId'])) {
        updatePlayer($playerId, $player);
        header("Location: ../../views/$previousPage.php?game_id=$gameId&team_id=$teamId");
    }
}
