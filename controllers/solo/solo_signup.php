<?php
session_start();
include("../../models/insert.php");
include("../../models/read.php");
include("../../toolbox/formsValidator.php");
include("../../toolbox/messenger.php");
$player = $_POST;
$error = true;
htmlSpecialArray($_POST);
checkTrimArray($_POST);
// on enregistre dans une session les données du joueur
// pour eviter qu'il ne doivent recommencer l'encodage du formulaire en cas d'erreur
$_SESSION['soloPlayer'] = $player;

if(checkEmptyArray($player)) {
    $error = urlencode("veuillez remplir tous les champs");
    header("Location: ../../views/solo_signup.php?error=$error");
} elseif (checkNumber($player['firstName']) || checkNumber($player['lastName'])) {
    $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
    header("Location: ../../views/solo_signup.php?error=$error");
} elseif (!checkFormatMail($player['email'])) {
    $error = urlencode("L'email n'est pas correct");
    header("Location: ../../views/solo_signup.php?error=$error");
} elseif (getAgeFromDate($player['birthDate']) < $minAge) {
    $error = urlencode("Le joueur doit avoir au moins $minAge ans");
    header("Location: ../../views/solo_signup.php?error=$error");
} elseif (!empty(getPlayerEmail($player['email']))) {
    $error = urlencode("Un joueur avec cet email à déjà été enregistré !");
    header("Location: ../../views/solo_signup.php?error=$error");
} else {
    $error = false;
}

if ($error == false) {
    $playerId = createPlayer($player, null);
    insertParticipation($playerId, null, $player['game']);

    if(sendConfirmMail($player['email'])) {
        // Si l'envoie du mail de confirmation réussi, on détruit la session.
        session_destroy();
        header("Location: ../../views/success_signup.php");
    } else {
        echo "Une erreur est survenue. Impossible d'envoyer le mail de confirmation.";
    }
}
