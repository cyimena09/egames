<?php
if (isset($_GET['id'])) {
    include("../../models/delete.php");
    deletePlayerById($_GET['id']);
    deleteParticipationByPlayerId($_GET['id']);
    header('Location: ../../views/admin_space.php');
} else {
    echo "Veuillez indiquer l'id du joueur à supprimer.";
}
