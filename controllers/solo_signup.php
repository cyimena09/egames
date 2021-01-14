<?php
include("../toolbox/formsValidator.php");
include("../models/insert.php");
$player = $_POST;
$error = true;

if(checkEmptyArray($player)) {
    $error = urlencode("veuillez remplir tous les champs");
    header("Location: ../views/solo_signup.php?error=$error");
} elseif (checkNumber($player['firstName']) || checkNumber($player['lastName'])) {
    $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
    header("Location: ../views/solo_signup.php?error=$error");
} elseif (!checkFormatMail($player['email'])) {
    $error = urlencode("L'email n'est pas correct");
    header("Location: ../views/solo_signup.php?error=$error");
} elseif (getAgeFromDate($player['birthDate']) < $minAge) {
    $error = urlencode("Le joueur doit avoir au moins $minAge ans");
    header("Location: ../views/solo_signup.php?error=$error");
} else {
    $error = false;
}

if($error == false) {
    $playerId = createPlayer($player, null);
    insertParticipation($playerId, null, $player['game']);
    header("Location: ../views/success_signup.php");
}
