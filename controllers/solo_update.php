<?php
include("../models/update.php");
include("../toolbox/formsValidator.php");
include("../configuration.php");
$player = $_POST;
$playerId = $_GET['playerId'];
$gameId = $player['game'];
$error = true;

if (checkEmptyArray($player)) {
    $error = urlencode("veuillez remplir tous les champs");
    header("Location: ../views/solo_update.php?id=$playerId&error=$error");
} elseif (checkNumber($_POST['firstName']) || checkNumber($_POST['lastName'])) {
    $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
    header("Location: ../views/solo_update.php?id=$playerId&error=$error");
} elseif (!checkFormatMail($_POST['email'])) {
    $error = urlencode("L'email n'est pas correct");
    header("Location: ../views/solo_update.php?id=$playerId&error=$error");
} elseif (getAgeFromDate($_POST['birthDate']) < $minAge) {
    $error = urlencode("Le joueur doit avoir au moins $minAge ans");
    header("Location: ../views/solo_update.php?id=$playerId&error=$error");
} else {
    $error = false;
}

if ($error == false) {
    updatePlayer($playerId, $player);
    updateParticipationByPlayerId($gameId, $playerId);
    header("Location: ../views/admin_space.php");
}
