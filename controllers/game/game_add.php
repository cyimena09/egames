<?php
include("../../models/insert.php");
$gameName = $_POST['gameName'];
if (empty($gameName)) {
    $error = "Veuillez entrer un nom de jeu !";
    header("Location: ../../views/game_add.php?error=$error");
} else {
    createGame($gameName);
    header("Location: ../../views/admin_space.php");
}

