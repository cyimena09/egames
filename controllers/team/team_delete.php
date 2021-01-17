<?php
if (isset($_GET['team_id'])) {
    include("../../models/delete.php");
    deleteTeamAndPlayers($_GET['team_id']);
    header('Location: ../../views/admin_space.php');
} else {
    echo "Impossible de supprimer l'équipe.";
}
