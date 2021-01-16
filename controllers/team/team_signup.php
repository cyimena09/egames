<?php
session_start();
include("../../models/insert.php");
include("../../models/read.php");
include("../../toolbox/formsValidator.php");
include("../../configuration.php");
include("../../toolbox/messenger.php");

if (isset($_GET['player'])) {
    $player = $_GET['player'];
} else {
    $player = 0;
}
$newPlayer = $player + 1; // les joueurs sont encodé 1 à 1, 'newPlayer' correspond au joueur suivant

// --------------------------------------------------------------------------------------------------
/* Opération d'insertion dans la base de données  de l'équipe et des joueurs */
// --------------------------------------------------------------------------------------------------

$error = true;
htmlSpecialArray($_POST);
checkTrimArray($_POST);
// Si on arrive dans ce bloc de code c'est qu'on a fini d'encoder les joueurs
// et qu'une fois l'équipe et le jeu encodé, l'inscription sera terminée.
if (isset($_POST['game']) && isset($_POST['teamName'])) {
    $game = $_POST['game'];
    $teamName = $_POST['teamName'];

    if (empty($game)) {
        $error = urlencode("Veuillez choisir un jeu.");
        header("Location: ../../views/team_signup.php?player=$player&error=$error");
    } elseif (empty($teamName)) {
        $error = urlencode("Veuillez donner un nom d'équipe.");
        header("Location: ../../views/team_signup.php?player=$player&error=$error");
    } else {
        $teamId = createTeam($teamName); // On insert l'équipe dans la DB et on récupère son id qui est retourné par la fonction.
        $players = $_SESSION['players'];
        // Par sécurité on vérifie que le nombre de joueur pour l'équipe est respecté
        // mais si on arrive dans ce bloc de code c'est que c'est le cas => le formulaire qui mène à ce bloc
        // n'est accessible que si le nombre de joueur valide à été respecté.
        if (count($_SESSION['players']) == $maxPlayer) {
            foreach ($players as $player) {
                $playerId = createPlayer($player, $teamId); // On insert le joueur et la clé étrangère de son équipe
                insertParticipation($playerId, $teamId, $game); // On insert l'id du joueur et de son équipe dans la table 'participations'.
                // On envoie un mail à chaque joueur pour confirmer leur inscription.
                sendConfirmMail($player['email']);
            }
            // une fois l'inscription cloturé on détruit la session et on redirige vers une page de succès
            session_destroy();
            header("Location: ../../views/success_signup.php");
        } else {
            $error = urlencode("L'inscription ne peut pas s'effectuer, vous avez dépassé le nombre de joueur maximum");
            header("Location: ../../views/team_signup.php?player=$player&error=$error");
        }
    }
}

// --------------------------------------------------------------------------------------------------
/* Opération de vérification de la validité des formulaires d'inscription des joueurs */
// --------------------------------------------------------------------------------------------------

else {
    $nextable = false; // désactive le bouton next du formulaire

    if (!empty($_POST)) {
        // On conserve les données encodées par l'utilisateur, qu'elles soient correctes ou pas
        // pour éviter que l'utilisateur doivent tout réencoder
        $_SESSION['players'][$player] = $_POST;

        if (checkEmptyArray($_POST)) {
            $error = urlencode("veuillez remplir tous les champs");
            header("Location: ../../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
        } elseif (checkNumber($_POST['firstName']) || checkNumber($_POST['lastName'])) {
            $error = urlencode("Le prénom et le nom ne peuvent pas contenir de chiffres");
            header("Location: ../../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
        } elseif (!checkFormatMail($_POST['email'])) {
            $error = urlencode("L'email n'est pas correct");
            header("Location: ../../views/team_signup.php?player=$player&error=$error");
        } elseif (getAgeFromDate($_POST['birthDate']) < $minAge) {
            $error = urlencode("Le joueur doit avoir au moins $minAge ans");
            header("Location: ../../views/team_signup.php?player=$player&error=$error&nextable=$nextable");
        } elseif (!empty(getPlayerEmail($_POST['email']))) {
            $error = urlencode("Un joueur avec cet email à déjà été enregistré !");
            header("Location: ../../views/team_signup.php?player=$player&error=$error");
        } else {
            // Une fois que les données sont dans un format correct, on vérifie que l'utilisateur n'a pas encodé
            // deux fois la même addresse
            $similitude = 0;
            for ($i = 0; $i < count($_SESSION['players']); $i++) {
                if ($_POST['email'] == $_SESSION['players'][$i]['email'] && $i != $player) {
                    $similitude++;
                }
            }
            if ($similitude != 0) {
                //var_dump( $_SESSION['players'][$i]);
                $error = urlencode("Deux joueurs ne peuvent pas avoir la même adresse mail.");
                header("Location: ../../views/team_signup.php?player=$player&error=$error");
            } else {
                $error = false;
            }
        }
    } else {
        // le bouton next est d'office désactivé si l'utilisateur n'a absolument rien enregistré du joueur
        header("Location: ../../views/team_signup.php?player=$player&nextable=$nextable");
    }
}

// --------------------------------------------------------------------------------------------------
/* Si les données sont correct ou peut passer à l'insertion du joueur suivant */
// --------------------------------------------------------------------------------------------------

if ($error == false) {
    header("Location: ../../views/team_signup.php?player=$newPlayer");
} else {
    echo "un problème est survenu"; // Normalement nous n'arrivons jamais ici puisque j'ai géré toutes les situations ;p
}
