<?php
session_start();
include("../toolbox/formsValidator.php");
include("../models/insert.php");
include("../configuration.php");

if (isset($_GET['player'])){
    $player = $_GET['player'];
} else {
    $player = 0;
}
$newPlayer = $player + 1;

// --------------------------------------------------------------------------------------------------
/* Opération d'insertion dans la base de donnée  de l'équipe et des joueurs */
// --------------------------------------------------------------------------------------------------

$error = true;
htmlSpecialArray($_POST);
checkTrimArray($_POST);
// Si on arrive dans ce bloc de code c'est qu'on a fini d'encoder les joueurs
// et qu'après avoir encodé l'équipe et le jeu l'inscription sera terminé.
if(isset($_POST['game']) && isset($_POST['teamName'])) {
    $game = $_POST['game'];
    $teamName = $_POST['teamName'];

    if(empty($game)) {
        $error = urlencode("Veuillez choisir un jeu.");
        header("Location: ../views/team_signup.php?player=$player&error=$error");
    } elseif(empty($teamName)) {
        $error = urlencode("Veuillez donner un nom d'équipe.");
        header("Location: ../views/team_signup.php?player=$player&error=$error");
    } else {
        $teamId = createTeam($teamName); // La fonction createTeam retourne l'id de l'équipe insérée.
        $players = $_SESSION['players'];
        // Par sécurité on vérifie que le nombre de joueur pour l'équipe est respecté
        // mais en principe si on arrive dans ce bloc de code c'est que c'est le cas => le formulaire qui mène à ce bloc
        // n'est accessible que si le nombre de joueur valide à été respecté.
        if(count($_SESSION['players']) == $maxPlayer) {
            foreach ($players as $player) {
                $playerId = createPlayer($player, $teamId); // On insert le joueur avec l'id de son équipe récupéré précédemment.
                insertPlayerTeam($playerId, $teamId, $game); // On insert l'id du joueur et de son équipe dans la table intermédiaire 'players_teams'.
                }
            header("Location: ../views/success_signup.php");
            // On envoie un mail à chaque joueur pour confirmer leur inscription.
            // On détruit la session.
            session_destroy();
        } else {
            $error = urlencode("L'inscription ne peut pas s'effectuer, vous avez dépassé le nombre de joueur maximum");
            header("Location: ../views/team_signup.php?player=$player&error=$error");
        }
    }
}

// --------------------------------------------------------------------------------------------------
/* Opération de vérification de la validité des formulaires d'inscription des joueurs */
// --------------------------------------------------------------------------------------------------

else {
    // On conserve les données encodées par l'utilisateur, qu'elles soient correctes ou pas
    // pour éviter que l'utilisateur doivent tout réencoder
    $_SESSION['players'][$player] = $_POST;
    $nextable = false; // désactive le bouton next du formulaire

    if(checkEmptyArray($_POST)) {
        $error = urlencode("veuillez remplir tous les champs");
        header("Location: ../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
    } elseif (checkNumber($_POST['firstName']) || checkNumber($_POST['lastName'])) {
        $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
        header("Location: ../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
    } elseif (!checkFormatMail($_POST['email'])) {
        $error = urlencode("L'email n'est pas correct");
        header("Location: ../views/team_signup.php?player=$player&error=$error");
    } elseif (getAgeFromDate($_POST['birthDate']) < $minAge) {
        $error = urlencode("Le joueur doit avoir au moins $minAge ans");
        header("Location: ../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
    } else {
        $error = false;
    }
}

// --------------------------------------------------------------------------------------------------
/* Si les données sont correct ou peut passer à l'insertion du joueur suivant */
// --------------------------------------------------------------------------------------------------

if ($error == false) {
    header("Location: ../views/team_signup.php?player=$newPlayer");
} else {
    echo "un problème est survenue"; // Normalement nous n'arrivons jamais ici puisque j'ai géré toutes les situations ;p
}
