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
// Si la session de joueur n'existe pas on la crée.
// La session 'players' contient un tableau des joueurs d'une équipe.
if (!isset($_SESSION['players'])) {
    $_SESSION['players'][0] = $_POST;
    header("Location: ../views/team_signup.php?player=$newPlayer");
}
// si on a atteint le nombre de joueur max on met fin à l'ajout et on enregistre les joueurs de la session.
elseif (count($_SESSION['players']) == $maxPlayer && $player == $maxPlayer) {
    $teamName = $_POST['teamName'];
    $game = $_POST['game'];
    $teamId = createTeam($teamName); // la fonction createTeam retourne l'id de l'équipe inséré
    $players = $_SESSION['players'];

    foreach ($players as $player) {
        $playerId = createPlayer($player, $teamId); // on insert le joueur avec l'id de son équipe récupéré précédemment
        insertPlayerTeam($playerId, $teamId, $game); // on insert l'id du joueur et de son équipe dans la table intermédiaire 'players_teams'
    }
    header("Location: ../views/success_signup.php");
    // pour finir on envoie un email aux joueurs concernés pour confirmer leur inscription et on détruit la session
    session_destroy();
}
// Si on arrive dans ce bloc c'est qu'on a pas atteint le nombre de joueur max.
// Donc on ajoute le joueur du poste dans la session 'players'.
elseif (isset($_SESSION['players'])) {
    // on vérifie si il s'agit d'une mise à jour ou d'un nouveau joueur
    if (count($_SESSION['players']) > $player) {
        $_SESSION['players'][$player] = $_POST; // si mise à jour
        header("Location: ../views/team_signup.php?player=$newPlayer");
    }
    // si nouveau joueur
    elseif (count($_SESSION['players']) <= $player) {
        array_push($_SESSION['players'], $_POST);
        header("Location: ../views/team_signup.php?player=$newPlayer");
    }
} else {
    echo "un problème est survenue";
}

//
//$error = null;
//htmlSpecialArray($_POST);
//checkEmptyArray($_POST);
//checkTrimArray($_POST);
//if($error==null){
//    if($_POST['Password'] == $_POST['ConfirmPassword']){
//        $error = "ok";
//    }
//    else {
//        $error = 'Les mots de passe ne correspondent pas';
//    }
//}
////REDIRECTIONS
//if($error == 'ok'){
//    insertAdmin($_POST);
//    header('Location: ../view/confirmAdminRegister.php');
//}else{
//    header('Location: ../view/adminRegister.php?erreur='.$error);
//}